<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function __construct($environment, $debug)
    {

        parent::__construct($environment, $debug);
        date_default_timezone_set('Europe/Paris');
    }

    public function registerBundles()
    {
        $bundles = array(
            /*
             * BASE SYMFONY
             */
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            /*
             * COMPOSER
             */
            new Genemu\Bundle\FormBundle\GenemuFormBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
            new AntiMattr\GoogleBundle\GoogleBundle(),

            /*
             * APP
             */
            new WH\SmartAdminBundle\WHSmartAdminBundle(),
            new WH\UserBundle\WHUserBundle(),
            new WH\MainBundle\WHMainBundle(),
            new WH\CmsBundle\WHCmsBundle(),
            new WH\BlogBundle\WHBlogBundle(),

            new APP\UserBundle\APPUserBundle(),
            new APP\BackendBundle\APPBackendBundle(),
            new APP\CmsBundle\APPCmsBundle(),
            new APP\OrganisationBundle\APPOrganisationBundle(),
            new APP\MainBundle\APPMainBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
