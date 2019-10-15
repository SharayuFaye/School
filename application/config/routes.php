<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['welcome_message'] = 'welcome/welcome_message';
$route['dashboard'] = 'welcome/dashboard';
$route['logout_admin'] = 'welcome/logout_admin';


$route['roles'] = 'welcome/roles'; 
$route['students'] = 'welcome/students';
$route['drivers'] = 'welcome/drivers';
$route['class'] = 'welcome/class';
$route['school'] = 'welcome/school';
$route['school_admin'] = 'welcome/school_admin';
$route['backgrounds'] = 'welcome/backgrounds';
$route['home_page_menu'] = 'welcome/home_page_menu';
$route['teachers'] = 'welcome/teachers';
$route['sections'] = 'welcome/sections';
$route['bus'] = 'welcome/bus';
$route['route'] = 'welcome/route';
$route['exam_type'] = 'welcome/exam_type';
$route['sel_route'] = 'welcome/sel_route';

$route['subject_allocation'] = 'welcome/subject_allocation';

$route['fees'] = 'welcome/fees'; 
$route['exams'] = 'welcome/exams';
$route['marks'] = 'welcome/marks';
$route['practices'] = 'welcome/practices'; 
$route['notifications'] = 'welcome/notifications';
$route['attendances'] = 'welcome/attendances';
$route['class_attendance'] = 'welcome/class_attendance';
$route['student_attendance'] = 'welcome/student_attendance';
$route['timetables'] = 'welcome/timetables';
$route['homework'] = 'welcome/homework';
$route['activity'] = 'welcome/activity';
$route['faq'] = 'welcome/faq'; 
$route['transportation'] = 'welcome/transportation';
$route['leaves'] = 'welcome/leaves';
$route['approve'] = 'welcome/approve';
$route['my_class'] = 'welcome/my_class';


$route['sections_fetch'] = 'welcome/sections_fetch';
$route['class_fetch'] = 'welcome/class_fetch';
$route['transportation_fetch'] = 'welcome/transportation_fetch';
$route['students_fetch'] = 'welcome/students_fetch';
$route['students_sel_fetch'] = 'welcome/students_sel_fetch';
$route['parents_fetch'] = 'welcome/parents_fetch';
$route['subject_fetch'] = 'welcome/subject_fetch';
$route['subject_stud_fetch'] = 'welcome/subject_stud_fetch';
$route['students_roll_fetch'] = 'welcome/students_roll_fetch';
$route['students_byroll_fetch'] = 'welcome/students_byroll_fetch';
$route['students_byroll_fetch_edit'] = 'welcome/students_byroll_fetch_edit';
$route['subject_section_fetch'] = 'welcome/subject_section_fetch';
$route['timetable_sections_fetch'] = 'welcome/timetable_sections_fetch';


$route['fees_add'] = 'welcome/fees_add';
$route['exams_add'] = 'welcome/exams_add'; 
$route['practices_add'] = 'welcome/practices_add';
$route['timetables_add'] = 'welcome/timetables_add';
$route['timetables_edit'] = 'welcome/timetables_edit';
$route['homework_add'] = 'welcome/homework_add';
$route['activity_add'] = 'welcome/activity_add';
$route['marks_add'] = 'welcome/marks_add';



$route['route_map'] = 'welcome/route_map';
$route['driver_map'] = 'welcome/driver_map';
$route['bus_route_show'] = 'welcome/bus_route_show';


//App Routes-----------------------
$route['login'] = 'api/login';
$route['set_gcm'] = 'api/set_gcm';
$route['app_dashboard'] = 'api/app_dashboard';
$route['app_notification'] = 'api/app_notification';
$route['app_fees_history'] = 'api/app_fees_history';
$route['app_attendance'] = 'api/app_attendance';
$route['app_exams'] = 'api/app_exams';
$route['app_marks'] = 'api/app_marks';
$route['app_sel_marks'] = 'api/app_sel_marks';
$route['app_practise'] = 'api/app_practise';
$route['app_exam_practise'] = 'api/app_exam_practise';
$route['app_timetable'] = 'api/app_timetable';
$route['app_homework'] = 'api/app_homework';
$route['app_month_activity'] = 'api/app_month_activity';
$route['app_faq'] = 'api/app_faq';
$route['password'] = 'api/password';
$route['forget'] = 'api/forget';
$route['logout'] = 'api/logout';
$route['app_dashboard_teacher'] = 'api/app_dashboard_teacher';
$route['app_attendance_teacher'] = 'api/app_attendance_teacher';
$route['app_activity_week'] = 'api/app_activity_week';
$route['download_practice'] = 'api/download_practice';
$route['app_class'] = 'api/app_class';
$route['app_add_attendance'] = 'api/app_add_attendance';
$route['app_attendance_add'] = 'api/app_attendance_add';
$route['app_attendance_show'] = 'api/app_attendance_show';
$route['app_dashboard_drivers'] = 'api/app_dashboard_drivers';
 

//EMAIL ROUTES----------------------
$route['send_otp'] = 'email/send_otp';






