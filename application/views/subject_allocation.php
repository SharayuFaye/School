<?php include('include/header.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Subject Allocation</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Subject Allocation &nbsp;</span></li> 
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
						
								<h2 class="card-title">Subject Allocation</h2>
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
        	<?php   if(isset($duplicate_record)){    if(isset($duplicate_record[0])){  ?>
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
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>
								
		<!-- 			 <?php $this->load->helper('form');?>
                 <?php echo form_open_multipart('Welcome/subject_allocation');?>
				<div class="form-group row" style="padding-left: 50%; margin-top: -57px;padding-bottom:20px;"> 
					<div class="col-sm-9">  -->
<!--             				<input  type="file" accept=".xls"required  name="xls_file" class="form-control "> -->
<!--             				</div> -->
<!-- 						<div class="col-sm-3"> -->
<!-- 							<input type="submit" id="upload" name="upload_xls" class="btn btn-primary" value="Upload XLS">  -->
<!-- 					</div> -->
<!-- 				</div> 
				  <?php echo form_close(); ?>-->
					 
								<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
									<thead>
										<tr> 
											<!-- <th>School</th> -->
											<th>Class</th>
											<th>Sections</th>
											<th>Subject </th>   
											<th>Teachers</th> 
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($subject_allocation_show as $row) { ?>
										<tr data-item-id="1">  
											<td><?php echo $row->class;?></td>  
											<td><?php echo $row->sections;?></td>  
											<td><?php echo $row->subject;?></td> 
											<td><?php echo $row->teacher_name;?></td> 
											<td class="actions"> 
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->class_id;?>',
												'<?php echo $row->sections;?>','<?php echo $row->sections_id;?>',
												'<?php echo $row->subject;?>','<?php echo $row->subject_id;?>',
												'<?php echo $row->teachers_id;?>')" class="fa fa-pencil"></i></a>
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
            title: 'Subject Allocation',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3]
	            }
        },
        {
       	 extend: 'print',
            title: 'Subject Allocation',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Subject Allocation',
	           exportOptions: {
	                columns: [0,1,2,3]
	            } 
         }
    	]
   } );

} );


var d = document.getElementById("subject_allocation");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$class,$section,$section_id,$subject,$subject_id,$teachers_id){ 

	$('#id').val($id);       
	$('#class2').val($class);
	
	var opt = $('<option />');  
	 opt.val($section_id);
	 opt.text($section);
	 $('#section2').append(opt);	
	 
	 var opt = $('<option />');  
	 opt.val($subject);
	 opt.text($subject);
	 $('#subject2').html(opt);
	  
	$('#teacher2').val($teachers_id); 
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
	
$('#class1').change(function(){  
	         $("#section1 > option").remove();  
	         var class1 = $('#class1').val();  
	        	 $.ajax({
	        		 type: "GET",
	        		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
	        		 data: 'class_sel='+class1,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD);
	        			 var opt = $('<option />');  
						 opt.val('');
						 opt.text('');
						 $('#section1').append(opt); 
	                        $.each(obj, function (index, object) { 
	                        	console.log(object);
	                        	 var opt = $('<option />');  
	    						 opt.val(object['id']);
	    						 opt.text(object['sections']);
	    						 $('#section1').append(opt); 
	                        }) 
	        		 } 
	        	 }); 
	     });  

	   	
$('#section1').change(function(){    
	var  section1 = $('#section1').val();  
		 $.ajax({
			 type: "GET",
			 url: "<?php echo base_url(); ?>index.php/subject_stud_fetch", 
			 data: 'sections_id='+section1,
	         datatype : "json",
			 success: function(classD)  
			 {   
					console.log(classD);
				 var obj = $.parseJSON(classD);
				 var opt = $('<option />');  
				 opt.val('');
				 opt.text('');
				 $('#subject1').append(opt);  
	                $.each(obj, function (index, object) { 
	                   	console.log(object);

	                	var strArray = object['subject'].split(","); 

	                    var opt =  '<option></option>';
	                    for(var i = 0; i < strArray.length; i++){  
	                     
	                    	opt +='<option value="'+strArray[i]+'">'+strArray[i]+'</option> ';  
	                           
	                    }
	                    $('#subject1').html(opt);
	               }) 
			 } 
		 }); 
	});
	
	
