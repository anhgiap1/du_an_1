// Xử lý ảnh trang chi tiết sản phẩm 
var mainImg = document.querySelector('.product-detail-img-large');
var minImgs = document.querySelectorAll('.product-detail-img-min>img');
minImgs.forEach(function (img) {
    img.onclick = function () {
        mainImg.innerHTML = `<img src="${img.src}" alt="">`;
    }
    img.onmouseover = function () {
        mainImg.innerHTML = `<img src="${img.src}" alt="">`;
    }
})

// Kết thúc  Xử lý ảnh trang chi tiết sản phẩm 



var btnMenuShops = document.querySelectorAll('.btn-menu');
if (btnMenuShops) {
    btnMenuShops.forEach(function (btnMenuShop) {
        btnMenuShop.onclick = function () {
            var ulElement = btnMenuShop.nextElementSibling;
            if (ulElement) {
                ulElement.classList.toggle('sidebar-item-menu-min');
            }

        }
    })
}

var folderProduct = document.querySelector('.search-folder>p');
var listFolderProduct = document.querySelector('.folder-product');
if (folderProduct) {
    folderProduct.onclick = function () {
        listFolderProduct.classList.toggle('sidebar-item-menu-min');
    }
}



var aElements = document.querySelectorAll('.filter-shop-product a');
aElements.forEach(function (aElement) {
    aElement.onclick = function () {
        aElements.forEach(function (aElement) {
            aElement.classList.remove('filter-shop-product-check')
        })
        aElement.classList.add('filter-shop-product-check');
    }
})



// Xử lý đổi màu ô kích cỡ đã click và gán value ô input có class=kichco ở trang chi tiết sản phẩm 
var listSize = document.querySelectorAll('.list-size li>a');
var inputColor = document.querySelector(".mausac");
var inputSize = document.querySelector(".kichco");
if (listSize) {
    listSize.forEach(function (size) {
        size.onclick = function () {
            getDataType(size);
            listColor = document.querySelectorAll('.list-color li>a');
            listSize.forEach(function (size) {
                size.classList.remove('active');
            })
            inputSize.value = size.getAttribute('data-size');
            inputColor.value="" ; 
            size.classList.add('active');
        }
    })
}

// Kết thúc Xử lý đổi màu ô kích cỡ đã click và gán value ô input có class=kichco ở trang chi tiết sản phẩm 


// Xử lý đổi màu ô màu sắc đã click và gán value ô input có class=masac ở trang chi tiết sản phẩm 
var colorOld = "" ; 
var listColor = document.querySelectorAll('.list-color li>a');
if (listColor) {
    listColor.forEach(function (color,i) {
        color.onclick = function () {
            getDataType(color) ;
            listColor.forEach(function (color) {
                color.classList.remove('active');
            })
            inputColor.value = color.getAttribute('data-color');
            inputSize.value="" ; 
            color.classList.add('active');
            // if(colorOld === color+i){
            //     inputColor.value = "" ;
            // color.classList.remove('active');

            // }
            colorOld = color+i ; 
        }
    })
}

// Kết thúc Xử lý đổi màu ô màu sắc đã click và gán value ô input có class=masac ở trang chi tiết sản phẩm 


// Nếu sản phẩm đấy chỉ có 1 biến thể như kích cỡ hoặc màu sắc thì hàm này để lấy ra thuộc tính  data-... của ô màu sắc hoặc kích cỡ ở trang chi tiết sản phẩm 
function getDataType(size) {
    var id = size.getAttribute('data-id');
    var sl = size.getAttribute('data-sl');
    var price = size.getAttribute('data-price');
    var sale = size.getAttribute('data-sale');
    var pay = size.getAttribute('data-pay');
    if (id && sl && price && sale && pay) {
        changeProductDetail(size,+price,+sl, +pay, +sale);
    }
}

// Kết thúc Nếu sản phẩm đấy chỉ có 1 biến thể như kích cỡ hoặc màu sắc thì hàm này để lấy ra thuộc tính  data-... của ô màu sắc hoặc kích cỡ ở trang chi tiết sản phẩm 


// Hàm này dùng để thay đổi giá tiền, màu sắc, số lượng của sản phẩm khi sản phẩm đó có nhiều biến thể 
function changeProductDetail($this, $donGia, $soLuong, $soLuotBan, $giamGia) {
    $this.classList.add('active');
    var productPrice = document.querySelector('.product-price');
    var productPriceOld = document.querySelector('.price-old');
    if($giamGia !== 0){
        productPriceOld.style.marginRight = "16px";
        productPriceOld.textContent = $donGia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
    }else {
        productPriceOld.textContent = "" ;
    }   
    productPrice.textContent = ($donGia - $giamGia).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    var rowNumber = document.querySelector('.row-number');
    rowNumber.textContent = $soLuong;
    var payed = document.querySelector('.payed');
    payed.textContent = $soLuotBan + " " + "đã bán";
    var addToCart = document.querySelector(".add-cart");
    var buyNow = document.querySelector(".buy-now");
    if ($soLuong === 0) {
        addToCart.classList.add("no-click");
        buyNow.classList.add("no-click");
    } else {
        addToCart.classList.remove("no-click");
        buyNow.classList.remove("no-click");
    }

}

