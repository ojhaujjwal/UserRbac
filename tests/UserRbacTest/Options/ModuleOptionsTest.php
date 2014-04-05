<?php
namespace UserRbacTest\Options;

use UserRbac\Options\ModuleOptions;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $moduleOptions = new ModuleOptions(array(
            'table_name' => 'user_role',
            'default_guest_role' => 'guest_123',
            'default_user_role' => 'member_123',
            'user_role_linker_entity_class' => 'Application\Entity\UserRoleLinker'
        ));
        $this->assertEquals('user_role', $moduleOptions->getTableName());
        $this->assertEquals('guest_123', $moduleOptions->getDefaultGuestRole());
        $this->assertEquals('member_123', $moduleOptions->getDefaultUserRole());
        $this->assertEquals('Application\Entity\UserRoleLinker', $moduleOptions->getUserRoleLinkerEntityClass());
    }

    public function testDefaultValues()
    {
        $moduleOptions = new ModuleOptions;
        $this->assertEquals('user_role_linker', $moduleOptions->getTableName());
        $this->assertEquals('guest', $moduleOptions->getDefaultGuestRole());
        $this->assertEquals('member', $moduleOptions->getDefaultUserRole());
        $this->assertEquals('UserRbac\Entity\UserRoleLinker', $moduleOptions->getUserRoleLinkerEntityClass());
    }

}
