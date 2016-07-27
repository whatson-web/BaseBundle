<?php

namespace APP\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class PostRepository
 * @package APP\BlogBundle\Entity
 */
class PostRepository extends EntityRepository
{

    public function get($all = true, $options = array())
    {

        $qb = $this
            ->createQueryBuilder('post')
            ->select('post')
            ->where('post.status = :status')
            ->orderBy('post.created', 'ASC')
            ->setParameter('status', 'published');

        foreach ($options as $key => $value) {

            switch ($key) {

                case 'slug':
                    $qb->andWhere('post.slug = :slug');
                    $qb->setParameter('slug', $value);
                    break;

                case 'page':
                    $qb->andWhere('post.page = :parentPageId');
                    $qb->setParameter('parentPageId', $value);
                    break;

                case 'notId':
                    $qb->andWhere('post.id != :id');
                    $qb->setParameter('id', $value);
                    break;

            }

        }

        $query = $qb->getQuery();

        if ($all) {

            $result = $query->getResult();

        } else {

            $result = $query->getSingleResult();
        }

        return $result;

    }

}
