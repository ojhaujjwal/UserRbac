<?php

namespace UserRbac\View\Strategy;

use ZfcRbac\View\Strategy\AbstractStrategy;
use Zend\Authentication\AuthenticationService;
use ZfcRbac\Exception\UnauthorizedExceptionInterface;
use Zend\Mvc\MvcEvent;

class SmartRedirectStrategy extends AbstractStrategy
{
    /**
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * Constructor
     *
     * @param AuthenticationService   $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
    
    /**
     *
     * If user is logged in, it calls UnauthorizedStrategy otherwise it calls RedirectStrategy
     *
     * @param MvcEvent $event
     * @return void
     */
    public function onError(MvcEvent $event)
    {
        $app = $event->getApplication();
        $serviceManager = $app->getServiceManager();
        if ($this->authenticationService->hasIdentity()) {
            $serviceManager->get('ZfcRbac\View\Strategy\UnauthorizedStrategy')->onError($event);
        } else {
            $serviceManager->get('ZfcRbac\View\Strategy\RedirectStrategy')->onError($event);
        }        
    }    
}
