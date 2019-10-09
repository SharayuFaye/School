<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>School</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables/media/css/dataTables.bootstrap4.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css"> 
		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>vendor/modernizr/modernizr.js"></script>
		
 
	</head>
	<style>
	.btn-secondary{
	   color: #333 !important;
        background-color: #fff !important;
        border-color: #ccc !important;
        box-shadow: none !important; 
	}
	 
html .btn-secondary:hover,
html .btn-secondary.hover {
    	background-color: #ccc !important;
    	border-color: #ccc #ccc #ccc !important;
     } 
    
html .btn-secondary.disabled,
html .btn-secondary:disabled {
    	background-color: #ccc !important;
    	border-color: #ccc #ccc #ccc !important;
    }
    
html .btn-secondary:focus,
html .btn-secondary.focus {
	box-shadow: 0 0 0 3px #ccc !important;
}
    
html .btn-secondary:active,
html .btn-secondary.active,
.show > html .btn-secondary.dropdown-toggle {
    	background-color: #ccc !important;
    	background-image: none !important;
    	border-color: #ccc #ccc #ccc !important; 
    }
    .show > .btn-secondary.dropdown-toggle {
    	background-color: #ccc !important;
    	background-image: none;
    	border-color: #ccc #ccc #b7281f;
    }
  .btn-group{
	   padding-left: 84.5%;
          padding-bottom: 1%;
	}
	</style>
<script type="text/javascript">  
	    setTimeout(function() {
	        $('#alert').slideUp("slow");
	    }, 3000); 
	    setTimeout(function() {
	        $('#success').slideUp("slow");
	    }, 3000); 
	</script>
	
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
						<img src="<?php echo base_url(); ?>logo/<?php  echo $this->session->userdata['logo'];?>" width="75" height="35" alt="Porto Admin" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			 
			
					 
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url(); ?>img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="<?php echo base_url(); ?>img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php  echo ucfirst($this->session->userdata['username']);?></span>
								<span class="role"><?php  echo ucfirst($this->session->userdata['role']);?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
<!-- 								<li> -->
<!-- 									<a role="menuitem" tabindex="-1" href="profile"><i class="fa fa-user"></i> My Profile</a> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a> -->
<!-- 								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/logout_admin"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Menu
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/dashboard">
				                            <i class="fa fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				       
<?php   if( $this->session->userdata['role'] == 'school_admin' ||  $this->session->userdata['role'] == 'admin'  ){ ?>             
				                    <li class="nav-parent" id="nav">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-columns" aria-hidden="true"></i>
				                            <span>Configure</span>
				                        </a>
				                        <ul class="nav nav-children">
											 <?php  if( $this->session->userdata['role'] == 'admin'){ ?>
<!-- 				                            <li>  
				                                <a class="nav-link" href="<?php // echo base_url(); ?>index.php/roles">
<!-- 				                                    Roles 
<!-- 				                                </a>  
<!-- 				                            </li> -->
				                        	 <li id="school">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/school">
				                                    School
				                                </a>
				                            </li>
				                           
				                            <li id="school_admin">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/school_admin">
				                                   School Admin
				                                </a>
				                            </li>
				                               <li id="backgrounds">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/backgrounds">
				                                    Background
				                                </a>
				                            </li>
				                             <li id="home_page_menu">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/home_page_menu">
				                                    Home Page Menu
				                                </a>
				                            </li>
				                           <?php } if( $this->session->userdata['role'] == 'school_admin'){ ?>
				                         
				                            <li id="teachers">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/teachers">
				                                   Teacher Details
				                                </a>
				                            </li> 
<!-- 				                             <li id="class">  
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/class">
<!-- 				                                    Class -->
<!-- 				                                </a> -->
<!-- 				                            </li> -->
				                            
				                            <li id="sections">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/sections">
				                                    Sections
				                                </a>
				                            </li>

				                            <li id="route">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/route">
				                                    PickUp Point
				                                </a>
				                            </li>
				                            <li id="sel_route">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/sel_route">
				                                   Route
				                                </a>
				                            </li>
				                            <li id="bus">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/bus">
				                                    Bus
				                                </a>
				                            </li>
				                           <li id="drivers">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/drivers">
				                                    Drivers
				                                </a>
				                            </li>
				                           
				                            <li id="students">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/students">
				                                    Students
				                                </a>
				                            </li>

				                            <li id="exam_type">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/exam_type">
				                                    Exam Type
				                                </a>
				                            </li>
											<?php } ?>

				                        </ul>
				                    </li> 
  <?php }  if( $this->session->userdata['role'] == 'school_admin' ||  $this->session->userdata['role'] == 'teacher'  ){ ?>
				                    <li class="nav-parent" id="nav1">
				                        <a class="nav-link" href="#">
				                           <i class="fa fa-list-alt" aria-hidden="true"></i>
				                            <span>Forms</span>
				                        </a>
				                        <ul class="nav nav-children">
				                 
  <?php }  if( $this->session->userdata['role'] == 'school_admin'){ ?>               
				                            <li id="fees">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/fees">
				                                    Fees
				                                </a>
				                            </li>

				                            <li id="exams">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/exams">
				                                    Exams
				                                </a>
				                            </li>
<?php } if( $this->session->userdata['role'] == 'school_admin' ||  $this->session->userdata['role'] == 'teacher'  ){ ?>
				                            <li id="marks">
				                               <a class="nav-link" href="<?php echo base_url(); ?>index.php/marks">
				                                    Marks
				                                </a>
				                            </li>
                                            <li id="practices">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/practices">
				                                   Practice
				                                </a>
				                            </li>
          
  <?php }  if( $this->session->userdata['role'] == 'school_admin'){ ?>                                   
				                            <li id="notifications">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/notifications">
				                                    Notifications
				                                </a>
				                            </li>
<?php } if( $this->session->userdata['role'] == 'school_admin' ||  $this->session->userdata['role'] == 'teacher'  ){ ?>
				                            <li id="attendances">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/attendances">
				                                    Attendance
				                                </a>
				                            </li>
				                            <li id="timetables">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/timetables">
				                                    Timetable
				                                </a>
				                            </li>
  <?php }  if( $this->session->userdata['role'] == 'teacher'){ ?>  
				                            <li id="homework">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/homework">
				                                    Homework
				                                </a>
				                            </li>
				                            <li id="leaves">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/leaves">
				                                    Leaves
				                                </a>
				                            </li>
<?php } if( $this->session->userdata['role'] == 'school_admin' ||  $this->session->userdata['role'] == 'teacher'  ){ ?>
				                            <li id="activity">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/activity">
				                                    Activity
				                                </a>
				                            </li>
	<?php } if( $this->session->userdata['role'] == 'school_admin'){ ?>			                             
				                            <li id="faq">
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/faq">
				                                    FAQs
				                                </a>
				                            </li>
				                             
<!-- 				                            <li id="transportation">  
				                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/transportation">
<!-- 				                                   Transportation  
<!-- 				                                </a> -->
<!-- 				                            </li> -->
 
				                        </ul>
				                    </li> 
				 <?php } ?>                   
				                        </ul>
				                    </li>
				
				                </ul>
				            </nav>
				
				            <hr class="separator" />
				 
				             
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->