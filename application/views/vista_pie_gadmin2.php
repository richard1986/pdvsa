
    </div>
  
    <div class="footer" id="footer">
      <div class="container">
        <p class="text-muted credit">&copy; PDVSA 2013 &nbsp;&nbsp;-&nbsp;&nbsp; Diseño y Desarrollo: <strong>Adriana Avendaño</strong></p>
      </div>
    </div>

    <!-- 
      Javascript
    <?php if (!empty($js)): ?>
      <?php foreach ($js as $item): ?>
    <script src="<?=ASSETS_DIR?><?=$item?>"></script>
      <?php endforeach ?>
    <?php endif ?>

    -->
    <?php if (!empty($js_files)): ?>
      <?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
      <?php endforeach; ?>
    <?php else: ?>
    <script src="<?=ASSETS_DIR?>js/jquery.js"></script>
    <?php endif ?>

    <script src="<?=ASSETS_DIR?>js/bootstrap.min.js"></script>
    <script src="<?=ASSETS_DIR?>js/dropdown.js"></script>
    <script src="<?=ASSETS_DIR?>js/modal.js"></script>
    <script>
      $(document).ready(function(){
        $('.dropdown-toggle').dropdown();
      });
    </script>

     <script class="code" type="text/javascript">

      
        $(document).ready(function () {
            
            
            // Datos para el gráfico 2
            //Prom dias instalacion
            var s11 = [<?php foreach ($PLfTimeBarua as $valor) {
              echo round($valor[0]->dias_instalacion);
              if (end($PLfTimeBarua)!==$valor) {
                echo ",";
              }
            } ?>];
            
            //Prom dias operacion
            var s22 = [<?php foreach ($PRunLifeBarua as $valor) {
              echo round($valor[0]->dias_operacion);
              if (end($PRunLifeBarua)!==$valor) {
                echo ",";
              }
            } ?>];
            
            //max dias operacion pozo activo

            // var s33 = [234,324,324,324,234,234,324,234,324,234,234,343];
            var s33 = [<?php foreach ($MRunTime as $valor) {
              // echo "[".round($valor[0]->dias_operacion).",'";
              echo round($valor[0]->dias_operacion);
              // echo "']";
              if (end($MRunTime)!==$valor) {
                echo ",";
              }
            } ?>];
            

            // mtbp
            var s44 = [<?php foreach ($PMTBPBarua as $valor) {
              echo round($valor[0]->MTBP);
              if (end($PMTBPBarua)!==$valor) {
                echo ",";
              }
            } ?>];

            //meses
            var ticks2 = [<?php 
              foreach ($meses as $valor) {
                echo "'".$valor."'";
                if (end($meses)!==$valor) {
                  echo ",";
                }
              }
             ?>];
            
            // -----------------------------------

            plot1 = $.jqplot("chart1", [s11, s22, s33, s44], {
                animate: true,
                animateReplot: true,
                legend: {
                    show: true,
                    placement: 'insideGrid'
                },
                cursor: {
                    show: true,
                    zoom: true,
                    looseZoom: true,
                    showTooltip: true
                },
                series:[
                {

                  label:'Promedio Días Instalación',
                  pointLabels: {
                      show: false
                  },
                  renderer: $.jqplot.BarRenderer,
                  showHighlight: true,
                  yaxis: 'yaxis',
                  rendererOptions: {
                      animation: {
                          speed: 2500
                      },
                      barWidth: 5,
                      barPadding: 0,
                      barMargin: 0,
                      highlightMouseOver: true
                  },
                },
                {
                  label:'Prom. Días Operación',
                  pointLabels: {
                      show: false
                  },
                  renderer: $.jqplot.BarRenderer,
                  showHighlight: true,
                  yaxis: 'yaxis',
                  rendererOptions: { 
                      animation: {
                          speed: 2500
                      },
                      barWidth: 5,
                      barPadding: 0,
                      barMargin: 0,
                      highlightMouseOver: true
                  },
                },
                {
                  label:'Máx Días Operación Pozo Activo',
                  pointLabels: {
                      show: false
                  },
                  yaxis: 'y2axis',
                  dragable: {
                      color: '#ff3366',
                      constrainTo: 'x'
                  },
                  trendline: {
                      color: '#cccccc'
                  },
                },
                {
                  label:'MTBP (Prom. Días Pulling)',
                  pointLabels: {
                      show: false
                  },
                  yaxis: 'yaxis',
                  dragable: {
                      color: '#ff3366',
                      constrainTo: 'x'
                  },
                  trendline: {
                      color: '#cccccc'
                  }
                }
                ],
                axesDefaults: {
                    labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                    tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                },
                axes: {
                    xaxis: {
                      autoscale:false,
                      label:'Mes',
                      renderer: $.jqplot.CategoryAxisRenderer,
                      ticks: ticks2,
                      tickOptions: {
                        angle: 30,
                        fontSize: '8pt'
                      }
                    },
                    yaxis: {
                      autoscale:false,
                      label:'Promedio Días',
                      labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                      min: 0,
                      max: 1500,
                      rendererOptions: {
                          alignTicks: true,
                          forceTickAt0: true
                      }
                    },
                    y2axis: {
                      autoscale:true,
                      label:'Max. Días Operación',
                      labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                      min: 0,
                      max: null,
                      rendererOptions: {
                          alignTicks: true,
                          forceTickAt0: true
                      }
                    }
                },
                highlighter: {
                    show: true, 
                    showLabel: true, 
                    tooltipAxes: 'y',
                    sizeAdjust: 0 , tooltipLocation : 'nw'
                }
            });
          
        });


    </script>
    <!-- End example scripts -->

    <!-- Don't touch this! -->


    <script class="include" type="text/javascript" src="<?=ASSETS_DIR?>js/jquery.jqplot.min.js"></script>
    <!--script type="text/javascript" src="<?=ASSETS_DIR?>syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>syntaxhighlighter/scripts/shBrushXml.min.js"></script>
    <!-- Additional plugins go here -->

    
    <script class="include" type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.highlighter.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.cursor.min.js"></script> 
    <script class="include" type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS_DIR?>plugins/jqplot.dateAxisRenderer.min.js"></script>

    <!-- End additional plugins -->

  </body>
</html>