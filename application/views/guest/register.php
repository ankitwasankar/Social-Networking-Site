<body class="loginPageBackground" onload="$('#signupbox').show(); $('#loginbox').hide()">
	<div class="container">    
		<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Sign Up</div>
					<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo base_url();?>guest/index">Sign In</a></div>
				</div>  
				<div class="panel-body" >
					<form id="signupform" class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>guest/register">
						<?php if($message2=="retry"){ ?>
							<div id="signupalert" class="alert alert-danger">
								<?php echo "<p>$message1</p>"; ?> <?php echo validation_errors(); ?>
							</div>
						<?php } ?>
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" placeholder="Email Address">
							</div>
						</div>
							
						<div class="form-group">
							<label for="firstname" class="col-md-3 control-label">First Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="firstname" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-3 control-label">Last Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="lastname" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="passwd" placeholder="Password">
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="cnfpasswd" placeholder="Confirm Password">
							</div>
						</div>
							

						<div class="form-group">
							<!-- Button -->                                        
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" id="btn-signup" type="button" class="btn btn-info" value="Sign Up"><i class="icon-hand-right" ></i>
							</div>
						</div>
						

					</form>
				 </div>
			</div>    
		</div> 
	</div>		
</body>
</html>