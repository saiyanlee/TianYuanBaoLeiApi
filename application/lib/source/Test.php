<?php

//require ("Course.php");
//namespace app\lib\source;
use app\lib\source\Course;

session_start();
$abc = new Course();

$abc ->getCourse();
