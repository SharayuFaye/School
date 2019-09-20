<?php include('include/header.php');?>	
<section role="main" class="content-body">
	<header class="page-header">
		<h2>FAQS</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>FAQS &nbsp;</span></li> 
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
		
				<h2 class="card-title">FAQS</h2>
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
				<table class="table table-bordered table-striped mb-0" id="datatable-editable">
					<thead>
						<tr>
							<th>Sr No</th> 
							<th>Questions</th>
							<th>Answers</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
        			<?php $i=1; foreach ($faq_show as $row) { ?>
        				<tr data-item-id="<?php echo $i;?>"> 
        					<td><?php echo $i;?></td>   
        					<td><?php echo $row->questions;?></td> 
							<td><?php echo $row->answers;?></td>
							<td><?php echo $row->date;?></td> 
					        <td class="actions"> 
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>','<?php echo $row->questions;?>','<?php echo $row->answers;?>','<?php echo $row->date;?>')"></i></a>
								<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del(<?php echo $row->id;?>)"></i></a>
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
var d = document.getElementById("faq");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 


function edit($id,$questions,$answers,$date){  
	$('#id').val($id);       
	$('#questions').val($questions); 
	$('#answers').val($answers); 
	$('#date').val($date);    
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
          <h3 class="modal-title" style="margin-right:  82%;">Add FAQ</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/faq');?>  
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
		 
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Questions:</label>
				<div class="col-sm-8">
					<input type="text" name="questions" class="form-control" required>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Answers:</label>
				<div class="col-sm-8">
					<input type="text"  name="answers" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" name="date" class="form-control" required>
				</div>
			</div>

	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit"  name="save_faq" value="Save">
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
          <h3 class="modal-title" style="margin-right:  82%;">Edit FAQ</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/faq');?>  
	 <input type="hidden" id="id" name="id" class="form-control">
		<section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				 
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Questions:</label>
				<div class="col-sm-8">
					<input type="text" id="questions" name="questions" class="form-control" required>
				</div>
			</div>
	        <div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Answers:</label>
				<div class="col-sm-8">
					<input type="text" id="answers"  name="answers" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Date:</label>
				<div class="col-sm-8">
					<input type="date" id="date" name="date" class="form-control" required>
				</div>
			</div>
		</div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="edit_faq" value="Update">
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
          <h3 class="modal-title" style="margin-right: 82%;">Delete FAQ</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
								<section class="card">
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/faq');?>  
									 
									<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
									   <div class="modal-wrapper">
										 <div class="modal-text">
											 <div class="modal-text">
							                 <p>Are you sure that you want to delete this row?</p>
							                 <input type="hidden" id="id_del" name="id" class="form-control">
												<input type="hidden" id="faq_name" name="faq" class="form-control">
						                    </div>
										 </div>
										</div>
								    </div>
									<footer class="card-footer text-right">
										<input class="btn btn-primary" type="submit"  name="del_faq" value="Delete">
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