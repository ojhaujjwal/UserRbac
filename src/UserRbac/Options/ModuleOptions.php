<?php

namespace UserRbac\Options;

class ModuleOptions implements ModuleOptionsInterface
{
    /**
     * @var string 
     */
    protected $tableName;

    /**
     * @var string      Default Role of unauthenticated user
     */
    protected $defaultGuestRole = 'default';

    /**
     * @var string      Default Role of authenticated user(when no role of that user is found in the database)
     */
    protected $defaultUserRole = 'member';

    /**
     * @var string
     */
    protected $userRoleLinkerEntityClass;

    /**
     * Sets table name
     *
     * @var string $tableName
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
     * @return string 
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Sets default Role for unauthenticated user
     *
     * @param string $defaultGuestRole
     * @return self
     */
    public function setDefaultGuestRole($defaultGuestRole)
    {
        $this->defaultGuestRole = $defaultGuestRole;

        return $this;
    }

    /**
     * Gets default Role for unauthenticated user
     *
     * @return string 
     */
    public function getDefaultGuestRole()
    {
        return $this->defaultGuestRole;
    }

    /**
     * Sets default user role
     *
     * @param string $defaultUserRole
     * @return self
     */
    public function setDefaultUserRole($defaultUserRole)
    {
        $this->defaultUserRole = $defaultUserRole

        return $this;
    }

    /**
     * Gets default user role
     *
     * @return string 
     */
    public function getDefaultUserRole()
    {
        return $this->defaultUserRole;
    }

    /**
     * Sets entity class of user_role_linker
     *
     * @param string $userRoleLinkerEntityClass
     * @return self
     */
    public function setUserRoleLinkerEntityClass($userRoleLinkerEntityClass)
    {
        $this->userRoleLinkerEntityClass = $userRoleLinkerEntityClass;

        return $this;
    }

    /**
     * Gets entity class of user_role_linker
     *
     * @return string 
     */
    public function getUserRoleLinkerEntityClass()
    {
        return $this->userRoleLinkerEntityClass;
    }
}
