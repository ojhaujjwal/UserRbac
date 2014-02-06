<?php

namespace UserRbac\Entity;

interface UserRoleLinkerInterface
{
    /**
     * Sets userId
     *
     * @param int $userId
     * @return self
     */
    public function setUserId($userId);

    /**
     * Gets userId
     * 
     * @return int
     */
    public function getUserId();

    /**
     * Sets roleId
     *
     * @param string $roleId
     * @return self
     */
    public function setRoleId($roleId);

    /**
     * Gets roleId
     *
     * @return string
     */
    public function getRoleId();
}
