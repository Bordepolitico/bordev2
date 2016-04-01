<!DOCTYPE html>
<html ng-app="bordepolitico">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<title>Borde Político</title>
	<link rel="stylesheet" href="bower_components/angular-material/angular-material.min.css">
	<link rel="stylesheet" href="bower_components/nvd3/build/nv.d3.css">
	<link rel="stylesheet" href="bower_components/angular-chart.js/dist/angular-chart.css">

	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
 	<link rel="stylesheet" href="css/style.css">
 	<link rel="stylesheet" href="css/main.css">
</head>
<body ng-cloak>
<?php $footer = 'white'; ?>
<div id="header" flex="100" layout-wrap>
	<div class="header-cont" flex="100"></div>
	<div class="header-cont-barra" flex="100" layout="row" layout-wrap>
		<div class="header-cont-barra-botones" flex="50" layout="row" layout-align="start center">
			<a  href="" class="btn-menu" layout="column" layout-align="center center" ng-click="menu = !menu">
				<div class="lineas"></div>
				<div class="lineas"></div>
				<div class="lineas"></div>
			</a>
			<a href="index.php" class="logo-borde" layout="row" layout-align="center center">
				<i class="icon-logo"></i>
			</a>
		</div>
		<div class="header-cont-barra-singin" flex="50" layout="row" layout-align="end center">
			<a href="" class="btn-singin" layout="column" layout-align="center center">
				<h6>Sign in</h6>
			</a>
			<a href="" class="cont-lupa" layout="row" layout-align="center center">
				<i class="icon-lupa"></i>
			</a>
		</div>
	</div>
</div>

<div id="global" layout="row" flex="100" layout-wrap>
<div id="enlaces" ng-show="menu">
<?php include("global/enlaces.php") ?>
</div>