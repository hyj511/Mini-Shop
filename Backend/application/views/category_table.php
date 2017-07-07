<div class="modal" id="category_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>Category</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="category_info" class="horizontal-form">
                    <input type="hidden" id="category_id">
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="category_name" required>
                    </div>                                      
                    <button type="button" id="save_category" class="btn btn-default">Save</button>
                    <button type="button" id="close_category" class="btn btn-default" style="float:right;">Close</button>
                </form>
            </div>
        </div>
    </div>    
</div> 

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_category">Add Category</button>
</div> 

<div class="table-responsive" style="margin-top: 20px;">          
    <table id="category_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($category_list as $key => $value) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td>
                    <i class="fa fa-pencil edit-category" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-category" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>