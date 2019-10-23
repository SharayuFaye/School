<?php include('include/header.php');?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Students</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Students &nbsp;</span></li> 
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
						
								<h2 class="card-title">Students</h2>
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
<!--          for upload -->
        	<?php if(isset($duplicate_record)){    if(isset($duplicate_record[0])){  ?>
        		<div class="alert alert-success" id="duplicate">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        				<strong>Duplicate entries for user - <?php $i=1;foreach($duplicate_record as $record){ ?> <?php echo $i.") "; echo $record; ?> <?php $i++ ;} ?></strong>  
        			</div>
        	<?php }else{ ?>
        	<div class="alert alert-success" id="success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong>Record inserted successfully!</strong>  
			</div>
			<?php } } ?>
  
<!--    end      for upload -->  	
        <?php $this->load->helper('form');?>
        <?php echo form_open_multipart('Welcome/students');?>
								
		<div class="form-group row" >  
			<div class="col-sm-1">
				<button id="addToTable" type="button" onclick="add()" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
			</div> 
			<div class="col-sm-2 ">
				<button id="delToTable" type="button"  class="btn btn-primary">Delete All</button>
			</div> 
			 
			 <div class="col-sm-3">  </div>
            <!--   for upload --> 
				<div class="col-sm-5" style="margin-left: -3%;"> 
    				<input  type="file" accept=".xls"   name="xls_file" class="form-control ">
    				</div>
				<div class="col-sm-1">
					<input type="submit" id="upload" name="upload_xls" class="btn btn-primary" value="Upload XLS"> 
			</div> 
                <!--  End for upload -->  
		</div>  
			<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
					<thead>
						<tr>
							<th></th>  
							<th>Class</th>
							<th>Sections</th> 
							<th>Student Name</th> 
							<th>Student DOB</th> 
							<th>Student Adhar No.</th> 
							<th>Profile</th>
							<th>Roll No</th>  
							<th>Batch</th> 
							<th>Father MailId/Username</th>  
							<th>Parent Name</th>
							<th>Parent Mob No</th>
							<th>Mother Name</th>
							<th>Mother MailID</th>
							<th>Mother Mob No</th>
							<th>Parent Scan Id</th> 
							<th>Bus</th>
							<th>Pickup Point</th>
							<th>Join Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody> 
						<?php $i=1; foreach ($students_show as $row) { ?>
						<tr data-item-id="1">
						    <td><input type="checkbox" name="del_all[]"   value="<?php echo $row->id;?>"></td> 
							<td><?php echo $row->class;?></td>  
							<td><?php echo $row->sections;?></td>  
							<td><?php echo $row->student_name;?></td>  
							<td><?php echo $row->dob;?></td>  
							<td><?php echo $row->adhar;?></td>  
							<td><img src="<?php echo base_url(); ?>profile/<?php echo $row->profile;?>" width="35" height="35"/></td>  
							<td><?php echo $row->roll_number;?></td>  
							<td><?php echo $row->batch;?></td>  
							<td><?php echo $row->username;?></td>   
							<td><?php echo $row->parent_name;?></td>  
							<td><?php echo $row->parent_mob;?></td> 
							<td><?php echo $row->mother_name;?></td> 
							<td><?php echo $row->mother_mail;?></td> 
							<td><?php echo $row->mother_mob;?></td>  
							<td><?php echo $row->parent_scan_id;?></td>
							<td><?php echo $row->bus_number;?></td>  
							<td><?php echo $row->pickup_point;?></td>  
							<td><?php echo $row->join_date;?></td>  
							<td class="actions">
								<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
								<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
								<a href="#" class="on-default edit-row"><i class="fa fa-pencil" 
								onclick="edit('<?php echo $row->id;?>','<?php echo $row->users_id;?>' ,
								'<?php echo $row->class_id;?>' ,'<?php echo $row->sections;?>','<?php echo $row->sections_id;?>' ,
								'<?php echo $row->student_name;?>','<?php echo $row->dob;?>' , 
								'<?php echo $row->adhar;?>' ,'<?php echo $row->profile;?>',  
								'<?php echo $row->roll_number;?>' ,'<?php echo $row->batch;?>' ,
								'<?php echo $row->username;?>' ,
								'<?php echo $row->password;?>','<?php echo $row->parent_name;?>',
								'<?php echo $row->parent_mob;?>','<?php echo $row->mother_name;?>', 
								'<?php echo $row->mother_mail;?>', '<?php echo $row->mother_mob;?>',
								'<?php echo $row->parent_scan_id;?>',
								'<?php echo $row->bus_id;?>' ,'<?php echo $row->bus_number;?>' ,
								'<?php echo $row->route_id;?>' ,'<?php echo $row->route_name;?>' ,
								'<?php echo $row->trans_id;?>' ,'<?php echo $row->pickup_point;?>' ,
								'<?php echo $row->join_date;?>' )"></i></a>
								<a href="#" class="on-default remove-row"><i class="fa fa-trash-o" onclick="del('<?php echo $row->id;?>')"></i></a>
							</td>
						</tr> 
						<?php $i++;} ?> 
					  
					</tbody>
				</table>
			</div>
	 <?php echo form_close(); ?>
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
                     title: 'Students',
                    footer: true,
                  	 exportOptions: {
                        columns: [1,2,3,4,5,7,8,9,10,11,12,13]
                    }
                 },
                 {
                	 extend: 'print',
                     title: 'Students',
                 	  footer: true,
                 	  exportOptions: {
                        columns: [1,2,3,4,5,7,8,9,10,11,12,13]
                    }
                 },
                 { 
                     	extend: 'pdf', 
                        title: 'Students',
                   	    exportOptions: {
                        columns: [1,2,3,4,5,7,8,9,10,11,12,13]
                  } 
               }
       		]
  } ); 
} );


