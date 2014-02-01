<?php
namespace UserRbac;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'UserRbac\ModuleOptions' => 'UserRbac\Factory\ModuleOptionsFactory',
                'UserRbac\UserRoleLinkerMapper' => 'UserRbac\Factory\UserRoleLinkerMapperFactory',
                'UserRbac\Identity\IdentityProvider' => 'UserRbac\Factory\IdentityProviderFactory',
                'UserRbac\Identity\IdentityRoleProvider' => 'UserRbac\Factory\IdentityRoleProviderFactory',
                'UserRbac\View\Strategy\SmartRedirectStrategy' => 'UserRbac\Factory\SmartRedirectStrategyFactory',
            ),
            'aliases' => array(
                'UserRbac\DbAdapter' => 'Zend\Db\Adapter\Adapter',
                'Zend\Authentication\AuthenticationService' => 'zfcuser_auth_service',
            )
        );
    }
}
