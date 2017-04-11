/**
 * Created by Administrator on 2017/4/11.
 */
var slider = document.querySelector(".slider"),
    eSliderPage = document.querySelector(".slider-page"),
    eSliderPage_left = document.querySelector(".slider-page .slider-prev"),
    eSliderPage_right = document.querySelector(".slider-page .slider-next"),
    eSliderNav = document.querySelector(".slider-nav"),
    eSliderNavLi = document.querySelectorAll(".slider-nav li"),
    eSliderMain = document.querySelector(".slider-main"),
    eSliderMainLi = document.querySelectorAll(".slider-main li"),
    Piclength=eSliderNavLi.length,
    Picl=Piclength-1;
    li_index = {index:0};
    //alert(Piclength);

slider.onmouseover = function(){
    eSliderPage.style.display = "block";
    clearInterval(li_index.intervalId);
}
slider.onmouseout = function(){
    eSliderPage.style.display = "none";
    li_index.intervalId = setInterval(interval,1500);
}

for(var i=0;i<Piclength;i++){
    eSliderNavLi[i].index = i;
    eSliderNavLi[i].onmouseover = function(){
        for(var i=0;i<Piclength;i++){
            eSliderNavLi[i].classList.remove("active");
            eSliderMainLi[i].style.zIndex = 0;
        }
        eSliderMainLi[this.index].style.zIndex = 1;
        this.classList.toggle("active");


        li_index.index = this.index;
    }
}

eSliderPage_left.onclick = function(){
    for(var i=0;i<Piclength;i++){
        eSliderNavLi[i].classList.remove("active");
        eSliderMainLi[i].style.zIndex = 0;
    }
    if(li_index.index === 0){
        li_index.index = Piclength;
    }
    eSliderNavLi[li_index.index-1].classList.toggle("active");
    eSliderMainLi[li_index.index-1].style.zIndex = 1;
    li_index.index = li_index.index-1;
}

eSliderPage_right.onclick = function(){
    for(var i=0;i<Piclength;i++){
        eSliderNavLi[i].classList.remove("active");
        eSliderMainLi[i].style.zIndex = 0;
    }
    if(li_index.index === Picl){
        li_index.index = -1;
    }
    eSliderNavLi[li_index.index+1].classList.toggle("active");
    eSliderMainLi[li_index.index+1].style.zIndex = 1;
    li_index.index = li_index.index+1;
}

function interval(){
    for(var i=0;i<Piclength;i++){
        eSliderNavLi[i].classList.remove("active");
        eSliderMainLi[i].style.zIndex = 0;
    }
    eSliderNavLi[li_index.index+1].classList.toggle("active");
    eSliderMainLi[li_index.index+1].style.zIndex = 1;
    li_index.index = li_index.index+1;
    if(li_index.index === Picl){
        li_index.index = -1;
    }
}

li_index.intervalId = setInterval(interval,1500);
