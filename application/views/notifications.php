<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Notifications</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Notifications &nbsp;</span></li> 
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
		
				<h2 class="card-title">Notifications</h2>
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
							<th>Roles Name</th> 
							<th>Class</th> 
							<th>Section</th> 
							<th>Student</th> 
							<th>Title</th> 
							<th>Message</th> 
							<th>Date  </th> 
							<th class="sorting_disabled" >Actions</th>
						</tr>
					</thead>
					<tbody>  
						
					<?php $i=1; foreach ($notifications_show as $row) { ?>
					<tr data-item-id="1">
						<td><?php echo $i;?></td> 
						<td><?php echo ucfirst($row->roles_id);?></td> 
						<td><?php echo $row->class;?></td> 
						<td><?php echo $row->sections;?></td> 
						<td><?php echo $row->student_name;?></td> 
						<td><?php echo $row->title;?></td> 
						<td><?php echo $row->message;?></td> 
						<td><?php echo $row->datetime;?></td>  
					        <td class="actions"> 
								<a href="#" class="on-default edit-row"><i class="fa fa-upload" onclick="edit('<?php echo $row->id;?>','<?php echo $row->roles_id;?>','<?php echo $row->class_id;?>','<?php echo $row->sections_id;?>','<?php echo $row->sections;?>','<?php echo $row->students_id;?>','<?php echo $row->student_name;?>','<?php echo $row->title;?>','<?php echo $row->message;?>','<?php echo $row->datetime;?>' )"></i></a>
								<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del('<?php echo $row->id;?>')"></i></a>
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
            scrollX : true,
            scrollCollapse : true,
	        
   	 buttons : [
        {
       	 extend: 'excel',
            title: 'Notifications',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7]
	            }
        },
        {
       	 extend: 'print',
            title: 'Notifications',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Notifications',
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7]
	            } 
         }
    	]
	   } );

} );

var d = document.getElementById("notifications");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 


