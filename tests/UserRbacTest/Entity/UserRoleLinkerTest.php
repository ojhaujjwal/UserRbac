<?php
namespace UserRbacTest\Entity;

use UserRbac\Entity\UserRoleLinker;
use ZfcUser\Entity\User;

class UserRoleLinkerTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterAndGetters()
    {
        $entity = new UserRoleLinker;
        $entity->setUserId(178);
        $entity->setRoleId('manager');
        $this->assertEquals(178, $entity->getUserId());
        $this->assertEquals('manager', $entity->getRoleId());
        $user = new User;
        $user->setId(155);
        $entity->setUser($user);
        $this->assertEquals(155, $entity->getUserId());
    }
}
