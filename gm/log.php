<?php

                $time = date('Y-m-d H:i:s',time());
echo $time."\n";
                $logsTime = date('Ymd',time());
echo $logsTime."\n";

$items='asfas'."\n";
                error_log("{$time} : {$items} \n", 3, "/data/itemlog/items_{$logsTime}.log");

echo "{$time} : {$items} \n";
echo "/data/itemlog/items_{$logsTime}.log\n";


        $file    =  "./items_{$logsTime}2.log";

        $file = fopen($file, "a+");
        fwrite($file, "66666");
        fclose($file);

  echo '邮件发送成功！,请查收';
  


?>
