<?php include('include/header.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Bus</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Bus &nbsp;</span></li> 
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
						
								<h2 class="card-title">Bus</h2>
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
                        	<?php if(isset($duplicate_record)){    if($duplicate_record[0]){  ?>
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
								<style type="text/css">
									table {
										    background : none !important;
										}
								</style>
							
<!--          for upload  
            		 <?php $this->load->helper('form');?>
                     <?php echo form_open_multipart('Welcome/bus');?>
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
											<th>Bus No</th> 
											<th>Student Strength</th> 		
											<th>Routes</th>  
  										    <th>Drivers</th>  
											<th class="myclass" style=" background: none !important;">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if($bus_show){ $i=1; foreach ($bus_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td>
											<td><?php echo $row->bus_number;?></td>
											<td><?php echo $row->student_strength;?></td>
											<td>
											<?php $pick ='';
											if($route_map_show){  foreach ($route_map_show as $drv) {
											    if($drv->bus_id == $row->id){?>
											<?php $pick .=  $drv->route_name; $pick .=' , ';  ?>
											<?php } }  echo rtrim($pick,' , '); } ?>
											</td>
											<td>
											<?php $pick ='';
											if($driver_map_show){  foreach ($driver_map_show as $drv) {
											    if($drv->bus_id == $row->id){?>
											<?php $pick .=  $drv->drivers_name; $pick .=' , ';  ?>
											<?php } }  echo rtrim($pick,' , '); } ?>
											</td>
											
									<td>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->bus_number;?>','<?php echo $row->student_strength;?>')"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(<?php echo $row->id;?>)"></i></a>
											</td>
										</tr>
										<?php $i++;} }?>  
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
		
		 
		<script src="<?php echo base_url(); ?>vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script> 
		<script src="<?php echo base_url(); ?>vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?php echo base_url(); ?>vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url(); ?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> 
		
		
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
var d = document.getElementById("bus");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 
 
function edit($id,$bus_no,$student_strength){ 
 
	$('#id').val($id);      
	$('#bus_no').val($bus_no);
	//$('#bus_routes').val($bus_routes); 
	$('#student_strength').val($student_strength);  
	var id = $id;  

	 console.log(id)
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/route_map", 
		 data: 'id='+id,
	     datatype : "json",
		 success: function(classD)  
		 {   
	     	 //console.log(classD)
	     	var my_html ='';
			 var obj = $.parseJSON(classD);
	     	// console.log(obj)
	            $.each(obj, function (index, object) { 
	            	console.log(object); 

	            	  my_html +='<div id="rowR'+index+'"   class="form-group row"  style="padding: 10px;"> '; 
			          my_html +='<label class="col-sm-4 text-sm-right"></label>';
			          my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
			          my_html +='<select  name="route[]" class="form-control">';  
	    		      my_html +='<option value="'+object.route_id+'">'+object.route_name+'</option> '; 
			          my_html +='</select>'; 
			          my_html +='</div>';
			          my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
			          my_html +='<button type="button" id="R'+index+'" class="btn btn-danger btn_remove rt" >Remove</button>';
			          my_html +='</div></div>'; 
	                	 
	            }) 

	            $('#routeE').html(my_html);  
		 } 
	 
	 
	 }); 

	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/driver_map", 
		 data: 'id='+id,
	     datatype : "json",
		 success: function(classD)  
		 {   
	     	 //console.log(classD)
	     	var my_html ='';
			 var obj1 = $.parseJSON(classD);
	     	// console.log(obj)
	            $.each(obj1, function (index, object) { 
	            	console.log(object); 

	            	  my_html +='<div id="row'+index+'"   class="form-group row"  style="padding: 10px;"> '; 
			          my_html +='<label class="col-sm-4 text-sm-right"></label>';
			          my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
			          my_html +='<select  name="drivers[]"  class="form-control">';  
	    		      my_html +='<option value="'+object.drivers_id+'">'+object.drivers_name+'</option> '; 
			          my_html +='</select>'; 
			          my_html +='</div>';
			          my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
			          my_html +='<button type="button" id="'+index+'" class="btn btn-danger btn_remove drv" >Remove</button>';
			          my_html +='</div></div>'; 
	                	 
	            })  
	            $('#driverE').html(my_html);  
		 }  
	 }); 
	 
    
	
	$('#editrow').modal('show');  
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}


