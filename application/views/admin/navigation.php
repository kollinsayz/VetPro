<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />
    <div style="text-align:center;">
    	<a href="<?php echo base_url();?>">
        	<img src="<?php echo base_url();?>uploads/logo.png"  style="max-height:100px; max-width:100px;"/>
        </a>
    </div>
   	<br />
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
        
        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/dashboard" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('dashboard_help');?>">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/home.png" />
					<span><?php echo get_phrase('dashboard');?></span>
				</a>
		</li>
       
	        <!------animal menu------>
		<li class="dark-nav <?php if(	$page_name == 'animal' 		|| 
										$page_name == 'owner' 		|| 
										$page_name == 'product' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="expand" href="#animal_submenu" rel="tooltip" data-placement="right" 
                data-original-title="<?php echo get_phrase('manage_animals,produce_and_farmers');?>">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/payment.png" />
                <span><?php echo get_phrase('Animal Details');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="animal_submenu" class="expand <?php if(	$page_name == 'animal' 		|| 
																$page_name == 'owner' 		|| 
																$page_name == 'product' )echo 'in';?>">
                <li class="<?php if($page_name == 'animal')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/animal">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/exam.png" />
                    	<?php echo get_phrase('manage_animals');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'owner')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/owner">
                      	<!--<i class="icon-globe"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/marks.png" />
						<?php echo get_phrase('animal_owners');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'product')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/product">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/routine.png" />
						<?php echo get_phrase('animal_products');?>
                  </a>
                </li>
            </ul>
		</li> 
	  
        <!------staff----->
		<li class="<?php if($page_name == 'staff')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/staff" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('manage_vet_staff');?>">
					<!--<i class="icon-user icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
					<span><?php echo get_phrase('Vet Officers');?></span>
				</a>
		</li>
		
       <!------disease menu------>
		<li class="dark-nav <?php if(	$page_name == 'disease' 		|| 
										$page_name == 'outbreak' 		|| 
										$page_name == 'outbreak_report' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="expand" href="#disease_submenu" rel="tooltip" data-placement="right" 
                data-original-title="<?php echo get_phrase('manage_disease_and_outbreaks');?>">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/payment.png" />
                <span><?php echo get_phrase('Disease Data');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="disease_submenu" class="expand <?php if(	$page_name == 'disease' 		|| 
																$page_name == 'outbreak' 		|| 
																$page_name == 'outbreak_report' )echo 'in';?>">
                <li class="<?php if($page_name == 'disease')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/disease">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/exam.png" />
                    	<?php echo get_phrase('manage_diseases');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'outbreak')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/outbreak">
                      	<!--<i class="icon-globe"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/marks.png" />
						<?php echo get_phrase('capture_outbreak');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'outbreak_report')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/outbreak_report">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/routine.png" />
						<?php echo get_phrase('outbreak_report');?>
                  </a>
                </li>
            </ul>
		</li> 
        
		<!------vaccine menu------>
		<li class="dark-nav <?php if(	$page_name == 'vaccine' 		|| 
										$page_name == 'vaccination' 		|| 
										$page_name == 'vaccination_report' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="expand" href="#vaccine_submenu" rel="tooltip" data-placement="right" 
                data-original-title="<?php echo get_phrase('manage_vaccines_and_vaccinations');?>">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/payment.png" />
                <span><?php echo get_phrase('Vaccination Data');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="vaccine_submenu" class="expand <?php if(	$page_name == 'vaccine' 		|| 
																$page_name == 'vaccination' 		|| 
																$page_name == 'vaccination_report' )echo 'in';?>">
                <li class="<?php if($page_name == 'vaccine')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/vaccines">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/exam.png" />
                    	<?php echo get_phrase('manage_vaccines');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'vaccination')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/vaccination">
                      	<!--<i class="icon-globe"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/marks.png" />
						<?php echo get_phrase('apply_vaccinations');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'vaccination_report')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/vaccination_report">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/class.png" />
						<?php echo get_phrase('vaccination_report');?>
                  </a>
                </li>
            </ul>
		</li> 
        
        <!------noticeboard----->
		<li class="<?php if($page_name == 'noticeboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/noticeboard" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('noticeboard_help');?>">
					<!--<i class="icon-columns icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/noticeboard.png" />
					<span><?php echo get_phrase('noticeboard-event');?></span>
				</a>
		</li>
        

		

        
        <!------system settings------>
		<li class="dark-nav <?php if(	$page_name == 'system_settings' 		||
										$page_name == 'data_import'				||		
										$page_name == 'backup_restore' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="expand" href="#settings_submenu" rel="tooltip" data-placement="right" 
                data-original-title="<?php echo get_phrase('manage_settings');?>">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/settings.png" />
                <span><?php echo get_phrase('settings');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="settings_submenu" class="expand <?php if(	$page_name == 'system_settings' 		|| 
																$page_name == 'data_import'				||
																$page_name == 'backup_restore' )echo 'in';?>">
                <li class="<?php if($page_name == 'system_settings')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/system_settings">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/system_settings.png" />
                    	<?php echo get_phrase('system_settings');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'backup_restore')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/backup_restore">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/backup.png" />
						<?php echo get_phrase('backup_restore');?>
                  </a>
                </li>
				 <li class="<?php if($page_name == 'data_import')echo 'active';?>">
                  <a href="http://localhost/importer/_csv_to_mysql/index.php" target="_blank">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/backup.png" />
						<?php echo get_phrase('Import_Data');?>
                  </a>
                </li>
            </ul>
		</li>

		<!------manage own profile--->
		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/manage_profile" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('profile_help');?>">
					<!--<i class="icon-lock icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/profile.png" />
					<span><?php echo get_phrase('profile');?></span>
				</a>
		</li>
		
	</ul>
	
</div>