$('button[id="delToTable"]').on('click', function(e) {
	var checkedNum = $('input[name="del_all[]"]:checked').length;
	if (!checkedNum) {
		 
		$('#error').modal('show'); 
	    
	}else{
	 
	  var $form = $(this).closest('form');
	  e.preventDefault();
	  $('#confirm').modal({
	      backdrop: 'static',
	      keyboard: false
	  })
	  .on('click', '#delete', function(e) {
	      $form.trigger('submit');
	    });
	}
	});


var d = document.getElementById("students");
d.className += " nav-active";  
var n = document.getElementById("nav");
n.className += " nav-expanded nav-active"; 

function edit($id,$users_id ,$class_id ,$section,$sections_id ,$student_name,$dob , $adhar ,$profile,  $roll_number ,$batch ,$username ,$password,$parent_name,$parent_mob,	$mother_name, $mother_mail, $mother_mob,$parent_scan_id, $bus_id , $bus_number,$rt,$route_name,$transportation_id ,$pickup,$join_date){  
	$('#id').val($id); 
	$('#users_id').val($users_id);
	$('#class').val($class_id);

    var opt = $('<option />');  
	 opt.val($sections_id);
	 opt.text($section);
	 $('#section').append(opt); 
	 
// 	$('#section').val($sections_id);     
	$('#student_name').val($student_name);  
	$('#dob').val($dob);   
	$('#adhar').val($adhar);   
	document.getElementById("profile").src = '<?php echo base_url(); ?>profile/'+$profile;
	$('#student_rollno').val($roll_number); 
	$('#student_batch').val($batch);
// 	$('#teacher').val($teachers_id); 
	$('#username').val($username);  
// 	$('#password').val($password); 
// 	$('#confirm_password2').val($password); 
	
	$('#parent_name').val($parent_name);
	$('#parent_mob').val($parent_mob);
	$('#mother_name').val($mother_name);
	$('#mother_mail').val($mother_mail);
	$('#mother_mob').val($mother_mob);
	$('#parent_id').val($parent_scan_id);
	     
//     var opt = $('<option />');  
// 	 opt.val($bus_id);
// 	 opt.text($bus_number);
// 	 $('#bus1').append(opt); 

		$('#bus1').val($bus_id);
		
    var opt = $('<option />');  
	 opt.val($rt);
	 opt.text($route_name);
	 $('#rt').append(opt); 
	  
    var opt = $('<option />');  
	 opt.val($transportation_id);
	 opt.text($pickup);
	 $('#pickup_point').append(opt); 
	 
	$('#join_date').val($join_date);
	$('#editrow').modal('show'); 
}
function add(){
	$('#addrow').modal('show'); 
}
function del($id){   
	$('#id_del').val($id); 
	$('#delrow').modal('show'); 
}


