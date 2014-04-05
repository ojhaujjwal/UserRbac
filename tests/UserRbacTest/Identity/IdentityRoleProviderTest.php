<?php
namespace UserRbacTest\Identity;

use UserRbac\Identity\IdentityRoleProvider;
use UserRbac\Options\ModuleOptions;
use ZfcUser\Entity\User;
use UserRbac\Entity\UserRoleLinker;

class IdentityRoleProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDefaultRoleOfUnauthenticatedUser()
    {
        $options = new ModuleOptions(['default_guest_role' => 'special_guest']);
        $identityRoleProvider = new IdentityRoleProvider(
            $this->getMock('UserRbac\Mapper\UserRoleLinkerMapperInterface'),
            $options
        );
        $this->assertEquals(['special_guest'], $identityRoleProvider->getRoles());
    }

    public function testGetDefaultRoleOfAuthenticatedUser()
    {
        $options = new ModuleOptions(['default_user_role' => 'default_user_role123']);
        $mapper = $this->getMock('UserRbac\Mapper\UserRoleLinkerMapperInterface');
        $identityRoleProvider = new IdentityRoleProvider(
            $mapper,
            $options
        );
        $user = new User;
        $identityRoleProvider->setDefaultIdentity($user);
        $mapper->expects($this->any())
            ->method('findByUser')
            ->will($this->returnValueMap([[$user, []]]));
        $this->assertEquals(['default_user_role123'], $identityRoleProvider->getRoles());                    
    }

    public function testGetIdentityRoles()
    {
        $options = new ModuleOptions();
        $mapper = $this->getMock('UserRbac\Mapper\UserRoleLinkerMapperInterface');
        $identityRoleProvider = new IdentityRoleProvider(
            $mapper,
            $options
        );
        $identity = new User;
        $identityRoleProvider->setDefaultIdentity($identity);
        $user = new User;
        $map = [
            [$identity, [new UserRoleLinker($identity, 'role1'), new UserRoleLinker($identity, 'role2')]],
            [$user, [new UserRoleLinker($user, 'role1'), new UserRoleLinker($user, 'role3')]],
        ];
        $mapper->expects($this->any())
            ->method('findByUser')
            ->will(
                $this->returnValueMap($map)
            );
        $this->assertEquals(['role1', 'role2'], $identityRoleProvider->getRoles());             
        $this->assertEquals(['role1', 'role3'], $identityRoleProvider->getIdentityRoles($user));  
    }
}
