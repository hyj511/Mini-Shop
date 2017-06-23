<div class="row">
    <form id="admin_info" class="col-md-6">
        <input type="hidden" id="admin_id">
        <div class="form-group">
            <label>Administrator Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" id="admin_name" required>
        </div>
        <div class="form-group">
            <label>Administrator Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="admin_email" required>
        </div>                     
        <button type="button" id="save_admin" class="btn btn-default">Save</button>
    </form>
</div>                
<div class="table-responsive">          
    <table id="admin_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
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