function edit($id,$role,$class_sel_id,$section_sel_id,$section,$student_id,$student_name,$title,$massage,$date_time){ 
	
	$('#id').val($id); 
	$('#role2').val($role.toLowerCase());     
	$('#class_sel_edit').val($class_sel_id);


	$('#sections_sel_edit').val($section_sel_id); 
	 var opt = $('<option />');  
	 opt.val($section_sel_id);
	 opt.text($section);
	 $('#sections_sel_edit').append(opt); 


		
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
		 data: 'class_sel='+$class_sel_id,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD); 
             $.each(obj, function (index, object) {  
            	 var opt = $('<option />');  
				 opt.val(object['id']);
				 opt.text(object['sections']);
				 $('#sections_sel_edit').append(opt); 
             }) 
		 } 
	 }); 
	  

 
		 var opt = $('<option />');  
		 opt.val($student_id);
		 opt.text($student_name);
		 $('#studentsE').append(opt); 

 
	$('#title').val($title);  
	$('#message').val($massage);  
    $('#datetime').val($date_time);

    if($('#role2').val() == 'student'){
       	 document.getElementById('class_edit').style.display = 'flex' ; 
       	 document.getElementById('section_edit').style.display = 'flex' ; 
	 }else{
		 document.getElementById('class_edit').style.display = 'none' ; 
   	 	document.getElementById('section_edit').style.display = 'none' ;
 
	}

    if($('#role2').val() == 'student'){
      	 document.getElementById('student_show2').style.display = 'flex' ;  
	 }else{
		 document.getElementById('student_show2').style.display = 'none' ;  

	}
	
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
 <script type="text/javascript"> 
 $(document).ready(function(){
 
 $('#role1').change(function(){   
	 if($('#role1').val() == 'student'){
    	 document.getElementById('class_show').style.display = 'flex' ; 
    	 document.getElementById('section_show').style.display = 'flex' ; 
	 }else{
		 document.getElementById('class_show').style.display = 'none' ; 
    	 document.getElementById('section_show').style.display = 'none' ;
	}


	 if($('#role1').val() == 'student'){
    	 document.getElementById('student_show').style.display = 'flex' ;  
	 }else{
		 document.getElementById('student_show').style.display = 'none' ;  
	}
		
 });

 $('#role2').change(function(){   
	 if($('#role2').val() == 'student'){
    	 document.getElementById('class_edit').style.display = 'flex' ; 
    	 document.getElementById('section_edit').style.display = 'flex' ; 
	 }else{
		 document.getElementById('class_edit').style.display = 'none' ; 
    	 document.getElementById('section_edit').style.display = 'none' ; 
	}

	 if($('#role2').val() == 'student'){
    	 document.getElementById('student_show2').style.display = 'flex' ;  
	 }else{
		 document.getElementById('student_show2').style.display = 'none' ;  
	}
		
 });
	 
 $('#class_sel').change(function(){  
 $("#sections_sel > option").remove();  
 var class_sel = $('#class_sel').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
		 data: 'class_sel='+class_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var opt = $('<option />');  
			 opt.val('');
			 opt.text('');
			 $('#sections_sel').append(opt); 
                $.each(obj, function (index, object) {  
                	 var opt = $('<option />');  
					 opt.val(object['id']);
					 opt.text(object['sections']);
					 $('#sections_sel').append(opt); 
                }) 
		 } 
	 }); 
 }); 

 
 $('#sections_sel').change(function(){  
 $("#student1 > option").remove();  
 var sections_sel = $('#sections_sel').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/students_roll_fetch", 
		 data: 'section_sel='+sections_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var opt = $('<option />');  
			 opt.val('');
			 opt.text('');
			 $('#student1').append(opt); 
			 console.log(obj);
                $.each(obj, function (index, object) {  
                	 var opt = $('<option />');  
					 opt.val(object['id']);
					 opt.text(object['student_name']);
					 $('#student1').append(opt); 
                }) 
		 } 
	 }); 
 }); 

 
 $('#class_sel_edit').change(function(){  
 $("#sections_sel_edit > option").remove();  
 	var class1 = $('#class_sel_edit').val();  
 	console.log(class1);
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
			 $('#sections_sel_edit').append(opt); 
                $.each(obj, function (index, object) { 
                	console.log(object);
                    	 var opt = $('<option />');  
						 opt.val(object['id']);
						 opt.text(object['sections']);
						 $('#sections_sel_edit').append(opt); 
                }) 
		 } 
	 }); 
 });

 $('#sections_sel_edit').change(function(){  
 $("#studentsE > option").remove();  
 var sections_sel = $('#sections_sel_edit').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/students_roll_fetch", 
		 data: 'section_sel='+sections_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var opt = $('<option />');  
			 opt.val('');
			 opt.text('');
			 $('#studentsE').append(opt); 
			 console.log(obj);
                $.each(obj, function (index, object) {  
                	 var opt = $('<option />');  
					 opt.val(object['id']);
					 opt.text(object['student_name']);
					 $('#studentsE').append(opt); 
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
          <h3 class="modal-title" style="margin-right:  76%;">Add Notification</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/notifications');?> 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Role:</label>
				<div class="col-sm-8">
					<select name="role" id="role1" class="form-control" required>
						<option></option>
						<option value="teacher">Teachers</option>
<!-- 						<option value="parent">Parents</option> -->
						<option value="driver">Drivers</option>
<!-- 						<option value="section">Section</option> -->
						<option value="student">Student</option>
					</select>
				</div>
			</div> 
			
			
			
			
			
			<div class="form-group row" id="class_show" style="display: none">
					<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
					<div class="col-sm-8">
						<select  name="class" id="class_sel" class="form-control" >
							<option></option>
							<?php  foreach ($class_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
						<?php } ?> 
						</select>
					</div>
			 </div>
			 <div class="form-group row" id="section_show" style="display: none">
					<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
					<div class="col-sm-8"> 
						<select  name="section" id="sections_sel" class="form-control"> 
						</select>
					</div>
			 </div>
			 
			 
			<div class="form-group row"  id="student_show" style="display: none">
				<label class="col-sm-4 control-label text-sm-right pt-2">Students:</label>
				<div class="col-sm-8">
					<select name="student" id="student1" class="form-control"  > 
							 
					</select>
				</div>
			</div> 
			
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> Title:</label>
				<div class="col-sm-8">
					<input type="text" name="title" class="form-control"  maxlength="100" required> 
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> <span class="req" >*</span>Message:</label>
				<div class="col-sm-8">
					<textarea name="message" class="form-control"  maxlength="200" required></textarea> 
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> Date  :</label>
				<div class="col-sm-8">
					<input type="date" name="datetime"  max="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>"  class="form-control" required>
				</div>
			</div>
			
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_notifications" value="Save">
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
      <h3 class="modal-title" style="margin-right:  76%;">Edit Notification</h3>
    </div>
	<div class="modal-body">         
	       <div class="col-lg-12"> 
		<section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/notifications');?> 
	 <input type="hidden" name="id" id="id"  class="form-control">
	 
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
		
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Role:</label>
				<div class="col-sm-8">
					<select name="role" id="role2" class="form-control" required> 
						<option value="teacher">Teachers</option>
						<option value="parent">Parents</option>
						<option value="driver">Drivers</option>
						<option value="section">Section</option>
						<option value="student">Student</option>
					</select>
				</div>
			</div> 
			<div class="form-group row" id="class_edit" style="display: none">
					<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
					<div class="col-sm-8">
						<select  name="class" id="class_sel_edit" class="form-control"> 
							<?php  foreach ($class_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
						<?php } ?> 
						</select>
					</div>
			 </div>
			 <div class="form-group row" id="section_edit" style="display: none">
					<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
					<div class="col-sm-8"> 
						<select  name="section" id="sections_sel_edit" class="form-control"> 
						 
						</select>
					</div>
			 </div>
			 
			  
			
			<div class="form-group row" id="student_show2" style="display: none">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Students:</label>
				<div class="col-sm-8"> 
					<select name="student" id="studentsE" class="form-control"  > 
							 
					</select>
				</div>
			</div>
			
			
			 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> Title:</label>
				<div class="col-sm-8">
					<input type="text" name="title" id="title" class="form-control"  maxlength="100" required> 
				</div>
			</div>
			
			
			
			 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> <span class="req" >*</span>Message:</label>
				<div class="col-sm-8">
					<textarea name="message" id="message" class="form-control"  maxlength="200"  required></textarea> 
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> <span class="req" >*</span>Date:</label>
				<div class="col-sm-8">
					<input type="date" name="datetime" id="datetime"  max="<?php echo date('Y-m-d');?>"  class="form-control" required>
				</div>
			</div>
			
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="edit_notifications" value="Save">
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
          <h3 class="modal-title" style="margin-right: 73%;">Delete Notification</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/notifications');?> 
									 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="notification_name" name="notification" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_notifications" value="Delete">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</footer>
<?php echo form_close(); ?>  
					</section> 
			</div>
						
</div>                                          
</div>
</div>                                          
</div>                                        
</div>								
