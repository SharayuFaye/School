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
								<li><span>Schools &nbsp;</span></li> 
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
						
								<h2 class="card-title">Schools</h2>
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
											<th> Name</th>
											<th> Address</th> 
											<th> Mobile</th> 
											<th> Alternate Mobile</th> 
											<th> Logo</th>
											<th> Mail</th> 
<!-- 											<th>Date</th> -->
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php $i=1; foreach ($school_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<td><?php echo $row->school_name;?></td> 
											<td><?php echo $row->school_address;?></td> 
											<td><?php echo $row->school_mobile;?></td> 
											<td><?php echo $row->school_mobile2;?></td> 
											<td><img src="<?php echo base_url(); ?>logo/<?php echo $row->school_logo;?>" width="35" height="35"/></td>  
											<td><?php echo $row->school_mail;?></td> 
											<!-- <td><?php echo $row->date;?></td>  -->
									        <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->school_name;?>','<?php echo $row->school_address;?>','<?php echo $row->school_mobile;?>','<?php echo $row->school_mobile2;?>','<?php echo $row->school_logo;?>','<?php echo $row->school_mail;?>','<?php echo $row->date;?>')" class="fa fa-pencil"></i></a>
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
             title: 'School',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,6]
	            }
         },
         {
        	 extend: 'print',
             title: 'School',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,6]
	            }
         },
         { 
             	extend: 'pdf', 
                title: 'School',
	           exportOptions: {
	                columns: [1,2,3,4,6]
	            } 
          }
     	]
    } );

} );
	
var d = document.getElementById("school");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$school_name,$school_address,$school_mobile,$school_mobile2,$school_logo,$school_mail,$date){  
	$('#id').val($id);      
	$('#school_name').val($school_name);
	$('#school_address').val($school_address); 
	$('#school_mobile').val($school_mobile); ; 
	$('#school_mobile2').val($school_mobile2); ; 
	//$('#school_logo').val($school_logo);  
	document.getElementById("school_logo").src = '<?php echo base_url(); ?>logo/'+$school_logo;
	$('#school_mail').val($school_mail);
	$('#date').val($date);    
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}


function phonenumber(v)
{ 
    document.getElementById("save1").disabled = false;
	var val = v; 
	if (/^\d{10}$/.test(val)) {
		$('#msg1m').html(''); 
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	    $('#msg1m').html(msg);
	    $('#mobile1').focus()
	     document.getElementById("save1").disabled = true;
	    return false
	}
}

function phonenumbercheck(v)
{  

	document.getElementById("save1").disabled = false;
	var val =  $('#mobile1').val(); 
    if (/^\d{10}$/.test(val)) {
		$('#msg1m').html(''); 
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	     document.getElementById("save1").disabled = true; 
	    $('#msg1m').html(msg);
	}
 
    if (/^\d{10}$/.test(v)) {
		$('#msg21').html(''); 
	    document.getElementById("save2").disabled = false;
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	     document.getElementById("save1").disabled = true; 
	    $('#msg21').html(msg);
	}
	
	if (v == val) { 
	    var msg = "Mobile and alternate mobile number should not be same!"; 
	     document.getElementById("save1").disabled = true;
	    $('#msg2m').html(msg);
	    $('#mobile1').focus()
	     
	} else {
		$('#msg2m').html('');	  
	    document.getElementById("save1").disabled = false;
	}

	
}
function phonenumber_edit(v)
{ 
    document.getElementById("save2").disabled = false;
	var val = v; 
	if (/^\d{10}$/.test(val)) {
		$('#msg_e').html(''); 
	    document.getElementById("save2").disabled = false;
	} else {
		console.log(val);
	    var msg = "Invalid mobile number , must be ten digits";
	    $('#msg_e').html(msg); 
	    $('#school_mobile').focus()
	     document.getElementById("save2").disabled = true; 
	}
}

