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
	
			<h2 class="card-title">Student Attendance : <?php echo $student_name  ; ?> </h2>
		</header>
		<div class="card-body">
		
 <?php $this->load->helper('form');?>
 <?php echo form_open_multipart('Welcome/student_attendance');?>  
			<div class="row"> 
 <input type="hidden" name="student_id" value="<?php echo $student_id  ; ?>" >
 <input type="hidden" name="student_name" value="<?php echo $student_name  ; ?>" >
				<div class="col-sm-8">
					<div class="mb-3">
						<div class="col-sm-4"  style="float: left;">
						 	<input type="month"  class="form-control " name="date" max="<?php echo date('Y-m');?>" value="<?php echo $date  ; ?>">
						</div> 
						<div class="col-sm-4"  style="float: left;">
						 	<input class="btn btn-primary" type="submit"  name="Search" value="Show">  
						</div>
						
					</div>
				</div>
				
			</div>
<?php echo form_close();  ?> 
<style>
/* calendar */
table.calendar		{ width: 100%;border-left:1px solid #999; }
tr.calendar-row	{  }
td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:30px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }

.box{
	width:20px;
	height:20px;
}
 
.red{
	background:#ff0000;
}
.green{
	background:#008000;
}

</style>
<?php
function build_html_calendar($year, $month, $events = null,$attendances_student_show,$leaves_student_show) {
   // print_r($attendances_student_show);
    // CSS classes
    $css_cal = 'calendar';
    $css_cal_row = 'calendar-row';
    $css_cal_day_head = 'calendar-day-head';
    $css_cal_day = 'calendar-day';
    $css_cal_day_number = 'day-number';
    $css_cal_day_blank = 'calendar-day-np';
    $css_cal_day_event = 'calendar-day-event';
    $css_cal_event = 'calendar-event';
    
    // Table headings
    $headings = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
    
    // Start: draw table
    $calendar =
    "<table cellpadding='0' cellspacing='0' class='{$css_cal}'>" .
    "<tr class='{$css_cal_row}'>" .
    "<td class='{$css_cal_day_head}'>" .
    implode("</td><td class='{$css_cal_day_head}'>", $headings) .
    "</td>" .
    "</tr>";
    
    // Days and weeks
    $running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    
    // Row for week one
    $calendar .= "<tr class='{$css_cal_row}'>";
    
    // Print "blank" days until the first of the current week
    for ($x = 1; $x < $running_day; $x++) {
        $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
    }
    
    // Keep going with days...
    for ($day = 1; $day <= $days_in_month; $day++) {
        
        // Check if there is an event today
        $cur_date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
        $draw_event = false;
        if (isset($events) && isset($events[$cur_date])) {
            $draw_event = true;
        }
        
        // Day cell
        $calendar .= $draw_event ?
        "<td class='{$css_cal_day} {$css_cal_day_event}'>" :
        "<td class='{$css_cal_day}'>";
        
        // Add the day number
        $calendar .= "<div class='{$css_cal_day_number}' ";
        if($day <10){
            $day1 = '0'.$day ;
        }else{
            $day1 =  $day ;
        }
        foreach($attendances_student_show as $attendance){ 
            
            $dt = $year.'-'.$month.'-'.$day1 .' 00:00:00' ;
            if($attendance->date == $dt && $attendance->attendance == 'present') {
                $calendar .=" style='background-color: green;' ";
            }
            if($attendance->date == $dt && $attendance->attendance == 'absent') {
                $calendar .=" style='background-color: red;' ";
            }
        }
        
        //print_r($leaves_student_show);exit();
        if(isset($leaves_student_show[0])){
        foreach($leaves_student_show as $leaves){
            
             $dt = $year.'-'.$month.'-'.$day1 ;
            if($leaves->start_date <= $dt && $leaves->end_date >= $dt) {
                $calendar .=" style='background-color: #276560;' ";
            }
        } 
        }
        $calendar .=">" . $day . "</div>";
        
        // Insert an event for this day
        if ($draw_event) {
            $calendar .=
            "<div class='{$css_cal_event}'>" .
            "<a href='{$events[$cur_date]['href']}'>" .
            $events[$cur_date]['text'] .
            "</a>" .
            "</div>";
        }
        
        // Close day cell
        $calendar .= "</td>";
        
        // New row
        if ($running_day == 7) {
            $calendar .= "</tr>";
            if (($day + 1) <= $days_in_month) {
                $calendar .= "<tr class='{$css_cal_row}'>";
            }
            $running_day = 1;
        }
        
        // Increment the running day
        else {
            $running_day++;
        }
        
    } // for $day
    
    // Finish the rest of the days in the week
    if ($running_day != 1) {
        for ($x = $running_day; $x <= 7; $x++) {
            $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
        }
    }
    
    // Final row
    $calendar .= "</tr>";
    
    // End the table
    $calendar .= '</table>';
    
    // All done, return result
    return $calendar;
}
?> 

<?php
$events = [ 
];  
if($date !='' && isset($attendances_student_show)){
$date = DateTime::createFromFormat("Y-m", $date);
  
$year = $date->format("Y");
$month = $date->format("m");
echo "<br>";
echo build_html_calendar($year, $month, $events,$attendances_student_show,$leaves_student_show);
}
?> 
 <br>
 
 <div style="margin-left: 74%;">
<div  style="float: left"> <div class="box green" style="float: left" ></div>  &nbsp; Present &nbsp; &nbsp;</div>  
<div  style="float: left"> <div class="box red" style="float: left" ></div>   &nbsp; Absent &nbsp;  &nbsp; </div> 
<div  style="float: left"> <div class="box" style="float: left ;background: #276560" ></div>   &nbsp; Leaves</div>
 </div>
<!-- 			 			<div class="col-sm-4"> -->
<!-- 					<div class="mb-3"> -->
<!-- 						<a href="attendances"><button id="addToTable"  class="btn btn-primary"> <i class="fa fa-arrow-left "></i> Back</button></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 		</div> -->

	</section>
					<!-- end: page -->
				</section>
			<?php include('include/footer.php');?>			
 
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
 
 
 <script>

 var d = document.getElementById("attendances");
 d.className += " nav-active";  
 var n = document.getElementById("nav1");
 n.className += " nav-expanded nav-active"; 
  </script>