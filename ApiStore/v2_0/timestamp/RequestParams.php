<?php
namespace ApiStore\v2_0\timestamp;

use ApiStore\v1_0\timestamp\RequestParams AS V1_0RequestParams;
use asbamboo\api\apiStore\traits\CommonApiRequestTimestampParamsTrait;
use asbamboo\api\apiStore\traits\CommonApiRequestSignParamsTrait;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class RequestParams extends V1_0RequestParams
{
    /*
     * 请求参数过期失效
     */
    use CommonApiRequestTimestampParamsTrait;

    /*
     * 签名参数
     */
    use CommonApiRequestSignParamsTrait;
}
