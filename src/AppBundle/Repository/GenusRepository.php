<?php
/**
 * Created by PhpStorm.
 * User: fontans
 * Date: 5/16/17
 * Time: 3:37 PM
 */

namespace AppBundle\Repository;
use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{

    /**
     * @return Genus[]
     */
    public function findAllPublishedOrderedBySize()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->orderBy('genus.speciesCount', 'DESC')
            ->getQuery()
            ->execute();
    }
}