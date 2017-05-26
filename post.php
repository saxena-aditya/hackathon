<?php
include ('header.php');
//include ('clogs/db_connect.php');
$username = null;
$table = 'projects';
$post_head = $post_content = $post_skills = null;
 //session_start();

  if($_SESSION['is_logged_in'] != 1){
    header('location: login');
    die();
  }
else
  $username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD']== 'POST'){

  if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['skills'])){
    $post_head = SQLProof($connect_link, $_POST['title']);
    $post_content = SQLProof($connect_link, $_POST['content']);
    $post_skills = SQLProof($connect_link, $_POST['skills']);

    $randID = rand(1000, 1000000);
    $post_id = preg_replace('/\s+/', '', $post_head).$randID;
    $post_id = strtolower($post_id);

    $date = date('Y-m-d');
    $user = $username;

    $sql = "INSERT INTO $db_name.$table (project_id, admin_name, project_title, details, skills, _begin)
                    VALUES ('$post_id','$username','$post_head','$post_content','$post_skills','$date')";
  
    $sql_result = mysqli_query($connect_link, $sql);
    if ($sql_result) {
      header('location: profile');
    }
    else{
      echo mysqli_error($connect_link);
      echo $sql;
    }
  }
} ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h3>Add New Project Post
      </h3>
    </div>
    <div class="col-sm-7 col-md-7">
      <div class="panel panel-default">
        <div class="panel-body" >
          <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div>
                <input class="form-control " name="title" maxlength="130" name="post_title" type="text"placeholder="Project Title">
              </div>
            </div>
            <div class="form-group">
              <div>
                <input class="form-control " maxlength="80" name="skills" type="text"placeholder="Skills Required">
              </div>
            </div>
            <div class="form-group ">
              <textarea  class="form-control" name="content" rows="10" cols="80" placeholder="Project Description">
              </textarea>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-lg-4">
      <p>
      </p>
    </div>
  </div>
</div>

