<?php include('include/header.php');?>	
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Class</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Class &nbsp;</span></li> 
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
						
								<h2 class="card-title">Class</h2>
							</header>
							<div class="card-body">
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
											<!-- <th>School</th> -->
											<th>Class</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>  
									<?php  $i=1; foreach ($class_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<!-- <td><?php echo $row->school_name;?></td>  -->
											<td><?php echo $row->class;?></td>  
									        <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->school_id;?>','<?php echo $row->class;?>')" class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(<?php echo $row->id;?>)" ></i></a>
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


<script type="text/javascript">
var d = document.getElementById("class");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$school,$class){ 

	$('#id').val($id);        
	$('#class1').val($class); 
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
          <h3 class="modal-title" style="margin-right:  82%;">Add Class</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/class');?> 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">School:</label>
				<div class="col-sm-8">
					<select name="school" class="form-control">
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
				</div>
			</div> -->
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class  :</label>
				<div class="col-sm-8">
					<input type="text" name="class"   class="form-control">
				</div>
			</div>
	      
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_class" value="Save">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</footer>
	</section>  
<?php echo form_close(); ?>
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit Class</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
				
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/class');?> 
		<section class="card"> 
				<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
					<input type="hidden" name="id" id="id"   class="form-control">
				<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">School:</label>
				<div class="col-sm-8">
					
					<select name="school" id="school"   class="form-control">
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
				</div>
			</div> -->
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class :</label>
				<div class="col-sm-8">
					<input type="text" name="class" id="class1"   class="form-control">
				</div>
			</div>	
	    </div>
		<footer class="card-footer text-right">
			<input class="btn btn-primary" type="submit"  name="edit_class" value="Update">
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
          <h3 class="modal-title" style="margin-right: 80%;">Delete Class</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
	
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/class');?>  
         <section class="card">
									 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="class_name" name="class" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_class" value="Delete">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</footer>
		</section> 
<?php echo form_close(); ?>
						</div>
						
</div>                                          
</div>
</div>                                          
</div>                                        
</div>								