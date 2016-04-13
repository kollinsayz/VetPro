<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('vaccine_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_vaccine');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('vaccine_name');?></div></th>
							<th><div><?php echo get_phrase('vaccine_type');?></div></th>
							<th><div><?php echo get_phrase('vaccine_category');?></div></th>
							<th><div><?php echo get_phrase('manufacturer');?></div></th>
							<th><div><?php echo get_phrase('date_of_manufacture');?></div></th>
                    		<th><div><?php echo get_phrase('Officer_in_charge');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($vaccines as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['type'];?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo $row['manufacturer'];?></td>
							<td><?php echo(date("d M Y", strtotime($row['DOM'])));?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('staff',$row['staff_id']);?></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="modal('edit_vaccine',<?php echo $row['vaccine_id'];?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/vaccines/delete/<?php echo $row['vaccine_id'];?>')" class="btn btn-red btn-small">
                                		<i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/vaccines/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name_of_vaccine');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('vaccine_type');?></label>
                                <div class="controls">
                                    <input type="text" name="type"/>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('vaccine_category');?></label>
                                <div class="controls">
                                    <input type="text" name="category"/>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('manufacturer');?></label>
                                <div class="controls">
                                    <input type="text" name="manufacturer"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date_of_manufacture');?></label>
                                <div class="controls">
                                    <input type="text" name="DOM"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('Officer_in_charge');?></label>
                                <div class="controls">
                                    <select name="staff_id" class="uniform" style="width:100%;">
                                    	<?php 
										$staffs = $this->db->get('staff')->result_array();
										foreach($staffs as $row):
										?>
                                    		<option value="<?php echo $row['staff_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_vaccine');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>