<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
  <meta name="author" content="Luis G. Villaseñor">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }
    .form-signin {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
              border-radius: 5px;
      -webkit-box-shadow: 0 1px rgba(0,0,0,.05);
         -moz-box-shadow: 0 1px rgba(0,0,0,.05);
              box-shadow: 0 1px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading, .form-signin {
      margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }
    footer {
      background-color: #f5f5f5;
      clear: both;
      position: fixed;      
      bottom: 0px;
      text-align: center;;
    }

  </style>
  <script type="text/javascript">        
      $('#myCarousel').carousel({  
        interval: 2000 // in milliseconds  
      });
  </script>   
</head>

<body>
<div class="container">
<!--Body content container-fluid-->

  <?php echo form_open(site_url(),'class="form-signin"'); ?>
  <h2 class="form-signin-heading">Acceder al Sistema</h2>
  <p>
      <?php 
          echo form_label('Dirección de Email: ',  'email_address' ) ; 
          echo form_input('email_address', set_value('email_address'), 'id="email_address" class="input-block-level"');
      ?>
      
  </p><p>
      <?php 
          echo form_label('Password: ',  'password' ) ; 
          echo form_password('password', '', 'id="password" class="input-block-level"');
      ?>
  </p><p>
      <?php echo form_submit('submit',  'Iniciar','class="btn btn-medium btn-primary"' ); ?>
  </p>
  <?php echo form_close(); ?>

</div><!— /container-fluid —>
<footer>
    &copy 2013 S7Mx Software.
</footer>

<script src="<?php echo base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-typeahead.js"></script>

</body>
</html>