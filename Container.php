<?php
use Psr\Container\ContainerInterface;
use function Composer\Autoload\includeFile;

/**
 * 使用asbamboo/api库指定的容器
 *  - 控制容器的反转和依赖项注入模式（https://martinfowler.com/articles/injection.html）
 *  - 这个容器需要遵守psr-11规范 (https://www.php-fig.org/psr/psr-11/)
 *  - 遵守psr-11规范的php框架（如:laravel、symfony）内都会有一个实现了ContainerInterface的容器。
 *    - laravel: Illuminate\Container\Container
 *    - symfony: Symfony\Component\DependencyInjection\Container;
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年3月23日
 */
class Container implements ContainerInterface
{
    private $services;

    /**
     *
     */
    public function __construct()
    {
        $this->initServices();
    }

    /**
     *
     */
    public function initServices()
    {
        foreach(include "services.php" AS $id => $service){
            $this->set($id, $service);
        }
    }

    /**
     *
     * @param string $id
     * @param object $service
     */
    public function set($id, $service)
    {
        if(!is_object($service)){
            $service    = new $service();
        }
        if(method_exists($service, 'setContainer')){
            $service->setContainer($this);
        }
        $this->services[$id]    = $service;
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Container\ContainerInterface::get()
     */
    public function get($id)
    {
        if(!$this->has($id)){
            if(class_exists($id)){
                $this->set($id, new $id());
            }
        }
        return $this->services[$id];
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Container\ContainerInterface::has()
     */
    public function has($id)
    {
        return isset($this->services[$id]);
    }
}

