<?php

namespace Loja\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recibo
 *
 * @ORM\Table(name="recibo")
 * @ORM\Entity
 */
class Recibo
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;


    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="recibos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=false)
     */
    private $cliente;


    /**
     * @var Servico
     *
     * @ORM\ManyToOne(targetEntity="Servico", inversedBy="recibos")
     * @ORM\JoinColumn(name="servico_id", referencedColumnName="id", nullable=false)
     */
    private $servico;


    /**
     * Get cliente
     *
     * @return \Loja\ClienteBundle\Entity\Cliente $cliente
     */
    public function getCliente()
    {
        return $this->cliente;

    }

    /**
     * Set cliente
     *
     * @param \Loja\ClienteBundle\Entity\Cliente $cliente
     * @return Cliente
     */
    public function setCliente(\Loja\ClienteBundle\Entity\Cliente $cliente)
    {
        $this->cliente = $cliente;

        return $this;
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
     * Set data
     *
     * @param \DateTime $data
     * @return Recibo
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Set servico
     *
     * @param \Loja\ClienteBundle\Entity\Servico $servico
     * @return Sevico
     */
    public function setServico(\Loja\ClienteBundle\Entity\Servico $servico)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get servico
     *
     * @return \Loja\ClienteBundle\Entity\Servico 
     */
    public function getServico()
    {
        return $this->servico;
    }
}
