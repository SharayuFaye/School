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
							<th>Class</th> 
							<th>Sections</th> 
							<th>Exam Type</th> 
							<th>Subject</th>
							<th>Teacher Details</th>
							<th>Evaluation Type</th>
							<th>Student Name</th> 
							<th>Present / Absent</th>  
							<th>Marks Obtained / Grade</th> 
							<th>Out Of</th>
							<th>Compe tence</th>
							<th>%</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody> 
	<?php $i=1; foreach ($marks_show as $row) { ?>
    					<tr data-item-id="<?php echo $i;?>">
    						<td><?php echo $i;?></td> 
    						<td><?php echo $row->class_id;?></td> 
    						<td><?php echo $row->sections;?></td> 
    						<td><?php echo $row->type;?></td> 
    						<td><?php echo $row->subject;?></td> 
    						<td><?php echo $row->teacher_name;?></td> 
    						<td><?php echo $row->evaluation_type;?></td>  
    						<td><?php echo $row->student_name;?></td>  
    						<td><?php echo $row->pa;?></td>  
    						<td><?php echo $row->marks;?></td> 
    						<td><?php echo $row->out_of;?></td> 
    						<td><?php echo $row->competence;?></td> 
    						<td><?php echo $row->percentage;?></td> 
					        <td class="actions">
								<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
								<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>',
								'<?php echo $row->class_id;?>',
                                '<?php echo $row->sections;?>',
        						'<?php echo $row->sections_id;?>',
        						'<?php echo $row->type;?>',
        						'<?php echo $row->exam_type_id;?>',
        						'<?php echo $row->subject;?>',
        						'<?php echo $row->teacher_name;?>',
                                '<?php echo $row->teacher_id;?>',
        						'<?php echo $row->evaluation_type;?>', 
                                '<?php echo $row->roll_number;?>',
                                '<?php echo $row->student_name;?>', 
        						'<?php echo $row->students_id;?>', 
        						'<?php echo $row->pa;?>', 
        						'<?php echo $row->marks;?>',
        						'<?php echo $row->out_of;?>',
        						'<?php echo $row->competence;?>',
        						'<?php echo $row->percentage;?>')"></i></a>
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

<!-- Examples -->
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
            title: 'Marks',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8,9,10,11,12]
	            }
        },
        {
       	 extend: 'print',
            title: 'Marks',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8,9,10,11,12]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Marks',
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8,9,10,11,12]
	            } 
         }
    	]
   } );





	 $('#add_new').attr("disabled", true);
	 $('#save').attr("disabled", false);
	  
	 $('#add_new').click(function(){  
	 	$('#add_new').attr("disabled", true);
	 	$('#save').attr("disabled", false);  
	    $('#per').val(''); 
	    $('#m').val(''); 
	    $('#roll_no1').val(''); 
	    $('#student_name1').val('');  
	    $('#cm').val('');  
	    $('#err_m').html("");
	     $('#error_m').html('');
	 	 $('#success_m').html('');
	 });

	 $('#save').click(function(e){  

	 	$('#add_new').attr("disabled", false);
	 	$('#save').attr("disabled", true);
	 	
	     e.preventDefault();    
	         var form = $('#comment1')[0]; 
	 		// Create an FormData object 
	         var data = new FormData(form); 
	         console.log("data : ", data); 
	         $.ajax({
	             type:'POST',
	             url: "<?php echo base_url(); ?>index.php/marks_add",
	             data:data,
	             cache:false,
	             contentType: false,
	             processData: false,
	             success:function(data){
	                 console.log("succe42342ss");
	                 console.log(data); 
	                 if(data == 1){ 
	               		$('#success_m').html('Record inserted successfully');
	               	    $('#error_m').html('');
	               		$('#add_new').attr("disabled", false);
	               		$('#save').attr("disabled", true);
	                 }
	                 else{ 
	                     $('#error_m').html('Error in insertion   !');
	                	 	$('#success_m').html('');
	                     $('#add_new').attr("disabled", true);
	                     $('#save').attr("disabled", false);
	                 }
	         } 
	    }); 

	 });

	 
} );


var d = document.getElementById("marks");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 





