$(document).ready(function() {

    var base_url = 'http://localhost/index.php/';

    // show register form
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    // register new administrator
    $('#regAdmin').click(function(){
        var params = {
            admin_name: $('#admin_name').val(),
            admin_pwd: $('#admin_pwd').val(),
            admin_email: $('#admin_email').val()
        }; 
        var url = base_url + 'login/register';
        console.log(params);
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == false) {
                    console.log(result);
                } else {
                    location.reload();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });    

    // login
    $('#login').click(function(){
        var params = {
            admin_name: $('#login_name').val(),
            admin_pwd: $('#login_pwd').val(),
        }; 
        var url = base_url + 'login/login_accept';
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType: 'json',
            success: function(result) {
                if(result == '2') {
                    console.log('faild');
                } else {
                    location.href = base_url + 'home';
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });    
});