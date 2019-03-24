<?php
namespace ApiStore\v1_0\timestamp;

use asbamboo\api\apiStore\ApiResponseParams;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class ResponseParams extends ApiResponseParams
{
    /**
     * @desc 服务端时间戳
     * @example eval:date('Y-m-d H:i:s')
     * @var string
     */
    protected $timestamp;
}