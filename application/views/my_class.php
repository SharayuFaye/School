<?php include('include/header.php');?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>My Class</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>My Class &nbsp;</span></li> 
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
		
				<h2 class="card-title">My Class</h2>
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
							

				<table class="table table-responsive-md table-striped  table-bordered  mb-0" >
					<thead>
						<tr> 
    						<?php   $week =array('mon','tue','wed','thu','fri','sat','sun');
                            for($i=0;$i<7;$i++){  ?>
    							<th><?php echo ucfirst($week[$i]);?></th>  
    						<?php }?>  
						</tr>
					</thead>
 					<tbody>  
 
<?php   ?>
    
    <?php foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    for($j=0;$j< max($timetable['lecture']);$j++){
    }
    }
    if(isset($timetables)){
    for($j=0;$j<= max($timetable['lecture']);$j++){
     ?>
    <tr > 	 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_mon'][$j]) &&  $timetable['subject_mon'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_mon'][$j] == $subject->subject ){
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_mon'][$j] ;  echo "<br>";
            echo "Time :";  ?>
             <?php if(isset($timetable['start_time_mon'][$j]) &&  $timetable['start_time_mon'][$j]!=''){  echo $timetable['start_time_mon'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_mon'][$j]) &&  $timetable['end_time_mon'][$j]!=''){ echo $timetable['end_time_mon'][$j] ;  }  }
        }   }  } }  ?>
        </th> 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_tue'][$j]) &&  $timetable['subject_tue'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_tue'][$j] == $subject->subject ){ 
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_tue'][$j] ;  echo "<br>";
            echo "Time :";  ?>
            <?php if(isset($timetable['start_time_tue'][$j]) &&  $timetable['start_time_tue'][$j]!=''){    echo $timetable['start_time_tue'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_tue'][$j]) &&  $timetable['end_time_tue'][$j]!=''){ echo $timetable['end_time_tue'][$j] ;  }   }
        }   }  } }  ?>
        </th>  	  
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_wed'][$j]) &&  $timetable['subject_wed'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_wed'][$j] == $subject->subject ){
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_wed'][$j] ;  echo "<br>";
            echo "Time :";  ?>
             <?php if(isset($timetable['start_time_wed'][$j]) &&  $timetable['start_time_wed'][$j]!=''){    echo $timetable['start_time_wed'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_wed'][$j]) &&  $timetable['end_time_wed'][$j]!=''){ echo $timetable['end_time_wed'][$j] ;  }   }
        }   }  } }  ?>
        </th> 	 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_thu'][$j]) &&  $timetable['subject_thu'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_thu'][$j] == $subject->subject ){ 
                echo "Class :";echo  $timetables->class; echo "<br>";
                echo "Sec :"; echo $timetables->sections ;echo "<br>";
                echo "Sub :";echo $timetable['subject_thu'][$j] ;  echo "<br>";
                echo "Time :";  ?> 
                <?php if(isset($timetable['start_time_thu'][$j]) &&  $timetable['start_time_thu'][$j]!=''){  echo $timetable['start_time_thu'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_thu'][$j]) &&  $timetable['end_time_thu'][$j]!=''){ echo $timetable['end_time_thu'][$j] ;  }   }
        }   }  } }  ?>
        </th> 	 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_fri'][$j]) &&  $timetable['subject_fri'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_fri'][$j] == $subject->subject ){
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_fri'][$j] ;  echo "<br>";
            echo "Time :";  ?> 
            <?php if(isset($timetable['start_time_fri'][$j]) &&  $timetable['start_time_fri'][$j]!=''){    echo $timetable['start_time_fri'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_fri'][$j]) &&  $timetable['end_time_fri'][$j]!=''){ echo $timetable['end_time_fri'][$j] ;  }   }
        }   }  } }  ?>
        </th> 	 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_sat'][$j]) &&  $timetable['subject_sat'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_sat'][$j] == $subject->subject ){
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_sat'][$j] ;  echo "<br>";
            echo "Time :";  ?> 
             <?php if(isset($timetable['start_time_sat'][$j]) &&  $timetable['start_time_sat'][$j]!=''){     echo $timetable['start_time_sat'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_sat'][$j]) &&  $timetable['end_time_sat'][$j]!=''){ echo $timetable['end_time_sat'][$j] ;  }  }
        }   }  } }  ?>
        </th> 	 
    	<th>
        	<?php  
        	foreach($timetables_show as $timetables){
    $timetable = json_decode($timetables->details, True) ;
    if(isset($timetable['subject_sun'][$j]) &&  $timetable['subject_sun'][$j]!=''){   
    foreach($subject_allocation as $subject){ 
        if($timetable['subject_sun'][$j] == $subject->subject ){
            echo "Class :";echo  $timetables->class; echo "<br>";
            echo "Sec :"; echo $timetables->sections ;echo "<br>";
            echo "Sub :";echo $timetable['subject_sun'][$j] ;  echo "<br>";
            echo "Time :";  ?> 
	<?php if(isset($timetable['start_time_sun'][$j]) &&  $timetable['start_time_sun'][$j]!=''){    echo $timetable['start_time_sun'][$j] ; ?> 
    - <?php  if(isset($timetable['end_time_sun'][$j]) &&  $timetable['end_time_sun'][$j]!=''){ echo $timetable['end_time_sun'][$j] ;  }   }
        }   }  } } 
    }?>
        </th> 	   	
    </tr>  
    <?php }?>
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
var d = document.getElementById("my_class");
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
	 <?php echo form_open_multipart('Welcome/my_class');?>  
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right: 75%;">Delete My Class</h3>
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
						<input type="hidden" id="Timetable_name" name="My Class" class="form-control">
                    </div>
				 </div>
				</div>
		    </div>
			<footer class="card-footer text-right">
				<input class="btn btn-primary" type="submit"  name="del_timetables" value="Delete">
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