<?php
include('dbcon.php');
session_start();
 $userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;
$userName = $userEmail  = $userPassword = $userConfirmPassword = "" ;

if(isset($_POST['userRegister'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];



    if(empty($userName)){
        $userNameErr = "Name is Required" ;
    }
    if(empty($userEmail)){
            $userEmailErr = "Email is Required" ;
    }
    else{
                $query = $pdo->prepare("select * from users where email = :uEmail ");
                $query->bindParam('uEmail',$userEmail);  
                $query->execute();
                $user = $query->fetch(PDO::FETCH_ASSOC);   
                if($user){
                        $userEmailErr = "Email is already exist";
                } 
    }
    if(empty($userPassword )){
            $userPasswordErr  = "Password is Required";
    }
    if(empty($userConfirmPassword)){
                $userConfirmPasswordErr = "Confirm password is required";
    }
    else{
        if($userPassword != $userConfirmPassword ){
                    $userConfirmPasswordErr = "confirm password not matched";
        }
    }
    if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)){

        $query = $pdo->prepare("insert into users (name , email , password) values (:name , :email , :password)");
        $query->bindParam('name',$userName);
        $query->bindParam('email',$userEmail);
        $query->bindParam('password',$userPassword);
        $query->execute();
        echo "<script>alert('user added successfully');location.assign('register.php')</script>";
    }
}


// login work start

$u_Email = $u_Pass = "" ;
$u_EmailErr = $u_PassErr = "" ;
if(isset($_POST['userLogin'])){
    $u_Email = $_POST['userEmail'];
    $u_Pass = $_POST['userPassword'];
    if(empty($u_Email)){
        $u_EmailErr  = "Email is Required" ;
    }
    if(empty($u_Pass)){
        $u_PassErr = "Passwod is Required" ;
    }
    if(empty($u_EmailErr) && empty($u_PassErr)){
         $query = $pdo->prepare("select * from users where email = :uEmail");
         $query->bindParam('uEmail' , $u_Email);
         $query->execute();
         $user = $query->fetch(PDO::FETCH_ASSOC);
        //  print_r($user);  
        if($user){
               if($u_Pass == $user['password']){

                            if($user['role_id'] == 1){
                                    // print_r($user); 
                            $_SESSION['adminEmail'] = $user['email'];
                            $_SESSION['adminName'] = $user['name'];
                            echo "<script>alert('login');location.assign('adminPanel/index.php')</script>";

                            }
                            else if($user['role_id'] == 2){
                                $_SESSION['userId'] = $user['id'];
                                $_SESSION['userEmail'] = $user['email'];
                                $_SESSION['userName'] = $user['name'];
                                echo "<script>alert('login');location.assign('index.php')</script>";    
                            }

                           
               }           
               else{
                echo "<script>location.assign('login.php?error= invalid credentials')</script>";
               }
        } 
        else{
                echo "<script>location.assign('login.php?error = user not found')</script>";
        }
        
    }
}

?>