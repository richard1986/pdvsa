
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
    <script src="<?=ASSETS_DIR?>js/jquery-ui-1.10.3.custom.js"></script>

    <!--script src="js/jquery-1.9.1.js"></script-->

    <script src="<?=ASSETS_DIR?>js/bootstrap.min.js"></script>
    <script src="<?=ASSETS_DIR?>js/dropdown.js"></script>
    <script src="<?=ASSETS_DIR?>js/modal.js"></script>
    <script>
      $(document).ready(function(){
        
        $('.dropdown-toggle').dropdown();

        $( "#desde, #hasta" ).datepicker({
            inline: true,
            dateFormat: 'dd/mm/yy'
        });

        $("#atras").click(function(){
          <?php if ($this->uri->segment(4)=="add" || $this->uri->segment(4)=="edit"): ?>
            window.location = "<?=base_url()?>admin/verEventos/<?=$this->uri->segment(3)?>";
          <?php else: ?>
            window.location = "<?=base_url()?>admin/pozos";
          <?php endif ?>
        });

        <?php if ($this->uri->segment(4)=="add") : ?>
        $("#field-corrida").prop("disabled",true).val(<?php
      
          $corrida = $this->db->where("pozos_idpozos",$this->uri->segment(3))->order_by("corrida","DESC")->limit(1)->get("historial")->result();
          echo empty($corrida[0]->corrida) ? 1 : (int)$corrida[0]->corrida + 1;
        
        ?>);
        <?php endif;?>

        <?php if ($this->uri->segment(4)=="edit") : ?>
        $("#field-corrida").prop("disabled",false);
        <?php endif;?>
      });
    </script>
  </body>
</html>