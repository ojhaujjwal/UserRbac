<?php
namespace UserRbac\Mapper;

use ZfcUser\Entity\UserInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

interface UserRoleLinkerMapperInterface
{
    /**
     * finds roles of a user by his/her id
     *
     * @param  int                                        $userId
     * @return Zend\Db\ResultSet\HydratingResultSet|array
     */
    public function findByUserId($userId);

    /**
     * finds roles of a user
     *
     * @param  UserInterface                              $user
     * @return Zend\Db\ResultSet\HydratingResultSet|array
     */
    public function findByUser(UserInterface $user);

    /**
     * add a new role of a user
     *
     * @param  UserRbac\Entity\UserRoleLinkerInterface $userRoleLinker
     * @return mixed
     *
     */
    public function insert($userRoleLinker, $tableName = null, HydratorInterface $hydrator = null);

    /**
     * deletes a role of a user
     *
     * @param  UserRoleLinkerInterface $userRoleLinker
     * @return mixed
     *
     */
    public function delete($userRoleLinker, $tableName = null);

}
