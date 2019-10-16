<?php include('include/header.php');?>
<section role="main" class="content-body">
<header class="page-header">
	<h2>Attendance</h2>

	<div class="right-wrapper text-right">
		<ol class="breadcrumbs">
			<li>
				<a href="dashboard">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Forms</span></li>
			<li><span>Attendance &nbsp;</span></li> 
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
	
			<h2 class="card-title">Attendance</h2>
		</header>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-3">
						<!-- <button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button> -->
					</div>
				</div>
			</div>
			
 <?php $this->load->helper('form');?>
 <?php echo form_open_multipart('Welcome/attendances');?>  
 		<div class="row"> 
			<div class="col-sm-4" style="float: left"></div>
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
						<?php  foreach ($sections_show  as $row) {    ?>
							<?php if($section == $row->id){ ?>
        						<option   selected value="<?php echo $row->id;?>" >
        							<?php echo $row->sections;?> 
         						</option> 
     					<?php  } }   ?> 
					</select>
				</div>
			</div>
			<div class="col-sm-2" style="float: left">	
				<div class="mb-2" >
					<input type="date"  <?php if(isset($date)){ ?>value="<?php echo $date; ?>" <?php  }?>  name="date" id="date" class="form-control"  required > 
				</div>
			</div>
			<div class="col-sm-2" style="float: left">	
				<div class="mb-2" >
					<input class="btn btn-primary" type="submit"  name="Search" value="Show"> 
					<input class="btn btn-primary" id="clear" type="submit"  name="Clear All" value="Clear All"> 
				</div>
			</div>
		</div> 
<?php echo form_close(); ?> 
			
			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
				<thead>
					<tr> 
						<th>Class</th>
						<th>Section</th>
						<th>Student Name </th> 
						<th>Attendance</th> 
						<th>Date</th> 
						<th>Teacher </th>
					<!-- <th>Actions</th> -->
					</tr>
				</thead>
				<tbody>
					<?php if(isset($attendances_show)){ $i=1; foreach ($attendances_show as $row) { ?>
					<tr data-item-id="<?php echo $i;?>"> 
						<td><?php echo $row->class;?></td> 
						<td><?php echo $row->sections;?></td> 
						<td><a href="<?php echo base_url(); ?>index.php/student_attendance?student_id=<?php echo $row->stud_id;?>&date=<?php  echo $date;?>"><?php echo $row->student_name;?></a></td>
						<td><?php echo ucfirst($row->attendance);?></td>
						<td><?php echo date_format(date_create($row->date),"Y-m-d"); ?></td> 
						<td><?php echo $row->teacher_name;?></td> 
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
					</tr>
					<?php $i++;} } ?> 
					 
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
            title: 'Attendances',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3,4,5]
	            }
        },
        {
       	 extend: 'print',
            title: 'Attendances',
	           footer: true,
	           exportOptions: {
	                columns: [0,1,2,3,4,5]
	            }
        },
        { 
            	extend: 'pdf', 
               title: 'Attendances',
	           exportOptions: {
	                columns: [0,1,2,3,4,5]
	            } 
         }
    	]
	   } );

} );

var d = document.getElementById("attendances");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 


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
 