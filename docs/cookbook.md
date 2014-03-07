Cookbook
===========
This module only deals linking user with the role and rest is handled by [ZfcRbac](https://github.com/ZF-Commons/zfc-rbac).

Just for example, we will have three roles:
```php
<?php
return [
    'zfc_rbac' => [
        'role_provider' => [
            'ZfcRbac\Role\InMemoryRoleProvider' => [
                'admin' => [
                    'children'    => ['member'],
                    'permissions' => [
                        'post.delete'
                    ]
                ],
                'member' => [
                    'children'    => ['guest'],
                    'permissions' => [
                        'post.add',
                        'post.edit',
                    ]
                ],
                'guest' => [
                    'permissions' => [
                        'post.view',
                    ]
                ]
            ]
        ],
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'backend*' => ['member'],
            ]        
        ]
    ],
];

```
To add a role to the user, or edit a user`s role from you controller:
```php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use UserRbac\Entity\UserRoleLinker;

Class MyUserController extends AbstractActionController
{
    protected $userRoleLinkerMapper;
  
    public function addAction()
    {
        // support user($user) is already added
        $userRoleLinker = new UserRoleLinker();
        $userRoleLinker->setUser($user);
        $userRoleLinker->setRoleId('member');
        $this->getUserRoleLinkerMapper()->insert($userRoleLinker);   // role is added to the user   
    }
    
    public function editAction()
    {
        // to edit the role of a user, you will have to delete the record and add a new record
        // suppose $user is an instance of ZfcUser\Entity\UserInterface
        $userRoleLinker = $this->getUserRoleLinkerMapper()->findByUser($user)->current(); // if a user has only one role
        $this->getUserRoleLinkerMapper()->delete($userRoleLinker);
        $userRoleLinker->setRoleId('admin');
        $this->getUserRoleLinkerMapper()->insert($userRoleLinker);      
    }
    
    public function getUserRoleLinkerMapper()
    {
        if (!$this->userRoleLinkerMapper) {
            $this->userRoleLinkerMapper = $this->getServiceLocator()->get('UserRbac\UserRoleLinkerMapper');
        }

        return $this->userRoleLinkerMapper;
    }    
}
```
