$(function() {
    dataTable();
    loadCart();
    totalCart();
    table = dataTable();
    $('.category-item').click(function() {
        hide = true;
        if (hide) $('.category-item').removeClass('category-item--active');
        hide = true;
        $(this).addClass("category-item--active");
    });
    
    $(".qty").keypress(function(event) {
        return isNumber(event.keyCode);
    });

    $(".buy-body-value-input").keyup(function() {
        let vat = $(this).val();
        console.log(vat);
        return maxMin(vat);
    });

    $('.qty').on('input paste', function(){
        let qty = parseFloat($(this).val());
        console.log(qty);
        let inventor = parseFloat($(this).parents('tr').find('.td:eq(3)').text())
        if(qty >= inventor){
            $(this).val(inventor);
        }
        let quantity_whole = parseFloat($(this).parents('tr').find('td:eq(2)').find(':selected').data('quantity_whole'))
        let price = parseFloat($(this).parents('tr').find('td:eq(2)').find(':selected').data('price'))
        let price_whole = parseFloat($(this).parents('tr').find('td:eq(2)').find(':selected').data('price_whole'))
        let price_original = parseFloat($(this).parents('tr').find('td:eq(2)').find(':selected').data('price_original'))
        if(qty >= quantity_whole){
            $(this).parents('tr').find('td:eq(5)').text();
            $(this).parents('tr').find('td:eq(4)').text(addCommas(price_whole.toFixed(0)));
            $(this).parents('tr').find('td:eq(5)').text(addCommas((100 - (price_whole/price_original*100)).toFixed(0)));

        }else{
            $(this).parents('tr').find('td:eq(6)').text(addCommas(price.toFixed(0)));
            $(this).parents('tr').find('td:eq(5)').text(addCommas((100 - (price/price_original*100)).toFixed(0)));
        }
        summary($(this))
    })

    $('.unit').on('change',function(){
        let price = parseFloat($(this).find(':selected').data('price'));
        let price_original = parseFloat($(this).find(':selected').data('price_original'));
        let inventor = parseFloat($(this).find(':selected').data('inventor'));
        let quantity_whole = parseFloat($(this).find(':selected').data('quantity_whole'));
        let qty = parseFloat( $(this).parents('tr').find('.qty').val() );
        let discount = (100 - (price/price_original*100)).toFixed(0);
        // console.log(price,price_original, inventor, quantity_whole, discount);
        $(this).parents('tr').find('td:eq(3)').text(inventor);
        $(this).parents('tr').find('td:eq(4)').text(addCommas((price_original).toFixed(0)));
        $(this).parents('tr').find('td:eq(5)').text(discount);
        $(this).parents('tr').find('td:eq(6)').text(addCommas(price));
    
        summary($(this))
    });
});

function summary(r){
    let qty = parseFloat( r.parents('tr').find('td:eq(7) input').val() );
    let price = parseFloat(r.parents('tr').find(':selected').data('price'));
    r.parents('tr').find('td:eq(8)').text(addCommas(totalNull(qty,price)));
}
function deleteCart(r){
    $('#cart').DataTable().row( $(r).parents('tr') ).remove().draw();
    totalCart();
}

function totalCart() {
    let sum = 0;
    $(".total").each(function (key, value) {
        sum += parseFloat($(this).text());
    });
    $(".totalCart").text(sum);
}
    
function loadCart(){
    let cookie = $.cookie('product');
    if(cookie === undefined){
        cookie = null
    }else{
        cookie = $.cookie('product');
    }
    return $.parseJSON(cookie);
}

