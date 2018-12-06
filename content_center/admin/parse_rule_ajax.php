<?php
require_once('../init.php');
$r_id=$_POST['r_id'];
$row=Parse_rule::getInfoById($r_id);
echo json_encode($row);
?>