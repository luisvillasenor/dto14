<?php
class Coordinadores_model extends CI_Model 
{
    // Definicion de variables iguales a los votos de los campos de la tabla 
    var $id_coord = '';
    var $coordinador = '';
    var $voto = '';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    
    function get_all()
    {
        $query = $this->db->get('coordinadores');
        return $query->result();
    }
    function get_one_co()
    {
        $res = '';
        $res = $this->coordinador = $_POST['coordinador'];
        $this->db->select('*');
        $this->db->like('coordinador', $res);
        $query = $this->db->get('coordinadores');
        return $query->result();
    }
    function get_co()
    {
        $res = '';
        $res = $this->id_coord = $_POST['id_coord'];
        $this->db->select('*');
        $this->db->where('id_coord', $res);
        $this->db->order_by('coordinador','asc');
        $query = $this->db->get('coordinadores');
        return $query->result();            

    }

    function search_coordinador($texto)
    {
        $this->db->select('*');
        $this->db->from('coordinadores');
        $this->db->like('voto', $texto);
        $query = $this->db->get();
        return $query->result();
    }

    function search_coordinador2($coordinador)
    {
        $this->db->select('*');
        $this->db->from('coordinadores');
        $this->db->like('coordinador', $coordinador);
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }


    function get_all_coordinador()
    {
        $query = $this->db->get('coordinadores');
        return $query->result();
    }

    function get_one_rz($res)
    {
        $this->db->select('*');
        $this->db->like('voto', $res);
        $this->db->or_like('id_coord', $res);     
        $query = $this->db->get('coordinadores');
           
        return $query->result();
    }

    function insert_entry()
    {
        $this->coordinador = $_POST['coordinador'];
        $this->voto        = $_POST['voto'];
        $this->id_coord    = $_POST['id_coord'];

        $this->db->insert('coordinadores', $this);
    }

    function update_entry()
    {
        $this->id_coord    = $_POST['id_coord'];
        $this->coordinador = $_POST['coordinador'];
        $this->voto        = $_POST['voto'];
        $this->db->where('id_coord', $this->id_coord);
        $this->db->update('coordinadores', $this);
    }

    

}
?>