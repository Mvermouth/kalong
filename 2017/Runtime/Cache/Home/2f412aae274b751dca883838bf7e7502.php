<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/2017/Public/Home/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/2017/Public/home/css/index.css">
    <link rel="stylesheet" href="/2017/Public/Home/lib/swiper/dist/css/swiper.min.css">
    <script>
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    if (clientWidth >= 640) {
                        docEl.style.fontSize = '100px';
                    } else {
                        docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
                    }
                };
            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
    <style>
        .swiper-container {
            width: 100%;
            height: 6rem;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="nav">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <div class="navbox"></div>
            </div>
            <div class="col-md-2">
                <img src="/2017/Public/Home/images/logo.jpg" alt="">
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <p class="login"><a href="">注册</a><a href="">会员登入/</a></p>
                    </div>
                    <div class="col-md-12">
                        <ul class="navList">
                            <li>发现身边的色色</li>
                            <li>摄影选择</li>
                            <li>客片欣赏</li>
                            <li>城市基地</li>
                            <li>最新活动</li>
                            <li>色色环球影城</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5>当前城市:</h5>
                <div class="navarea">广州</div>
            </div>
        </div>
    </div>
</div>

<div class="banner">
    <div class="container-fluid" style="padding: 0;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url('/2017/Public/Home/images/banner.jpg')"></div>
                <div class="swiper-slide" style="background-image:url('/2017/Public/Home/images/banner2.jpg')"></div>
                <div class="swiper-slide" style="background-image:url('/2017/Public/Home/images/banner.jpg')"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
</div>

<script src="/2017/Public/Home/lib/jq/jquery-3.1.0.min.js"></script>
<script src="/2017/Public/Home/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="/2017/Public/Home/lib/swiper/dist/js/swiper.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        autoplay: 5000,
        effect: 'fade'
    });
</script>
</body>
</html>