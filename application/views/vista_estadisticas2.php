   <div class="page-header">
     <h1>Historial</h1>
   </div>
   <p>
		<table class="table table-striped">
	        <thead>
	          <tr>
	            <th>Item</th>
	            <th>Barúa</th>
	            <th>Motatán</th>
	          </tr>	 
	        </thead>
	        <tbody>
	          
	          <!-- <tr>
	            <td>Total Eventos</td>
	            <td><?=$evBarua?></td>
	            <td><?=$evMot?></td>
	          </tr> -->

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
	          
	          <!-- <tr>
	          	<td>Max Life Time</td>
	          	<td><?=$MLfTimeBarua[0]->dias_instalacion == 0 ? 0 : $MLfTimeBarua[0]->dias_instalacion;?></td>
	          	<td><?=$MLfTimeMot[0]->dias_instalacion == 0 ? 0 : $MLfTimeMot[0]->dias_instalacion;?></td>
	          </tr> -->

	          <tr>
	          	<td>Max Dias Operación Pozos Activos</td>
	          	<td><?=$MaxRunLifePABarua[0]->dias_operacion == 0 ? 0 : $MaxRunLifePABarua[0]->dias_operacion;?></td>
	          	<td><?=$MaxRunLifePAMot[0]->dias_operacion == 0 ? 0 : $MaxRunLifePAMot[0]->dias_operacion;?></td>
	          </tr>

	          <!-- <tr>
	          	<td>Número de Fallas</td>
	          	<td><?=$NFallasBarua[0]->fecha_falla == 0 ? 0 : $NFallasBarua[0]->fecha_falla;?></td>
	          	<td><?=$NFallasMot[0]->fecha_falla == 0 ? 0 : $NFallasMot[0]->fecha_falla;?></td>
	          </tr> -->

			  <!-- <tr>
			  	<td>Total Pozos Activos</td>
			  	<td><?=$TPABarua[0]->fecha_falla == 0 ? 0 : $TPABarua[0]->fecha_falla;?></td>
			  	<td><?=$TPAMot[0]->fecha_falla == 0 ? 0 : $TPAMot[0]->fecha_falla;?></td>
			  </tr> -->

			  <!-- <tr>
			  	<td>Prom Life Time Pozos Activos</td>
			  	<td><?=$PLfTimePABarua[0]->dias_instalacion == 0 ? 0 : round($PLfTimePABarua[0]->dias_instalacion);?></td>
			  	<td><?=$PLfTimePAMot[0]->dias_instalacion == 0 ? 0 : round($PLfTimePAMot[0]->dias_instalacion);?></td>
			  </tr>
				
			  <tr>
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
			  </tr> -->
	        </tbody>
		</table>

	    <div id="chart2" style="width:100%; height:500px"></div>
	    <!-- <div id="chart2" style="width:100%; height:500px"></div> -->
   </p>
 </div>
 