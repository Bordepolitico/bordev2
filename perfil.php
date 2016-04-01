<?php include("header.php") ?>
<?php include("global/menu.php") ?>
<?php $footer = 'gray'; ?>
<?php
	$id=$_POST["id"];
?>
<script   src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<div id="iddip" style="display:none;"><?php
	echo $id;
?></div>
<div id="perfil" ng-controller="perfilController" flex layout="row" layout-align="center center" layout-wrap>
	<div class="perfil-header" flex="100" layout="row" layout-align="space-between " layout-wrap>
		<div class="perfil-header-cont" flex-gt-md="30" flex-md="40" flex="100">
			<div class="perfil-header-cont-redes" flex="100">
				<a href="" class="icon">
					<img src="img/icons/icon_secciones/twiter.svg">
				</a>
				<a href="" class="icon">
					<img src="img/icons/icon_secciones/facebook.svg">
				</a>
				<a href="" class="icon">
					<img src="img/icons/icon_secciones/youtube.svg">
				</a>
			</div>
			<!-- <div class="globo-naranja" layout="row" layout-align="center center">
				<p>BIO.</p>
			</div> -->
			<div class="perfil-header-cont-img">
				<img src="" id="perfilimg">
				<div class="globo-rojo-grande" layout="row" layout-align="center center">
					<p class="globo-rojo-grande-num" id="fbs">95</p>
				</div>
			</div>
		</div>
		<div class='perfil-text' flex="50" hide-sm hide-gt-md layout="column" layout-align="center center">
			<div>
				<p class="nombre" flex="70" bval="name"><strong>DIP. Julian Mondragon Gil</strong></p>
				<!-- <p class="puesto numero" flex="100">Lider parlamentario del pro en la camara de diputados presidente de la comision de puntos constitucionales primera</p> -->
			</div>
		</div>
		<div class="perfil-header-cont perfil-charts separation-margin" flex-gt-md="40" flex-md="65" flex="100" layout="row" layout-align="start start" layout-wrap>
			<!-- <p class="numero" flex="100">500 Diputados en 100 lugares</p> -->
			<div class="grafica" flex="100">
				 <!--<nvd3 options="perfilChart.options" data="perfilChart.data"></nvd3>-->
				 <div id='historyChart'></div>
			</div>
			<div hide-md show-gt-md>
				<p class="nombre" flex="70" bval="name"><strong>DIP. Julian Mondragon Gil</strong></p>
				<!-- <p class="puesto numero" flex="100">Lider parlamentario del pro en la camara de diputados presidente de la comision de puntos constitucionales primera</p> -->
			</div>
		</div>
		<div class="perfil-header-cont perfil-charts compasContainer" flex-gt-md="25" flex-md="35" flex="100" layout="column">
			<!-- <p class="nombre">Political Compass</p>
			
			<div flex class='compasText' layout="column" layout-align="center center">
				<p class='label'>LIBERALISTA</p>
			</div>
			<div flex layout="row" layout-align="start center">
				<div flex class='textVertical left'>
					<div class='rotateItem'>
						<p>cómo legisla política económica</p>
						<p class='label'>CONSERVADOR</p>
					</div>
				</div>
				<div id="specialPointChart"></div>
				<div flex class='textVertical right'>
					<div class='rotateItem'>
						<p class='label'>PROGRESISTA</p>
					</div>
				</div>
				
			</div>
			<div flex class='compasText' layout="column" layout-align="center center">
				<p class='label'>PROTECCIONISTA</p>
				<p>cómo legisla derechos sociales</p>
			</div> -->
		</div>
	</div>
	<div class="perfil-content" flex="100">
		<md-tabs class="tabsMenu"  flex="100" md-center-tabs md-dynamic-height md-no-ink-bar md-stretch-tabs md-no-pagination md-stretch-tabs="always auto">
		    <md-tab md-on-select="asistenciaSelection=true" md-on-deselect="asistenciaSelection=false">
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p></p>
		        	<div class="icon">
		        		<i class="icon-asistencia"></i>
		        	</div>
		        </div>
		        Perfil
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		
					<div id="asistencia" flex="100" layout="ropw" layout-wrap>
						<div class="graficas" flex-gt-md="50" flex="100" layout="row" layout-align="start start" layout-wrap>
							<div flex="100">
								<div flex="100" class="graficas-titulo" layout="row" layout-align="start center">
									<p>Comisiones</p>
									<div class="graficas-titulo-icon-rojo" layout="row" layout-align="center center">+i</div>

								</div>
								<div flex="100" class="graficas-reforma" layout="column">
									<p class="titulo-iniciativa" flex="100"></p><p class="parrafo" bval="coms">
											
											
										</p>
									<div id="info_comisiones"></div>
								</div>
							</div>
						</div>
						<div class="graficas" flex-gt-md="50" flex="100" layout="row" layout-wrap>
							<div flex="100">
								<div flex="100" class="graficas-titulo" layout="row" layout-align="start center">
									<p>Asistencia</p>
									<div class="graficas-titulo-icon-rojo" layout="row" layout-align="center center">+i</div>
								</div>
								<div layout="row" layout-align="center center" flex="100" id="">
										<div flex="50" >
												<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
													<!-- <nvd3 id='donutChart3' style="position:relative;left:{{leftPosition}}px" options="donutChart3.options" data='[{key: "Asistencias",y: 10},{key: "Faltas",y: 80}]'></nvd3> -->
												</div>
												<div flex="50">
													<!-- <div><div id="map-asis"></div></div> -->
												</div>
								</div>
								<div flex="100" id="gr_asist2">
									
								</div>
							</div>
							<div flex="100">
								<div flex="100" class="graficas-titulo" layout="row" layout-align="start center">
									<p>Información general</p>
									<div class="graficas-titulo-icon-rojo" layout="row" layout-align="center center">+i</div>
								</div>
								<div flex="100" class="graficas-reforma" layout="column">
									<div class="graficas-reforma-content" layout="row" layout-wrap>
										<p class="titulo-iniciativa" flex="100">Partido:</p><p class="parrafo" bval="party"></p>
										<!-- <p class="titulo-iniciativa" flex="100">Teléfono:</p><p class="parrafo" bval="phone"></p>
										<p class="titulo-iniciativa" flex="100">Correo electrónico:</p><p class="parrafo" bval="mail"></p>
										<p class="titulo-iniciativa" flex="100">Oficina:</p><p class="parrafo" bval="office"></p> -->

										<p class="parrafo">
											
										</p>
										
										
									</div>
								</div>
								
							</div>
						</div>
						<div id="score" flex="100" layout="column">
							<div class="score-cont score-cont-img padding" layout="row" layout-sm="column" layout-align="start center">
								<div class="globo-verde-grande2" layout="row" layout-align="center center">
									
								</div>
								<i class="icon-pri score"></i>
								<div class="score-cont-info" layout="column">
									<p><strong></strong></p>
									<p></p>
								</div>
							</div>
							
						</div>
						<!-- Aquñi iban las gráficas -->
					</div>

		      	</div>
		      </md-tab-body>
		    </md-tab>
		    <md-tab>
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p>--</p>
		        	<div class="icon">
		        		<i class="icon-news"></i>
		        	</div>
		        </div>
		        Medios
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		<?php include("global/medios.php") ?>
		      	</div>
		      </md-tab-body>
		    </md-tab>
		    <md-tab>
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p id="r_debate">98</p>
		        	<div class="icon">
		        		<i class="icon-debate"></i>
		        	</div>
		        </div>
		        Debate
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		<?php include("global/debate.php") ?>
		      	</div>
		      </md-tab-body>
		    </md-tab>
		    <md-tab>
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p id="r_ini">92</p>
		        	<div class="icon">
		        		<i class="icon-propuestas"></i>
		        	</div>
		        </div>
		        Iniciativa
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		<?php include("global/iniciativa.php") ?>
		      	</div>
		      </md-tab-body>
		    </md-tab>
		    <!-- <md-tab>
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p>98</p>
		        	<div class="icon">
		        		<i class="icon-califica"></i>
		        	</div>
		        </div>
		        Califica
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		
		      	</div>
		      </md-tab-body>
		    </md-tab> -->
		    <md-tab>
		      <md-tab-label>
		        <div class="perfil-opc" flex layout="row" layout-sm="column" layout-align="center center" layout-align-gt-md="start center">
		        	<p id="r_pa">9</p>
		        	<div class="icon">
		        		<i class="icon-puntosA"></i>
		        	</div>
		        </div>
		        P.Acuerdo
		      </md-tab-label>
		      <md-tab-body>
		      	<div flex="100">
		      		<?php include("global/acuerdo.php") ?>
		      	</div>
		      </md-tab-body>
		    </md-tab>
	  	</md-tabs>
	  	<!-- Tabs para Asistencia -->
	  	<?php include("global/asistenciaComplemento.php") ?>
	  </div>
