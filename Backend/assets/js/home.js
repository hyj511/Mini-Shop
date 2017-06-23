$(document).ready(function() {

    var base_url = 'http://localhost/index.php/';
    var update_flag = false;

    $('#save_shop').click(function() {
        var params = {
            shop_id: $('#shop_id').val(),
            shop_name: $('#shop_name').val(),
            shop_address: $('#shop_address').val()
        }; 
        var url = base_url;
        if(update_flag == true){
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
                    update_flag = true;            
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
});