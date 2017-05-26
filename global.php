<?php
include ('header.php');
$table = 'projects';
 $data_fetched = false;

  if($_SESSION['is_logged_in'] != 1){
    
    header('location: login');
    die();
  }

  $username = $_SESSION['username'];
  $table = 'projects';
  $sql_global = "SELECT * FROM $db_name.$table ORDER BY id DESC";
  $sql_Res = mysqli_query($connect_link,$sql_global);
  
 	if ($sql_Res){

 		$data_fetched = true;
 	}
  $project_admin = null;

  $table_ = 'requests';
if(isset($_GET['project_id'])){

    $pid = validate($_GET['project_id']);
    
    $sql_1 = "SELECT admin_name FROM $db_name.$table WHERE project_id = '$pid'";

    $sql_r_1 = mysqli_query($connect_link, $sql_1);
    if($sql_r_1){
      $row = mysqli_fetch_array($sql_r_1, MYSQLI_ASSOC);
      if ($row['admin_name'] != $username){

        $project_admin = $row['admin_name'];
        $sql = "INSERT INTO $db_name.$table_ (project_id, user_id, project_admin) VALUES ('$pid', '$username', '$project_admin')";
        
        $sql_r = mysqli_query($connect_link, $sql);
        
        if ($sql_r){
          // request made!
          echo '<div class="alert alert-success" style="max-width:40%;">
                  <strong>Thank you! Request Submitted! </strong>
                </div>';

                /* ===============================
                 ===============================
                  NOTE:: Add mail system here!
                 ===============================
                   =============================== */
        }
        else{
          // could not save the request!
          echo '<div class="alert alert-danger">
                  <strong>Opps! Seems like there is a error within our servers! </strong>
                </div>';
        }

      }else{
        // same user as the logged in user!
        echo '<div class="alert alert-warning" style="max-width:40%;">
                <p><strong>Sorry! You can not submit a request for your own Project.</strong></p>
              </div>';
      }
        }else{
          echo('location: ../html/error.html');
          echo $sql_1;
      }
    }

 ?>
<div class="container-fluid">
  <div class="row">
        <div class="col-sm-12">
        </div>
              <div class="col-sm-12 col-md-12">
              <div class="panel-group" id="accordion">
             <?php
               	if ($data_fetched){
                    $i = 0 ;
            		while ($rows = mysqli_fetch_array($sql_Res, MYSQLI_ASSOC)) {
               		?>
          <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>">
                <?=$rows['project_title']?>
              </a>
            </h4>
          </div>
          <div id="collapse<?=$i?>" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="description">
                <?=$rows['details']?>
              </div>
              <div class="lower-region">
                <a href="global?project_id=<?=$rows['project_id']?>" class="btn btn-success">CollabNOW
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php
            $i = $i+1;
         }
       }
	 mysqli_close($connect_link);
      ?>
   </div>
  </div>
 </div>
</div>
