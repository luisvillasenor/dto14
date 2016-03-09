<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Seguimiento Detallado</title>
   
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

        <div class="span6">
          <!--Body content-->
          <div class="hero-unit">
          
            <h1>Datos del Ciudadano</h1>
            <table class="table table-bordered">          
              <thead>
                <tr>              
                  <th>Id</i></th>
                  <th>Nombre</i></th>
                  <th>Sexo</th>
                  <th>Edad</th>
                  <th>Acciones</th>              
                </tr>
              </thead>
                
              <tbody>  
                <?php foreach ($get_ciudadano_vs_solicitud as $item) { ?>
                <tr>
                  <td><?php echo $item->ciud_id ;?></td>
                  <td><?php echo $item->nombre ;?> <?php echo $item->apellido_p ;?> <?php echo $item->apellido_m ;?></td>
                  <td><?php echo $item->sexo ;?></td>
                  <td><?php echo $item->edad ;?></td>
                  <td>
                    <div class="btn-group">
                        <button class="btn"><i class="icon-file"></i></button>
                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>                       
                        
                          <ul class="dropdown-menu">
                            <!-- dropdown menu links -->                                  
                            <li class="dropdown"><a data-toggle="modal" href="#detalle_ciud_<?php echo $item->ciud_id ;?>">Detalle &raquo;</a></li>
                            <li class="dropdown"><a data-toggle="modal" href="#editar_ciud_<?php echo $item->ciud_id ;?>">Editar &raquo;</a></li>
                          </ul>    
                    </div>
                  </td>
                </tr>
                <!— /Ventana Modal DETALLE CIUDADANO —>
<div id="editar_ciud_<?php echo $item->ciud_id ;?>" class="modal hide fade in" style="display: none; ">  
  <div class="modal-header">  
    <a class="close" data-dismiss="modal">X</a>  
    <h3>Datos del Ciudadano No: <?php echo $item->ciud_id ;?></h3>  
  </div>  
  <div class="modal-body">  
    <?php echo form_open(site_url().'/ciudadano/actualizar'); ?>
    <?php
          echo form_hidden('ciud_id', $item->ciud_id, 'id="ciud_id"');
        ?>
      <p>
      <div class="row-fluid">
        <div class="span6">
          <!--Body content--><h3>Datos Generales</h3>
          <div class="hero-unit">
            <?php
              echo form_label('Nombre(s): ',  'nombre' ) ;
              echo form_input('nombre', $item->nombre, 'id="nombre"');
            ?>
              <?php
          echo form_label('Apellido Paterno: ',  'apellido_p' ) ; 
          echo form_input('apellido_p', $item->apellido_p, 'id="apellido_p"');
        ?>
        <?php
          echo form_label('Apellido Materno: ',  'apellido_m' ) ; 
          echo form_input('apellido_m', $item->apellido_m, 'id="apellido_m"');
        ?>
        <?php echo form_label('Sexo: ',  'sexo' ) ;?>
        <?php
          switch ($item->sexo) {
             case 'hombre':?>
               Hombre: <?php
          echo form_radio('sexo', 'hombre', TRUE);
        ?>
        Mujer: <?php
          echo form_radio('sexo', 'mujer');
        ?><p>
             <?php  break;

             case 'mujer':?>
               Hombre: <?php
          echo form_radio('sexo', 'hombre');
        ?>
        Mujer: <?php
          echo form_radio('sexo', 'mujer',TRUE);
        ?><p>
             <?php  break;             

           } 
        ?>        
        <?php
          echo form_label('Edad: ',  'edad' ) ; 
          echo form_input('edad', $item->edad, 'id="edad"');
        ?>
        <?php
          $edocivil = array('soltero','casado');
          echo form_label('Estado Civil: ',  'edocivil' ) ;
          foreach ($edocivil as $key => $value) {
            if ($key == $item->edocivil ) {
              echo form_dropdown('edocivil', $edocivil,$key);
            }              
          } 
        ?>
        <?php
          echo form_label('Hijos Mayores 18: ',  'num_hijos' ) ; 
          echo form_input('num_hijos', $item->num_hijos, 'id="num_hijos"');
        ?>
          </div>
        </div>
      
        <div class="span6">
          <!--Body content--><h3>Datos de Contacto</h3>
          <div class="hero-unit">
            <?php
          echo form_label('Tel. Of.: ',  'tel_of' ) ; 
          echo form_input('tel_of', $item->tel_of, 'id="tel_of"');
        ?>
        <?php
          echo form_label('Tel. Casa: ',  'tel_casa' ) ; 
          echo form_input('tel_casa', $item->tel_casa, 'id="tel_casa"');
        ?>
        <?php
          echo form_label('Tel. Cel.: ',  'tel_cel' ) ; 
          echo form_input('tel_cel', $item->tel_cel, 'id="tel_cel"');
        ?>
        <?php
          echo form_label('E-Mail: ',  'email' ) ; 
          echo form_input('email', $item->email, 'id="email"');
        ?>
        <?php
          $horario = array('24' => '24:00' , '23'=> '23:00','22'=> '22:00','21'=> '21:00','20'=> '20:00','19'=> '19:00','18'=> '18:00','17'=> '17:00','16'=> '16:00','15'=> '15:00','14'=> '14:00','13'=> '13:00','12'=> '12:00','11'=> '11:00','10'=> '10:00','09'=> '09:00','08'=> '08:00','07'=> '07:00','06'=> '06:00','05'=> '05:00','04'=> '04:00','03'=> '03:00','02'=> '02:00','01'=> '01:00','00'=> '00:00');
          echo form_label('Horario para localizarlo: ',  'hora' ) ;
          foreach ($horario as $key3 => $value) {
            if ($item->hora == $key3) {
              echo form_dropdown('hora', $horario,$key3);
            }  
          }          
        ?>
        
        <?php
          echo form_label('Calle: ',  'domicilio' ) ; 
          echo form_input('domicilio', $item->domicilio, 'id="domicilio"');
        ?>
        <?php
          echo form_label('CP: ',  'cp' ) ; 
          echo form_input('cp', $item->cp, 'id="cp"');
        ?>
        
        <?php 
          $ref_id = array('Ref1','Ref2');
          echo form_label('Referencia: ',  'ref_id' ) ;
          foreach ($ref_id as $key2 => $value) {
            if ($key2 == $item->ref_id ) {
              echo form_dropdown('ref_id', $ref_id,$key2);
            }              
          }          
        ?>
          </div>
        </div>
      </div>        
        
        
      
                         
  </div>  
  <div class="modal-footer">
      <button type="submit" class="btn btn-inverse">Agregar &raquo;</button>  
      <a href="<?php echo site_url().'/capturar/';?>" class="btn" data-dismiss="modal">Cancelar &raquo;</a>  
  </div>
    <?php echo form_close(); ?>                  
</div>
<!— /Ventana Modal DETALLE CIUDADANO —>
<!— /Ventana Modal EDITAR CIUDADANO —>
<div id="detalle_ciud_<?php echo $item->ciud_id ;?>" class="modal hide fade in" style="display: none; ">  
  <div class="modal-header">  
    <a class="close" data-dismiss="modal">X</a>  
    <h3>Datos del Ciudadano: </h3>  
  </div>  
  <div class="modal-body">

      <div class="row-fluid">
        <div class="span6">
          <!--Body content--><h3>Datos Generales</h3>
          <div class="hero-unit">
            <p>
            <span>ID:</span>
            <span><?php echo $item->ciud_id; ?></span>
            </p><p>
            <span>Nombre:</span>
            <span><?php echo $item->nombre; ?> <?php echo $item->apellido_p; ?> <?php echo $item->apellido_m; ?></span>
            </p><p>
            <span>Sexo: </span>
            <span><?php echo $item->sexo; ?></span>
            </p><p>
            <span>Edad: </span>
            <span><?php echo $item->edad; ?></span>
          </p><p>
          
            <span>Estado Civil: </span>
            <span>
              <?php 
                $edocivil = array('soltero','casado');
                foreach ($edocivil as $key => $value) {
                  if ($key == $item->edocivil ) {
                    echo $value;
                  }
                } 
              ?>
            </span>
          </p><p>
            <span>Hijos: </span>
            <span><?php echo $item->num_hijos; ?></span>
          </p>
          </div>
        </div>
        <div class="span6">
          <!--Body content--><h3>Zona Geo-Electoral</h3>
          <div class="hero-unit">
            <p>
            <span>Distrito:</span>
            <span>XIV</span>
            </p><p>
            <span>Sección: </span>
            <span>156</span>
            </p><p>
            <span>Col. ó Fracc.: </span>
            <span>
              <?php 
                $ref_id = array('Ref1','Ref2');
                foreach ($ref_id as $key => $value) {
                  if ($key == $item->ref_id ) {
                    echo $value;
                  }
                } 
              ?>
            </span>
            </p>  
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span6">
          <!--Body content--><h3>Domicilio</h3>
          <div class="hero-unit">
            <p>
            <span>Calle y No.:Distrito:</span>
            <span><?php echo $item->domicilio; ?></span>
            </p><p>
            <span>Col. ó Fracc.: </span>
            <span>
            <?php 
                $ref_id = array('Ref1','Ref2');
                foreach ($ref_id as $key => $value) {
                  if ($key == $item->ref_id ) {
                    echo $value;
                  }
                } 
              ?>
            </span>
            </p><p>
            <span>C.P.: </span>
            <span><?php echo $item->cp; ?></span>
            </p>
          </div>
        </div>
        <div class="span6">
          <!--Body content--><h3>Contacto</h3>
          <div class="hero-unit">
          <p>
            <span>Teléfono Of.:</span>
            <span><?php echo $item->tel_of; ?></span>
            </p><p>
            <span>Teléfono Casa: </span>
            <span><?php echo $item->tel_casa; ?></span>
            </p><p>
            <span>Teléfono Cel.: </span>
            <span><?php echo $item->tel_cel; ?></span>
            </p><p>
            <span>E-Mail: </span>
            <span><?php echo $item->email; ?></span>
            </p><p>
            <span>Horario para localizar: </span>
            <span>
            <?php 
                $horario = array('24' => '24:00' , '23'=> '23:00','22'=> '22:00','21'=> '21:00','20'=> '20:00','19'=> '19:00','18'=> '18:00','17'=> '17:00','16'=> '16:00','15'=> '15:00','14'=> '14:00','13'=> '13:00','12'=> '12:00','11'=> '11:00','10'=> '10:00','09'=> '09:00','08'=> '08:00','07'=> '07:00','06'=> '06:00','05'=> '05:00','04'=> '04:00','03'=> '03:00','02'=> '02:00','01'=> '01:00','00'=> '00:00');
                foreach ($horario as $key => $value) {
                  if ($key == $item->hora ) {
                    echo $value;
                  }
                } 
              ?>            
          </span>
            </p>
          </div>
        </div>
      </div>  
  </div>  
  <div class="modal-footer">        
      <a href="<?php echo site_url().'/capturar/';?>" class="btn" data-dismiss="modal">Aceptar &raquo;</a>  
  </div>
                      
</div>
<!— /Ventana Modal EDITAR CIUDADANO —>

                <?php } ?> <!— FIN DEL FOREND —>
              </tbody>
            </table>
          </div>
        </div><!— /span6 —>






        
        <div class="span6">
          <!--Body content-->
          <div class="hero-unit">
          <?php
            echo form_open(site_url().'/solicitud/buscar');            
            echo form_input('solicitud_id', set_value('solicitud_id'), 'class="search-query" name="solicitud_id" id="solicitudes_id"');
          ?>
            
            <button type="submit" class="btn">Buscar &raquo;</button>
          <?php echo form_close(); ?>  

            <h1>Solicitudes</h1>
            <table>          
              <thead>
                <tr>              
                  <th>Folio</th>
                  <th>Fecha</th>                  
                  <th>Clasificación</th>                  
                  <th>Status</th>   
                  <th>Accion</th>         
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
                        $tipo_id = array('Drenaje','Limpieza','Pintura','Pavimento');
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
                              <li class="dropdown"><a data-toggle="modal" href="#detalle_soli_<?php echo $value->solicitud_id;?>">Detalle &raquo;</a></li>
                              <li class="dropdown"><a data-toggle="modal" href="#editar_soli_<?php echo $value->solicitud_id;?>">Editar &raquo;</a></li>
                              <li class="dropdown"><a data-toggle="modal" href="#agre_segui_soli_<?php echo $value->solicitud_id;?>">Agregar Seguimiento &raquo;</a></li>
                            </ul> 
                      </div>
                    </td>
                  </tr>  

