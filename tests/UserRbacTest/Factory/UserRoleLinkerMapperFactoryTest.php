<?php
namespace UserRbacTest\Factory;

use UserRbac\Factory\UserRoleLinkerMapperFactory;
use Zend\ServiceManager\ServiceManager;
use UserRbac\Options\ModuleOptions;

class UserRoleLinkerMapperFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new UserRoleLinkerMapperFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('UserRbac\ModuleOptions', new ModuleOptions);
        $adapter = $this->getMockBuilder('Zend\Db\Adapter\Adapter')
            ->disableOriginalConstructor()
            ->getMock();
        $serviceManager->setService('UserRbac\DbAdapter', $adapter);
        
        $this->assertInstanceOf('UserRbac\Mapper\UserRoleLinkerMapper', $factory->createService($serviceManager));
    }
}
