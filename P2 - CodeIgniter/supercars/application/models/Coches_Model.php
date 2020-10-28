<?php 

    class Coches_Model extends CI_Model
    {
        public function _construct()
        {
            parent::_construct();
        }

        public function get_coches()
        {
            $consulta = $this->db->query('Select * from coches;');
            return $consulta->result();
        }

        public function get_coche($id)
        {
            $consulta = $this->db->query('Select * from coches where id = '.$id.';');
            return $consulta->result();
        }

        public function get_lastId()
        {
            $consulta = $this->db->query('Select MAX(id) as id from coches;');
            return $consulta->result();
        }

        public function add_coche($modelo){

            $combustible = $this->input->post('combustible');
            $precio = $this->input->post('precio');
            $equipamiento = $this->input->post('equipamiento');
            $año = $this->input->post('año');
            $potencia = $this->input->post('potencia');
            $descripcion = $this->input->post('descripcion');
            $imagen= $this->input->post('imagen');

            $this->db->query('Insert into coches values(null,"'
            .$modelo[0]->id.'","'.$combustible.'","'.$precio.'","'.$equipamiento
            .'","'.$año.'","'.$potencia.'","'.$descripcion.'","'.$imagen
            .'")');
        }

        public function edit_coche($id)
        {
            $precio = $this->input->post('precio');
            $equipamiento = $this->input->post('equipamiento');
            $potencia = $this->input->post('potencia');
            $descripcion = $this->input->post('descripcion');
            $imagen= $this->input->post('imagen');
            
            $this->db->query('update coches 
            set precio = '.$precio.' , equipamiento = "'.$equipamiento.'" , 
            potencia = '.$potencia.' , descripcion = "'.$descripcion.'" ,
            imagen = "'.$imagen.'" where id = '.$id.';');
            
        }

        public function delete_coche($id)
        {
            $this->db->query('Delete from coches where id = '.$id.';');
        }

    }

?>