// Kết thúc Hàm này dùng để thay đổi giá tiền, màu sắc, số lượng của sản phẩm khi sản phẩm đó có nhiều biến thể 


// Hàm này để lấy ra tất cả những thuộc tính của  1 biến thể khi click như : đơn giá, số lượng,giảm giá... ở trang xulybienthe2.php
function activeColor($this, $result, $donGia, $soLuong, $soLuotBan, $giamGia){
    console.log($soLuong);
    var listColor = document.querySelectorAll('.list-color li>a');
    listColor.forEach(function (color) {
        color.classList.remove('active');
    })
    var inputColor = document.querySelector(".mausac");
    inputColor.value = $result;
    changeProductDetail($this, $donGia, $soLuong, $soLuotBan, $giamGia) ; 
}


// Kết thúc Hàm này để lấy ra tất cả những thuộc tính của  1 biến thể khi click như : đơn giá, số lượng,giảm giá... ở trang xulybienthe2.php



// Hàm này để lấy ra tất cả những thuộc tính của  1 biến thể khi click như : đơn giá, số lượng,giảm giá... ở trang xulybienthe.php

function activeSize($this, $result, $donGia, $soLuong, $soLuotBan, $giamGia){
    var listSize = document.querySelectorAll('.list-size li>a');
    listSize.forEach(function (size) {
        size.classList.remove('active');
    })
    var inputSize = document.querySelector(".kichco");
    inputSize.value = $result;
    changeProductDetail($this, $donGia, $soLuong, $soLuotBan, $giamGia) ; 
}


// Hàm này để thay đổi tổng tiền ở trang thanh toán 
function quantityDefault() {
    var listCarts = document.querySelectorAll('.cart-item');
    listCarts.forEach(function (cart) {
        var cost = cart.querySelector(".don-gia").textContent;
        var index = cost.lastIndexOf("đ")
        const numberCost = cost.slice(0, index) + cost.slice(index + 1);
        var quantity = cart.querySelector('.gia-tri').value;
        cart.querySelector(".tong-tien>p").textContent = (+numberCost * quantity) + "đ";
    })
}

quantityDefault();


// Kết thúc  Hàm này để thay đổi tổng tiền ở trang thanh toán 


// Dùng để cộng trừ số lượng sản phẩm ở trang giỏ hàng 
var btnPlussCarts = document.querySelectorAll('.nut-cong');
var btnMinusCarts = document.querySelectorAll('.nut-tru');
const checkboxes = document.querySelectorAll('.add');
var is_Check = true;

// var tongTien = document.querySelector('.tong-tien') ; 
var Tong = 0;
if (btnPlussCarts || btnMinusCarts) {
    btnPlussCarts.forEach(function (node) {
        node.onclick = function () {
            var soLuong = node.parentElement.parentElement.parentElement.parentElement.querySelector(`.so-luong-an`).textContent ; 
            if (is_Check === true) {
                var value = node.nextElementSibling.value;
                value++;
                if(value >= +soLuong ){
                    value = +soLuong ;
                }
                else if (value >= 20) {
                    value = 20;
                }
                node.nextElementSibling.value = value;
                
                var tongTien = node.parentElement.parentElement.parentElement.nextElementSibling
                var donGia = node.parentElement.parentElement.parentElement.previousElementSibling.textContent
                var index = donGia.lastIndexOf("đ")
                const slicedStr = donGia.slice(0, index) + donGia.slice(index + 1);
                Tong = +slicedStr * node.nextElementSibling.value;
                var p = tongTien.querySelector("p");
                p.textContent = Tong + "đ";

            }
        }
    })

    btnMinusCarts.forEach(function (node) {
        node.onclick = function () {
            if (is_Check === true) {
                var value = node.previousElementSibling.value;
                value--;
                if (value <= 0) {
                    value = 1;
                }
                node.previousElementSibling.value = value;
                var tongTien = node.parentElement.parentElement.parentElement.nextElementSibling
                var donGia = node.parentElement.parentElement.parentElement.previousElementSibling.textContent
                var index = donGia.lastIndexOf("đ")
                const slicedStr = donGia.slice(0, index) + donGia.slice(index + 1);
                Tong = +slicedStr * value;
                var p = tongTien.querySelector("p");
                p.textContent = Tong + "đ";
            }
        }
    })

}

