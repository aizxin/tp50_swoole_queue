在swoole的start 来执行代码
```
  if ("process" == config('swoole.queue_type')) {
      $process = new QueueProcess();
      $process->run($this->swoole);
  }
```

## 安装
> composer require topthink/think-queue：1.*

## 配置
> 配置文件位于 `application/extra/queue.php`

## 使用redis
```
      'connector'  => 'Redis',		    // Redis 驱动
      'expire'     => 60,				// 任务的过期时间，默认为60秒; 若要禁用，则设置为 null
      'default'    => 'default',		// 默认的队列名称
      'host' => '127.0.0.1',
      'password' => '',
      'port'       => 6379,			// redis 端口
      'select'     => 5,				// 使用哪一个 db，默认为 db0
      'timeout'    => 0,				// redis连接的超时时间
      'persistent' => true,			// 是否是长连接

```

## 配置queue队列名称
```
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
```

## 调用
```
  Queue::push('app\index\job\Test', ['test'=>12136712] ,'TestJob');
```

## 处理
```
  <?php
  
  namespace app\index\job;
  
  use think\Log;
  use think\queue\Job;
  
  class Test
  {
     /**
      * fire方法是消息队列默认调用的方法
      * @param Job            $job      当前的任务对象
      * @param array|mixed    $data     发布任务时自定义的数据
      */
      public function fire(Job $job,$data){
          $isJobDone = $this->doOrderJob($data);
          var_dump($isJobDone);
          if ($isJobDone) {
              //如果任务执行成功， 记得删除任务
              $job->delete();
          }else{
              var_dump($job->attempts());
              if ($job->attempts() > 3) {
  
                  //通过这个方法可以检查这个任务已经重试了几次了
                  // 也可以重新发布这个任务
                  $job->delete();
              } else {
                  $job->release(); //$delay为延迟时间，表示该任务延迟2秒后再执行
              }
          }
      }
      /**
      * 根据消息中的数据进行实际的业务处理
      * @param array|mixed    $data     发布任务时自定义的数据
      * @return boolean                 任务执行的结果
      */
      public function doOrderJob($data) {
          // 根据消息中的数据进行实际的业务处理...      
          Log::info('doOrderJob'.json_encode($data));
          return false;
      }
      /**
       * 该方法用于接收任务执行失败的通知，你可以发送邮件给相应的负责人员
       * @param $jobData  string|array|...      //发布任务时传递的 jobData 数据
       */
      public function failed($jobData){
          // send_mail_to_somebody() ;
          Log::info('ffffs'.json_encode($jobData));
      }
  }
```