$(document).on('click', '.E', function(){   
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
}) 
 
function edit_driver(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="drivers[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($drivers_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->drivers_name;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove drv" >Remove</button>';
        my_html +='</div></div>'; 
      $('#driverE').append(my_html);  
 } 

var i=2; 
function add_driver(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="drivers[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($drivers_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->drivers_name;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove drv" >Remove</button>';
        my_html +='</div></div>'; 
      $('#driver').append(my_html);  
 }  
$(document).on('click', '.drv', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});  




function edit_route(){ 
      i++;  
      var my_html ='<div id="rowR'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="route[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($route_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->route_name;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="R'+i+'" class="btn btn-danger btn_remove rt" >Remove</button>';
        my_html +='</div></div>'; 
      $('#routeE').append(my_html);  
 } 

var i=2; 
function add_route(){ 
      i++;  
      var my_html ='<div id="rowR'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="route[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($route_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->route_name;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="R'+i+'" class="btn btn-danger btn_remove rt" >Remove</button>';
        my_html +='</div></div>'; 
      $('#route1').append(my_html);  
 }  
$(document).on('click', '.rt', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});  

</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  82%;">Add Bus</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card"> 
<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/bus');?> 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Bus Number:</label>
				<div class="col-sm-8">
					<input type="text" maxlength="100" required name="bus_number" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Strength:</label>
				<div class="col-sm-8">
					<input type="number" min="1" name="student_strength" class="form-control">
				</div>
			</div>
			
			
	    	
			<div id="route1">
				<div id="r1"  class="form-group row" >
				<div  style="padding: 10px;" class="col-sm-4 text-sm-right"> 
					<button onclick="add_route()" type="button" class="btn btn-primary">Add New Route</button>
				</div> 
				<div  style="padding: 10px;" class="col-sm-4">
					<select  name="route[]" class="form-control">
						<option></option>
				 		<?php  foreach ($route_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->route_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			</div>
			
			<div id="driver">
				<div id="row1"  class="form-group row" >
				<div  style="padding: 10px;" class="col-sm-4 text-sm-right"> 
					<button onclick="add_driver()" type="button" class="btn btn-primary">Add New Driver</button>
				</div>	
				<div  style="padding: 10px;" class="col-sm-4"> 
					<select  name="drivers[]" class="form-control">
						<option></option>
				 		<?php  foreach ($drivers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->drivers_name;?></option> 
						<?php } ?> 
					</select>
				</div> 
			</div>
			</div>
	         	  
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_bus" value="Save">
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit Bus</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
	<section class="card"> 
<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/bus');?> 
					<input type="hidden" id="id" name="id" class="form-control">
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Bus Number:</label>
				<div class="col-sm-8">
					<input type="text"  maxlength="100" id="bus_no" name="bus_number" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Strength:</label>
				<div class="col-sm-8">
					<input type="number" min="1" id="student_strength" name="student_strength" class="form-control">
				</div>
			</div>
	    
	    
	    
	    	<div class="form-group row">  
	    		<div   class="col-sm-4 text-sm-right"> 
					<button onclick="edit_route()" type="button" class="btn btn-primary">Add New Routes</button>
 				</div>	
				<label class="col-sm-4 control-label text-sm-left pt-2">Routes</label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Action</label>  
			</div>
			
	    	<div id="routeE"> 
			</div> 
			<div class="form-group row">
	    		<div   class="col-sm-4 text-sm-right"> 
					<button onclick="edit_driver()" type="button" class="btn btn-primary">Add New  Driver</button>
 				</div>	
				<label class="col-sm-4 control-label text-sm-left pt-2">Drivers</label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Action</label> 
			</div>
	       
	    	<div id="driverE"> 
			</div>
	    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="edit_bus" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</footer>
<?php echo form_close(); ?>
			</section>
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
          <h3 class="modal-title" style="margin-right: 82%;">Delete Bus</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/bus');?>
								<section class="card">
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									   <div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="bus_name" name="bus" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_bus" value="Delete">
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