function phonenumbercheck_edit(v)
{ 
    document.getElementById("save2").disabled = false;
	var val =  $('#school_mobile').val(); 
    if (/^\d{10}$/.test(val)) {
		$('#msg_e').html(''); 
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	     document.getElementById("save2").disabled = true; 
	    $('#msg_e').html(msg);
	}
 
    if (/^\d{10}$/.test(v)) {
		$('#msg_e3').html(''); 
	    document.getElementById("save2").disabled = false;
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	     document.getElementById("save2").disabled = true; 
	    $('#msg_e3').html(msg);
	}
	
	if (v == val) { 
	    var msg = "Mobile and alternate mobile number should not be same!"; 
	     document.getElementById("save2").disabled = true;
	    $('#msg_e2').html(msg);
	    $('#school_mobile2').focus()
	     
	} else {
		$('#msg_e2').html('');	  
	    document.getElementById("save2").disabled = false;
	}
}


function ValidateEmail(v)
{ 
    document.getElementById("save1").disabled = false;
	var val = v; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg1').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg1').html(msg); 
	     document.getElementById("save1").disabled = true; 
	}
}


function ValidateEmailE(v)
{ 
    document.getElementById("save2").disabled = false;
	var val = v; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg2').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg2').html(msg); 
	     document.getElementById("save2").disabled = true; 
	}
}

</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  82%;">Add School</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/school');?> 
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Name:</label>
				<div class="col-sm-8">
					<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'  maxlength="100" required name="school_name" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Address:</label>
				<div class="col-sm-8">
					<input type="text" required name="school_address"  maxlength="200" class="form-control">
				</div>
			</div>
					
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Mobile:</label>
				<div class="col-sm-8"><span id="msg1m" style="color:red"></span>
					<input type="text" maxlength="10"  required name="school_mobile" id="mobile1" onchange="phonenumber(this.value)" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Alternate Mobile:</label>
				<div class="col-sm-8"> <span id="msg2m" style="color:red"></span>
				<span id="msg21" style="color:red"></span>
					<input type="text" maxlength="10"  required name="school_mobile2" onchange="phonenumbercheck(this.value)" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Logo:</label>
				<div class="col-sm-8">
					 <input type="file" accept="image/*" required name="school_logo" class="form-control">
					 	 ( File accepts only jpg , png , jpeg type image file. )
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Mail:</label>
				<div class="col-sm-8"><span id="msg1" style="color:red"></span>
					<input type="email" required  maxlength="100" name="school_mail" onchange="ValidateEmail(this.value)" id="smail" class="form-control">
				</div>
			</div>
			<input type="hidden"  name="date" value="<?php echo date('Y-m-d');?>"  class="form-control">
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					
				</div>
			</div> -->

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit" id="save1" name="save_school" value="Save">
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit School</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
				
	<?php $this->load->helper('form');?>
	<?php echo form_open_multipart('Welcome/school'); ?> 
			<section class="card"> 
				<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Name:</label>
				<div class="col-sm-8">
					<input type="text" required id="school_name" name="school_name"  onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'  maxlength="100" class="form-control">
					<input type="hidden" id="id" name="id" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Address:</label>
				<div class="col-sm-8">
					<input type="text" required id="school_address" name="school_address"  maxlength="200" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Mobile:</label> 
				<div class="col-sm-8"><span id="msg_e" style="color:red"></span>
					<input type="text" maxlength="10"  required id="school_mobile"   name="school_mobile"  onchange="phonenumber_edit(this.value)"  class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Alternate Mobile:</label>
				<div class="col-sm-8"><span id="msg_e2" style="color:red"></span>
				<span id="msg_e3" style="color:red"></span>
					<input type="text" maxlength="10"  required name="school_mobile2" id="school_mobile2" onchange="phonenumbercheck_edit(this.value)"  class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Logo:</label>
				<div class="col-sm-8">
					 <input type="file" accept="image/*"  name="school_logo" class="form-control">
					 	 ( File accepts only jpg , png , jpeg type image file. )<br>
					 <img src="img/logo.png"  id="school_logo"   width="35" height="35"/>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>School Mail:</label>
				<div class="col-sm-8"><span id="msg2" style="color:red"></span>
					<input type="mail" required id="school_mail"  maxlength="100" onchange="ValidateEmailE(this.value)" name="school_mail" class="form-control">
				</div>
			</div>
		<!-- 	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" required id="date" name="date" max="<?php echo date('Y-m-d');?>" class="form-control">
				</div>
			</div> -->
		</div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit" id="save2"  name="edit_school" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete School</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		
	<?php $this->load->helper('form');?>
	<?php echo form_open_multipart('Welcome/school'); ?> 
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
										<input class="btn btn-primary" type="submit"  name="del_school" value="Delete">
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