<!— /Ventana Modal DETALLE CIUDADANO —>
<div id="detalle_soli_<?php echo $value->solicitud_id;?>" class="modal hide fade in" style="display: none; ">  
  <div class="modal-header">  
    <a class="close" data-dismiss="modal">X</a>  
    <h3>Datos de la Solicitud No: <?php echo $value->solicitud_id;?> </h3>  
  </div>  
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span6">
        <div class="hero-unit">
          <p>
            <span>FOLIO:</span>
            <span><?php echo $value->solicitud_id;?></span>
            </p>
            <p>
            <span>Fecha:</span>
            <span><?php echo $value->fecha;?></span>
            </p><p>
            <span>Clasificacion</span>
            <span><?php echo $value->tipo_id;?></span>
            </p><p>
            <span>Prioridad: </span>
            <span><?php echo $value->prioridad_id;?></span>
            </p><p>
            <span>Dependencia: </span>
            <span><?php echo $value->dep_id;?></span>
          </p>
        </div>
      </div>
      <div class="span6">
        <div class="hero-unit">
          <p>
            <span>Solicitante:</span>
            <span><?php echo $value->ciud_id;?></span>
            </p><p>
            <span>Status:</span>
            <span>
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
            </p><p>
            <span>Necesidad: </span></p><p>
            <textarea rows="10"><?php echo $value->necesidad;?></textarea>
            </p>
        </div>
      </div>
    </div>

                     
  </div>  <!-ModalBody->
  <div class="modal-footer">
      <a href="<?php echo site_url().'/capturar/';?>" class="btn" data-dismiss="modal">Aceptar &raquo;</a>  
  </div>

