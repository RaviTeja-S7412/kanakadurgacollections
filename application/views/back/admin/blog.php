<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('manage_blog');?></h1>
	</div>
        <div class="tab-base">
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="col-md-12">
                            <button class="btn btn-dark btn-lg btn-labeled fa fa-plus-circle add_pro_btn" 
                                onclick="ajax_set_full('add','<?php echo translate('add_blog'); ?>','<?php echo translate('successfully_added!'); ?>','blog_add',''); proceed('to_list');"><?php echo translate('create_blog');?>
                            </button>
                            <button class="btn btn-info btn-labeled fa fa-step-backward pull-right pro_list_btn" 
                                style="display:none;"  onclick="ajax_set_list();  proceed('to_add');"><?php echo translate('back_to_blog_list');?>
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
<span id="prod"></span>
<script>
	var base_url = '<?php echo base_url(); ?>'
	var user_type = 'admin';
	var module = 'blog';
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
</script>

