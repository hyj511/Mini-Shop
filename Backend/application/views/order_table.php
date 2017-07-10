<div class="modal" id="order_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>订单详情</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="order_info" class="horizontal-form">
                    <input type="hidden" id="order_id">
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">订单号</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="order_num" maxlength="30" placeholder="Enter order number" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">商品名称</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="order_product" maxlength="30" placeholder="Enter product name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">数量</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  form-control" id="order_amount" style="margin-bottom: 10px" >
                        </div>     
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">姓名</label>
                        <div class="controls col-md-8 ">                           
                            <input class="input-md textinput textInput form-control" id="buyer_name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">手机号</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="buyer_phone" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required"> 
                        <label class="control-label col-md-4  requiredField">渠道</label> 
                        <div class="controls col-md-8 "> 
                            <select class="form-control" id="delivery_type" style="margin-bottom: 10px">
                                <option value="0">自提</option>
                                <option value="1">发货</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group required"> 
                        <label class="control-label col-md-4  requiredField">订单状态</label> 
                        <div class="controls col-md-8 "> 
                            <select class="form-control" id="buy_type" style="margin-bottom: 10px">
                                <option value="0">立即购买</option>
                                <option value="1">拼团</option>
                            </select>
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
                        <label class="control-label col-md-4  requiredField">支付状态</label>
                        <div class="controls col-md-8 "> 
                            <select class="form-control" id="pay_state" style="margin-bottom: 10px">
                                <option value="0">未支付</option> 
                                <option value="1">拼团中</option>  
                                <option value="2">拼团失败</option> 
                                <option value="3">拼团成功</option>
                                <option value="4">待发货</option> 
                                <option value="5">已发货</option>  
                                <option value="6">已完结</option> 
                                <option value="7">申请退款</option>
                                <option value="8">退款处理中</option> 
                                <option value="9">退款完成</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">支付金额</label>
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="pay_amount" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">发货快递单号</label>
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="express_num" style="margin-bottom: 10px" type="text" />
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
    <form action="<?php echo base_url('order/getOrderList'); ?>" method="post">
        <div class="row">
            <div class="col-md-2">
                <p>商品名称<input type="text" class="form-control" name="product_name" value="<?php echo $search_product_name;?>"/></p>
            </div>
            <div class="col-md-2">
                <p>门店名称<input type="text" class="form-control" name="shop_name" value="<?php echo $serch_shop_name;?>"/></p>
            </div>
            <div class="col-md-2">
                <p>用户名<input type="text" class="form-control" name="buyer_name" value="<?php echo $serch_buyer_name;?>"/></p>
            </div>
            <div class="col-md-2">
                <p>手机号<input type="text" class="form-control" name="buyer_phone" value="<?php echo $serch_buyer_phone;?>"/></p>
            </div>
        </div>      
        <div class="row" style="margin-top:20px;">
            <div class="col-md-2">
                <p>订单时间 (从)<input class="form-control" name="order_time_from" id="order_time_from"></p>
            </div>
            <div class="col-md-2">
                <p>订单时间 (到)<input class="form-control" name="order_time_to" id="order_time_to"></p>
            </div>
            <div class="col-md-2">
                <p>渠道
                    <select class="form-control" name="delivery_type">
                        <option value="" <?php if($search_delivery_type == '') echo 'selected'; ?>></option>
                        <option value="1" <?php if($search_delivery_type == 1) echo 'selected'; ?>>自提</option> 
                        <option value="2" <?php if($search_delivery_type == 2) echo 'selected'; ?>>发货</option>   
                    </select>
                </p>
            </div>
            <div class="col-md-2">
                <p>订单状态
                    <select class="form-control" name="buy_type">
                        <option value="" <?php if($search_buy_type == '') echo 'selected'; ?>></option>
                        <option value="1" <?php if($search_buy_type == 1) echo 'selected'; ?>>立即购买</option> 
                        <option value="2" <?php if($search_buy_type == 2) echo 'selected'; ?>>拼团</option>   
                    </select>
                </p>
            </div>
            <div class="col-md-2">
                <p>支付状态
                    <select class="form-control" name="order_state">
                        <option value="" <?php if($search_order_state == '') echo 'selected'; ?>></option>
                        <option value="1" <?php if($search_order_state == 1) echo 'selected'; ?>>未支付</option> 
                        <option value="2" <?php if($search_order_state == 2) echo 'selected'; ?>>拼团中</option>  
                        <option value="3" <?php if($search_order_state == 3) echo 'selected'; ?>>拼团失败</option> 
                        <option value="4" <?php if($search_order_state == 4) echo 'selected'; ?>>拼团成功</option>                        
                        <option value="5" <?php if($search_order_state == 5) echo 'selected'; ?>>已完结</option> 
                        <option value="6" <?php if($search_order_state == 6) echo 'selected'; ?>>申请退款</option>
                        <option value="7" <?php if($search_order_state == 7) echo 'selected'; ?>>退款处理中</option> 
                        <option value="8" <?php if($search_order_state == 8) echo 'selected'; ?>>退款完成</option>
                    </select>
                </p>
            </div>
            <div class="col-md-1">
                <label>&nbsp;   
                    <button type="submit" class="form-control btn btn-primary">搜索</button>
                </label>
            </div>
        </div>        
    </form>
    <div id="order_wrapper">     
        <table id="order_list" class="table table-hover table-striped" style="margin-top:30px;">
            <div id="thead_wrapper">            
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">订单号</th>
                    <th class="text-center">商品名称</th>
                    <th class="text-center">数量</th>
                    <th class="text-center">门店</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">手机号</th>
                    <th class="text-center">地址</th>
                    <th class="text-center">渠道</th>
                    <th class="text-center">拼团人数</th>
                    <th class="text-center">倒计时</th>   
                    <!--<th>拼团价</th>-->
                    <th class="text-center">订单状态</th>
                    <th class="text-center">支付状态</th>                    
                    <th class="text-right">支付金额</th>
                    <th class="text-right">发货快递单号</th>
                    <th class="text-center">订单时间</th>
                    <th class="text-center">
                        <!--<i></i><i></i><i>&nbsp;</i>-->
                        <!--<i class="fa fa-file-excel-o" aria-hidden="true" id="out_xls"></i>-->
                        <button id="out_xls" class="btn btn-danger">导出 Excel</button>
                    </th>                             
                </tr>
            </thead>
            </div>
            <tbody>
                <?php foreach($order_list as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?php echo $key + 1; ?></td>
                    <td class="text-center"><?php echo $value['order_number']; ?></td>
                    <td class="text-center"><?php echo $value['product_id']; ?></td>
                    <td class="text-center"><?php echo $value['order_amount']; ?></td> 
                    <td class="text-center"><?php echo $value['shop_name']; ?></td>              
                    <td class="text-center"><?php echo $value['buyer_name']; ?></td>  
                    <td class="text-center"><?php echo $value['buyer_phone']; ?></td>
                    <td class="text-center"><?php echo $value['buyer_address']; ?></td>
                    <td class="text-center"><?php echo $value['delivery_type']; ?></td>
                    <td class="text-center"><?php echo $value['groupCount']; ?></td>
                    <td class="group-remain" data-id="<?php echo $value['id']; ?>"></td>
                    <!--<td></td>-->
                    <td class="text-center"><?php echo $value['buy_type']; ?></td>
                    <td class="text-center"><?php echo $value['pay_state']; ?></td>                    
                    <td class="text-right"><?php echo $value['pay_amount']; ?></td> 
                    <td class="text-right"><?php echo $value['expressNum']; ?></td>  
                    <td class="text-center"><?php echo $value['orderTime']; ?></td>
                    <td class="text-center">
                        <button type="" class="btn btn-success">已发货</button>
                        <!--<i class="fa fa-pencil edit-order" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                        <i class="fa fa-trash-o delete-order" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>-->
                        <!--<i class="fa fa-file-excel-o record-excel" aria-hidden="true"></i>-->
                    </td>                          
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>