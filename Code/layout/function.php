<?php

class user {

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "jeelkalsariya";
    
    public $mysqli ="";
    private $result = array();
    private $conn = false;

    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }                
        }else{
            return true;
        }
    }
                                                                    // Index Page
    //Search email user
    public function emailUserSearch($email){
        $result = mysqli_query($this->mysqli,"SELECT * FROM user where email='$email'");
        return $result;
	}

    //Insert user record
    public function insertUser($fname,$lname,$email,$pass,$gender,$age,$str_hobby,$dob,$target_path){
        $insert = mysqli_query($this->mysqli,"INSERT INTO user (first_name, last_name, email, password, gender, age, hobbies, Date_of_birth, image) VALUES ('$fname', '$lname', '$email', '$pass', '$gender', '$age', '$str_hobby', '$dob', '$target_path')");
        return $insert;
    }

    //Search user
    public function userSearchbyid($last_id){
        $result = mysqli_query($this->mysqli,"SELECT * FROM user where id = '$last_id'");
        return $result;
	}

    //Login File
    //Search login user email
    public function loginUseremail($email){
        $result = mysqli_query($this->mysqli,"SELECT *FROM user WHERE email='$email'");
        return $result;
    }  
    
    // Update File
    //Update user search by id
    public function updateUserSearchByid($id){
        $result = mysqli_query($this->mysqli,"SELECT * FROM user where id = '$id'");
        return $result;
	}
    
    //Update user
    public function updateUser($fname,$lname,$email,$pass,$gender,$age,$str_hobby,$dob,$newimage,$id){
        $updaterecord = mysqli_query($this->mysqli,"UPDATE user SET first_name='$fname', last_name='$lname', email='$email', password='$pass', gender='$gender', age='$age', hobbies='$str_hobby', Date_of_birth='$dob', image='$newimage' WHERE id=$id");
        return $updaterecord;
    }
    
    // Delete File
    //Delete user image
    public function deleteUserimg($id){
        $result = mysqli_query($this->mysqli,"SELECT *FROM user WHERE id='$id'");
        return $result;
    }

    //Delete user
    public function deleteUser($id){
        $deleterecord = mysqli_query($this->mysqli,"DELETE FROM user WHERE id=$id");    
        return $deleterecord;
    } 

    // fetch-results.php
    //Fetch user record                                                                    
    public function fetchUser($sql){
        $result = mysqli_query($this->mysqli,"$sql")->fetch_all(MYSQLI_ASSOC);;
        return $result;
    }
    
    //Fetch user row
    public function getUserRecord($searchQuery){
        $gender = $_SESSION['genders'];
        $query = "SELECT COUNT(*) FROM user WHERE (";

        if ($gender == 'male') {
        $query .= " gender = 'female')";
        }

        if ($gender == 'female') {
            $query .= " gender = 'male')";
        }

        if (!empty($searchQuery)) {
            $query .= " AND (user.first_name LIKE '%$searchQuery%' OR user.last_name LIKE '%$searchQuery%' OR user.email LIKE '%$searchQuery%' OR user.gender LIKE '%$searchQuery%' OR user.age LIKE '%$searchQuery%' OR user.date_of_birth LIKE '%$searchQuery%' OR user.hobbies LIKE '%$searchQuery%')";
        }

        $query = mysqli_query($this->mysqli,"$query")->fetch_row();
        $result = $query[0];
        return $result;
    }

    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            return false;
        }
    }
}

?>