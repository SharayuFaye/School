<?php include('include/header.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Drivers</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Driver &nbsp;</span></li> 
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
						
								<h2 class="card-title">Drivers</h2>
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
                     <?php echo form_open_multipart('Welcome/drivers');?>
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
											<th> Name</th>
											<th> Address</th> 
											<th> Mobile</th> 
											<th>Username</th>  
											<th>Join Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($drivers_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<td><?php echo $row->drivers_name;?></td>
											<td><?php echo $row->drivers_address;?></td>
											<td><?php echo $row->drivers_mobile;?></td> 
											<td><?php echo $row->username;?></td>  
											<td><?php echo $row->join_date;?></td>  									     
											   <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,<?php echo $row->users_id;?>,'<?php echo $row->drivers_name;?>','<?php echo $row->drivers_address;?>','<?php echo $row->drivers_mobile;?>','<?php echo $row->username;?>','<?php echo $row->password;?>' ,'<?php echo $row->join_date;?>')" class="fa fa-pencil"></i></a>
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
       title: 'Drivers',
          footer: true,
          exportOptions: {
               columns: [1,2,3,4,5]
           }
   },
   {
  	 extend: 'print',
       title: 'Drivers',
          footer: true,
          exportOptions: {
               columns: [1,2,3,4,5]
           }
   },
   { 
       	extend: 'pdf', 
          title: 'Drivers',
          exportOptions: {
               columns: [1,2,3,4,5]
           } 
    }
	]
} );

} );

var d = document.getElementById("drivers");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$users_id,$drivers_name,$drivers_address,$drivers_mobile,$username,$password,$join_date){   
	$('#id').val($id);      
	$('#users_id').val($users_id);
	$('#drivers_name').val($drivers_name);   
	$('#drivers_address').val($drivers_address);  
	$('#drivers_mobile').val($drivers_mobile);  
	$('#username').val($username);
	$('#password').val($password);
	$('#join_date').val($join_date);    
	$('#editrow').modal('show'); 
}
function add(){   
	$('#editrow').val($('#mold_name').val());     
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}

$(document).ready(function(){
    $('#mob').change(function(){    
        document.getElementById("save1").disabled = false;
    	var val =  $('#mob').val();  
    	if (/^\d{10}$/.test(val)) {
    		$('#mob_msg').html(''); 
    	} else {
    	    var msg = "Invalid mobile number , must be ten digits";
    	    $('#mob_msg').html(msg);
    	    $('#mob').focus()
    	     document.getElementById("save1").disabled = true;
    	    return false
    	}
    
    }); 
    
    $('#drivers_mobile').change(function(){    
        document.getElementById("save2").disabled = false;
    	var val =  $('#drivers_mobile').val();  
    	if (/^\d{10}$/.test(val)) {
    		$('#mobile_msg').html(''); 
    	} else {
    	    var msg = "Invalid mobile number , must be ten digits";
    	    $('#mobile_msg').html(msg);
    	    $('#drivers_mobile').focus()
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
          <h3 class="modal-title" style="margin-right: 79%;">Add Driver</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/drivers');?> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Name:</label>
				<div class="col-sm-8">
					<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required name="drivers_name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Address:</label>
				<div class="col-sm-8">
					<input type="text" name="drivers_address" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Mobile:</label>
				<div class="col-sm-8"><span id="mob_msg" style="color:red"></span>
					<input type="text" maxlength="10"  min="1" id="mob"  name="drivers_mobile" class="form-control">
				</div>
			</div>
			 <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Username :</label>
				<div class="col-sm-8">
					<input type="text"  name="username" required class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Password :</label>
				<div class="col-sm-8">
					<input type="password"  name="password" required class="form-control">
				</div>
			</div>
			
			  <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
				<div class="col-sm-8">
					<input type="date" name="join_date"  max="<?php echo date('Y-m-d');?>" class="form-control">
				</div>
			</div>
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_driver" id="save1" value="Save">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</footer>
	</section> 


</div>
<?php echo form_close(); ?>

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
          <h3 class="modal-title" style="margin-right: 79%;">Edit Driver</h3>
        </div>
		<div class="modal-body">        
			<?php $this->load->helper('form');?>
        	<?php echo form_open_multipart('Welcome/drivers');?> 
						<input type="hidden" id="id" name="id" class="form-control">
					<input type="hidden" id="users_id" name="users_id" class="form-control">
		       <div class="col-lg-12"> 
		<section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"> Name:</label>
					<div class="col-sm-8">
						<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required  id="drivers_name" name="drivers_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Address:</label>
				<div class="col-sm-8">
					<input type="text" name="drivers_address" id="drivers_address"  class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Mobile:</label>
				<div class="col-sm-8"><span id="mobile_msg" style="color:red"></span>
					<input type="text" maxlength="10"  name="drivers_mobile"     min="1"  id="drivers_mobile" class="form-control">
				</div>
			</div>
			
			  <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Username :</label>
				<div class="col-sm-8">
					<input type="text" readonly  id="username" name="username" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Password :</label>
				<div class="col-sm-8">
					<input type="password"   id="password" name="password" class="form-control">
				</div>
			</div>
			
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
				<div class="col-sm-8">
					<input type="date" id="join_date" name="join_date"  max="<?php echo date('Y-m-d');?>" class="form-control">
				</div>
			</div>

		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="edit_driver" id="save2" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</footer>
		</section>
	</form>
</div>
<?php echo form_close(); ?>

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
          <h3 class="modal-title" style="margin-right:79%;">Delete Driver</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									 <?php $this->load->helper('form');?>
                                     <?php echo form_open_multipart('Welcome/drivers');?> 
										<div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="drivers_name" name="driver" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_driver" value="Delete">
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