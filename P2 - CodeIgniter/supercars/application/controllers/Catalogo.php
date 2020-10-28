<?php


class Catalogo extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index()
    {
        $datos = array(
            'coches' => $this->Coches_Model->get_coches(),
            'marcas' => $this->Marcas_Model->get_marcas(),
            'modelos' => $this->Modelos_Model->get_modelos()
        );
        $this->load->view('catalogo.php', $datos);
    }
}

?>