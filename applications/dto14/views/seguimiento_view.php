<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Seguimiento</title>
   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!—[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]—>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker();

      });

      

    </script>  
   
</head>

<body>
<?php include 'include/menu_capturistas.php';// ?>

<div class="container-fluid">
        
    <div class="row-fluid">

                
        <div class="span12">
          <!--Body content-->
          <div class="hero-unit">
          <?php
            echo form_open(site_url().'/solicitud/buscar');            
            echo form_input('solicitud_id', set_value('solicitud_id'), 'class="search-query" id="solicitudes_id"');
          ?>
            
            <button type="submit" class="btn">Buscar &raquo;</button>
          <?php echo form_close(); ?>  

            <h1>Solicitudes</h1>
            <table class="table table-bordered">          
              <thead>
                <tr>              
                  <th>Folio</th>
                  <th>Fecha</th>                  
                  <th>Clasificación</th>                  
                  <th>Solicitante</th>
                  <th>Necesidad</th>
                  <th>Status</th>
                  <th>Seguimientos</th>
                  <th>Accion</th>         
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($get_all_solicitudes as $value) { ?>
                  <tr>
                    <td><?php echo $value->solicitud_id;?></td>
                    <td><?php echo $value->fecha;?></td>
                    <td>
                      <?php
                        $tipo_id = array('Drenaje','Limpieza','Pintura','Pavimento');
                        foreach ($tipo_id as $key_tipo_id => $valor) {
                           if ($key_tipo_id == $value->tipo_id) {
                             echo $valor;
                           }
                        }                       
                      ?>          
                    </td>
                    <td><?php echo $value->ciud_id;?></td>
                    <td></td>
                    <td>
                      <?php 
                        switch ($value->status_id) {
                          case '0': ?>
                            <span class="badge badge-warning">Abierto</span>
                            <?php break;
                          case '1': ?>
                            <span class="badge badge-success">Atendido</span>
                            <?php break;
                          case '2': ?>
                            <span class="badge badge-info">Proceso</span>
                            <?php break;
                          case '3': ?>
                            <span class="badge badge">Canalizado</span>
                            <?php break;                          
                        }
                      ?>
                    </td>
                    <td><span class="badge badge-warning">99</span></td>
                    <td>
                      <?php
                        echo form_open(site_url().'/captura/seguimiento_detallado');            
                        echo form_hidden('solicitud_id', $value->solicitud_id, 'class="search-query" id="solicitud_id"');
                      ?>
                      <button type="submit" class="btn">Detalle &raquo;</button>
                      <?php echo form_close(); ?>
                    </td>
                  </tr>
                <?php } ?> <!--FIN FOREACH SOLICITUDES-->
              </tbody>
            </table>
            <br></br>
            <span>Que significan los colores?:</span>
            <p></p>
            <span class="badge badge-warning">Abierto</span>
            <span class="badge badge-success">Atendido</span>
            <span class="badge badge-info">Proceso...</span>
            <span class="badge badge">Canalizado</span>
          </div>
        </div><!— /span6 —>

    </div><!— /row —>
</div><!— /container —>





<!-- <script src="http://localhost/gs/bootstrap/js/bootstrap.min.js"></script> -->

<script>  
$(function (){ 

  $("#monitoreo").popover({
    title: '',
    content: "Actualiza el Monitoreo.",
    trigger: 'hover',
    placement: 'bottom'
  });

});  
</script>

<script src="<?php echo base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-alert.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-button.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-carousel.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-popover.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-scrollspy.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-typeahead.js"></script>
</body>
</html>