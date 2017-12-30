<?php 
include("header.php");
include("session.php");
include("navbar.php");
include("connect.php");
$rest_id=$_GET['rest_id'];
?>

<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-home fa-fw"></i>Restaurant Report</h2>
      </div>
      <!-- /.col-lg-12 -->
      <!--<div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example </div>
          <div class="panel-body">
         </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> Category Popularity </div>
          <div class="panel-body">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
         </div>
          
        </div>
      </div>-->
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> Recent Order Record
            <div class="pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"> Actions <span class="caret"></span> </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#" id="all">All</a> </li>
                  <li class="divider"></li>
                  <li><a href="#" id="week">Week</a> </li>
                  <li><a href="#" id="month">Month</a> </li>
                  <li><a href="#" id="year">Year</a> </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="recentOrder"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.container-fluid --> 
</div>
<!-- /#page-wrapper -->

<?php 
include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Gaming Consoles Sold in 2012"
		},
		legend: {
			maxWidth: 350,
			itemWidth: 120
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			legendText: "{indexLabel}",
			dataPoints: [
				{ y: 4181563, indexLabel: "PlayStation 3" },
				{ y: 2175498, indexLabel: "Wii" },
				{ y: 3125844, indexLabel: "Xbox 360" },
				{ y: 1176121, indexLabel: "Nintendo DS"},
				{ y: 1727161, indexLabel: "PSP" },
				{ y: 4303364, indexLabel: "Nintendo 3DS"},
				{ y: 1717786, indexLabel: "PS Vita"}
			]
		}
		]
	});
	chart.render();
}
</script>
<script type="text/javascript" src="canvasjs.min.js"></script>
<script>
	$(document).ready(function(){
		$("#recentOrder").load("recent_order.php?rest_id=<?php echo $rest_id ?>&type=all");
		$("#all").click(function(){
			$("#recentOrder").load("recent_order.php?rest_id=<?php echo $rest_id ?>&type=all");
		});
		$("#week").click(function(){
			$("#recentOrder").load("recent_order.php?rest_id=<?php echo $rest_id ?>&type=week");
		});
		$("#month").click(function(){
			$("#recentOrder").load("recent_order.php?rest_id=<?php echo $rest_id ?>&type=month");
		});
		$("#year").click(function(){
			$("#recentOrder").load("recent_order.php?rest_id=<?php echo $rest_id ?>&type=year");
		});
	});
</script>