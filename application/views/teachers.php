<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Teacher Details</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Teacher Details &nbsp;</span></li> 
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
		
				<h2 class="card-title">Teacher Details</h2>
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
        				<strong><?php print_r($success_msg); ?></strong>  
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
  
<!--    end      for upload -->      	
				<div class="row">
					<div class="col-sm-6"> 
						<div class="mb-3">
						 <button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
					  </div>
					</div>
				</div>
				
<!--          for upload -->
            		 <?php $this->load->helper('form');?>
                     <?php echo form_open_multipart('Welcome/teachers');?>
				<div class="form-group row" style="padding-left: 50%; margin-top: -57px;padding-bottom:20px;"> 
						<div class="col-sm-9"> 
            				<input  type="file" accept=".xls"required  name="xls_file" class="form-control ">
            				</div>
						<div class="col-sm-3">
							<input type="submit" id="upload" name="upload_xls" class="btn btn-primary" value="Upload XLS"> 
					</div>
				</div>
					 <?php echo form_close(); ?>
					 
<!--          for upload -->
				<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Teacher Name</th>
							<th>Teacher Address</th> 
							<th>Teacher Mobile</th>
							<th>Teacher Mail</th>
							<th>Username</th>  
							<th>Profile</th>
							<th>Salary Details</th> 
							<th>Education Details</th>
							<th>Join Date</th>
							<!-- <th>School</th>  -->
							<th>Actions</th>
						</tr>
					</thead>
					<tbody> 
					<?php $i=1; foreach ($teachers_show as $row) { ?>
						<tr data-item-id="1"> 
							<td><?php echo $i;?></td> 
							<td><?php echo $row->teacher_name;?></td> 
							<td><?php echo $row->teacher_address;?></td> 
							<td><?php echo $row->teacher_mobile;?></td> 
							<td><?php echo $row->teacher_mail;?></td> 
							<td><?php echo $row->username;?></td>  
							<td><img src="<?php echo base_url(); ?>profile/<?php echo $row->profile;?>" width="35" height="35"/></td>
							<td><?php echo $row->salary_details;?></td> 
							<td><?php echo $row->education_details;?></td> 
							<td><?php echo $row->join_date;?></td> 
							<!-- <td><?php echo $row->school_name;?></td>   -->
					        <td class="actions">
								<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,<?php echo $row->users_id;?>,'<?php echo $row->teacher_name;?>','<?php echo $row->teacher_address;?>','<?php echo $row->teacher_mobile;?>','<?php echo $row->teacher_mail;?>','<?php echo $row->username;?>','<?php echo $row->password;?>','<?php echo $row->profile;?>','<?php echo $row->salary_details;?>','<?php echo $row->education_details;?>','<?php echo $row->join_date;?>','<?php echo $row->school_name;?>' )" class="fa fa-pencil"></i></a>
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
             title: 'Teachers',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,7,8,9]
	            }
         },
         {
        	 extend: 'print',
             title: 'Teachers',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,7,8,9]
	            }
         },
         { 
             	extend: 'pdf', 
                title: 'Teachers',
	           exportOptions: {
	                columns: [1,2,3,4,5,7,8,9]
	            } 
          }
     	]
    } );

} );


var d = document.getElementById("teachers");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 


function edit($id,$users_id,$teacher_name,$teacher_address,$teacher_mobile,$teacher_mail,$username,$password,$profile,$salary_details,$education_details,$join_date,$school){    
	$('#id').val($id);    
	$('#users_id').val($users_id);   
	$('#teacher_name').val($teacher_name);
	$('#teacher_address').val($teacher_address); 
	$('#teacher_mobile').val($teacher_mobile); 
	document.getElementById("profile").src = '<?php echo base_url(); ?>profile/'+$profile;
	$('#teacher_mail').val($teacher_mail);
	$('#username').val($username);
// 	$('#password').val($password);
// 	$('#confirm_password2').val($password);
	$('#salary_details').val($salary_details);
	$('#education_details').val($education_details);
	// $('#class').val($class); 
	// $('#section').val($section);; 
	$('#join_date').val($join_date);  
	$('#school').val($school);    
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}


