<?php

$p = $_GET['p'];
if ($handle = opendir("images")) {
	$i = 1;
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
			$img[$i] = $file;
			if ($p == $img[$i]) {
				$ci = $i;
			}
			$i++;
		}
	}
	closedir($handle);
	$ti = $i - 1;
	$pi = $ci - 1;
	if ($p == "") {
		$ni = $ci + 2;
	} else {
		$ni = $ci + 1;
	}
	$prevNext = "";
	if ($pi > 0) {
		$piFile = $img[$pi];
		$prevNext .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=" . $piFile . "\" ><img src='64left.png' style='margin:0 30px 0 0;'></a>";
	} else {
		$prevNext .= "<img src='x64.png' style='margin:0 30px 0 0;'>";
	}
	$prevNext .= "";
	if ($ni <= $ti) {
		$niFile = $img[$ni];
		$prevNext .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=" . $niFile . "\" ><img src='64right.png' style='margin:0 0 0 30px;'></a>";
	} else {
		$prevNext .= "<img src='x64.png' style='margin:0 0 0 30px;'>";
	}
	if ($p == "") {
		$p = $img[1];
	}
}
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>School of Nursing Class Composite Viewer</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="imagetoolbar" content="no">
	<style type="text/css">
		body {
			font-family: helvetica, sans-serif, arial;
			margin: 10px 0 0 ;
			padding: 0px;
			font-size: 15px;
			background-color: #ffffff;
			color: #333333;
		}
		
		td, select, input {
			font-family: helvetica, sans-serif, arial;
			font-size: 15px;
		}
		
		p {
			font-family: helvetica, sans-serif, arial;
			font-size: 15px;
                        font-weight: bold;
			line-height: 16px;
			padding: 0;
			margin:3px 0 3px 0;
		}
		
		img {
			border: 0px;
		}
		
		a, a:visited {
			color: #cc0000;
			text-decoration: none;
		}
		
		a:active, a:hover {
			color: #cc0000;
			text-decoration: none;
		}
		
		.head {
		width:100%;
		background: #AD0000;
		border-bottom: 1px solid #cdcdcd;
		padding: 0;
		margin: 0;
		}
		
		#image {
		width:100%;
		margin: 2px auto 0;
		padding: 0;
		height: 91%;
		text-align:center;
		overflow:hidden;
		}
		
		#image img {
/*		// position: relative; */
/*		// top:1%;*/
		
		}
		
		#button {
		width:100%;
		margin: 0 auto;
/*		height:;*/
		text-align:center;
		}
		
		.button {
		border-bottom: 1px solid #DDD;
		padding: 0px 25px 0px;
		margin: 3px 0;
		}
	</style>
</head>

<body>
<!-- <div class="head"><h1>School of Nursing Class Composites - <php echo $p; > </h1></div> -->

<div id="button"><div class="button"><?php echo $prevNext; ?>
<p>PREV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NEXT</p>
</div></div>

<div id="image"><img src="images/<?php echo $p; ?>" border="0"></div>

<!-- <div id="image"><img src="images/<?php echo $p; ?>" alt="<?php echo $$albumName; ?>" border="0"></div> -->


</body>
</html>
