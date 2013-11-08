
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
            var s1 = [206, 637];
            var s2 = [201, 631];
            var s3 = [453, 1833];
            var s4 = [239, 675];
            var s5 = [11, 9];

            var ticks = ['Barúa', 'Motatán'];
            
            // -----------------------------------
            
            // Datos para el gráfico 2
            var s11 = [567,657,657,567,567,675,675,676,567,657,567,567];
            var s22 = [678,787,698,768,976,897,687,698,768,976,987,689];
            var s33 = [234,324,324,324,234,234,324,234,324,234,234,343];
            var s44 = [4343,4423,4242,4234,4342,3923,4354,3832,4242,3923,4324,4423];

            var ticks2 = ['Ene-2009','Feb-2009','Mar-2009','Abr-2009','May-2009','Jun-2009','Jul-2009','Ago-2009','Sep-2009','Oct-2009','Nov-2009','Dic-2009'];
            
            // -----------------------------------


            plot1 = $.jqplot("chart1", [s11, s22, s33, s44], {
                animate: true,
                animateReplot: true,
                legend: {
                    show: true,
                    placement: 'outsideGrid'
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
                      barWidth: 5,
                      // barPadding: -70,
                      barMargin: 0,
                      highlightMouseOver: false
                  },
                },
                {
                  label:'Prom. Días Operación',
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
                      barWidth: 5,
                      // barPadding: -25,
                      barMargin: 0,
                      highlightMouseOver: false
                  },
                },
                {
                  label:'Máx Días Operación Pozo Activo',
                  pointLabels: {
                      show: true
                  },
                  yaxis: 'yaxis',
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
                        ticks: ticks2,
                    },
                    yaxis: {
                        min: 0,
                        max: 1500,
                        rendererOptions: {
                            alignTicks: true,
                            forceTickAt0: true
                        }
                    },
                    y2axis: {
                        min: 200,
                        max: 5000,
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
          
          plot2 = $.jqplot("chart2", [s1, s2, s3, s4, s5], {
              animate: true,
              animateReplot: true,
              legend: {
                  show: true,
                  placement: 'outsideGrid'
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
                label:'Máx Días Operación Pozo Activo',
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
                label:'N° Pozos Activos',
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
                label:'Prom. Días Operación',
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
                label:'MTBP (Prom. Días Pulling)',
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