function validateImage(id) {
    var formData = new FormData();
    $('#msg_i').html(''); 
    document.getElementById("save1").disabled = false;
    var file = document.getElementById(id).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") { 
        var msg_i = "Please select a valid image file!";
	    $('#msg_i').html(msg_i); 
	     document.getElementById("save1").disabled = true; 
        document.getElementById(id).value = ''; 
    }
    if (file.size > 250000) { 
        document.getElementById(id).value = ''; 
        var msg_i = "Max Upload size is 250KB only!";
	    $('#msg_i').html(msg_i); 
	     document.getElementById("save1").disabled = true;  
    } 
}

function validateImageE(id) {
    var formData = new FormData();
    $('#msg_ie').html(''); 
    document.getElementById("save1").disabled = false;
    var file = document.getElementById(id).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") { 
        var msg_i = "Please select a valid image file!";
	    $('#msg_ie').html(msg_i); 
	     document.getElementById("save1").disabled = true; 
        document.getElementById(id).value = ''; 
    }
    if (file.size > 250000) { 
        document.getElementById(id).value = ''; 
        var msg_i = "Max Upload size is 250KB only!";
	    $('#msg_ie').html(msg_i); 
	     document.getElementById("save2").disabled = true;  
    } 
}

function ValidateEmail(v)
{ 
    document.getElementById("save1").disabled = false;
	var val = v; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg1t').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg1t').html(msg); 
	     document.getElementById("save1").disabled = true; 
	}
}


