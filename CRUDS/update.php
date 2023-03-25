<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD']=="POST"){
    $oldValues=[];
    $errors=[];

    if(empty($_POST['firstName'])){
        $errors['fname']="First Name Field Required...!";
    }else{
        $oldValues['fname']=$_POST['firstName'];
        if(strlen($_POST['firstName'])<3){
            $errors['fname']="First Name must be at least 3 characters...!";
        }
    }
    
    if(empty($_POST['lastName'])){
        $errors['lastName']="Last Name Field Required...!";
    }else{
        $oldValues['lastName']=$_POST['lastName'];
        if(strlen($_POST['lastName'])<3){
            $errors['lastName']="Last Name must be at least 3 characters...!";
        }
    }

    if(empty($_POST['gender'])){
        $errors['gender']="Gender Field Required...!";
    }

    if(empty($_POST['username'])){
        $errors['username']="User Name Field Required...!";
    }else{
        $oldValues['username']=$_POST['username'];
        if(strlen($_POST['username'])<3){
            $errors['username']="User Name must be at least 3 characters...!";
        }
    }

    if(empty($_POST['password'])){
        $errors['password']="password Field Required...!";
    }else{
        $oldValues['password']=$_POST['password'];
        if(strlen($_POST['username'])<3){
            $errors['password']="Password must be at least 3 characters...!";
        }
    }

    if(count($errors)>0){
        $errorsData=json_encode($errors);
        $url="Location:../addForm.php?errors={$errorsData}";
        if(count($oldValues)>0){
            $oldValuesData=json_encode($oldValues);
            $url .="&oldValues={$oldValuesData}";
        }
        header($url);
    }else{
        $realData=[];
        $realData['fname']=clean($_POST['firstName']);
        $realData['lastName']=clean($_POST['lastName']);
        $realData['gender']=clean($_POST['gender']);
        $realData['username']=clean($_POST['username']);
        $realData['password']=clean($_POST['password']);

        // var_dump(checkExists($realData['username']));exit;
        if(checkExists($realData['username'])){
            $errors['username']="user name must be unique...!";
        }
        /************ Store Data inside a File **********/
        if(is_readable("customers.txt") && is_executable("customers.txt")){
            $lineNum = getLineNum($_POST['oldUserName']);

            $arr=[];$i=1;
            $fileReadOld = fopen("customers.txt","r");
            while(!feof($fileReadOld)){
                $arr[$i] = fgets($fileReadOld);
                ++$i;
            }
            fclose($fileReadOld);

            $newLine=implode(":",$realData);
            $fileWrite = fopen("customers.txt","w");
            $arr[$lineNum]=$newLine;
            $data=implode("\n",$arr);
        
            fwrite($fileWrite,$data);
            fclose($fileWrite);
        }else{
            $errors['file']="U Can Not Access The Storage File...!";
        }
        

        if(count($errors)>0){
            $errorsData=json_encode($errors);
            $url="Location:../addForm.php?errors={$errorsData}";
            if(count($oldValues)>0){
                $oldValuesData=json_encode($oldValues);
                $url .="&oldValues={$oldValuesData}";
            }
            header($url);
        }else{
            header("Location:../index.php?msg=User Updated Successfully.");
        }
    }
}

function clean($oldInput){
    $input = stripcslashes($oldInput);
    $input = htmlspecialchars($oldInput);
    $input = trim($oldInput);

    return $input;
}

function getLineNum($username){
    $num=0;
    $file = fopen("customers.txt","r");
    while(!feof($file)){
        $line = fgets($file);
        $num++;

        if(strpos($line,$username) != false){
            break;
        }
    }
    return $num;
}

function checkExists($item){
    $data = file_get_contents("customers.txt");
    $allDate = explode("\n",$data);
    $x=[];
    foreach($allDate as $i){
        $x=explode(":",$i);
        if(in_array($item,$x) && $item !== $_POST['oldUserName']) return true;
    } 
    return false;
}