async function dataTable() {
    return await $("#cart").DataTable({
        data: loadCart(),
        columns: [
            {data: "id"},
            { data: "name" },
            { data: "unit", visible: false },
            { data: "conversion_unit", visible: false },
            {
                data: null,
                render: function (data,row) {
                    return `
                        <select class="unit">
                            <option data-quantity_whole="${data['quantity_whole']}" data-inventor="${data['inventor']}" data-price="${(data['price']).toFixed(0)}" data-price_original="${data['price_original']}" data-inventor="${data['inventor']}" data-price_whole="${data['price_whole']}" value="">${data["unit"]}</option>
                            <option data-quantity_whole="${data['quantity_whole']*data['conversion_value']}" data-price="${(data['price']/data['conversion_value']).toFixed(0)}" data-price_original="${data['price_original']/data['conversion_value']}" data-price_whole="${data['price_whole']/data['conversion_value']}" data-inventor="${data['inventor']*data['conversion_value']}" value="">${data["conversion_unit"]}</option>
                        </select>
                    `;
                },
            },
            { data: "conversion_value", visible: false },
            { data: "quantity_whole", visible: false },
            { data: "price_whole" , visible: false},
            
            { data: "inventor",
                render: function (data, type, row, meta) {
                    return `<input data-quatity_whole="${row['quantity_whole']}" data-price-whole="${row['price_whole']}" data-price_whole="${row['price_whole']}" data-quantity_whole="${row["quantity_whole"]}" data-conversion_value="${row["conversion_value"]}" class="hidden" type="hidden" /><p class="inventor" >${data}</p>`;
                }
             },
            { data: "price_original",
                render: function (data) {
                    return `<p class="price_original">${data}</p>`;
                } 
            },
            { data: null,  
                render: function (data) {
                    return `<p class="discount" data-discount="">${discount(data['price'], data['price_original'])}</p>`;
                }
            },
            { data: "price" ,
                render: function (data) {
                    return `<p class="price">${data}</p>`;
                }
            },
            {
                data: "qty",
                render: function (data) {
                    return `<input class="qty" value="${data}"/>`;
                },
            },
            {
                data: null,
                render: function (data) {
                    return `<span class="total">${data['price']* data['qty']}</span>`;
                },
            },
            {
                data: null,
                render: function (data) {
                    return `<button onClick="deleteCart(${data['id']},$(this))" class="btn-primary btn-sm" style="background-color: #415165; border: none;">Xóa</buttob>`;
                },
            },
        ],
        'columnDefs': [
            {
               'targets': 0,
               'checkboxes': {
                  'selectRow': true
               }
            }
         ],
         'select': {
            'style': 'multi'
         },
        bDestroy: true,
        pageLength: 5,

        language: {
            processing: "Loading",
            search: "Tìm kiếm",
            lengthMenu: "Hiển thị _MENU_ ",
            info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_ bản ghi",
            infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",

            zeroRecords: "Không tìm thấy",
            emptyTable: "Không có dữ liệu",
            paginate: {
                first: "Trang đầu",
                previous: "Trang trước",
                next: "Trang sau",
                last: "Trang cuối",
            },
        },
    });
}

// Function xài chung
function message(title,value, type) {
    toast({
        title: `${title}`,
        message: `${value}`,
        type: `${type}`,
        duration: 4000,
    });
}


// check number
function isNumber(n) {
    return /\d/.test(String.fromCharCode(n));
}
// max
function maxMin(number) {
    var num = +number, max = 100, min = 0;
    number = isNaN(num) ? min : num > max ? max : num < min ? min : num;
    return number;
}  

function discount(gia,giagoc){
    num = 100-(gia/giagoc*100);
    return num.toFixed(0);
}
// Add comma to number
function addCommas(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    return str.join('.');
}

// total 
function totalNull (price ,qty) {
    if(qty == "NaN") {
        return "OK";
    } else {
        return price * qty;
    }
}

function deleteCart(id,r){
    $('#cart').DataTable().row( $(r).parents('tr') ).remove().draw();

    let cookie = $.cookie("product");
    let data = $.parseJSON(cookie);
   
    let newArray = data.filter(item => {
        return item.id !== id;
    })
    let product = JSON.stringify(newArray);
    document.cookie = `product=${product} `;
    countCart();
}

