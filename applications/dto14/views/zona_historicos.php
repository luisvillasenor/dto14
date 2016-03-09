<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Captura</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
</head>

<body>
<?php
  switch ($_SESSION['grupo']) {
              case 'capturista':
                include 'include/menu_capturistas.php';  
                break;
              case 'gestor':
                include 'include/menu_gestor.php';  
                break;
              case 'administrador':
                include 'include/menu_admin.php'; 
                break;
              default:
                echo '<div class="alert alert-block alert-error">';
                echo '<button type="button" class="close" data-dismiss="alert">x</button>';
                echo '<h4 class="alert-heading">Ups ! Parece ser que Usted no es Miembo de este Sitio !</h4>';
                echo '<p>';
                echo 'Por favor solicite ayuda al administrador del sitio';
                echo '</p>';
                echo '<p>';
                echo '<a class="btn btn-danger" href="'.site_url().'/admin/logout">Cerrar</a>';
                echo '</p>';
                echo '</div>';
                break;
            } 

?>

<div class="container-fluid">
        
    <div class="row-fluid">

        <div class="span12">
          <div class="alert alert-success">
              <div class="alert">                
                  <h2><medium>ZONA DE HISTÓRICOS</medium></h2>
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="">
                      <a href="#zona_sol" data-toggle="tab">Solicitudes</a>
                    </li>
                    <li class="">
                      <a href="#zona_seg" data-toggle="tab">Seguimientos</a>
                    </li>
                    <li class="">
                      <a href="#zona_retro" data-toggle="tab">Retroalimentación</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="zona_sol">
                      <div class="alert alert-success">
                        <h4>HISTÓRICO DE SOLICITUDES</h4>
                          <table class="table table-hover table-bordered table-condensed">          
                            <thead>
                              <tr>              
                                <th>Folio</th>
                                <th>Fecha</th>                  
                                <th>Clasificación</th>                  
                                <th>Necesidad</th>
                                <th>Datos Ciudadano</th>   
                                <th>Dependencia</th>
                                <th>Status</th>         
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              foreach ($get_hist_solicitudes as $value) { ?>
                                <tr>
                                  <td><?php echo $value->solicitud_id;?></td>
                                  <td><?php echo $value->fecha_sol;?></td>
                                  <td>
                                    <?php
            $tipo_id = array('Gestión de Agua','Gestión de Predial','Gestión de Luz','Gestión de Gas LP','Gestión de Medicamentos y Consultas','Gestión de Servicios Públicos Generales','Gestión de Seguridad Pública y Tránsito','Gestión de Asesoría Jurídica');
                                      foreach ($tipo_id as $key_tipo_id => $valor) {
                                         if ($key_tipo_id == $value->tipo_id) {
                                           echo $valor;
                                         }
                                      }                       
                                    ?>          
                                  </td>
                                  <td><?php echo $value->necesidad;?></td>
                                  <td>
                                    Ciudadano:<?php echo $value->nombre;?><?php echo $value->apellido_p;?><br>
                                    Domicilio:<?php echo $value->domicilio;?><br>
                                    Col./Fracc.:<?php echo $value->asenta .' C.P. ';?><?php echo $value->cp;?><br>
                                    Telefonos Of: <?php echo $value->tel_of .' Casa: ';?><?php echo $value->tel_casa .' Cel: ';?><?php echo $value->tel_cel;?><br>
                                  </td>
                                  <td>
                                  <?php
                                      $dep_id = array('NULL','SECTURE','IEA','ISSSSPEA','MUNICIPIO');
                                      foreach ($dep_id as $key_dep_id => $valor) {
                                         if ($key_dep_id == $value->dep_id) {
                                           echo $valor;
                                         }
                                      }                       
                                    ?>  
                                  </td>
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
                                </tr>
                              <?php } ?>
                              </tbody>
                            </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="zona_seg">
                    <?php 
                      foreach ($get_hist_solicitudes as $soli) {?>
                        <div class="alert alert-success">
                             <h4>SOLICITUD No: <?php echo $soli->solicitud_id;                                       
                             switch ($soli->status_id) {
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
?></h4>
                             <div><span>FECHA: <?php echo $soli->fecha_sol; ?></span></div>
                             <div>NECESIDAD: <?php echo $soli->necesidad; ?></div> 
                    <?php foreach ($get_hist_seguimientos as $segui) {
                          if ($soli->solicitud_id == $segui->solicitud_id) {?>
                              
                              <div class="alert">
                                <div>FECHA: <?php echo $segui->fecha; ?></div>
                                <div>GESTOR: <?php echo $segui->gestor; ?></div>
                                <div>SEGUIMIENTO: <?php echo $segui->comentario; ?></div>
                              </div>    
                    <?php }    
                        }?>
                        </div>
                      <?php } ?>

                    </div>

                    <div class="tab-pane fade" id="zona_retro">
                    <?php 
                      foreach ($get_hist_solicitudes as $soli) {?>
                        <div class="alert alert-success">
                             <h4>SOLICITUD No: <?php echo $soli->solicitud_id;
                              switch ($soli->status_id) {
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
                                      } ?></h4>
                             <div><span>FECHA: <?php echo $soli->fecha_sol; ?></span></div>
                             <div>NECESIDAD: <?php echo $soli->necesidad; ?></div> 
                    <?php foreach ($get_hist_retros as $retros) {
                          if ($soli->solicitud_id == $retros->solicitud_id) {?>
                              
                              <div class="alert">
                                <div>FECHA: <?php echo $retros->fecha; ?></div>
                                <div>GESTOR: <?php echo $retros->gestor; ?></div>
                                <div>RETROALIMENTACIÓN: <?php echo $retros->comentario; ?></div>
                              </div>    
                    <?php }    
                        }?>
                        </div>
                      <?php } ?>

                    </div>
                  </div>

              </div>
          </div>



        </div><!— /span12 —>
    </div><!— /row —>
</div><!— /container —>


<script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.js"></script>


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