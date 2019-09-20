<?php include('include/header.php');?>	
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Timetable</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Timetable Add&nbsp;</span></li> 
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
		
				<h2 class="card-title">Timetable</h2>
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
						<a href="<?php echo base_url(); ?>index.php/timetables">
							<button id="addToTable"  class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</button>
							</a>
						</div>
					</div>
				</div>
			
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/timetables');?>  
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2">Class:</label>
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
				<label class="col-sm-4 control-label text-sm-right pt-2">Sections:</label>
				<div class="col-sm-8">
					<select name="section" id="sel_section" class="form-control" required > 
					</select>
				</div>
			</div> 
			<input type="hidden" name="subject" id="subj">
			<hr>
			<div class="form-group row">  
				<label class="col-sm-4 control-label text-sm-right pt-2"> </label>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Mon </label></div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Tue </label></div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Wed</label> </div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Thur </label></div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Fri </label></div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Sat </label></div>
				<div class="col-sm-1"> <label class=" control-label text-sm-right pt-2" > Sun </label></div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"> No. Of Lectures:</label>
				<div class="col-sm-1"> <input type="number" min="0" name="mon" id="mon" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="tue" id="tue" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="wed" id="wed" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="thu" id="thu" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="fri" id="fri" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="sat" id="sat" class="form-control"> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="sun" id="sun" class="form-control"> </div> 
			 </div>
			 <div class="text-right">
    			 <input class="btn btn-primary" type="button" id="next"  value="Next"> 
    			<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
			</div> 
			
			
			 <div class="form-group row" id="nxt_mon">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Monday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div> 
			<input type="hidden" name="day[]" value="monday">
		   <div class="form-group row" id="next_div_mon">  </div>
		   
		   
			 <div class="form-group row" id="nxt_tue">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Tuesday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="tueday">
		   <div class="form-group row" id="next_div_tue">  </div>
		   
		   
			 <div class="form-group row" id="nxt_wed">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Wednesday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="wednesday">
		   <div class="form-group row" id="next_div_wed">  </div>
		   
		   
			 <div class="form-group row" id="nxt_thu">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Thursday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="thursday">
		   <div class="form-group row" id="next_div_thu">  </div>
		   
		   
			 <div class="form-group row" id="nxt_fri">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Friday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="friday">
		   <div class="form-group row" id="next_div_fri">  </div>
		   
		   
			 <div class="form-group row" id="nxt_sat">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Saturday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="saturday">
		   <div class="form-group row" id="next_div_sat">  </div>
		   
		   
			 <div class="form-group row" id="nxt_sun">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> Sunday</label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div>
			<input type="hidden" name="day[]" value="sunday">
		   <div class="form-group row" id="next_div_sun">  </div>
		   
	    </div>
		<footer class="card-footer text-right" id="footer"> 
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span> 
			<input class="btn btn-primary" type="submit" name="save_timetables" value="Save">  
			<a href="<?php echo base_url(); ?>index.php/timetables">
			<button   type="button"  class="btn btn-default">Close  </button>
			</a>
		</footer>
	</section>  
	<?php echo form_close(); ?>
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
var d = document.getElementById("timetables");
d.className += " nav-active";  
var n = document.getElementById("nav1");
n.className += " nav-expanded nav-active"; 

 

