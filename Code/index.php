<?php include 'layout/code.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <?php if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?php echo $_SESSION['res_type']; ?>">
                    <?php echo $_SESSION['response']; ?>
                </div>
                <?php unset($_SESSION['response']); ?>
            <?php } ?> 
            <form action="layout/code.php" id="user" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control form-control-lg" /> 
                    <span for="fname"class="error"></span>                   
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control form-control-lg" />
                    <span for="lname"class="error"></span>   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control form-control-lg" />
                    <span for="email"class="error"></span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />                    
                    <span for="password"class="error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <label for="birthdayDate" class="form-label">Birthday</label>
                    <input type="date" class="form-control form-control-lg" name="dob" id="dob" />
                  </div>
                </div>
                <div class="col-md-6 mt-3">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" id="Male"/>
                    <label class="form-check-label" for="Male">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Female" id="Female"/>
                    <label class="form-check-label" for="Female">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Other" id="Other" />
                    <label class="form-check-label" for="Other">Other</label>
                  </div><label for="gender" class="error"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="emailAddress">Age</label>
                        <input type="number" id="age" name="age" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="col-md-6">
                  <h6 class="mb-2 pb-1">hobby: </h6>
                    <div class="form-check form-check-inline" style="margin-right: 45px;">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="Playing" value="Playing">
                        <label class="form-check-label" for="Playing">Playing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="Reading" value="Reading">
                        <label class="form-check-label" for="Reading">Reading</label>
                    </div><br>
                    <div class="form-check form-check-inline" style="margin-right: 29px;">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="Travelling" value="Travelling">
                        <label class="form-check-label" for="Travelling">Travelling</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobby[]" id="Others" value="Others">
                        <label class="form-check-label" for="Travelling">Others</label>
                    </div><label for="hobby[]" class="error"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                 <div class="mb-3 ">
                    <label class="form-label">Image : <span class="required-star">*</span></label>                     
                        <div class="holder"><img id="imgPreview" /></div>
                        <input type="file" accept="image/*" class="form-control" name="image" id="image">
                        <p>Allow only jpg, jpeg, gif, png files.<br>Allowed Max Size 1 mb</p>
                    </div><label for="image" class="error"></label>
                </div>
              </div>      
              <div class="mt-2 pt-2">
                <input class="btn btn-primary btn-lg" name="user_submit" type="submit" value="Submit" />
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
