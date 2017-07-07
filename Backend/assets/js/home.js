$(document).ready(function() {

    var base_url = 'http://localhost/index.php/';
    var update_shop_flag = false;
    var update_product_flag = false;
    var update_admin_flag = false;
    var update_category_flag = false;

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
            product_express_fee: $('#express_fee').val(),
            group_num: $('#group_num').val(),
            group_price: $('#group_price').val(),
            group_time: $('#group_time').val(),
        }; 
        var url = base_url;
        if(update_product_flag == true){
            url += 'product/updateproduct';
        } else {
            url += 'product/addproduct';
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
                        upload_image($('#product_id').val()); 
                    } else {
                        upload_image(result);    
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
                    $('#origin_price').val(result.origin_price);   
                    $('#promotion_price').val(result.promotionPrice); 
                    $('#inventory').val(result.inventory);   
                    $('#express_fee').val(result.expressFee); 
                    $('#group_num').val(result.groupNum);
                    $('#group_price').val(result.groupPrice);
                    $('#group_time').val(result.groupTime);
                    update_product_flag = true;            
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

        // $('#order_modal').modal('show');

        // var order_id =  $(this).data("id");
        // var params = {
        //     order_id: order_id
        // }
        // $.ajax({
        //     type: "POST",
        //     url: base_url + 'order/getorder',
        //     data: params,
        //     dataType: 'json',
        //     success: function(result) {
        //         if(result == false) {
        //             alert('failed!');
        //         } else {
        //             $('#product_id').val(result.id);
        //             $('#product_name').val(result.name);
        //             $('#product_description').val(result.description);   
        //             $('#category').val(result.category); 
        //             $('#classification').val(result.classification);
        //             $('#origin_price').val(result.origin_price);   
        //             $('#promotion_price').val(result.promotion_price); 
        //             $('#inventory').val(result.inventory);   
        //             $('#express_fee').val(result.express_fee); 
        //             $('#group_num').val(result.group_num);
        //             $('#group_price').val(result.group_price);
        //             $('#group_time').val(result.group_time);
        //             update_product_flag = true;            
        //         }
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    });

    // upload the image
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
                console.log(error);
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

});