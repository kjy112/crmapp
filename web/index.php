<?php
//Including the Yii framework itself (1) and set debug mode and display errors to true
define('YII_DEBUG', TRUE); //set before require for YII
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
ini_set('display_errors', TRUE); //set after require for YII
//Getting the configuration (2)
$config = require(__DIR__ . '/../config/web.php');
//Making and lanching the application immediately (3)
(new yii\web\Application($config))->run();