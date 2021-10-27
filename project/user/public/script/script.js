let getProductInCart = function() {
    let temp = [];
    try {
        temp = JSON.parse(sessionStorage.getItem('listProduct'))
        if (!temp) {
            temp = [];
        }
    } catch (e) {
        temp = [];
    }
    return temp;
}
let saveProductInCart = function(listProductInCart) {
    sessionStorage.setItem('listProduct', JSON.stringify(listProductInCart))
}
let capNhatHienThiGioHang = function() {
    let listProductInCart = getProductInCart();
    let sum = 0;
    let soluong = 0;
    // console.clear()
    listProductInCart.forEach((itemProduct) => {
            // đoạn này log ra cho dễ hiểu
            // console.log('sản phẩm', itemProduct.name)
            // console.log(itemProduct)
            //------------------------
            soluong += itemProduct.amount;
            sum += parseFloat(itemProduct.price) * parseFloat(itemProduct.amount);
        })
        // console.log('__________________')
    $("span.product-count").html(listProductInCart.length);
    $("span.cart-amunt").html(((sum) / 1000).toFixed(3) + " VND");

    //  set tổng tiền 
    // alert('set tổng tiefn '+(sum * (window.redure ? window.redure : 1)))
    $("#tonghoadon").html(((sum * (window.redure ? window.redure : 1)) / 1000).toFixed(3) + " VND");
      //  đoạn code set giá trị tổng tiền và số lượng vào form......
       $("#amount").val((sum * (window.redure ? window.redure : 1)));           
         $("#qty").val(soluong);
    if (window.redure) {
        $(`#tbgiamgia`).text(`Bạn nhận được giảm giá ${(1 - window.redure).toFixed(3) * 100}%`)
        $('#tbgiamgia').show()
    } else {
        $('#tbgiamgia').hide()
    }
}

