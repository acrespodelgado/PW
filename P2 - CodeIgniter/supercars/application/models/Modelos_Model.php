<?php 

    class Modelos_Model extends CI_Model
    {
        public function _construct()
        {
            parent::_construct();
        }

        public function get_modelos()
        {
            $consulta = $this->db->query('Select * from modelos;');
            return $consulta->result();
        }

        public function get_modelos_model()
        {
            $consulta = $this->db->query('Select modelo from modelos;')->result();
            $array = [];
            foreach ($consulta as $modelo)
            {
                array_push($array,$modelo->modelo);
            }
            
            return $array;
        }

        public function get_id_modelo($nombre)
        {
            $consulta = $this->db->query("Select id from modelos where modelo = '".$nombre."';");
            return $consulta->result();
        }

        public function add_modelo($marca, $nombre)
        {
            $consulta = $this->db->query('Insert into modelos values(null,"'
            .$marca.'","'.$nombre
            .'")');
        }
    }

?>