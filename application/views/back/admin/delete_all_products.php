<div id="content-container">	
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('delete_all_products');?></h1>
	</div>
	<div class="panel">
				<div class="panel-body">
				<div id="page-content">
    	<div class="text-center">
	    	<h4 class="text-danger"><?=translate('Are You Sure You Want to Delete All Products?')?>
	    	</h4>
	    	<a onclick="delete_all('Are You Sure You Want To Delete All Products?')" class="btn btn-danger btn-lg btn-labeled fa fa-trash" style="margin-top: 50px" data-toggle="tooltip" data-original-title="Delete" data-container="body">
	        	<?=translate('delete_all_products')?>
	        </a>
	    </div>
    </div>
				</div>
	</div>
    
</div>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var user_type = 'admin';
	var module = 'delete_all_products';
	var dlt_cont_func = 'delete';
</script>



