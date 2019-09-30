<?php include('include/header.php');?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/magnific-popup/magnific-popup.css" />
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Leaves</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Leaves&nbsp;</span></li> 
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
						
								<h2 class="card-title">Leaves</h2>
							</header>
							<div class="card-body">
	 				
<?php if(isset($error_msg)){ ?>
	<div class="alert alert-danger" id="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong ><?php echo $error_msg; ?></strong>  
		</div>
<?php } ?>

<?php if(isset($success_msg)){ ?>
	<div class="alert alert-success" id="success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><?php echo $success_msg; ?></strong>  
		</div>
<?php } ?>
<!--          for upload -->
        	<?php if(isset($duplicate_record)){    if(isset($duplicate_record[0])){  ?>
        		<div class="alert alert-success" id="duplicate">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        				<strong>Duplicate entries for user - <?php $i=1;foreach($duplicate_record as $record){ ?> <?php echo $i.") "; echo $record; ?> <?php $i++ ;} ?></strong>  
        			</div>
        	<?php }else{ ?>
        	<div class="alert alert-success" id="success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong>Record inserted successfully!</strong>  
			</div>
			<?php } } ?>
   
							<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
									<thead>
										<tr>
  											<th>Sr No</th>  
											<th>Class</th>
											<th>Sections</th> 
											<th>Student Name</th>  
											<th>Reason</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Status</th>
											<th>Remark</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
 
										<?php $i=1; foreach ($leaves_show as $row) { ?>
										<tr data-item-id="1">
										 <td><?php echo $i;?></td> 
											<td><?php echo $row->class_id;?></td>  
											<td><?php echo $row->sections;?></td>  
											<td><?php echo $row->student_name;?></td>  
											<td><?php echo $row->reason;?></td>
											<td><?php echo $row->start_date;?></td>  
											<td><?php echo $row->end_date;?></td>  
											<td><?php echo $row->status;?></td> 
											<td><?php echo $row->remark;?></td>  
 
											<td class="actions">
												<button id="default-success" class="mt-3 mb-3 btn btn-success"  onclick="approve('<?php echo $row->id;?>','approved')" <?php if($row->status == 'pending'){ echo "enable='false'"; }else{ echo "disabled='true'"; }?> >Approve</button>
												<button id="default-error" class="mt-3 mb-3 btn btn-danger"  onclick="approve('<?php echo $row->id;?>','rejected')" <?php if($row->status == 'pending'){ echo "enable='false'"; }else{ echo "disabled='true'"; }?> >Reject</button>												 
											 
											</td>
										</tr> 
										<?php $i++;} ?> 
									  
									</tbody>
								</table>
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
		<script src="<?php echo base_url(); ?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>js/theme.init.js"></script> 
<!-- Examples<?php echo base_url(); ?> -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.row.with.details.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.tabletools.js"></script>
		
<!-- Specific Page Vendor -->
<script src="<?php echo base_url(); ?>vendor/pnotify/pnotify.custom.js"></script>
<!-- Examples -->
<script src="<?php echo base_url(); ?>js/examples/examples.notifications.js"></script>
 
<script type="text/javascript"> 

var d = document.getElementById("leaves");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 
 
$('#successMsg').hide();
 function approve($leave_id, $status ){    
	 console.log($leave_id); console.log($status);
     $.ajax({
    	 type: "GET",
    	 url: "<?php echo base_url(); ?>index.php/approve", 
    	 data:  'leave_id='+$leave_id+'&status='+$status,
         datatype : "json",
    	 success: function(parents)  
    	 {   
    		 console.log(parents);
    		 location.reload(true);  
    		 
    	 } 
     });  
}
</script>  
 			