<div class="row">
    <form id="shop_info" class="col-md-6">
        <input type="hidden" id="shop_id">
        <div class="form-group">
            <label>Shop Name:</label>
            <input type="text" class="form-control"placeholder="Enter Shop Name" id="shop_name" required>
        </div>
        <div class="form-group">
            <label>Shop Address:</label>
            <input type="text" class="form-control" placeholder="Enter Shop Address" id="shop_address" required>
        </div>                     
        <button type="button" id="save_shop" class="btn btn-default">Save</button>
    </form>
</div>                
<div class="table-responsive">          
    <table id="shop_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>shop name</th>
                <th>Address</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($shop_list as $key => $value) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['shop_name']; ?></td>
                <td><?php echo $value['shop_address']; ?></td>      
                <td>
                    <i class="fa fa-pencil edit-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>