var xoaSanPham = function(idProduct) {
    alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
        function(dongY) {
            if (dongY) {
                let listProductInCart = getProductInCart();
                let vitriXoa = -1;
                listProductInCart.forEach((itemProduct, index) => {
                    if (itemProduct.id === idProduct) {
                        vitriXoa = index;
                    }
                })
                if (vitriXoa !== -1) {
                    listProductInCart.splice(vitriXoa, 1);
                    saveProductInCart(listProductInCart)
                }
                capNhatHienThiGioHang();
                // xóa dom tr , sản phẩm hiển thị trong giỏ hàng
                $('#tr_p_' + idProduct).remove()
            }
        })
}
var apply_redure = function(code) {
    if (code != '111')
        alertify
        .alert("Mã giảm giá không hợp lệ.", function() {
            // alertify.message('OK');
        });
    else {
        alertify
            .alert("Mã giảm giá hợp lệ.", function() {
                // alertify.message('OK');
            });
        window.redure = 0.9
        sessionStorage.setItem("redure", "0.9")
    }
    capNhatHienThiGioHang()
}
var botSoLuong = function(idProduct) {
    let listProductInCart = getProductInCart();
    // console.log(idProduct)
    var vitriCanSua = -1;
    listProductInCart.forEach((itemProduct, index) => {

        if (itemProduct.id === idProduct) {
            itemProduct.amount -= 1;
            if (itemProduct.amount < 1) {
                itemProduct.amount = 1;
            }
            $('#input_p_' + idProduct).val(itemProduct.amount)
            console.log($(`amount1_${itemProduct.id}`))
            $(`#amount1_${itemProduct.id}`).html(itemProduct.amount * itemProduct.price)
            vitriCanSua = index;
        }

    })
    saveProductInCart(listProductInCart);
    capNhatHienThiGioHang();
}
var themSoLuong = function(idProduct) {
    let listProductInCart = getProductInCart();
    var vitriCanSua = -1;
    listProductInCart.forEach((itemProduct, index) => {
        if (itemProduct.id === idProduct) {
            itemProduct.amount += 1;
            vitriCanSua = index;
            $('#input_p_' + idProduct).val(itemProduct.amount)
            $(`#amount1_${itemProduct.id}`).html(itemProduct.amount * itemProduct.price)
        }
    })
    saveProductInCart(listProductInCart);
    capNhatHienThiGioHang();
}
$(document).ready(function() {

    let ThemVaoGioHang = function(product, tempThis) {
        let listProductInCart = getProductInCart();
        let isExistProduct = listProductInCart.find((itemP) => {
            return itemP.id == product.id
        })
        if (!isExistProduct) {
            listProductInCart.push(product);
			var tb = ("Sản phẩm " + product.name + " đã được thêm vào giỏ hàng !");
        } else {
            var tb = alertify.error("Sản phẩm " + product.name + " đã tồn tại trong giỏ hàng !");
            // tb.show();
        }
        saveProductInCart(listProductInCart)
        capNhatHienThiGioHang();
    }

    //Xử lý phần liên hệ
    $('button#form-submit').click(function() {
        if (($("input#name").val() != "") && ($("input#email").val() != "") && ($("textarea#message").val() != ""))
            sessionStorage.setItem("phanhoi", $("h3#phanhoi").text());
    });

    if (sessionStorage.getItem('phanhoi') != null) {
        $("h3#phanhoi").show();
    }

    // click mua ở trang cửa hàng
    $("a.add_to_cart_button").click(function() {
        var x = $(this);
        console.log(x)
        console.log('777')
        console.log(x)
        console.log(x)
        console.log(x)
        var product = {
            id: x.attr('data-p-id'),
            name: x.attr('data-p-name'),
            image: x.attr('data-p-image'),
            price: parseFloat(x.attr('data-p-price')),
            amount: 1
        }
        let addProdut = ThemVaoGioHang(product, this);
        if (addProdut) {
            $(document).find('a.add_to_cart_button').addClass('disable');
            var parent = $(tempThis).parents('.single-shop-product');
            var cart = $(document).find('.shopping-item');
            var scr = parent.find("img").attr("src");
            var parTop = parent.offset().top;
            var parLeft = parent.offset().left;
            $('<img />', {
                class: 'img-product-fly',
                src: scr
            }).appendTo('body').css({
                'top': parTop,
                'left': parseInt(parLeft) + parseInt(parent.width()) - 75
            });
            setTimeout(function() {
                $(document).find('.img-product-fly').css({
                    'top': cart.offset().top,
                    'left': cart.offset().left + parseInt(cart.width()) - 30
                });
                setTimeout(function() {
                    $(document).find('.img-product-fly').remove();
                    $(document).find('a.add_to_cart_button').removeClass('disable');
                }, 1000);

            }, 500)
        }

    });
    //Click mua ở Trang chủ
    $("a.add-to-cart-link").click(function() {
        var x = $(this);
        console.log(x.html())
        var product = {
            id: x.attr('data-p-id'),
            name: x.attr('data-p-name'),
            image: x.attr('data-p-image'),
            price: parseFloat(x.attr('data-p-price')),
            amount: 1
        }
        let addProdut = ThemVaoGioHang(product, this);
        if (addProdut) {
            $(document).find('a.add-to-cart-link').addClass('disable');
            var parent = $(this).parents('.single-product');
            var cart = $(document).find('.shopping-item');
            var scr = parent.find("img").attr("src");
            var parTop = parent.offset().top;
            var parLeft = parent.offset().left;
            $('<img />', {
                class: 'img-product-fly',
                src: scr
            }).appendTo('body').css({
                'top': parTop,
                'left': parseInt(parLeft) + parseInt(parent.width()) - 75
            });
            setTimeout(function() {
                $(document).find('.img-product-fly').css({
                    'top': cart.offset().top,
                    'left': cart.offset().left + parseInt(cart.width()) - 30
                });
                setTimeout(function() {
                    $(document).find('.img-product-fly').remove();
                    $(document).find('a.add-to-cart-link').removeClass('disable');
                }, 1000);

            }, 500)
        }


    });
    //Click mua o trang chi tiet san pham
    $("button.add_to_cart_button").click(function() {
        var x = $(this)
        var product = {
            id: x.attr('data-p-id'),
            name: x.attr('data-p-name'),
            image: x.attr('data-p-image'),
            price: parseFloat(x.attr('data-p-price')),
            amount: 1
        }
        console.log(product)
        let addProdut = ThemVaoGioHang(product, this);
        if (addProdut) {
            $(document).find('button.add_to_cart_button').addClass('disable');
            var parent = $(this).parents('.product-content-right');
            var scr = parent.find("img").attr("src");
            var cart = $(document).find('.shopping-item');
            var parTop = parent.offset().top;
            var parLeft = parent.offset().left;
            $('<img />', {
                class: 'img-product-fly',
                src: scr
            }).appendTo('body').css({
                'top': parTop + 30,
                'left': parseInt(parLeft) + parseInt(parent.width()) - 700
            });
            setTimeout(function() {
                $(document).find('.img-product-fly').css({
                    'top': cart.offset().top,
                    'left': cart.offset().left + parseInt(cart.width()) - 30
                });
                setTimeout(function() {
                    $(document).find('.img-product-fly').remove();
                    $(document).find('button.add_to_cart_button').removeClass('disable');
                }, 1000);

            }, 500)
        }

    });

    $('#updatesp').click(function() {

    });
    //Mã giảm giá
    $('input#giamgiasp').click(function() {
        var x = ($('#magiamgia').val());
        //    chưa xử lý
    });
    // hiển thị giỏ hàng
    capNhatHienThiGioHang();
    let listProductInCart = getProductInCart();
    listProductInCart.forEach((itemProduct) => {
        // thêm 1 sản phẩm vào danh sách sản phẩm đã cho vào giỏ hàng
        $('table.shop_table.cart').prepend(`
        <tr id="tr_p_${itemProduct.id}">
            <td class="product-thumbnail">
                <a href="single-product.html">
                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../img/${itemProduct.image}">
                </a>
            </td>
            <td class="product-name">
                <a href="single-product.html">${itemProduct.name}
                            </a>
            </td>
            <td id="product-price"><span class="amount">${itemProduct.price}<sup>đ</sup></span></td>
            <td class="product-quantity">
                <div class="quantity buttons_added">
                    <input type="button" class="minus" value="-" onclick="botSoLuong('${itemProduct.id}')">
                    <input type="number" size="4" id="input_p_${itemProduct.id}" onchange="total()" class="input-text qty text" title="Qty" value="${itemProduct.amount}" min="0" step="1">
                    <input type="button" class="plus" value="+" onclick="themSoLuong('${itemProduct.id}')">
                </div>
            </td>
            <td class="product-subtotal"><span id="amount1_${itemProduct.id}">${itemProduct.amount * itemProduct.price}</span><sup>đ</sup></td>
			<td class="product-remove">
            <a title="Xoá sản phẩm" onclick="xoaSanPham('${itemProduct.id}')"><font color="color">Xoá</font>
                            </a>
            </td>
        </tr>
        `);
    })
});