function ValidateEmail(v)
{ 
    document.getElementById("save1").disabled = false;
	var val = v; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg1').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg1').html(msg); 
	     document.getElementById("save1").disabled = true; 
	}
}


$(document).ready(function() {


 $('#username').change(function(){ 
    document.getElementById("save2").disabled = false;
	var val = $('#username').val() ; console.log(val);
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
		$('#msg2').html(''); 
	} else { 
	    var msg = "You have entered an invalid email address!";
	    $('#msg2').html(msg); 
	     document.getElementById("save2").disabled = true; 
	}
});
});

function validateImage(id) {
    var formData = new FormData();
    $('#msg_i').html(''); 
    document.getElementById("save1").disabled = false;
    var file = document.getElementById(id).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") { 
        var msg_i = "Please select a valid image file!";
	    $('#msg_i').html(msg_i); 
	     document.getElementById("save1").disabled = true; 
        document.getElementById(id).value = ''; 
    }
    if (file.size > 250000) { 
        document.getElementById(id).value = ''; 
        var msg_i = "Max Upload size is 250KB only!";
	    $('#msg_i').html(msg_i); 
	     document.getElementById("save1").disabled = true;  
    } 
}

function validateImageE(id) {
    var formData = new FormData();
    $('#msg_ie').html(''); 
    document.getElementById("save1").disabled = false;
    var file = document.getElementById(id).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") { 
        var msg_i = "Please select a valid image file!";
	    $('#msg_ie').html(msg_i); 
	     document.getElementById("save1").disabled = true; 
        document.getElementById(id).value = ''; 
    }
    if (file.size > 250000) { 
        document.getElementById(id).value = ''; 
        var msg_i = "Max Upload size is 250KB only!";
	    $('#msg_ie').html(msg_i); 
	     document.getElementById("save2").disabled = true;  
    } 
}




