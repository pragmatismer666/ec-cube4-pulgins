<?php
/*
* Plugin Name : PayJp
*
* Copyright (C) 2018 Subspire Inc. All Rights Reserved.
* http://www.subspire.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Plugin\PayJp\Repository;

use Eccube\Repository\AbstractRepository;
use Plugin\PayJp\Entity\PayJpCustomer;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PayJpCustomerRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PayJpCustomer::class);
    }

}