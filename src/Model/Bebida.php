<?php
declare(strict_types=1);

namespace Gps\Model;

/**
 * @Entity
 */
class Bebida
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
     * @Column(type="string", nullable=false)
     */
    private $marca;

    /**
     * @Column(type="float", nullable=false)
     */
    private $preco;

    /**
     * @Column(type="float", nullable=false)
     */
    private $ml;

    /**
     * @ManyToOne(targetEntity="Fornecedor", inversedBy="bebidas")
     */
    private $fornecedor;


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

    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    public function getPreco() : float
    {
        return $this->preco;
    }

    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function getMarca() : string
    {
        return $this->marca;
    }

    public function setMl(float $ml)
    {
        $this->ml = $ml;
    }

    public function getMl() : float
    {
        return $this->ml;
    }

    public function setFornecedor(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getFornecedor() : Fornecedor
    {
        return $this->fornecedor;
    }
}
