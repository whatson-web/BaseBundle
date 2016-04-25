<?php

namespace APP\CmsBundle\Entity;

use WH\CmsBundle\Model\PageRepository as WHCmsPageRepo;

/**
 * Class PageRepository
 * @package APP\CmsBundle\Entity
 */
class PageRepository extends WHCmsPageRepo
{

    /**
     * @param $parentPageId
     * @return array
     */
    public function getSousPages($parentPageId)
    {

        return $this
            ->createQueryBuilder('page')
            ->select('page')
            ->addSelect('template')
            ->innerJoin('page.template', 'template', 'WITH', 'page.template = template.id')
            ->andWhere('template.slug IN (:templateSlug)')
            ->setParameter('templateSlug', array('page','actualites'))
            ->andWhere('page.status = :status')
            ->setParameter('status', 'published')
            ->andWhere('page.parent = :parentPageId')
            ->setParameter('parentPageId', $parentPageId)
            ->orderBy('page.root, page.lft', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $parentPageId
     * @return array
     */
    public function getFaq($parentPageId)
    {

        return $this
            ->createQueryBuilder('page')
            ->select('page')
            ->addSelect('template')
            ->innerJoin('page.template', 'template', 'WITH', 'page.template = template.id')
            ->andWhere('template.slug = :templateSlug')
            ->setParameter('templateSlug', 'faq')
            ->andWhere('page.status = :status')
            ->setParameter('status', 'published')
            ->andWhere('page.parent = :parentPageId')
            ->setParameter('parentPageId', $parentPageId)
            ->orderBy('page.root, page.lft', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $parentPageId
     * @return array
     */
    public function getSousRubriques($parentPageId)
    {

        return $this
            ->createQueryBuilder('page')
            ->select('page')
            ->addSelect('template')
            ->innerJoin('page.template', 'template', 'WITH', 'page.template = template.id')
            ->andWhere('template.slug = :templateSlug')
            ->setParameter('templateSlug', 'rubrique')
            ->andWhere('page.status = :status')
            ->setParameter('status', 'published')
            ->andWhere('page.parent = :parentPageId')
            ->setParameter('parentPageId', $parentPageId)
            ->orderBy('page.root, page.lft', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     */
    public function getNewsPages()
    {

        return $this
            ->createQueryBuilder('page')
            ->select('page')
            ->addSelect('template')
            ->innerJoin('page.template', 'template', 'WITH', 'page.template = template.id')
            ->andWhere('template.slug IN (:templateSlugs)')
            ->setParameter('templateSlugs', array('actualites', 'configurateur'))
            ->andWhere('page.status = :status')
            ->setParameter('status', 'published')
            ->orderBy('page.root, page.lft', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     */
    public function getPushHome()
    {

        return $this
            ->createQueryBuilder('page')
            ->select('page')
            ->andWhere('page.status = :status')
            ->setParameter('status', 'published')
            ->andWhere('page.pushHome = :pushHome')
            ->setParameter('pushHome', true)
            ->orderBy('page.root, page.lft', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
