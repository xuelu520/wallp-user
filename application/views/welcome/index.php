<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>
<div class="row">
    <div class="container">
        <!-- Wrapper for slides -->
        <div id="owl-example" class="owl-carousel">
            <?php foreach($juwuba as $item):?>
                <div style="">
                    <img src="<?php echo UPYUN_URL.$item['url'];?>" style="height: 750px;">
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="row" data-wgid="1">
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <div class="fl"><h3>次级分类1</h3></div>
                <div class="fr" style="margin-top: 10px;"><a href="javascript:void(0);">更多</a></div>
            </div>
        </div>
        <div>
            <ul class="img-panel">
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
            </ul>
            <ul class="img-panel">
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
                <li><img src="http://xuelu.b0.upaiyun.com/1/3606b6be5394493feb06587968345e41.jpg!pp"></li>
            </ul>
        </div>
    </div>
</div>
    <div class="row">
        <div class="container">
            <div class="panel">
                <div class="panel-body">
                    <div class="fl"><h3>次级分类2</h3></div>
                    <div class="fr" style="margin-top: 10px;"><a href="javascript:void(0);">更多</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="panel">
                <div class="panel-body">
                    <div class="fl"><h3>次级分类3</h3></div>
                    <div class="fr" style="margin-top: 10px;"><a href="javascript:void(0);">更多</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="panel">
                <div class="panel-body">
                    <div class="fl"><h3>次级分类4</h3></div>
                    <div class="fr" style="margin-top: 10px;"><a href="javascript:void(0);">更多</a></div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function(){
        //轮播组件
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