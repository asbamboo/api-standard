<?php
namespace ApiStore\v2_0;

use ApiStore\v1_0\Timestamp AS V1_0Timestamp;

/**
 * @name 获取服务端时间戳
 * @desc 获取服务端时间戳(项目v1.0，添加了签名)
 * @desc 这个示例中 security 的值应该时 security。 调试工具的security字段，请手动输入 security
 * @response ApiStore\v1_0\Timestamp\ResponseParams
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class Timestamp extends V1_0Timestamp
{

}