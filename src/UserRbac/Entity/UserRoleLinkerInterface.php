<?php

namespace UserRbac\Entity;

interface UserRoleLinkerInterface
{
    /**
     * Sets user id
     *
     * @param int $userId
     */
    public function setUserId($userId);

    /**
     * Gets user id
     * 
     * @return int
     */
    public function getUserId();

    /**
     * Sets Role
     *
     * @param string $roleId
     * @return self
     */
    public function setRoleId($roleId);

    /**
     * Gets Role
     *
     * @return string
     */
    public function getRoleId();
}
