<div class="modal" id="shop_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>Shop</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="shop_info" class="horizontal-form">
                    <input type="hidden" id="shop_id">
                    <div class="form-group">
                        <label>Shop Name:</label>
                        <input type="text" class="form-control"placeholder="Enter Shop Name" id="shop_name" required>
                    </div>
                    <div class="form-group">
                        <label>Shop Address:</label>
                        <input type="text" class="form-control" placeholder="Enter Shop Address" id="shop_address" required>
                    </div> 
                    <div class="form-group">
                        <label>Shop Phone:</label>
                        <input type="text" class="form-control" placeholder="Enter Shop Phone Number" id="shop_phone" required>
                    </div>                    
                    <button type="button" id="save_shop" class="btn btn-default">Save</button>
                    <button type="button" id="close_shop" class="btn btn-default" style="float:right;">Close</button>
                </form>
            </div>
        </div>
    </div>    
</div>     

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_shop">Add Shop</button>
</div> 

<div class="table-responsive">          
    <table id="shop_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>shop name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($shop_list as $key => $value) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['shop_name']; ?></td>
                <td><?php echo $value['shop_address']; ?></td> 
                <td><?php echo $value['shop_phone']; ?></td>     
                <td>
                    <i class="fa fa-pencil edit-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>