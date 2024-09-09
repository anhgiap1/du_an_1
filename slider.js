const listImage = document.querySelector('.list-images');
const imgs = document.querySelectorAll('.banner-img');
const activeElement = document.querySelector('.index-images');
// Xử lý slide show cho trang 
function changeSlides(current, list, active) {
    let width = list.offsetWidth;
    if (current === 0) {
        list.style.transform = `translateX(0px)`;
        if (active) {
            document.querySelector('.active').classList.remove('active');
            document.querySelector('.index-item-' + current).classList.add('active');
        }
    } else {
        list.style.transform = `translateX(${width * -1 * current}px)`;
        if (active) {
            document.querySelector('.active').classList.remove('active')
            document.querySelector('.index-item-' + current).classList.add('active');
        }
    }
}

function btnClickSlides() {
    var btnElements = document.querySelectorAll(".btn");
    btnElements.forEach(function (btnElement) {
        btnElement.onclick = function () {
            var btns = btnElement.parentElement;
            var list = btns.previousSibling.previousElementSibling;
            var item = list.children;
            var btn = btnElement.className.split("-");
            var listStyle = list.style.transform;
            var resultTranform = +listStyle.slice(listStyle.indexOf("(") + 1, listStyle.lastIndexOf("p"));
            const length = item.length;
            var resultWidthNext = list.offsetWidth + Math.abs(resultTranform) > list.offsetWidth * (length - 1) ? 0 : list.offsetWidth + Math.abs(resultTranform);
            var resultWidthPre = Math.abs(resultTranform) - list.offsetWidth < 0 ? list.offsetWidth * (length - 1) : Math.abs(resultTranform) - list.offsetWidth;
            if (btn[3] === "rightAuto"){
                handleSlides(list, length,resultWidthNext,1);
                clearInterval(handleEventChangeSlide);
            }else if (btn[1] === "right") {
                handleSlides(list, length, resultWidthNext);
            }else if (btn[3] === "leftAuto"){
                handleSlides(list, length,resultWidthPre,1);
                clearInterval(handleEventChangeSlide);
            }else if (btn[1] === "left") {
                handleSlides(list, length, resultWidthPre);
            }
        }
    })

}

btnClickSlides();
// Kết thúc Xử lý slide show cho trang 

function handleSlides(list, length, result, active) {
    for (var j = 0; j < length; j++) {
        if (list.offsetWidth * j === result) {
            changeSlides(j, list, active);
            break ; 
        }
    }

}

// Banner chạy tự động
function imgBannerAuto() {
    var listStyle = listImage.style.transform;
    var resultTranform = +listStyle.slice(listStyle.indexOf("(") + 1, listStyle.lastIndexOf("p"));
    const length = imgs.length;
    var resultWidthNext = listImage.offsetWidth + Math.abs(resultTranform) > listImage.offsetWidth * (length - 1) ? 0 : listImage.offsetWidth + Math.abs(resultTranform);
    handleSlides(listImage, length, resultWidthNext, 1);
}
var handleEventChangeSlide = setInterval(imgBannerAuto, 3000);
// Kết thúc banner chạy tự động 

// Xử lý mục lục của ảnh 
function addActiveBanner() {
    var imgsLength = imgs.length;
    for (var i = 0; i < imgsLength; i++) {
        var item = document.createElement('div');
        item.classList.add("index-item", `index-item-${i}`, `${i === 0 ? 'active' : "none"}`);
        activeElement.appendChild(item);
    }
}

addActiveBanner();


//  Kết thúc Xử lý mục lục của ảnh 


// Xử lý danh sách ảnh con của sản phẩm
function handleImgMin(){
    var listImgMins = document.querySelectorAll(".list-img-min-product") ; 
    listImgMins.forEach(function(listImgMin){
        Array.from(listImgMin.children).forEach(function(childrenlistImgMin){
            if(childrenlistImgMin.children.length<5){
                childrenlistImgMin.style.justifyContent= "left" ; 
                Array.from(childrenlistImgMin.children).forEach(function(childrenItem){
                    childrenItem.style.marginRight="10px" ;
                })
            }
        })
        if(listImgMin.children.length<2){
            listImgMin.parentElement.children[1].style.display="none" ;
           listImgMin.children[0].style.padding="0px" ; 
        }
    })
}

handleImgMin() ; 
// Kết thúc xử lý danh sách ảnh con của sản phẩm

var slideShowPost = document.querySelectorAll(".slide-show-post-pr");
var btnElements = document.querySelectorAll('.btn-infoProduct__item');

function activeBtn() {
    btnElements.forEach(function (btnInfo,i) {
        btnInfo.onclick = function () {
            btnElements.forEach(function (btnInfo, i) {
                btnInfo.classList.remove("inforActive");
                slideShowPost[i].classList.add("hide-slide-show");
            })
            btnInfo.classList.add("inforActive");
            slideShowPost[i].classList.remove("hide-slide-show");
        }
    })
}
activeBtn();


var btnPagination = document.querySelectorAll('.pagination .list-btns a') ; 
var btnHeading = document.querySelectorAll('.btns-category .list-btns a') ; 

function btnActive(btnElement){
    btnElement.forEach(function (btnInfo,i) {
        btnInfo.onclick = function () {
            for(var i = 0 ; i<btnElement.length;i++){
                btnElement[i].classList.remove('activeCategory') ; 
            }
            btnInfo.classList.add('activeCategory') ; 
        }
    })
}

btnActive(btnPagination) ; 
btnActive(btnHeading) ; 


function showAndHideBtn(){
    var btnSelecteds = document.querySelectorAll('.title-filter') ; 
    btnSelecteds.forEach(function(btnSelected){
        btnSelected.onclick = function(){
            var parentElement = getParent(btnSelected,".aside-title") ; 
            parentElement.lastElementChild.classList.toggle("show-title") ;  
        }
    })
}

showAndHideBtn() ; 

function getParent (element,selector){
    while (element.parentElement){
        if(element.parentElement.matches(selector)){
            return element.parentElement ;
        }
        element = element.parentElement ;
    }

}


var liElements = document.querySelectorAll('.hide-title li') ; 
function showSelected(){
    var arr = [] ; 
    var selected = document.querySelector('.selected__item') ; 
    var hideSelected = document.querySelector('.hide-selected') ; 
    liElements.forEach(function(liElement,i){
        liElement.onclick = function(){
            arr.unshift(liElement.innerText) ;
            if(arr){
                hideSelected.classList.add('show-title') ;
                var result = arr.map(function(r,i){
                    return `<li ${i} class="selected-filter"><a href="#"><i class="fa-solid fa-xmark"></i>${r}</a></li>`
                })
                selected.innerHTML = result.join('') ; 
            }
        }

    })
    var removeSelected = document.querySelector('.remove-selected') ; 
    removeSelected.onclick = function(){
        arr = [] ; 
        hideSelected.classList.remove('show-title') ; 
    }

}

showSelected() ; 