<?php

namespace Loja\ClienteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servico
 *
 * @ORM\Table(name="servico")
 * @ORM\Entity(repositoryClass="Loja\ClienteBundle\Repository\ServicoRepository")
 */
class Servico
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
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Recibo", mappedBy="servico", cascade={"remove"})
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
     * Set descricao
     *
     * @param string $descricao
     * @return Servico
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return Servico
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Add recibo
     *
     * @param \Loja\ClienteBundle\Entity\Recibo $recibo
     * @return Servico
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
        return $this->getDescricao();
    }
}
