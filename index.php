<?php
require('controller/frontController.php');
$cntr = new frontController();
$cntr->addStudents();
$cntr->calculatePerentile();
$cntr->displayRecords();
?>