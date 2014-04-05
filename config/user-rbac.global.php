<?php
/**
 * UserRbac Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */

$options = array(
    /**
     * Table name of user role linker
     *
     * Default: 'user_role_linker'
     */
    //'table_name' => 'user_role_linker',

    /**
     * Role Of unauthenticated user
     *
     * Specify Role of unauthenticated user(when user is not logged in).
     * Default: 'guest'
     */
    //'default_guest_role' => 'guest',

    /**
     * Default Role Of authenticated user
     *
     * Default Role of authenticated user(when no role of that user is found in the database)
     * Default: 'member'
     */
    //'default_user_role' => 'member',

    /**
     * User Role Linker Entity Class
     *
     * Class name of User Role Linker Entity
     * Default: UserRbac\Entity\UserRoleLinker
     */
    //'user_role_linker_entity_class' => 'UserRbac\Entity\UserRoleLinker',
);

/**
 * You do not need to edit below this line
 */

return array(
    'user_rbac' => $options
);
