<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('manage_wallet_loads');?></h1>
	</div>
	<div class="tab-base">
		<div class="panel">
			<div class="panel-body">
				<div class="tab-content">
					<div class="col-md-12"></div>
					<br>
                    <!-- LIST -->
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
	var module = 'wallet_load';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>
