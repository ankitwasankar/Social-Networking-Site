<!-- main right col -->
<div class="column col-sm-10 col-xs-11" id="main">
	<!-- top nav -->
	<div class="navbar navbar-blue navbar-static-top">  
		<div class="navbar-header">
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a href="/" class="navbar-brand logo" style="width:50px;">SNS</a>
		</div>
		<nav class="collapse navbar-collapse" role="navigation">
		<form class="navbar-form navbar-left" method="post" action="<?php echo base_url(); ?>user/search"> 
			<div class="input-group input-group-sm" style="max-width:360px;">
			  <input type="text" class="form-control" placeholder="Search" name="term" id="srch-term">
			  <div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			  </div>
			</div>
		</form>
		<ul class="nav navbar-nav">
		  <li>
			<a href="<?php echo base_url()."user/index"; ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
		  </li>
		  <li>
			<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
		  </li>
		</ul>
		<ul class="nav navbar-nav navbar-right" >
		  <li class="dropdown" >
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user " ></i></a>
			<ul class="dropdown-menu">
			  <li><a href="<?php echo base_url()."user/account_settings"; ?>">Account Setting</a></li>
			  <li><a href="<?php echo base_url()."user/login_details"; ?>">Login Details</a></li>
			  <li><a href="<?php echo base_url()."user/log_out"; ?>">Log out</a></li>
			</ul>
		  </li>
		</ul>
		</nav>
	</div><!-- /top nav -->