</div>
<div flex="100">
<?php include("footer.php") ?>
</div>

<!-- NETWORK CHART -->
<script src="http://fperucic.github.io/treant-js/vendor/raphael.js"></script>
<script src="http://fperucic.github.io/treant-js/Treant.js"></script>
<script src="js/tree.js"></script>

<!-- DOCTORFRESCO -->
<script type="text/javascript">
console.log("hola gabo");
supurl='http://localhost:8080';
$.ajax({
  url: supurl+'/diputados/get',
  method: "POST",
  data: {populate:["work"] , where : {id:"56fd77c6d01268cb08b6152e" , camara:"senadores", ordenDeGobierno:"federal"} },
  dataType: "json"
}).done(function(data) {
	subject=data[0];
	console.log(subject);
	for (var i = 0; i < subject.comisiones.length; i++) {
		$("#info_comisiones").append('<p class="titulo-iniciativa flex-100">'+subject.comisiones[i].namecom+'</p><p class="parrafo" bval="party">'+subject.comisiones[i].puestocom+'</p><Br>');
	};
	$('p[bval="name"]').text(subject.name);
	$('p[bval="party"]').html(subject.party);
	$('p[bval="phone"]').html(subject.phone);
	$('p[bval="phone"]').html(subject.phone);

	$("#r_ini").html(subject.bs.r_ini);
	$("#r_pa").html("1");
	$("#r_debate").html(subject.bs.r_debate);
	$("#fbs").html(subject.bs.r);
 	console.log('url('+subject.imageurl+');');
 	$('.perfil-header').css('background-image','url('+subject.imageurl+');');
	$('#perfilimg').attr('src',subject.imageurl);//'url('+subject.imageurl+');')
	Gasistencia2(1,"2");//data[0].asistencia)

});
function Gasistencia(val,nombre){
	//19-24
	$('#donutChart3').attr("data",'[{key: "% de asistencia",y: 100},{key: "% de faltas",y: 0}]');

}
function Gasistencia2(r,t) {
    $('#container').highcharts({
        chart: {
	    	backgroundColor:"#F5F5F3"
        },
        title: {
            text: 'Asistencias',
            align: 'center',
            verticalAlign: 'middle',
        },
        exporting: { enabled: false },
        series: [{
            type: 'pie',
            name: 'Asistencias',
            innerSize: '50%',
            color:"#f0f",
            data: [
                ['% de asistencias',   100],
                ['% de faltas',       2],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    },
                    color:"#F0F"
                }
            ]
        }]
    });
}
</script>
<style type="text/css">
.perfil-header-cont-img{
	background-color: grey;
	/*background: url(http://www.senado.gob.mx/imagenes/senadores/63/arturo_zamora_jimenez.jpg);*/
	background-size: cover;
}
#perfilimg{
	width:100%;
	width: 180px;
    height: 180px;
    background: white;
    border-radius: 50%;
}
</style>
<!--
<script src="js/all.min.js"></script>
<script src="js/Main.js"></script>
<script src="js/NetworkInterface.js"></script>
-->