app.controller('homeController', function($scope, $timeout, $window) {
    $scope.topPeople = [
        {
            name: 'Jose Luís'
            ,lastname: 'Amescua Gonzales'
            ,jobs : ['Economía-Cambio Climático','Sustentabilidad-Medio Ambiente']
            ,open : true
        }
        ,{
            name: 'Jose Luís'
            ,lastname: 'Amescua Gonzales 2'
            ,jobs : ['Economía-Cambio Climático','Sustentabilidad-Medio Ambiente']
        }
        ,{
            name: 'Jose Luís'
            ,lastname: 'Amescua Gonzales 3'
            ,jobs : ['Economía-Cambio Climático','Sustentabilidad-Medio Ambiente']
        }
        ,{
            name: 'Jose Luís'
            ,lastname: 'Amescua Gonzales 4'
            ,jobs : ['Economía-Cambio Climático','Sustentabilidad-Medio Ambiente']
        }
        ,{
            name: 'Jose Luís'
            ,lastname: 'Amescua Gonzales 5'
            ,jobs : ['Economía-Cambio Climático','Sustentabilidad-Medio Ambiente']
        }
    ];
    $scope.setTopMonth = function(index){
        if( $scope.topPeople[index] ){
            for(x in $scope.topPeople )if( x != index )$scope.topPeople[x].open = false;
            $scope.topPeople[index].open = !$scope.topPeople[index].open;
        }
    }
});
app.controller('perfilController', function($scope, $timeout, $window) {
    $scope.asistenciaSelection = true;
	$scope.stackedAreaChart = {};
	$scope.donutChart = {};
	$scope.donutChart2 = {};
    $scope.donutChart3 = {};
	$scope.barChart = {};
	$scope.radarChart = {};
    $scope.perfilChart = {};
    $scope.vulnerableChart = {};

    $scope.perfilChart.options = {
            chart: {
                type: 'historicalBarChart',
                height: 200,
                margin : {
                    top: 20,
                    right: 20,
                    bottom: 60,
                    left: 30
                },
                color : function(d,i){ return 'white'; } ,
                x: function(d){return d[0];},
                y: function(d){return d[1]/100000;},
                showValues: true,
                valueFormat: function(d){
                    return d3.format(',.1f')(d);
                },
                transitionDuration: 500,
                xAxis: {
                    axisLabel: '',
                    staggerLabels : true,
                    tickFormat: function(d) {
                        return d3.time.format('%x')(new Date(d))
                    },
                    rotateLabels: 50,
                    showMaxMin: true,
                },
                yAxis: {
                    axisLabel: 'Y Axis',
                    axisLabelDistance: 35,
                    tickFormat: function(d){
                        return d3.format(',.1f')(d);
                    }
                },
                showYAxis : false
            }
        };

    $scope.perfilChart.data = [
        {
            "key" : "Quantity" ,
            "bar": true,
            "values" : [ [ 1136005200000 , 1271000.0] , [ 1138683600000 , 1271000.0] , [ 1141102800000 , 1271000.0] , [ 1143781200000 , 0] , [ 1146369600000 , 0] , [ 1149048000000 , 0] , [ 1151640000000 , 0] , [ 1154318400000 , 0] , [ 1156996800000 , 0] , [ 1159588800000 , 3899486.0] , [ 1162270800000 , 3899486.0] , [ 1164862800000 , 3899486.0] , [ 1167541200000 , 3564700.0] , [ 1170219600000 , 3564700.0] , [ 1172638800000 , 3564700.0] , [ 1175313600000 , 2648493.0] , [ 1177905600000 , 2648493.0] , [ 1180584000000 , 2648493.0] , [ 1183176000000 , 2522993.0] , [ 1185854400000 , 2522993.0] , [ 1188532800000 , 2522993.0] , [ 1191124800000 , 2906501.0] , [ 1193803200000 , 2906501.0] , [ 1196398800000 , 2906501.0] , [ 1199077200000 , 2206761.0] , [ 1201755600000 , 2206761.0] , [ 1204261200000 , 2206761.0] , [ 1206936000000 , 2287726.0] , [ 1209528000000 , 2287726.0] , [ 1212206400000 , 2287726.0] , [ 1214798400000 , 2732646.0] , [ 1217476800000 , 2732646.0] , [ 1220155200000 , 2732646.0] , [ 1222747200000 , 2599196.0] , [ 1225425600000 , 2599196.0] , [ 1228021200000 , 2599196.0] , [ 1230699600000 , 1924387.0] , [ 1233378000000 , 1924387.0] , [ 1235797200000 , 1924387.0] , [ 1238472000000 , 1756311.0] , [ 1241064000000 , 1756311.0] , [ 1243742400000 , 1756311.0] , [ 1246334400000 , 1743470.0] , [ 1249012800000 , 1743470.0] , [ 1251691200000 , 1743470.0] , [ 1254283200000 , 1519010.0] , [ 1256961600000 , 1519010.0] , [ 1259557200000 , 1519010.0] , [ 1262235600000 , 1591444.0] , [ 1264914000000 , 1591444.0] , [ 1267333200000 , 1591444.0] , [ 1270008000000 , 1543784.0] , [ 1272600000000 , 1543784.0] , [ 1275278400000 , 1543784.0] , [ 1277870400000 , 1309915.0] , [ 1280548800000 , 1309915.0] , [ 1283227200000 , 1309915.0] , [ 1285819200000 , 1331875.0] , [ 1288497600000 , 1331875.0] , [ 1291093200000 , 1331875.0] , [ 1293771600000 , 1331875.0] , [ 1296450000000 , 1154695.0] , [ 1298869200000 , 1154695.0] , [ 1301544000000 , 1194025.0] , [ 1304136000000 , 1194025.0] , [ 1306814400000 , 1194025.0] , [ 1309406400000 , 1194025.0] , [ 1312084800000 , 1194025.0] , [ 1314763200000 , 1244525.0] , [ 1317355200000 , 475000.0] , [ 1320033600000 , 475000.0] , [ 1322629200000 , 475000.0] , [ 1325307600000 , 690033.0] , [ 1327986000000 , 690033.0] , [ 1330491600000 , 690033.0] , [ 1333166400000 , 514733.0] , [ 1335758400000 , 514733.0]]
        }];

	/*-------------------/
		#DONUTCHART
	/*-------------------*/


    $scope.donutChart.options = {
        chart: {
            type: 'pieChart',
            height: 500,
            donut: true,
            donutRatio : .4,
            x: function(d){return d.key;},
            y: function(d){return d.y;},
            showLabels: true,
			color: function(d,i){
				if($scope.colors[i]){
					return $scope.colors[i];
				}else{
					return '#F0505A';
				}
			},
			/*
            pie: {
                startAngle: function(d) { return d.startAngle/2 -Math.PI/2 },
                endAngle: function(d) { return d.endAngle/2 -Math.PI/2 }
            },*/
            duration: 500,
            legend: {
                margin: {
                    top: 5,
                    right: 140,
                    bottom: 5,
                    left: 0
                }
            },
            labelsOutside: true,
            showLegend: false,
        }
    };

    $scope.donutChart.data = [
        {
            key: "PRI",
            y: 20
        },
        {
            key: "Nueva Alianza",
            y: 10
        },
        {
            key: "PRD",
            y: 10
        },
        {
            key: "PAN",
            y: 25
        },
        {
            key: "Partido Verde",
            y: 20
        },
        {
            key: "Movimiento ciudadano",
            y: 5
        },
        {
            key: "PT",
            y: 10
        }
    ];

	$timeout(function(){
		$scope.donutChart.formatLabels();
	},500);

	$scope.donutChart.formatLabels = function(){
		d3.selectAll('.nv-pieChart .nv-label text')
			.style('fill',function(d,i){
                console.log('i',i);
				console.log('d',d);
				var hex = $scope.colorsDark[i] || '#F0505A';
				return hex;
			});
	};

	/*-------------------/
		#DONUTCHART2
	/*-------------------*/


    $scope.donutChart2.options = {
        chart: {
            type: 'pieChart',
            height: 300,
            donut: true,
            x: function(d){return d.key;},
            y: function(d){return d.y;},
            showLabels: true,
			color: function(d,i){
				if($scope.colors[i]){
					return $scope.colors[i];
				}else{
					return '#F0505A';
				}
			},
			/*
            pie: {
                startAngle: function(d) { return d.startAngle/2 -Math.PI/2 },
                endAngle: function(d) { return d.endAngle/2 -Math.PI/2 }
            },*/
            duration: 500,
            legend: {
                margin: {
                    top: 5,
                    right: 140,
                    bottom: 5,
                    left: 0
                }
            },
            labelsOutside: true,
            showLabels: false,
            //showLegend: false,
        }
    };

    $scope.donutChart2.data = [
        {
            key: "Presentadas",
            y: 5
        },
        {
            key: "Aprobadas",
            y: 2
        },
        {
            key: "Dictaminadas",
            y: 9
        },
    ];

	$timeout(function(){
		$scope.donutChart2.formatLabels();
	},500);

	$scope.donutChart2.formatLabels = function(){
		d3.selectAll('#donutChart-2 .nv-pieChart .nv-label text')
			.style('fill',function(d,i){
				console.log(i);
				var hex = $scope.colors[i] || '#F0505A';
				return hex;
			});
	};

    /*-------------------/
        #DONUTCHART3
    /*-------------------*/
    $scope.donutChart3.options = {
        chart: {
            type: 'pieChart',
            height: 280,
            align : 'left',
            donut: true,
            growOnHover : false,
            title : 'Asistencia',
            margin : {
                    top: 20,
                    right: 0,
                    bottom:  40,
                    left: 0 //-97
                },
            x: function(d){return d.key;},
            y: function(d){return d.y;},
            showLabels: true,
            color: function(d,i){
                if($scope.colors[i]){
                    return $scope.colors[i];
                }else{
                    return '#F0505A';
                }
            },
            /*
            pie: {
                startAngle: function(d) { return d.startAngle/2 -Math.PI/2 },
                endAngle: function(d) { return d.endAngle/2 -Math.PI/2 }
            },*/
            duration: 500,
            legend: {
                margin: {
                    top: 5,
                    right: 140,
                    bottom: 5,
                    left: 0
                }
            },
            labelsOutside: true,
            showLabels: false,
            showLegend: false,
            //showLegend: false,
        }
    };

    $scope.donutChart3.data = [
        {
            key: "Presentadas",
            y: 5
        },
        {
            key: "Aprobadas",
            y: 2
        },
        {
            key: "Dictaminadas",
            y: 9
        },
    ];
    var getMargin = function(id){
        //return -1*($( id ).width()/7);
        if( $(window).width() > 960 )
            return -1*($( id ).width()/2 - 91);
        else
            return 0;
    }
    $timeout(function(){
        $scope.leftPosition = getMargin('#donutChart3');
        $scope.donutChart3.formatLabels();
    },500);
    var w = angular.element($window);
    w.bind('resize', function () {
        $scope.$apply();
        $scope.leftPosition = getMargin('#donutChart3');
    });
    $scope.donutChart3.formatLabels = function(){
        d3.selectAll('#donutChart-3 .nv-pieChart .nv-label text')
            .style('fill',function(d,i){
                console.log(i);
                var hex = $scope.colors[i] || '#F0505A';
                return hex;
            });
    };




	/*-------------------/
		#STACKEDAREACHART
	/*-------------------*/

	$timeout(function(){
		$scope.stackedAreaChart.setStrokes();
	},500);

	$scope.stackedAreaChart.setStrokes = function(){
		d3.selectAll('.nv-stackedAreaChart .nv-area')
			.style('stroke-opacity','1')
			.style('fill', function(d,i){
				var hex = $scope.colors[i] || '#F0505A';
				var rgb = $scope.hexToRgb(hex);
				return  "rgba("+rgb.r +","+ rgb.g +","+ rgb.b +",0.8)" ;
			});
	};

	$scope.colors = [
		'#F0505A',
		'#F69755',
		'#FCCD4B',
		'#F0505A',
		'#F69755',
		'#FCCD4B',
		'#F0505A',
		'#F69755',
		'#FCCD4B',
	];
    $scope.colorsDark = [
        '#D25040',
        '#C1733E',
        '#E6BD4C',
        '#D25040',
        '#C1733E',
        '#E6BD4C',
        '#D25040',
        '#C1733E',
        '#E6BD4C',
    ];
	$scope.hexToRgb = function(hex) {
	    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
	    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
	    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
	        return r + r + g + g + b + b;
	    });

	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return result ? {
	        r: parseInt(result[1], 16),
	        g: parseInt(result[2], 16),
	        b: parseInt(result[3], 16)
	    } : null;
	}
	$scope.stackedAreaChart.options = {
			chart: {
				showControls: false,
				type: 'stackedAreaChart',
	            showLegend: false,
				height: 253,
				margin : {
					top: 20,
					right: 0,
					bottom: 60,
					left: 40
				},
				class: function(d){return d[0]},
				x: function(d){return d[0];},
				y: function(d){return d[1];},
				color: function(d,i){
					if($scope.colors[i]){
						return $scope.colors[i];
					}else{
						return '#F0505A';
					}
				},
				//useVoronoi: false,
				clipEdge: true,
				transitionDuration: 500,
				useInteractiveGuideline: true,
				xAxis: {
					showMaxMin: false,
					tickFormat: function(d) {
						return d3.time.format('%x')(new Date(d))
					}
				},
				yAxis: {
					tickFormat: function(d){
						return d3.format(',.2f')(d);
					}
				}
			}
		};

	$scope.stackedAreaChart.data = [
		{
			"key": "Dip. Nombre Apellido",
			"values": [ [ 1025409600000 , 50] , [ 1028088000000 , 67] , [ 1030766400000 , 81] , [ 1033358400000 , 40] , [ 1036040400000 , 95] , [ 1038632400000 , 74] , [ 1041310800000 , 84] ]
		},
		{
			"key": "Dip. Nombre Apellido",
			"values": [ [ 1025409600000 , 78] , [ 1028088000000 , 48] , [ 1030766400000 , 72] , [ 1033358400000 , 50] , [ 1036040400000 , 84] , [ 1038632400000 , 84] , [ 1041310800000 , 74] ]
		},
		{
			"key": "Dip. Nombre Apellido",
			"values": [ [ 1025409600000 , 81] , [ 1028088000000 , 85] , [ 1030766400000 , 38] , [ 1033358400000 , 30] , [ 1036040400000 , 91] , [ 1038632400000 , 73] , [ 1041310800000 , 56] ]
		},
	];

	/*------------/
		#BARCHART
	/*-----------*/
    $scope.barChart.options = {
        chart: {
            type: 'discreteBarChart',
            height: 450,
            margin : {
                top: 20,
                right: 20,
                bottom: 50,
                left: 55
            },
            x: function(d){return d.label;},
            y: function(d){return d.value;},
            showValues: true,
            valueFormat: function(d){
                return d3.format(',.4f')(d);
            },
            duration: 500,
            xAxis: {
                axisLabel: 'X Axis'
            },
            yAxis: {
                axisLabel: 'Y Axis',
                axisLabelDistance: -10
            }
        }
    };

    $scope.barChart.data = [
        {
            key: "Cumulative Return",
            values: [
                {
                    "label" : "A" ,
                    "value" : -29.765957771107
                } ,
                {
                    "label" : "B" ,
                    "value" : 0
                } ,
                {
                    "label" : "C" ,
                    "value" : 32.807804682612
                } ,
                {
                    "label" : "D" ,
                    "value" : 196.45946739256
                } ,
                {
                    "label" : "E" ,
                    "value" : 0.19434030906893
                } ,
                {
                    "label" : "F" ,
                    "value" : -98.079782601442
                } ,
                {
                    "label" : "G" ,
                    "value" : -13.925743130903
                } ,
                {
                    "label" : "H" ,
                    "value" : -5.1387322875705
                }
            ]
        }
    ];


    /*-----------------/
    	#RADARCHART
    /*----------------*/
	$scope.radarChart.labels =["Item A", "Item B", "Item C", "Item D", "Item E", "Item F"];

	$scope.radarChart.data = [
		[65, 59, 90, 81, 56, 55]
	];
    
    /**vilnerable **/
     $scope.vulnerableChart.options = {
            chart: {
                type: 'multiBarHorizontalChart',
                height: 450,
                x: function(d){return d.label;},
                y: function(d){return d.value;},
                showControls: true,
                showValues: true,
                transitionDuration: 500,
                xAxis: {
                    showMaxMin: false
                },
                yAxis: {
                    axisLabel: 'Values',
                    tickFormat: function(d){
                        return d3.format(',.2f')(d);
                    }
                }
            }
        };

        
        $scope.vulnerableChart.data = [
            {
                "key": "Series1",
                "color": "#FF4256",
                "values": [
                    {
                        "label" : "Group A" ,
                        "value" : -1.8746444827653
                    } ,
                    {
                        "label" : "Group B" ,
                        "value" : -8.0961543492239
                    } ,
                    {
                        "label" : "Group C" ,
                        "value" : -0.57072943117674
                    } ,
                    {
                        "label" : "Group D" ,
                        "value" : -2.4174010336624
                    } ,
                    {
                        "label" : "Group E" ,
                        "value" : -0.72009071426284
                    } ,
                    {
                        "label" : "Group F" ,
                        "value" : -0.77154485523777
                    } ,
                    {
                        "label" : "Group G" ,
                        "value" : -0.90152097798131
                    } ,
                    {
                        "label" : "Group H" ,
                        "value" : -0.91445417330854
                    } ,
                    {
                        "label" : "Group I" ,
                        "value" : -0.055746319141851
                    }
                ]
            },
            {
                "key": "Series2",
                "color": "#FF7852",
                "values": [
                    {
                        "label" : "Group A" ,
                        "value" : 25.307646510375
                    } ,
                    {
                        "label" : "Group B" ,
                        "value" : 16.756779544553
                    } ,
                    {
                        "label" : "Group C" ,
                        "value" : 18.451534877007
                    } ,
                    {
                        "label" : "Group D" ,
                        "value" : 8.6142352811805
                    } ,
                    {
                        "label" : "Group E" ,
                        "value" : 7.8082472075876
                    } ,
                    {
                        "label" : "Group F" ,
                        "value" : 5.259101026956
                    } ,
                    {
                        "label" : "Group G" ,
                        "value" : 0.30947953487127
                    } ,
                    {
                        "label" : "Group H" ,
                        "value" : 0
                    } ,
                    {
                        "label" : "Group I" ,
                        "value" : 0
                    }
                ]
            },
            {
                "key": "Series3",
                "color": "#F9CD4A",
                "values": [
                    {
                        "label" : "Group A" ,
                        "value" : 25.307646510375
                    } ,
                    {
                        "label" : "Group B" ,
                        "value" : 16.756779544553
                    } ,
                    {
                        "label" : "Group C" ,
                        "value" : 18.451534877007
                    } ,
                    {
                        "label" : "Group D" ,
                        "value" : 8.6142352811805
                    } ,
                    {
                        "label" : "Group E" ,
                        "value" : 7.8082472075876
                    } ,
                    {
                        "label" : "Group F" ,
                        "value" : 5.259101026956
                    } ,
                    {
                        "label" : "Group G" ,
                        "value" : 0.30947953487127
                    } ,
                    {
                        "label" : "Group H" ,
                        "value" : 0
                    } ,
                    {
                        "label" : "Group I" ,
                        "value" : 0
                    }
                ]
            }
        ]

});
