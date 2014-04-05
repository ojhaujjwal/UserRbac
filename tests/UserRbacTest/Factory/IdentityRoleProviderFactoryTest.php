<?php
namespace UserRbacTest\Factory;

use UserRbac\Factory\IdentityRoleProviderFactory;
use Zend\ServiceManager\ServiceManager;
use UserRbac\Identity\IdentityRoleProvider;
use UserRbac\Options\ModuleOptions;
use ZfcUser\Entity\User;

class IdentityRoleProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new IdentityRoleProviderFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('UserRbac\UserRoleLinkerMapper', $this->getMock('UserRbac\Mapper\UserRoleLinkerMapperInterface'));
        $serviceManager->setService('UserRbac\ModuleOptions', new ModuleOptions);
        $authenticationService = $this->getMock('Zend\Authentication\AuthenticationService');
        $authenticationService->expects($this->any())
            ->method('hasIdentity')
            ->will($this->returnValue(false));
        $serviceManager->setService('zfcuser_auth_service', $authenticationService);
        $identityRoleProvider = $factory->createService($serviceManager);
        $this->assertInstanceOf('UserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertEquals(null, $identityRoleProvider->getDefaultIdentity());
        
        $authenticationService = $this->getMock('Zend\Authentication\AuthenticationService');
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('zfcuser_auth_service', $authenticationService);
        $authenticationService->expects($this->any())
            ->method('hasIdentity')
            ->will($this->returnValue(true));
        $authenticationService->expects($this->any())
            ->method('getIdentity')
            ->will($this->returnValue($user = new User));
        $identityRoleProvider = $factory->createService($serviceManager);
        $this->assertInstanceOf('UserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertEquals($user, $identityRoleProvider->getDefaultIdentity());
    }
}
