$(document).ready(function() {

    var base_url = 'http://localhost/index.php/';
    var update_shop_flag = false;
    var update_product_flag = false;

    // tab status
    $('.nav-tabs li').click(function() {
        var id = $(this).data("id");
        var url = base_url + 'home/settab?id=' + id;
        $.ajax({
            type: "GET",
            url: url,
            success: function(result) {    
                console.log(result);           
            }           
        });
    });

    $('#save_shop').click(function() {
        var params = {
            shop_id: $('#shop_id').val(),
            shop_name: $('#shop_name').val(),
            shop_address: $('#shop_address').val()
        }; 
        var url = base_url;
        if(update_shop_flag == true){
            url += 'home/updateshop';
        } else {
            url += 'home/add_shop';
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
        var shop_id =  $(this).data("id");
        var params = {
            shop_id: shop_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'home/getshop',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    alert('failed!');
                } else {
                    $('#shop_name').val(result.shop_name);
                    $('#shop_address').val(result.shop_address);   
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
            url: base_url + 'home/delete_shop',
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

    // delete the infomation of the selected shop 
    $('#admin_list .delete-admin').on("click",function(){
        var admin_id =  $(this).data("id");
        var params = {
            admin_id: admin_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'home/deleteuser',
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
        }; 
        var url = base_url;
        if(update_product_flag == true){
            url += 'home/updateproduct';
        } else {
            url += 'home/addproduct';
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

    // delete the infomation of the selected product
    $('#product_list .delete-product').on("click",function(){
        var product_id =  $(this).data("id");
        var params = {
            product_id: product_id
        };        
        $.ajax({
            type: "POST",
            url: base_url + 'home/deleteproduct',
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
        var product_id =  $(this).data("id");
        var params = {
            product_id: product_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'home/getproduct',
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
                    $('#promotion_price').val(result.promotion_price); 
                    $('#inventory').val(result.inventory);   
                    $('#express_fee').val(result.express_fee); 
                    update_product_flag = true;            
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

});