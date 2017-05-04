<?php
include ('header_visitor.php');
include ('clogs/db_connect.php');
$sql = $username = $pass = $full_name = $year = $college = $save_error = null;
$table = 'register';

if ($_SERVER['REQUEST_METHOD']== 'POST'){

  if (isset($_POST['username']) && isset($_POST['name']) &&
          isset($_POST['college']) && isset($_POST['year']) &&
              isset($_POST['password']) && isset($_FILES["fileToUpload"]["name"])){

        $username = SQLProof($connect_link, $_POST['username']);
        $pass  = SQLProof($connect_link, $_POST['password']);
        $full_name = SQLProof($connect_link, $_POST['name']);
        $college = SQLProof($connect_link, $_POST['college']);
        $year = SQLProof($connect_link, $_POST['year']);
        $branch = SQLProof($connect_link, $_POST['branch']);
        $email = SQLProof($connect_link, $_POST['email']);
        $sem = SQLProof($connect_link, $_POST['sem']);

          
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                  echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
              } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                  $path = $target_file;
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
            }

        // for cheacking out the username availability! 
        $sql_check_user = "SELECT COUNT(*) AS count FROM $db_name.$table WHERE username = '$username'";
        $sql_username_check = mysqli_query($connect_link, $sql_check_user);
        $rows = mysqli_fetch_array($sql_username_check, MYSQLI_ASSOC);

        if ($rows['count'] != 0){
          // username exists!! 
          echo mysqli_num_rows($sql_username_check);
          $save_error = "Sorry! This username has been already taken!";
        }
        else{
          $sql = "INSERT INTO $db_name.$table (username, pass, full_name, college, email, branch, sem,year_, photo_path) 
                      VALUES ('$username', '$pass', '$full_name', '$college', '$email', 
                      '$branch','$sem','$year', '$path')";
                      echo $sql;
          if (mysqli_query($connect_link, $sql)){
            header('location: login');
            die();
          }            
          else
            $save_error = "Could not save your Information".mysqli_error($connect_link);
            die();

        }
  
}
  
}else
  echo 'isset() not set';
mysqli_close($connect_link);
 ?>
<div class="container-fluid " >
  <div class="row ">
        <div class="col-sm-12">
            <h3>Login</h3>
        </div>
              <div class="col-sm-6 col-md-6" >
                 <div class="panel panel-default">
                    <div class="panel-body" >
                    <p><?=$save_error;?></p>
                      <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="username">
                                  Username:
                              </label>
                              <div class="col-sm-10">
                                  <input id="username" maxlength="30" name="username" type="text">
                              </div>
                           </div>


                           <div class="form-group">
                             <label class="control-label col-sm-2" for="name">
                                 Name:
                             </label>
                             <div class="col-sm-10">
                                 <input id="name" maxlength="50" name="name" type="text">
                             </div>
                         </div>


                         <div class="form-group">
                           <label class="control-label col-sm-2" for="college">
                               College:
                           </label>
                           <div class="col-sm-10">
                               <input id="college" maxlength="500" name="college" type="text">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-2" for="college">
                               E-Mail:
                           </label>
                           <div class="col-sm-10">
                               <input id="email" maxlength="500" name="email" type="email">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-2" for="college">
                               Branch:
                           </label>
                           <div class="col-sm-10">
                               <input id="branch" maxlength="500" name="branch" placeholder = 'eg - CSE' type="text">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-2" for="college">
                               Semester:
                           </label>
                           <div class="col-sm-10">
                               <select class="form-control-" name="sem">
                                 <option value="I">I</option>
                                 <option value="II">II</option>
                                 <option value="III">III</option>
                                 <option value="IV">IV</option>
                                 <option value="V">V</option>
                                 <option value="VI">VI</option>
                                 <option value="VII">VII</option>
                                 <option value="VIII">VIII</option>

                               </select>
                           </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="year">
                              Year:
                          </label>
                          <div class="col-sm-10">
                              <input id="year" maxlength="30" name="year" type="text">
                          </div>
                      </div>
                          <div class="form-group">
                              <label class="control-label col-sm-2" for="password">
                                  Password:
                              </label>
                              <div class="col-sm-10">
                                  <input id="password" maxlength="30" name="password" type="password">
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="control-label col-sm-2" for="profil-pic">
                                  Profile Pic:
                              </label>
                              <div class="col-sm-10">
                                  <input id="profile_pic" name="fileToUpload" type="file">
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                          </div>


                      </form>

                     </div>
                     <div class="panel-footer">
                       <p>Already have an account?&nbsp;<a href="login.php">Click Here</a> to Sign up !</p>
                     </div>
                  </div>
               </div>
      </div>
</div>
