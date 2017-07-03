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