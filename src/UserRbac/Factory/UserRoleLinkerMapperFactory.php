<?php
namespace UserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use UserRbac\Mapper\UserRoleLinkerMapper;

class UserRoleLinkerMapperFactory implements FactoryInterface
{
    /**
     * Gets user role linker
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return UserRoleLinkerMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new UserRoleLinkerMapper;
        $options = $serviceLocator->get('UserRbac\ModuleOptions');
        $class = $options->getUserRoleLinkerEntityClass();
        $mapper->setEntityPrototype(new $class);
        $mapper->setDbAdapter($serviceLocator->get('UserRbac\DbAdapter'));

        return $mapper;
    }
}
