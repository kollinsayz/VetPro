<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('animal_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_animal');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('animal_type');?></div></th>
                    		<th><div><?php echo get_phrase('animal_category');?></div></th>
                    		<th><div><?php echo get_phrase('Owner');?></div></th>
							<th><div><?php echo get_phrase('district');?></div></th>
							<th><div><?php echo get_phrase('Date_of_birth');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($diseases as $row):?>
                        <tr>
							<td><?php echo $row['type'];?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('owner',$row['owner_id']);?></td>
							<td><?php echo $row['district'];?></td>
							<td><?php echo(date("d M Y", strtotime($row['DOB'])));?></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="modal('edit_animal',<?php echo $row['animal_id'];?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/animal/delete/<?php echo $row['animal_id'];?>')" class="btn btn-red btn-small">
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
                	<?php echo form_open('admin/animal/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('type');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="type"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('category');?></label>
                                <div class="controls">
                                    <input type="text" name="category"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('Owner');?></label>
                                <div class="controls">
                                    <select name="department_id" class="uniform" style="width:100%;">
                                    	<?php 
										$staffs = $this->db->get('owner')->result_array();
										foreach($owners as $row):
										?>
                                    		<option value="<?php echo $row['owner_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('district');?></label>
                                <div class="controls">
                                    <input type="text" name="district"/>
                                </div>
                            </div>
                           <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date_of_birth');?></label>
                                <div class="controls">
                                   <input type="text" class="datepicker fill-up" name="DOB"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_animal');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>