</script>
<script type="text/javascript"> 
 $(document).ready(function(){
 
 $('#parent_mob').change(function(){    
     document.getElementById("save2").disabled = false;
 	var val =  $('#parent_mob').val();  
 	if (/^\d{10}$/.test(val)) {
 		$('#parent_mob_msg').html(''); 
 	} else {
 	    var msg = "Invalid mobile number , must be ten digits";
 	    $('#parent_mob_msg').html(msg);
 	    $('#parent_mob').focus()
 	     document.getElementById("save2").disabled = true;
 	    return false
 	}

 }); 
 $('#mother_mob').change(function(){   
     document.getElementById("save2").disabled = false;
 	var val =  $('#mother_mob').val();  
 	if (/^\d{10}$/.test(val)) {
 		$('#mother_mob_msg').html(''); 
 	} else {
 	    var msg = "Invalid mobile number , must be ten digits";
 	    $('#mother_mob_msg').html(msg);
 	    $('#mother_mob').focus()
 	     document.getElementById("save2").disabled = true;
 	    return false
 	}

 }); 
 
 $('#mother_mail').change(function(){   
     document.getElementById("save2").disabled = false;
 	var val =  $('#mother_mail').val();  
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
 		$('#mother_mail_msg').html(''); 
 	} else {
	    var msg = "You have entered an invalid email address!";
 	    $('#mother_mail_msg').html(msg);
 	    $('#mother_mail').focus()
 	     document.getElementById("save2").disabled = true;
 	    return false
 	}

 }); 




 $('#p_mob').change(function(){    
     document.getElementById("save1").disabled = false;
 	var val =  $('#p_mob').val();  
 	if (/^\d{10}$/.test(val)) {
 		$('#p_mob_msg').html(''); 
 	} else {
 	    var msg = "Invalid mobile number , must be ten digits";
 	    $('#p_mob_msg').html(msg);
 	    $('#p_mob').focus()
 	     document.getElementById("save1").disabled = true;
 	    return false
 	}

 }); 
 $('#m_mob').change(function(){   
     document.getElementById("save1").disabled = false;
 	var val =  $('#m_mob').val();  
 	if (/^\d{10}$/.test(val)) {
 		$('#m_mob_msg').html(''); 
 	} else {
 	    var msg = "Invalid mobile number , must be ten digits";
 	    $('#m_mob_msg').html(msg);
 	    $('#m_mob').focus()
 	     document.getElementById("save1").disabled = true;
 	    return false
 	}

 }); 
 
 $('#m_mail').change(function(){   
     document.getElementById("save1").disabled = false;
 	var val =  $('#m_mail').val();  
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val)) {
 		$('#m_mail_msg').html(''); 
 	} else {
	    var msg = "You have entered an invalid email address!";
 	    $('#m_mail_msg').html(msg);
 	    $('#m_mail').focus()
 	     document.getElementById("save1").disabled = true;
 	    return false
 	}

 }); 

 $('#class_sel').change(function(){  
 $("#section_sel > option").remove();  
 var class_sel = $('#class_sel').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
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
						 $('#section_sel').append(opt); 
                }) 
		 } 
	 }); 
 });


 $('#bus_sel').change(function(){   
 $("#route_sel > option").remove();  
 var bus_sel = $('#bus_sel').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/bus_route_show", 
		 data: 'bus_sel='+bus_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 var my_html1 =  '<option></option>';
                $.each(obj, function (index, object) { 
                	console.log(object); 
                	 my_html1 +='<option value="'+object['route_id']+'">'+object['route_name']+'</option> ';  
                       
                }) 
                $('#route_sel').append(my_html1);
		 } 
	 }); 
 });
 $('#route_sel').change(function(){  
	 $("#pickup_point_sel > option").remove();  
	 var route_id = $('#route_sel').val();  
		 $.ajax({
			 type: "GET",
			 url: "<?php echo base_url(); ?>index.php/transportation_fetch", 
			 data:  'route='+route_id,
	         datatype : "json",
			 success: function(classD)  
			 {   
				 var obj = $.parseJSON(classD);
				    $.each(obj, function (index, object) { 
	                	console.log(object); 
	                 	var pickup_point = object['pickup_point_id']; 
// 	                 	console.log($.parseJSON(pickup_point)); 
	                	var strArray = $.parseJSON(pickup_point); 
	                 
	                    for(var i = 0; i < strArray.length; i++){ 
	                    	 
//                             console.log(strArray[i]); 
	                        var my_html =  '<?php  foreach ($route_show as $row) { ?>';  
	                        if(strArray[i] == <?php echo $row->id; ?>){
	                     //       console.log(<?php echo $row->id; ?>); 
	                            my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> ';
	                        }
	                            my_html +='<?php } ?> '; 
	                            console.log(my_html); 
	                        $('#pickup_point_sel').append(my_html);
		

	                    	//$('#pickE'+i).val(strArray[i]);  
	                    }
	                    	 
	                })  
			 } 
		 }); 

 
	 });
 
 $('#class').change(function(){  
 $("#section > option").remove();  
 var class1 = $('#class').val();  
 console.log(class1);
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/sections_fetch", 
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
						 $('#section').append(opt); 
                }) 
		 } 
	 }); 
 });


 $('#bus1').change(function(){   
 $("#rt > option").remove();  
 var bus_sel = $('#bus1').val();  
	console.log(bus_sel); 
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/bus_route_show", 
		 data: 'bus_sel='+bus_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
         	console.log(obj); 
			 var my_html1 =  '<option></option>';
                $.each(obj, function (index, object) { 
                	console.log(object); 
                	 my_html1 +='<option value="'+object['route_id']+'">'+object['route_name']+'</option> ';  
                       
                }) 
                $('#rt').append(my_html1);
		 } 
	 }); 
 });

 $('#rt').change(function(){  
 $("#pickup_point > option").remove();  
 var route_id = $('#rt').val();  
	console.log(route_id); 
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/transportation_fetch", 
		 data: 'route='+route_id,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD); 

         	console.log(obj); 
                $.each(obj, function (index, object) { 
                	console.log(object); 
                	var pickup_point = object['pickup_point_id']; 
                	var strArray = $.parseJSON(pickup_point); 
                 
                    for(var i = 0; i < strArray.length; i++){  

                        var my_html =  '<?php  foreach ($route_show as $row) { ?>';
                        if(strArray[i] == <?php echo $row->id; ?>){
                            my_html +='<option value="<?php echo $row->id;?>"><?php echo $row->pickup_point;?></option> ';
                        }
                            my_html +='<?php } ?> '; 
                        
                        $('#pickup_point').append(my_html);
	

                    	//$('#pickE'+i).val(strArray[i]);  
                    }
                })  
            
		 } 
	 }); 
   
 });
 
 $('#mail_id').change(function(){    
	 $('#msg').html('');
     $('#parent_scn').val(''); 
     $('#parent_nm').val('');  
     $('#pwd').val(''); 
 var mail_id = $('#mail_id').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/parents_fetch", 
		 data: 'mail_id='+mail_id,
         datatype : "json",
		 success: function(parents)  
		 {   
			 var obj = $.parseJSON(parents);
                console.log(obj);
                if(obj[0]){
                $('#msg').html('This parent e-mail id already exists!'); 
                $('#parent_scn').val(obj[0]['parent_scan_id']); 
                $('#parent_nm').val(obj[0]['parent_name']);  
                $('#pwd').val(obj[0]['password']);  
            	$('#p_mob').val(obj[0]['parent_mob']);
            	$('#m_name').val(obj[0]['mother_name']);
            	$('#m_mail').val(obj[0]['mother_mail']);
            	$('#m_mob').val(obj[0]['mother_mob']);
                    	 
                }
		 } 
	 }); 
 });
 $('#username').change(function(){    
	 $('#msg1').html('');
 var mail_id = $('#username').val();  
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/parents_fetch", 
		 data: 'mail_id='+mail_id,
         datatype : "json",
		 success: function(parents)  
		 {   
			 var obj = $.parseJSON(parents);
                console.log(obj);
                if(obj[0]){
                $('#msg1').html('This parent e-mail id already exists!'); 
                $('#parent_id').val(obj[0]['parent_scan_id']); 
                $('#parent_name').val(obj[0]['parent_name']);  
                $('#password').val(obj[0]['password']);  
            	$('#parent_mob').val(obj[0]['parent_mob']);
            	$('#mother_name').val(obj[0]['mother_name']);
            	$('#mother_mail').val(obj[0]['mother_mail']);
            	$('#mother_mob').val(obj[0]['mother_mob']);
                }
		 } 
	 }); 
 });



 $('#rn').change(function(){     
	     document.getElementById("save1").disabled = false;
 var roll_no = $('#rn').val();  
 var section_sel = $('#section_sel').val();   
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/students_byroll_fetch", 
		 data: 'roll_no='+roll_no+'&sections_id='+section_sel,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			//console.log(obj);
			if(obj.length > 0){
				console.log('Already Exists!');
				$('#r_msg1').html('Roll no. already Exists for another student!');
		 	    $('#rn').focus()
		 	     document.getElementById("save1").disabled = true;
			}else{
				$('#r_msg1').html('');
				 document.getElementById("save1").disabled = false;
			}
		 } 
	 }); 
 });


 $('#student_rollno').change(function(){     
	     document.getElementById("save2").disabled = false;
 var id = $('#id').val();  
 var roll_no = $('#student_rollno').val(); 
 var section_sel = $('#section').val();   
	 $.ajax({
		 type: "GET",
		 url: "<?php echo base_url(); ?>index.php/students_byroll_fetch_edit", 
		 data: 'roll_no='+roll_no+'&sections_id='+section_sel+'&id='+id,
         datatype : "json",
		 success: function(classD)  
		 {   
			 var obj = $.parseJSON(classD);
			 console.log(obj);
			if(obj.length > 0){
				console.log('Already Exists!');
				$('#r_msg2').html('Roll no. already Exists for another student!');
		 	    $('#student_rollno').focus()
		 	     document.getElementById("save2").disabled = true;
			}else{
				$('#r_msg2').html('');
				 document.getElementById("save2").disabled = false;
			}
		 } 
	 }); 
 });



 $('#confirm_password1').change(function(){   
     document.getElementById("save1").disabled = false;
	 $('#msgp1').html('');  
	 var confirm_password1 = $('#confirm_password1').val();  
	 var password1 = $('#pwd').val();  
	 if(confirm_password1 != password1){
		var msg = 'Password should match!';
		$('#msgp1').html(msg);  
		document.getElementById("save1").disabled = true;
	 } 
 });  
 $('#pwd').change(function(){   
     document.getElementById("save1").disabled = false;
	 $('#msgp1').html('');  
	 var confirm_password1 = $('#confirm_password1').val();  
	 var password1 = $('#pwd').val();  
	 if(confirm_password1 != password1){
		var msg = 'Password should match!';
		$('#msgp1').html(msg);  
		document.getElementById("save1").disabled = true;
	 } 
 });  

 $('#confirm_password2').change(function(){   
     document.getElementById("save2").disabled = false;
     $('#msgp2').html('');  
	 var confirm_password2 = $('#confirm_password2').val();  
	 var password2 = $('#password').val();  
	 if(confirm_password2 != password2){
		var msg = 'Password should match!';
		$('#msgp2').html(msg);  
		document.getElementById("save2").disabled = true;
	 } 
}); 

 $('#password').change(function(){   
     document.getElementById("save2").disabled = false;
     $('#msgp2').html('');  
	 var confirm_password2 = $('#confirm_password2').val();  
	 var password2 = $('#password').val();  
	 if(confirm_password2 != password2){
		var msg = 'Password should match!';
		$('#msgp2').html(msg);  
		document.getElementById("save2").disabled = true;
	 } 
}); 
 
 
 });	 
