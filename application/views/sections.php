<?php include('include/header.php');?>
<?php include('application/config/subject_list.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Sections</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Sections &nbsp;</span></li> 
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
						
								<h2 class="card-title">Sections</h2>
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
                 <?php echo form_open_multipart('Welcome/sections');?>
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
											<th>Subjects</th> 
											<th>Teachers</th> 
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($sections_show as $row) { ?>
										<tr data-item-id="1"> 
											<!-- <td><?php echo $row->school_name;?></td>  -->
											<td><?php echo $row->class;?></td>  
											<td><?php echo $row->sections;?></td>  
											<td><?php echo $row->subject;?></td> 
											<td><?php echo $row->teacher_name;?></td> 
											<td class="actions"> 
												<a href="#" class="on-default edit-row"><i onclick="edit(<?php echo $row->id;?>,'<?php echo $row->school_id;?>','<?php echo $row->class_id;?>','<?php echo $row->sections;?>','<?php echo $row->subject;?>','<?php echo $row->teachers_id;?>')" class="fa fa-pencil"></i></a>
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
            title: 'Sections',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3]
	            }
        },
        {
       	 extend: 'print',
            title: 'Sections',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Sections',
	           exportOptions: {
	                columns: [0,1,2,3]
	            } 
         }
    	]
   } );

} );


var d = document.getElementById("sections");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 
 
function edit($id,$school,$class,$section,$subject,$teachers){ 
	
	$('.chckbox').attr("checked", false);
	
	$('#id').val($id);      
	$('#school').val($school)
	$('#class1').val($class);;
	$('#section').val($section); 
	var strArray = $subject.split(",");
     
    for(var i = 0; i < strArray.length; i++){
    	$('#'+strArray[i]).attr("checked", true);
    	console.log(strArray[i]);
    }
    
	$('#subject').val($subject); 
	$('#teacher_e').val($teachers); 
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
          <h3 class="modal-title" style="margin-right:  82%;">Add Section</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/sections');?> 
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
					<select  name="class"  id="class_sel" class="form-control">
				 		<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8">
					<input type="text" name="sections" required maxlength="2" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
				</div>
			</div> 
			
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				  
				 <div class="col-sm-8">
				 
				 <?php   foreach($subject_list as $sub){ ?>
					<div class="col-sm-4 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]"  value="<?php echo $sub['name']; ?>"  id="checkboxExample1">
						<label for="checkboxExample1"><?php echo $sub['name']; ?></label>
					</div>
					<?php } ?>
					
					</div>
				</div> 
				
			
	    <!-- - 	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				  
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]"  value="Marathi"  id="checkboxExample1">
						<label for="checkboxExample1">Marathi</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Hindi"   id="checkboxExample1">
						<label for="checkboxExample1">Hindi</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Sanskrit"   id="checkboxExample1">
						<label for="checkboxExample1">Sanskrit</label>
					</div>
					</div>
				</div> 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Maths"  id="checkboxExample1">
						<label for="checkboxExample1">Maths</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Science"  id="checkboxExample1">
						<label for="checkboxExample1">Science</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="History"  id="checkboxExample1">
						<label for="checkboxExample1">History</label>
					</div>
					</div>
			</div> 
			 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Geography"  id="checkboxExample1">
						<label for="checkboxExample1">Geography</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Biology" id="checkboxExample1">
						<label for="checkboxExample1">Biology</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Chemistry"  id="checkboxExample1">
						<label for="checkboxExample1">Chemistry</label>
					</div>
					</div>
				</div> 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Physics"  id="checkboxExample1">
						<label for="checkboxExample1">Physics</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="English" id="checkboxExample1">
						<label for="checkboxExample1">English</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="IT" id="checkboxExample1">
						<label for="checkboxExample1">IT</label>
					</div>
				</div> 
	    </div>
	    
	    	<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="SocialScience"  id="checkboxExample1">
						<label for="checkboxExample1">SocialScience</label>
					</div> 
				</div> 
	    </div>
	    
			--->
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
			<input class="btn btn-primary" type="submit"  name="save_sections" value="Save">
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit Section</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/sections');?> 
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
					<select  name="class" id="class1" class="form-control">
						<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8">
					<input type="text" required id="section"  onkeyup="this.value = this.value.toUpperCase();" maxlength="2" name="sections" class="form-control">
				</div>
			</div>
			
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				  
				 <div class="col-sm-8">
				 
				 <?php   foreach($subject_list as $sub){ ?>
					<div class="col-sm-4 checkbox-custom checkbox-default" style="float:left">
						<input class="chckbox"  type="checkbox"  name="subject[]"  value="<?php echo $sub['name']; ?>"  id="<?php echo $sub['name']; ?>">
						<label for="checkboxExample1"><?php echo $sub['name']; ?></label>
					</div>
					<?php } ?>
					
					</div>
				</div> 
					
	  <!-- -    
				<div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]"  value="Marathi"  id="Marathi">
						<label for="checkboxExample1">Marathi</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Hindi"   id="Hindi">
						<label for="checkboxExample1">Hindi</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Sanskrit"   id="Sanskrit">
						<label for="checkboxExample1">Sanskrit</label>
					</div>
					</div>
				</div> 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Maths"  id="Maths">
						<label for="checkboxExample1">Maths</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Science"  id="Science">
						<label for="checkboxExample1">Science</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="History"  id="History">
						<label for="checkboxExample1">History</label>
					</div>
					</div>
			</div> 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Geography"  id="Geography">
						<label for="checkboxExample1">Geography</label>
					</div>
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Biology" id="Biology">
						<label for="checkboxExample1">Biology</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Chemistry"  id="Chemistry">
						<label for="checkboxExample1">Chemistry</label>
					</div>
					</div>
				</div> 
			<div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="Physics"  id="Physics">
						<label for="checkboxExample1">Physics</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="English" id="English">
						<label for="checkboxExample1">English</label>
					</div>
					<div class="col-sm-2 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="IT" id="IT">
						<label for="checkboxExample1">IT</label>
					</div>
				</div>
			

	    </div>
	    <div class="form-group row">
			<label class="col-sm-4 control-label text-sm-right pt-2"></label>
				 <div class="col-sm-8">
					<div class="col-sm-3 checkbox-custom checkbox-default" style="float:left">
						<input type="checkbox"  name="subject[]" value="SocialScience"  id="SocialScience">
						<label for="checkboxExample1">SocialScience</label>
					</div> 
				</div> 
	    </div>
	    --->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teachers:</label>
				<div class="col-sm-8"> 
					<select  name="teacher" id="teacher_e" required class="form-control"> 
				 		<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
			</div>
				<footer class="card-footer text-right">
					<input class="btn btn-primary" type="submit"  name="edit_sections" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete Section</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
					
		 <?php $this->load->helper('form');?>
         <?php echo form_open_multipart('Welcome/sections');?> 
         <section class="card">
									 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="section_name" name="sections" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_sections" value="Delete">
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