<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Marks</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Marks &nbsp;</span></li> 
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
		
				<h2 class="card-title">Marks</h2>
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
							<th>Teacher Details</th>
							<th>Student Name</th> 
							<th>Date</th> 
							<th>Exam Type</th> 
							<th>Marks</th> 
							<th>Out Of</th>
							<th>Subject</th>
							<th>Competence</th>
							<th>Percentage</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody> 
	<?php $i=1; foreach ($marks_show as $row) { ?>
    					<tr data-item-id="<?php echo $i;?>">
    						<td><?php echo $i;?></td> 
    						<td><?php echo $row->teacher_name;?></td> 
    						<td><?php echo $row->student_name;?></td> 
    						<td><?php echo $row->date;?></td> 
    						<td><?php echo $row->type;?></td> 
    						<td><?php echo $row->marks;?></td> 
    						<td><?php echo $row->out_of;?></td> 
    						<td><?php echo $row->subject;?></td> 
    						<td><?php echo $row->competence;?></td> 
    						<td><?php echo $row->percentage;?></td> 
					        <td class="actions">
								<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
								<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->teacher_id;?>','<?php echo $row->students_id;?>','<?php echo $row->date;?>','<?php echo $row->exam_type_id;?>','<?php echo $row->marks;?>','<?php echo $row->out_of;?>','<?php echo $row->subject;?>','<?php echo $row->competence;?>','<?php echo $row->percentage;?>')"></i></a>
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
var d = document.getElementById("marks");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 


function edit($id,$teacher,$student_name,$date,$exam_type,$marks,$outof,$subject,$competence,$per){  
	$('#id').val($id);      
	$('#teacher').val($teacher);
	$('#student').val($student_name); 
	$('#date').val($date); 
	$('#exam_type').val($exam_type); 
	$('#mark').val($marks);
	$('#outof').val($outof);

    var opt = $('<option />');  
	 opt.val($subject);
	 opt.text($subject);
	 $('#subject').append(opt); 
	 
	$('#competence').val($competence);
	$('#percentage').val($per);
	
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
$('#student_id').change(function(){  
	$("#sel_sub > option").remove();  
	var student_id = $('#student_id').val();  
		 $.ajax({
			 type: "GET",
			 url: "<?php echo base_url(); ?>index.php/subject_stud_fetch", 
			 data: 'student_id='+student_id,
	         datatype : "json",
			 success: function(classD)  
			 {   
					console.log(classD);
				 var obj = $.parseJSON(classD);
				 var opt = $('<option />');  
				 opt.val('');
				 opt.text('');
				 $('#sel_sub').append(opt);  
	                $.each(obj, function (index, object) { 
	                   	console.log(object);

	                	var strArray = object['subject'].split(","); 
	                 
	                    for(var i = 0; i < strArray.length; i++){  
    	               		 var opt = $('<option />');  
    	    				 opt.val(strArray[i]);
    	    				 opt.text(strArray[i]);
    	    				 $('#sel_sub').append(opt); 
	                    }
	               }) 
			 } 
		 }); 
	});


$('#student').change(function(){  
	$("#subject > option").remove();  
	var student_id = $('#student').val();  
		 $.ajax({
			 type: "GET",
			 url: "<?php echo base_url(); ?>index.php/subject_stud_fetch", 
			 data: 'student_id='+student_id,
	         datatype : "json",
			 success: function(classD)  
			 {   
					console.log(classD);
				 var obj = $.parseJSON(classD);
				 var opt = $('<option />');  
				 opt.val('');
				 opt.text('');
				 $('#subject').append(opt);  
	                $.each(obj, function (index, object) { 
	                   	console.log(object);

	                	var strArray = object['subject'].split(","); 
	                 
	                    for(var i = 0; i < strArray.length; i++){  
    	               		 var opt = $('<option />');  
    	    				 opt.val(strArray[i]);
    	    				 opt.text(strArray[i]);
    	    				 $('#subject').append(opt); 
	                    }
	               }) 
			 } 
		 }); 
	});


$('#of').change(function(){   
	
    document.getElementById("save").disabled = false;
    var m1 = $('#m').val(); 	
    var of1 = $('#of').val();   
    if(parseFloat(m1) > parseFloat(of1)){console.log(m1);
        document.getElementById("save").disabled = true;
    	$('#err_m').html("Marks can't be greater than Out Of!"); 
    } else{
        document.getElementById("save").disabled = false;
    	$('#err_m').html("");
    }
    
});  

$('#m').change(function(){   
	
    document.getElementById("save").disabled = false;
    var m1 = $('#m').val(); 	
    var of1 = $('#of').val();

    var per = (parseFloat(m1)/parseFloat(of1))*100;
	console.log(per);
	$('#per').val(per);   
	    
    if(parseFloat(m1) > parseFloat(of1)){console.log(m1);
        document.getElementById("save").disabled = true;
    	$('#err_m').html("Marks can't be greater than Out Of!"); 
    } else{
        document.getElementById("save").disabled = false;
    	$('#err_m').html("");
    } 
});  

$('#outof').change(function(){   
    document.getElementById("save2").disabled = false;
    var m2 = $('#mark').val(); 
    var of2 = $('#outof').val();    
    if( parseFloat(m2)  >  parseFloat(of2) ){
        console.log(of2); 
        document.getElementById("save2").disabled = true;
    	$('#err_mE').html("Marks can't be greater than Out Of!"); 
    } else{
        document.getElementById("save2").disabled = false;
    	$('#err_mE').html("");
    }
    
});  

$('#mark').change(function(){   
    document.getElementById("save2").disabled = false;
    var m = $('#mark').val(); 
    var of = $('#outof').val();   
    
    var per = (parseFloat(m)/parseFloat(of))*100;
	console.log(per);
	$('#percentage').val(per); 
	  
    if(parseFloat(m) > parseFloat(of)){
        document.getElementById("save2").disabled = true;
    	$('#err_mE').html("Marks can't be greater than Out Of!"); 
    } else{
        document.getElementById("save2").disabled = false;
    	$('#err_mE').html("");
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
          <h3 class="modal-title" style="margin-right:  80%;">Add Marks </h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/marks');?>   
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Teacher Details:</label>
				<div class="col-sm-8">
					<select name="teacher_id" class="form-control" required >
						<option></option>
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Name:</label>
				<div class="col-sm-8">
					<select name="students_id"id="student_id" class="form-control" required >
						<option></option>
						<?php  foreach ($students_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->student_name;?></option> 
						<?php } ?>       
					</select>	
				</div>
			</div> 
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="sel_sub" class="form-control" required > 
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Exam Type:</label>
				<div class="col-sm-8">
					<select name="exam_type" class="form-control" required >
						<option></option>
						<?php  foreach ($exam_type_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->type;?></option> 
						<?php } ?>       
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" name="date" max="<?php echo date('Y-m-d');?>"  class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Out Of:</label>
				<div class="col-sm-8"><span id="err_m" style="color:red"></span>
					<input type="number" name="out_of" id="of" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Marks:</label>
				<div class="col-sm-8">
					<input type="number" name="marks" id="m" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Competence:</label>
				<div class="col-sm-8">
					<input type="text" name="competence" class="form-control">
				</div>
			</div>
 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Percentage:</label>
				<div class="col-sm-8">
					<input type="text" name="percentage" readonly id="per" class="form-control">
				</div>
			</div>
			
		</div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_marks" id="save" value="Save">
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
          <h3 class="modal-title" style="margin-right:  80%;">Edit Marks</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
			 <section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/marks');?>  
	 <input type="hidden" name="id" id="id" class="form-control">
	 
		 <div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Teacher Details:</label>
				<div class="col-sm-8">
					<select name="teacher_id" id="teacher" class="form-control" required >
						<option></option>
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Name:</label>
				<div class="col-sm-8">
					<select name="students_id" id="student" class="form-control" required >
						<option></option>
						<?php  foreach ($students_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->student_name;?></option> 
						<?php } ?>       
					</select>	
				</div>
			</div> 
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="subject" class="form-control" required > 
					 
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Exam Type:</label>
				<div class="col-sm-8">
					<select name="exam_type" id="exam_type" class="form-control" required > 
						<?php  foreach ($exam_type_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->type;?></option> 
						<?php } ?>       
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" name="date"  max="<?php echo date('Y-m-d');?>" id="date" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Out Of:</label>
				<div class="col-sm-8"><span id="err_mE" style="color:red"></span>
					<input type="number" name="out_of" id="outof" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Marks:</label>
				<div class="col-sm-8">
					<input type="number" name="marks" id="mark" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Competence:</label>
				<div class="col-sm-8">
					<input type="text" name="competence" id="competence" class="form-control">
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Percentage:</label>
				<div class="col-sm-8">
					<input type="text" name="percentage" readonly id="percentage" class="form-control">
				</div>
			</div>
			
		</div>
		<footer class="card-footer text-right">
			<input class="btn btn-primary" type="submit"  name="edit_marks" id="save2" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete Marks</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/marks');?>   
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="marks_name" name="marks" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_marks" value="Delete">
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