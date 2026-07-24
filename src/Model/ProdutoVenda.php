<?php

namespace App\Model;

use LogicException;

class ProdutoVenda{
    private ?int $id = null;
    private float $precoUnitario;
    private int $quantidade;
    private int $idProduto;
    private int $idVenda;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        if($this->id !== null) throw new LogicException("O id já existe", 1);

        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of precoUnitario
     */ 
    public function getPrecoUnitario()
    {
        return $this->precoUnitario;
    }

    /**
     * Set the value of precoUnitario
     *
     * @return  self
     */ 
    public function setPrecoUnitario($precoUnitario)
    {
        $this->precoUnitario = $precoUnitario;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get the value of idProduto
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set the value of idProduto
     *
     * @return  self
     */ 
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get the value of idVenda
     */ 
    public function getidVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set the value of idVenda
     *
     * @return  self
     */ 
    public function setidVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }
}
