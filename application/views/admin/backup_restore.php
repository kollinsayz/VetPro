<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('backup');?>
                    	</a></li>
			<li class="">
            	<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('restore');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active span7" id="backup">
				<center>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                    <tbody>
                    	<?php 
						for($i = 1; $i<= 12; $i++):
						
							if($i	==	1)	$type	=	'owner';
							else if($i	==	2)$type	=	'staff';
							else if($i	==	3)$type	=	'vaccine';
							else if($i	==	4)$type	=	'disease';
							else if($i	==	5)$type	=	'outbreak';
							else if($i	==	6)$type	=	'outbreak_report';
							else if($i	==	7)$type	=	'vaccination';
							else if($i	==	8)$type	=	'vaccination_report';
							else if($i	==	9)$type	=	'animal';
							else if($i	==	10)$type=	'product';
							else if($i	==	11)$type=	'noticeboard';
							else if($i	==	12)$type=	'all';
							?>
							<tr>
								<td><?php echo get_phrase($type);?></td>
								<td align="center">
									<a href="<?php echo base_url();?>index.php?admin/backup_restore/create/<?php echo $type;?>" 
										class="btn btn-gray" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>
											Download Backup</a>
									<a href="<?php echo base_url();?>index.php?admin/backup_restore/delete/<?php echo $type;?>" 
										class="btn btn-red" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>
											Delete / Truncate</a>
								</td>
							</tr>
							<?php 
						endfor;
						?>
                    </tbody>
                </table>
                </center>
			</div>
            <!----TABLE LISTING ENDS--->
            
            <!----RESTORE--->
            <div class="tab-pane box  span6" id="restore">
				<?php echo form_open('admin/backup_restore/restore' , array('enctype' => 'multipart/form-data'));?>
                    <input name="userfile" type="file" />
                    <br /><br />
                    <center><input type="submit" class="btn btn-blue" value="<?php echo get_phrase('upload_&_restore_from_backup');?>" /></center>
                    <br />
                </form>
			</div>
            <!----RESTORE ENDS--->
		</div>
	</div>
</div>