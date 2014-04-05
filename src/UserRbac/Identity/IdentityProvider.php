<?php

namespace UserRbac\Identity;

use ZfcRbac\Identity\IdentityProviderInterface;

class IdentityProvider implements IdentityProviderInterface
{
    protected $identityRoleProvider;

    public function __construct(IdentityRoleProvider $identityRoleProvider)
    {
        $this->identityRoleProvider = $identityRoleProvider;
    }

    public function getIdentity()
    {
        return $this->identityRoleProvider;
    }
}
