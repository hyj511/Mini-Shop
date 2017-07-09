<div class="modal" id="product_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dark-bar">
			        <div class="row">
			        	<div class="col-md-12 text-center">
							<h4>商品详情</h4>
			           	</div>
			        </div>
			    </div>
            </div>
            <div class="modal-body">
                <form id="product_info" class="horizontal-form">
                    <input type="hidden" id="product_id">
                    <input type="hidden" id="group_id">
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">名称</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="product_name" maxlength="30" placeholder="Enter product name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">介绍</label>
                        <div class="controls col-md-8 ">
                            <textarea class="input-md  form-control" id="product_description" style="margin-bottom: 10px" ></textarea>
                        </div>     
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">分类</label>
                        <div class="controls col-md-8 "> 
                            <select class="form-control" id="category" style="margin-bottom: 10px">
                                <option value=""></option>
                                <?php foreach($category_list as $category) { ?>
                                <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                                <?php }?>
                            </select>
                            <!--<input class="input-md textinput textInput form-control" id="category" style="margin-bottom: 10px" type="text" />-->
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField"> Classification</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="classification" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div class="form-group required"> 
                        <label class="control-label col-md-4  requiredField">原价</label> 
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
                        <label class="control-label col-md-4  requiredField">库存</label>
                        <div class="controls col-md-8 "> 
                            <input class="input-md textinput textInput form-control" id="inventory" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">运费</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="express_fee" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>  
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">拼团人数</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="group_num" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">拼团价</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="group_price" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                    <div class="form-group required">
                        <label class="control-label col-md-4  requiredField">倒计时周期</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="group_time" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>    
                    <div class="form-group required">                        
                        <label class="control-label col-md-4  requiredField">商品中图</label>                                               
                        <div class="controls col-md-8">   
                            <div class="product_thumb_content">
                                <img src="" id="product_thumb" class="img-responsive">
                            </div>                          
                            <input class="input-md textinput textInput form-control" id="product_image" style="margin-bottom: 10px" type="file"/>
                        </div> 
                    </div>  
                    <!--<div class="form-group required">                        
                        <label class="control-label col-md-4  requiredField">商品大图</label>                                               
                        <div class="controls col-md-8">   
                            <div id="product_cover_container">
                                <!--<img src="" id="product_cover_img" class="img-responsive">
                            </div>                          
                            <input class="input-md textinput textInput form-control" id="product_cover" style="margin-bottom: 10px" type="file" multiple>
                        </div> 
                    </div>  -->
                    <button type="button" id="save_product" class="btn btn-default">Save</button>
                    <button type="button" id="close_product" class="btn btn-default" style="float:right;">Close</button>
                </form>
           </div>
        </div>
    </div>    
</div> 

<div class="text-right" style="margin-top: 20px;">
    <button class="btn btn-primary" id="add_product">新建商品</button>
</div> 

<div class="table-responsive">          
    <table id="product_list" class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-right">No</th>
                <th class="text-center">名称</th>
                <th class="text-center">介绍</th>
                <th class="text-center">分类</th>
                <!--<th class="text-center">Classification</th>-->
                <th class="text-right">原价</th>
                <!--<th class="text-right">Promotion Price</th>-->
                <th class="text-right">库存</th>
                <th class="text-right">运费</th>
                <th class="text-right">拼团人数</th>
                <th class="text-right">拼团价</th>
                <th class="text-right">倒计时周期</th>
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
                <!--<td class="text-center"><?php echo $value['classification']; ?></td>-->
                <td class="text-right"><?php echo $value['originPrice']; ?></td>    
                <!--<td class="text-right"><?php echo $value['promotionPrice']; ?></td>    -->
                <td class="text-right"><?php echo $value['inventory']; ?></td>    
                <td class="text-right"><?php echo $value['expressFee']; ?></td>  
                <td class="text-right"><?php echo $value['group_number']; ?></td>    
                <td class="text-right"><?php echo $value['group_price']; ?></td>    
                <td class="text-right"><?php echo $value['group_time']; ?></td>         
                <td style="width:10%">
                    <i class="fa fa-pencil edit-product" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                    <i class="fa fa-trash-o delete-product" aria-hidden="true" data-id="<?php echo $value['id']; ?>"></i>
                </td>                          
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>