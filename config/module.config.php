<?php
return array(
    'zfc_rbac' => array(
        'identity_provider' => 'UserRbac\Identity\IdentityProvider',
        'redirect_strategy' => [
            'redirect_to_route_connected'    => 'zfcuser',
            'redirect_to_route_disconnected' => 'zfcuser/login',
            'append_previous_uri'            => true,
            'previous_uri_query_key'         => 'redirect'
        ],
    )
);
