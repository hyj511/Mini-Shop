<div class="modal" id="shop_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>门店</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="shop_info" class="horizontal-form">
                    <input type="hidden" id="shop_id">
                    <div class="form-group">
                        <label>名称:</label>
                        <input type="text" class="form-control"placeholder="" id="shop_name" required>
                    </div>
                    <div class="form-group">
                        <label>地址:</label>
                        <input type="text" class="form-control" placeholder="" id="shop_address" required>
                    </div> 
                    <div class="form-group">
                        <label>位置:</label>
                        <input type="text" class="form-control" placeholder="" id="shop_location" required>
                    </div>
                    <div class="form-group">
                        <label>联系电话:</label>
                        <input type="text" class="form-control" placeholder="" id="shop_phone" required>
                    </div>                    
                    <button type="button" id="save_shop" class="btn btn-success">保存</button>
                    <button type="button" id="close_shop" class="btn btn-danger" style="float:right;">关闭</button>
                </form>
            </div>
        </div>
    </div>    
</div>     

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_shop">新建门店</button>
</div> 

<div class="table-responsive">          
    <table id="shop_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">名称</th>
                <th class="text-center">地址</th>
                <th class="text-center">位置</th>
                <th class="text-center">联系电话</th>
                <th>编辑 / 删除</th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($shop_list as $key => $value) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $value['shop_name']; ?></td>
                <td class="text-center"><?php echo $value['shop_address']; ?></td> 
                <td class="text-center"><?php echo $value['shop_location']; ?></td>
                <td class="text-center"><?php echo $value['shop_phone']; ?></td>     
                <td>
                    <i class="fa fa-pencil edit-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>