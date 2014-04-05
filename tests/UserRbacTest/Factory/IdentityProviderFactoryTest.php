<?php
namespace UserRbacTest\Factory;

use UserRbac\Factory\IdentityProviderFactory;
use Zend\ServiceManager\ServiceManager;

class IdentityProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new IdentityProviderFactory;
        $serviceManager = new ServiceManager;
        $identityRoleProvider = $this->getMockBuilder('UserRbac\Identity\IdentityRoleProvider')
            ->disableOriginalConstructor()
            ->getMock();
        $serviceManager->setService('UserRbac\Identity\IdentityRoleProvider', $identityRoleProvider);
        $this->assertInstanceOf('UserRbac\Identity\IdentityProvider', $factory->createService($serviceManager));
    }
}
