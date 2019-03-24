<?php
namespace ApiStore\v1_0\timestamp;

use asbamboo\api\apiStore\ApiRequestParamsAbstract;
use asbamboo\api\apiStore\traits\CommonApiRequestParamsTrait;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class RequestParams extends ApiRequestParamsAbstract
{
    use CommonApiRequestParamsTrait;

    /**
     * @required 非必填
     * @desc 返回值时间戳的格式
     * @range 请参考:[url]http://php.net/manual/zh/function.date.php[/url]
     * @example Y-m-d H:i:s
     * @var string
     */
    protected $date_format="Y-m-d H:i:s";
}