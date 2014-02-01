<?php

namespace UserRbac\Entity;

use ZfcUser\Entity\UserInterface;

class UserRoleLinker implements UserRoleLinkerInterface
{
    /**
     * @var int $userId    User Id
     */
    protected $userId;

    /**
     * @var string $roleId    Role
     */
    protected $roleId;

    /**
     * Sets user id
     *
     * @param int $userId
     * @return self
     */
    public function setUserId($userId)
    {
        $this->userId = (int) $userId;

        return $this;
    }

    /**
     * Gets user id
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Sets user
     *
     * @param UserInterface $user
     * @return self
     */
    public function setUser(UserInterface $user)
    {
        $this->setUserId($user->getId());

        return $this;
    }

    /**
     * Sets Role
     *
     * @param string $roleId
     * @return self
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Gets Role
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }
}
