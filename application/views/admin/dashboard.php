	<div class="container-fluid padded">
		
       <div class="row-fluid">
            <div class="span6">
				<div class="box">
					<div class="box-header">
						<div class="title">
                        	<i class="icon-calendar"></i>
							<?php echo get_phrase('calendar_schedule');?>
						</div>
					</div>
					<div class="box-content">
						<div id="calendar2">
						</div>
					</div>
				</div>
			</div>
            <!---CALENDAR ENDS-->
            
            <!---TO DO LIST STARTS-->
			<div class="span6">
				<div class="box">
					<div class="box-header">
						<span class="title">
                        	<i class="icon-reorder"></i>
                            <?php echo get_phrase('noticeboard');?>
                        </span>
					</div>
					<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
                    
                    	<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						<div class="box-section news with-icons">
							<div class="avatar blue">
								<i class="icon-tag icon-2x"></i>
							</div>
							<div class="news-time">
								<span><?php echo date('d',$row['create_timestamp']);?></span> <?php echo date('M',$row['create_timestamp']);?>
							</div>
							<div class="news-content">
								<div class="news-title">
									<?php echo $row['notice_title'];?>
								</div>
								<div class="news-text">
									 <?php echo $row['notice'];?>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
            <!---TO DO LIST ENDS-->
			 <div class="span6">
				<div class="box">
					<div class="box-header">
						<div class="title">
                        	<i class="icon-class"></i>
							<?php echo get_phrase('Data Chart');?>
						</div>
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
                type: 'bar'
            },
            /* Title of that grap */
            title: {
                text: 'Chart Showing Vaccinations'
            },
            
            /* label of X-Axis */
            xAxis: {
                categories: ['Ssembabule', 'Bushenyi']
            },
            
            /* label of Y-Axis */
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Animals Vaccinated'
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
			
            </div>
						</div>
					</div>
				</div>
			</div>
   
  
  <script>
  $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $("#calendar2").fullCalendar({
            header: {
                left: "prev,next",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            editable: 0,
            droppable: 0,
            /*drop: function (e, t) {
                var n, r;
                r = $(this).data("eventObject"), n = $.extend({}, r), n.start = e, n.allDay = t, $("#calendar").fullCalendar("renderEvent", n, !0);
                if ($("#drop-remove").is(":checked")) return $(this).remove()
            },
			
			nulled by Vokey*/
            events: [
			<?php 
			$notices	=	$this->db->get('noticeboard')->result_array();
			foreach($notices as $row):
			?>
			{
                title: "<?php echo $row['notice_title'];?>",
                start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
				end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
            },
			<?php 
			endforeach
			?>
			]
        })

});
  </script>