<script type="text/javascript">
console.log("miau asistencia");
//Gasistencia(1,"2");//data[0].asistencia)
function Gasistencia(val,nombre){
	//19-24
	$('#donutChart3').attr("data",'[{key: "% de asistencia",y: 100},{key: "% de faltas",y: 0}]');

}


</script>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
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
								<nvd3 id='donutChart3' style="position:relative;left:{{leftPosition}}px" options="donutChart3.options" data='[{key: "Asistencias",y: 10},{key: "Faltas",y: 80}]'></nvd3>
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
					<p class="titulo-iniciativa" flex="100">Teléfono:</p><p class="parrafo" bval="phone"></p>
					<p class="titulo-iniciativa" flex="100">Correo electrónico:</p><p class="parrafo" bval="mail"></p>
					<p class="titulo-iniciativa" flex="100">Oficina:</p><p class="parrafo" bval="office"></p>

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
