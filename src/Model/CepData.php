<?php

namespace Sdk\ViaCep\Model;

use JsonSerializable;

class CepData implements JsonSerializable
{
    /**
     *
     * @var string|null
     */
    private $cep;

    /**
     *
     * @var string|null
     */
    private $logradouro;

    /**
     *
     * @var string|null
     */
    private $complemento;

    /**
     *
     * @var string|null
     */
    private $bairro;

    /**
     *
     * @var string|null
     */
    private $localidade;

    /**
     *
     * @var string|null
     */
    private $uf;

    /**
     *
     * @var string|null
     */
    private $ibge;

    /**
     *
     * @var string|null
     */
    private $gia;

    /**
     *
     * @var string|null
     */
    private $ddd;

    /**
     *
     * @var string|null
     */
    private $siafi;

    /**
     * Get the value of cep
     *
     * @return string|null
     */
    public function getCep(): ?string
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @param string|null $cep 
     *
     * @return self
     */
    public function setCep(?string $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of logradouro
     *
     * @return string|null
     */
    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @param string|null $logradouro 
     *
     * @return self
     */
    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of complemento
     *
     * @return string|null
     */
    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @param string|null $complemento 
     *
     * @return self
     */
    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of bairro
     *
     * @return string|null
     */
    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @param string|null $bairro 
     *
     * @return self
     */
    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of localidade
     *
     * @return string|null
     */
    public function getLocalidade(): ?string
    {
        return $this->localidade;
    }

    /**
     * Set the value of localidade
     *
     * @param string|null $localidade 
     *
     * @return self
     */
    public function setLocalidade(?string $localidade): self
    {
        $this->localidade = $localidade;

        return $this;
    }

    /**
     * Get the value of uf
     *
     * @return string|null
     */
    public function getUf(): ?string
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @param string|null $uf 
     *
     * @return self
     */
    public function setUf(?string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of ibge
     *
     * @return string|null
     */
    public function getIbge(): ?string
    {
        return $this->ibge;
    }

    /**
     * Set the value of ibge
     *
     * @param string|null $ibge 
     *
     * @return self
     */
    public function setIbge(?string $ibge): self
    {
        $this->ibge = $ibge;

        return $this;
    }

    /**
     * Get the value of gia
     *
     * @return string|null
     */
    public function getGia(): ?string
    {
        return $this->gia;
    }

    /**
     * Set the value of gia
     *
     * @param string|null $gia 
     *
     * @return self
     */
    public function setGia(?string $gia): self
    {
        $this->gia = $gia;

        return $this;
    }

    /**
     * Get the value of ddd
     *
     * @return string|null
     */
    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    /**
     * Set the value of ddd
     *
     * @param string|null $ddd 
     *
     * @return self
     */
    public function setDdd(?string $ddd): self
    {
        $this->ddd = $ddd;

        return $this;
    }

    /**
     * Get the value of siafi
     *
     * @return string|null
     */
    public function getSiafi(): ?string
    {
        return $this->siafi;
    }

    /**
     * Set the value of siafi
     *
     * @param string|null $siafi 
     *
     * @return self
     */
    public function setSiafi(?string $siafi): self
    {
        $this->siafi = $siafi;

        return $this;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        foreach ($vars as $key => $value) {
            if (is_null($value)) {
                unset($vars[$key]);
            }
        }

        return $vars;
    }
}
