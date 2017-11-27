<?php
declare(strict_types=1);

namespace Gps\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Fornecedor
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", nullable=false)
     */
    private $nome;

    /**
     * @Column(type="string", nullable=false, unique=true)
     */
    private $cnpj;

    /**
     * @OneToMany(targetEntity="Bebida", mappedBy="fornecedor", orphanRemoval=true)
     */
    private $bebidas;

    function __construct(){
        $this->bebidas = new ArrayCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getCnpj() : string
    {
        return $this->cnpj;
    }

    public function getBebidas()
    {
        return $this->bebidas;
    }
}