<?php
include ('header.php');
//include ('clogs/db_connect.php');

function populate($data){

  if ($data == NULL || $data = "")
    $data = 'Not Known';
  else
    $data = $data;
  return $data;
}

  if($_SESSION['is_logged_in'] != 1){
    
    header('location: login');
    die();
  }

  $table = 'register';
  $username = $_SESSION['username'];
  $data = false;
  $sql = "SELECT * FROM $db_name.$table WHERE username= '$username'";
  $sql_q = mysqli_query($connect_link, $sql);
  if ($sql_q)
    $row = mysqli_fetch_array($sql_q, MYSQLI_ASSOC);
  else
    echo 'Could not fetch data'.mysqli_error($connect_link);

  $t_project = 'projects';
  $sql_recent = "SELECT * FROM $db_name.$t_project WHERE admin_name = '$username' ORDER BY id DESC LIMIT 5";
  $sql_recent_result = mysqli_query($connect_link, $sql_recent);

  if ($sql_recent)
    $data = true  ;
  else
    echo "Data not fetched!";

 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body"  >
          <div style="text-align:center">
            <img src="<?=$row['photo_path']?>" alt="users-image"style="width:80%;height:auto;">
          </div>
          <h4 style="text-align:center">
            <?=$row['full_name']?>
            <br>
            <small>@
              <?=$row['college']?>
            </small>
          </h4>
          <p>Branch: 
            <small>
              <?=$row['branch']?>
            </small>
          </p>
          <p>Sem: 
            <small>
              <?=$row['sem']?>
            </small>
          </p>
          <p>Email: 
            <small>
              <?=$row['email']?>
            </small>
          </p>
          <form role="form" action="details.php" method="post" enctype="multipart/form-data">
            <a type="submit" href="edit_profile" class="btn btn-success pull-left">Edit Profile
            </a>
            <a href="post.php">
              <button type="button" class="btn btn-success pull-right">New Idea
              </button>
            </a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-8">
      <?php 
if ($data){
while($f_data = mysqli_fetch_array($sql_recent_result, MYSQLI_ASSOC)){
?>
      <div class="panel project-pack panel-default">
        <div class="panel-body">
          <h4>
            <a href="details.php">
              <?php echo $f_data['project_title']; ?>
            </a>
            <small class="pull-right">End : 
              <?php echo populate($f_data['end']); ?>
            </small>
            <small class="pull-right">Start : 
              <?php echo $f_data['_begin']; ?> &nbsp;
            </small>
          </h4>
        </div>
      </div>
      <?php
          }
        }
      ?>
      <form role="form" action="global.php" method="post" enctype="multipart/form-data">
        <button type="submit" class="btn btn-success pull-left">Add Projects
        </button>
      </form>
    </div>
  </div>
</div>

