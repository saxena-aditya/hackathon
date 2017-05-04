<?php
 include ('header.php');
  
?>
<div class="container-fluid">
    <div class="row">
        <!--<div class="col-md-4">
            <div class="container">
                <h2>Edit Pic</h2>
                <img src="images/profile.png" alt="users-image"style="width:80%;height:auto;" class="img-thumbnail img-responsive">
              <!--<h2>Edit Pic</h2>
              <p>The .img-thumbnail class creates a thumbnail of the image:</p>            
              <img src="http://placehold.it/400x400">
            </div>
        </div>-->
        <div class="col-md-4">
                 <div class="panel panel-default" >
                    <div class="panel-body"  >
                      <div style="text-align:center">
                            
                            <img src="images/profile.png" alt="Avatar" class="image" style="width:100%;height:50%;">
                          <form role="form" action="details.php" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success pull-right" style="margin-top:10px">Upload Picture</button>
                          </form>
                      </div>
                  </div>
               </div>
             </div>
        <div class="col-md-8 ">
            <div class="container " id="edit_profile" style="margin-top:20px;margin-left:10px">
              <div class="text-center"><h2>Edit Info</h2></div>
              <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Name:</label>
                  <div class="col-sm-6">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">User Name:</label>
                  <div class="col-sm-6">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Password:</label>
                  <div class="col-sm-6">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Branch:</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Sem:</label>
                  <div class="col-sm-6">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
                </div>
              </form>
            </div>

        </div>
    </div>
</div>