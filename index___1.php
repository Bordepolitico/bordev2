<?php include("header.php") ?>
<?php include("global/menu.php") ?>
<div id="home" ng-controller="homeController" flex layout="row" layout-align="start center" layout-wrap>
	<div id="slider-home" class="home-cont" flex="100">
		<div class="item" flex="100" layout="row" layout-wrap>
			<div class="home-cont-boxes" layout="row" layout-align="center center" layout-wrap flex-gt-md="50" flex="100">
				<div layout="row" layout-align="start end" class="home-cont-boxes-box grande" flex="100" style="background: url(img/carta.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box chica margen" flex="auto" style="background: url(img/carta.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box chica" flex="auto" style="background: url(img/camara-2.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
			</div>
			<div class="home-cont-boxes" flex-gt-md="50" flex="100">
				<div layout="row" layout-align="start end" class="home-cont-boxes-box mediana" flex="100" style="background: url(img/reforma.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box mediana" flex="100" style="background: url(img/camara-1.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
			</div>
		</div>
		<div class="item" flex="100" layout="row" layout-wrap>
			<div class="home-cont-boxes" layout="row" layout-align="center center" layout-wrap flex-gt-md="50" flex="100">
				<div layout="row" layout-align="start end" class="home-cont-boxes-box grande" flex="100" style="background: url(img/carta.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box chica margen" flex="auto" style="background: url(img/carta.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box chica" flex="auto" style="background: url(img/camara-2.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
			</div>
			<div class="home-cont-boxes" flex-gt-md="50" flex="100">
				<div layout="row" layout-align="start end" class="home-cont-boxes-box mediana" flex="100" style="background: url(img/reforma.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
				<div layout="row" layout-align="start end" class="home-cont-boxes-box mediana" flex="100" style="background: url(img/camara-1.jpg);">
					<p>Lorem impsum dolor amet</p>
				</div>
			</div>
		</div>
	</div>
	<div id="notas" flex="100" layout="row" layout-wrap>
		<div class="notas-header" flex="100" layout="row" layout-wrap>
			<div flex-sm='100' class="notas-header-cont notas"><strong>Notas</strong></div>
			<a href="" class="notas-header-cont" layout="column" layout-align="center center">
				<i class="icon-video"></i>
				<p>Notas</p>
			</a>
			<a href="" class="notas-header-cont" layout="column" layout-align="center center">
				<i class="icon-articulos"></i>
				<p>Blog</p>
			</a>
			<a href="" class="notas-header-cont" layout="column" layout-align="center center">
				<i class="icon-noticias"></i>
				<p>Noticias</p>
			</a>
			<a href="" class="notas-header-cont" layout="column" layout-align="center center">
				<i class="icon-infogra"></i>
				<p>Info</p>
			</a>
		</div>
		<div class="notas-contenido" flex="100" layout="row" layout-align="start center" layout-wrap>
			<div flex-sm="100" flex-md="45" ng-repeat="x in [0,1,2,3]" class="notas-contenido-box" layout="row" layout-wrap>
				<div class="notas-contenido-box-imagen"></div>
				<p class="notas-contenido-box-parrafo" flex="100">
					<strong>General Nash leads from the front at Daniel Lindle's Tennessee eartery 5th & Taylor ...</strong>
				</p>
				<p class="notas-contenido-box-texto" flex="100">
					Lorem impsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula egetconsectetuer
					adipiscing elit. Aenean commodo ligula eget dolor ...
				</p>
			</div>
			<!--<div class="notas-contenido-box" layout="row" layout-wrap>
				<div class="notas-contenido-box-imagen"></div>
				<p class="notas-contenido-box-parrafo" flex="100">
					<strong>General Nash leads from the front at Daniel Lindle's Tennessee eartery 5th & Taylor ...</strong>
				</p>
				<p class="notas-contenido-box-texto" flex="100">
					Lorem impsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula egetconsectetuer
					adipiscing elit. Aenean commodo ligula eget dolor ...
				</p>
			</div>
			<div class="notas-contenido-box" layout="row" layout-wrap>
				<div class="notas-contenido-box-imagen"></div>
				<p class="notas-contenido-box-parrafo" flex="100">
					<strong>General Nash leads from the front at Daniel Lindle's Tennessee eartery 5th & Taylor ...</strong>
				</p>
				<p class="notas-contenido-box-texto" flex="100">
					Lorem impsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula egetconsectetuer
					adipiscing elit. Aenean commodo ligula eget dolor ...
				</p>
			</div>
			<div class="notas-contenido-box" layout="row" layout-wrap>
				<div class="notas-contenido-box-imagen"></div>
				<p class="notas-contenido-box-parrafo" flex="100">
					<strong>General Nash leads from the front at Daniel Lindle's Tennessee eartery 5th & Taylor ...</strong>
				</p>
				<p class="notas-contenido-box-texto" flex="100">
					Lorem impsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula egetconsectetuer
					adipiscing elit. Aenean commodo ligula eget dolor ...
				</p>
			</div>-->
		</div>
		<div class="notas-contenido-boton" flex="100" layout="row" layout-align="center center">
			<a href="" class="boton-naranja" layout="row" layout-align="center center">
				Ver + contenidos
			</a>
		</div>
	</div>
	<div class="barra-separdor" flex="100"></div>
	<div id="top-home" flex="100" layout="row" layout-wrap>
		<div class="top-home margin-right" flex-md="100" flex-sm="100" flex layout="row" layout-wrap>
			<div flex="100">
				<div class="top-home-header senadores" flex layout="row" layout-align="start end">
					<i class="icon-topsena"></i>
				</div>
			</div>
			<div flex="100" layout="column">
				<a ng-repeat="x in [0,1,2,3,4]" href="perfil.php" class="top-home-content content-black" flex layout="row" layout-align="space-around start">
					<div class="top-home-content-img"></div>
					<div flex class="top-home-content-info" layout="column" layout-align="start start">
						<p class="nombre">Jose Luís</p>
						<p class="nombre top">Amescua Gonzales</p>
						<p class="puesto">Economía-Cambio Climático</p>
						<p class="puesto top">Sustentabilidad-Medio Ambiente</p>
					</div>
					<div layout="row" layout-align="center start">
						<div class="globo-rosa" layout="row" layout-align="center center">
							<p class="globo-rosa-num">01</p>
						</div>
					</div>
				</a>
				<!--<a href="perfil.php" class="top-home-content content-gray" flex layout="row" layout-align="space-around center">
					<div class="top-home-content-img"></div>
					<div class="top-home-content-info" layout="column" layout-align="start start">
						<p class="nombre">Jose Luís</p>
						<p class="nombre top">Amescua Gonzales</p>
						<p class="puesto">Economía-Cambio Climático</p>
						<p class="puesto top">Sustentabilidad-Medio Ambiente</p>
					</div>
					<div layout="row" layout-align="center start">
						<div class="globo-rosa" layout="row" layout-align="center center">
							<p class="globo-rosa-num">01</p>
						</div>
					</div>
				</a>-->
			</div>
		</div>
		<div class="top-home margin-right" flex-md="100" flex-sm="100" flex layout="row" layout-wrap>
			<div flex="100" >
				<div class="top-home-header diputados" flex layout="row" layout-align="start end">
					<i class="icon-topdipu"></i>
				</div>
			</div>
			<div flex="100" layout="column">
				<a ng-repeat="x in [0,1,2,3,4]" href="perfil.php" class="top-home-content content-black" flex layout="row" layout-align="start start">
					<div class="top-home-content-img"></div>
					<div flex class="top-home-content-info" layout="column" layout-align="start start">
						<p class="nombre">Jose Luís</p>
						<p class="nombre top">Amescua Gonzales</p>
						<p class="puesto">Economía-Cambio Climático</p>
						<p class="puesto top">Sustentabilidad-Medio Ambiente</p>
					</div>
					<div layout="row" layout-align="center start">
						<div class="globo-rosa" layout="row" layout-align="center center">
							<p class="globo-rosa-num">01</p>
						</div>
					</div>
				</a>
				<!--<a href="perfil.php" class="top-home-content content-gray" flex layout="row" layout-align="space-around center">
					<div class="top-home-content-img"></div>
					<div class="top-home-content-info" layout="column" layout-align="start start">
						<p class="nombre">Jose Luís</p>
						<p class="nombre top">Amescua Gonzales</p>
						<p class="puesto">Economía-Cambio Climático</p>
						<p class="puesto top">Sustentabilidad-Medio Ambiente</p>
					</div>
					<div layout="row" layout-align="center start">
						<div class="globo-rosa" layout="row" layout-align="center center">
							<p class="globo-rosa-num">01</p>
						</div>
					</div>
				</a>-->
			</div>
		</div>
		<div class="barra-separdor" flex="100"></div>
		<div flex="100" layout="row" layout-align="center center">
			<div id="top-home-ciudadano" flex="100" layout="row" layout-align="center center" layout-wrap>
				<div class="top-home-content" flex='70' layout="column">
					<div class="top-home-content thc-header" layout="row">
						<div class="top-home-content-mensual" layout="column" layout-align="center center">
							<p><strong>TOP</strong></p>
							<p>mensual</p>
						</div>
						<div class="top-home-content-ciudadano" flex="50">
							<p>Ciudadano</p>
						</div>
					</div>
					<div ng-class="{open:topPeople[$index].open}" class="top-home-content" layout="row" ng-repeat="perfil in topPeople track by $index">
						<div class="top-home-content-mensual top-home-content-globos" >
							<div ng-click="setTopMonth($index)" class="globo-verde-chico" layout="row" layout-align="center center">
								<p class="globo-verde-chico-num">0{{$index+1}}</p>
							</div>
						</div>
						<div class="" flex="50">
							<div class="top-home-content-info" layout="row" layout-align="start start" layout-wrap flex="100">
								<p flex="100" class="nombre" ng-bind="perfil.name"></p>
								<p flex="100" class="nombre top" ng-bind="perfil.lastname"></p>
								<p flex="100" class="puesto text-white" ng-repeat="x in perfil.jobs" ng-bind="x"></p>
							</div>
						</div>
						<div layout="column" flex layout-align="start end" >
							<div layout="row">
								<div class="globo-verde-grande" layout="row" layout-align="center center">
									<p class="globo-verde-grande-num">0{{$index+1}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- old circles -->
				<!--<div class="top-home-content" flex="70" flex-md="85" flex-sm="100"   layout="row" layout-wrap>
					<div layout="row" flex="100" class="top-ciudadano" layout-align="space-around end">
						<div layout="column" layout-align="center center">
							<div class="top-home-content-mensual" layout="column" layout-align="center center">
								<p><strong>TOP</strong></p>
								<p>mensual</p>
							</div>
							<div class="top-home-content-img top-ciudadano"></div>
						</div>
						<a href="perfil.php" layout="row" flex="50" layout-wrap>
							<div class="top-home-content-ciudadano" layout="row" layout-align="start center" flex="100">
								<p>Ciudadano</p>
							</div>
							<div class="top-home-content-info" layout="row" layout-align="start start" layout-wrap flex="100">
								<p flex="100" class="nombre">Jose Luís</p>
								<p flex="100" class="nombre top">Amescua Gonzales</p>
								<p flex="100" class="puesto text-white">Economía-Cambio Climático</p>
								<p flex="100" class="puesto text-white">Sustentabilidad-Medio Ambiente</p>
							</div>
						</a>
						<div layout="column" layout-align="center center" >
							<div layout="row">
								<div class="globo-verde-grande" layout="row" layout-align="center center">
									<p class="globo-verde-grande-num">01</p>
								</div>
							</div>
						</div>
					</div>
					<div class="top-home-content-globos" layout="column" layout-align="center center">
						<div class="globo-verde-chico" layout="row" layout-align="center center">
							<p class="globo-verde-chico-num">02</p>
						</div>
						<div class="globo-verde-chico" layout="row" layout-align="center center">
							<p class="globo-verde-chico-num">03</p>
						</div>
						<div class="globo-verde-chico" layout="row" layout-align="center center">
							<p class="globo-verde-chico-num">04</p>
						</div>
						<div class="globo-verde-chico" layout="row" layout-align="center center">
							<p class="globo-verde-chico-num">05</p>
						</div>
					</div>
				</div>-->
				<div class="top-home-video" flex="100" layout="row" layout-align="start center">
					<i class="icon-video"></i>
					<p>ver video ciudadano</p>
				</div>
			</div>
		</div>
		<div id="home-mapa" flex="100" layout="row" layout-align="space-around start" layout-wrap>
			<div class="mapa-busqueda" flex="100" flex-gt-md="35" layout="column">
				<p class='underlined'><strong>Búsqueda</strong> de Representantes</p>
				<div><div id="map-home"></div></div>
			</div>
			<div class="mapa-cont" flex="100" flex-gt-md="60" flex-offset-gt-md="5" layout="row" layout-fill><!-- space-between start-->
				<div class="mapa-cont-resultado" flex flex="50" flex-gt-md="55" layout="row" layout-wrap>
					<div flex="100" class="mapa-cont-resultado-header">
						<p><strong>RESULTADO</strong> : Legisladores</p>
					</div>
					<div flex="100" class="mapa-cont-resultado-progreso" layout="row"layout-align="start center">
						<div class="mapa-cont-resultado-progreso-numero" layout="column" layout-align="center center">
							<p class="margin-bottom"><strong>628</strong></p>
							<p>Representantes</p>
						</div>
						<div class="mapa-cont-resultado-progreso-linea" layout="column" layout-align="center center">
							<p>Nivel de progreso</p>
							<div id="linea" layout="row" layout-align="center center">
								<p>-</p>
								<div class="linea"></div>
								<p>+</p>
							</div>
						</div>
					</div>
					<div flex="100" class="mapa-cont-resultado-progreso-estado" layout="row" layout-align="start center">
						<div class="icon">
							<i class="icon-estado"></i>
						</div>
						<p>Puebla</p>
					</div>
					<div flex="100" class="mapa-cont-top" layout="row" layout-wrap  layout-align="center center">
						<div flex="100" class="mapa-cont-top-filtros" layout="row" layout-align="space-around center">
							<a href="">Top 5</a>
							<a href="">A-B</a>
						</div>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Jose Angelino Caamal Mena</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-prd"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Rafael Alejando Cárdenas Martinez</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pri"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Luis Jorge Maury Lavalle</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pan"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Adriana Abreu Artiñano</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pan"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Jose Angelino Caamal Mena</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-prd"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Luis Jorge Maury Lavalle</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-prd"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Rafael Alejando Cárdenas Martinez</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pan"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Jose Angelino Caamal Mena</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pri"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Luis Jorge Maury Lavalle</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pan"></i>
							</div>
						</a>
						<a href="perfil.php" flex="100" class="mapa-cont-top-dip" layout="row" layout-align="space-between center">
							<p>Rafael Alejando Cárdenas Martinez</p>
							<div class="icon" layout="row" layout-align="center center">
								<i class="icon-pan"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="mapa-cont-busqueda partidos" layout="row" layout-align="center start" flex flex="50" flex-gt-md="40" flex-offset-gt-md="5" layout-wrap>
					<div flex="100" class="mapa-cont-busqueda-header" layout="column">
						<p><strong>Búsqueda</strong></p>
					</div>
					<div flex="100" layout="row" class="mapa-cont-busqueda-iconos" layout-wrap>
						<p flex="100">Partidos</p>
						<a href="" class="iconos">
							<i class="icon-prd"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-pan"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-pri"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-pan"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-pri"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-pan"></i>
						</a>
					</div>
					<div flex="100" layout="row" class="mapa-cont-busqueda-iconos temas" layout-wrap>
						<p flex="100">Temas</p>
						<a href="" class="iconos">
							<i class="icon-eco"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-desa"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-economia"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-edu"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-segu"></i>
						</a>
						<a href="" class="iconos">
							<i class="icon-jus"></i>
						</a>
					</div>
					<div flex="100" layout="row" layout-align="space-around center" class="mapa-cont-busqueda-iconos" layout-wrap>
						<p flex="100">Sexo</p>
						<a href="" class="iconos sexo">
							<i class="icon-man"></i>
						</a>
						<a href="" class="iconos sexo">
							<i class="icon-girl"></i>
						</a>
					</div>
					<div flex="100" layout="row" layout-align="space-around center" class="mapa-cont-busqueda-iconos" layout-wrap>
						<p flex="100">Edad</p>
						<div flex="100" layout="row" >
							<a flex="33" href="" class="text">20-40</a>
							<a flex="33" href="" class="text">40-60</a>
							<a flex="33" href="" class="text">+ 60</a>
						</div>
					</div>
					<div flex="100" layout="row" layout-align="space-around center" class="mapa-cont-busqueda-iconos" layout-wrap>
						<p flex="100">Camara</p>
						<div flex="100" layout="row" >
							<a flex="50" href="" class="text">Diputados</a>
							<a flex="50" href="" class="text">Senadores</a>
						</div>
					</div>
					<div flex="100" layout="row" layout-align="space-around center" class="mapa-cont-busqueda-iconos" layout-wrap>
						<p flex="100">Tipo de elección</p>
						<a href="" flex="100" class="text">Mayoría Relativa</a>
						<a href="" flex="100" class="text">Representación Proporcional</a>
						<a href="" flex="100" class="text">Primera Minoría</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div flex="100">
<?php include("footer.php") ?>
</div>
