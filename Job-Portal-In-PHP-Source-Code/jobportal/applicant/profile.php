<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = New Applicants();
	  $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
  ?>

    <div class="hero-wrap js-fullheight" style="background-color: #0BE0FD">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Profile</h1>
          </div>
        </div>
      </div>
    </div>
  <style type="text/css">
/*    #image-container {
      width: 230px;
    }*/
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle">Profile</h2>
          </div>
      </div>
  </div>
</section>
<div class="container" style="margin-top: 10px;min-height: 600px;">

    <div class="row">

        <div class="col-sm-3"><!--left col-->
           <div class="panel panel-default">            
            <div class="panel-body"> 
              <div  id="image-container">
                <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="">  
              </div>
             </div>
          <ul class="list-group"> 
         
            <li class="list-group-item text-muted">Profile</li> 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real Name</strong></span> 
             <?php echo $applicant->FNAME .' '.substr($applicant->MNAME, 1,2).'. '.$applicant->LNAME; ?> 
             </li>
            
          </ul> 
                

          <div class="box box-solid">  
            <div class="box-body no-padding"> 
                <p class="<?php echo ($view=='appliedjobs' || $view=='') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=appliedjobs'; ?>"><i class="fa fa-list"></i> Applied Jobs
                   </a></p>
                  <p class="<?php echo ($view=='accounts') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Accounts </a></p>
                <p class="<?php echo ($view=='message') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Messages
                  <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a></p>
                   <p class="<?php echo ($view=='notification') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notification
                  <span class="label label-success pull-right"><?php echo $notif; ?></span></a></p>

                    <p class=""><a href="<?php echo web_root.'logout.php';?>">Logout</span></a></p>
                  
            </div>
            <!-- /.box-body -->
          </div>
  
          <!-- /.box -->
          </div>
          
        </div> 
        <div class="col-sm-9">
        <?php
        check_message();  
        check_active(); 
            
        ?>

          <!-- <h1><?php echo $applicant->FNAME .' '.$applicant->MNAME.' '.$applicant->LNAME; ?>  </h1> -->
<?php 
    // if ($view =="message") { 
    //  require_once("message.php");
    // }elseif($view=='notification'){  
    //     require_once("notification.php");  
    // }elseif($view=='appliedjobs'){    
    //     require_once("appliedjobs.php"); 
    // }elseif($view=='accounts'){  
    //     require_once("accounts.php");  
    // }else{ 
    //     require_once("appliedjobs.php");
    // } 

    switch ($view) {
      case 'message':
        # code...
        require_once("message.php");
        break;
      case 'notification':
        # code...
        require_once("notification.php");
        break;
      case 'appliedjobs':
        # code...
        require_once("appliedjobs.php");
        break;
      case 'accounts':
        # code...
        require_once("accountprofile.php");
        break;
      
      default:
        # code...
        require_once("appliedjobs.php");
        break;
    }
?>  
         <!--   <ul class="nav nav-tabs" id="myTab">
        <li class="<?php echo  $_SESSION['appliedjobs']; ?>"><a href="<?php echo web_root.'applicant/index.php?view=appliedjobs'; ?>" >Applied Jobs</a></li> 
        <li class="<?php echo  $_SESSION['accounts'];  ?>"><a href="<?php echo web_root.'applicant/index.php?view=accounts'; ?>" >Accounts</a></li> 
      </ul>
          
      <div class="tab-content bottomline">
         
         <div class="tab-pane <?php echo $_SESSION['appliedjobs']; ?>" id="appliedjobs"><br/>  
         </div>
           <div class="tab-pane <?php echo $_SESSION['accounts']; ?>" id="accounts"><br/>  
          </div> 

        </div> -->    
        </div><!--/col-sm-9-->
    </div><!--/row-->

  </div><!--/contanier--> 

   <?php  
    unset($_SESSION['appliedjobs']);
    unset($_SESSION['accounts']); 
     ?>
 
         <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                                </div>

                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
