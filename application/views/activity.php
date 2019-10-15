<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Activity</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Activity &nbsp;</span></li> 
			</ol> 
		</div>
	</header>

	<!-- start: page -->

	<!-- start: page -->
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
		
				<h2 class="card-title">Activity</h2>
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
							<th>Activity</th>
							<th>Details</th>
							<th>Date</th>
							<th>Submission Date</th> 
							<th>Class</th>
							<th>Section</th>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php $i=1; foreach ($activity_show as $row) { ?>
						<tr data-item-id="<?php echo $i;?>"> 
							<td><?php echo $i;?></td> 
							<td><?php echo $row->activity;?></td> 
							<td><?php echo $row->details;?></td> 
							<td><?php echo $row->date;?></td> 
							<td><?php echo $row->submission_date;?></td> 
							<td><?php echo $row->class;?></td>  
							<td><?php echo $row->sections;?></td>  
							<td class="actions"> 
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->activity;?>','<?php echo $row->details;?>','<?php echo $row->date;?>','<?php echo $row->submission_date;?>','<?php echo $row->sections;?>','<?php echo $row->sections_id;?>','<?php echo $row->class_id;?>')"></i></a>
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
<script src="<?php echo base_url(); ?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script><?php echo base_url(); ?>
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
            title: 'Activity',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            }
        },
        {
       	 extend: 'print',
            title: 'Activity',
	           footer: true,
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Activity',
	           exportOptions: {
	                columns: [1,2,3,4,5,6]
	            } 
         }
    	]
	   } );

} );


var d = document.getElementById("activity");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 


function edit($id,$activity,$details,$date,$submission_date,$section,$sections_id,$class){  
	$('#id').val($id);      
	$('#activitys').val($activity);
	$('#details').val($details); 
	$('#date').val($date); 
	$('#submission_date').val($submission_date);

	var opt = $('<option />');  
	 opt.val($sections_id);
	 opt.text($section);
	 $('#section').append(opt); 
	 
// 	$('#section').val($section);
	$('#class').val($class);
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
 
	 	
	 $('#add_new').attr("disabled", true);
	 $('#save').attr("disabled", false);
	  
	 $('#add_new').click(function(){  
	 	$('#add_new').attr("disabled", true);
	 	$('#save').attr("disabled", false);  
	  	$('#dt').val(''); 
	    $('#sdt').val(''); 
		$('#dtl').val(''); 
		$('#act').val('');
	     $('#sel_sub').val(''); 
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
	         url: "<?php echo base_url(); ?>index.php/activity_add",
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

	    
 $('#class_sel').change(function(){  
 $("#sections_sel > option").remove();  
 var class_sel = $('#class_sel').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/timetable_sections_fetch", 
		 data: 'class_sel='+class_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
                $.each(obj, function (index, object) { 
                	console.log(object);
                    	 var opt = $('<option />');  
						 opt.val(object['id']);
						 opt.text(object['sections']);
						 $('#sections_sel').append(opt); 
                }) 
		 } 
	 }); 
 });
  
 $('#class').change(function(){  
 $("#sections > option").remove();  
 var class1 = $('#class').val();  
 console.log(class1);
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/timetable_sections_fetch", 
		 data: 'class_sel='+class1,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
                $.each(obj, function (index, object) { 
                	console.log(object);
                    	 var opt = $('<option />');  
						 opt.val(object['id']);
						 opt.text(object['sections']);
						 $('#sections').append(opt); 
                }) 
		 } 
	 }); 
 }); 


 $('#sdt').change(function(){   
     document.getElementById("save").disabled = false;
     var dt =new Date($('#dt').val()); 
     var sdt =new Date($('#sdt').val());    

     console.log(dt);

     console.log(sdt);
     
     if(dt > sdt){ 
         document.getElementById("save").disabled = true;
     	$('#err_m').html("Submission date can't be greater than date!"); 
     } else{
     	$('#err_m').html("");
         document.getElementById("save").disabled = false;
     }
     
 });  

 $('#submission_date').change(function(){   
     document.getElementById("save2").disabled = false;
     var dt =new Date($('#date').val()); 
     var sdt =new Date($('#submission_date').val());
         
     if(dt > sdt){ 
         document.getElementById("save2").disabled = true;
     	$('#err_mE').html("Submission date can't be greater than date!"); 
     } else{
     	$('#err_mE').html("");
         document.getElementById("save2").disabled = false;
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
          <h3 class="modal-title" style="margin-right:  80%;">Add Activity </h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	<form id="comment1" method="post" enctype="multipart/form-data" >
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
		
	       <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select  name="class" id="class_sel" class="form-control">
							<option></option>
							<?php  foreach ($class_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
						<?php } ?> 
						</select>
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select  name="section" id="sections_sel" class="form-control"> 
					 </select>
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Activity:</label>
				<div class="col-sm-8">
					<input type="text" id="act"  name="activity" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Details:</label>
				<div class="col-sm-8">
					<input type="text" id="dtl" name="details" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" id="dt" max="<?php echo date('Y-m-d');?>"  name="date" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Submission Date:</label>
				<div class="col-sm-8"><span id="err_m" style="color:red"></span>
					<input type="date" id="sdt" name="submission_date" class="form-control">
				</div>
			</div>

		</div>
		<footer class="card-footer text-right"> 
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span>
			<input class="btn btn-primary" type="button" id="add_new"  value="Add new">
			<input class="btn btn-primary" type="button" id="save"  name="save_activity" value="Save"> 
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
          <h3 class="modal-title" style="margin-right:  80%;">Edit Activity</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
								<section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/activity');?> 
	 <input type="hidden" id="id" name="id" class="form-control">
	 <div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									 
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select  name="class" id="class" class="form-control">
						<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select  name="section" id="section" class="form-control">
						 
					</select>
				</div>
			</div>			
			 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Activity:</label>
				<div class="col-sm-8">
					<input type="text" id="activitys" name="activity" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Details:</label>
				<div class="col-sm-8">
					<input type="text" id="details" name="details" class="form-control">
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date"  max="<?php echo date('Y-m-d');?>" id="date" name="date" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Submission Date:</label>
				<div class="col-sm-8"><span id="err_mE" style="color:red"></span>
					<input type="date" id="submission_date" name="submission_date" class="form-control">
				</div>
			</div>
				
		</div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit" id="save2" name="edit_activity" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete Activity</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
									 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/activity');?> 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									   <div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="activity_name" name="activity" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_activity" value="Delete">
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