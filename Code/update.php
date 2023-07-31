<?php 
include 'layout/code.php'; 

$user = new user();
$id = $_GET['id'];

$result = $user->updateUserSearchByid($id);
$fetch = $result ->fetch_assoc();
$fname = $fetch['first_name'];
$lname = $fetch['last_name'];
$email = $fetch['email'];
$_SESSION['useremail'] = $email;
$pass = $fetch['password'];
$age = $fetch['age'];
$gender = $fetch['gender'];
$hobbies = $fetch['hobbies'];
$hobby = explode(',',$hobbies);
$dob = $fetch['Date_of_birth'];
$img = $fetch['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>User Register</title>
</head>
<body>        
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Form</h3>
            <?php if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?php echo $_SESSION['res_type']; ?>">
                    <?php echo $_SESSION['response']; ?>
                </div>
                <?php unset($_SESSION['response']); ?>
            <?php } ?> 
            <form action="layout/code.php" id="user" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 mb-4">
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                  <div class="form-outline">
                    <label class="form-label" for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" class="form-control form-control-lg" /> 
                    <span for="fname"class="error"></span>                   
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" class="form-control form-control-lg" />
                    <span for="lname"class="error"></span>   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg" />
                    <span for="email"class="error"></span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password"  value="<?php echo $pass; ?>" class="form-control form-control-lg" />                    
                    <span for="password"class="error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <label for="birthdayDate" class="form-label">Birthday</label>
                    <input type="date" class="form-control form-control-lg"  value="<?php echo $dob; ?>" name="dob" id="dob" />
                  </div>
                </div>
                <div class="col-md-6 mt-3">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"  <?php if($gender == "male"){ echo "checked";} ?> value="Male" id="Male"/>
                    <label class="form-check-label" for="Male">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"  <?php if($gender == "female"){ echo "checked";} ?> value="Female" id="Female"/>
                    <label class="form-check-label" for="Female">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"  <?php if($gender == "others"){ echo "checked";} ?> value="Other" id="Other" />
                    <label class="form-check-label" for="Other">Other</label>
                  </div><label for="gender" class="error"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="emailAddress">Age</label>
                        <input type="number" id="age" name="age" value="<?php echo $age; ?>" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="col-md-6">
                  <h6 class="mb-2 pb-1">hobby: </h6>
                    <div class="form-check form-check-inline" style="margin-right: 45px;">
                        <input class="form-check-input" type="checkbox" name="hobby[]" <?php if (in_array("Playing", $hobby)){ echo 'checked';} ?> id="Playing" value="Playing">
                        <label class="form-check-label" for="Playing">Playing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobby[]" <?php if (in_array("Reading", $hobby)){ echo 'checked';} ?>  id="Reading" value="Reading">
                        <label class="form-check-label" for="Reading">Reading</label>
                    </div><br>
                    <div class="form-check form-check-inline" style="margin-right: 29px;">
                        <input class="form-check-input" type="checkbox" name="hobby[]" <?php if (in_array("Travelling", $hobby)){ echo 'checked';} ?>   id="Travelling" value="Travelling">
                        <label class="form-check-label" for="Travelling">Travelling</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobby[]" <?php if (in_array("Others", $hobby)){ echo 'checked';} ?> id="Others" value="Others">
                        <label class="form-check-label" for="Others">Others</label>
                    </div><label for="hobby[]" class="error"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                 <div class="mb-3 ">
                    <label class="form-label">Image : <span class="required-star">*</span></label>
                    <img src="image/<?php echo $img; ?>" class="ps-5 pb-2" width="200" height="100">                     
                        <input type="file" accept="image/*" class="form-control" name="check_upload" id="check_upload">
                        <input type="hidden" id="image_orig" name="image_orig" value="<?php echo $img; ?>"  />
                        <?php if(empty($img)){?><label for="check_upload" class="error"></label><?php } ?>
                        <p>Allow only jpg, jpeg, gif, png files.<br>Allowed Max Size 1 mb</p>
                    </div>
                </div>
              </div>      
              <div class="mt-2 pt-2">
                <input class="btn btn-primary btn-lg" name="update_user" type="submit" />
              </div>
            </form>
            <?php include 'layout/footer.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
