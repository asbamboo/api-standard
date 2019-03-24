<?php
use asbamboo\http\ServerRequestInterface;
use asbamboo\api\ControllerInterface;

$autoload   = require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * @var ApiStoreInterface $ApiStore
 * @var ServerRequestInterface $Request
 * @var Container $Container
 */
$Container  = new Container();
$Request    = $Container->get(ServerRequestInterface::class);
$Controller = $Container->get(ControllerInterface::class);

$tool_name  = 'asbamboo api standard test tool';
$version    = (string) $Request->getRequestParam('version');
$api_name   = (string) $Request->getRequestParam('api_name');
$uri        = (string) $Request->getRequestParam('uri');
$Response   = $Controller->testTool($tool_name, $version , $api_name, $uri);
$Response->send();