<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('veterinary_officers');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_vet_officer');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
            		<div class="action-nav-normal">
                        <div class=" action-nav-button" style="width:300px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span>Total <?php echo count($staffs);?> Vet Officers</span>
                          </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-content">
                            <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                        <th><div>ID</div></th>
                                        <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                                        <th><div><?php echo get_phrase('name');?></div></th>
                                        <th><div><?php echo get_phrase('phone_number');?></div></th>
										<th><div><?php echo get_phrase('rank');?></div></th>
										<th><div><?php echo get_phrase('Date_of_registration');?></div></th>
                                        <th><div><?php echo get_phrase('options');?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;foreach($staffs as $row):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><div class="avatar"><img src="<?php echo $this->crud_model->get_image_url('staff',$row['staff_id']);?>" class="avatar-medium" /></div></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['phone'];?></td>
										 <td><?php echo $row['rank'];?></td>
										 <td><?php echo(date("d M Y", strtotime($row['DOR'])));?></td>
                                        <td align="center">
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('staff_profile',<?php echo $row['staff_id'];?>)"
                                                 class="btn btn-default btn-small">
                                                    <i class="icon-user"></i> <?php echo get_phrase('profile');?>
                                            </a>
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('edit_staff',<?php echo $row['staff_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                            </a>
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/staff/delete/<?php echo $row['staff_id'];?>')"
                                                 class="btn btn-red btn-small">
                                                    <i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/staff/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    <form method="post" action="<?php echo base_url();?>index.php?admin/staff/create/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="birthday"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male"><?php echo get_phrase('male');?></option>
                                    	<option value="female"><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('district');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="district"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('education_level');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="education"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date_registered');?></label>
                                <div class="controls">
                                   <input type="text" class="datepicker fill-up" name="DOR"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('rank');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="rank"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('specialization');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="specialization"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('password');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('photo');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" id="imgInp" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="<?php echo base_url();?>uploads/user.jpg" alt="your image" height="100" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_staff');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>