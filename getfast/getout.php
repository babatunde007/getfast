<?php

require('getclass.php');

$obj=new Getfast;

$obj->logout();

header("location:index.php");



?>