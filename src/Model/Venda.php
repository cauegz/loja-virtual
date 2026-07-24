<?php

namespace App\Model;

use DateTime;
use LogicException;

class Venda{
    private ?int $id = null;
    private DateTime $data;
    private float $valor;
    private int $idFuncionario;
    private int $idUsuario;

    public function __construct(DateTime $data, float $valor, int $idFuncionario, int $idUsuario)
    {
        $this->data = $data;
        $this->valor = $valor;
        $this->idFuncionario = $idFuncionario;
        $this->idUsuario = $idUsuario;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of idFuncionario
     */ 
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    /**
     * Set the value of idFuncionario
     *
     * @return  self
     */ 
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

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
    public function setId($id)
    {
        if($this->id !== null) throw new LogicException("O id já existe", 1);

        $this->id = $id;

        return $this;
    }
}
