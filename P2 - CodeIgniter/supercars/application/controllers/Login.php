<?php

    class Login extends CI_Controller {

        public function _construct() {
            parent::_construct();
        }

        public function index() {
            $this->load->view('login.php');
        }

        public function inicio_sesion() {
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('user','Usuario','required');
                $this->form_validation->set_rules('password','Password','required');

                $this->form_validation->set_message('required','El campo %s es obligatorio');

                if($this->form_validation->run() == FALSE)
                    $this->load->view('login.php');
                else
                {
                    $user = $this->Usuarios_Model->verify_user($this->input->post('user'),$this->input->post('password'));

                    if($user)
                    {
                        session_start(); 
                        $_SESSION['user'] = $user;
                        header('Location: http://localhost/supercars');
                    }
                    else
                    {
                        $this->load->view('login.php', array('mensaje' => "Usuario o contraseña incorrectos"));
                    }
                }
            }
        }

        public function cerrar_sesion() {
            if(isset($_SESSION['user']) && !empty($_SESSION['user']))
            {
                unset($_SESSION['user']);
                session_destroy();
                header('Location: http://localhost/supercars');
            }
        }
    }
?>