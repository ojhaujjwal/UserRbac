<?php

namespace UserRbac\Identity;

use ZfcRbac\Identity\IdentityInterface;
use UserRbac\Mapper\UserRoleLinkerMapperInterface;
use ZfcUser\Entity\UserInterface;
use UserRbac\Options\ModuleOptionsInterface;

class IdentityRoleProvider implements IdentityInterface
{
    /**
     * @var ModuleOptionsInterface
     */
    protected $moduleOptions;

    /**
     * @var UserRoleLinkerMapperInterface
     */
    protected $userRoleLinkerMapper;

    /**
     * @var UserInterface
     */
    protected $defaultIdentity;

    /**
     * Sets module options
     * 
     * @param ModuleOptionsInterface $moduleOptions
     * @return self
     */
    public function setModuleOptions(ModuleOptionsInterface $moduleOptions)
    {
        $this->moduleOptions = $moduleOptions;

        return $this;
    }

    /**
     * Gets module options
     * 
     * @return ModuleOptionsInterface 
     */
    public function getModuleOptions()
    {
        return $this->moduleOptions;
    }

    /**
     * Sets user role linker mapper
     *
     * @param UserRoleLinkerMapperInterface $userRoleLinkerMapper
     * @return self
     */
    public function setUserRoleLinkerMapper(UserRoleLinkerMapperInterface $userRoleLinkerMapper)
    {
        $this->userRoleLinkerMapper = $userRoleLinkerMapper;

        return $this;
    }

    /**
     * Gets user role linker mapper
     *
     * @return UserRoleLinkerMapperInterface 
     */
    public function getUserRoleLinkerMapper()
    {
        return $this->userRoleLinkerMapper;
    }

    /**
     * Sets identity of currently logged in user
     *
     * @param UserInterface $defaultIdentity
     * @return self 
     */
    public function setDefaultIdentity(UserInterface $defaultIdentity)
    {
        $this->defaultIdentity = $defaultIdentity;

        return $this;
    }

    /**
     * Gets identity of currently logged in user
     *
     * @return UserInterface  
     */
    public function getDefaultIdentity()
    {
        return $this->defaultIdentity;
    }

    /**
     * Get the list of roles of this identity(currently logged in user)
     *
     * @return string[]
     */
    public function getRoles()
    {
        return $this->getIdentityRole();
    }

    /**
     * Get the list of roles of a user
     *
     * @return string[]
     */
    public function getIdentityRole(UserInterface $user = null)
    {
        if ($user === null) {
            $user = $this->getDefaultIdentity();
            if (!$user) {
                return (array) $this->getModuleOptions()->getDefaultGuestRole();
            }
        }
        
        $resultSet = $this->getUserRoleLinkerMapper()->findByUser($user);

        if (count($resultSet) > 0) { // if exists in database
            $roles = array();
            foreach ($resultSet  as $userRoleLinker) {
                $roles[] = $userRoleLinker->getRoleId();
            }

            return $roles;
        } else {
            return (array) $this->getModuleOptions()->getDefaultUserRole();
        }

    }
}
