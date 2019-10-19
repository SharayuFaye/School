<?php include('include/header.php');?>	
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Home Page Menus</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Home Page Menus &nbsp;</span></li> 
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
						
								<h2 class="card-title">Home Page Menus</h2>
							</header>
							<div class="card-body">
	<?php if(isset($error_msg)){ ?>
		<div class="alert alert-danger" id="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong><?php echo $error_msg; ?></strong>  
			</div>
	<?php } ?>
	
	<?php if(isset($success_msg)){ ?>
		<div class="alert alert-success" id="success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong><?php echo $success_msg; ?></strong>  
			</div>
	<?php } ?>
							
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
									<thead>
										<tr>
											<th>Sr No</th>
											<th>Menu Name</th> 
											<th>Page Name</th> 
											<th>School</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php $i=1; foreach ($home_page_menu_show as $row) { ?>
										<tr data-item-id="<?php echo $i;?>"> 
											<td><?php echo $i;?></td> 
											<td><?php echo $row->menu_name;?></td> 
											<td><?php echo ucfirst($row->page_name);?></td> 
											<td><?php echo $row->school_name;?></td> 
									        <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->menu_name;?>','<?php echo $row->page_name;?>','<?php echo $row->school_id;?>' )" class="fa fa-pencil"></i></a>
												<!-- <a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(<?php echo $row->id;?>)" ></i></a> -->
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
		<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script><?php echo base_url(); ?>
		<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
		<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>js/theme.init.js"></script>

		<!-- Examples -->
		<script src="<?php echo base_url(); ?>js/examples/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>js/examples/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>js/examples/examples.datatables.tabletools.js"></script>
 
<script type="text/javascript">

$(document).ready(function() {
	 $('#datatable-tabletools').DataTable( {
			destroy: true,
	        dom: 'Bfrtip',
	        
    	 buttons : [
         {
        	 extend: 'excel',
             title: 'HomePageMenu',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3]
	            }
         },
         {
        	 extend: 'print',
             title: 'HomePageMenu',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3]
	            }
         },
         { 
             	extend: 'pdf', 
                title: 'HomePageMenu',
	           exportOptions: {
	                columns: [1,2,3]
	            } 
          }
     	]
    } );

} );

var d = document.getElementById("home_page_menu");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 


function edit($id,$menu_name,$page_name,$school){  
	$('#id').val($id);      
	$('#menu_name').val($menu_name);
	$('#page_name').val($page_name); 
	$('#school1').val($school);
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}
</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  67%;">Add Home Page Menu</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/home_page_menu');?>  
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Page Name :</label>
				<div class="col-sm-8">
					<select name="page_name"  required class="form-control">
						<option></option>
						<option value="notification" >Notification</option>
						<option value="fees" >Fees</option>
						<option value="activity" >Activity</option>
						<option value="homework" >Homework</option>
						<option value="exam" >Exam</option>
						<option value="marks" >Marks</option>
						<option value="attendance" >Attendance</option>
						<option value="timetable" >Timetable</option>
						<option value="practice" >Practice</option> 
						
						<option value="leaves" >Leaves</option>
						
						<option value="busroute" >Busroute</option> 
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Menu Name:</label>
				<div class="col-sm-8">
					<input type="text" required name="menu_name" class="form-control">
				</div>
			</div>
	    	<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="Date" name="date" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Details:</label>
				<div class="col-sm-8">
					<input type="text" name="details" class="form-control">
				</div>
			</div> -->
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School:</label>
				<div class="col-sm-8">
					<select  name="school"  required class="form-control">
						<option></option>
						<?php  foreach ($school_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
	        

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_home_page_menu" value="Save">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</footer>
<?php echo form_close(); ?>
	</section>  
</div> 

</div>                                          
</div>
</div>                                          
</div>
</div>        

<!-- edit row -->
<div class="modal fade" id="editrow" role="dialog"  >
<div class="modal-dialog">
         <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  67%;">Edit Home Page Menu</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
			
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/home_page_menu');?> 
		<section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 

				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Page Name :</label>
				<div class="col-sm-8">
					<select name="page_name" id="page_name"  required class="form-control">
							<option value="notification" >Notification</option>
						<option value="fees" >Fees</option>
						<option value="activity" >Activity</option>
						<option value="homework" >Homework</option>
						<option value="exam" >Exam</option>
						<option value="marks" >Marks</option>
						<option value="attendance" >Attendance</option>
						<option value="timetable" >Timetable</option>
						<option value="practice" >Practice</option> 
						
						<option value="leaves" >Leaves</option>
						
						<option value="busroute" >Busroute</option> 
					</select>
				</div>
			</div>


				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Menu Name:</label>
				<div class="col-sm-8">
					<input type="hidden" id="id" name="id" class="form-control">
					<input type="text" id="menu_name" required  name="menu_name" class="form-control">
				</div>
			</div>
	    	<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Page Name:</label>
				<div class="col-sm-8">
					<input type="text" readonly id="page_name" name="page_name" class="form-control">
				</div>
			</div>   -->
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School:</label>
				<div class="col-sm-8">
					<select  name="school"  id="school1" required  class="form-control">
						<?php  foreach ($school_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
	    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="edit_home_page_menu" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</footer>
		</section>
<?php echo form_close(); ?>
	</form>
</div> 

</div>                                          
</div>
</div>       
</div>                                          
</div>
<!-- del row -->
<div class="modal fade" id="delrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right: 63%;">Delete Home Page Menu</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									   <div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="menu_name" name="menu" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_home_page_menu" value="Delete">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</footer>
								</section> 
						</div>
						
</div>                                          
</div>
</div>                                          
</div>                                        
</div>							