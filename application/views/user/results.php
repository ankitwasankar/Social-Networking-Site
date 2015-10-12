	<!-- padding  -->

	<div class="padding">
		<div class="full col-sm-12">
			<!-- main col right -->
			<div>
			<h4>Search Results</h4>
			</div>
			<div class="col-sm-12">
				<div >
				
				<?php $user=$this->session->userdata('user_id'); ?>
				<div class="alert-danger" style="margin:10px;line-height:30px;text-align:center;">
					<div id="jqueryResult"></div>
				</div>
				<?php $i=0; ?>
				<?php foreach($object as $o){?>
					<?php if($o->user_id==$user)continue; ?>
						<div class="row">
						<div class="col-md-3">
							<a href="<?php echo base_url()."user/view/".$o->user_id."/".$o->first_name."-".$o->last_name; ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url().'assets/sns_img/'.$o->profile_pic; ?>" />
								<div class="caption">
									<h4><?php echo $o->first_name." ".$o->last_name; ; ?></h4>
									<p>gender: <?php echo $o->gender; ?></p>
										<?php $isFriend=$o->friendship; ?>
										<?php if($isFriend=="true"){ ?>
										<a onclick="load_data_ajax_unfriend(<?php echo $o->user_id ;?>)" class="btn btn-danger" id="myButtonClickUnfriend<?php echo $i++; ?>"><div>Unfriend?</div></a>
										<?php } ?>
										<?php if($isFriend=="false"){ ?>
										<a onclick="load_data_ajax_connect(<?php echo $o->user_id ;?>)" class="btn btn-success" id="myButtonClickConnect<?php echo $i++; ?>"><div>Connect?</div></a>
										<?php } ?>
										<?php if($isFriend=="pending"){ ?>
										<a onclick="load_data_ajax_unfriend(<?php echo $o->user_id ;?>)" class="btn btn-danger" id="myButtonClickCancel<?php echo $i++; ?>"><div>Cancel Request?</div></a>
										<?php } ?>								
								</div>
							</div>
							</a>
						</div>
				<?php } ?>
				</div>
					<!-- All status upadtes on wall -->
					<div class="panel panel-default">
						
					</div>
			</div><!-- /main col right -->
			<script>
				
				
				$(document).ready(function(){
				$('#myButtonClickConnect').click(function() {
				 $("#myButtonClickConnect").text('Request declined');
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
	

