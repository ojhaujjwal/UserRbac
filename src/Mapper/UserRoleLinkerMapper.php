<?php

namespace UserRbac\Mapper;

use ZfcBase\Mapper\AbstractDbMapper;
use ZfcUser\Entity\UserInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use UserRbac\Entity\UserRoleLinkerInterface;
use Zend\Db\Sql\Select;
use ZfcUser\Entity\User;
use ZfcUser\Mapper\UserHydrator;
use ZfcUser\Options\ModuleOptions as ZfcUserOptions;

class UserRoleLinkerMapper extends AbstractDbMapper implements UserRoleLinkerMapperInterface
{
    /**
     * @var string  Table Name
     */
    protected $tableName = 'user_role_linker';

    /**
     * @var ZfcUserOptions
     */
    protected $zfcUserOptions;

    /**
     * @var HydratorInterface
     */
    protected $zfcUserHydrator;

    /**
     * Finds roles of a user by his/her id
     *
     * @param  int                                        $userId
     * @return Zend\Db\ResultSet\HydratingResultSet|array
     */
    public function findByUserId($userId)
    {
        $select = $this->getSelect();
        $select->where(array('user_id' => $userId));

        return $this->select($select);
    }

    /**
     * {@inheritDoc}
     *
     */
    public function findByUser(UserInterface $user)
    {
        return $this->findByUserId($user->getId());
    }

    /**
     * Finds users with a specific role
     *
     * @param  string                               $roleId
     * @return Zend\Db\ResultSet\HydratingResultSet
     */
    public function findByRoleId($roleId)
    {
        $select = $this->getSelect($this->getUserTableName());
        $select->where(array($this->getTableName() . '.role_id' => $roleId));
        $select->join(
            $this->getTableName(),
            $this->getTableName(). '.user_id = ' . $this->getUserTableName(). '.user_id',
            array(),
            Select::JOIN_INNER
        );
        $select->group($this->getUserTableName(). '.user_id');

        $entityPrototype = $this->getZfcUserOptions()->getUserEntityClass();

        return $this->select($select, new $entityPrototype, $this->getZfcUserHydrator());
    }

    /**
     * Add a new role of a user
     *
     * @param  UserRbac\Entity\UserRoleLinkerInterface $userRoleLinker
     * @return mixed
     */
    public function insert($userRoleLinker, $tableName = null, HydratorInterface $hydrator = null)
    {
        $this->checkEntity($userRoleLinker);

        return parent::insert($userRoleLinker);
    }

    /**
     * Deletes a role of a user
     *
     * @param  UserRoleLinkerInterface $userRoleLinker
     * @return mixed
     */
    public function delete($userRoleLinker, $tableName = null)
    {
        $this->checkEntity($userRoleLinker);

        return parent::delete(array('user_id' => $userRoleLinker->getUserId(), 'role_id' => $userRoleLinker->getRoleId()));
    }

    /**
     * Checks if the provided entity is instance of UserRbac\Entity\UserRoleLinkerInterface
     *
     * @param  mixed                              $userRoleLinker
     * @return void
     * @throws Exception\InvalidArgumentException
     */
    protected function checkEntity($userRoleLinker)
    {
        if (!$userRoleLinker instanceof UserRoleLinkerInterface) {
            throw new Exception\InvalidArgumentException('Instance of UserRbac\Entity\UserRoleLinkerInterface expected');
        }
    }

    /**
     * Sets table name
     *
     * @param  string $tableName
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Gets table name
     *
     * @return string $tableName
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Sets ZfcUser Module Options
     *
     * @param  ZfcUserOptions $zfcUserOptions
     * @return self
     */
    public function setZfcUserOptions(ZfcUserOptions $zfcUserOptions)
    {
        $this->zfcUserOptions = $zfcUserOptions;

        return $this;
    }

    /**
     * Gets ZfcUser Module Options
     *
     * @return ZfcUserOptions
     */
    public function getZfcUserOptions()
    {
        return $this->zfcUserOptions;
    }

    /**
     * Gets table name of users
     *
     * @return string
     */
    public function getUserTableName()
    {
        return $this->getZfcUserOptions()->getTableName();
    }

    /**
     * Sets User Hydrator
     *
     * @param  UserHydrator $hydrator
     * @return self
     */
    public function setZfcUserHydrator(UserHydrator $hydrator)
    {
        $this->zfcUserHydrator = $hydrator;

        return $this;
    }

    /**
     * Gets User Hydrator
     *
     * @return UserHydrator
     */
    public function getZfcUserHydrator()
    {
        return $this->zfcUserHydrator;
    }
}