//  KẾt thúc Dùng để cộng trừ số lượng sản phẩm ở trang giỏ hàng 



// Dùng để chọn nhiều sản phẩm ở giỏ hàng cùng 1 lúc
var arr = [];
const checkedCheckboxes = [];
var giaCuoi = document.querySelector(".giacuoicung");
var muaNgay = document.querySelector(".mua-ngay");
checkboxes.forEach((checkbox, i) => {
    if (!checkbox.checked) {
        muaNgay.classList.add('no-click') ;

    }else{
        muaNgay.classList.remove('no-click') ;

    }
    checkbox.onchange = function () {
        if (checkbox.checked) {
            is_Check = false;
            handDisplay(checkbox); 
            muaNgay.classList.remove('no-click') ;
        } else {
            is_Check = true;
            var a =  document.querySelectorAll('.add')  ;
            muaNgay.classList.add('no-click') ;     
            a.forEach(function(b){
                if(b.checked){
            muaNgay.classList.remove('no-click') ;     
                }
            })
            deleteCart(checkbox);
            checkedAll.checked = false;
        }
    }
});


const checkedAll = document.querySelector('.checkAll');
if (checkedAll) {
    checkedAll.onchange = function () {
        arr = [];
        var Allcheckbox = document.querySelectorAll('.add');
        if (checkedAll.checked) {
            Allcheckbox.forEach(function (checkbox) {
                checkbox.checked = true;
                handDisplay(checkbox);
                is_Check = false;
            muaNgay.classList.remove('no-click') ;
                

            })
        } else {
            Allcheckbox.forEach(function (checkbox) {
                checkbox.checked = false;
                deleteCart(checkbox);
                is_Check = true;
            muaNgay.classList.add('no-click') ;
            })


        }
    }
}


// Kết thúc  Dùng để chọn nhiều sản phẩm ở giỏ hàng cùng 1 lúc



// Dùng để cập nhật lại tổng thanh toán ở trang giỏ hàng 
var inputTongTien = document.querySelector(".gia-gui");
var countBuy = document.querySelector('.thanhtoan');
function handDisplay(checkbox) {
    var donGia = checkbox.parentElement.parentElement.querySelector(".tong-tien > p").textContent;
    var index = donGia.lastIndexOf("đ");
    const slicedStr = donGia.slice(0, index) + donGia.slice(index + 1);
    arr.push(+slicedStr);
    var result = arr.reduce(function (a, b) {
        return a + b;
    }, 0);
    countBuy.textContent = `Tổng thanh Toán ( ${arr.length} sản phẩm )`
    inputTongTien.value = result
    const formattedNumber = result.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    giaCuoi.textContent = formattedNumber;

}


// Kết thúc Dùng để cập nhật lại tổng thanh toán ở trang giỏ hàng 




// Dùng để xóa sản phẩm khỏi giỏ hàng 
function deleteCart(checkbox) {
    var donGia = checkbox.parentElement.parentElement.querySelector(".tong-tien > p").textContent;
    var index = donGia.lastIndexOf("đ");
    const slicedStr = donGia.slice(0, index) + donGia.slice(index + 1);
    const valueToRemove = +slicedStr;
    const index1 = arr.indexOf(valueToRemove);
    if (index1 > -1) {
        arr.splice(index1, 1);
    }
    var result = arr.reduce(function (a, b) {
        return a + b;
    }, 0);
    countBuy.textContent = `Tổng thanh Toán ( ${arr.length} sản phẩm )`
    inputTongTien.value = result
    const formattedNumber = result.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    giaCuoi.textContent = formattedNumber;
}

// Kết thúc Dùng để xóa sản phẩm khỏi giỏ hàng 


// Dùng để cộng trừ số lượng sản phẩm ở trang chi tiết sản phẩm 
var value = 1;
var btnPluss = document.querySelector(".btn-quantity-pluss");
var btnMinus = document.querySelector(".btn-quantity-minus");
var inputQuantity = document.querySelector(".number-quantity");
if (btnPluss || btnMinus) {
    btnPluss.onclick = function () {
        var rowNumber = document.querySelector('.row-number');
        value++;
        if (value >= +rowNumber.textContent) {
            value = +rowNumber.textContent;
        } else if (value >= 20) {
            value = 20;
        }
        inputQuantity.value = value;
    }

    btnMinus.onclick = function () {
        value--;
        if (value <= 0) {
            value = 1;
        }
        inputQuantity.value = value;
    }
}

function getProductBuy() {
    const checkedInputs = document.querySelectorAll('input.add:checked');
    if (checkedInputs) {
        checkedInputs.forEach(input => {
            is_Check = false;
            handDisplay(input);
        });
    }

}
getProductBuy();
// Kết thúc  Dùng để cộng trừ số lượng sản phẩm ở trang chi tiết sản phẩm 

