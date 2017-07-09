var base_url = 'http://localhost/';
// var base_url = 'https://hly.weifengkeji.top/';
$(document).ready(function() {

    
    var update_shop_flag = false;
    var update_product_flag = false;
    var update_admin_flag = false;
    var update_category_flag = false;
    var update_group_flag = false;    
    var update_order_flag = false;
    var thumb_flag = false;
    var cover_flag = false;

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    $('.sub-product').click(function(e){        
        var category_id =  $(this).data("id");
        var params = {
            category_id: category_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'product/index',
            data: params,
            dataType: 'json',
            success: function(result) {                
            },
            error: function(error) {
            }
        });
    });

    /***************************** */
    /* Administrator               *
    /******************************/ 
    $('#add_admin').click(function() {
        $('#admin_modal').modal('show');
    });

    $('#close_admin').click(function() {
        $('#admin_modal').modal('hide');
    });

    $('#save_admin').click(function() {
        var params = {
            admin_id: $('#admin_id').val(),
            admin_name: $('#admin_name').val(),
            admin_email: $('#admin_email').val(),
            admin_shop: $('#admin_shop').val(),
            admin_role: $('#admin_role').val()
        }; 
        var url = base_url;
        if(update_admin_flag == true){
            url += 'admin/update';
        } else {
            url += 'admin/add';
        }      
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // delete the infomation of the selected administrator
    $('#admin_list .delete-admin').on("click",function(){
        var admin_id =  $(this).data("id");
        var params = {
            admin_id: admin_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'admin/deleteuser',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // edit the infomation of the selected administrator
    $('#admin_list .edit-admin').on("click",function(){

        $('#admin_modal').modal('show');

        var admin_id =  $(this).data("id");
        var params = {
            admin_id: admin_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'admin/getadmin',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#admin_name').val(result.admin_name);
                    $('#admin_email').val(result.admin_email);  
                    $('#admin_shop').val(result.shop);    
                    $('#admin_id').val(result.id); 
                    $('#admin_role').val(result.admin_role);
                    update_admin_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    /***************************** */
    /* Shop                        *
    /******************************/ 

    $('#add_shop').click(function() {
        $('#shop_modal').modal('show');
    });

    $('#close_shop').click(function() {
        $('#shop_modal').modal('hide');
    });

    $('#save_shop').click(function() {
        var params = {
            shop_id: $('#shop_id').val(),
            shop_name: $('#shop_name').val(),
            shop_address: $('#shop_address').val(),
            shop_phone: $('#shop_phone').val()
        }; 
        var url = base_url;
        if(update_shop_flag == true){
            url += 'shop/updateshop';
        } else {
            url += 'shop/add_shop';
        }      
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // edit the infomation of the selected shop 
    $('#shop_list .edit-shop').on("click",function(){

        $('#shop_modal').modal('show');

        var shop_id =  $(this).data("id");
        var params = {
            shop_id: shop_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'shop/getshop',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#shop_name').val(result.shop_name);
                    $('#shop_address').val(result.shop_address);  
                    $('#shop_phone').val(result.shop_phone); 
                    $('#shop_id').val(result.id); 
                    update_shop_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // delete the infomation of the selected shop 
    $('#shop_list .delete-shop').on("click",function(){
        var shop_id =  $(this).data("id");
        var params = {
            shop_id: shop_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'shop/delete_shop',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });  

    /***************************** */
    /* Product                     *
    /******************************/ 

    $('#add_product').click(function() {
        $('#product_modal').modal('show');
    });

    $('#close_product').click(function() {
        $('#product_modal').modal('hide');
    });

    $('#save_product').click(function() {
        var params = {
            product_id: $('#product_id').val(),
            product_name: $('#product_name').val(),
            product_description: $('#product_description').val(),
            product_category: $('#category').val(),
            product_classification: $('#classification').val(),
            product_origin_price: $('#origin_price').val(),
            product_promotion_price: $('#promotion_price').val(),
            product_inventory: $('#inventory').val(),
            product_express_fee: $('#express_fee').val()            
        }; 
        var params_group = {
            group_num: $('#group_num').val(),
            group_price: $('#group_price').val(),
            group_time: $('#group_time').val(),
            product_id: $('#product_id').val(),
            group_id: $('#group_id').val()
        };
        var url = base_url;
        var url_group = base_url;
        if(update_product_flag == true){
            url += 'product/updateproduct';
            url_group += 'product/updategroup';
        } else {
            url += 'product/addproduct';
            url_group += 'product/addgroup';
        }      
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    if(update_product_flag == true){
                        $.ajax({
                            type: "POST",
                            url: url_group,
                            data: params_group,
                            dataType: 'json',
                            success: function(result) { },
                            error: function(error) { }
                        }); 
                        if(thumb_flag == false) {
                            upload_image($('#product_id').val());  
                        } else {
                            location.reload();
                        }      
                        if(cover_flag == true) {
                            upload_covers($('#product_id').val());   
                        } else {
                            location.reload();
                        }                    
                    } else {
                        params_group.product_id = result;
                        $.ajax({
                            type: "POST",
                            url: url_group,
                            data: params_group,
                            dataType: 'json',
                            success: function(result) { },
                            error: function(error) { }
                        });  
                        if(thumb_flag == false) {
                            upload_image(result);    
                        } else {
                            location.reload();
                        }     
                        if(cover_flag == true) {
                            upload_covers(result);  
                        } else {
                            location.reload();
                        }            
                    }                                                                      
                }
            },
            error: function(error) {
                console.log(error);
            }
        });   
          
    });

    // delete the infomation of the selected product
    $('#product_list .delete-product').on("click",function(){
        var product_id =  $(this).data("id");
        var params = {
            product_id: product_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'product/deleteproduct',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // edit the infomation of the selected product
    $('#product_list .edit-product').on("click",function(){

        $('#product_modal').modal('show');

        // initialize
        $('#product_id').val('');
        $('#product_name').val('');
        $('#product_description').val(''); 
        $('#category').val('');
        $('#classification').val('');
        $('#origin_price').val('');
        $('#promotion_price').val('');
        $('#inventory').val('');   
        $('#express_fee').val('');
        $('#group_id').val('');
        $('#group_num').val('');
        $('#group_price').val('');
        $('#group_time').val('');
        $('#product_cover_container').empty();

        var product_id =  $(this).data("id");
        var params = {
            product_id: product_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'product/getproduct',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#product_id').val(result.id);
                    $('#product_name').val(result.name);
                    $('#product_description').val(result.description);   
                    $('#category').val(result.category); 
                    $('#classification').val(result.classification);
                    $('#origin_price').val(result.originPrice);   
                    $('#promotion_price').val(result.promotionPrice); 
                    $('#inventory').val(result.inventory);   
                    $('#express_fee').val(result.expressFee); 
                    if(result.imageUrl != '') {
                        thumb_flag = true;
                        $("#product_thumb").attr("src", base_url + 'uploads/' + result.imageUrl);  
                    }                    
                    for(key in result.covers){   
                        $('#product_cover_container').prepend($('<img>',{class:'product_cover_img product_thumb_content',src:base_url + 'uploads/' + result.covers[key]}));
                    }                  
                    update_product_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
        $.ajax({
            type: "POST",
            url: base_url + 'product/getgroup',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#group_id').val(result.id);
                    $('#group_num').val(result.number);
                    $('#group_price').val(result.price);
                    $('#group_time').val(result.endtime);
                    update_group_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    /***************************** */
    /* Order                      *
    /******************************/ 


    $('.edit-order').click(function() {
        $('#order_modal').modal('show');
    });
    $('#close_order').click(function() {
        $('#order_modal').modal('hide');
    });

    // edit the infomation of the selected product
    $('#order_list .edit-order').on("click",function(){

        $('#order_modal').modal('show');

        var order_id =  $(this).data("id");
        var params = {
            order_id: order_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'order/getorder',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#order_id').val(result.id);
                    $('#order_num').val(result.order_number);
                    $('#order_product').val(result.product_name);
                    $('#order_amount').val(result.order_amount);
                    $('#buyer_name').val(result.buyer_name);
                    $('#buyer_phone').val(result.buyer_phone);
                    $('#delivery_type').val(result.delivery_type);
                    $('#pay_state').val(result.pay_state);
                    $('#pay_amount').val(result.pay_amount);
                    $('#express_num').val(result.expressNum);
                    
                    update_order_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });    

    // upload the thumb
    var upload_image = function (product_id) {        
        var file_data = $('#product_image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: base_url + 'product/do_upload',
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {  
                console.log(response);
                if(response == '1'){
                    alert('File exist already!');
                } else {
                    save_imgurl(product_id, response);     
                }                               
            },
            error: function (response) {
                alert('File upload failed!');
            }
        });
    }

    var save_imgurl = function (product_id, img_url) {
        var params = {
            product_id: product_id,
            img_url: img_url
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'product/save_url',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                alert('Thumb image upload failed!');
            }
        });
    }

    // upload the covers
    var upload_covers = function (product_id) {        
        var file_data = $('#product_cover').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: base_url + 'product/do_upload_cover',
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {  
                console.log(response);
                if(response == '1'){
                    alert('File exist already!');
                } else {
                    save_imgurl_cover(product_id, response);     
                }                               
            },
            error: function (response) {
                alert('Cover image upload failed!');
            }
        });
    }

    var save_imgurl_cover = function (product_id, img_url) {
        var params = {
            product_id: product_id,
            img_url: img_url
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'product/save_url_cover',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                alert('saving the url for cover image was failed!');
            }
        });
    }
    /***************************** */
    /* Category                    *
    /******************************/ 

    $('#add_category').click(function() {
        $('#category_modal').modal('show');
    });
    $('.edit-category').click(function() {
        $('#category_modal').modal('show');
    });
    $('#close_category').click(function() {
        $('#category_modal').modal('hide');
    });

    $('#save_category').click(function() {
        var params = {
            category_id: $('#category_id').val(),
            category_name: $('#category_name').val(),
            
        }; 
        var url = base_url;
        if(update_category_flag == true){
            url += 'product/updatecategory';
        } else {
            url += 'product/add_category';
        }      
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

     // edit the infomation of the selected product
    $('#category_list .edit-category').on("click",function(){

        $('#category_modal').modal('show');

        var category_id =  $(this).data("id");
        var params = {
            category_id: category_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'product/getcategory',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#category_id').val(result.id);
                    $('#category_name').val(result.name);                    
                    update_category_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // delete the infomation of the selected category
    $('#category_list .delete-category').on("click",function(){
        var category_id =  $(this).data("id");
        var params = {
            category_id: category_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'product/deletecategory',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    location.reload();                   
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#product_image').change(function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                $("#product_thumb").attr("src", fr.result); 
            }
            fr.readAsDataURL(files[0]);
        }
        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });

    $('#product_cover').change(function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                $('#product_cover_container').prepend($('<img>',{class:'product_cover_img product_thumb_content img-responsive',src:fr.result}));
            }
            fr.readAsDataURL(files[0]);
        }
        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
        cover_flag = true;
    });

    // export table to excel
    $("#out_xls").click(function(e) {
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('order_wrapper');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        console.log(table_html);
        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
    });

    // export a record to excel
    $(".record-excel").click(function(e) {
        // e.preventDefault();

        // //getting data from our table
        // var data_type = 'data:application/vnd.ms-excel';
        // var thead = $('#order_wrapper thead');
        // var table_html = thead.html().replace(/ /g, '%20');

        // var a = document.createElement('a');
        // a.href = data_type + ', ' + table_html;
        // a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        // a.click();
    });

    /*************************** */
    /*  Multiple Search          *
    /*************************** */

    $('#order_time_from').datetimepicker({
        timepicker:false,
        onSelect:function(dp,$input){
            alert($input.val())
        }
    });
    $('#order_time_to').datetimepicker();

   
});

$(window).on('load', function () {
    var dom, countDownDate;
    //count down timer
    var init = function(){
        $('.group-remain').each(function(){
            var url = base_url + 'order/getremaintime';
            var params = {
                order_id: $(this).data('id')
            }
            var that = this;
            $.ajax({
                url: base_url + 'order/checkOwnGroup',
                dataType: 'json',                
                type: 'post',
                data: params,
                success: function (response) {  
                    if(response == '1'){
                        $.ajax({
                            url: url,
                            dataType: 'json',               
                            type: 'post',
                            data: params,
                            success: function (response) {  
                                //console.log(response);  
                                for(key in response){
                                    countDownDate = new Date(response[key].starttime).getTime() + response[key].endtime*60*60;
                                    dom = $(that);
                                    // Update the count down every 1 second
                                    setInterval(timecount, 1000);
                                }                                        
                            },
                            error: function (response) {                
                            }
                        });
                    }                                                                 
                }                
            });            
        });
        

        var timecount = function() {
            
            // Get todays date and time
            var now = new Date().getTime();
            //console.log(now);
            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            var element_id = '#group-remain' + key;
            // document.getElementsById(element_id).innerHTML = days + "d " + hours + "h "
            // + minutes + "m " + seconds + "s ";
            
            var html = hours + ':' + minutes;
            dom.html(html);
            console.log(dom);
            // If the count down is finished, write some text 
            if (distance < 0) {
                clearInterval(timecount);
                //document.getElementsByClassName("test_time").innerHTML = "EXPIRED";
            }
        }
    }   

    init();
});