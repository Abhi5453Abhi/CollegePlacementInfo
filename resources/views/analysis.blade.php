@extends('layout')

@section('content')

<?php

$total_count = sizeof($data);

$dataPoints = [];
$dataPoints2 = [];

$M = $data[0]['M'];
$C = $data[0]['C'];


for($i=0;$i<$total_count;$i++){
    $dataPoints[$i]['x'] = $data[$i]['total_score'];
    $dataPoints[$i]['y'] = $data[$i]['package'];
    $dataPoints2[$i]['x'] = $data[$i]['total_score'];
    $dataPoints2[$i]['y'] = $M*$dataPoints2[$i]['x'] + $C;
}
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", 
	title:{
		text: "Study of Package vs FuzzyScore"
	},
	axisX:{
		title: "FuzzyScore",
		suffix: ""
	},
	axisY:{
		title: "Package",
		suffix: " Rs"
	},
	data: [{
		type: "scatter",
		markerType: "square",
		markerSize: 10,
		toolTipContent: "Package: {y} Rs<br>Fuzzy Score: {x} ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	},
    {
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}
    ]
});
chart.render();
 
}
</script>
<style>
#chartContainer
{
	width: 80%;
	margin-top:1%;
	margin:auto;
}

.package-info{
	margin:auto;
	text-align: center;
	background: rgb(0,0,0,0.3);
	color: white;
}
</style>
</head>

<body>
<div class="package-info">
</br>
    <?php if($data[0]['user_type'] == 0){ ?>
		
		
		<h1><?php echo  "Your estimated package is ".$data[0]['package']; ?></h1>
		<?php } ?>
</div>
<div id="chartContainer" >
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</body>
</html>

@stop