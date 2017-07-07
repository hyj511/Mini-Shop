<div class="modal" id="admin_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>管理员</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="admin_info" class="horizontal-form">
                    <input type="hidden" id="admin_id">
                    <div class="form-group">
                        <label>名称:</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="admin_name" required>
                    </div>
                    <div class="form-group">
                        <label>邮件:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="admin_email" required>
                    </div>   
                    <div class="form-group">
                        <label>门店:</label>
                        <select class="form-control" id="admin_shop">
                            <option value=""></option>
                            <?php foreach($shop_list as $shop) { ?>
                            <option value="<?php echo $shop['id'];?>"><?php echo $shop['shop_name'];?></option>
                            <?php }?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>权限:</label>
                        <select class="form-control" id="admin_role">
                            <option value=""></option>
                            <?php foreach($roles as $role) { ?>
                            <option value="<?php echo $role['id'];?>"><?php echo $role['role_name'];?></option>
                            <?php }?>
                        </select>
                    </div>                 
                    <button type="button" id="save_admin" class="btn btn-default">Save</button>
                    <button type="button" id="close_admin" class="btn btn-default" style="float:right;">Close</button>
                </form>
            </div>
        </div>
    </div>    
</div> 

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_admin">新建管理员</button>
</div> 

<div class="table-responsive" style="margin-top: 20px;">          
    <table id="admin_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>名称</th>
                <th>邮件</th>
                <th>门店</th>
                <th>权限</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($admin_list as $key => $value) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['admin_name']; ?></td>
                <td><?php echo $value['admin_email']; ?></td> 
                <td><?php echo $value['shop']; ?></td>   
                <td><?php echo $value['admin_role']; ?></td>     
                <td>
                    <i class="fa fa-pencil edit-admin" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-admin" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>