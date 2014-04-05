<?php

namespace UserRbac\Entity;

use ZfcUser\Entity\UserInterface;

interface UserRoleLinkerInterface
{ 
    /**
     * Gets role
     *
     * @return string
     */
    public function getRoleId();
}
