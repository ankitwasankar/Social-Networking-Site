	<!-- padding  -->

	<div class="padding">
		<div class="full col-sm-9">
			<!-- main col right -->
			<!-- main col left --> 
                         <div class="col-sm-3">
                          
							<div class="row ">
								<div class="thumbnail">
									<img src="<?php echo base_url().'assets/sns_img/0'; ?>" />
									<div class="caption">
										<h4>Ankit Wasankar</h4>
										<?php if($isFriend=="true"){ ?>
										<a onclick="load_data_ajax_unfriend(<?php echo $object->user_id ;?>)" class="btn btn-danger"><div>Unfriend?</div></a>
										<?php } ?>
										<?php if($isFriend=="false"){ ?>
										<a onclick="load_data_ajax_connect(<?php echo $object->user_id ;?>)" class="btn btn-success"><div>Connect?</div></a>
										<?php } ?>
										<?php if($isFriend=="pending"){ ?>
										<a onclick="load_data_ajax_unfriend(<?php echo $object->user_id ;?>)" class="btn btn-danger"><div>Pending. Cancel?</div></a>
										<?php } ?>
										
										<div id="jqueryResult">
											
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-heading"> <h4>Details</h4></div>
									<div class="panel-body">
										<p>
											<div><b> Friends: </b><?php echo "400" ;?> </div>
											<div><b> Groups: </b><?php echo "20" ;?> </div>
											<div><b>Joined on : </b><?php echo "12th-Jan-2015" ;?> </div>
										</p>
									</div>
								</div>
							</div>

                          </div>
						

							<!-- main col right -->
							<div class="col-sm-7">
								<!-- Basic information block -->
								<div class="panel panel-default">
									<div class="panel-heading"> <h4>Basic information</h4></div>
									<div class="panel-body">
										<form action="" method="" class="form-horizontal">
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Name</label>
												<div class="col-sm-8">
													<a class="align_vertical"><?php echo $object->first_name." "; ?>
													<?php echo $object->last_name; ?></a>
												</div>
											</div>

											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Mobile number</label>
												<div class="col-sm-8">
													<a><?php echo $object->mobile_number; ?></a>
												</div>
											</div>
											
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Email address</label>
												<div class="col-sm-8">
													<a><?php echo $object->user_email; ?></a>
												</div>
											</div>
											<div class="form-group">
												<label for="gender" class="col-sm-4 control-label">Gender</label>
												<div class="col-sm-8">
													<a><?php echo $object->gender; ?></a>
												</div>
											</div>
											
										</form>	
									</div>
								</div><!-- /Basic information block -->
								
								
								<div class="panel panel-default">
									<div class="panel-heading"> <h4>Educational details</h4></div>
									<div class="panel-body">
										<form action="" method="" class="form-horizontal">
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Degree</label>
												<div class="col-sm-8">
													Govt. college of engineering
												</div>
											</div>

											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">University</label>
												<div class="col-sm-8">
													B.Tech
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">City</label>
												<div class="col-sm-8">
													Pune
												</div>
											</div>
											
										</form>	
									</div>
								</div><!-- /Basic information block -->
			</div><!-- /main col right -->
		</div>
	</div><!-- /padding  -->
	

