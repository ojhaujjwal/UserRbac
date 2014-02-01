<?php

namespace UserRbacTest\Options;
use UserRbac\Options\ModuleOptions;

class ModuleOptionsTest extends \PhpUnit_Framework_TestCase
{
    protected $moduleOptions;

    public function SetUp()
    {
        $this->moduleOptions = new ModuleOptions(array(
            'table_name' => 'user_role',
            'default_guest_role' => 'guest_123',
            'default_user_role' => 'member_123',
            'user_role_linker_entity_class' => 'UserRbac\Entity\UserRoleLinker'
        ));
    }

    public function testSettersGetters()
    {
        $this->assertEquals('user_role', $this->moduleOptions->getTableName());
        $this->assertEquals('guest_123', $this->moduleOptions->getDefaultGuestRole());
        $this->assertEquals('member_123', $this->moduleOptions->getDefaultUserRole());
        $this->assertEquals('UserRbac\Entity\UserRoleLinker', $this->moduleOptions->getUserRoleLinkerEntityClass());
    }
    
}
