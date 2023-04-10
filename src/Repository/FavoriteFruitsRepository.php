<?php

namespace App\Repository;

use App\Entity\FavoriteFruits;
use App\Entity\Fruits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FavoriteFruits>
 *
 * @method FavoriteFruits|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavoriteFruits|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavoriteFruits[]    findAll()
 * @method FavoriteFruits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoriteFruitsRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, FavoriteFruits::class);
  }

  public function save(FavoriteFruits $entity, bool $flush = false): void
  {
    $this->getEntityManager()->persist($entity);

    if ($flush) {
      $this->getEntityManager()->flush();
    }
  }

  public function remove(FavoriteFruits $entity, bool $flush = false): void
  {
    $this->getEntityManager()->remove($entity);

    if ($flush) {
      $this->getEntityManager()->flush();
    }
  }


  /**
   */
//  public function findUserFavoriteFruitsWithDetails($userId)
//  {
//    $qb = $this->createQueryBuilder('ff')
//      ->select('ff, f, fm, fg, fo, fn, (fn.carbohydrates + fn.protein + fn.fat  + fn.calories + fn.sugar ) AS totalNutrients')
//      ->join(Fruits::class, 'f', 'WITH', 'ff.fruitId = f.fruitId')
//      ->leftJoin('f.family', 'fm')
//      ->leftJoin('f.order', 'fo')
//      ->leftJoin('f.genus', 'fg')
//      ->leftJoin('f.nutrition', 'fn')
//      ->where('ff.user_id = :userId')
//      ->setParameter('userId', $userId);
//
//    $results = $qb->getQuery()->getResult();
//
//    $favorites = [];
//    foreach ($results as $key => $result) {
//      if ($result instanceof FavoriteFruits) {
//        $favoriteFruit = $result;
//      } elseif ($result instanceof Fruits) {
//        $fruit = $result;
//        $totalNutrients = $result['totalNutrients'];
//        $favorites[] = [
//          'favoriteFruit' => $favoriteFruit,
//          'fruit' => $fruit,
//          'totalNutrients' => $totalNutrients,
//        ];
//      }
//    }
//
//    return $favorites;
//  }

  public function findUserFavoriteFruitsWithDetails($userId)
  {
    $qb = $this->createQueryBuilder('ff')
      ->select('ff, f, fm, fg, fo, fn, (fn.carbohydrates + fn.protein + fn.fat + fn.calories + fn.sugar) AS totalNutrients')
      ->join(Fruits::class, 'f', 'WITH', 'ff.fruitId = f.fruitId')
      ->leftJoin('f.family', 'fm')
      ->leftJoin('f.order', 'fo')
      ->leftJoin('f.genus', 'fg')
      ->leftJoin('f.nutrition', 'fn')
      ->where('ff.user_id = :userId')
      ->setParameter('userId', $userId);

    $results = $qb->getQuery()->getResult();

    $favorites = [];
    for ($i = 0; $i < count($results); $i += 2) {
      $favoriteFruit = $results[$i][0];
      $fruit = $results[$i + 1][0];
      $totalNutrients = $results[$i + 1]['totalNutrients'];

      $favorites[] = [
        'favoriteFruit' => $favoriteFruit,
        'fruit' => $fruit,
        'totalNutrients' => $totalNutrients,
      ];
    }

    return $favorites;


  }
//    /**
//     * @return FavoriteFruits[] Returns an array of FavoriteFruits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FavoriteFruits
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
