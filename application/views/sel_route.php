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
								<li><span>Select PickUp Point &nbsp;</span></li> 
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
						
								<h2 class="card-title">Select PickUp Point</h2>
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
											<th>Route</th>
											<th>PickUp Points</th> 
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($route_show as $row) { ?>
										<tr data-item-id="1">
											<td><?php echo $i;?></td> 
											<td><?php echo $row->route_name;?></td> 
											<td><?php $pick ='';
											$pickup = json_decode($row->pickup_point_id);
											for($i=0;$i<count($pickup);$i++){
											    foreach ($pickup_show as $row1) {  
    											    if($pickup[$i] == $row1->id){
    											        $pick .=  $row1->pickup_point;
    											    }
											    }$pick .= ',';
											} 
											
											echo rtrim($pick,',');?>
											</td>  
									        <td class="actions"> 
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil" onclick='edit("<?php echo $row->id;?>", "<?php echo $row->route_name;?>")' ></i></a>
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
       title: 'Select PickUp Point',
          footer: true,
          exportOptions: {
               columns: [1,2]
           }
   },
   {
  	 extend: 'print',
       title: 'Select PickUp Point',
          footer: true,
          exportOptions: {
               columns: [1,2]
           }
   },
   { 
       	extend: 'pdf', 
          title: 'Select PickUp Point',
          exportOptions: {
               columns: [1,2]
           } 
    }
	]
} );

} );

var d = document.getElementById("sel_route");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 
  
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}

$(document).on('click', '.E', function(){   
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
})

function edit($id,$route){ 

	$('#id').val($id);      
	$('#routee').val($route);  

	var id =$id;
	
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/transportation_fetch", 
		 data: 'route='+id,
	     datatype : "json",
		 success: function(classD)  
		 {    
	         var my_html ='';
			 var obj = $.parseJSON(classD);
	     	 // console.log(obj)  
	           // 	console.log(obj[0].pickup_point_id);   
	         var pickup_point =   obj[0].pickup_point_id ;  
    		 console.log(pickup_point); 
    		var strArray = JSON.parse(pickup_point); 
    		var my_html ='';
    	    for(var i = 0; i < strArray.length; i++){  
    	        my_html +='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
    	        my_html +='<label class="col-sm-4 text-sm-right"></label>';
    	        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
    	        my_html +='<select  name="pickup_point[]" id="pickE'+i+'" class="form-control">';   
    	        my_html +='<?php  foreach ($pickup_show as $row) { ?>';
    	        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> '; 
    	        my_html +='<?php } ?> ';
    	        my_html +='</select>'; 
    	        my_html +='</div>';
    	        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
    	        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove E" >Remove</button>';
    	        my_html +='</div></div>'; 
    	    }
    
    	    $('#pickupE').html(my_html);
    	    for(var i = 0; i < strArray.length; i++){ 
    			$('#pickE'+i).val(strArray[i]);  
    			console.log(strArray[i])  
    	    }
    		$('#editrow').modal('show'); 

		 }  
	 }); 

 	
}
 
function edit_pickup(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="pickup_point[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($pickup_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove E" >Remove</button>';
        my_html +='</div></div>'; 
      $('#pickupE').append(my_html);  
 } 

var i=2; 
function add_pickup(){ 
      i++;  
      var my_html ='<div id="row'+i+'"   class="form-group row"  style="padding: 10px;"> '; 
        my_html +='<label class="col-sm-4 text-sm-right"></label>';
        my_html +='	<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<select  name="pickup_point[]" class="form-control">';
        my_html +='<option></option>';
        my_html +='<?php  foreach ($pickup_show as $row) { ?>';
        my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> ';
        my_html +='<?php } ?> ';
        my_html +='</select>';
        my_html +='</div>';
        my_html +='<div  style="padding: 10px;" class="col-sm-4"> ';
        my_html +='<button type="button" id="'+i+'" class="btn btn-danger btn_remove" >Remove</button>';
        my_html +='</div></div>'; 
      $('#pickup').append(my_html);  
 }  
$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});  

$(document).ready(function(){
    $('#ld').change(function(){    
        document.getElementById("save1").disabled = false;
    	var val =  $('#ld').val();  
    
    	var decimal=  /^[-+]?[0-9]+\.[0-9]+$/; 
    	if(val.match(decimal)){ 
    		$('#ld_msg').html(''); 
    	} else {
    	    var msg = "Invalid points,try again";
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
    	    var msg = "Invalid points,try again";
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
    	    var msg = "Invalid points,try again";
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
    	    var msg = "Invalid points,try again";
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
<?php echo form_open_multipart('Welcome/sel_route');?>  
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Route Name</label>
				<div class="col-sm-8">
					<input type="text" name="route" required class="form-control">
				</div>
			</div>
			 
	    	<div class="form-group row">
	    	<label class="col-sm-4 control-label text-sm-left pt-2"></label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">PickUp Points</label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Action</label> 
			</div>
	       
	    	<div id="pickup">
				<div id="row1"  class="form-group row" >
				<div  style="padding: 10px;" class="col-sm-4 text-sm-right"> 
					<button onclick="add_pickup()" type="button" class="btn btn-primary">Add New </button>
				</div>	
				<div  style="padding: 10px;" class="col-sm-4"> 
					<select  name="pickup_point[]" class="form-control">
						<option></option>
				 		<?php  foreach ($pickup_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> 
						<?php } ?> 
					</select>
				</div> 
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
<?php echo form_open_multipart('Welcome/sel_route');?>  
<input type="hidden" id="id" name="id" class="form-control">
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">  
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Route Name</label>
				<div class="col-sm-8">
					<input type="text" required id="routee" name="route" class="form-control">
				</div>
			</div>
			 
	    	<div class="form-group row">
	    		<div   class="col-sm-4 text-sm-right"> 
					<button onclick="edit_pickup()" type="button" class="btn btn-primary">Add New </button>
 				</div>	
				<label class="col-sm-4 control-label text-sm-left pt-2">PickUp Points</label> 
				<label class="col-sm-4 control-label text-sm-left pt-2">Action</label> 
			</div>
	       
	    	<div id="pickupE"> 
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
<?php echo form_open_multipart('Welcome/sel_route');?>  
			 
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