	<!-- padding  -->
	
	<div class="padding">
		<div class="full col-sm-9">
		
			
		
		
			<!-- main col left -->
			<div class="col-sm-8">
				<?php foreach($wda as $o){?>
				<!-- All status upadtes on wall -->
				<div class="panel panel-default">
					<?php 
						$done="shared"; 
						$time= $o->post_time; 
						$images = Image_info::getImages("post",$o->post_id);
						$val="false";
							if($o->user_id==$this->session->userdata('user_id')){
								$val="true";
							}
					?>
					<div class="panel-heading"><?php if($val=="true"){ ?><a href="#" class="pull-right">Delete</a> <?php } ?> <h4><?php echo $o->first_name." ".$o->last_name." ".$done." on ".$time; ?></h4></div>
						<div class="panel-body">
						<div>
							<div class="col-md-4 center1">        
							<?php foreach($images as $i){ ?>
								<img src="<?php echo base_url().'assets/sns_img/'.$i->image_id; ?>" class="img1 center1" > 
							<?php } ?>
							</div>
						</div>
						<div class="clearfix"> <?php echo $o->post_data; ?></div>
						<hr>
						like comment
					</div>
				</div>
				<?php } ?>
			</div><!-- /main col right -->
			
			<!-- main col right -->
			<div class="col-sm-4">
				
				<div class="panel panel-default online">
					<div class="panel-heading" style="text-align:center;">
						<h4>Online friends</h4>
					</div>
					<div class="panel-body" style="height:500px;">
					</div>
				</div>
			</div>
			
		</div>
	</div><!-- /padding  -->
	

