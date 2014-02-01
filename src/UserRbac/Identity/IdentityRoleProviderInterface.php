<?php
namespace UserRbac\Identity;

use ZfcUser\Entity\UserInterface;

interface IdentityRoleProviderInterface
{
    public function getIdentityRoles(UserInterface $user = null);
}
