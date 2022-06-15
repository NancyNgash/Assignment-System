<div class="row-fluid">
    <div class="span12">


        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">

                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                
                    </div>

                </div>
            </div>
        </div>
        <div class="hero-unit-header">
            <div class="container">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span6">
                             <img src="">

                            </div>
                            <div class="span6">
                                <div class="pull-right">
                                    <!--- login button -->							
                                  <?php 
                                    $student_query=mysqli_query($conn,"select * from teacher where teacher_id='$session_id'")or die(mysqli_error());
                                    $teacher_row=  mysqli_fetch_array($student_query);
                                    ?>
                                    
                                    <div class="btn-group">
                                       
                                        <button class="btn btn-success"><i class="icon-user icon-large"></i>&nbsp; <?php echo $user_row['firstname'] . " " . $user_row['lastname']; ?></button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#logout" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                                        </ul>

                                    </div>

                                    <?php include('logout_modal.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>