<div id="content-container">
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo "Catalog";?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="panel-body">
                <div class="tab-content">
    <form id="catalogUpload" enctype="multipart/form-data">
    <!-- <form action="<?php echo base_url('custom/catalogUpload'); ?>" method="post"> -->
<div class="row">
    <div class="col-md-4">
        Title of the Catalog
        <input type="text" name="title" class="form-control">
    </div>
    <div class="col-md-4">
        Attachment (PDF)
        <input type="file" name="file" class="form-control">
    </div>
    <div class="col-md-4">
        <br/>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </div>
</div>
</form>
<div class="row" style="margin-top:20px">
<div class="col-md-1">
    <img src="<? echo base_url('uploads/loaders/loader.gif'); ?>" width="50" height="50" style="display:none" id="loader">
</div>
<div class="col-md-11">
    <div class="alert alert-danger" style="display:none" id="emsg"></div>
    <div class="alert alert-success" style="display:none" id="smsg"></div>
</div>
</div>
<hr/>
<div class="row">
<?
foreach($catalog as $item){?>
<div class="col-md-3">
<p style="background-color:green;color:#fff;padding:5px;">
<i class="fa fa-file-pdf-o"></i> <? echo $item['Title']; ?>
</p>
    <i class="fa fa-calendar"></i> <? echo $item['Date']; ?>
</div>
<?} ?>
</div>
                </div>
                
            </div>
        <!--Panel body-->
        </div>
    </div>
</div>

<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
var user_type = 'admin';
var module = 'category';
var list_cont_func = 'list';
var dlt_cont_func = 'delete';
$("#catalogUpload").on('submit', function(e){
    e.preventDefault();
    var fdata =  new FormData($("#catalogUpload")[0]);
    $.ajax({
        url:base_url+"admin/uploadCatalog",
        type:"post",
        data:fdata,
        dataType:'json',
        processData:false,
        cache:false,
        contentType:false,
        beforeSend: function(){
            $("#loader").show();
        },
        success: function(data){
            $("#loader").hide();
            $("#emsg").hide();
            $("#smsg").hide();
            if(data.Status == 'Success'){
                $("#smsg").show();
                $("#smsg").html('Successfully uploaded');
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
            console.log(data);
        }
    });
})

    

</script>


