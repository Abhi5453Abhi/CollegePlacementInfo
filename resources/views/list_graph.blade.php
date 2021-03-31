@extends('layout')

@section('content')
<?php

$dataPoints = [];

foreach($data as $key=>$value){
  $dataPoints[$key]['label'] = $value['company_name'];
  $dataPoints[$key]['symbol'] = $value['company_name'];
  $dataPoints[$key]['y'] = $value['company_count'];
}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "%age of students placed in each Company"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<style>
#chartContainer{
	
	background: rgba(0,0,0,0.7);
	height: 500px; 
	width: 55%;
	margin:auto;
	margin-top:6%;
	border-radius: 10px;
}

</style>
<body>
<div id="chartContainer"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>

@stop
