<?php

namespace Loja\ClienteBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ServicoRepository extends EntityRepository
{
    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->getRepository('LojaClienteBundle:Servico')
            ->createQueryBuilder('p');
        return $queryBuilder;
    }

    public function findAllInOrder()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.descricao', 'desc');

        return $qb->getQuery()->getResult();
    }
}