<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Application\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Application\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Application\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Application\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Application\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Application\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Application\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Application\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/** @var \Zend\Expressive\Application $app */

$app->get('/', App\Application\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Application\Action\PingAction::class, 'api.ping');
$app->get('/teste', \App\Application\Action\TesteAction::class, 'teste');


$app->get('/customer', \App\Application\Action\Customer\CustormerListAction::class, 'customer.list');