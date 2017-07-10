
<!--<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_shop">新建门店</button>
</div> -->

<div class="table-responsive">  
    <form action="<?php echo base_url('statistic'); ?>" method="post">
        <div class="row">
            <div class="col-md-2">
                <p>商品名称<input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>"/></p>
            </div>
            <div class="col-md-2">
                <p>门店名称<input type="text" class="form-control" name="shop_name" value="<?php echo $shop_name;?>"/></p>
            </div>
        </div>      
        <div class="row" style="margin-top:20px;">
            <div class="col-md-2">
                <p>订单时间 (从)<input class="form-control" name="order_time_from" id="statistic_from"></p>
            </div>
            <div class="col-md-2">
                <p>订单时间 (到)<input class="form-control" name="order_time_to" id="statistic_to"></p>
            </div>
            <div class="col-md-2">
                <p>渠道
                    <select class="form-control" name="delivery_type">
                        <option value="" <?php if($delivery_type == '') echo 'selected';?>></option>
                        <option value="1" <?php if($delivery_type == 1) echo 'selected';?>>自提</option> 
                        <option value="2" <?php if($delivery_type == 2) echo 'selected';?>>发货</option>   
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

    <table id="shop_list" class="table table-hover table-striped" style="margin-top:30px;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">商品名称</th>
                <th class="text-center">销售数量</th>
                <th class="text-center">金额</th>
                <th class="text-center">订单数</th>
                <th class="text-center">退货量</th>
                <!--<th></th>                             -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($statistic_list as $key => $value) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $value['name'] ?></td>
                <td class="text-center"><?php echo $value['sales_volume'] ?></td>
                <td class="text-center"><?php echo $value['pay_amount'] ?></td> 
                <td class="text-center"><?php echo $value['order_count'] ?></td>
                <td class="text-center"><?php echo $value['refund_count'] ?></td>     
                <!--<td>
                    <i class="fa fa-pencil edit-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-shop" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          -->
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>