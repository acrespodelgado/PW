<?php

class Admin extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index()
    {
        if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]) && $_SESSION['user'][0]->rol == 1)
            $this->load->view('admin.php');
        else
            $this->load->view('no_result');
    }

    public function insertar()
    {   
        if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]) && $_SESSION['user'][0]->rol == 1)
        {

            $array = array('marcas' => $this->Marcas_Model->get_marcas());
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('descripcion','Descripcion del coche','required|max_length[200]');
                $this->form_validation->set_rules('marca','Marca del coche','required|max_length[30]');
                $this->form_validation->set_rules('equipamiento','Equipamiento del coche','required|max_length[200]');
                $this->form_validation->set_rules('imagen','Imagen del coche','required|max_length[200]');
                $this->form_validation->set_rules('modelo','Modelo del coche','required|max_length[30]');
                $this->form_validation->set_rules('combustible','Combustible del coche','required|max_length[30]');
                $this->form_validation->set_rules('potencia','Potencia del coche','required|max_length[30]');
                $this->form_validation->set_rules('año','Año del coche','required|max_length[30]');
                $this->form_validation->set_rules('precio','Precio del coche','required|max_length[30]');

                $this->form_validation->set_message('required','El campo %s es obligatorio');
                $this->form_validation->set_message('max_length','El campo %s tiene como maximo %s caracteres');

                if($this->form_validation->run() == FALSE)
                    $this->load->view('insert.php', $array);
                    
                else
                {
                    $modelos = $this->Modelos_Model->get_modelos_model();
                    $marca = $this->Marcas_Model->get_marca($this->input->post('marca'));

                    //Para añadir el modelo si no existe en la bd

                    if(!(in_array(strtoupper($this->input->post('modelo')),$modelos)))
                    {
                        $this->Modelos_Model->add_modelo($this->input->post('marca'),strtoupper($this->input->post('modelo')));
                    }

                    $modelo = $this->Modelos_Model->get_id_modelo(strtoupper($this->input->post('modelo')));

                    $this->Coches_Model->add_coche($modelo);
                    $id = $this->Coches_Model->get_lastId();
                    $_SESSION['mensaje'] = 'Coche añadido con éxito';
                    redirect(base_url().'un_coche/coche/'.$id[0]->id);
                }
            }
            else 
                $this->load->view('insert.php', $array);
        }
        else
            $this->load->view('no_result');
    }

    public function editar($id = 0)
    {
        if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]) && $_SESSION['user'][0]->rol == 1)
        {
            if($id > 0)
            {
                $coche = $this->Coches_Model->get_coche($id);

                $datos = array(
                    'coche' => $coche
                );

                $this->load->view('editar.php', $datos);

                if($this->input->post('submit'))
                {
                    $this->form_validation->set_rules('descripcion','Descripcion del coche','required|max_length[200]');
                    $this->form_validation->set_rules('equipamiento','Equipamiento del coche','required|max_length[200]');
                    $this->form_validation->set_rules('imagen','Imagen del coche','required|max_length[200]');
                    $this->form_validation->set_rules('potencia','Potencia del coche','required|max_length[30]');
                    $this->form_validation->set_rules('precio','Precio del coche','required|max_length[30]');

                    $this->form_validation->set_message('required','El campo %s es obligatorio');
                    $this->form_validation->set_message('max_length','El campo %s tiene como maximo %s caracteres');

                    if($this->form_validation->run() == TRUE)
                    {
                        $this->Coches_Model->edit_coche($id);
                        $_SESSION['mensaje'] = 'Coche editado con éxito';
                        redirect(base_url().'un_coche/coche/'.$id);

                    }
                }
            }
            else
            {
                $datos = array(
                    'coches' => $this->Coches_Model->get_coches(),
                    'marcas' => $this->Marcas_Model->get_marcas(),
                    'modelos' => $this->Modelos_Model->get_modelos()
                );
                $this->load->view('edit.php', $datos);
            }
        }
        else
            $this->load->view('no_result');
    }

    public function eliminar($id = 0)
    {
        if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]) && $_SESSION['user'][0]->rol == 1)
        {
            if($id > 0)
            {
                $this->Coches_Model->delete_coche($id);
                $_SESSION['mensaje'] = 'Coche eliminado con éxito';
                redirect(base_url().'catalogo');
            }
            else
            {
                $datos = array(
                    'coches' => $this->Coches_Model->get_coches(),
                    'marcas' => $this->Marcas_Model->get_marcas(),
                    'modelos' => $this->Modelos_Model->get_modelos()
                );
                $this->load->view('delete.php', $datos);
            }
        }
        else
            $this->load->view('no_result');
    }

    public function addMarca()
    {
        if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]) && $_SESSION['user'][0]->rol == 1)
        {
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('marca','Nombre de la marca','required|max_length[200]');
                $this->form_validation->set_rules('pais','País de la marca','required|max_length[200]');


                $this->form_validation->set_message('required','El campo %s es obligatorio');
                $this->form_validation->set_message('max_length','El campo %s tiene como maximo %s caracteres');

                if($this->form_validation->run() == TRUE)
                {
                    $this->db->query('insert into marcas values (null,"'.$this->input->post('marca').'","'.$this->input->post('pais').'",0);');
                    $_SESSION['mensaje'] = 'Marca añadida con éxito';
                    redirect(base_url().'admin');
                }
            }
            else
                $this->load->view('add_marca'); 
        }
        else
            $this->load->view('no_result');
    }
}

?>