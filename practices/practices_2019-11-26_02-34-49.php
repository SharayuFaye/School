	<?php include('include/header.php');?>	
				<section Maids="main" class="content-body">
					<header class="page-header">
						<h2>Helper</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs" style="margin-right: 30px;">
								<li>
									<a href="<?php echo base_url(); ?>index.php/dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Helper</span></li>
							</ol>
					
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Helper</h2>
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
											<button id="addToTable"  onclick="add()"  class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>

			 <!--          for upload -->					
								<?php $this->load->helper('form');?>
								<?php echo form_open_multipart('Welcome/helper_master'); ?>
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
											<th>Name</th>
											<th>Address</th>
											<!-- <th>Society Name</th> -->
											<th>Mob No</th>
											<th>Vehicle Number</th> 
											<th>Service Schedule</th> 
											<th>Image</th>
											<th>ID Proof</th>
											<th>Actions</th> 
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($helper_master_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<td><?php echo $row->helper_name;?></td> 
											<td><?php echo $row->address;?></td> 
											<!-- <td><?php echo $row->society_name;?></td>  -->
											<td><?php echo $row->mobile_number;?></td>  
											<td><?php echo $row->vehicle_number;?></td> 
											<td><?php $pick ='';
								                $pickup = explode(',',$row->flat_id);
								                for($i=0;$i<count($pickup);$i++){
								                foreach ($flat_show as $row1) {  
									            if($pickup[$i] == $row1->id){
									            $pick .=  $row1->flat_no;
									            }
								                }$pick .= ' , ';
								                } 
								
								                echo rtrim($pick,' , ');?>
								                </td>     
											<td><img src="<?php echo base_url(); ?>image/<?php echo $row->image;?>" width="35" height="35"/></td> 
											<td><?php echo $row->id_proof;?></td>
									        <td class="actions">
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->helper_name;?>','<?php echo $row->address;?>','<?php echo $row->society_id;?>','<?php echo $row->mobile_number;?>','<?php echo $row->vehicle_number;?>','<?php echo $row->flat_id;?>','<?php echo $row->image;?>','<?php echo $row->id_proof;?>')" class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(<?php echo $row->id;?>)" ></i></a>
											</td>
										</tr>
										<?php $i++;} ?>
									</tbody>
								</table>
								<?php echo form_close(); ?>
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
var d = document.getElementById("helper_master");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

$(document).ready(function () {          

    setTimeout(function() {
        $('#alert').slideUp("slow");
    }, 3000);


    
});		


// Model
function edit($id,$name,$address,$society,$mobile_number,$vehicle_number,$service_schedule,$image,$id_proof){  
	$('#id').val($id);      
	$('#name').val($name); 
	$('#address').val($address);   
	$('#society').val($society);    
	$('#mobile_number').val($mobile_number);    
	$('#vehicle_number').val($vehicle_number);    
	//$('#service_schedule').val($service_schedule);
	var service_schedule = $service_schedule; 
	var strArray = service_schedule.split(","); 
    var my_html ='';
    for(var i = 0; i < strArray.length; i++){ 

        my_html +='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="service_schedule[]" id="pickE'+i+'" class="form-control">'; 
        my_html +='<?php  foreach ($flat_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->flat_no;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>'; 
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove E" >Remove</button>';
        my_html +='</div></div>';   
    }
    $('#pickupE').html(my_html); 
    for(var i = 0; i < strArray.length; i++){  
    	$('#pickE'+i).val(strArray[i]);  
    }

	document.getElementById("image").src = '<?php echo base_url(); ?>image/'+$image;   
	$('#id_proof').val($id_proof);     
    $('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}

// Model End
function edit_pickup(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="service_schedule[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($flat_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->flat_no;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove E" >Remove</button>';
        my_html +='</div></div>'; 
      $('#pickupE').append(my_html);  
 } 

var i=2; 
function add_pickup(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="service_schedule[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($flat_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->flat_no;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove" >Remove</button>';
        my_html +='</div></div>'; 
      $('#pickup').append(my_html);  
 }  
$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
}); 



