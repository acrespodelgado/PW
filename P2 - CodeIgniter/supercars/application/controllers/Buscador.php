<?php

class Buscador extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index()
    {  
        $modelos = $this->Modelos_Model->get_modelos();
        $marcas = $this->Marcas_Model->get_marcas();

        $datos = array(
            'modelos' => $modelos,
            'marcas' => $marcas
        );

        $this->load->view('search',$datos);
    }

    public function buscar()
    {  
        if($this->input->post('submit'))
        {
            if($this->input->post('marca') != 0){
                $sql2 = "SELECT id FROM modelos WHERE marca = " . $this->input->post('marca');
                $sql = "SELECT * FROM coches WHERE modelo IN (" . $sql2 . ")";
            }
            else 
            {
                $sql = "SELECT * from coches ";
                $contador = 0;

                if($this->input->post('modelo') != "0")
                {
                    $sql .= "WHERE modelo = " . $this->input->post('modelo');
                    $contador++;
                }
                if($this->input->post('combustible') != "0")
                {
                    if($contador == 0)
                        $sql .= "WHERE combustible = '" . $this->input->post('combustible') . "'";
                    else 
                        $sql .= " AND combustible = '" . $this->input->post('combustible') . "'";
                    $contador++;
                }
                if(!empty($this->input->post('potencia')))
                {
                    if($contador == 0)
                        $sql .= "WHERE potencia = " . $this->input->post('potencia');
                    else 
                        $sql .= " AND potencia = " . $this->input->post('potencia');
                    $contador++;
                }    
                if(!empty($this->input->post('año')))
                {
                    if($contador == 0)
                        $sql .= "WHERE año = " . $this->input->post('año');
                    else 
                        $sql .= " AND año = " . $this->input->post('año');
                    $contador++;
                } 
                if(!empty($this->input->post('precio')))
                {
                    if($contador == 0)
                        $sql .= "WHERE precio = " . $this->input->post('precio');
                    else 
                        $sql .= " AND precio = " . $this->input->post('precio');
                    $contador++;
                }
            }

            $resultados = $this->db->query($sql)->result();
            $modelos = $this->Modelos_Model->get_modelos();
            $marcas = $this->Marcas_Model->get_marcas();

            $datos = array(
                'modelos' => $modelos,
                'marcas' => $marcas,
                'coches' => $resultados
            );

            $this->load->view('results',$datos);
        }
    }
}