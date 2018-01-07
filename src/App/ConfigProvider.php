<?php

namespace App;


/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Application\Action\PingAction::class => Application\Action\PingAction::class,
            ],
            'factories'  => [
                Application\Action\HomePageAction::class => Application\Action\HomePageFactory::class,
                Application\Action\TesteAction::class => Application\Action\TestFactory::class,
                Application\Middleware\BootstrapMiddleware::class => Application\Middleware\BootstrapFactory::class,
                Domain\Persistence\CustomerRepositoryInterface::class => Infrastructure\Persistence\Doctrine\Repository\CustomerRepositoryFactory::class,
                Application\Action\Customer\CustormerListAction::class => Application\Action\Customer\CustomerListFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => ['templates/app'],
                'error'  => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
