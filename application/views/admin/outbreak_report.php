<div class="box">
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
					<tr>
						<th colspan="6"></th><th colspan="6"><div><?php echo get_phrase('types_of_animals');?></div></th><th></th>
						</tr>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('date_captured');?></div></th>
							<th><div><?php echo get_phrase('district');?></div></th>
                    		<th><div><?php echo get_phrase('subcounty');?></div></th>
							<th><div><?php echo get_phrase('disease_name');?></div></th>
							<th><div><?php echo get_phrase('number_affected');?></div></th>
							<th><div><?php echo get_phrase('Cattle');?></div></th>
							<th><div><?php echo get_phrase('Sheep');?></div></th>
							<th><div><?php echo get_phrase('Goats');?></div></th>
							<th><div><?php echo get_phrase('Poultry');?></div></th>
							<th><div><?php echo get_phrase('Donkeys');?></div></th>
							<th><div><?php echo get_phrase('Pets');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($outbreaks as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['_submission_time'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('district',$row['district_id']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('subcounty',$row['subcounty_id']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('disease',$row['disease_id']);?></td>
							<td><?php echo $row['infected'];?></td>
							<td><?php echo $row['cattle'];?></td>
							<td><?php echo $row['sheep'];?></td>
							<td><?php echo $row['goats'];?></td>
							<td><?php echo $row['poultry'];?></td>
							<td><?php echo $row['donkeys'];?></td>
							<td><?php echo $row['pets'];?></td>
							
							<td align="center">
                            	<a  data-toggle="modal" href="#modal-form" onclick="modal('outbreak_details',<?php echo $row['outbreak_id'];?>)" class="btn btn-default btn-small">
                                            <i class="icon-marks"></i> <?php echo get_phrase('Details');?>
                                        </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
								
<script src="<?php echo base_url();?>template/js/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/js/exporting.js" type="text/javascript"></script>		
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
$(function () {
    /* showing data in our specific div */
        $('#container').highcharts({
            chart: {
                /* types of data representation*/
                type: 'column'
            },
            /* Title of that grap */
            title: {
                text: 'Chart Showing Disease Outbreak'
            },
            
            /* label of X-Axis */
            xAxis: {
                categories: ['Ssembabule', 'Bushenyi']
            },
            
            /* label of Y-Axis */
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Animals Infected (Showing Symptoms)'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            /* Setting the legend properties in a graph */
            legend: {
                align: 'right',
                x: -70,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            
            /* setting tooltip */
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            
            /* Data that we want to represent in graph */
            series: [{
                /* Name of the person */
                name: 'Cattle',
                /* Amount of Data */
                data: [278, 334]
            }, {
                name: 'Sheep',
                data: [578, 601]
            }, {
                name: 'Goats',
                data: [144, 256]
            }, {
                name: 'Poultry',
                data: [1782, 2798]
            }, {
                name: 'Donkeys',
                data: [12, 8]
            }, {
                name: 'Pets',
                data: [125, 188]
            }]
        });
    });
    
 
</script>
            <!----TABLE LISTING ENDS--->
            </div>
			</div>
			</div>
      