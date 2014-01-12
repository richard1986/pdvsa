   <div class="page-header">
     <h1>Seleccionar Historial de Pozos Activos por Rango</h1>
   </div>
   <form class="form-horizontal" method="post" action="<?=base_url()?>admin/HPA2">
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
				<div class="col-xs-12">
					<h3>Campo</h3>
				</div>
			</div>
		   	<div class="row">
				<div class="col-xs-3">
					<select class="form-control" name="campo" placeholder="Mes" id="campo">
						<option value="1" selected>Barúa</option>
						<option value="2">Motatán</option>
					</select>
				</div>
		   	</div>

		<div class="row">
			<div class="col-xs-12">
				<h3>Desde</h3>
			</div>
		</div>
	   	<div class="row">
			<div class="col-xs-3">
				<select class="form-control" name="mesD" placeholder="Mes" id="mesD">
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
				<select class="form-control" name="anioD" placeholder="Año" id="anioD">
					<?php 
					for ($i=date('Y'); $i > date('Y') - 50 ; $i--) { 
					?>
						<option value="<?=$i?>"><?=$i?></option>

					<?php } ?>
				</select>
			</div>
		
	   	</div>
		<div class="row">
			<div class="col-xs-12">
				<h3>Hasta</h3>
			</div>
		</div>
   	   	<div class="row">
   			<div class="col-xs-3">
   				<select class="form-control" name="mesH" placeholder="Mes" id="mesH">
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
   				<select class="form-control" name="anioH" placeholder="Año" id="anioH">
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