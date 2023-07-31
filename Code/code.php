<?php
session_start();
require_once 'header.php';
include 'function.php';

$user = new user();

// User Registration page
if (isset($_POST['user_submit']) && (isset($_FILES['image']))) {  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pass =password_hash($password,PASSWORD_BCRYPT);
  $dob = date("Y-m-d", strtotime($_POST['dob']));    
  $gender = isset($_POST['gender']) ? $_POST['gender'] : array();
  $age = $_POST['age'];
  $hobby = isset($_POST['hobby'])? $_POST['hobby'] : array();
  $str_hobby = implode(',', $hobby);
  
    if($fname == ''|| $lname == '' || $email == '' || $password == '' || $_POST['gender'] == '' || $_POST['dob'] == '' || $age == '' || $_POST['hobby'] == '' || empty($_FILES['image']['name'])){
      $_SESSION['response'] = "Please fill required field!";
      $_SESSION['res_type'] = "danger";
      header('location:../index.php');
    }else{
      $query = $user->emailUserSearch($email);
    
      $emailcount = $query->num_rows;
    
      if($emailcount > 0){
        $_SESSION['response'] = "Email already exits";
        $_SESSION['res_type'] = "danger";
        header('location:../index.php');
      }else{

        if(!empty($_FILES['image']['name'])){
            $tmp_name = $_FILES['image']['tmp_name'];
            $str = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 5);  
            $target_path = "$str".$_FILES['image']['name'];  

            if(!empty($target_path)){
            move_uploaded_file($_FILES['image']['tmp_name'],"../image/".$target_path);
            }
        }
          $sql=$user->insertUser($fname,$lname,$email,$pass,$gender,$age,$str_hobby,$dob,$target_path);
          $last_id =mysqli_insert_id($user->mysqli);
  
          if($sql){
              $user_query = $user->userSearchbyid($last_id);
              $user_fetch = $user_query->fetch_assoc();
              $_SESSION['response'] ="Hi, ".$user_fetch['first_name'] ." ". $user_fetch['last_name']." Your account is create. Login to your account <a href='login.php'>Click here</a>";
              $_SESSION['res_type'] = "success";
            header('location:../index.php');
          }else{
              echo $user->mysqli->error;
          }
      } 
  }   
      
}

//Login Page
if(isset($_POST['login'])){
    $email = $_POST['loginemail'];
    $password = $_POST['loginpass'];
    $query = $user->loginUseremail($email);
    $email_count = $query -> num_rows;

    if($email =='' && $password ==''){
      $_SESSION['response'] = "Please enter email or password";
      $_SESSION['res_type'] = "danger";
      header('location:../login.php');
    }else{
        if($email =='' || $password ==''){
          $_SESSION['response'] = "Please enter valid email or password";
          $_SESSION['res_type'] = "danger";
          header('location:../login.php');
        }else{
            if($email_count){
                $email_pass = $query -> fetch_assoc();
                $_SESSION['genders'] =  $email_pass['gender'];
                $_SESSION['hobby'] =  $email_pass['hobbies'];
                $last_id = $email_pass['id'];  
                $db_pass= $email_pass['password'];
                $pass_decode= password_verify($password,$db_pass);
                    if($pass_decode){  
                      header('location:../view.php');
                    }else{
                      $_SESSION['response'] = "Please enter valid password.";
                      $_SESSION['res_type'] = "danger";
                      header('location:../login.php');
                    }     
            }else{
              $_SESSION['response'] = "Please enter valid email.";
              $_SESSION['res_type'] = "danger";
              header('location:../login.php');
            }
        }
    }
}

//Update User page
if (isset($_POST['update_user']) && (isset($_FILES['check_upload']))) {  
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pass =password_hash($password,PASSWORD_BCRYPT);
  $dob = date("Y-m-d", strtotime($_POST['dob']));    
  $gender = isset($_POST['gender']) ? $_POST['gender'] : array();
  $age = $_POST['age'];
  $hobby = isset($_POST['hobby'])? $_POST['hobby'] : array();
  $str_hobby = implode(',', $hobby);  
  $newimage = $_FILES['check_upload']['name'];
  $oldimage = $_POST['image_orig'];
       
    if($fname == ''|| $lname == '' || $email == '' || $password == '' || $_POST['gender'] == '' || $_POST['dob'] == '' || $age == '' || $_POST['hobby'] == '' || empty($_FILES)){
      $_SESSION['response'] = "Please fill required field!";
      $_SESSION['res_type'] = "danger";
      header('location:../update.php?id='.$id);
    }else{
      if($newimage != ''){
        $update_image = $_FILES['check_upload']['name']; 
      }else{
          $update_image = $oldimage;
      }

      if (isset($_FILES['check_upload']['name']) && ($_FILES['check_upload']['name'] != "")) {
        $str = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 5);
        $newimage = "$str". $_FILES['check_upload']['name'];
        unlink("../image/".$oldimage);
        move_uploaded_file($_FILES['check_upload']['tmp_name'],"../image/". $newimage);
      } else {
          $newimage = $oldimage;
      }

      $query = $user->emailUserSearch($email);
    
      $emailcount = $query->num_rows;
    
      if($_SESSION['useremail'] == $email || !$emailcount){
        $sql = $user->updateUser($fname,$lname,$email,$pass,$gender,$age,$str_hobby,$dob,$newimage,$id);
      }else{
        $_SESSION['response'] = "Email is already exit";
        $_SESSION['res_type'] = "danger";
        header('location:../update.php?id='.$id);
      }
    
      if($sql){
            header('location:../view.php');
      }else{
        echo $user->mysqli ->error;
      }
    }        
}

?>