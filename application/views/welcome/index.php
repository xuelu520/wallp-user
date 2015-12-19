<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>
<style>
    .slidesjs-stop {
        display:none;
    }
</style>
<div class="row">
    <div class="container">
        <!-- Wrapper for slides -->
        <div id="owl-example" class="owl-carousel">
            <?php foreach($juwuba as $item):?>
                <div style="">
                    <img src="<?php echo UPYUN_URL.$item['url'];?>" style="width: 100%;">
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#owl-example").owlCarousel({
            autoPlay:true,
            navigation : false, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true
        });
    });
</script>
<?php include APPPATH."views/common/footer.php";?>