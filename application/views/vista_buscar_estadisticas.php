   <div class="page-header">
     <h1>Seleccionar Estadísticas</h1>
   </div>
   <form class="form-horizontal" method="post" action="<?=base_url()?>admin/GEstadisticas">
	   	<!-- <div class="row">
	   		<label class="col-sm-2 control-label" for="desde">Desde</label>
			<div class="col-xs-3">
				<input type="text" class="form-control" name="desde" placeholder="Desde" id="desde" readonly="readonly">
			</div>
	 		<label class="col-sm-2 control-label" for="hasta">Hasta</label>
			<div class="col-xs-3">
				<input type="text" class="form-control" name="hasta" placeholder="Hasta" id="hasta" readonly="readonly">
			</div>
		</div> -->

	   	<div class="row">
			<div class="col-xs-3">
				<select class="form-control" name="mes" placeholder="Mes" id="mes">
					<option value="1" selected>Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
			</div>

			<div class="col-xs-3">
				<select class="form-control" name="anio" placeholder="Año" id="anio">
					<?php 
					for ($i=date('Y'); $i > date('Y') - 50 ; $i--) { 
					?>
						<option value="<?=$i?>"><?=$i?></option>

					<?php } ?>
				</select>
			</div>
		
	   	</div>
   		<p></p>
   		<div class="row">
   			<div class="col-xs-12">
   	    		<button class="btn btn-success" type="submit">Buscar</button>
   			</div>
   		</div>
	</form>
 </div>