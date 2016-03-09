<?php
class Users_model extends CI_Model 
{
    // Definicion de variables iguales a los nombres de los campos de la tabla 
    var $id = '';
    var $nombre = '';
    var $apellido = '';
    var $email_address = '';
    var $tel_casa = '';
    var $tel_cel = '';
    var $foto = '';
    var $ife_f = '';
    var $ife_b = '';
    var $grupo = '';
    var $fecha_creacion = '';
    var $password = '';
    var $fecha_ult_acceso = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }


    function get_last_ten_users()
    {
        $query = $this->db->get('users', 10);
        return $query->result();
    }

    function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    function get_one_ciudadano($res)
    {
        $this->db->select('*');
        $this->db->like('nombre', $res);
        $this->db->or_like('apellido', $res);     
        $query = $this->db->get('users');
           
        return $query->result();
    }


    function get_all_users_orderby($campo, $by)
    {
        $query = $this->db->get('users');
        $this->db->order_by($campo, $by);
        return $query->result();
    }

    function insert_entry()
    {
        $this->nombre           = $_POST['nombre'];
        $this->apellido         = $_POST['apellido'];
        $this->email_address    = $_POST['email_address'];
        $this->grupo            = $_POST['grupo'];
        $this->fecha_creacion   = date('Y-m-d H:i:s');
        $this->password         = sha1($_POST['password']);
        $this->fecha_ult_acceso = date('Y-m-d H:i:s');

        $this->db->insert('users', $this);
    }

    function update_entry()
    {
        $this->id               = $_POST['id'];
        $this->nombre           = $_POST['nombre'];
        $this->apellido         = $_POST['apellido'];
        $this->email_address    = $_POST['email_address'];
        $this->grupo            = $_POST['grupo'];
        $this->fecha_creacion   = $_POST['fecha_creacion'];
        $this->password         = sha1($_POST['password']);
        $this->fecha_ult_acceso = date('Y-m-d H:i:s');

        $this->db->update('users', $this, array('id' => $_POST['id']));
    }



}
?>