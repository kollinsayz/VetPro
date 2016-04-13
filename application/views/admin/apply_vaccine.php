      
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/apply_vaccine/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('district');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="district"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('county');?></label>
                                <div class="controls">
                                    <input type="text" name="county"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('subcounty');?></label>
                                <div class="controls">
                                    <input type="text" name="subcounty"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('parish');?></label>
                                <div class="controls">
                                    <input type="text" name="parish"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('village');?></label>
                                <div class="controls">
                                    <input type="text" name="village"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('vaccination');?></label>
                                <div class="controls">
                                    <select name="vaccine_id" class="uniform" style="width:100%;">
                                    	<?php 
										$diseases = $this->db->get('vaccine')->result_array();
										foreach($vaccines as $row):
										?>
                                    		<option value="<?php echo $row['vaccine_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('cattle(adults)');?></label>
                                <div class="controls">
                                    <input type="number" name="cattle_adults"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('cattle(calves)');?></label>
                                <div class="controls">
                                    <input type="number" name="cattle_calves"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sheep');?></label>
                                <div class="controls">
                                    <input type="number" name="sheep"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('goats');?></label>
                                <div class="controls">
                                    <input type="number" name="goats"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('poultry');?></label>
                                <div class="controls">
                                    <input type="number" name="poultry"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('donkeys');?></label>
                                <div class="controls">
                                    <input type="number" name="donkeys"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('pets');?></label>
                                <div class="controls">
                                    <input type="number" name="pets"/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date_of_reporting');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="DOR"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_vaccination');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>