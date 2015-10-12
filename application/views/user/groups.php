	<!-- padding  -->

	<div class="padding">
		<div class="full col-sm-12">
			<!-- main col right -->
			<div class="col-sm-10">
				
				<div >
				<h3>Groups:</h3>
				</div>
				
				<table class="table table-striped">
					<tr>
						<td >Sr No.
						<td>Group name
						<td>Notifications
						<td>sidebar view
					</tr>
					<?php for($i=0;$i<10;$i++){ ?>
					<tr>
						<td><?php echo $i; ?>
						<td><a href="<?php echo base_url(); ?>user/grouphome" >Group name <?php echo $i; ?> </a>
						<td> <?php echo $i; ?>
						<td><?php echo "<a class='btn btn-warning'><div>No</div></a>" ?>
					</tr>
					<?php	}	?>
				</table>
					
			</div><!-- /main col right -->
		</div>
	</div><!-- /padding  -->
	

