<?php


class Un_coche extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index(){}

    
    public function coche($id) {
        
        $modelos = $this->Modelos_Model->get_modelos();
        $marcas = $this->Marcas_Model->get_marcas();
        $coche = $this->Coches_Model->get_coche($id);
        
        foreach($marcas as $marca)
        {
            foreach($modelos as $modelo)
            {
                if($marca->id == $modelo->marca && $modelo->id == $coche[0]->modelo)
                {
                    $titulo = $marca->nombre. " " . $modelo->modelo;
                }
            }
        }

        $datos = array(
            'titulo' => $titulo,
            'coche' => $coche
        );

        $this->load->view('un_coche', $datos);
    }
}

?>