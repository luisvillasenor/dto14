<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Zona de Monitorep</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
</head>

<body>
<?php foreach ($get_tot_sol as $key => $value) { $tot_sol = $value; } ?>
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
include "libchart/libchart/classes/libchart.php";

?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="alert alert-success">
        <div class="alert">                
          <h2><medium>ZONA DE MONITOREO</medium></h2>
          <ul class="nav nav-tabs" id="myTab">
            <li class="">
              <a href="#mon_1" data-toggle="tab">Solicitudes por Status</a>
            </li>
            <li class="">
              <a href="#mon_2" data-toggle="tab">Solicitudes por Sección</a>
            </li>
            <li class="">
              <a href="#mon_3" data-toggle="tab">Solicitudes por Asentamiento</a>
            </li>
            <li class="">
              <a href="#mon_4" data-toggle="tab">Solicitudes por Asentamiento</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="mon_1">
              <div class="alert alert-success">
                <h4>TOTAL DE SOLICITUDES POR STATUS</h4>
              </div>                      
              
              <table class="table table-hover table-bordered table-condensed">
              <thead>
                <th>Status</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php 
                  foreach ($monitoreo_status as $key => $value) { ?>
                    <tr>
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
                      <td>
                        <?php 
                        switch ($value->status_id) {
                            case '0': ?>
                              <span class="badge badge-warning"><?php echo $value->total ; ?></span>
                              <?php break;
                            case '1': ?>
                              <span class="badge badge-success"><?php echo $value->total ; ?></span>
                              <?php break;
                            case '2': ?>
                              <span class="badge badge-info"><?php echo $value->total ; ?></span>
                              <?php break;
                            case '3': ?>
                              <span class="badge badge"><?php echo $value->total ; ?></span>
                              <?php break;   
                        }
                        ?>
                      </td>
                    </tr>
                    
                <?php  } ?>
              </tbody>
              </table>
            </div>

            <div class="tab-pane fade" id="mon_2">
              <div class="alert alert-success">
                <h4>TOTAL DE SOLICITUDES POR SECCION vs STATUS</h4>
              </div>                      
              
              <table class="table table-hover table-bordered table-condensed">
              <thead>
                <th>Sección</th>
                <th>Status</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php 
                  foreach ($moni_status_sec as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->seccion ;?></td>
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
                      <td>
                        <?php 
                        switch ($value->status_id) {
                                        case '0': ?>
                                          <span class="badge badge-warning"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '1': ?>
                                          <span class="badge badge-success"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '2': ?>
                                          <span class="badge badge-info"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '3': ?>
                                          <span class="badge badge"><?php echo $value->total ; ?></span>
                                          <?php break;   
                        }
                        ?>
                      </td>
                    </tr>
                    
                <?php  } ?>
              </tbody>
              </table>
            </div>

            <div class="tab-pane fade" id="mon_3">
              <div class="alert alert-success">
                <h4>TOTAL DE SOLICITUDES POR ASENTAMIENTO vs STATUS</h4>
              </div>                      
              
              <table class="table table-hover table-bordered table-condensed">
              <thead>
                <th>Seccion</th>
                <th>Asentamiento</th>
                <th>Status</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php 
                  foreach ($moni_status_ref as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->seccion ;?></td>
                      <td><?php echo $value->asenta ;?></td>
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
                      <td>
                        <?php 
                        switch ($value->status_id) {
                                        case '0': ?>
                                          <span class="badge badge-warning"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '1': ?>
                                          <span class="badge badge-success"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '2': ?>
                                          <span class="badge badge-info"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '3': ?>
                                          <span class="badge badge"><?php echo $value->total ; ?></span>
                                          <?php break;   
                        }
                        ?>
                      </td>
                    </tr>
                    
                <?php  } ?>
              </tbody>
              </table>
            </div>

            <div class="tab-pane fade" id="mon_4">
              <div class="alert alert-success">
                <h4>TOTAL DE SOLICITUDES POR TIPO DE GESTION</h4>
              </div>                      
              
              <table class="table table-hover table-bordered table-condensed">
              <thead>
                <th>Tipo de Gestión</th>
                <th>Status</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php 
                  foreach ($moni_status_clas as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->tipo ; ?></td>
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
                      <td>
                        <?php 
                        switch ($value->status_id) {
                                        case '0': ?>
                                          <span class="badge badge-warning"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '1': ?>
                                          <span class="badge badge-success"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '2': ?>
                                          <span class="badge badge-info"><?php echo $value->total ; ?></span>
                                          <?php break;
                                        case '3': ?>
                                          <span class="badge badge"><?php echo $value->total ; ?></span>
                                          <?php break;   
                        }
                        ?>
                      </td>
                    </tr>
                    
                <?php  } ?>
              </tbody>
              </table>
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