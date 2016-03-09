<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Solicitudes</title>
   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!—[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]—>
    
    <link href="http://10.1.17.10/ci21test/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://10.1.17.10/ci21test/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
   
</head>

<body>

<?php include_once 'include/menu_principal.php'; ?>

<div class="container-fluid">
      
    <div class="row-fluid">

        <div class="span12">
          <!--Body content-->
         
          <div class="hero-unit">
            <h1>Monitoreo</h1>
              
              
              <!— /Ventana Modal AGREGAR SOLICITUD —>
              <div id="example3" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header">  
                  <a class="close" data-dismiss="modal">X</a>  
                  <h3>Agregar Nueva Solicitud</h3>  
                </div>  
                <div class="modal-body">  
                  <?php echo form_open(site_url().'/solicitud/agregar'); ?>
                  <p>
                      <?php echo form_label('Prioridad: ',  'prioridad' ) ; ?>
                      <select name="prioridad_id" id="prioridad_id">
                      <?php foreach ($listado_prioridades as $key_prioridad): ?>
                          <option value="<?php echo $key_prioridad->prioridad_id; ?>"><?php echo $key_prioridad->prioridad; ?></option>
                      <?php endforeach ?>
                      </select></p>
                  <p>
                      <?php echo form_label('Clasificacion: ',  'clasificado' ) ; ?>
                      <select name="clasificado_id" id="clasificado_id">
                      <?php foreach ($listado_clasificados as $key_clasificado): ?>
                          <option value="<?php echo $key_clasificado->clasificado_id; ?>"><?php echo $key_clasificado->clasificado; ?></option>
                      <?php endforeach ?>
                      </select></p>                
                </div>  
                <div class="modal-footer">
                    <button type="submit" class="btn btn-inverse">Agregar &raquo;</button>  
                    <a href="#" class="btn" data-dismiss="modal">Cancelar &raquo;</a>  
                </div>
                  <?php echo form_close(); ?>                  
              </div>
              <!— /Ventana Modal AGREGAR SOLICITUD —>
            

        <table class="table table-hover table-bordered table-condensed">
          
          <thead>
            <tr>              
              <th>Folio</th>
              <th>Fecha</th>
              <th>Prioridad</th>
              <th>Clasificación</th>
              <th>Solicitante</th>
              <th></th>
              <th>Monitoreo</th>              
            </tr>
          </thead>
          <tbody>
            
              <?php foreach ($mis_solicitudes as $key_solicitudes): ?>
              <tr>
                  
                  <td><span class="badge badge-default"><?php echo $key_solicitudes->solicitudes_id; ?></span></td>
                  <td><?php echo $key_solicitudes->fecha_solicitud; ?></td>
                  <td><?php echo $key_solicitudes->prioridad; ?></td>
                  <td><?php echo $key_solicitudes->clasificado; ?></td>
                  <td><?php echo strstr($key_solicitudes->user,'@',true); ?></td>
                  
                  <td>
                    <?php echo form_open(site_url().'/solicitud/detalle_bienesoservicios_solicitud_view'); ?>
                      <input type="hidden" name="solicitudes_id" id="solicitudes_id" value="<?php echo $key_solicitudes->solicitudes_id; ?>">
                      <input type="hidden" name="clasificado_id" id="clasificado_id" value="<?php echo $key_solicitudes->clasificado_id; ?>">

                      <button type="submit" class="btn btn-inverse">Ver Solicitudes &raquo;</button>

                    <?php echo form_close(); ?>
                  </td>
                  <td>
                    <?php foreach ($cuenta_bultos as $key2): ?>
                        <?php 
                          if ($key_solicitudes->solicitudes_id == $key2->solicitudes_id AND $key2->cuenta_bultos != 0) { ?>
                              <?php if ($key2->status == '1') {?>
                                <span class="badge badge-warning"><?php echo $key2->cuenta_bultos; ?></span>
                              <?php }?>
                              <?php if ($key2->status == '2') {?>
                                <span class="badge badge-success"><?php echo $key2->cuenta_bultos; ?></span>
                              <?php }?>
                              <?php if ($key2->status == '3') {?>
                                <span class="badge badge-important"><?php echo $key2->cuenta_bultos; ?></span>
                              <?php }?>
                              <?php if ($key2->status == '4') {?>
                                <span class="badge badge-info"><?php echo $key2->cuenta_bultos; ?></span>
                              <?php }?>
                              <?php if ($key2->status == '5') {?>
                                <span class="badge badge"><?php echo $key2->cuenta_bultos; ?></span>
                              <?php }?>

                              
                        <?php } ?>
                    <?php endforeach ?>
                  </td>

              </tr>
              <?php endforeach ?>            
          </tbody>
        </table>
        <br></br>

        

        <span>Que significan los colores?:</span>
  <p></p>
  <span class="badge badge-warning">Pendientes</span>
  <span class="badge badge-success">Autorizadas</span>
  <span class="badge badge-important">Rechazadas</span>
  <span class="badge badge-info">Esperando...</span>
  <span class="badge badge">Solicitado</span>

    </div>
        </div><!— /span10 —>
    </div><!— /row —>
</div><!— /container —>



<!-- <script src="http://10.1.17.10/ci21test/bootstrap/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>  
<script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-modal.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>

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



</body>
</html>