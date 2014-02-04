<?php
    
namespace UserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use UserRbac\Identity\IdentityRoleProvider;

class IdentityRoleProviderFactory implements FactoryInterface
{
    /**
     * Gets identity role provider
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return IdentityRoleProvider
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $identityRoleProvider = new IdentityRoleProvider();
        $identityRoleProvider->setUserRoleLinkerMapper($serviceLocator->get('UserRbac\UserRoleLinkerMapper'));
        $identityRoleProvider->setModuleOptions($serviceLocator->get('UserRbac\ModuleOptions'));
        if ($serviceLocator->get('zfcuser_auth_service')->hasIdentity()) {
            $identityRoleProvider->setDefaultIdentity(
                $serviceLocator->get('zfcuser_auth_service')->getIdentity()
            );
        }

        return $identityRoleProvider;
    }
}
