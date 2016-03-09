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
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>

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

        <?php include 'include/nav_izq.php';  ?>
        
        <div class="alert alert-success span8">
          <!--Body content-->          
          <div class="row-fluid">
            <div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <!-- Be sure to leave the brand out there if you want it shown -->
                  <a class="brand" href="#">Recepción de Productos</a>
                  <ul class="nav">                                        
                  </ul>             
                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse collapse">
                      <!-- .nav, .navbar-search, .navbar-form, etc -->
                      <?php echo form_open(site_url().'/captura/buscar_codigo','class="navbar-search pull-right"'); ?>
                        <input type="text" name="codigo" id="codigo" class="search-query" placeholder="Código...">
                        <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
                      </form>
                    
                    </div>                 
                </div>
              </div>
            </div>
          </div>
                      
          <table class="table table-bordered">
            <thead></thead>
            <tbody>
              <tr>                
                <th>Código</th>
                <th>Producto</th>
                <th>Medida</th>
                <th>Costo</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
              <tr>
              <?php echo form_open(); ?>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo form_input('codigo', set_value('codigo'), 'id="codigo" class="span10"'); ?></td>
                <td><?php echo form_input('codigo', set_value('codigo'), 'id="codigo" class="span10"'); ?></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <?php echo form_submit('submit',  'Registrar' ); ?>
          <?php echo form_close(); ?>
            
          
        </div><!— /span8 —>

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