<?php

namespace App\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DataRepository extends EntityRepository
{

    public function getData($currentPage = 1)
    {
        // Create our query
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.voltoday', 'DESC')
            ->getQuery();

        //return $query->getResult();
        // No need to manually get get the result ($query->getResult())

        $paginator = $this->paginate($query, $currentPage);

        return $paginator->getIterator();
    }

    public function getAllData()
    {
        // Create our query
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.voltoday', 'DESC')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Paginator Helper
     *
     * Pass through a query object, current page & limit
     * the offset is calculated from the page and limit
     * returns an `Paginator` instance, which you can call the following on:
     *
     *     $paginator->getIterator()->count() # Total fetched (ie: `10` posts)
     *     $paginator->count() # Count of ALL posts (ie: `20` posts)
     *     $paginator->getIterator() # ArrayIterator
     *
     * @param Doctrine\ORM\Query $dql   DQL Query Object
     * @param integer            $page  Current page (defaults to 1)
     * @param integer            $limit The total number per page (defaults to 5)
     *
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function paginate($dql, $page = 1, $limit = 10)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1)) // Offset
            ->setMaxResults($limit); // Limit

        return $paginator;
    }
}
