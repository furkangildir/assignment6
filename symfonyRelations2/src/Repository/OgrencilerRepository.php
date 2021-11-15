<?php

namespace App\Repository;

use App\Entity\Ogrenciler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ogrenciler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ogrenciler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ogrenciler[]    findAll()
 * @method Ogrenciler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OgrencilerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ogrenciler::class);
    }

     /**
      * @return Ogrenciler[] Returns an array of Ogrenciler objects
      */
    
    public function ogrenciGetir(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Ogrenciler p
            WHERE p.id = :id'
        )->setParameter('id', $id);

        // returns an array of Product objects
        return $query->getResult();
    }
      
   
}
