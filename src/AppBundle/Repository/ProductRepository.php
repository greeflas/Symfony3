<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Repository for product entity.
 *
 * @link https://symfony.com/doc/3.4/doctrine/repository.html
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ProductRepository extends EntityRepository
{
    /**
     * Returns all products where price less then value
     * in `price` parameter.
     *
     * @param float $price
     * @return array
     */
    public function findAllPriceLessThen($price)
    {
        return $this->createQueryBuilder('p')
            ->where('p.price < :price')
            ->setParameter('price', $price)
            ->orderBy('p.price', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
