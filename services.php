<?php

use asbamboo\http\ServerRequest;
use asbamboo\http\ServerRequestInterface;
use asbamboo\api\apiStore\ApiStoreInterface;
use asbamboo\api\apiStore\ApiStore;
use asbamboo\api\document\DocumentInterface;
use asbamboo\api\document\Document;
use asbamboo\api\apiStore\ApiRequestUris;
use asbamboo\api\apiStore\ApiRequestUrisInterface;
use asbamboo\router\RouterInterface;
use asbamboo\router\Router;
use asbamboo\router\RouteCollection;
use asbamboo\router\Route;
use asbamboo\api\Controller;
use asbamboo\api\ControllerInterface;
use asbamboo\api\tool\test\Test;
use asbamboo\api\tool\test\TestInterface;
use asbamboo\api\apiStore\ApiRequestUri;

$scheme                             = $_SERVER['REQUEST_SCHEME']??'http';
$host                               = $_SERVER['HTTP_HOST'];
$request_uri                        = $_SERVER['REQUEST_URI'];
$request_uri_path                   = parse_url($request_uri, PHP_URL_PATH);
$test_tool_uri_path                 = preg_replace('@^(.*/)(\w+\.php)$@', "$1test.php", $request_uri_path);
$api_url_path                       = preg_replace('@^(.*/)(\w+\.php)$@', "$1api.php", $request_uri_path);
$api_url                            = $scheme . '://' . $host . $api_url_path;

$Request                            = new ServerRequest();
$ApiStore                           = new ApiStore('ApiStore', __DIR__ . '/ApiStore');
$Document                           = new Document($ApiStore);
$ApiRequestUri                      = new ApiRequestUri($api_url, '开发环境请求地址', 'developer');
$ApiRequestUris                     = new ApiRequestUris($ApiRequestUri);
$Test                               = new Test();
$Controller                         = new Controller($ApiStore, $Request);


/*
 * 如果没有声明这个路由配置，那么在文档说明中不会出现测试工具的链接。
 * 可以通过$Document->setTestToolUri()
 */
$RouteCollection                    = new RouteCollection();
$Router                             = new Router($RouteCollection);
$RouteCollection->add(new Route("test_tool", $test_tool_uri_path, [$Controller, 'testTool']));

return [
    ServerRequestInterface::class   => $Request,
    ApiStoreInterface::class        => $ApiStore,
    DocumentInterface::class        => $Document,
    ApiRequestUrisInterface::class  => $ApiRequestUris,
    RouterInterface::class          => $Router,
    ControllerInterface::class      => $Controller,
    TestInterface::class            => $Test,
];