<?php

namespace Loja\ClienteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=150)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="historico", type="text")
     */
    private $historico;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Recibo", mappedBy="cliente", cascade={"remove"})
     */
    private $recibo;

    public function __construct()
    {
        $this->recibo = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return Cliente
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set historico
     *
     * @param string $historico
     * @return Cliente
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string 
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * Add recibo
     *
     * @param \Loja\ClienteBundle\Entity\Recibo $recibo
     * @return Cliente
     */
    public function addRecibo(\Loja\ClienteBundle\Entity\Recibo $recibo)
    {
        $this->recibo[] = $recibo;

        return $this;
    }

    /**
     * Remove recibo
     *
     * @param \Loja\ClienteBundle\Entity\Recibo $recibo
     */
    public function removeRecibo(\Loja\ClienteBundle\Entity\Recibo $recibo)
    {
        $this->recibo->removeElement($recibo);
    }

    /**
     * Get recibo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecibo()
    {
        return $this->recibo;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNome();
    }
}
