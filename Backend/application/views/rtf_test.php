<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
 
    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
 
        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
         
        <script src="<?php echo base_url()  ?>asset/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: "link image"
         });
          
        </script>
</head>
<body>
    <div class="container">
         
        <div class="row clear_fix">
            <div class="col-md-12">
                 
                <blockquote style="background: #333; color: #fff">
                <h3>Rich text editor in codeigniter</h3>
                <a href="http://www.facebook.com/pariharvikram1989"><cite>By: Vikram Parihar</cite></a>
            </blockquote>
             
            </div>
        </div>
         
        <div class="row clear_fix">
             
            <div class="col-md-12">
                <form role="form" id="frmArticle" class="form" action="<?php echo base_url() ?>home/addArticle" method="POST">
                    <lablel>Title</lablel>
                    <input type="text" name="title" class="form-control">
                    <lablel>Content</lablel>
                    <textarea id="article" name="article" rows="8" class="form-control"></textarea>
                    <input class="btn btn-info btn-block" type="submit" value="Add new article" name="submit">
                </form>
                 
            </div>
             
        </div>
         
         
        <div class="row clear_fix">
             
            <div class="col-md-12 response">
            </div>
             
        </div>
         
    </div>
 
    <script>
    $(document).ready(function(){
        loadArticle();
        $("#frmArticle").submit(function (e){
            e.preventDefault();
            tinymce.triggerSave();
            var data = $(this).serialize();
            var type = $(this).attr('method');
            var url = $(this).attr('action');
            console.log(data);
             
            $.ajax({
                url:url,
                type: type,
                data: data
            }).done(function (html){
                $('#frmArticle')[0].reset();
                loadArticle();
            });
        });
    });
     
    function loadArticle(){
        $.ajax({
                url:'<?php echo base_url() ?>rfttest/loadArticle',
                type: 'GET'
            }).done(function (html){
                $(".response").html(html);
            });
    };
    </script>
</body>
</html>