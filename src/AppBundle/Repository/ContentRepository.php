<?php

namespace AppBundle\Repository;

/**
 * ContentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentRepository extends \Doctrine\ORM\EntityRepository
{
    public function getByKeys(array $keys)
    {
        $qb = $this->createQueryBuilder('content');
        $qb
            ->select('content.value', 'content.key')
            ->where($qb->expr()->in('content.key', $keys));
        $data = [];
        foreach ($qb->getQuery()->getResult() as $content) {
            $data[$content['key']] = $content['value'];
        }
        return $data;
    }
}
