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
				<li><span>Timetable &nbsp;</span></li> 
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
							
				 
 <?php $this->load->helper('form');?>
 <?php echo form_open_multipart('Welcome/timetables');?>  
 		<div class="row">
			<div class="col-sm-4">
				<div class="mb-3">
					<a href="<?php echo base_url(); ?>index.php/timetables_add">
					<button id="addToTable" type="button"  class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
					</a>
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
						<?php    foreach ($sections_show  as $row) {  if($class == $row->class_id){  ?>
    						<option <?php if($section1 == $row->id){ echo "selected"; }  ?>  value="<?php echo $row->id;?>" >
    							<?php echo $row->sections;?> 
     						</option>  
						<?php }   } ?> 
					</select>
				</div>
			</div>
			<div class="col-sm-4" style="float: left">	
				<div class="mb-4" >
					<input class="btn btn-primary" type="submit"  name="Search" value="Show"> 
					<input class="btn btn-primary" id="clear" type="submit"  name="Clear All" value="Clear All">
					
					<a href="<?php echo base_url(); ?>index.php/timetables_edit?section=<?php echo $section1 ; ?>&class=<?php echo $class ; ?>">
						<button  type="button"  class="btn btn-primary" <?php if(isset($timetables_show[0])){ ?> enabled="true" <?php  } else { ?> disabled="true" <?php } ?> >Edit </button>
					</a> 
					<button  onclick="del(<?php if(isset($timetables_show[0])){  echo $timetables_show[0]->id; } ?>)" class="btn btn-primary" type="button" <?php if(isset($timetables_show[0])){ ?> enabled="true" <?php  } else { ?> disabled="true" <?php } ?>   name="Delete" value="Delete">Delete</button>
					 
				</div>
			</div>
		</div> 
<?php echo form_close(); ?>  
<?php if(isset($timetables_show[0])){ $timetable = json_decode($timetables_show[0]->details, True) ;  
$week =array('mon','tue','wed','thu','fri','sat','sun');
 ?> 
 Class : <?php echo $timetable['class'] ; ?> <br>Section : <?php echo $section1 ; ?> 
				<table class="table table-responsive-md table-striped  table-bordered  mb-0" >
					<thead>
						<tr>
							<th>Day</th>
    						<?php for($i=1;$i<= max($timetable['lecture']);$i++){  ?>
    							<th>Period <?php echo $i;?></th>  
    						<?php }?>  
						</tr>
					</thead>
 					<tbody>    
					<?php  for($i=0;$i<7;$i++){
					      $sub='subject_'.$week[$i];
					      $start ='start_time_'.$week[$i];
					      $end ='end_time_'.$week[$i]; ?>
 					<tr >  
						<th><?php echo ucfirst($week[$i]);?></th>  
						<?php for($j=0;$j< max($timetable['lecture']);$j++){  ?>
                      <th>
                    	<?php if(isset($timetable[$sub][$j]) &&  $timetable[$sub][$j]!=''){ echo $timetable[$sub][$j] ; }?>
                    	<br><?php if(isset($timetable[$start][$j]) &&  $timetable[$start][$j]!=''){ ?>(<?php  echo $timetable[$start][$j] ; ?> 
                    	- <?php  if(isset($timetable[$end][$j]) &&  $timetable[$end][$j]!=''){ echo $timetable[$end][$j] ;  } ?>)<?php } ?>
                    </th>  
                  	  <?php }?>  
                   
     				</tr> 	    
					<?php }?>  
     				</tbody>	
				</table>
				<?php } else { echo $msg; }?>
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
	 <?php echo form_open_multipart('Welcome/timetables');?>  
	<div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h3 class="modal-title" style="margin-right: 75%;">Delete Timetable</h3>
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
						<input type="hidden" id="Timetable_name" name="Timetable" class="form-control">
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