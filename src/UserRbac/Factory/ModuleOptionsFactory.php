<?php
namespace UserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use UserRbac\Options\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * gets ModuleOptions
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $moduleConfig = isset($config['user_rbac']) ? $config['user_rbac'] : array();

        return new ModuleOptions($moduleConfig);
    }
}
