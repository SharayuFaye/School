<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Class Attendance</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard.php">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><a href="attendances.php"><span>Attendance</span></a></li>
				<li><span>Class Attendance &nbsp;</span></li> 
			</ol> 
		</div>
	</header>

	<!-- start: page -->
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
		
				<h2 class="card-title">Class Attendance : Class A</h2>
			</header>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">
							<!-- <button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button> -->
						</div>
					</div>
				</div> 		
 

			<?php
			$date = '2019-'.date('m').'-01';
			$end = '2019-'.date('m').'-' . date('t', strtotime($date)); //get end date of month
		    ?>
			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
				<thead>
					<tr>
						<th>Sr No</th> 
						<th>Student</th> 
						 <?php $count=0;
						 while(strtotime($date) < strtotime($end)) {
						        $day_num = date('d', strtotime($date));
						        $day_name = date('m', strtotime($date));
						        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
						        echo "<th>$date</th>";
						        $count++;
						    }
						    ?>
						<!-- <th>Actions</th> -->
					</tr>
				</thead>
				 <tbody><?php $i=1; foreach ($students_show as $row) { ?>
					<tr data-item-id="<?php echo $i;?>">
						<td><?php echo $i;?></td>  
						<td><a href="<?php echo base_url(); ?>index.php/student_attendance"><?php echo $row->student_name;?></a></td>
						<?php for($j=0;$j<$count;$j++){   ?>
						<td><?php  foreach ($attendances_class_show as $row) { 
						    while(strtotime($date) < strtotime($end)) {
						        $day_num = date('d', strtotime($date));
						        $day_name = date('m', strtotime($date));
						        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
						        echo "<th>$date</th>"; 
						        if($date == $row->date){
						            echo $row->attendance;
						        }
						    } 
						    }?></td> 
						<?php }  ?> 
					</tr> 
					<?php $i++;} ?> 
				</tbody>  
			</table>




				<div class="col-sm-4">
					<div class="mb-3">
						<a href="attendances.php"><button id="addToTable"  class="btn btn-primary"> <i class="fa fa-arrow-left "></i> Back</button></a>
					</div>
				</div>

			</div>
		</section>
	<!-- end: page -->
</section>
			<?php include('include/footer.php');?>	

	
<!-- Vendor -->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url(); ?>vendor/popper/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>vendor/common/common.js"></script>
<script src="<?php echo base_url(); ?>vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url(); ?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo base_url(); ?>vendor/select2/js/select2.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script> 
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>js/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url(); ?>js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>js/theme.init.js"></script>

<!-- Examples<?php echo base_url(); ?> -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.row.with.details.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.tabletools.js"></script>
 