</script>  

 
<!-- del row -->
<div class="modal fade" id="confirm" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: 135%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right: 77%;">Delete All  </h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card">
		 	 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete these rows, this will delete all data of students?</p> 
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>  
			</footer>
		</section>  
</div>
						
</div>                                          
</div>
</div>                                          
</div>                                        
</div>	
<!-- add row -->
<div class="modal fade" id="addrow" role="dialog"  >
	<div class="modal-dialog">
		<div class="modal-content" style="width: 155%;">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
	          <h3 class="modal-title" style="margin-right:  79%;">Add Student</h3>
	        </div>
	<div class="modal-body">
	<div class="col-lg-12"> 
		<section class="card"> 
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/students');?> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
					<div class="col-sm-8">
						<select required name="class" id="class_sel" class="form-control">
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
						<select required name="section" id="section_sel" class="form-control"> 
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Name:</label>
					<div class="col-sm-8">
						<input   type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="100" required name="student_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student DOB:</label>
					<div class="col-sm-8">
						<input type="date" required name="dob" max="<?php echo date('Y-m-d');?>" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Adhar No.:</label>
					<div class="col-sm-8">
						<input type="text"  maxlength="100" required name="adhar" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Profile Image:</label>
					<div class="col-sm-8"><span id="msg_i" style="color:red"></span>
						<input type="file" accept="image/*" onchange="validateImage(this.id)" id="profile_img" name="profile" class="form-control">
					 	 ( File accepts only jpg , png , jpeg type image file & Max Upload size is 250KB only )
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Roll No:</label>
					<div class="col-sm-8"><span id="r_msg1" style="color:red"></span>
						<input type="number" min="1" max='100' name="roll_number" id="rn" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Batch:</label>
					<div class="col-sm-8">
						<input type="text"  maxlength="100" name="batch" class="form-control">
					</div>
				</div> 
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Parents MailId</label>
					<div class="col-sm-8"><span id="msg" style="color:red"></span><span id="msg1" style="color:red"></span>
						<input type="text"  maxlength="100" id="mail_id" onchange="ValidateEmail(this.value)" required name="username" class="form-control">
					</div>
				</div>
					<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Password:</label>
					<div class="col-sm-8">
						<input type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   maxlength="100" id="pwd" required name="password" class="form-control">
					</div>
				</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Confirm Password:</label>
				<div class="col-sm-8">	<span id="msgp1" style="color: red"></span>
					<input type="text"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  id="confirm_password1" required  name="confirm_password" class="form-control">
				
				</div>
			</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Father Name:</label>
					<div class="col-sm-8">
						<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="100" required id="parent_nm" name="parent_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Father Mob:</label>
					<div class="col-sm-8"><span id="p_mob_msg" style="color:red"></span>
						<input type="text"  maxlength="10" required  id="p_mob"  name="parent_mob" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Mother Name:</label>
					<div class="col-sm-8">
						<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="100"  required  id="m_name" name="mother_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Mother MailId:</label>
					<div class="col-sm-8"><span id="m_mail_msg" style="color:red"></span>
						<input type="text" id="m_mail" name="mother_mail" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Mother Mob:</label>
					<div class="col-sm-8"><span id="m_mob_msg" style="color:red"></span>
						<input type="text" maxlength="10"  id="m_mob"  name="mother_mob"  class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Parent Scan Id:</label>
					<div class="col-sm-8">
					
						<input type="text"  maxlength="100" required id="parent_scn" name="parent_id" class="form-control">
					</div>
				</div>
			
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Bus:</label>
					<div class="col-sm-8">
						<select  name="bus" id="bus_sel" class="form-control">
							<option></option>
							<?php  foreach ($bus_show as $row) { ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->bus_number;?></option> 
						<?php } ?> 
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Route:</label>
					<div class="col-sm-8">
						<select  name="route" id="route_sel" class="form-control">
							 
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Pickup Point:</label>
					<div class="col-sm-8">
						<select  name="pickup_point" id="pickup_point_sel" class="form-control"> 
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
					<div class="col-sm-8">
						<input type="Date" name="join_date"  max="<?php echo date('Y-m-d');?>" class="form-control">
					</div>
				</div>
		    </div>
			<footer class="card-footer text-right"> 
				<input class="btn btn-primary" type="submit" id="save1" name="save_students" value="Save">
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
          <h3 class="modal-title" style="margin-right:  79%;">Edit Student</h3>
        </div>
		<div class="modal-body">         
		       <div class="col-lg-12"> 
		
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/students');?> 
	 <input type="hidden" id="id" name="id" class="form-control">
	 <input type="hidden" id="users_id" name="users_id" class="form-control">

	 <section class="card"> 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select  name="class" id="class" required class="form-control">
						<?php  foreach ($class_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->class;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Section:</label>
				<div class="col-sm-8"> 
					<select  name="sections" required id="section" class="form-control">
						 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Name:</label>
				<div class="col-sm-8">
					<input type="text" maxlength="100" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required id="student_name" name="student_name" class="form-control">
				</div>
			</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student DOB:</label>
					<div class="col-sm-8">
						<input type="date" id="dob"   max="<?php echo date('Y-m-d');?>" required name="dob" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Student Adhar No.:</label>
					<div class="col-sm-8">
						<input type="text" id="adhar" maxlength="100"  required name="adhar" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Profile Image:</label>
					<div class="col-sm-8"><span id="msg_ie" style="color:red"></span>
					<input type="file" accept="image/*" onchange="validateImageE(this.id)" id="profileE"    name="profile" class="form-control">
					 
					 	 ( File accepts only jpg , png , jpeg type image file & Max Upload size is 250KB only )<br>
					 	 <img src="profile/logo.png" id="profile"  width="35" height="35"   />
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Roll No:</label>
				<div class="col-sm-8"><span id="r_msg2" style="color:red"></span>
					<input type="number"  min ="1" max='100' id="student_rollno" name="roll_number" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Batch:</label>
				<div class="col-sm-8">
					<input type="text"  maxlength="100" id="student_batch" name="batch" class="form-control">
				</div>
			</div> 
					<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Parents MailId</label>
					<div class="col-sm-8"> <span id="msg2" style="color:red"></span>
						<input type="email" required maxlength="100"  id="username"  onchange="ValidateEmailE(this.value)" name="username" class="form-control">
					</div>
				</div>
					<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"> Password:</label>
					<div class="col-sm-8">
						<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  maxlength="100"  id="password" name="password" class="form-control">
					</div>
				</div>
	    	<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> Confirm Password:</label>
				<div class="col-sm-8">
					<input type="text" id="confirm_password2"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"    name="confirm_password" class="form-control">
					<span id="msgp2" style="color: red"></span>
				</div>
			</div>
				
				<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Parent Name:</label>
				<div class="col-sm-8">
					<input type="text" required onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="100"  id="parent_name" name="parent_name" class="form-control">
				</div>
			</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Father Mob:</label>
					<div class="col-sm-8"><span id="parent_mob_msg" style="color:red"></span>
						<input type="text"  maxlength="10" required  id="parent_mob"  name="parent_mob" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Mother Name:</label>
					<div class="col-sm-8">
						<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="100" required  id="mother_name" name="mother_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Mother MailId:</label>
					<div class="col-sm-8"><span id="mother_mail_msg" style="color:red"></span>
						<input type="email"  maxlength="100"  id="mother_mail"   name="mother_mail" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 control-label text-sm-right pt-2">Mother Mob:</label>
					<div class="col-sm-8"><span id="mother_mob_msg" style="color:red"></span>
						<input type="text"    maxlength="10"  id="mother_mob" name="mother_mob" class="form-control">
					</div>
				</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Parent Scan Id:</label>
				<div class="col-sm-8">
					<input type="text" required  maxlength="100" id="parent_id" name="parent_id" class="form-control">
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Bus:</label>
				<div class="col-sm-8">
					<select  name="bus" id="bus1" class="form-control"> 
						<?php  foreach ($bus_show as $row) { ?>
						<option value="<?php echo $row->id;?>"><?php echo $row->bus_number;?></option> 
					<?php } ?> 
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Route:</label>
				<div class="col-sm-8">
					<select  name="route" id="rt" class="form-control">   
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Pickup Point:</label>
				<div class="col-sm-8">
					<select  name="pickup_point" id="pickup_point" class="form-control">
						 
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Join Date:</label>
				<div class="col-sm-8">
					<input type="date" id="join_date"  max="<?php echo date('Y-m-d');?>"  name="join_date" class="form-control">
				</div>
			</div>
			    </div>
				<footer class="card-footer text-right">
					<input class="btn btn-primary" type="submit" id="save2"  name="edit_students" value="Update">
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
          <h3 class="modal-title" style="margin-right: 77%;">Delete Student</h3>
        </div>
<div class="modal-body">  
    <div class="col-lg-12"> 
		<section class="card">
		
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/students');?> 	 
			<div class="card-body" style="padding-left: 0%;padding-right: 13%;">
			   <div class="modal-wrapper">
				 <div class="modal-text">
					 <div class="modal-text">
	                 <p>Are you sure that you want to delete this row, this will delete all data of student?</p>
	                 <input type="hidden" id="id_del" name="id" class="form-control">
						 
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_students" value="Delete">
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


<!-- errorl row -->
<div class="modal fade" id="error" role="dialog"  >
<div class="modal-dialog">
	<div class="modal-content" style="width: auto;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title"  >Please select Students to delete !!!!</h3>
        </div>
			<footer class="card-footer text-right"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
			</footer>                                        
</div>
</div>                                          
</div>                                        
</div>				