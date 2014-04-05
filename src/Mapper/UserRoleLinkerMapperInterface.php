<?php
namespace UserRbac\Mapper;

use ZfcUser\Entity\UserInterface;

interface UserRoleLinkerMapperInterface
{
    /**
     * Finds roles of a user
     *
     * @param  UserInterface                              $user
     * @return \Zend\Db\ResultSet\HydratingResultSet|array
     */
    public function findByUser(UserInterface $user);
}
