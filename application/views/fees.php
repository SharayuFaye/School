<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Fees</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Fees &nbsp;</span></li> 
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
	
			<h2 class="card-title">Fees</h2>
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
							
							
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/fees');?>  
	 <div class="row">
				<div class="col-sm-4">
					<div class="mb-3">
						<button id="addToTable" type="button" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="col-sm-3" style="float: left">
					<div class="mb-3">
						<select  name="class" id="class_sel" class="form-control"> 
							<option value="0">Select Class</option>
    							<?php foreach ($class_show as $row) { ?>
    							<option <?php if($class == $row->id){  echo "selected" ; }?> value="<?php echo $row->id;?>">
    								<?php echo $row->class;?>
    							</option> 
    						<?php  }?> 
						</select>
					</div>
				</div>
				<div class="col-sm-3" style="float: left">	
					<div class="mb-3" >
						<select  name="section" id="sections_sel" class="form-control"> 
							<option value="0">Select Section</option> 
    							<?php  foreach ($sections_distinct as $row) { ?>
    							<option ><?php echo $row->sections;?></option> 
    						<?php } ?> 
						</select>
					</div>
				</div>
				<div class="col-sm-2" style="float: left">	
					<div class="mb-2" >
						<input class="btn btn-primary" type="submit"  name="Search" value="Search"> 
						<input class="btn btn-primary" type="submit"  name="Clear All" value="Clear All"> 
					</div>
				</div>
			</div>
			
<?php echo form_close(); ?> 

			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Roll No.</th>
						<th>Class</th>
						<th>Sections</th>
						<th>Student Name</th> 
						<th>Annual Fees</th>  
						<th>Fees Paid</th>
						<th>Due Date</th>
						<th>Type Of Payment</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody> 
					<?php $i=1; foreach ($fees_show as $row) { ?>
					<tr data-item-id="1">
						<td><?php echo $i;?></td> 
						<td><?php echo $row->roll_number;?></td> 
						<td><?php echo $row->class;?></td> 
						<td><?php echo $row->sections;?></td> 
						<td><?php echo $row->student_name;?></td> 
						<td><?php echo $row->annual_fees;?></td> 
						<td><?php echo $row->fees_paid;?></td> 
						<td><?php echo $row->date;?></td> 
						<td><?php echo $row->type_payment;?></td>  
				        <td class="actions"> 
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->roll_number;?>','<?php echo $row->students_id;?>','<?php echo $row->class_id;?>','<?php echo $row->sections;?>','<?php echo $row->sections_id;?>','<?php echo $row->student_name;?>','<?php echo $row->annual_fees;?>',<?php echo $row->fees_paid;?>,'<?php echo $row->date;?>','<?php echo $row->type_payment;?>')"></i></a>
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
             title: 'Fees',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8]
	            }
         },
         {
        	 extend: 'print',
             title: 'Fees',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8]
	            }
         },
         { 
             	extend: 'pdf', 
                title: 'Fees',
	           exportOptions: {
	                columns: [1,2,3,4,5,6,7,8]
	            } 
          }
     	]
    } );

} );

var d = document.getElementById("fees");
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
    $('#af').val(''); 
    $('#roll_no1').val(''); 
    $('#student_name1').val(''); 
    $('#fp').val(''); 
    $('#tp').val(''); 
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
            url: "<?php echo base_url(); ?>index.php/fees_add",
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

$('#af').change(function(){   
    document.getElementById("save").disabled = false;
    var fp = $('#fp').val(); 
    var af = $('#af').val();     
    if(parseFloat(fp) > parseFloat(af)){
        document.getElementById("save").disabled = true;
    	$('#err_m').html("Fees paid can't be greater than Annual Fees!"); 
    } else{
    	$('#err_m').html("");
        document.getElementById("save").disabled = false;
    }
    
});  
$('#fp').change(function(){   
    document.getElementById("save").disabled = false;
    var fp = $('#fp').val(); 
    var af = $('#af').val();     
    if(parseFloat(fp) > parseFloat(af)){
        document.getElementById("save").disabled = true;
    	$('#err_m').html("Fees paid can't be greater than Annual Fees!"); 
    } else{
    	$('#err_m').html("");
        document.getElementById("save").disabled = false;
    }
    
});  


