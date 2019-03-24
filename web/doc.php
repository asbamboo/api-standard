<?php
use asbamboo\http\ServerRequestInterface;
use asbamboo\api\ControllerInterface;

$autoload   = require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * @var ApiStoreInterface $ApiStore
 * @var ServerRequestInterface $Request
 * @var ControllerInterface $Controller
 * @var Container $Container
 */
$Container  = new Container();

$Request    = $Container->get(ServerRequestInterface::class);
$Controller = $Container->get(ControllerInterface::class);

$document_name  = "asbamboo api standard doc";
$version        = (string) $Request->getRequestParam('version');
$api_name       = (string) $Request->getRequestParam('api_name');
$Response       = $Controller->doc($document_name, $version, $api_name);

$Response->send();