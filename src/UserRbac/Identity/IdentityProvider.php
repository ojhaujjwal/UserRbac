<?php

namespace UserRbac\Identity;

use ZfcRbac\Identity\IdentityProviderInterface;

class IdentityProvider implements IdentityProviderInterface
{
    protected $identityRoleProvider;

    public function setIdentityRoleProvider(IdentityRoleProvider $identityRoleProvider)
    {
        $this->identityRoleProvider = $identityRoleProvider;
    }

    public function getIdentityRoleProvider()
    {
        return $this->identityRoleProvider;
    }

    public function getIdentity()
    {
        return $this->getIdentityRoleProvider();
    }
}