$('#class2').change(function(){  
	         $("#section2 > option").remove();  
	         var class1 = $('#class2').val();  
	        	 $.ajax({
	        		 type: "GET",
	        		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
	        		 data: 'class_sel='+class1,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD);
	        			 var opt = $('<option />');  
						 opt.val('');
						 opt.text('');
						 $('#section2').append(opt); 
	                        $.each(obj, function (index, object) { 
	                        	console.log(object);
	                        	 var opt = $('<option />');  
	    						 opt.val(object['id']);
	    						 opt.text(object['sections']);
	    						 $('#section2').append(opt); 
	                        }) 
	        		 } 
	        	 }); 
	     });  

	   	
$('#section2').change(function(){    
	var  section1 = $('#section2').val();  
		 $.ajax({
			 type: "GET",
			 url: "<?php echo base_url(); ?>index.php/subject_stud_fetch", 
			 data: 'sections_id='+section1,
	         datatype : "json",
			 success: function(classD)  
			 {   
					console.log(classD);
				 var obj = $.parseJSON(classD);
				 var opt = $('<option />');  
				 opt.val('');
				 opt.text('');
				 $('#subject2').append(opt);  
	                $.each(obj, function (index, object) { 
	                   	console.log(object);

	                	var strArray = object['subject'].split(","); 
	                  

	                    var opt =  '<option></option>';
	                    for(var i = 0; i < strArray.length; i++){  
	                     
	                    	opt +='<option value="'+strArray[i]+'">'+strArray[i]+'</option> ';  
	                           
	                    }
	                    $('#subject2').html(opt);
	               }) 
			 } 
		 }); 
	});


});
</script> 
<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  62%;">Add Subject Allocation</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/subject_allocation');?> 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">School:</label>
				<div class="col-sm-8">
					<select name="school" id="school_sel" class="form-control">
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
				</div>
			</div> --> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8"> 
					<select  name="class"  id="class1" class="form-control">
						<option></option>
				 		<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8"> 
					<select  name="sections" required id="section1" class="form-control">
						<!--- <option></option>
							<?php  foreach ($sections_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->sections  ;?></option> 
						<?php } ?> --->
					</select>
				</div>
			</div> 
			
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				  <div class="col-sm-8"> 
					<select  name="subject" required id="subject1" class="form-control">
						<!--- <option></option>
				 		<?php  foreach ($subject_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->subject  ;?></option> 
					<?php } ?>  --->
					</select>
				</div> 
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teachers:</label>
				<div class="col-sm-8"> 
					<select  name="teacher" required  class="form-control">
					<option></option>
				 		<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
	
	</div>		
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_subject_allocation" value="Save">
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit Subject Allocation</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/subject_allocation');?> 
         <section class="card"> 
				<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
						<input type="hidden" id="id" name="id" class="form-control">
				<!-- <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">School:</label>
				<div class="col-sm-8">
				
					<select name="school" id="school" class="form-control">
					<?php  foreach ($school_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->school_name;?></option> 
					<?php } ?> 
				</select>  
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select  name="class" id="class2" class="form-control" disabled >
						<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8">
					<select  name="section" id="section2" required class="form-control" disabled > 
					</select>
				</div>
			</div>
	      <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				  
			<div class="col-sm-8"> 
					<select  name="subject" id="subject2" required  class="form-control" disabled > 
				 	<!--	<?php  foreach ($subject_show as $row) { ?>
						<option value="<?php echo $row->subject;?>"><?php echo $row->subject  ;?></option> 
					<?php } ?>  --->
					</select>
				</div>  	

	    </div>
	    
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teachers:</label>
				<div class="col-sm-8"> 
					<select  name="teacher" id="teacher2" required class="form-control"> 
				 		<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
			</div>
				<footer class="card-footer text-right">
					<input class="btn btn-primary" type="submit"  name="edit_subject_allocation" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete Subject Allocation</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
					
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/subject_allocation');?> 
         <section class="card">
									 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="section_name" name="Subject Allocation" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_subject_allocation" value="Delete">
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