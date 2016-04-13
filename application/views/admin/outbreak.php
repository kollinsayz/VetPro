      
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/outbreak/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                             <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('District');?></label>
                                <div class="controls">
                                    <select name="district_id" class="uniform" style="width:100%;">
                                    	<?php 
										$districts = $this->db->get('district')->result_array();
										foreach($districts as $row):
										?>
                                    		<option value="<?php echo $row['district_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('County');?></label>
                                <div class="controls">
                                    <select name="county_id" class="uniform" style="width:100%;">
                                    	<?php 
										$countys = $this->db->get('county')->result_array();
										foreach($countys as $row):
										?>
                                    		<option value="<?php echo $row['county_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('Subcounty');?></label>
                                <div class="controls">
                                    <select name="subcounty_id" class="uniform" style="width:100%;">
                                    	<?php 
										$subcountys = $this->db->get('subcounty')->result_array();
										foreach($subcountys as $row):
										?>
                                    		<option value="<?php echo $row['subcounty_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('Parish');?></label>
                                <div class="controls">
                                    <select name="parish_id" class="uniform" style="width:100%;">
                                    	<?php 
										$parishes = $this->db->get('parish')->result_array();
										foreach($parishes as $row):
										?>
                                    		<option value="<?php echo $row['parish_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('village');?></label>
                                <div class="controls">
                                    <input type="text" name="village"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('Disease');?></label>
                                <div class="controls">
                                    <select name="disease_id" class="uniform" style="width:100%;">
                                    	<?php 
										$diseases = $this->db->get('disease')->result_array();
										foreach($diseases as $row):
										?>
                                    		<option value="<?php echo $row['disease_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('symptoms');?></label>
                                <div class="controls">
                                    <input type="textbox" name="symptoms"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('number_infected');?></label>
                                <div class="controls">
                                    <input type="number" name="infected"/>
                                </div>
                            </div>
							<hr />
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('cattle');?></label>
                                <div class="controls">
                                    <select name="cattle" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sheep');?></label>
                                <div class="controls">
                                    <select name="sheep" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('goats');?></label>
                                <div class="controls">
                                    <select name="goats" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('poultry');?></label>
                                <div class="controls">
                                    <select name="poultry" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('donkeys');?></label>
                                <div class="controls">
                                    <select name="donkeys" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('pets');?></label>
                                <div class="controls">
                                    <select name="pets" class="uniform" style="width:100%;">
                                    	<option value="Yes"><?php echo get_phrase('Yes');?></option>
                                    	<option value="No"><?php echo get_phrase('No');?></option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date_of_capture');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="DOC"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('capture_outbreak');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>