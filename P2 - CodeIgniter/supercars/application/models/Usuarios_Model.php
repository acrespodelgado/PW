<?php
    class Usuarios_model extends CI_Model
    {

        public function _construct()
        {
            parent::_construct();
        }

        //Comprueba si el usuario existe o no
        public function verify_user($user,$password)
        {
            $consulta = $this->db->query('Select * from usuarios where user = "'.$user.'" and password = "'.$password.'";');
            return $consulta->result();
        }
    }
?>