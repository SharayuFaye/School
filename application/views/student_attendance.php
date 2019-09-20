<?php include('include/header.php');?>
<section role="main" class="content-body">
<header class="page-header">
	<h2>Student Attendance</h2>

	<div class="right-wrapper text-right">
		<ol class="breadcrumbs">
			<li>
				<a href="dashboard">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Forms</span></li>
				<li><a href="attendances.php"><span>Attendance</span></a></li>
				<li><a href="class_attendance.php"><span>Class Attendance</span></a></li>
			<li><span>Student Attendance &nbsp;</span></li> 
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
	
			<h2 class="card-title">Student Attendance : Arya Raut</h2>
		</header>
		<div class="card-body">
			<div class="row">
				<!-- <div class="col-sm-4">
					<div class="mb-3">
						<button id="addToTable" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
					</div>
				</div> -->
				<div class="col-sm-8">
					<div class="mb-3">
						<div class="col-sm-4"  style="float: left;">
						 	<input type="date"  class="form-control " name="start_date">
						</div>
						 <div class="col-sm-4"  style="float: left;">
						 	<input type="date"  class="form-control " name="end_date">
						</div>
						<div class="col-sm-2"  style="float: left;">
						 	<button id="addToTable" onclick="add()" class="btn btn-primary">Search <i class="fa fa-search"></i></button>
						</div>
						
					</div>
				</div>
			</div>
			<?php
				$date = '2019-06-01';
				$end = '2019-06-' . date('t', strtotime($date)); //get end date of month
				?>
			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
				<thead>
					<tr>
						<th>Sr No</th> 
						<th>Month</th> 
						 <?php for($i=1;$i<=31;$i++){ 
						        echo "<th> $i</th>";
						    }
						    ?>
						<!-- <th>Actions</th> -->
					</tr>
				</thead>
				 <tbody>
					<tr data-item-id="1">
						<td>1</td>
						<td>March</td>
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td>P</td> 
						<td>A</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>A</td> 
						<td>A</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td>  
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
					</tr>

					<tr data-item-id="1">
						<td>2</td>
						<td>April</td>
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td></td>  
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
					</tr>
					<tr data-item-id="1">
						<td>3</td>
						<td>May</td>
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td> </td> 
						<td>A</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td>A</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td>  
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
					</tr>

					<tr data-item-id="1">
						<td>4</td>
						<td>June</td>
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>A</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td>P</td> 
						<td> </td> 
						<td>P</td> 
						<td>P</td> 
						<td></td>  
						<!-- <td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(1,'5th','06/06/2019','75%','C Section','Arya Raut')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(1)"></i></a>
						</td> -->
					</tr>
					
					<!-- <tr data-item-id="2">
						<td>2</td>
						<td>8th</td>
						<td>07/06/2019</td> 
						<td>80%</td>
						<td>A Section</td> 
						<td>Sakhi Roy</td> 
						<td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(2,'8th','07/06/2019','80%','A Section','Sakhi Roy')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(2)"></i></a>
						</td>
					</tr>

					<tr data-item-id="3">
						<td>3</td>
						<td>3rd</td>
						<td>08/06/2019</td> 
						<td>95%</td>
						<td>B Section</td> 
						<td>Pooja Rathod</td>
						<td class="actions">
							<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
							<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
							<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit(3,'3rd','08/06/2019','95%','B Section','Pooja Rathod')"></i></a>
							<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(3)"></i></a>
						</td>
					</tr> -->

				</tbody>  
			</table>
			<div class="col-sm-4">
					<div class="mb-3">
						<a href="class_attendance.php"><button id="addToTable"  class="btn btn-primary"> <i class="fa fa-arrow-left "></i> Back</button></a>
					</div>
				</div>
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

function edit($id,$class,$date,$Student Attendance,$section,$student_name){ 

	$('#id').val($id); 
	$('#class').val($class);
	$('#date').val($date);
	$('#Student Attendance').val($Student Attendance);  
    $('#section').val($section);
    $('#student_name').val($student_name);
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
          <h3 class="modal-title" style="margin-right:  76%;">Add Student Attendance</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select name="class"  class="form-control">
						<option>5th</option>
						<option>8th</option>
						<option>3rd</option>
						<option>4th</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" name="date" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Student Attendance:</label>
				<div class="col-sm-8">
					<input type="text" name="Student Attendance" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select name="section" class="form-control">
						<option>A Section</option>
						<option>B Section</option>
						<option>C Section</option>
						<option>D Section</option>
					</select>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Name:</label>
				<div class="col-sm-8">
					<select name="student_name" class="form-control">
						<option>Arya Raut</option>
						<option>Sakhi Roy</option>
						<option>Pooja Rathod</option>
					</select>	
				</div>
			</div>

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_Student Attendance" value="Save">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</footer>
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
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
				<div class="col-sm-8">
					<select name="class" id="class" class="form-control">
						<option>5th</option>
						<option>8th</option>
						<option>3rd</option>
						<option>4th</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="text" id="date" name="date" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Student Attendance:</label>
				<div class="col-sm-8">
					<input type="text" id="Student Attendance" name="Student Attendance" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Section:</label>
				<div class="col-sm-8">
					<select name="section" id="section" class="form-control">
						<option>A Section</option>
						<option>B Section</option>
						<option>C Section</option>
						<option>D Section</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Student Name:</label>
				<div class="col-sm-8">
					<select name="student_name" id="student_name" class="form-control">
						<option>Arya Raut</option>
						<option>Sakhi Roy</option>
						<option>Pooja Rathod</option>
				    </select>		
				</div>
			</div>
	        

	    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="edit_notification" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</footer>
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
          <h3 class="modal-title" style="margin-right: 73%;">Delete Student Attendance</h3>
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
					<input type="hidden" id="Student Attendance_name" name="Student Attendance" class="form-control">
                </div>
			 </div>
			</div>
	    </div>
		<footer class="card-footer text-right">
			<input class="btn btn-primary" type="submit"  name="del_Student Attendance" value="Delete">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		</footer>
	</section> 
</div>
						
</div>                                          
</div>
</div>                                          
</div>                                        
</div>								