$(document).ready(function () {
    

    //Get Cart Details
    function getCarts() {

        $('.mini-products-list').html('');

        $.ajax({
            type: "get",
            url: site_url+"/cart/get_cart_details",
            data: {
            },
            dataType: "json",
            success: function (response) {

                $('.minicart-header .modal-title strong').text(response.cart_items.length);
                $('#CartCount').text('('+response.cart_items.length+')');
                
                response.cart_items.forEach(element => {

                    $('.mini-products-list').append(`
                    <li class="item">
                        <a class="product-image" href="${element.link}">
                        <img src="${element.image}"></a>
                        <div class="product-details">
                            <a 
                               data-id="${element.variation_id}"
                               class="remove" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                                title="" 
                                style="cursor: pointer;"
                                data-bs-original-title="Remove">
                            <i class="an an-times" aria-hidden="true"></i>
                            </a>
                            <a class="pName" href="${element.link}">
                                ${element.title}
                            </a>
                            <div class="variant-cart">SKU:${element.sku}</div>  
                            <div class="m-0 wrapQtyBtn clearfix">
                                <span class=" label">Qty:${element.cart_qty}</span>
                            </div>
                            <div class="m-0 priceRow clearfix">
                                <div class="product-price">
                                    Price:<span class="money">PKR ${element.price}</span>
                                </div>
                            </div>
                        </div>
                    </li>`);

                });

                $('.totals').text('PKR '+response.total);

            },
            error:function (response) {

            },
        });
        
    }



    //Get Cart Form
    function get_cart_form() {
        
        if(!$('.my_cart_form')){
            return false;
        }


        $('.my_cart_form_table tbody').html('');

        $.ajax({
            type: "get",
            url: site_url+"/cart/get_cart_details",
            data: {
            },
            dataType: "json",
            success: function (response) {

                // $('.minicart-header .modal-title strong').text(response.cart_items.length);
                // $('#CartCount').text('('+response.cart_items.length+')');

                $('.grand_total_amount').text("PKR "+response.total)
                
                response.cart_items.forEach(element => {

                    let attr = "";
                    element.attributes.forEach(element => {
                        attr += element.attribute_title+" : "+ element.values_title+"<br>";
                    });

                 $('.my_cart_form_table tbody').append(`
                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                    <td class="cart__image-wrapper cart-flex-item">
                        <a href="${element.link}">
                            <img class="cart__image blur-up lazyloaded" 
                             data-src="${element.image}" 
                             src="${element.image}">
                        </a>
                    </td>
                    <td class="cart__meta small--text-left cart-flex-item">
                        <div class="list-view-item__title">
                            <a href="${element.title}">
                             ${element.title}
                            </a>
                        </div>
                        <div class="cart__meta-text">${attr}</div>
                    </td>
                    <td class="cart__price-wrapper cart-flex-item text-center">
                        <span class="money">${response.currency} ${element.price}</span>
                    </td>
                    <td class="cart__update-wrapper cart-flex-item text-center">
                        <div class="cart__qty text-center">
                            <div class="qtyField">
                                <a class="qtyBtn minus" 
                                     data-id="${element.variation_id}"
                                     data-action="decreament"
                                    href="javascript:void(0);">
                                    <i class="icon an an-minus"></i>
                                </a>
                                <input readOnly class="qty" type="text"  
                                  value="${element.cart_qty}" 
                                  pattern="[0-9]*">
                                <a   class="qtyBtn plus"
                                     data-id="${element.variation_id}"
                                     data-action="increament" 
                                     href="javascript:void(0);">
                                    <i class="icon an an-plus"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="small--hide cart-price text-center">
                        <span class="money">${response.currency} ${element.total}</span>
                    </td>
                    <td class="text-center small--hide">
                        <a  data-id="${element.variation_id}" 
                            class="btn btn--secondary cart__remove" 
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            title="" 
                            data-bs-original-title="Remove item">
                           <i class="icon an an-times"></i>
                        </a>
                    </td>
                 </tr>`);
              });

            },
            error:function (response) {

            },
        });

    }


    

    // Update Cart
     $(".my_cart_form").delegate(".qtyBtn", "click", function(){
        
         let vid = $(this).data('id');
         let action = $(this).data('action');
      
          $.ajax({
                type: "get",
                url: site_url+"/cart/add_to_cart",
                data: {
                sku:vid,
                action:action,
                },
                dataType: "json",
                success: function (response) {
                
                    $.toast({
                        heading: "success",
                        text: response.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        stack: 6,
                    });

                    get_cart_form();
                    getCarts();
                },
                error:function (response) {

                    $.toast({
                        heading: "success",
                        text: response.message ? response.message : 'Error Found' ,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        stack: 6,
                    });

                    get_cart_form();
                    getCarts();
                },
                
            });
     });
   




    //Add To Cart
    if($(".product-form__cart-submit")){

            $(".product-form__cart-submit").click(function (e) { 

                let variations = [];
                $('.product-form__item').each(function () {
                    var selectedValue = $(this).find('input[type="radio"]:checked').val();
                    variations.push(Number(selectedValue));
                });

                $.ajax({
                    type: "get",
                    url: site_url+"/cart/add_to_cart",
                    data: {
                        type:"add",
                        attr:variations,
                        action:"increament",    
                        sku:$('[name="sku"]').val(),
                        quantity:$('[name="quantity"]').val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        $.toast({
                            heading: "success",
                            text: response.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            stack: 6,
                        });
                        getCarts();
                    },
                    error:function (response) {
                        $.toast({
                            heading: "success",
                            text: response.message ? response.message : 'Error Found' ,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            stack: 6,
                        });
                        getCarts();
                    },
                    
                });
         });
    }





      //Remove Cart
    $(".mini-products-list,.my_cart_form").delegate(".remove,.cart__remove", "click", function(){
        let vid = $(this).data('id');
        $.ajax({
            type:"get",
            url: site_url+"/cart/remove/"+vid,
            dataType: "json",
            success: function (response) {
            
                $.toast({
                    heading: "success",
                    text: response.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    stack: 6,
                });

                get_cart_form();
                getCarts();

            },
            error:function (response) {

                $.toast({
                    heading: "success",
                    text: response.message ? response.message : 'Error Found' ,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    stack: 6,
                });

                get_cart_form();
                getCarts();
            },
            
        });


    });


 
    




    getCarts();
    get_cart_form();
});