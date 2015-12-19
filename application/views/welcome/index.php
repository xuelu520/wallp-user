<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>
<
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="..." alt="...">
        </div>
        <div class="item">
            <img src="..." alt="...">
        </div>
        <div class="item">
            <img src="..." alt="...">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        //生成首页巨无霸轮播图
        juwuba();
    });

    function juwuba() {
        $.ajax({
            url:'http://wallp.cn/api/wg_one',
            type:'GET',
            dataType:'json',
            data:{'wg_id':1},
            success: function(res) {
                console.log(res);
            }
        });
    }
</script>
<?php include APPPATH."views/common/footer.php";?>