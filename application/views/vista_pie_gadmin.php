
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
          // Datos para el gráfico 1
          var s1 = [<?=$PLfTimeBarua[0]->dias_instalacion == 0 ? 0 : $PLfTimeBarua[0]->dias_instalacion;?>, <?=$PLfTimeMot[0]->dias_instalacion == 0 ? 0 : $PLfTimeMot[0]->dias_instalacion;?>];
          var s2 = [<?=$PRunLifeBarua[0]->dias_operacion == 0 ? 0 : $PRunLifeBarua[0]->dias_operacion;?>, <?=$PRunLifeMot[0]->dias_operacion == 0 ? 0 : $PRunLifeMot[0]->dias_operacion;?>];
          var s3 = [<?=$MRunLifeBarua[0]->dias_operacion == 0 ? 0 : $MRunLifeBarua[0]->dias_operacion;?>, <?=$MRunLifeMot[0]->dias_operacion == 0 ? 0 : $MRunLifeMot[0]->dias_operacion;?>];
          var s4 = [<?=$PMTBPBarua[0]->MTBP == 0 ? 0 : $PMTBPBarua[0]->MTBP;?>, <?=$PMTBPMot[0]->MTBP == 0 ? 0 : $PMTBPMot[0]->MTBP;?>];
          var s5 = [<?=$TPABarua[0]->fecha_falla == 0 ? 0 : $TPABarua[0]->fecha_falla;?>, <?=$TPAMot[0]->fecha_falla == 0 ? 0 : $TPAMot[0]->fecha_falla;?>];
          var ticks = ['Barúa', 'Motatán'];
            
          plot2 = $.jqplot("chart2", [s1, s2, s3, s4, s5], {
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
                  showTooltip: false
              },
              series:[
              {
                label:'Promedio Días Instalación',
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: {
                    animation: {
                        speed: 2500
                    },
                    barWidth: 25,
                    // barPadding: -70,
                    barMargin: 0,
                    highlightMouseOver: false
                },
              },
              {
                label:'Promedio Días Operación',
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: { 
                    animation: {
                        speed: 2500
                    },
                    barWidth: 25,
                    // barPadding: -25,
                    barMargin: 0,
                    highlightMouseOver: false
                },
              },
              {
                label:'Max Días Operación Pozos Activos',
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: { 
                    animation: {
                        speed: 2500
                    },
                    barWidth: 25,
                    // barPadding: 0,
                    barMargin: 25,
                    highlightMouseOver: false
                },
              },
              {
                label:'MTBP (Prom. Días Pulling)',
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: { 
                    animation: {
                        speed: 2500
                    },
                    barWidth: 25,
                    // barPadding: 50,
                    barMargin: 0,
                    highlightMouseOver: false
                },
              },
              {
                label:'Número de Pozos Activos',
                pointLabels: {
                    show: true
                },
                yaxis: 'y2axis',
                dragable: {
                    color: '#ff3366',
                    constrainTo: 'x'
                },
                trendline: {
                    color: '#cccccc'
                }
              }
              ],
              axes: {
                  xaxis: {
                      renderer: $.jqplot.CategoryAxisRenderer,
                      ticks: ticks,
                  },
                  yaxis: {
                      rendererOptions: {
                          alignTicks: true,
                          forceTickAt0: true
                      }
                  },
                  y2axis: {
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
                  sizeAdjust: 7.5 , tooltipLocation : 'ne'
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

    <!-- End additional plugins -->

  </body>
</html>