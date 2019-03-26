<?php
namespace ApiStore\v3_0;

use ApiStore\v2_0\Timestamp AS V2_0Timestamp;
use asbamboo\api\apiStore\ApiRequestParamsInterface;
use asbamboo\api\apiStore\ApiResponseParamsInterface;
use asbamboo\api\exception\ApiException;

/**
 * @name 获取服务端时间戳
 * @desc 获取服务端时间戳(项目v1.0，添加了签名)
 * @desc 这个示例中 security 的值应该时 security。 调试工具的security字段，请手动输入 security
 * @request ApiStore\v2_0\Timestamp\RequestParams
 * @response ApiStore\v1_0\Timestamp\ResponseParams
 * @delete
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class Timestamp extends V2_0Timestamp
{
    /**
     *
     * {@inheritDoc}
     * @see \ApiStore\v1_0\Timestamp::exec()
     */
    public function exec(ApiRequestParamsInterface $Params) : ?ApiResponseParamsInterface
    {
        throw new ApiException("你请求的接口被删除，请改用tools.system.timestamp");
    }
}