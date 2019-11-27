<?php include('include/header.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Schools</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Schools Admin &nbsp;</span></li> 
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
						
								<h2 class="card-title">Schools Admin</h2>
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
	
							<?php if(isset($msg)){ ?>
								<div class="alert alert-danger" id="alert">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong><?php echo $msg ; ?></strong>  
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
											<th> Username</th> 
											<th> School</th>  
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php $i=1; foreach ($school_admin_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<td><?php echo $row->username;?></td>  
											<td><?php echo $row->school_name;?></td>  
									        <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->username;?>','<?php echo $row->password;?>','<?php echo $row->school_id;?>')" class="fa fa-pencil"></i></a>
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



<script type="text/javascript">

$(document).ready(function() {
	 $('#datatable-tabletools').DataTable( {
			destroy: true,
	        dom: 'Bfrtip',
	        
    	 buttons : [
         {
        	 extend: 'excel',
             title: 'SchoolAdmin',
	           footer: true,
	           exportOptions: {
	                columns: [1,2]
	            }
         },
         {
        	 extend: 'print',
             title: 'SchoolAdmin',
	           footer: true,
	           exportOptions: {
	                columns: [1,2]
	            }
         },
         { 
             	extend: 'pdf', 
                title: 'SchoolAdmin',
	           exportOptions: {
	                columns: [1,2]
	            } 
          }
     	]
    } );

} );

var d = document.getElementById("school_admin");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 


$(document).ready(function () {          

    setTimeout(function() {
        $('#alert').slideUp("slow");
    }, 3000);
});
function edit($id,$username,$password,$school){  
	$('#id').val($id);      
	$('#username').val($username);
// 	$('#password').val($password); 
// 	$('#confirm_password2').val($password); 
	$('#schoolid').val($school); 
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}

$(document).ready(function(){
	 $('#confirm_password1').change(function(){   
     document.getElementById("save1").disabled = false;
		$('#msg1').html('');  
	 var confirm_password1 = $('#confirm_password1').val();  
	 var password1 = $('#password1').val();  
	 if(confirm_password1 != password1){
		var msg = 'Password should match!';
		$('#msg1').html(msg);  
		document.getElementById("save1").disabled = true;
	 } 
	 });  

	 $('#confirm_password2').change(function(){   
	     document.getElementById("save2").disabled = false;
	     $('#msg2').html('');  
		 var confirm_password2 = $('#confirm_password2').val();  
		 var password2 = $('#password').val();  
		 if(confirm_password2 != password2){
			var msg = 'Password should match!';
			$('#msg2').html(msg);  
			document.getElementById("save2").disabled = true;
		 } 
	}); 
});

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

</script>
<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  72%;">Add School Admin</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/school_admin');?> 
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Username:</label>
				<div class="col-sm-8">
					<input type="mail" required  maxlength="100" name="username" class="form-control" onkeypress="return AvoidSpace(event)" >
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Password:</label>
				<div class="col-sm-8">
					<input type="password" required  maxlength="100" id="password1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return AvoidSpace(event)" name="password" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Confirm Password:</label>
				<div class="col-sm-8">
					<input type="text" required  maxlength="100" id="confirm_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  onkeypress="return AvoidSpace(event)" name="confirm_password" class="form-control">
					<span id="msg1" style="color: red"></span>
				</div>
			</div>
	       <div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School  :</label>
			<div class="col-sm-8"> 
				<select name="school" required class="form-control">
					<option></option>
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
			</div>
		</div>  
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  id="save1" name="save_school_admin" value="Save">
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
          <h3 class="modal-title" style="margin-right:  72%;">Edit School Admin</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
				
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/school_admin');?> 
         	<input type="hidden" name="id" id="id" class="form-control">
         	
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Username:</label>
				<div class="col-sm-8">
					<input type="text" required readonly  maxlength="100" name="username" id="username" onkeypress="return AvoidSpace(event)" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Password:</label>
				<div class="col-sm-8">
					<input type="password"   name="password"  maxlength="100" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return AvoidSpace(event)" class="form-control">
				</div>
			</div> 
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Confirm Password:</label>
				<div class="col-sm-8">
					<input type="text"   id="confirm_password2"  maxlength="100" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeypress="return AvoidSpace(event)"  name="confirm_password" class="form-control">
					<span id="msg2" style="color: red"></span>
				</div>
			</div>
			
	       <div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School  :</label>
			<div class="col-sm-8"> 
				<select name="school" required id="schoolid" class="form-control" disabled> 
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
			</div>
		</div>  
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" id="save2" type="submit"  name="edit_school_admin" value="Save">
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
          <h3 class="modal-title" style="margin-right: 70%;">Delete School Admin</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		
	<?php $this->load->helper('form');?>
	<?php echo form_open_multipart('Welcome/school_admin'); ?> 
							<section class="card">
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									   <div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control"> 
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_school_admin" value="Delete">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</footer>
								</section> 
						</div>
 	<?php echo form_close(); ?>			
</div>                                          
</div>
</div>                                          
</div>                                        
</div>				