</div>
<!— /Ventana Modal DETALLE SOLICITUD —>
   <!— /Ventana Modal EDITAR SOLICITUD —>
<div id="editar_soli_<?php echo $value->solicitud_id;?>" class="modal hide fade in" style="display: none; ">  
  <div class="modal-header">  
    <a class="close" data-dismiss="modal">X</a>  
    <h3>Datos de la Solicitud No: <?php echo $value->solicitud_id;?></h3>  
  </div>  
  <div class="modal-body">  
    <?php echo form_open(site_url().'/solicitud/actualizar'); ?>   
    <?php
          echo form_hidden('solicitud_id', $value->solicitud_id, 'id="solicitud_id"');
        ?>        
    <div class="row-fluid">
      <div class="span6">
        <div class="hero-unit">
          <p>
            <span>FOLIO:</span>
            <span><?php echo $value->solicitud_id;?></span>
            </p>
            <?php
              echo form_label('Fecha: ',  'fecha' ) ; 
              echo form_input('fecha', $value->fecha, 'id="datepicker"');
            ?>
            <?php
              $tipo_id = array('Drenaje','Limpieza','Pintura','Pavimento');
              echo form_label('Clasificacion: ',  'tipo_id' ) ; 
              foreach ($tipo_id as $key => $valor) {
                if ($key == $value->tipo_id ) {
                  echo form_dropdown('tipo_id', $tipo_id,$valor);
                }              
              }
            ?>
            <?php 
              $prioridad = array('ugente','alta','media','normal');
              echo form_label('Prioridad: ',  'prioridad_id' ) ;
              foreach ($prioridad as $key2 => $valor) {
                if ($key2 == $value->prioridad_id ) {
                  echo form_dropdown('prioridad_id', $prioridad,$valor);
                }              
              }          
            ?>

            <?php 
              $origen = array('Formato','Oficina','Telefono','Facebook','E-Mail');
            echo form_label('Origen: ',  'origen' ) ;
              foreach ($origen as $key4 => $valor) {
                if ($key4 == $value->origen ) {
                  echo form_dropdown('origen', $origen,$valor);
                }              
              }          
            ?>

        </div>
      </div>
      <div class="span6">
        <div class="hero-unit">
          <p>
            <span>Solicitante:</span>
            <span><?php echo $value->ciud_id;?></span>
            </p><p>
            <?php 
              $status_id = array('Abierto','Atendido','Proceso','Canalizado');
              echo form_label('Status: ',  'status_id' ) ;
              foreach ($status_id as $key5 => $valor) {
                if ($key5 == $value->status_id ) {
                  echo form_dropdown('status_id', $status_id,$valor);
                }              
              }          
            ?>
            <?php 
              $dep_id = array('NULL','SECTURE','IEA','ISSSSPEA','MUNICIPIO');
              echo form_label('Dependencia de Gobierno: ',  'dep_id' ) ;
              foreach ($dep_id as $key3 => $valor) {
                if ($key3 == $value->dep_id ) {
                  echo form_dropdown('dep_id', $dep_id,$valor);
                }              
              }          
            ?>
            </p><p>
            <span>Necesidad: </span></p><p>
            <textarea rows="10"><?php echo $value->necesidad;?></textarea>
            </p>
        </div>
      </div>
    </div> 
  </div>  <!-ModalBody->
  <div class="modal-footer">
      <button type="submit" class="btn btn-inverse">Agregar &raquo;</button>  
      <a href="<?php echo site_url().'/capturar/';?>" class="btn" data-dismiss="modal">Cancelar &raquo;</a>  
  </div>
    <?php echo form_close(); ?>                  
</div>
<!— /Ventana Modal EDITAR SOLICITUD —>
<!— /Ventana Modal AGREGAR SEGUIMIENTO —>
<div id="agre_segui_soli_<?php echo $value->solicitud_id;?>" class="modal hide fade in" style="display: none; ">  
  <div class="modal-header">  
    <a class="close" data-dismiss="modal">X</a>  
    <h3>Datos de la Solicitud No: <?php echo $value->solicitud_id;?> </h3>  
  </div>  
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span6">
        <div class="hero-unit">
          
        </div>
      </div>
      <div class="span6">
        <div class="hero-unit">
          
        </div>
      </div>
    </div>                     
  </div>  <!-ModalBody->
  <div class="modal-footer">
      <a href="<?php echo site_url().'/capturar/';?>" class="btn" data-dismiss="modal">Aceptar &raquo;</a>  
  </div>

</div>
<!— /Ventana Modal AGREGAR SEGUIMIENTO —>




                

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