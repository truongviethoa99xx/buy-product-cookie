$(function () {
    dataTable();
    countCart();
    $(document).ready(function(){
        let id = 1;
        productByCate(id);
    });
    $(".category-item, .header__search-menu-item").click(function () {
        id = $(this).data("id");
        productByCate(id);
    });

    $("#search").keyup(function () {
        var search_value = $("#search").val();
        console.log(search_value);
        keywords = toLowerCase(removeAccents(search_value));
        $(".productbox").each(function (i, value) {
            let data_name = $(this).data("search");
            if (checkKey(data_name, keywords)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $(".qty").change(function () {
        let parent = $(this).parents("tr");
        let qty = parseFloat(parent.find(this).val());
        let price = parseFloat(parent.find("td:eq(5)").text());
        let total = parent.find(".total").text(qty * price);
    });
});

function countCart(){
    let cookie = $.cookie('product');
    if(cookie === undefined){
        cookie = null
    }else{
        cookie = $.cookie('product');
        count = $.parseJSON(cookie).length;
        $('.header__cart-quantity p').text(count);
    }
}

function addToCart(r) {
    let id = $(r).data("id");
    let qty = $(r).data("qty");
    let name = $(r).data("name");
    let price_original = $(r).data("price_original");
    let price = $(r).data("price");
    //let discount = $(r).data("discount");
    let unit = $(r).data("unit");
    let conversion_unit = $(r).data("conversion_unit");
    let conversion_value = $(r).data("conversion_value");
    let quantity_whole = $(r).data("quantity_whole");
    let price_whole = $(r).data("price_whole");
    let inventor = $(r).data("inventor");

    var cookie = $.cookie("product");
    var product = {
        id: id,
        qty: qty,
        name: name,
        price_original: price_original,
        price: price,
        //discount: discount,
        unit: unit,
        conversion_unit: conversion_unit,
        conversion_value: conversion_value,
        quantity_whole: quantity_whole,
        price_whole: price_whole,
        inventor: inventor,
    };
    ///////////////
    if (cookie === undefined) {
        cookie = [];
        cookie.push(product);
        let data = JSON.stringify(cookie);
        document.cookie = `product=${data} `;
    } else {
        cookie = $.parseJSON(cookie);
        let x = false;
        for (const arr of cookie) {
            if (arr.id === product.id) {
                x = true;
                arr.qty++;
            }
        }
        if (x === false) {
            cookie.push(product);
        }
        let data = JSON.stringify(cookie);
        document.cookie = `product=${data} `;
        //////////////////
    }
    message('???? th??m','Vui l??ng ki???m tra gi??? h??ng', 'success');
    countCart();
}
function productByCate(id) {
    $.ajax({
        url: "http://127.0.0.1:8000/product",
        method: "GET",
        success: (data) => {
            //console.log(data);
            var htmls = data.map((product) => {
                if (product.category_id == id) {
                    let name = toLowerCase(removeAccents(product.name));
                    let price = product.price;
                    let data_search = name + price;
                    return `
                        <div class="col l-2 m-4 c-12 productbox" data-search="${data_search}>
                            <span class="card" href="#">
                                <div class="home-product-item__img" style="background-image: url(https://nordiccoder.com/app/uploads/2020/01/6ab1641f-fb02-4f84-b09d-b8f001063b66.png)"></div>
                                    <h4 class="home-product-item__name">${product.name}</h4>
                                    <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">${addCommas(product.price_original)} </span>
                                    <span class="home-product-item__price-current">${addCommas(product.price)}</span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand">${checkCategory(product.category_id)}</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">${product.discount}%</span>
                                    <span class="home-product-item__sale-off-label">Gi???m</span>
                                </div>
                            </span>
                            <button  data-id="${product.id}" data-qty="1" data-name="${product.name}" data-price_original="${product.price_original}" data-price="${product.price}" data-discount="${product.discount}" data-unit="${
                        product.unit
                    }" data-conversion_unit="${product.conversion_unit}" data-conversion_value="${product.conversion_value}" data-quantity_whole="${product.quantity_whole}" data-price_whole="${product.price_whole}" data-inventor="${
                        product.inventor
                    }" onClick="addToCart($(this))" class="btn btn--primary btn-sm" role="button">BUY</button>
                        </div>`;
                }
            });

            $(".list_product").html(htmls);
        },
    });
}

function checkKey(data, key) {
    return data.includes(key);
}

function removeAccents(str) {
    return str
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/??/g, "d")
        .replace(/??/g, "D");
}

function toLowerCase(str) {
    return str.toLowerCase();
}
//
function message(title,value, type) {
    toast({
        title: `${title}`,
        message: `${value}`,
        type: `${type}`,
        duration: 4000,
    });
}

// Add comma to number
function addCommas(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    return str.join('.');
}

function checkCategory(id) {
    if(id == 1) {
        return "????? u???ng";
    } if (id == 2) {
        return "????? ch??i";
    } else {
        return "Xe m??y";
    }
}