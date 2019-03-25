<?php
use asbamboo\http\ServerRequestInterface;
use asbamboo\api\ControllerInterface;
use asbamboo\event\EventScheduler;
use asbamboo\api\Event;
use asbamboo\api\eventListener\ApiPreExecUseCheckerListener;
use asbamboo\api\apiStore\validator\CheckerCollection;
use asbamboo\api\apiStore\validator\TimestampChecker;
use asbamboo\api\apiStore\validator\SignCheckerByFixedSecurity;

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

/*
 * 事件监听
 */
$CheckerCollection  = new CheckerCollection(
    /*
     * 请求参数过期失效(接口请求参数：timestamp)
     */
    new TimestampChecker($Request),
    /*
     * 验证签名字段
     *  - 这里默认用于生成签名的app_security值是 security，
     *  - 请手动在调试工具的security字段，输入值 security， 否则签名无效。
     *  - 你可以改变app_security值，将下面的构造参数修改一下：new SignCheckerByFixedSecurity($Request, 'app_key', 'sign', 'custom_security')
     *  - 如果你需要动态的使每个不同的app_key，具有不同的app_security，请继承SignCheckerAbstract类，自行实现getAppSecurity方法。
     */
    new SignCheckerByFixedSecurity($Request)
);
EventScheduler::instance()->bind(Event::API_PRE_EXEC, [new ApiPreExecUseCheckerListener($CheckerCollection), "onCheck"]);

$version    = (string) $Request->getRequestParam('version', '');
$api_name   = (string) $Request->getRequestParam('api_name', '');
$Response   = $Controller->api($version, $api_name);
$Response->send();