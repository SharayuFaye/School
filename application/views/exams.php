<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Exams</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Exams &nbsp;</span></li> 
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
		
				<h2 class="card-title">Exams</h2>
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
							<th>Date</th>
							<th>Time</th> 
							<th>Subject</th> 
							<th>Class</th> 
							<th>Section</th> 
							<th>Type</th> 
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						
					<?php $i=1; foreach ($exams_show as $row) { ?>
    					<tr data-item-id="1">
    						<td><?php echo $i;?></td> 
    						<td><?php echo $row->date;?></td> 
    						<td><?php echo $row->time;?></td> 
    						<td><?php echo $row->subject;?></td> 
    						<td><?php echo $row->class;?></td> 
    						<td><?php echo $row->sections;?></td> 
    						<td><?php echo $row->type;?></td>  
							<td class="actions">
								<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
								<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->date;?>','<?php echo $row->time;?>','<?php echo $row->subject;?>','<?php echo $row->class_id;?>','<?php echo $row->sections;?>','<?php echo $row->sections_id;?>','<?php echo $row->exam_type_id;?>')"></i></a>
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
	        
   	 buttons : [
        {
       	 extend: 'excel',
            title: 'Exams',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            }
        },
        {
       	 extend: 'print',
            title: 'Exams',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Exams',
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            } 
         }
    	]
   } );

} );

var d = document.getElementById("exams");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 

 $(document).ready(function(){  

	 $('#add_new').attr("disabled", true);
	 $('#save').attr("disabled", false);
	  
	 $('#add_new').click(function(){  
	 	$('#add_new').attr("disabled", true);
	 	$('#save').attr("disabled", false);  
        $('#dt').val('');  
        $('#et').val(''); 
        $('#t').val(''); 
        $('#subject1').val(''); 
        
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
         url: "<?php echo base_url(); ?>index.php/exams_add",
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
	 				 $('#section1').append(opt)
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
	     
    	 $('#section1').change(function(){  
    	 	$("#subject1 > option").remove();  
    	 	var sel_section = $('#section1').val();  
    	 		 $.ajax({
    	 			 type: "GET",
    	 			 url: "<?php echo base_url(); ?>index.php/subject_fetch", 
    	 			 data: 'sel_section='+sel_section,
    	 	         datatype : "json",
    	 			 success: function(classD)  
    	 			 {   
    	 				 var obj = $.parseJSON(classD);
    	 				 var opt = $('<option />');  
    	 				 opt.val('');
    	 				 opt.text('');
    	 				 $('#subject1').append(opt); 
    	 	                $.each(obj, function (index, object) { 
    	 	                   	console.log(object);

    	 	                	var strArray = object['subject'].split(","); 
    	 	                 
    	 	                    for(var i = 0; i < strArray.length; i++){  
    	     	               		 var opt = $('<option />');  
    	     	    				 opt.val(strArray[i]);
    	     	    				 opt.text(strArray[i]);
    	     	    				 $('#subject1').append(opt); 
    	 	                    }
    	 	               }) 
    	 			 } 
    	 		 }); 
    	 	});
    	 $('#section2').change(function(){  
     	 	$("#subject2 > option").remove();  
     	 	var sel_section = $('#section2').val();  
     	 		 $.ajax({
     	 			 type: "GET",
     	 			 url: "<?php echo base_url(); ?>index.php/subject_fetch", 
     	 			 data: 'sel_section='+sel_section,
     	 	         datatype : "json",
     	 			 success: function(classD)  
     	 			 {   
     	 				 var obj = $.parseJSON(classD);
     	 				 var opt = $('<option />');  
     	 				 opt.val('');
     	 				 opt.text('');
     	 				 $('#subject2').append(opt); 
     	 	                $.each(obj, function (index, object) { 
     	 	                   	console.log(object);

     	 	                	var strArray = object['subject'].split(","); 
     	 	                 
     	 	                    for(var i = 0; i < strArray.length; i++){  
     	     	               		 var opt = $('<option />');  
     	     	    				 opt.val(strArray[i]);
     	     	    				 opt.text(strArray[i]);
     	     	    				 $('#subject2').append(opt); 
     	 	                    }
     	 	               }) 
     	 			 } 
     	 		 }); 
     	 	});
   
 });  
</script>
<script type="text/javascript"> 
function edit($id,$date,$time,$subject,$class,$sections,$sections_id,$type){  
	$('#id').val($id);      
	$('#date').val($date);
	$('#time').val($time);   
    var opt = $('<option />');  
	 opt.val($subject);
	 opt.text($subject);
	 $('#subject2').append(opt); 
    $('#class2').val($class);
    var opt = $('<option />');  
    
	 opt.val($sections_id);
	 opt.text($sections);
	 $('#section2').append(opt); 
	  
    $('#type').val($type);
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}



$(document).ready(function() {
    $('#save2').click(function(){    
    	 $('#class2').attr('disabled',false);
    	 $('#subject2').attr('disabled',false);
    	 $('#section2').attr('disabled',false);
    	 $('#type').attr('disabled',false);
    });
});


</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  82%;">Add Exam</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card"> 
	
	<form id="comment1" method="post" enctype="multipart/form-data" >
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
		
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="class1"  class="form-control">
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
					<select name="section" id="section1" class="form-control"> 
					</select>
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> Subject:</label>
				<div class="col-sm-8">
			 <select name="subject" id="subject1" class="form-control"> 
					</select>
				</div>
			</div>
	      
			 <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Type:</label>
				<div class="col-sm-8">
					<select name="exam_type" id="et" class="form-control">
					<option></option>
						<?php  foreach ($exam_type_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->type;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Date:</label>
				<div class="col-sm-8">
					<input type="date" min="<?php echo date('Y-m-d');?>" name="date" id="dt" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Time:</label>
				<div class="col-sm-8">
					<input type="Time" name="time" id="t"  class="form-control">
				</div>
			</div>
			
	    </div>
		<footer class="card-footer text-right"> 
    		<span style="margin-left:10px;color:green;" id="success_m"></span>
    		<span style="margin-left:10px;color:red" id="error_m"></span>
			<input class="btn btn-primary" type="button" id="add_new"  value="Add new">
			<input class="btn btn-primary" type="submit"  name="save_exams" id="save" value="Save"> 
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit Exam</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		 <section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/exams');?> 
	 <input type="hidden" id="id" name="id" class="form-control">
	 
		    <div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="class2"  class="form-control" disabled> 
						<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8">
					<select name="section" id="section2" class="form-control" disabled>  
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> <span class="req" >*</span>Subject:</label>
				<div class="col-sm-8">
					 <select name="subject" id="subject2" class="form-control" disabled> 
					</select> 
				</div>
			</div>
	      
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Type:</label>
				<div class="col-sm-8">
					<select name="exam_type" id="type"  class="form-control" disabled>
					<option></option>
						<?php  foreach ($exam_type_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->type;?></option> 
						<?php } ?> 
					</select>
				</div>
			</div>
					<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Date:</label>
				<div class="col-sm-8">
					<input type="date" id="date" min="<?php echo date('Y-m-d');?>" name="date" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Time:</label>
				<div class="col-sm-8">
					<input type="Time"  id="time" name="time"  class="form-control">
				</div>
			</div>

	    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit" id="save2" name="edit_exams" value="Update">
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
          <h3 class="modal-title" style="margin-right: 80%;">Delete Exam</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/exams');?>  
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="exam_name" name="exam" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_exams" value="Delete">
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