function edit($id,$class_id,$sections, $sections_id, $type,$exam_type_id,$subject, $teacher_name,$teacher_id, $evaluation_type, $roll_no,  $student_name,$students_id, $pa, $marks, $out_of, $competence, $percentage){  
	$('#id').val($id);      
	$('#class2').val($class_id);
	//$('#section2').val($sections_id);

    var opt = $('<option />');  
	 opt.val($sections_id);
	 opt.text($sections);
	 $('#section2').append(opt); 
	 
	$('#teacher').val($teacher_id);
	$('#student_name2').val($student_name); 
	$('#students_id2').val($students_id);  
	$('#exam_type').val($exam_type_id); 
	$('#mark').val($marks);
	$('#subject').val($subject);
	$('#evaluation_type2').val($evaluation_type);
	$('#pa2').val($pa);
	$('#outof').val($out_of);

    var opt = $('<option />');  
	 opt.val($subject);
	 opt.text($subject);
	 $('#subject').append(opt); 
	 
	 var opt = $('<option />');  
	 opt.val($students_id);
	 opt.text($roll_no);
	 $('#roll_no2').append(opt); 
	 
	$('#competence').val($competence);
	$('#percentage').val($percentage);
	
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
	         $("#roll_no1 > option").remove();  
	         var section1 = $('#section1').val();   
	        	 $.ajax({
	        		 type: "GET",
	        		 url: "<?php echo base_url(); ?>index.php/students_roll_fetch", 
	        		 data: 'section_sel='+section1,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD);
	        			 var opt = $('<option />');  
						 opt.val('');
						 opt.text('');
						 $('#roll_no1').append(opt); 
	                        $.each(obj, function (index, object) { 
	                        	console.log(object['roll_number']);
	                        	 var opt = $('<option />');  
	    						 opt.val(object['id']);
	    						 opt.text(object['roll_number']);
	    						 $('#roll_no1').append(opt); 
	                        }) 
	        		 } 
	        	 }); 
	     });  

	     $('#roll_no1').change(function(){  
	         $("#student_name1 > option").remove();  
	         var roll_no1 = $('#roll_no1').val();  
	         var class1 = $('#class1').val();  
	         var section1 = $('#section1').val(); 
	        	 $.ajax({
	        		 type: "POST",
	        		 url: "<?php echo base_url(); ?>index.php/students_sel_fetch", 
	        		 data: { "roll_no": roll_no1, "class1": class1, "sections": section1 } ,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD); 
	        			 console.log(obj); 
	    				 $('#student_name1').val(obj[0].student_name);  
	    				 $('#students_id').val(obj[0].id);  
	        		 } 
	        	 }); 
	     }); 

	     $('#roll_no2').change(function(){   
	         var roll_no1 = $('#roll_no2').val();  
	         var class1 = $('#class2').val();  
	         var section1 = $('#section2').val(); 
	        	 $.ajax({
	        		 type: "POST",
	        		 url: "<?php echo base_url(); ?>index.php/students_sel_fetch", 
	        		 data: { "roll_no": roll_no1, "class1": class1, "sections": section1 } ,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD); 
	        			 console.log(obj); 
	    				 $('#student_name2').val(obj[0].student_name);  
	    				 $('#students_id2').val(obj[0].id);   
	        		 } 
	        	 }); 
	     }); 
	     

	     $('#class2').change(function(){  
	         $("#section2 > option").remove();  
	         var class2 = $('#class2').val();  
	        	 $.ajax({
	        		 type: "GET",
	        		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
	        		 data: 'class_sel='+class2,
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
	         $("#roll_no2 > option").remove();  
	         var section1 = $('#section2').val();   
	        	 $.ajax({
	        		 type: "GET",
	        		 url: "<?php echo base_url(); ?>index.php/students_roll_fetch", 
	        		 data: 'section_sel='+section1,
	                 datatype : "json",
	        		 success: function(classD)  
	        		 {   
	        			 var obj = $.parseJSON(classD);
	        			 var opt = $('<option />');  
						 opt.val('');
						 opt.text('');
						 $('#roll_no2').append(opt); 
	                        $.each(obj, function (index, object) { 
	                        	console.log(object['roll_number']);
	                        	 var opt = $('<option />');  
	    						 opt.val(object['id']);
	    						 opt.text(object['roll_number']);
	    						 $('#roll_no2').append(opt); 
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


$('#section2').change(function(){   
	var  section2 = $('#section2').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/subject_stud_fetch", 
		 data: 'sections_id='+section2,
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
    var evaluation_type2 = $('#evaluation_type').val();  
    if(evaluation_type2 == 'Score'){  
        if(parseFloat(m1) > parseFloat(of1)){console.log(m1);
            document.getElementById("save").disabled = true;
        	$('#err_m').html("Marks can't be greater than Total Marks!"); 
        } else{
            document.getElementById("save").disabled = false;
        	$('#err_m').html("");
        }
    }
});  

$('#m').change(function(){   
	
    document.getElementById("save").disabled = false;
    var m1 = $('#m').val(); 	
    var of1 = $('#of').val();

    var evaluation_type2 = $('#evaluation_type').val();  
    if(evaluation_type2 == 'Score'){  
        var per = (parseFloat(m1)/parseFloat(of1))*100;
    	console.log(per);
    	$('#per').val(per.toFixed(2));   
    	    
        if(parseFloat(m1) > parseFloat(of1)){console.log(m1);
            document.getElementById("save").disabled = true;
        	$('#err_m').html("Marks can't be greater than Total Marks!"); 
        } else{
            document.getElementById("save").disabled = false;
        	$('#err_m').html("");
        } 
    }    
});  

$('#outof').change(function(){   
    document.getElementById("save2").disabled = false;
    var m2 = $('#mark').val(); 
    var of2 = $('#outof').val();  
    var evaluation_type2 = $('#evaluation_type2').val();  
    if(evaluation_type2 == 'Score'){  
        if( parseFloat(m2)  >  parseFloat(of2) ){
            console.log(of2); 
            document.getElementById("save2").disabled = true;
        	$('#err_mE').html("Marks can't be greater than Total Marks!"); 
        } else{
            document.getElementById("save2").disabled = false;
        	$('#err_mE').html("");
        }
    }
});  

$('#mark').change(function(){   
    document.getElementById("save2").disabled = false;
    var m = $('#mark').val(); 
    var of = $('#outof').val();   
    var evaluation_type2 = $('#evaluation_type2').val();  
    if(evaluation_type2 == 'Score'){
        var per = (parseFloat(m)/parseFloat(of))*100;
    	console.log(per);
    	$('#percentage').val(per.toFixed(2)); 
    	  
        if(parseFloat(m) > parseFloat(of)){
            document.getElementById("save2").disabled = true;
        	$('#err_mE').html("Marks can't be greater than Total Marks!"); 
        } else{
            document.getElementById("save2").disabled = false;
        	$('#err_mE').html("");
        }
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
	
	<form id="comment1" method="post" enctype="multipart/form-data" > 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select   name="class" id="class1"  class="form-control" required>
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
					<select   name="section" id="section1" class="form-control" required> 
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Exam Type:</label>
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
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="sel_sub" class="form-control" required > 
					</select>
				</div>
			</div>
			
			
			<?php if($this->session->userdata['role']=='teacher' ){ ?>
					<select style="display:none" name="teacher_id" class="form-control" required > 
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
			<?php }else { ?>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Details:</label>
				<div class="col-sm-8">
					<select name="teacher_id" class="form-control" required >
						<option></option>
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Evaluation Type:</label>
				<div class="col-sm-8">
					<select name="evaluation_type" id="evaluation_type" class="form-control" required >
						<option>Grade</option> 
						<option>Score</option> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Total Marks:</label>
				<div class="col-sm-8"><span id="err_m" style="color:red"></span>
					<input type="number" name="out_of" min="0" id="of" class="form-control"   >
				</div>
			</div>
			
			
		
		    <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Roll No:</label>
				<div class="col-sm-8"> 
					<select   name="roll_no" id="roll_no1"  class="form-control" required>
					<option></option>
						<!------ <?php  foreach ($students_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->roll_number;?></option> 
						<?php } ?> ----->
					</select>
					
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Name:</label>
				<div class="col-sm-8">
					<input type="text" readonly name="student_name" id="student_name1" class="form-control" required>
					<input type="hidden"   name="students_id" id="students_id" class="form-control" required>
				</div>
			</div>
<!-- 	    	<div class="form-group row"> -->
<!-- 				<label class="col-sm-4 control-label text-sm-right pt-2">Student Name:</label> -->
<!-- 				<div class="col-sm-8"> -->
<!-- 					<select name="students_id"id="student_id" class="form-control" required > -->
<!-- 						<option></option>  
						<?php  foreach ($students_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->student_name;?></option> 
						<?php } ?>       
<!-- 					</select>	 -->
<!-- 				</div> -->
<!-- 			</div>  -->

			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Present/Absent:</label>
				<div class="col-sm-8">
					<select name="pa" id="pa" class="form-control" required >
						<option>Present</option> 
						<option>Absent</option> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Marks Obtained/Grade:</label>
				<div class="col-sm-8">
					<input type="text" name="marks" id="m" class="form-control" required >
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Competence:</label>
				<div class="col-sm-8">
					<input type="text" name="competence" id="cm" class="form-control">
				</div>
			</div>
 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Percentage:</label>
				<div class="col-sm-8">
					<input type="text" name="percentage" readonly id="per" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				 
				<div class="col-sm-8">
					<input type="hidden" name="date" max="<?php echo date('Y-m-d');?>"  class="form-control" required >
				</div>
			</div>
			
		</div>
		<footer class="card-footer text-right"> 
		
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span>
			<input class="btn btn-primary" type="button" id="add_new"  value="Add new">
			<input class="btn btn-primary" type="button"  name="save_marks" id="save" value="Save">  
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
			
<!-- 			<input class="btn btn-primary" type="submit"  name="save_marks" id="save" value="Save"> -->
<!-- 			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		</footer>
</form>
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
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="class2"  class="form-control"  required>
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
					<select name="section" id="section2" class="form-control" required> 
						 
					</select>
				</div>
			</div>
			  <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Exam Type:</label>
				<div class="col-sm-8">
					<select name="exam_type" id="exam_type" class="form-control" required > 
						<?php  foreach ($exam_type_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->type;?></option> 
						<?php } ?>       
					</select>
				</div>
			</div> 
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="subject" class="form-control" required > 
					 
					</select>
				</div>
			</div>
			 
			
			<?php if($this->session->userdata['role']=='teacher' ){ ?>
					<select style="display:none" name="teacher_id" id="teacher"  class="form-control" required > 
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
			<?php }else { ?>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Teacher Details:</label>
				<div class="col-sm-8">
					<select name="teacher_id" id="teacher"  class="form-control" required >
						<option></option>
						<?php  foreach ($teachers_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->teacher_name;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			<?php } ?>
			
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Evaluation Type:</label>
				<div class="col-sm-8">
					<select name="evaluation_type" id="evaluation_type2" class="form-control" required >
						<option>Grade</option> 
						<option>Score</option> 
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Total Marks:</label>
				<div class="col-sm-8"><span id="err_mE" style="color:red"></span>
					<input type="number" name="out_of" min="0" id="outof" class="form-control"   >
				</div>
			</div>
			
			
			 <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Roll No:</label>
				<div class="col-sm-8"> 
					<select name="roll_no" id="roll_no2"  class="form-control" required> 
					</select> 
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Name:</label>
				<div class="col-sm-8">
				<input type="hidden"   name="students_id" id="students_id2" class="form-control" required>
					<input type="text" readonly name="student_name" id="student_name2" class="form-control" required>
				</div>
			</div>
	       
					<input type="hidden" name="date"  value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>" id="date" class="form-control" required >
				 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Present/Absent:</label>
				<div class="col-sm-8">
					<select name="pa" id="pa2" class="form-control" required >
						<option>Present</option> 
						<option>Absent</option> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Marks Obtained/Grade:</label>
			 
				<div class="col-sm-8">
					<input type="text" name="marks" id="mark" class="form-control" required >
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