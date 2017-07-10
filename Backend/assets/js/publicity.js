/*************************** */
/*  Publicity                *
/*************************** */

$(document).ready(function(){
    
    var base_url = 'http://localhost/';
    //var base_url = 'https://hly.weifengkeji.top/';
    var update_flag = false;

    $('#start_time').datetimepicker();
    $('#end_time').datetimepicker();

    $('#add_publicity').click(function() {
        $('#publicity_modal').modal('show');
        $('#publicity_product').val('');
        $('#start_time').val('');
        $('#end_time').val('');
        $("#publicity_thumb").attr("src", base_url + 'uploads/default.png'); 
    });

    $('#close_publicity').click(function() {
        $('#publicity_modal').modal('hide');
    });   

    $('#save_publicity').click(function() {        
        var params = {
            publicity_id: $('#publicity_id').val(),
            publicity_product: $('#publicity_product').val(),
            start_time: $('#start_time').val(),
            end_time: $('#end_time').val()
        }; 
        var url = base_url;
        if(update_flag == true){
            url += 'publicity/update';
            upload_image(params.publicity_id);
        } else {
            url += 'publicity/add';
        }      
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result != false) {
                    console.log(result);
                    upload_image(result);
                } 
            }
        });
    });

    // edit the infomation of the selected publicity
    $('#publicity_list .edit-publicity').on("click",function(){
        $('#publicity_modal').modal('show');
        var publicity_id =  $(this).data("id");
        var params = {
            publicity_id: publicity_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'publicity/get',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result != false) {    
                    $('#publicity_id').val(result.id);            
                    $('#publicity_product').val(result.product_id);
                    $('#start_time').val(result.starttime);
                    $('#end_time').val(result.endtime);                    
                    if(result.imgurl != '') {
                        $("#publicity_thumb").attr("src", base_url + 'uploads/' + result.imgurl);  
                    }                          
                    update_flag = true;            
                }
            }
        });
    });

    // delete the infomation of the selected publicity
    $('#publicity_list .delete-publicity').on("click",function(){
        var publicity_id =  $(this).data("id");
        var params = {
            publicity_id: publicity_id
        }
        $.ajax({
            type: "POST",
            url: base_url + 'publicity/delete',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result != false) location.reload();
            }
        });
    });    

    $('#publicity_img').change(function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                $("#publicity_thumb").attr("src", fr.result); 
            }
            fr.readAsDataURL(files[0]);
        }
    });

    // upload the image
    var upload_image = function (publicity_id) {        
        var file_data = $('#publicity_img').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: base_url + 'publicity/do_upload',
            dataType: 'text', 
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {  
                if(response == 1){
                    alert('The file exist already!');                       
                } else if(response == 2) {
                    alert('Error happned during uploading image!');
                } else {
                    save_imgurl(publicity_id, response);   
                }                                          
            }            
        });
    }

    var save_imgurl = function (publicity_id, img_url) {
        var params = {
            publicity_id: publicity_id,
            img_url: img_url
        };  
        console.log(params);      
        $.ajax({
            type: "POST",
            url: base_url + 'publicity/save_url',
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result != false) location.reload();                   
            }
        });
    }
});