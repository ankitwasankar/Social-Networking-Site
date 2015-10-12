				</div><!-- /main right col -->	
			</div>
		</div>
	</div>
	
	<!--post modal-->
	<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				What's on your mind?
		  </div>
		<form class="form center-block" action="<?php echo base_url(); ?>user/post" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="form-group">
				  <textarea class="form-control input-lg" autofocus="" name="post_data" placeholder="What do you want to share?"></textarea>
				</div>  
			</div>
			<div class="modal-footer">
				<span class=" pull-left list-inline">
					<!-- The file input field used as target for the file upload widget -->
					<input id="fileupload" type="file" name="files[]" multiple>
				</span>
				<div>
				<input type="submit" class="btn btn-primary btn-sm" value="Post">
				</div>	
		  </div>
		</form>
	  </div>
	  </div>
	</div>
	
</body>
</html>