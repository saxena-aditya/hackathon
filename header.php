<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Partner</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
</head>
<body>
<?php
  
  include ('clogs/db_connect.php');

  session_start();

  if($_SESSION['is_logged_in'] != 1){
    
    header('location: login');
    die();
  }

  $username_ = $_SESSION['username'];
  $table__ = 'requests';
  $requests = false;
  $sql___ = "SELECT COUNT(*) AS cc FROM $db_name.$table__ WHERE project_admin = '$username_'";
  $sql__ = "SELECT * FROM $db_name.$table__ WHERE project_admin = '$username_' AND status = 0";
 
$sql___res = mysqli_query($connect_link, $sql___);
if ($sql___res){
   $count__ = mysqli_fetch_array($sql___res,MYSQLI_ASSOC);
   if ($count__['cc'] > 0){
    
   

  $sql_res = mysqli_query($connect_link, $sql__);
  if ($sql_res) {
    $requests = true;
 
  }
  else{
  
   }
 }
}

?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Partner</a>
        </div>

        <!-- Items -->
        <div class="collapse navbar-collapse" id="topNavBar">
            <ul class="nav navbar-nav">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Profile</a></li>
                <li><a href="myprojects"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp; My Projects</a></li>


            </ul>
            <form class="navbar-form navbar-left" role="search" method="get" action="#">
                <div class="form-group">
                    <input type="text" class="form-control" name="q" value="">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <div id="mySidenav" class="sidenav" style="text-align:center">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              
          <?php 
            
          if ($requests){
            while( $rm = mysqli_fetch_array($sql_res, MYSQLI_ASSOC)){
          ?>
              <div class="row row_custom">
              <hr>
                <h3><a href="profile.php"><?=$rm['user_id']?></a><br><small><a href="details.php">@<?php echo $rm['project_id']?></a></small></h3>
                   <a href="clogs/accept?project_id=<?=$rm['project_id']?>&request_user=<?=$rm['user_id']?>" class="btn btn-success pull-center">Accept</a>
                      <a href="post.php"><button type="button" class="btn btn-danger pull-center">Reject</button></a>
                </form>
             </div>

                <?php
            }
          }
          else{
            echo "Not Allowed Area!";
          }
        ?>

            </div>
            <ul class="nav navbar-nav navbar-right">

              <li> <a href="#"> <span class="glyphicon glyphicon-envelope" aria-hidden="true" onclick="openNav()">&nbsp;<span style="font-family:Helvetica,Arial,sans-serif;">Requests</span></span></a></li>

                <li ><a href="global.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp; Global Projects</a></li>
                <li>
                    <a href="login.php">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp; Logout
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
</body>
</html>
