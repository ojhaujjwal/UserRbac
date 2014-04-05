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
        return new ModuleOptions($serviceLocator->get('Config')['user_rbac']);
    }
}
