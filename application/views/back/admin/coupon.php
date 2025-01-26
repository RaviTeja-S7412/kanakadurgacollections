<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('manage_coupons');?></h1>
	</div>
	<div class="tab-base">
		<div class="panel">
			<div class="panel-body">
				<div class="tab-content">
					<div class="col-md-12">
				<button class="btn btn-lg btn-dark btn-labeled fa fa-plus-circle" 
                        	onclick="ajax_modal('add','<?php echo translate('add_coupon'); ?>','<?php echo translate('successfully_added!');?>','coupon_add','')">
								<?php echo translate('create_coupon');?>
						</button>
					</div>
					<div class="tab-pane fade active in" id="list">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var base_url = '<?php echo base_url(); ?>'
	var user_type = 'admin';
	var module = 'coupon';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
</script>

