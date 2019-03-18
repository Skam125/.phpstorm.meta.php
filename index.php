<?php

require 'vendor/autoload.php';

$test1 = AbstractSkam::getInstance('Test1');
$test2 = AbstractSkam::getInstance('Test2');
$test3 = AbstractSkam::getInstance('Test3');
$test4 = AbstractSkam::getInstance('Test4');

AbstractSkam::generateMeta();