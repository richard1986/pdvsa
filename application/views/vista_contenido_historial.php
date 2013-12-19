
        <div class="page-header">
          	<?php if ($this->uri->segment(2)=="verEventos"): ?>
          <a id="atras" class="btn btn-success">
          	<span class=".glyphicon .glyphicon-chevron-left"></span>
			Atrás</a>
          	<?php endif ?>
          <h1>
          	<?php if ($this->uri->segment(2)=="verEventos"): ?>
				Eventos del pozo: <?php 
					$pozo = $this->db
								 ->where("idpozos",$this->uri->segment(3))
								 ->join('campos', 'campos.idcampos  = pozos.campos_idcampos')
								 ->get("pozos")
								 ->result();
					echo $pozo[0]->nombre_pozo." - ".$pozo[0]->nombre;
				?>	
          	<?php else: ?>
          		Historial
          	<?php endif ?>
          </h1>
        </div>
        <p>
          <?=$output?>
        </p>
      </div>