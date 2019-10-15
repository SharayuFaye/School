<?php include('include/header.php');?>
<section role="main" class="content-body">
<header class="page-header">
	<h2>Attendance</h2>

	<div class="right-wrapper text-right">
		<ol class="breadcrumbs">
			<li>
				<a href="dashboard">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Forms</span></li>
			<li><span>Attendance &nbsp;</span></li> 
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
	
			<h2 class="card-title">Attendance</h2>
		</header>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-3">
						<!-- <button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button> -->
					</div>
				</div>
			</div>
			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Class</th>
						<th>Date</th> 
						<th>Attendance</th> 
						<th>Section</th> 
						<th>Teacher </th>
					<!-- 	<th>Actions</th> -->
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach ($attendances_show as $row) { ?>
					<tr data-item-id="<?php echo $i;?>">
						<td><?php echo $i;?></td> 
						<td><a href="class_attendance?class=<?php echo $row->class_id;?>"><?php echo $row->class;?></a></td>
						<td><?php echo $row->date;?></td> 
						<td><?php echo $row->attendance;?></td>
						<td><?php echo $row->sections;?></td> 
						<td><?php echo $row->teacher_name;?></td> 
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
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
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>js/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url(); ?>js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>js/theme.init.js"></script>
 
<!-- Examples<?php echo base_url(); ?> -->
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.default.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.row.with.details.js"></script>
<script src="<?php echo base_url(); ?>js/examples/examples.datatables.tabletools.js"></script>
	
 
<<script type="text/javascript">

$(document).ready(function() {
	 $('#datatable-tabletools').DataTable( {
			destroy: true,
	        dom: 'Bfrtip',
            scrollX : true,
            scrollCollapse : true,
	        
   	 buttons : [
        {
       	 extend: 'excel',
            title: 'Attendances',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            }
        },
        {
       	 extend: 'print',
            title: 'Attendances',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Attendances',
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            } 
         }
    	]
	   } );

} );

var d = document.getElementById("attendances");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 

</script>
 