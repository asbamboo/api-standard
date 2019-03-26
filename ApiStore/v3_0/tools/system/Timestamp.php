<?php
namespace ApiStore\v3_0\tools\system;

use ApiStore\v2_0\Timestamp AS V2_0Timestamp;
use asbamboo\api\apiStore\ApiRequestParamsInterface;
use asbamboo\api\apiStore\ApiResponseParamsInterface;
use Psr\Container\ContainerInterface;

/**
 * @name 获取服务端时间戳
 * @desc 获取服务端时间戳(项目v1.0，添加了签名)
 * @desc 这个示例中 security 的值应该时 security。 调试工具的security字段，请手动输入 security
 * @request ApiStore\v2_0\Timestamp\RequestParams
 * @response ApiStore\v1_0\Timestamp\ResponseParams
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class Timestamp extends V2_0Timestamp
{
    /**
     *
     * @var ContainerInterface
     */
    private $Container;

    /**
     *
     * @param ContainerInterface $Container
     */
    public function setContainer(ContainerInterface $Container)
    {
        $this->Container    = $Container;
    }

    /**
     *
     * {@inheritDoc}
     * @see \ApiStore\v1_0\Timestamp::exec()
     */
    public function exec(ApiRequestParamsInterface $Params) : ?ApiResponseParamsInterface
    {
        /*
         * // 你可以通过 Container 获取其他的service，处理你需要处理的逻辑，如（数据表更新、日志记录、业务逻辑等）
         * $this->Container->get('db')
         */
        return parent::exec($Params);
    }
}