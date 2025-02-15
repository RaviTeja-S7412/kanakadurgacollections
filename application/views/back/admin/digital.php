<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('manage_product_(_digital_)');?></h1>
	</div>
        <div class="tab-base">
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="col-md-12">
                            <button class="btn btn-dark btn-lg btn-labeled fa fa-plus-circle add_pro_btn" 
                                onclick="ajax_set_full('add','<?php echo translate('add_product'); ?>','<?php echo translate('successfully_added!'); ?>','digital_add',''); proceed('to_list');"><?php echo translate('create_product');?>
                            </button>
                            <button class="btn btn-info btn-labeled fa fa-step-backward pull-right pro_list_btn" 
                                style="display:none;"  onclick="ajax_set_list();  proceed('to_add');"><?php echo translate('back_to_product_list');?>
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
	var module = 'digital';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
	
	function proceed(type){
		if(type == 'to_list'){
			$(".pro_list_btn").show();
			$(".add_pro_btn").hide();
		} else if(type == 'to_add'){
			$(".add_pro_btn").show();
			$(".pro_list_btn").hide();
		}
	}
	
	function digital_download(id){
		$.ajax({
                url: base_url+''+user_type+'/'+module+'/can_download/'+id, // form action url
                type: 'GET', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                beforeSend: function() {
					
                },
                success: function(data) {
					if(data == 'yes'){
						window.location = base_url+''+user_type+'/'+module+'/download_file/'+id;	
					}else if(data == 'no'){
						$.activeitNoty({
							type: 'danger',
							icon : 'fa fa-times',
							message : '<?php echo translate('download_failed!'); ?>',
							container : 'floating',
							timer : 3000
						});
					}
                },
                error: function(e) {
                    console.log(e)
                }
            });
		 
	}
	
	
</script>

