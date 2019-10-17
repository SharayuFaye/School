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
				<li><span>Timetable Edit&nbsp;</span></li> 
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
		
				<h2 class="card-title">Timetable Edit</h2>
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
	
<?php if(isset($timetables_show[0])){ $timetable = json_decode($timetables_show[0]->details, True) ; }  ?>		
	 <?php $this->load->helper('form');?>
	 <?php echo form_open_multipart('Welcome/timetables');?>  
	 
 <input type="hidden" name="id" id="id" value="<?php echo $timetables_show[0]->id ; ?>">
			
		<div class="card-body" style="padding-left: 0%;padding-right: 13%;"> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Class:</label>
				<div class="col-sm-8">
					<select name="class" id="sel_class" class="form-control" required >
						<option></option>
						<?php foreach ($class_show as $row) { ?>
							<option <?php if($timetables_show[0]->class == $row->id){  echo "selected" ; }?>   value="<?php echo $row->id;?>"> <?php echo $row->class;?> </option> 
						<?php  }?> 
					</select>
				</div>
			</div> 
			<div class="form-group row">
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span>Sections:</label>
				<div class="col-sm-8">
					<select name="section" id="sel_section" class="form-control" required >
						<?php foreach ($sections_show as $row) { ?>
						 <option <?php if($timetables_show[0]->sections_id == $row->id){  echo "selected" ; }?>   value="<?php echo $row->id;?>"> <?php echo $row->sections;?> </option> 
						<?php  }?> 
					 </select>
				</div>
			</div> 
			<input type="hidden" name="subject" id="subj" value="<?php echo $timetables_show[0]->subject ; ?>">
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
				<label class="col-sm-4 control-label text-sm-right pt-2"><span class="req" >*</span> No. Of Lectures:</label>
				<div class="col-sm-1"> <input type="number" min="0" name="mon" id="mon" class="form-control" value="<?php echo $timetable['mon'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="tue" id="tue" class="form-control" value="<?php echo $timetable['tue'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="wed" id="wed" class="form-control" value="<?php echo $timetable['wed'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="thu" id="thu" class="form-control" value="<?php echo $timetable['thu'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="fri" id="fri" class="form-control" value="<?php echo $timetable['fri'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="sat" id="sat" class="form-control" value="<?php echo $timetable['sat'];?>" readonly> </div>
				<div class="col-sm-1"> <input type="number" min="0" name="sun" id="sun" class="form-control" value="<?php echo $timetable['sun'];?>" readonly> </div> 
			 </div>
<!-- 			 <div class="text-right"> -->
<!--     			 <input class="btn btn-primary" type="button" id="next"  value="Next">   -->
<!-- 			</div>  -->
			
			
		   <?php  
		   $week_day =array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
		   $week =array('mon','tue','wed','thu','fri','sat','sun');
		  
for($i=0;$i<7;$i++){
    if( isset($timetable['subject_'.$week[$i]] )){  
        $sub = explode(',',$timetable['subject']); 
        
?>
			 <div class="form-group row" id="nxt_mon">
    			<label class="col-sm-4 control-label text-sm-right pt-2" style="font-weight: bold"> <?php echo ucfirst($week_day[$i]);?></label>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" >  	Subject </label></div>
    			<div class="col-sm-2"> <label class=" control-label text-sm-right pt-2" > Start Time </label>	</div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > End Time </label></div>
    			<div class="col-sm-2"><label class=" control-label text-sm-right pt-2" > Teacher </label></div>
			</div> 
			<input type="hidden" name="day[]" value="<?php echo $week_day[$i]?>">
		   <div class="form-group row" id="next_div_<?php echo $week[$i];?>"> 
		   			 <input type="hidden"  name="lecture[]" value="<?php echo $timetable['mon'] ;?>"> 
                    <?php for($k = 0; $k <  $timetable[$week[$i]]; $k++){  
                         ?>
                    	<label class="col-sm-4 control-label text-sm-right pt-2">Lecture <?php echo $k+1 ; ?>:</label> 
                    	<div class="col-sm-2">
                    	<select name="subject_<?php echo $week[$i];?>[]" id="subject_<?php echo $week[$i];?>_<?php echo $k ; ?>" class="form-control">
                    	<?php 
                    	foreach($sub as $subj){ 
                    	    $opt  = "<option ";
                    	    if( $timetable['subject_'.$week[$i]][$k] ==$subj  ){  $s =  "selected"; }else { $s=''; }
                    	    $opt  .= $s." >".$subj."</option>";
                            echo $opt;
                        }?>
                            </select> 
                    	</div>
                    	<div class="col-sm-2">
                    	<input type="Time" name="start_time_<?php echo $week[$i];?>[]" id="tm" value="<?php echo $timetable['start_time_'.$week[$i]][$k] ; ?>" class="form-control">
                    	</div>
                    	<div class="col-sm-2">
                    	<input type="Time" name="end_time_<?php echo $week[$i];?>[]" id="tm" value="<?php echo $timetable['end_time_'.$week[$i]][$k] ; ?>"  class="form-control">
                    	</div>
                    	<div class="col-sm-2">
                    	<select name="teacher_<?php echo $week[$i];?>[]" id="teacher" class="form-control">
                        	 <?php foreach ($teachers_show as $row) { ?>
                            	 <option <?php if($timetable['teacher_'.$week[$i]][$k] == $row->id){ echo "selected"; }?> value="<?php echo $row->id;?>"> <?php echo $row->teacher_name;?></option> 
                        	 <?php  }?> 
                    	 </select>
                    	</div> 
                   <?php } ?>  
		    </div> 
 <?php  }
}?>
			 
	    </div>
		<footer class="card-footer text-right" id="footer"> 
		<span style="margin-left:10px;color:green;" id="success_m"></span>
		<span style="margin-left:10px;color:red" id="error_m"></span> 
			<input class="btn btn-primary" type="submit" name="edit_timetables" value="Save">  
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
    		 url: "<?php echo base_url(); ?>index.php/timetable_sections_fetch", 
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
    		 url: "<?php echo base_url(); ?>index.php/timetable_sections_fetch", 
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
  			