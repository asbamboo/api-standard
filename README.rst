asbamboo/api-standard
===================================

asbamboo/api-standard 是 `asbamboo/api`_ 的标准用例。编写这个用例的目的是演示 `asbamboo/api`_ 模块是如何编写api接口程序的。

简单说一下：

* web 目录下面的http执行的脚本入口

    * api.php (请求处理的脚本)
    * doc.php (返回接口文档)
    * test.php (返回接口调试工具)
    * index.php 没什么用处（只是doc.php与test.php）连个链接。

* ApiStore 目录是api仓库。

用例还在不端更新中...

运行用例
-------------------------

逐行完成下面的语句，在浏览器中运行 http://127.0.0.1:8000 可以查看用例的接口文档。

::

    
    git clone https://github.com/asbamboo/api-standard.git
    
    cd api-standard
       
    composer install

    cd web
    
    php -S 127.0.0.1:8000

.. _asbamboo/api: http://github.com/asbamboo/api

用例接口
----------------------------

:timestamp[v1.0]: (ApiStore\v1_0\Timestamp) 演示了基本的请求参数映射类、响应参数映射类、接口逻辑处理类的编写.
:timestamp[v2.0]: (ApiStore\v2_0\Timestamp) 演示了继承1.0版本的2.0接口、自定义响应参数映射类、请求参数过期失效、签名验证。
