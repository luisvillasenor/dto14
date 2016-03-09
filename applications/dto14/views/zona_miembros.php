<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Zona de Miembros</title>   
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
include "libchart/libchart/classes/libchart.php";

?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="alert alert-success">
        <div class="alert">                
          <h2><medium>ZONA DE MIEMBROS</medium></h2>
              <table class="table table-hover table-bordered table-condensed">
              <thead>
                <th>Nombre Completo</th>
                <th>E-Mail</th>
                <th>Fecha Alta</th>
                <th>Grupo</th>
              </thead>
              <tbody>
                <?php 
                  foreach ($get_all_users as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->nombre.' '.''; echo $value->apellido; ?>                  
                      </td>
                      <td><?php echo $value->email_address; ?>                  
                      </td>
                      <td><?php echo $value->fecha_creacion; ?>                
                      </td>
                      <td><?php echo $value->grupo; ?>                 
                      </td>
                    </tr>  
                <?php  } ?>
              </tbody>
              </table>

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