$('#fees_paid').change(function(){   
    document.getElementById("save2").disabled = false;
    var fp = $('#fees_paid').val(); 
    var af = $('#annual_fees').val();     
    if(parseFloat(fp) > parseFloat(af)){
        document.getElementById("save2").disabled = true;
    	$('#err_mE').html("Fees paid can't be greater than Annual Fees!"); 
    } else{
        document.getElementById("save2").disabled = false;
    	$('#err_mE').html("");
    }
    
});  

$('#annual_fees').change(function(){   
    document.getElementById("save2").disabled = false;
    var fp = $('#fees_paid').val(); 
    var af = $('#annual_fees').val();     
    if(parseFloat(fp) > parseFloat(af)){
        document.getElementById("save2").disabled = true;
    	$('#err_mE').html("Fees paid can't be greater than Annual Fees!"); 
    } else{
        document.getElementById("save2").disabled = false;
    	$('#err_mE').html("");
    }
    
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
    				 $('#af').val(obj[0].annual_fees);  
        		 } 
        	 }); 
     }); 


     $('#roll_no2').change(function(){  
         $("#student_name2 > option").remove();  
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
    				 $('#af').val(obj[0].annual_fees);  
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
     
     
 });  
</script>

<script type="text/javascript">

function edit($id,$roll_no,$stud_id,$class,$section,$section_id,$student_name,$annual_fees,$fees_paid,$date,$type_payment){  
	$('#id').val($id);      
 
    var opt = $('<option />');  
	 opt.val($stud_id);
	 opt.text($roll_no);
	 $('#roll_no2').html(opt); 
	 
// 	$('#roll_no2').val($roll_no2);
	$('#class2').val($class);
  
    var opt = $('<option />');  
	 opt.val($section_id);
	 opt.text($section);
	 $('#section2').html(opt); 
	   
	$('#student_name2').val($student_name); 
	$('#annual_fees').val($annual_fees);  
	$('#fees_paid').val($fees_paid); 
	$('#date').val($date);
	$('#type_payment').val($type_payment); 
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
              <h3 class="modal-title" style="margin-right:  73%;">Add Fees Details</h3>
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
				</div>
			</div>
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Annual Fees :</label>
				<div class="col-sm-8">
					<input type="number"  min="0" id="af" name="annual_fees" class="form-control" required>
				</div>
			</div>
			
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Fees Paid:</label>
				<div class="col-sm-8"><span id="err_m" style="color:red"></span>
					<input type="number" required min="0" id="fp" name="fees_paid" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Due Date:</label>
				<div class="col-sm-8">
					<input type="date" id="dt" name="date"  max="<?php echo date('Y-m-d');?>" class="form-control"  required>
				</div>
			</div>
	         <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Type of payment:</label>
				<div class="col-sm-8">
					<input type="text" id="tp" name="type_payment"  maxlength="100" class="form-control"  required>
				</div>
			</div>
	        
	    </div>
		<footer class="card-footer text-right"> 
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span>
			<input class="btn btn-primary" type="button" id="add_new"  value="Add new">
			<input class="btn btn-primary" type="button"  name="save_fees" id="save" value="Save">  
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
		</footer>
	</section> 
</form>
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
          <h3 class="modal-title" style="margin-right:  73%;">Edit Fees Details</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		<section class="card"> 
		 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/fees');?>  
	 <input type="hidden" name="id" id="id">
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
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Roll No:</label>
				<div class="col-sm-8"> 
					<select name="roll_no" id="roll_no2"  class="form-control" required> 
					</select> 
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Name:</label>
				<div class="col-sm-8">
					<input type="text" readonly name="student_name" id="student_name2" class="form-control" required>
				</div>
			</div>
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Annual Fees :</label>
				<div class="col-sm-8">
					<input type="number" min="0" name="annual_fees" id="annual_fees" class="form-control" required>
				</div>
			</div>
			
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Fees Paid:</label>
				<div class="col-sm-8"><span id="err_mE" style="color:red"></span>
					<input type="number" required min="0" name="fees_paid" id="fees_paid" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Due Date:</label>
				<div class="col-sm-8">
					<input type="date" name="date" id="date"  max="<?php echo date('Y-m-d');?>" class="form-control" required>
				</div>
			</div>
	         <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Type of payment:</label>
				<div class="col-sm-8">
					<input type="text" name="type_payment" id="type_payment" maxlength="100" class="form-control" required>
				</div>
			</div>
	       
		
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="edit_fees" id="save2" value="Update">
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
          <h3 class="modal-title" style="margin-right: 80%;">Delete Fees</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card"> 
		 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/fees');?>  	 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="fees_name" name="fees" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_fees" value="Delete">
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