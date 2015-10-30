<?php
//Including the Yii framework itself (1)
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
//Getting the configuration (2)
$config = require(__DIR__ . '/../config/web.php');
//Making and lanching the application immediately (3)
(new yii\web\Application($config))->run();