function phonenumber(v)
{ 
    document.getElementById("save1").disabled = false;
	var val = v; 
	if (/^\d{10}$/.test(val)) {
		$('#msg_m').html(''); 
	} else {
	    var msg = "Invalid mobile number , must be ten digits";
	    $('#msg_m').html(msg);
	    $('#mobile1').focus()
	     document.getElementById("save1").disabled = true;
	    return false
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
	    $('#mobile_number').focus()
	     document.getElementById("save2").disabled = true; 
	}
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

</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" Helper="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  72%;">Add Helper</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
		<?php $this->load->helper('form');?>
        <?php echo form_open_multipart('Welcome/helper_master');?>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Name:</label>
				<div class="col-sm-8">
					<input type="text" name="name" maxlength="100" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Address:</label>
				<div class="col-sm-8">
					<input type="text" name="address" maxlength="150" class="form-control" required>
				</div>
			</div>
 
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Society:</label>
				<div class="col-sm-8"> 
					<select name="society" class="form-control" required>
						<option></option>
					    <?php  foreach ($society_show as $row) { ?>
					    <option value="<?php echo $row->id;?>"><?php echo $row->society_name;?></option> 
					    <?php } ?> 
						</select>  
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Mob No:</label>
				<div class="col-sm-8"><span id="msg_m" style="color:red"></span> 
					<input type="text"  required name="mobile_number" id="mobile1" onKeyPress="if(this.value.length==15) return false;" onchange="phonenumber(this.value)" class="form-control">
				</div> 
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Vehicle Number:</label>
				<div class="col-sm-8"> 
					<input type="text" maxlength="20" name="vehicle_number" class="form-control" required>
				</div> 
			</div> 
			<div class="form-group row">
	    	<label class="col-sm-4 control-label text-sm-left pt-2"></label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Flat number</label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Action</label> 
			</div>

			<div id="pickup">
				<div id="row1"  class="form-group row" >
				<div  style="padding: 10px;" class="col-sm-4 text-sm-right"> 
					<span class="req" >*</span>
					<button onclick="add_pickup()" type="button" class="btn btn-primary">Add New </button>
				</div>	
				<div  style="padding: 10px;" class="col-sm-4"> 
					<select  name="service_schedule[]" class="form-control">
						<option></option>
						<?php foreach ($flat_show as $flat) { ?>
							<option value="<?php echo  $flat->id;?>"><?php echo  $flat->flat_no;?></option>
						<?php } ?>
					</select>
				</div> 
			</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Image  :</label>
				<div class="col-sm-8"><span id="msg_i" style="color:red"></span>
					<input type="file" name="image" accept="image/*" onchange="validateImage(this.id)"  id="society_img" class="form-control" required>
					( File accepts only jpg , png , jpeg type image file. )
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>ID Proof:</label>
				<div class="col-sm-8"> 
					<input type="text" name="id_proof" maxlength="50" class="form-control" required>
				</div> 
			</div>

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit" id="save1" name="save_helper" value="Save">
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
<div class="modal fade" id="editrow" Helper="dialog"  >
<div class="modal-dialog">
         <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  72%;">Edit Helper</h3>
        </div>
		<div class="modal-body">
		<?php $this->load->helper('form');?>
        <?php echo form_open_multipart('Welcome/helper_master');?>         
		       <div class="col-lg-12"> 
 
							<section class="card"> 
								<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Name:</label>
										<div class="col-sm-8">
											<input type="hidden" id="id" name="id" class="form-control">
											<input type="text" id="name" name="name" maxlength="100" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control"required>
										</div> 
									</div> 	
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Address:</label>
										<div class="col-sm-8"> 
											<input type="text" id="address" name="address" maxlength="150" class="form-control" required>
										</div> 
									</div> 
									<!-- <div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2">Society:</label>
										<div class="col-sm-8"> 
											<select name="society" id="society" class="form-control" required>
												<?php  foreach ($society_show as $row) { ?>
						                        <option value="<?php echo $row->id;?>"><?php echo $row->society_name;?></option> 
					                            <?php } ?> 
											</select>  
										</div>
									</div> -->
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Mob No:</label>
										<div class="col-sm-8"><span id="msg_e" style="color:red"></span> 
											<input type="text" required id="mobile_number" name="mobile_number" onKeyPress="if(this.value.length==15) return false;" onchange="phonenumber_edit(this.value)" class="form-control">
										</div> 
									</div> 
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Vehicle Number:</label>
										<div class="col-sm-8"> 
											<input type="text" id="vehicle_number" maxlength="20" name="vehicle_number" class="form-control" required>
										</div> 
									</div> 
									<div class="form-group row">
	    		                       <div   class="col-sm-4 text-sm-right"> 
	    		                       	   <span class="req" >*</span>
					                       <button onclick="edit_pickup()" type="button" class="btn btn-primary">Add New </button>
 				                       </div>	
				                         <label class="col-sm-4 control-label text-sm-left pt-2">Flat Number</label><label class="col-sm-4 control-label text-sm-left pt-2">Action</label> 
			                           </div>
	       
	    	                        <div id="pickupE"> 
			                        </div>
									
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Image  :</label>
										<div class="col-sm-8"><span id="msg_ie" style="color:red"></span>  
											<input type="file"  name="image" accept="image/*" onchange="validateImageE(this.id)" id="soicetyE" class="form-control">
											<img src="img/logo.png" id="image" width="35" height="35"   />
											( File accepts only jpg , png , jpeg type image file. )
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>ID Proof</label>
										<div class="col-sm-8"> 
											<input type="text" id="id_proof" name="id_proof" maxlength="50" class="form-control" required>
										</div>
									</div> 
									

							    </div>


								<footer class="card-footer text-right">
									<input class="btn btn-primary" type="submit" id="save2"  name="edit_helper" value="Update">
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
<div class="modal fade" id="delrow" Helper="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:72%;">Delete Helper</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
									<?php $this->load->helper('form');?>
                                       <?php echo form_open_multipart('Welcome/helper_master');?>
										<div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="helper_name" name="helper" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_helper" value="Delete">
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