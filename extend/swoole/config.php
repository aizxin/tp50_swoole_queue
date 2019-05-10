<?php
/**
 * FileName: config.php
 * ==============================================
 * Copy right 2016-2017
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 * @author: kong | <iwhero@yeah.com>
 * @date  : 2019-05-10 09:58
 */

return [
    'swoole'=> [
        // 队列 配置
        'queue_type' => 'process',//task or process
        'queue'      => [
            "TestJob" => [
                "delay"    => 0,//延迟时间
                "sleep"    => 3,//休息时间
                "maxTries" => 0,//重试次数
                "nums"     => 3//进程数量
            ]
        ],
    ],
];