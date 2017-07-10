<div class="modal" id="publicity_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h2>宣传</h2>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="publicity_info" class="horizontal-form">
                    <input type="hidden" id="publicity_id">
                    <div class="form-group">
                        <label>对应商品:</label>
                        <select class="form-control" id="publicity_product">
                            <option value=""></option>
                            <?php foreach($product_list as $product) { ?>
                            <option value="<?php echo $product['id'];?>"><?php echo $product['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>开始时间:</label>
                        <input class="form-control" id="start_time" required>
                    </div>   
                    <div class="form-group">
                        <label>截止时间:</label>
                        <input class="form-control" id="end_time" required>
                    </div>  
                    <div class="form-group required">                        
                        <label class="control-label col-md-4  requiredField">图片</label>                                              
                        <div class="controls col-md-8">   
                            <div style="width:300px; height: 300px;background-color:grey;">
                                <img src="" id="publicity_thumb" class="img-responsive">
                            </div>                          
                            <input class="input-md textinput textInput form-control" id="publicity_img" style="margin-bottom: 10px" type="file"/>
                        </div>  
                    </div>                 
                    <button type="button" id="save_publicity" class="btn btn-success">保 存</button>
                    <button type="button" id="close_publicity" class="btn btn-danger" style="float:right;">关 闭</button>
                </form>
            </div>
        </div>
    </div>    
</div> 

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_publicity">新 建 宣 传</button>
</div> 

<div class="table-responsive" style="margin-top: 20px;">          
    <table id="publicity_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">对应商品</th>
                <th class="text-center">开始时间</th>
                <th class="text-center">截止时间</th>              
                <th class="text-center">图片</th>  
                <th>编辑 / 删除</th>                           
            </tr>
        </thead>
        <tbody>
            <?php foreach($publicity_list as $key => $value) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $value['product_name']; ?></td>
                <td class="text-center"><?php echo $value['starttime']; ?></td> 
                <td class="text-center"><?php echo $value['endtime']; ?></td>   
                <td class="text-center"><?php echo $value['imgurl']; ?></td>              
                <td>
                    <i class="fa fa-pencil edit-publicity" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-publicity" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>