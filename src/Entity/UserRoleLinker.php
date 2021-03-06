<?php

namespace UserRbac\Entity;

use ZfcUser\Entity\UserInterface;

/**
 * Entity of table, 'user_role_linker'
 */
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
     * Constructor
     *
     * @param UserInterface|null $user
     * @param string|null        $roleId
     */
    public function __construct(UserInterface $user = null, $roleId = null)
    {
        if ($user) {
            $this->setUser($user);
        }
        if ($roleId) {
            $this->setRoleId($roleId);
        }
    }

    /**
     * Sets user`s id
     *
     * @param  int  $userId
     * @return self
     */
    public function setUserId($userId)
    {
        $this->userId = (int) $userId;

        return $this;
    }

    /**
     * Gets user`s id
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
     * @param  UserInterface $user
     * @return self
     */
    public function setUser(UserInterface $user)
    {
        $this->setUserId($user->getId());

        return $this;
    }

    /**
     * Sets role
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
     * {@inheritDoc}
     */
    public function getRoleId()
    {
        return $this->roleId;
    }
}