$(document).ready(function(){
	 var week = ['mon','tue','wed','thu','fri','sat','sun']; 
   	 console.log(week.length);
	$('#nxt_mon').hide();    
	$('#nxt_tue').hide();     
	$('#nxt_wed').hide();     
	$('#nxt_thu').hide();     
	$('#nxt_fri').hide();     
	$('#nxt_sat').hide();     
	$('#nxt_sun').hide();  
	$('#next').click(function(){   
		if($('#mon').val()>0){      $('#nxt_mon').show();   }
		if($('#tue').val()>0){ 		$('#nxt_tue').show();   }
		if($('#wed').val()>0){ 		$('#nxt_wed').show();   }
		if($('#thu').val()>0){ 		$('#nxt_thu').show();   }
		if($('#fri').val()>0){ 		$('#nxt_fri').show();   }
		if($('#sat').val()>0){ 		$('#nxt_sat').show();   }  
		if($('#sun').val()>0){ 		$('#nxt_sun').show();   }       
		$('#footer').show();  
		var subject = $('#subj').val();    
    	var strArray = subject.split(",");  
    	var opt = '';
        for(var j = 0; j < strArray.length; j++){  
       		 opt +=  "<option>"+strArray[j]+"</option>";  
        }
        for(var i = 0; i < week.length; i++){   
      		var mon =   $('#'+week[i]).val();  
    		var next_div ='<input type="hidden"  name="lecture[]" value="'+mon+'">'; 
    	    for(var k = 1; k <= mon; k++){  
        		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+k+':</label> ';
        		next_div +='<div class="col-sm-2">';
        		next_div +='<select name="subject_'+week[i]+'[]" id="subject_'+week[i]+'_'+k+'" class="form-control"> '+opt+'</select>';
        		next_div +='</div>';
        		next_div +='<div class="col-sm-2">';
        		next_div +='<input type="Time" name="start_time_'+week[i]+'[]" id="tm" class="form-control">';
        		next_div +='</div>';
        		next_div +='<div class="col-sm-2">';
        		next_div +='<input type="Time" name="end_time_'+week[i]+'[]" id="tm" class="form-control">';
        		next_div +='</div>';
        		next_div +='<div class="col-sm-2">';
        		next_div +='<select name="teacher_'+week[i]+'[]" id="teacher" class="form-control"> <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
        		next_div +='</div>'; 
    	    } 
    	    $('#next_div_'+week[i]).html(next_div); 
        }
        
		

// 		var tue =   $('#tue').val();  
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+tue+'">'; 
// 	    for(var i = 1; i <= tue; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_tue[]" id="subject_tue_'+i+'" class="form-control"> '+opt+' </select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_tue[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_tue[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
    //		next_div +='<select name="teacher_tue[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_tue').html(next_div);

// 		var wed =   $('#wed').val(); 
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+wed+'">'; 
// 	    for(var i = 1; i <= wed; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_wed[]" id="subject_wed_'+i+'" class="form-control"> '+opt+' </select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_wed[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_wed[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
    //		next_div +='<select name="teacher_wed[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_wed').html(next_div);

// 		var thu =   $('#thu').val();  
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+thu+'">'; 
// 	    for(var i = 1; i <= thu; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_thu[]" id="subject_thu_'+i+'" class="form-control">  '+opt+'</select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_thu[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_thu[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
    	//	next_div +='<select name="teacher_thu[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_thu').html(next_div);

// 		var fri =   $('#fri').val();  
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+fri+'">'; 
// 	    for(var i = 1; i <= fri; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_fri[]" id="subject_fri_'+i+'" class="form-control"> '+opt+' </select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_fri[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_fri[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
    	//	next_div +='<select name="teacher_fri[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_fri').html(next_div);

// 		var sat =   $('#sat').val();  
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+sat+'">'; 
// 	    for(var i = 1; i <= sat; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_sat[]" id="subject_sat_'+i+'" class="form-control">  '+opt+'</select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_sat[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_sat[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
    	//	next_div +='<select name="teacher_sat[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_sat').html(next_div);

// 		var sun =   $('#sun').val();  
// 		var next_div ='<input type="hidden"  name="lecture[]" value="'+sun+'">'; 
// 	    for(var i = 1; i <= sun; i++){  
//     		next_div +='<label class="col-sm-4 control-label text-sm-right pt-2">Lecture '+i+':</label> ';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<select name="subject_sun[]" id="subject_sun_'+i+'" class="form-control">  '+opt+'</select>';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="start_time_sun[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
//     		next_div +='<input type="Time" name="end_time_sun[]" id="tm" class="form-control">';
//     		next_div +='</div>';
//     		next_div +='<div class="col-sm-2">';
   // 		next_div +='<select name="teacher_sun[]" id="teacher" class="form-control">  <?php foreach ($teachers_show as $row) { ?><option value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?> </option> <?php  }?> </select>';
//     		next_div +='</div>'; 
// 	    }
// 	    $('#next_div_sun').html(next_div);
    
	});

 
    $('#add_new').attr("disabled", true);
    $('#save').attr("disabled", false);
     
    $('#add_new').click(function(){  
    	$('#add_new').attr("disabled", true);
    	$('#save').attr("disabled", false);  
     	$('#dt').val(''); 
        $('#tm').val(''); 
        $('#sel_sub').val(''); 
        
        $('#error_m').html('');
    	 $('#success_m').html('');
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
    	                   	$('#subj').val(object['subject']);  
    	               }) 
    			 } 
    		 }); 
    });

});



</script>
  			