function ValidateEmailE(v)
{ 
    document.getElementById("save2").disabled = false;
	var val = v; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg2t').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg2t').html(msg); 
	     document.getElementById("save2").disabled = true; 
	}
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
	 $('#password1').change(function(){   
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

	 $('#password').change(function(){   
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

	 $('#teacher_mob').change(function(){    
	     document.getElementById("save1").disabled = false;
	 	var val =  $('#teacher_mob').val();  
	 	if (/^\d{10}$/.test(val)) {
	 		$('#teacher_mob_msg').html(''); 
	 	} else {
	 	    var msg = "Invalid mobile number , must be ten digits";
	 	    $('#teacher_mob_msg').html(msg);
	 	    $('#teacher_mob').focus()
	 	     document.getElementById("save1").disabled = true;
	 	    return false
	 	}

	 }); 

	 $('#teacher_mobile').change(function(){    
	     document.getElementById("save2").disabled = false;
	 	var val =  $('#teacher_mobile').val();  
	 	if (/^\d{10}$/.test(val)) {
	 		$('#teacher_mobile_msg').html(''); 
	 	} else {
	 	    var msg = "Invalid mobile number , must be ten digits";
	 	    $('#teacher_mobile_msg').html(msg);
	 	    $('#teacher_mobile').focus()
	 	     document.getElementById("save2").disabled = true;
	 	    return false
	 	}

	 }); 
});

</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  70%;">Add Teacher Details</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/teachers');?>
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Name:</label>
				<div class="col-sm-8">
					<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' name="teacher_name" required class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Address:</label>
				<div class="col-sm-8">
					<input type="text" name="teacher_address" required  class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Mobile:</label>
				<div class="col-sm-8"><span id="teacher_mob_msg" style="color:red"></span>
					<input type="text" maxlength="10" name="teacher_mobile" id="teacher_mob" required  class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Mail:</label>
				<div class="col-sm-8"><span id="msg1t" style="color:red"></span>
					<input type="mail"  onchange="ValidateEmail(this.value)"  required  name="teacher_mail" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Username :</label>
				<div class="col-sm-8">
					<input type="text"  name="username"  required required class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Password :</label>
				<div class="col-sm-8">
					<input type="password" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  name="password"  required required class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Confirm Password:</label>
				<div class="col-sm-8">	<span id="msg1" style="color: red"></span>
					<input type="text" id="confirm_password1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required  name="confirm_password" class="form-control">
				
				</div>
			</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Profile Image:</label>
					<div class="col-sm-8"><span id="msg_i" style="color:red"></span>
						<input type="file" accept="image/*" onchange="validateImage(this.id)" id="profile_img" name="profile" class="form-control">
					 	 ( File accepts only jpg , png , jpeg type image file & Max Upload size is 250KB only )
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Salary Details:</label>
				<div class="col-sm-8">
					<input type="number" min="0" name="salary_details" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Education Details:</label>
				<div class="col-sm-8">
					<input type="text"  name="education_details" required  class="form-control">
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select name="class" class="form-control">
						<option>5th</option>
						<option>8th</option>
						<option>3rd</option>
						<option>4th</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select name="section" class="form-control">
						<option>A Section</option>
						<option>B Section</option>
						<option>C Section</option>
						<option>D Section</option>
					</select>
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
				<div class="col-sm-8">
					<input type="date" name="join_date" min="<?php echo $school_show_id[0]->date; ?>" max="<?php echo date('Y-m-d');?>" class="form-control">
				</div>
			</div>
		<!-- <div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2">School  :</label>
			<div class="col-sm-8"> 
				<select name="school" class="form-control">
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
			</div>
		</div>  -->

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit" id="save1" name="save_teachers" value="Save">
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
          <h3 class="modal-title" style="margin-right:  70%;">Edit Teacher Details</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
	
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/teachers');?> 
					<input type="hidden" id="id" name="id" class="form-control">
					<input type="hidden" id="users_id" name="users_id" class="form-control">
					
		<section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Name:</label>
				<div class="col-sm-8">
					<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' id="teacher_name" required  name="teacher_name" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Address:</label>
				<div class="col-sm-8">
					<input type="text" id="teacher_address" required  name="teacher_address" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Mobile:</label>
				<div class="col-sm-8"><span id="teacher_mobile_msg" style="color:red"></span>
					<input type="text"  maxlength="10" id="teacher_mobile" required  name="teacher_mobile" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Mail:</label>
				<div class="col-sm-8"><span id="msg2t" style="color:red"></span>
					<input type="mail"  required  onchange="ValidateEmailE(this.value)"  id="teacher_mail" name="teacher_mail" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Username :</label>
				<div class="col-sm-8">
					<input type="text" readonly     id="username" name="username" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Password :</label>
				<div class="col-sm-8">
					<input type="password"   id="password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"      name="password" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Confirm Password:</label>
				<div class="col-sm-8">
					<input type="text" id="confirm_password2"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"    name="confirm_password" class="form-control">
					<span id="msg2" style="color: red"></span>
				</div>
			</div>
			
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Profile Image:</label>
					<div class="col-sm-8"><span id="msg_ie" style="color:red"></span>
					<input type="file" accept="image/*" onchange="validateImageE(this.id)" id="profileE"    name="profile" class="form-control">
					 
					 	 ( File accepts only jpg , png , jpeg type image file & Max Upload size is 250KB only )<br>
					 	 <img src="profile/logo.png" id="profile"  width="35" height="35"   />
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Salary Details:</label>
				<div class="col-sm-8">
					<input type="number" min="0"  id="salary_details" name="salary_details" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Education Details:</label>
				<div class="col-sm-8">
					<input type="text" id="education_details"  required name="education_details" class="form-control">
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select name="class" id="class" class="form-control">
						<option>5th</option>
						<option>8th</option>
						<option>3rd</option>
						<option>4th</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select name="section" id="section"  class="form-control">
						<option>A Section</option>
						<option>B Section</option>
						<option>C Section</option>
						<option>D Section</option>
					</select>
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
				<div class="col-sm-8">
					<input type="date" id="join_date"  min="<?php echo $school_show_id[0]->date; ?>" max="<?php echo date('Y-m-d');?>"  name="join_date" class="form-control">
				</div>
			</div>	
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">School  :</label>
				<div class="col-sm-8"> 
					<select name="school" class="form-control">
						<?php  foreach ($school_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
						<?php } ?> 
					</select>  
				</div>
			</div> 	 -->				
				
		</div>
				<footer class="card-footer text-right">
					<input class="btn btn-primary" type="submit"  name="edit_teachers" id="save2" value="Update">
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
          <h3 class="modal-title" style="margin-right: 66%;">Delete Teacher Details</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
			
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/teachers');?> 
         <section class="card">
				 
				<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
				   <div class="modal-wrapper">
					 <div class="modal-text">
						 <div class="modal-text">
		                 <p>Are you sure that you want to delete this row?</p>
		                 <input type="hidden" id="id_del" name="id" class="form-control">
							<input type="hidden" id="teacher_name" name="teacher" class="form-control">
	                    </div>
					 </div>
					</div>
			    </div>
				<footer class="card-footer text-right">
					<input class="btn btn-primary" type="submit"  name="del_teachers" value="Delete">
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