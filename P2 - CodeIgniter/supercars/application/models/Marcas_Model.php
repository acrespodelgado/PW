<?php 

    class Marcas_Model extends CI_Model
    {
        public function _construct()
        {
            parent::_construct();
        }

        public function get_marcas()
        {
            $consulta = $this->db->query('Select * from marcas;');
            return $consulta->result();
        }

        public function get_marca($id)
        {
            $consulta = $this->db->query('Select * from marcas where id = '.$id.';');
            return $consulta->result();
        }
    }

?>