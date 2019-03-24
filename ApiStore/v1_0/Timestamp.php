<?php
namespace ApiStore\v1_0;

use asbamboo\api\apiStore\ApiClassInterface;
use asbamboo\api\apiStore\ApiRequestParamsInterface;
use asbamboo\api\apiStore\ApiResponseParamsInterface;
use ApiStore\v1_0\timestamp\ResponseParams;

/**
 * @name 获取服务端时间戳
 * @desc 获取服务端时间戳
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class Timestamp implements ApiClassInterface
{
    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\api\apiStore\ApiClassInterface::exec()
     */
    public function exec(ApiRequestParamsInterface $Params) : ?ApiResponseParamsInterface
    {
        $format = $Params->getDateFormat();
        return new ResponseParams([
            'timestamp' => date($format),
        ]);
    }
}