<?php
namespace UserRbacTest\Factory;

use UserRbac\Factory\IdentityRoleProviderFactory;
use Zend\ServiceManager\ServiceManager;
use UserRbac\Identity\IdentityRoleProvider;
use UserRbac\Options\ModuleOptions;
use Zend\Authentication\AuthenticationService;

class IdentityRoleProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new IdentityRoleProviderFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('UserRbac\UserRoleLinkerMapper', $this->getMock('UserRbac\Mapper\UserRoleLinkerMapperInterface'));
        $serviceManager->setService('UserRbac\ModuleOptions', new ModuleOptions);
        $serviceManager->setService('zfcuser_auth_service', new AuthenticationService);

        $this->assertInstanceOf('UserRbac\Identity\IdentityRoleProvider', $factory->createService($serviceManager));
    }
}
