<?php
include ('header_visitor.php');
include ('clogs/db_connect.php');
session_start();
$_SESSION['is_logged_in'] = 0;
$login_error = $sql = $pass = $username = null;
$table = 'register';


if ($_SERVER['REQUEST_METHOD']== 'POST'){

  if (isset($_POST['username']) && isset($_POST['password'])){

        $username = SQLProof($connect_link, $_POST['username']);
        $pass  = SQLProof($connect_link, $_POST['password']);
        
        $sql_check_user = "SELECT COUNT(*) AS count FROM $db_name.$table WHERE username = '$username' AND pass = '$pass'";
        $sql_username_check = mysqli_query($connect_link, $sql_check_user);
       
        if ($sql_username_check)
          $rows = mysqli_fetch_array($sql_username_check, MYSQLI_ASSOC);
        
        else
          $login_error = 'Try again later!';
        
        if ($rows['count'] != 0){
          
          $_SESSION['username'] = $username;
          $_SESSION['is_logged_in'] = 1;
          header('location: profile.php');
          die();
        }
        else
          $login_error = 'Opps! Wrong password or username.';
      }
    }

      mysqli_close($connect_link);
 ?>
<div class="container-fluid">
  <div class="row">
        <div class="col-sm-12">
            <h3>Login</h3>
        </div>
              <div class="col-sm-6 col-md-6">
                 <div class="panel panel-default">
                    <div class="panel-body" >
                    <p><?=$login_error;?></p>
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
                              <label class="control-label col-sm-2" for="password">
                                  Password:
                              </label>
                              <div class="col-sm-10">
                                  <input id="password" maxlength="30" name="password" type="password">
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
                       <p>Don't have account?&nbsp;<a href="register.php">Click Here</a> to Sign up !</p>
                     </div>
                  </div>
               </div>
      </div>
</div>
