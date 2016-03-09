<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ver Seguimiento</title>
   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>
    

</head>

<body >
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

<div class="container-fluid" >
    
    <div class="row-fluid" >

        <div class="span6" >
          <!--Body content-->
          <div class="alert alert-success">
            <div class="alert">                
              <large>Datos del Solicitante</large>
            </div>          
            <table class="table table-bordered">          
        
              <tbody>  
                <?php foreach ($get_ciudadano_vs_solicitud as $item) { ?>
                <tr>
                  <td>
                    Nombre: <?php echo $item->nombre ;?> <?php echo $item->apellido_p ;?> <?php echo $item->apellido_m ;?><br>
                    Sexo: <?php echo $item->sexo ;?> / 
                    Edad: <?php echo $item->edad ;?> / 
                    Hijos: <?php echo $item->num_hijos ;?>                  
                  </td>
                </tr>                
                <tr>
                  <td colspan="2">
                    Domicilio: <?php echo $item->domicilio ;?><br>
                    Col ó Fracc.: 
                    <?php 
                    foreach ($get_all_referencias as $key3): 
                        if ($key3->ref_id == $item->ref_id ) { 
                          echo $key3->asenta; 
                        }
                    endforeach 
                    ?>
                       / 
                    C.P.: 
                                  <?php 
              foreach ($get_all_referencias as $key4): 
                  if ($key4->ref_id == $item->ref_id ) { 
                    echo $key4->cp; 
                  }
              endforeach 
              ?>

                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    Tel. Of.: <?php echo $item->tel_of ;?><br>
                    Tel. Casa: <?php echo $item->tel_casa ;?><br>
                    Tel. Cel.:<?php echo $item->tel_cel;?><br>
                    Email: <?php echo $item->email; ?><br>
                    Hora aprox. para localizar: <?php echo $item->hora ;?> Hrs.
                  </td>
                </tr>
                <?php } ?> <!— FIN DEL FOREND —>
              </tbody>
            </table>

            
          </div>
        </div><!— /span6 —>
        
        <div class="span6">
          <!--Body content-->
          <div class="alert alert-success">
              <div class="alert">                
                <h2><medium>Módulo de Seguimiento</medium></h2>
              </div>
            <table class="table table-bordered">          
              <thead>
                <tr>              
                  <th>Folio</th>
                  <th>Fecha</th>                  
                  <th>Clasificación</th>                  
                  <th>Status</th>
                  <th></th>                           
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($get_one_solicitud as $value) { ?>
                  <tr>
                    <td><?php echo $value->solicitud_id;?></td>
                    <td><?php echo $value->fecha;?></td>
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
                    <div class="btn-group">
                          <button class="btn"><i class="icon-file"></i></button>
                          <button class="btn dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                              <!-- dropdown menu links -->                                  
                              <li class="dropdown"><a data-toggle="modal" href="#agre_segui_soli_<?php echo $value->solicitud_id;?>">Agregar Seguimiento &raquo;</a></li>
                            </ul> 
                      </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <textarea><?php echo $value->necesidad;?></textarea>
                  </td>
                </tr> 
                <!— /Ventana Modal AGREGAR SEGUIMIENTO —>
                      <div id="agre_segui_soli_<?php echo $value->solicitud_id;?>" class="modal hide fade in" style="display: none; ">  
                        <div class="modal-header">  
                          <a class="close" data-dismiss="modal">X</a>  
                          <h3>Datos de la Solicitud No: <?php echo $value->solicitud_id;?> </h3>  
                        </div>  
                        <div class="modal-body">
                          <?php echo form_open(site_url().'/seguimiento/agregar'); ?>
    
                              <input type="hidden" name="solicitud_id" id="solicitud_id" value="<?php echo $value->solicitud_id;?>">
                                                            

                              <div class="row-fluid">
                                <div class="span5">
                                  <!--Body content-->
                                  <div class="alert">
                                  <?php
                                    $tipo_seg = array('Seguimiento','Cierre');
                                    echo form_label('Tipo de Seguimiento: ',  'tipo_seg' ) ; 
                                    echo form_dropdown('tipo_seg', $tipo_seg);
                                  ?>                                 
                                  </div>
                                </div>
                                <div class="span7">
                                  <!--Body content-->
                                  <div class="alert">
                                  
                                  <?php 
                                      echo form_label('Comentario: ',  'comentario' ) ; 
                                      echo form_textarea('comentario', set_value('comentario'), 'id="comentario"');
                                    ?>
                                  </div>
                                </div>
                              </div>                       
                        </div>  <!-ModalBody->
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-inverse">Agregar &raquo;</button>  
                            <a href="#" class="btn" data-dismiss="modal">Cancelar &raquo;</a>  
                        </div>
                          <?php echo form_close(); ?>

                      </div>
                      <!— /Ventana Modal AGREGAR SEGUIMIENTO —>
                                   

                <?php } ?> <!--FIN FOREACH SOLICITUDES-->
              </tbody>
            </table>
          </div>
          <div class="alert alert-success">

            <table class="table table-bordered">          
              <thead>
                <tr>              
                  <th>Id</th>
                  <th>Fecha</th>                  
                  <th>Comentario</th>                     
                           
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($get_all_seguimientos as $segui) { ?>
                  <tr>
                    <td><?php echo $segui->seg_id;?></td>
                    <td><?php echo $segui->fecha;?></td>
                    <td>
                      <?php echo $segui->comentario;?>          
                    </td>
                  </tr>
                <?php } ?> <!--FIN FOREACH SOLICITUDES-->
              </tbody>
            </table>
          </div>

        </div><!— /span6 —>

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