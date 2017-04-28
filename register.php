<?php
include ('header_visitor.php');
 ?>
<div class="container-fluid " >
  <div class="row ">
        <div class="col-sm-12">
            <h3>Login</h3>
        </div>
              <div class="col-sm-6 col-md-6" >
                 <div class="panel panel-default">
                    <div class="panel-body" >
                      <form class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data">
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
                                 <input id="name" maxlength="50" name="username" type="text">
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
