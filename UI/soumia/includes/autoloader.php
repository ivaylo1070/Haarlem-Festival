<?php
   spl_autoload_register('myAutoloader');

   function myAutoloader($classname){
    $path="classess/";
    $extension=".php";
    $fullpath=$path . $classname . $extension;
    include $fullpath;
   }

?>