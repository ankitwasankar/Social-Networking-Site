				
					<!-- padding  -->
					<div class="padding">
						<div class="full col-sm-12">
						
						
						
						<!-- main col left --> 
                         <div class="col-sm-3">
                          
							<div class="row ">
								<div class="thumbnail">
									<img src="<?php echo base_url().'assets/sns_img/0'; ?>" />
									<div class="caption">
										<h4>Ankit Wasankar</h4>
										<p>gender: unavailable</p>
										
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
												<label for="name" class="col-sm-4 control-label">First name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" value= "<?php echo $object->first_name; ?>" placeholder="Enter Name..."/>
												</div>
											</div>

											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Last name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" value= "<?php echo $object->last_name; ?>" placeholder="Enter Name..."/>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">Mobile number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" value= "<?php echo $object->mobile_number; ?>" placeholder="Mobile number"/>
												</div>
											</div>
											<div class="form-group">
												<label for="gender" class="col-sm-4 control-label">Gender</label>
												<div class="col-sm-8">
													<label class="radio-inline">
														<input type="radio" <?php if($object->gender=="male") echo "checked"; ?> name="genderRadio" value="option1" /> Male
													</label>
													<label class="radio-inline">
														<input type="radio" <?php if($object->gender=="male") echo "checked"; ?> name="genderRadio" value="option2" /> Female
													</label>
													<label class="radio-inline">
														<input type="radio" <?php if($object->gender!="male" or $object->gender!="female") echo "checked"; ?> name="genderRadio" value="option2" /> Unknown
													</label>
												</div>
											</div>
											
											 <div class="form-group">
												<div class="col-md-offset-9 col-sm-6">
													<input type="submit" class="btn btn-primary" value="update">
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
													<input type="text" class="form-control" placeholder="Enter Name..."/>
												</div>
											</div>

											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">University</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Name..."/>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="col-sm-4 control-label">City</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Mobile number"/>
												</div>
											</div>
											 <div class="form-group">
												<div class="col-md-offset-7 col-sm-6">
													<input type="submit" class="btn btn-primary" value="update">
													<input type="submit" class="btn btn-danger col-sm-offset-1" value="delete">
												</div>
											</div>
											
										</form>	
									</div>
								</div><!-- /Basic information block -->
								
								
							</div><!-- /main col right -->
							
						</div>
					</div><!-- /padding  -->