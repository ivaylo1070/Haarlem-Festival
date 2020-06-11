<?php
session_start();
if(isset($_GET['user'])){
  require_once('phpqrcode/qrlib.php');
  $user = $_GET['user'];
  Qrcode::png('Tickets for : '. $user);
 }
