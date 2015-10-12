	<!-- padding  -->

	<div class="padding">
		<div class="full col-sm-10">
			<!-- main col right -->
			<div class="col-sm-8>
				
				
				<div class="alert-danger" style="margin:10px;line-height:30px;text-align:center;">
					<div id="jqueryResult"></div>
				</div>
				<div class="row">
				<?php if($object1!=null){ ?>
				<h4>New friend requests</h4>
				<?php foreach($object1 as $o1){?>
						<div class="col-md-3">
							<a href="<?php echo base_url()."user/view/".$o1->user_id."/".$o1->first_name."-".$o1->last_name; ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url().'assets/sns_img/'.$o1->profile_pic; ?>" />
								<div class="caption">
									<h6><?php echo $o1->first_name." ".$o1->last_name; ; ?></h6>
									   <a onclick="load_data_ajax_accept(<?php echo $o1->user_id ;?>)" class="btn btn-success my_pad" id="myButtonClickAccept"><div>Accept</div></a>
										<a onclick="load_data_ajax_unfriend(<?php echo $o1->user_id ;?>)" class="btn btn-danger my_pad" id="myButtonClickDecline"><div>Decline</div></a>
								</div>
							</div>
							</a>
						</div>
				<?php } } ?>
				</div>
				
				<div class="row">
				<?php if($object2!=null){ ?>
				<h4>Pending friend requests</h4>
				
				<?php foreach($object2 as $o2){?>
						<div class="col-md-3">
							<a href="<?php echo base_url()."user/view/".$o2->user_id."/".$o2->first_name."-".$o2->last_name; ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url().'assets/sns_img/'.$o2->profile_pic; ?>" />
								<div class="caption">
									<h6><?php echo $o2->first_name." ".$o2->last_name; ; ?></h6>
									   <a onclick="load_data_ajax_unfriend(<?php echo $o2->user_id ;?>)" class="btn btn-danger my_pad" id="myButtonClickCancel"><div>Cancel</div></a>
								</div>
							</div>
							</a>
						</div>
				<?php }} ?>
				</div>
				
				<div class="row">
				<?php if($object!=null){ ?>
				<h4>All friends</h4>
				<?php foreach($object as $o){?>	
						<div class="col-md-3">
							<a href="<?php echo base_url()."user/view/".$o->user_id."/".$o->first_name."-".$o->last_name; ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url().'assets/sns_img/'.$o->profile_pic; ?>" />
								<div class="caption">
									<h6><?php echo $o->first_name." ".$o->last_name; ; ?></h6>
										<a onclick="load_data_ajax_unfriend(<?php echo $o->user_id ;?>)" class="btn btn-danger" id="myButtonClickUnfriend"><div>Unfriend?</div></a>
								</div>
							</div>
							</a>
						</div>
				<?php } } ?>
				
				<div class="row">
				
					<!-- All status upadtes on wall -->
					<div class="panel panel-default">
						
					</div>
			</div><!-- /main col right -->
			<script>
				$(document).ready(function(){
				$('#myButtonClickAccept').click(function() {
				 $("#myButtonClickAccept").text('Request accepted');
				})
				});
				
				$(document).ready(function(){
				$('#myButtonClickDecline').click(function() {
				 $("#myButtonClickDecline").text('Request declined');
				})
				});
				
				$(document).ready(function(){
				$('#myButtonClickUnfriend').click(function() {
				 $("#myButtonClickUnfriend").text('Unfriend success');
				})
				});
				
				$(document).ready(function(){
				$('#myButtonClickCancel').click(function() {
				 $("#myButtonClickCancel").text('Request cancelled');
				})
				});
			</script>
			
			
		</div>
	</div><!-- /padding  -->
	

