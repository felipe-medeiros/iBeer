# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.box_check_update = false
  config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
  config.vm.network "private_network", ip: "192.168.33.10"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
    apt-get install -y php libapache2-mod-php  php7.0-sqlite
    apt-get install -y unzip
    cd /vagrant
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    cat <<EOF > /etc/apache2/sites-enabled/000-default.conf
    <VirtualHost *:80>
      DocumentRoot /var/www/html/web
      ErrorLog ${APACHE_LOG_DIR}/error.log
      CustomLog ${APACHE_LOG_DIR}/access.log combined
      <Directory /var/www/html/web>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
      </Directory>
    </VirtualHost>
EOF
    php composer.phar install
    php composer.phar dumpautoload
    vendor/bin/doctrine orm:schema-tool:create
    a2enmod rewrite
    service apache2 restart
    if ! [ -L /var/www/html ]; then
      rm -rf /var/www/html
      ln -fs /vagrant /var/www/html
    fi
  SHELL
end