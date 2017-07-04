<div class="modal" id="order_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>Order</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="order_info" class="horizontal-form">
                    <input type="hidden" id="order_id">
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField"> Order Product</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="order_product" maxlength="30" placeholder="Enter product name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField"> Order Amount</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  form-control" id="order_amount" style="margin-bottom: 10px" >
                        </div>     
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Buyer Name</label>
                        <div class="controls col-md-8 ">                           
                            <input class="input-md textinput textInput form-control" id="buyer_name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField"> Buy Type</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="buy_type" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required"> 
                        <label class="control-label col-md-4  requiredField"> Shop</label> 
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="order_shop" style="margin-bottom: 10px" type="text" />
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
                        <label class="control-label col-md-4  requiredField">Pay State</label>
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="pay_state" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Pay amount</label>
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="pay_amount" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField"> Express Fee</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="express_fee" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>  
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Order state</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="order_state" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">History State</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="history_state" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Delivery num</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="delivery_num" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>    
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Delivery type</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="delivery_type" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>  
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">Buyer Address</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="buyer_address" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>   
                    <button type="button" id="save_order" class="btn btn-default">Save</button>
                    <button type="button" id="close_order" class="btn btn-default" style="float:right;">Close</button>
                </form>
           </div>
        </div>
    </div>    
</div> 

<div class="table-responsive" style="margin-top:50px;">          
    <table id="order_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>product</th>
                <th>amount</th>
                <th>Buyer</th>
                <th>Pay Amount</th>
                <th></th>                             
            </tr>
        </thead>
        <tbody>
            <?php foreach($order_list as $key => $value) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['product_id']; ?></td>
                <td><?php echo $value['order_amount']; ?></td> 
                <td><?php echo $value['buyer_name']; ?></td>  
                <td><?php echo $value['pay_amount']; ?></td>   
                <td>
                    <i class="fa fa-pencil edit-order" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-order" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>