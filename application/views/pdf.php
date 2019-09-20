	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables/media/css/dataTables.bootstrap4.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>vendor/modernizr/modernizr.js"></script>


<section class="card">
						<div class="card-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-3">
											<h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">Invoice</h2>
											<h4 class="h4 m-0 text-dark font-weight-bold" ></h4>
										</div>
										<div class="col-sm-6 text-right mt-3 mb-3">
											<address class="ib mr-5">
												
											<div class="ib">
												<img src="logo/<?php echo $school[0]->school_logo;?>" width="90" alt="OKLER Themes" />
											</div>
												<br/>
												<?php echo $school[0]->school_address;?>
												<br/>
												Ph: <?php echo $school[0]->school_mobile;?> , 
												<?php echo $school[0]->school_mobile2;?>
												<br/>
												<?php echo $school[0]->school_mail;?>
											</address>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
											   
												<p class="h5 mb-1 text-dark font-weight-semibold">To,</p>
												<address>
													<?php echo $students[0]->parent_name;?>
													<br/>
													(<?php echo $students[0]->student_name;?>)
													<br/>
													Ph:
													<?php echo $students[0]->parent_mob;?>
													<br/>
													<?php echo $students[0]->username;?>
												</address>
												
												 <p class="mb-0">
													<span class="text-dark">Invoice Date:</span>
													<span class="value"><?php echo $getinfo[0]->created_date;?></span>
												</p>
												<p class="mb-0">
													<span class="text-dark">Due Date:</span>
													<span class="value"><?php echo $getinfo[0]->date;?></span>
												</p>
												
											</div>
										</div> 
									</div>
								</div> 
								<table class="table table-responsive-md invoice-items">
									<thead>
										<tr class="text-dark">
											<th id="cell-id"     class="font-weight-semibold">#</th>
											<th id="cell-item"   class="font-weight-semibold">Item</th> 
											<th id="cell-price"  class="text-center font-weight-semibold">Annual</th>
											<th id="cell-qty"    class="text-center font-weight-semibold">Paid</th> 
										</tr>
									</thead>
									<tbody>
										<tr > 
											<td class="font-weight-semibold text-dark">1</td>
											<td class="font-weight-semibold text-dark">Fees</td> 
											<td class="text-center font-weight-semibold text-dark"><?php echo $getinfo[0]->annual_fees;?></td>
											<td class="text-center font-weight-semibold text-dark"><?php echo $getinfo[0]->fees_paid;?></td> 
										</tr> 
										
										<tr> 
											<td class="font-weight-semibold text-dark">In Words:</td>
											<td class="font-weight-semibold text-dark"><?php echo   $this->numbertowords->convert_number($getinfo[0]->fees_paid);  ?> Only</td> 
											<td class="text-center">Remaining</td>
											<td class="text-center"><?php   $r = $getinfo[0]->annual_fees-$getinfo[0]->fees_paid;
														echo $r;?></td> 
										</tr>
										<tr> 
											<td colspan="3"></td> 
											<td colspan="1"><?php echo $school[0]->school_name; ?></td>  
										</tr> 
										<tr> 
											<td colspan="3"></td> 
											<td colspan="1">&nbsp;</td>  
										</tr> 
										<tr> 
											<td colspan="3"></td> 
											<td colspan="1">Authorized Signature</td>  
										</tr> 
									</tbody>
								</table>
							 
							</div>

							<div class="text-right mr-4">
								 
							</div>
						</div>
					</section>