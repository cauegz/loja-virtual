<?php

namespace App\Model;

use LogicException;

class Produto{
    private ?int $id = null;
    private string $nome;
    private float $preco;
    private string $descricao;

    public function __construct(string $nome, float $preco, string $descricao)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco(float $preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }

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
    public function setId(int $id)
    {
        if($this->id !== null) throw new LogicException("O id já existe", 1);
        
        $this->id = $id;

        return $this;
    }
}
