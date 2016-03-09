<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agregar Nuevo proveedores View</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
  <meta name="author" content="Luis G. Villaseñor">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>
  <style type="text/css">
    #subheader {
      background-color: #CCC;
      margin: auto;
      height: 20px;
      width: 100%;
      text-align: center;
      word-spacing: normal;
      letter-spacing: normal;
      vertical-align: middle;
      white-space: normal;
      display: inline-block;
      
    }
  </style>

  <script>
    $(document).ready(function(){
      $(function() {
        $( "#fecha" ).datepicker({ 
          dateFormat: 'yy-mm-dd', 
          showWeek: true, 
          firstDay:1
        });
        $( ".datepicker" ).datepicker({ 
          dateFormat: 'yy-mm-dd', 
          showWeek: true, 
          firstDay:1
        });
      });
    });      
  </script>
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
          <!--Body content-->
          <ul class="breadcrumb">
            Semana de Trabajo iniciada el día Lunes 3 de Mayo del 2013
          </ul>
        </div><!— /span12 —>

    </div><!— /row —>

    <div class="row-fluid">

    </div><!— /row —>
  
    <div class="row-fluid">

        
        
        <div class="alert alert-success span8">
          <!--Body content-->          
          <div class="row-fluid">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url();?>/captura/index"><i class="icon-home"></i></a> <span class="divider">/</span></li>
              <li><a href="<?php echo site_url();?>/captura/proveedoress">Coordinadores</a> <span class="divider">/</span></li>
              <li class="active">Agregar Nuevo</li>
            </ul>
            
          </div>
                      
          <form>
            <fieldset>
              <legend>Agregar un Nuevo Coordinador</legend>
              <label>Folio Lista Nominal</label>
                <input type="text" placeholder="Escriba el Folio...">
              <label>Nombre del Coordinador</label>
                <input type="text" placeholder="Escriba el nombre…">
              <label>Sección</label>
                <input type="text" placeholder="Escriba la Sección...">
              <label>¿Asistió a Casilla para Votar?</label>
              <label class="radio">
                <input type="radio" value="1"> Sí
              </label>
              <label class="radio">
                <input type="radio" value="0"> No
              </label>
              <button type="submit" class="btn">Agregar</button>
            </fieldset>
          </form>
          
        </div><!— /span8 —>

        <?php include 'include/nav_prov_izq.php';  ?>

    </div><!— /row —>

</div><!— /container —>




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