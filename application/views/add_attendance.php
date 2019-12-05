<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Add Attendance</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Add Attendance &nbsp;</span></li> 
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
		
				<h2 class="card-title">Add Attendance</h2>
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
 <?php echo form_open_multipart('Welcome/add_attendance');?>  
 		<div class="row">
			<div class="col-sm-2">
				<div class="mb-3">
					 
				</div>
			</div>
			<div class="col-sm-2" style="float: left">
				<div class="mb-2">
					<select  name="class" id="classE" class="form-control" required > 
						<option value="0">Select Class</option>
							<?php foreach ($class_show as $row) { ?>
							<option <?php if($class == $row->id){  echo "selected" ; }?> value="<?php echo $row->id;?>">
								<?php echo $row->class;?>
							</option> 
						<?php  }?> 
					</select>
				</div>
			</div> 
			 
			<div class="col-sm-2" style="float: left">	
				<div class="mb-2" >
					<select  name="section" id="section" class="form-control"  required > 
						<option value="0">Select Section</option> 
						<?php  foreach ($sections_show  as $row) {  if($class == $row->class_id){  ?>
							<?php if($section1 == $row->id){ ?>
        						<option   selected value="<?php echo $row->id;?>" >
        							<?php echo $row->sections;?> 
         						</option> 
     						 <?php  } }     } ?> 
					</select>
				</div>
			</div>
			<div class="col-sm-2" style="float: left">	
				<div class="mb-2" >
					 <input  class="form-control"  required  type="date" id="date" name="date" value="<?php if(isset($date)){ echo $date ; } else { echo date('Y-m-d'); }?>" max="<?php echo date("Y-m-d");?>"/>
				</div>
			</div>
			<div class="col-sm-4" style="float: left">	
				<div class="mb-4" >
					<input class="btn btn-primary" type="submit"  name="Search" value="Show"> 
					<input class="btn btn-primary" id="clear" type="submit"  name="Clear All" value="Clear All">
					<input class="btn btn-primary" id="Save" type="submit"  name="Save" value="Save All">
					
					 
					 
				</div>
			</div>
		</div>    
 <?php if( isset($add_attendance_show)){  ?> 
		  	
				<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
					<thead>
						<tr>
							<th>Roll No</th>
							<th>Student Name</th> 
							<th>Present / Absent</th>
						</tr>
					</thead>
 					<tbody>    
					<?php  foreach($add_attendance_show as $attendance){ ?>
 					<tr >  
						<th><?php echo $attendance->roll_number;?></th>   
						<th><?php echo ucfirst($attendance->student_name);?></th>   
						<th> 
						<?php if(isset($attendance->attendance) ){   ?>  
								<span id="status" style="display:none"><?php echo ucfirst($attendance->attendance);?></span>
						<?php } ?>
							<input  class="form-control"  type="checkbox" name="attendance[]" <?php if(isset($attendance->attendance) && $attendance->attendance == 'present'){ echo 'checked' ;} ?> value="<?php echo $attendance->id;?>" >
						</th>    
     				</tr> 	    
					<?php }?>  
     				</tbody>	
				</table>
				

				<?php } else { echo $msg; }?>
			</div>
		</section>
	<!-- end: page -->
</section>

<?php echo form_close(); ?>  
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
            title: 'Student Attendance',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2]
	            }
        },
        {
       	 extend: 'print',
            title: 'Student Attendance',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Student Attendance',
	           exportOptions: {
	                columns: [0,1,2]
	            } 
         }
    	]
	   } );

} );
 

var d = document.getElementById("add_attendance");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 

 
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}


$(document).ready(function(){
 
    $('#classE').change(function(){  
    $("#section > option").remove();  
    var sel_class = $('#classE').val();  
    	 $.ajax({
    		 type: "GET",
    		 url: "<?php echo base_url(); ?>index.php/timetable_sections_fetch", 
    		 data: 'class_sel='+sel_class,
             datatype : "json",
    		 success: function(classD)  
    		 {   
    			 var obj = $.parseJSON(classD); 
                    $.each(obj, function (index, object) {  
                   		 var opt = $('<option />');  
        				 opt.val(object['id']);
        				 opt.text(object['sections']);
        				 $('#section').append(opt); 
                   }) 
    		 } 
    	 }); 
    });
     

});



</script>
 

<!-- del row -->
<div class="modal fade" id="delrow" role="dialog"  >
<div class="modal-dialog">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/add_attendance');?>  
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right: 75%;">Delete Add Attendance</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="Add Attendance_name" name="Add Attendance" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_add_attendance" value="Delete">
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