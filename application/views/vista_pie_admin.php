
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
  </body>
</html>