<div class="row">
    <form id="product_info" class="col-md-6">
        <input type="hidden" id="product_id">
        <div class="form-group required">
            <label class="control-label col-md-4  requiredField"> Product Name</label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="product_name" maxlength="30" placeholder="Enter product name" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label col-md-4  requiredField"> Description</label>
            <div class="controls col-md-8 ">
                <textarea class="input-md  form-control" id="product_description" style="margin-bottom: 10px" ></textarea>
            </div>     
        </div>
        <div class="form-group required">
            <label class="control-label col-md-4  requiredField">Category</label>
            <div class="controls col-md-8 "> 
                <input class="input-md textinput textInput form-control" id="category" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label col-md-4  requiredField"> Classification</label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="classification" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <div class="form-group required"> 
            <label class="control-label col-md-4  requiredField"> Origin Price</label> 
            <div class="controls col-md-8 "> 
                <input class="input-md textinput textInput form-control" id="origin_price" style="margin-bottom: 10px" type="text" />
            </div>
        </div>
        <!--
        <div class="form-group required">
            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                    <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Male</label>
                    <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female </label>
            </div>
        </div> -->
        <div class="form-group required"> 
            <label class="control-label col-md-4  requiredField">  Promotion Price</label>
            <div class="controls col-md-8 "> 
                <input class="input-md textinput textInput form-control" id="promotion_price" style="margin-bottom: 10px" type="text" />
            </div>
        </div> 
        <div class="form-group required">
            <label class="control-label col-md-4  requiredField"> Inventory</label>
            <div class="controls col-md-8 "> 
                <input class="input-md textinput textInput form-control" id="inventory" style="margin-bottom: 10px" type="text" />
            </div>
        </div> 
        <div class="form-group required">
                <label class="control-label col-md-4  requiredField"> Express Fee</label>
                <div class="controls col-md-8 ">
                    <input class="input-md textinput textInput form-control" id="express_fee" style="margin-bottom: 10px" type="text" />
            </div> 
        </div>        
        <button type="button" id="save_product" class="btn btn-default">Save</button>
    </form>
</div>                
<div class="table-responsive">          
    <table id="product_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-right">No</th>
                <th class="text-center">product name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Category</th>
                <th class="text-center">Classification</th>
                <th class="text-right">Origin Price</th>
                <th class="text-right">Promotion Price</th>
                <th class="text-right">Inventory</th>
                <th class="text-right">Express Fee</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($product_list as $key => $value) { ?>
            <tr>
                <td class="text-right"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $value['name']; ?></td>
                <td class="text-center"><?php echo $value['description']; ?></td>  
                <td class="text-center"><?php echo $value['category']; ?></td>    
                <td class="text-center"><?php echo $value['classification']; ?></td>
                <td class="text-right"><?php echo $value['origin_price']; ?></td>    
                <td class="text-right"><?php echo $value['promotion_price']; ?></td>    
                <td class="text-right"><?php echo $value['inventory']; ?></td>    
                <td class="text-right"><?php echo $value['express_fee']; ?></td>        
                <td>
                    <i class="fa fa-pencil edit-product" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-product" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>