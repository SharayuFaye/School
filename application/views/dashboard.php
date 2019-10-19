<?php include('include/header.php');?>	

			
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Dashboard</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo base_url(); ?>index.php/dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Dashboard  &nbsp;</span></li> 
			</ol> 
		</div>
	</header><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
<script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
	var x = new Date()
	var x1=x.toLocaleString();
  $('#time').html(x1);
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
	<!-- start: page --> 
				<div style=" text-align: right;"  class="col-xl-12"> 		
                	 <p id="time"></p>
                </div> 
	<div class="row">
	
									 
<?php   if( $this->session->userdata['role'] == 'school_admin'  ){ ?>  
		<div class="col-lg-4 mb-3">
			<section class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div class="chart-data-selector" id="salesSelectorWrapper">
								<h2> 
									<strong>
										 Student Attendence  -  <?php echo date("Y")-1; ?>-<?php echo date("y"); ?>
										<?php //foreach ($school_show as $row){ if($this->session->userdata['school'] ==  $row->id){ ?>
											 <?php // echo $row->school_name; ?> 
										<?php //} } ?> 
									</strong>
								</h2>
	
								<div id="salesSelectorItems" class="chart-data-selector-items mt-3">
									<!-- Flot: Sales Porto Admin -->
									<div class="chart chart-sm" data-sales-rel="3" id="flotDashSales1" class="chart-active" style="height: 203px;"></div> 
									<script>
	
										var flotDashSales1Data = [{
										    data: [     
										    	["Jan", <?php if(isset($attendances_count[1])){ echo $attendances_count[1]; } ?>],
										    	["Feb", <?php if(isset($attendances_count[2])){ echo $attendances_count[2]; } ?>],
										    	["Mar", <?php if(isset($attendances_count[3])){ echo $attendances_count[3]; } ?>],
										    	["Apr", <?php if(isset($attendances_count[4])){ echo $attendances_count[4]; } ?>],
										    	["May", <?php if(isset($attendances_count[5])){ echo $attendances_count[5]; } ?>],
										    	["Jun", <?php if(isset($attendances_count[6])){ echo $attendances_count[6]; } ?>],
										    	["Jul", <?php if(isset($attendances_count[7])){ echo $attendances_count[7]; } ?>],
										    	["Aug", <?php if(isset($attendances_count[8])){ echo $attendances_count[8]; } ?>],
										    	["Sep", <?php if(isset($attendances_count[9])){ echo $attendances_count[9]; } ?>],
										    	["Oct", <?php if(isset($attendances_count[10])){ echo $attendances_count[10]; } ?>],
										    	["Nov", <?php if(isset($attendances_count[11])){ echo $attendances_count[11]; } ?>],
										    	["Dec", <?php if(isset($attendances_count[12])){ echo $attendances_count[12]; } ?>]
										    ],
										    color: "#0088cc"
										}];
	
										// See: js/examples/examples.dashboard.js for more settings.
	
									</script>
	
									 
								</div>
	
							</div>
						</div> 
					</div>
				</div>
			</section>
		</div>
		
		
		
<?php  } if( $this->session->userdata['role'] == 'school_admin'  ){ ?>  
		<div class="col-lg-8">  
			<div class="row">
				 
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-primary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Students</h4>
										<div class="info">
											<strong class="amount"><?php echo $students_count;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-primary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Student present</h4>
										<div class="info">
											<strong class="amount"><?php echo $attendances_count_today ;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<br>
			<div class="row">
				 
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-tertiary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-tertiary">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary"> 
										<h4 class="title">Total Teacher</h4>
										<div class="info">
											<strong class="amount"><?php echo $teachers_count;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-tertiary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-tertiary">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Drivers</h4>
										<div class="info">
											<strong class="amount"><?php echo $drivers_count;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<?php

}
		if( $this->session->userdata['role'] == 'admin'  ){ ?>
		<div class="col-lg-8">  
			<div class="row">
				 
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-primary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total School</h4>
										<div class="info">
											<strong class="amount"><?php echo $school_count;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-xl-5">
					<section class="card card-featured-left card-featured-primary" style="height: 135px;">
						<div class="card-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total School Admin</h4>
										<div class="info">
											<strong class="amount"><?php echo $school_admin_count;?></strong>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			 
		</div>
		<?php
		
		}?>
	</div>
	
	
	</div>
	<!-- end: page -->
</section> 
		<?php include('include/footer.php');?>	
			<script src="<?php echo base_url(); ?>/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/common/common.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page <?php echo base_url(); ?>/vendor -->
		<script src="<?php echo base_url(); ?>/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jquery-appear/jquery-appear.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/flot/jquery.flot.categories.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/raphael/raphael.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/morris/morris.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/gauge/gauge.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/snap.svg/snap.svg.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="<?php echo base_url(); ?>/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/js/theme.init.js"></script>

		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/js/examples/examples.dashboard.js"></script>