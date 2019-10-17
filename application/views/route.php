<?php include('include/header.php');?>	
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>PickUp Point</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>PickUp Point &nbsp;</span></li> 
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
						
								<h2 class="card-title">PickUp Point</h2>
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
											<th>Pick Up Point</th>
											<th>Longitude</th>
											<th>Lattitude</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($route_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td> 
											<td><?php echo $row->pickup_point;?></td> 
											<td><?php echo $row->longitude;?></td> 
											<td><?php echo $row->lattitude;?></td> 
									        <td class="actions"> 
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick="edit('<?php echo $row->id;?>', '<?php echo $row->pickup_point;?>','<?php echo $row->longitude;?>','<?php echo $row->lattitude;?>')"></i></a>
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
       title: 'PickUpPoint',
          footer: true,
          exportOptions: {
               columns: [1,2,3]
           }
   },
   {
  	 extend: 'print',
       title: 'PickUpPoint',
          footer: true,
          exportOptions: {
               columns: [1,2,3]
           }
   },
   { 
       	extend: 'pdf', 
          title: 'PickUpPoint',
          exportOptions: {
               columns: [1,2,3]
           } 
    }
	]
} );

} );

var d = document.getElementById("route");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$pickup_point,$longitude,$lattitude){ 

	$('#id').val($id);      
	$('#pickup_point').val($pickup_point); 
	$('#longitude').val($longitude); 
	$('#lattitude').val($lattitude); 
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
$('#ld').change(function(){    
    document.getElementById("save1").disabled = false;
	var val =  $('#ld').val();  

	var decimal=  /^[-+]?[0-9]+\.[0-9]+$/; 
	if(val.match(decimal)){ 
		$('#ld_msg').html(''); 
	} else {
	    var msg = "Invalid points,should be decimal";
	    $('#ld_msg').html(msg);
	    $('#ld').focus()
	     document.getElementById("save1").disabled = true;
	    return false
	}
}); 

$('#lt').change(function(){    
    document.getElementById("save1").disabled = false;
	var val =  $('#lt').val();  

	var decimal=  /^[-+]?[0-9]+\.[0-9]+$/; 
	if(val.match(decimal)){ 
		$('#lt_msg').html(''); 
	} else {
	    var msg = "Invalid points,should be decimal";
	    $('#lt_msg').html(msg);
	    $('#lt').focus()
	     document.getElementById("save1").disabled = true;
	    return false
	}
}); 


$('#longitude').change(function(){    
    document.getElementById("save2").disabled = false;
	var val =  $('#longitude').val();  

	var decimal=  /^[-+]?[0-9]+\.[0-9]+$/; 
	if(val.match(decimal)){ 
		$('#longitude_msg').html(''); 
	} else {
	    var msg = "Invalid points,should be decimal";
	    $('#longitude_msg').html(msg);
	    $('#longitude').focus()
	     document.getElementById("save2").disabled = true;
	    return false
	}
}); 

$('#lattitude').change(function(){    
    document.getElementById("save2").disabled = false;
	var val =  $('#lattitude').val();  

	var decimal=  /^[-+]?[0-9]+\.[0-9]+$/; 
	if(val.match(decimal)){ 
		$('#lattitude_msg').html(''); 
	} else {
	    var msg = "Invalid points,should be decimal";
	    $('#lattitude_msg').html(msg);
	    $('#lattitude').focus()
	     document.getElementById("save2").disabled = true;
	    return false
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
          <h3 class="modal-title" style="margin-right:  70%;">Add PickUp Point</h3>
        </div>
<div class="modal-body">
<div class="col-lg-12"> 
	<section class="card">

<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/route');?>  
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Pickup point</label>
				<div class="col-sm-8">
					<input type="text" required name="pickup_point" maxlength="100" class="form-control">
				</div>
			</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Longitude</label>
				<div class="col-sm-8"><span id="ld_msg" style="color:red"></span>
					<input type="text" required name="longitude" id="ld" class="form-control" >
				</div>
			</div>
	       
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Lattitude</label>
				<div class="col-sm-8"><span id="lt_msg" style="color:red"></span>
					<input type="text" required name="lattitude" id="lt" class="form-control">
				</div>
			</div>
	       
	       
	    </div>
		<footer class="card-footer text-right"> 
			<input class="btn btn-primary" type="submit" id="save1" name="save_route" value="Save">
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
          <h3 class="modal-title" style="margin-right:  70%;">Edit PickUp Point</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		<section class="card"> 
<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/route');?>  
	<input type="hidden" name="id" id="id" class="form-control">
	
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Pickup Point</label>
				<div class="col-sm-8">
					<input type="text" required name="pickup_point" id="pickup_point" class="form-control">
				</div>
			</div>	
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Longitude</label>
				<div class="col-sm-8"><span id="longitude_msg" style="color:red"></span>
					<input type="text" required id="longitude" name="longitude" class="form-control">
				</div>
			</div>
	       
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Lattitude</label>
				<div class="col-sm-8"><span id="lattitude_msg" style="color:red"></span>
					<input type="text" required id="lattitude" name="lattitude" class="form-control">
				</div>
			</div>				
										
	    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit" id="save2" name="edit_route" value="Update">
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
          <h3 class="modal-title" style="margin-right: 68%;">Delete PickUp Point</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card">
<?php $this->load->helper('form');?>
<?php echo form_open_multipart('Welcome/route');?>  
			 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						<input type="hidden" id="Route_name" name="Route" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_route" value="Delete">
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