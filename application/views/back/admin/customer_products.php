<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('customer_uploaded_products');?></h1>
	</div>
        <div class="tab-base">
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="col-md-12">
                            <!-- <button class="btn btn-primary btn-labeled fa fa-plus-circle add_pro_btn pull-right" 
                                onclick="ajax_set_full('add','<?php echo translate('add_product'); ?>','<?php echo translate('successfully_added!'); ?>','product_add',''); proceed('to_list');"><?php echo translate('create_product');?>
                            </button> -->
                            <button class="btn btn-info btn-labeled fa fa-step-backward pull-right pro_list_btn" 
                                style="display:none;"  onclick="ajax_set_list();  proceed('to_add');"><?php echo translate('back_to_customer_product_list');?>
                            </button>
                        </div>
                    <!-- LIST -->
                    <div class="tab-pane fade active in" id="list">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<span id="prod" style="display:none;"></span>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var timer = '<?php $this->benchmark->mark_time(); ?>';
	var user_type = 'admin';
	var module = 'customer_products';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
	
	function proceed(type){
		if(type == 'to_list'){
			$(".pro_list_btn").show();
		} else if(type == 'to_add'){
			$(".pro_list_btn").hide();
		}
	}
</script>

