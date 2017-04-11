<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>轮播</title>
    <link href="/lunbo/Public/Home/css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="slider">
    <ul class="slider-main">
        <?php if(is_array($pict)): foreach($pict as $key=>$p): if($p['num'] == 1): ?><li style="z-index: 2">
                    <a href="">
                        <img src="/lunbo/Public/.<?php echo ($p['img_path']); ?>" alt="" />
                    </a>
                </li>
                <?php else: ?>
                <li>
                    <a href="">
                        <img src="/lunbo/Public/.<?php echo ($p['img_path']); ?>" alt="" />
                    </a>
                </li><?php endif; endforeach; endif; ?>

    </ul>
    <ul class="slider-nav">
        <?php if(is_array($pict)): foreach($pict as $key=>$p): if($p['num'] == 1): ?><li class="slider-item active"><?php echo ($p['num']); ?></li>
                <?php else: ?>
                <li class="slider-item"><?php echo ($p['num']); ?></li><?php endif; endforeach; endif; ?>
    </ul>
    <div class="slider-page" style="display: none;">
        <a href="javascript:void(0)" class="slider-prev"><</a>
        <a href="javascript:void(0)" class="slider-next">></a>
    </div>
</div>
<!--<link href="/lunbo/Public/Admin/css/main.css" rel="stylesheet" type="text/css"/>-->
<script src="/lunbo/Public/Home/js/index.js"></script>
</body>
</html>