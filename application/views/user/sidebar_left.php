<body>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">
				
				
				<!-- sidebar -->
				<div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
					<ul class="nav">
						<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
					</ul>
				   <?php 
					$number = User::request_notification();
				   ?>
					<ul class="nav hidden-xs" id="lg-menu">
						<li class="active"><a href="<?php echo base_url(); ?>user/profile"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
						<li><a href="<?php echo base_url(); ?>user/friends"><i class="glyphicon glyphicon-heart"></i> Friends <?php if($number!=0)echo "(".$number.")"; ?></a></li>
						<li><a href="<?php echo base_url(); ?>user/groups"><i class="glyphicon glyphicon-th"></i> Groups</a></li>
						<li><a href="<?php echo base_url(); ?>user/messages"><i class="glyphicon glyphicon-comment"></i> Messages</a></li>
					</ul>
					<!-- tiny only nav-->
					<ul class="nav visible-xs" id="xs-menu">
						<li><a href="<?php echo base_url(); ?>user/profile" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
						<li><a href="<?php echo base_url(); ?>user/friends" class="text-center"><i class="glyphicon glyphicon-heart"></i></a></li>
						<li><a href="<?php echo base_url(); ?>user/groups" class="text-center"><i class="glyphicon glyphicon-th"></i></a></li>
						<li><a href="<?php echo base_url(); ?>user/messages" class="text-center"><i class="glyphicon glyphicon-comment"></i></a></li>
					</ul>
				</div>
				<!-- /sidebar -->