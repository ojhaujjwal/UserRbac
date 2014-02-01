<?php
namespace UserRbac\Options;

interface ModuleOptionsInterface
{
    public function getTableName();

    public function getDefaultGuestRole();

    public function getDefaultUserRole();

    public function getUserRoleLinkerEntityClass();
}
