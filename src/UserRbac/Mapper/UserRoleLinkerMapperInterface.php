<?php
namespace UserRbac\Mapper;

use ZfcUser\Entity\UserInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

interface UserRoleLinkerMapperInterface
{
    /**
     * finds roles of a user by his/her id
     *
     * @param int $userId
     */
    public function findByUserId($userId);

    /**
     * finds roles of a user
     *
     * @param UserInterface $user
     */
    public function findByUser(UserInterface $user);

    /**
     * add a new role of a user
     *
     * @param UserRbac\Entity\UserRoleLinkerInterface $userRoleLinker
     *
     */
    public function insert($userRoleLinker, $tableName = null, HydratorInterface $hydrator = null);

    /**
     * deletes a role of a user
     *
     * @param UserRbac\Entity\UserRoleLinkerInterface $userRoleLinker
     *
     */
    public function delete($userRoleLinker, $tableName = null);

    /**
     * finds users with a specific role
     *
     * @param string $roleId
     */
    public function findByRoleId($roleId);
}
