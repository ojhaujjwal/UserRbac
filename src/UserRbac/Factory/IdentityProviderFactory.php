<?php
namespace UserRbac\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use UserRbac\Identity\IdentityProvider;

class IdentityProviderFactory implements FactoryInterface
{
    /**
     * Gets identity provider
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return IdentityProvider
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $identityProvider = new IdentityProvider($serviceLocator->get('UserRbac\Identity\IdentityRoleProvider'));

        return $identityProvider;
    }
}
