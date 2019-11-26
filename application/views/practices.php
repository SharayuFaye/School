<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Practice</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Practice &nbsp;</span></li> 
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
		
				<h2 class="card-title">Practice</h2>
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
							<th>Section</th> 
							<th>Subject</th> 
<!-- 							<th>Date</th> -->
							<th>Image</th> 
							<th>Actions</th>
						</tr>
					</thead>
					<tbody> 
	<?php $i=1; foreach ($practices_show as $row) { ?>
    					<tr data-item-id="<?php echo $i;?>">
    						<td><?php echo $i;?></td>  
    						<td><?php echo $row->class;?></td>  
    						<td><?php echo $row->sections;?></td>  
    						<td><?php echo $row->subject;?></td> 
    						<!-- -<td><?php echo $row->date;?></td> -->  
							<td> <?php echo $row->image;?> </td> 
							<td class="actions"> 
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->date;?>','<?php echo $row->subject;?>','<?php echo $row->class_id;?>','<?php echo $row->sections;?>','<?php echo $row->sections_id;?>','<?php echo $row->image;?>')"></i></a>
								
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
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
            title: 'Practices',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            }
        },
        {
       	 extend: 'print',
            title: 'Practices',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Practices',
	           exportOptions: {
	                columns: [1,2,3,4,5]
	            } 
         }
    	]
	   } );

} );
var d = document.getElementById("practices");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 
 
function edit($id,$date,$subject,$class,$sections,$sections_id,$image){  
	$('#id').val($id);   
	$('#date').val($date); 
    $('#subject').val($subject);
    $('#classE').val($class);  
    var opt = $('<option />');  
	 opt.val($sections_id);
	 opt.text($sections);
	 $('#section').append(opt); 
	   
    var opt = $('<option />');  
	 opt.val($subject);
	 opt.text($subject);
	 $('#subject').append(opt); 
	 
	 $('#image').html($image); 
	//document.getElementById("image").src = '<?php echo base_url(); ?>practices/'+$image;
	$('#editrow').modal('show'); 
}
function add(){
    $('#success_m').html('');$('#error_m').html('');
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}

$(document).ready(function(){
	
$('#add_new').attr("disabled", true);
$('#save').attr("disabled", false);
 
$('#add_new').click(function(){  
	$('#add_new').attr("disabled", true);
	$('#save').attr("disabled", false);  
 	$('#dt').val(''); 
    $('#img').val(''); 
    $('#sel_sub').val(''); 
    $('#error_m').html('');
	 $('#success_m').html('');
});
    
$('#save').click(function(e){   
	
    e.preventDefault();   
	var imageSelecter = document.getElementById("img"),
	file = imageSelecter.files[0];
	console.log("file : ", file);
    // Get form
    var form = $('#comment1')[0];

	// Create an FormData object 
    var data = new FormData(form);
    data.append("image", file);
    console.log("data : ", data); 
    $.ajax({
        type:'POST',
        url: "<?php echo base_url(); ?>index.php/practices_add",
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
	    
$('#classE').change(function(){  
$("#section > option").remove();  
var sel_class = $('#classE').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
		 data: 'class_sel='+sel_class,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var opt = $('<option />');  
			 opt.val('');
			 opt.text('');
			 $('#section').append(opt); 
                $.each(obj, function (index, object) {  
               		 var opt = $('<option />');  
    				 opt.val(object['id']);
    				 opt.text(object['sections']);
    				 $('#section').append(opt); 
               }) 
		 } 
	 }); 
});

$('#section').change(function(){  
	$("#subject > option").remove();  
	var sel_section = $('#section').val();  
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

$('#sel_class').change(function(){  
$("#sel_section > option").remove();  
var sel_class = $('#sel_class').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
		 data: 'class_sel='+sel_class,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var opt = $('<option />');  
			 opt.val('');
			 opt.text('');
			 $('#sel_section').append(opt); 
                $.each(obj, function (index, object) {  
               		 var opt = $('<option />');  
    				 opt.val(object['id']);
    				 opt.text(object['sections']);
    				 $('#sel_section').append(opt); 
               }) 
		 } 
	 }); 
});

$('#sel_section').change(function(){  
	$("#sel_sub > option").remove();  
	var sel_section = $('#sel_section').val();  
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

});

</script>
 

<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right:  78%;">Add Practices</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card"> 
	<form id="comment1" method="post" enctype="multipart/form-data" >
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">   
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="sel_class" class="form-control" required >
						<option></option>
						<?php foreach ($class_show as $row) { ?>
							<option value="<?php echo $row->id;?>"> <?php echo $row->class;?> </option> 
						<?php  }?> 
					</select>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Sections:</label>
				<div class="col-sm-8">
					<select name="section" id="sel_section" class="form-control" required > 
					</select>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> <span class="req" >*</span>Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="sel_sub" class="form-control" required > 
					</select>
				</div>
			</div>
<!-- 			<div class="form-group row"> -->
<!-- 				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Date:</label> -->
<!-- 				<div class="col-sm-8"> -->
					<input type="hidden" id="dt"  value="<?php echo date('Y-m-d');?>"  name="date" class="form-control" required >
<!-- 				</div> -->
<!-- 			</div>  -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Image:</label>
				<div class="col-sm-8">
					<input type="file" name="image" id="img" required   accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .txt,.csv,.pdf"  class="form-control">  
				</div>
			</div> 	
	    </div>
		<footer class="card-footer text-right"> 
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span>
			<input class="btn btn-primary" type="button" id="add_new"  value="Add new">
			<input class="btn btn-primary" type="button" id="save"  name="save_practices" value="Save"> 
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
          <h3 class="modal-title" style="margin-right:  78%;">Edit Practices</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
 <section class="card"> 
	<?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/practices');?>  
	 <input type="hidden" name="id" id="id"  class="form-control">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">   
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="classE" class="form-control" required > 
						<?php foreach ($class_show as $row) { ?>
							<option value="<?php echo $row->id;?>"> <?php echo $row->class;?> </option> 
						<?php  }?> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Sections:</label>
				<div class="col-sm-8">
					<select name="section" id="section" class="form-control" required > 
					 </select>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> Subject:</label>
				<div class="col-sm-8">
					<select name="subject" id="subject" class="form-control" required > 
					 
					</select>
				</div>
			</div>
	      
<!-- 			<div class="form-group row"> -->
<!-- 				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Date:</label> -->
<!-- 				<div class="col-sm-8"> -->
					<input type="hidden" name="date" value="<?php echo date('Y-m-d');?>"  id="date" class="form-control" required >
<!-- 				</div> -->
<!-- 			</div>  -->
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Image:</label>
				<div class="col-sm-8">
					<input type="file" name="image"   accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .txt,.csv,.pdf"  class="form-control">  
					<label    id="image"   ></label>
				</div>
			</div> 	
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="edit_practices" value="Update">
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
          <h3 class="modal-title" style="margin-right: 75%;">Delete Practices</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/practices');?>  
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="practice_name" name="practice" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_practices" value="Delete">
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