   <div class="page-header">
     <h1>Estadísticas</h1>
   </div>

   <p>
		<table class="table">
	        <thead>
	          <tr>
	            <th>Item</th>
	            <th>Barúa</th>
	            <th>Motatán</th>
	          </tr>
	        </thead>
	        <tbody>
	          
	          <tr>
	            <td>Total Eventos</td>
	            <td><?=$evBarua?></td>
	            <td><?=$evMot?></td>
	          </tr>

	          <tr>
	          	<td>Promedio Life Time</td>
	          	<td><?=$PLfTimeBarua[0]->dias_instalacion == 0 ? 0 : round($PLfTimeBarua[0]->dias_instalacion);?></td>
	          	<td><?=$PLfTimeMot[0]->dias_instalacion == 0 ? 0 : round($PLfTimeMot[0]->dias_instalacion);?></td>
	          </tr>

	          <tr>
	          	<td>Promedio Run Life</td>
	          	<td><?=$PRunLifeBarua[0]->dias_operacion == 0 ? 0 : round($PRunLifeBarua[0]->dias_operacion);?></td>
	          	<td><?=$PRunLifeMot[0]->dias_operacion == 0 ? 0 : round($PRunLifeMot[0]->dias_operacion);?></td>
	          </tr>
	          
	          <tr class="danger">
	          	<td>Max Life Time</td>
	          	<td><?=$MLfTimeBarua[0]->dias_instalacion == 0 ? 0 : $MLfTimeBarua[0]->dias_instalacion;?></td>
	          	<td><?=$MLfTimeMot[0]->dias_instalacion == 0 ? 0 : $MLfTimeMot[0]->dias_instalacion;?></td>
	          </tr>

	          <tr class="danger">
	          	<td>Max Run Time</td>
	          	<td><?=$MRunLifeBarua[0]->dias_operacion == 0 ? 0 : $MRunLifeBarua[0]->dias_operacion;?></td>
	          	<td><?=$MRunLifeMot[0]->dias_operacion == 0 ? 0 : $MRunLifeMot[0]->dias_operacion;?></td>
	          </tr>

	          <tr class="danger">
	          	<td>Número de Fallas</td>
	          	<td><?=$NFallasBarua[0]->fecha_falla == 0 ? 0 : $NFallasBarua[0]->fecha_falla;?></td>
	          	<td><?=$NFallasMot[0]->fecha_falla == 0 ? 0 : $NFallasMot[0]->fecha_falla;?></td>
	          </tr>

			  <tr class="danger">
			  	<td>Total Pozos Activos</td>
			  	<td><?=$TPABarua[0]->fecha_falla == 0 ? 0 : $TPABarua[0]->fecha_falla;?></td>
			  	<td><?=$TPAMot[0]->fecha_falla == 0 ? 0 : $TPAMot[0]->fecha_falla;?></td>
			  </tr>

			  <tr class="danger">
			  	<td>Prom Life Time Pozos Activos</td>
			  	<td><?=$PLfTimePABarua[0]->dias_instalacion == 0 ? 0 : round($PLfTimePABarua[0]->dias_instalacion);?></td>
			  	<td><?=$PLfTimePAMot[0]->dias_instalacion == 0 ? 0 : round($PLfTimePAMot[0]->dias_instalacion);?></td>
			  </tr>
				
			  <tr class="danger">
			  	<td>Prom Run Life Pozos Actívos</td>
			  	<td><?=$PRLPABarua[0]->dias_operacion == 0 ? 0 : round($PRLPABarua[0]->dias_operacion);?></td>
			  	<td><?=$PRLPAMot[0]->dias_operacion == 0 ? 0 : round($PRLPAMot[0]->dias_operacion);?></td>
			  </tr>
			  
			  <tr>
			  	<td>MTBP</td>
			  	<td><?=$PMTBPBarua[0]->MTBP == 0 ? 0 : round($PMTBPBarua[0]->MTBP);?></td>
			  	<td><?=$PMTBPMot[0]->MTBP == 0 ? 0 : round($PMTBPMot[0]->MTBP);?></td>
			  </tr>
			  
			  <tr>
			  	<td>Max MTBP</td>
			  	<td><?=$MMTBPBarua[0]->MTBP == 0 ? 0 : $MMTBPBarua[0]->MTBP;?></td>
			  	<td><?=$MMTBPMot[0]->MTBP == 0 ? 0 : $MMTBPMot[0]->MTBP;?></td>
			  </tr>
			  
			  <tr>
			  	<td>Suma MTBP</td>
			  	<td><?=$SMTBPBarua[0]->MTBP == 0 ? 0 : $SMTBPBarua[0]->MTBP;?></td>
			  	<td><?=$SMTBPMot[0]->MTBP == 0 ? 0 : $SMTBPMot[0]->MTBP;?></td>
			  </tr>

			  <tr>
			  	<td>Total Pulling</td>
			  	<td><?=$CMTBPBarua[0]->MTBP == 0 ? 0 : $CMTBPBarua[0]->MTBP;?></td>
			  	<td><?=$CMTBPMot[0]->MTBP == 0 ? 0 : $CMTBPMot[0]->MTBP;?></td>
			  </tr>
	        </tbody>
		</table>

	   
	   <!-- <div id="chart1" style="width:100%; height:500px"></div> -->
	   <div class="page-header">
	     <h3>Barúa - Motatán</h3>
	     <?php $mes = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"); ?>
	     <h4>Comportamiento Pozos BES - <?=$mes[$_POST['mes']]." ".$_POST['anio']?></h4>
	   </div>
	    <div id="chart2" style="width:100%; height:500px"></div>
   </p>
 </div>
 