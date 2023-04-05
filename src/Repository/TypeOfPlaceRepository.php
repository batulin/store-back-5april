<?php

namespace App\Repository;

use App\Entity\TypeOfPlace;
use App\Exception\TypeNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeOfPlace>
 *
 * @method TypeOfPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfPlace[]    findAll()
 * @method TypeOfPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeOfPlace::class);
    }

    public function save(TypeOfPlace $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypeOfPlace $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getTypeById(int $id): TypeOfPlace
    {
        $type = $this->find($id);
        if (null === $type) {
            throw new TypeNotFoundException();
        }

        return $type;
    }
}
