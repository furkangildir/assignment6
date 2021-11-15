<?php

namespace App\Repository;

use App\Entity\Dersler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dersler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dersler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dersler[]    findAll()
 * @method Dersler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DerslerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dersler::class);
    }


    public function dersGetir(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Dersler p
            WHERE p.id = :id'
        )->setParameter('id', $id);

        // returns an array of Product objects
        return $query->getResult();
    }

}
