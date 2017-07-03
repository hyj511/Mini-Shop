<div class="modal" id="admin_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>Administrator</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="admin_info" class="horizontal-form">
                    <input type="hidden" id="admin_id">
                    <div class="form-group">
                        <label>Administrator Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="admin_name" required>
                    </div>
                    <div class="form-group">
                        <label>Administrator Email:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="admin_email" required>
                    </div>   
                    <div class="form-group">
                        <label>shop:</label>
                        <select class="form-control" id="admin_shop">
                            <option value=""></option>
                            <?php foreach($shop_list as $shop) { ?>
                            <option value="<?php echo $shop['id'];?>"><?php echo $shop['shop_name'];?></option>
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
    <button class="btn btn-primary" id="add_admin">Add Administrator</button>
</div> 

<div class="table-responsive" style="margin-top: 20px;">          
    <table id="admin_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>shop</th>
                <th>Role</th>
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