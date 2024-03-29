<?php

namespace Plugin\PointsOnFirstOrder\Repository;

use Eccube\Entity\Customer;
use Eccube\Repository\AbstractRepository;
use Plugin\PointsOnFirstOrder\Entity\Config;
use Plugin\PointsOnFirstOrder\Entity\CustomerPoint;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * CustomerPointRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerPointRepository extends AbstractRepository
{
    /**
     * CustomerPointRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomerPoint::class);
    }

    public function setPoint(Customer $customer, $point)
    {
        $customerPoint = $this->findOneBy(['Customer' => $customer]);
        if ($customerPoint) {
            $customerPoint->setPoint($point);
        } else {
            $customerPoint = new CustomerPoint();
            $customerPoint->setCustomer($customer);
        }
        $customerPoint->setPoint($point);
        $customerPoint->setAdded(1);
        $customerPoint->setCreatedAt(new \DateTime());
        $em = $this->getEntityManager();
        $em->persist($customerPoint);
        $em->flush($customerPoint);

        return $this;
    }
}
