<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['username'])){
    $username=$_GET['username'];

    $i=0;$arr=[];
    if(is_readable("customers.txt") && is_executable("customers.txt")){
        $fileRead = fopen("customers.txt","r");
        while(!feof($fileRead)){
            $arr[$i] = fgets($fileRead);
            ++$i;
        }
        fclose($fileRead);

        $fileWrite = fopen("customers.txt","w");
        foreach($arr as $line){
            if(!strstr($line,$username)) fwrite($fileWrite,$line);
            echo $line;
        }
        fclose($fileWrite);
        header("Location:../index.php?deleted=Deleted Successfully.");
    }else{
        $errors['file']="This File Can Not Be Accessed...!";
    }
}

?>