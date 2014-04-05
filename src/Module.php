<?php
namespace UserRbac;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements 
    ConfigProviderInterface,
    AutoloaderProviderInterface,
    ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/../autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'UserRbac\ModuleOptions' => 'UserRbac\Factory\ModuleOptionsFactory',
                'UserRbac\UserRoleLinkerMapper' => 'UserRbac\Factory\UserRoleLinkerMapperFactory',
                'UserRbac\Identity\IdentityProvider' => 'UserRbac\Factory\IdentityProviderFactory',
                'UserRbac\Identity\IdentityRoleProvider' => 'UserRbac\Factory\IdentityRoleProviderFactory',
                'UserRbac\View\Strategy\SmartRedirectStrategy' => 'UserRbac\Factory\SmartRedirectStrategyFactory',
            ],
            'aliases' => [
                'UserRbac\DbAdapter' => 'Zend\Db\Adapter\Adapter',
                'Zend\Authentication\AuthenticationService' => 'zfcuser_auth_service',
            ]
        ];
    }
}
