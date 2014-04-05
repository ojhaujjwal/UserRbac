<?php
namespace UserRbacTest\Factory;

use UserRbac\Factory\ModuleOptionsFactory;
use Zend\ServiceManager\ServiceManager;

class ModuleOptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new ModuleOptionsFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService('Config', ['user_rbac' => []]);

        $this->assertInstanceof('UserRbac\Options\ModuleOptions', $factory->createService($serviceManager));
    }
}
