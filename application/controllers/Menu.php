<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        // APABILA USER BELUM LOGIN DAN INGIN MASUK KE URL DENGAN ISENG MAKA DIATUR UNTUK TIDAK DAPAT MASUK DAN HARUS LOGIN DAN HAK AKSES TERTENTU
        // MEMBUAT FUNCTION HELPER YANG DIBUAT SENDIRI DAN BUKAN MERUPAKAN BAGIAN DARI CODEIGNATER TAPI AKAN DIPANGGIL DIMANAPUN DIBUTUHKAN DAN CODEIGNATER MEMUNGKINKAN UNTUK MEMBUAT ITU DAN DIREKOMENDASIKAN DITARUH DI CONTROLLER CI
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        //MENU MANAGEMENT
        $data['title'] = 'Menu Management';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Menu'] = $this->db->get('pengguna_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/v_footer');
        } else {
            $this->db->insert('pengguna_menu', ['Menu' => $this->input->post('menu')]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">New Menu has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Menu');
        }
    }

    public function HapusMenu($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('pengguna_menu');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Menu successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Menu');
    }

    public function EditMenu($ID)
    {
        $data['title'] = 'Edit Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Menu'] = $this->db->get_where('pengguna_menu', ['ID' => $ID])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/v_editmenu', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Menu' => $this->input->post('menu', true),
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('pengguna_menu', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Menu successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Menu');
        }
    }
    //END MENU MANAGEMENT

    //SUB MENU MANAGEMENT
    public function Submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['SubMenu'] = $this->AppMenu->GetSubMenu();
            $data['Menu'] = $this->db->get('pengguna_menu')->result_array();
        }
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/v_submenu', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Title' => $this->input->post('title'),
                'Menu_id' => $this->input->post('menu_id'),
                'Url' => $this->input->post('url'),
                'Icon' => $this->input->post('icon'),
                'Aktifasi' => $this->input->post('aktifasi')
            ];
            $this->db->insert('pengguna_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">New Sub Menu has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Menu/Submenu');
        }
    }

    public function HapusSubmenu($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('pengguna_sub_menu');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Sub Menu successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Menu/Submenu');
    }

    public function EditSubmenu($ID)
    {
        $data['title'] = 'Edit Sub Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['SubMenuu'] = $this->db->get_where('pengguna_sub_menu', ['ID' => $ID])->row_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['SubMenu'] = $this->AppMenu->GetSubMenu();
            $data['Menu'] = $this->db->get('pengguna_menu')->result_array();
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/v_editsubmenu', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Title' => $this->input->post('title'),
                'Menu_id' => $this->input->post('menu_id'),
                'Url' => $this->input->post('url'),
                'Icon' => $this->input->post('icon'),
                'Aktifasi' => 1
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('pengguna_sub_menu', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Sub Menu successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Menu/Submenu');
        }
    }

    public function ListIcon()
    {
        $data['title'] = 'List Icon';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('menu/v_listicon', $data);
        $this->load->view('templates/v_footer');
    }
    //END SUB MENU MANAGEMENT

    //PENGGUNA
    public function Pengguna()
    {
        $data['title'] = 'Users Management';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Pengguna'] = $this->db->get('pengguna')->result_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Pengguna'] = $this->AppMenu->GetPengguna();
            $data['HakAkses'] = $this->db->get('pengguna_hakakses')->result_array();
        }

        $this->form_validation->set_rules('hakakses_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/v_pengguna', $data);
            $this->load->view('templates/v_footer');
        }
    }

    public function HapusPengguna($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('pengguna');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Users successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Menu/Pengguna');
    }

    public function EditPengguna($ID)
    {
        $data['title'] = 'Edit User Management';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Penggunaa'] = $this->db->get_where('pengguna', ['ID' => $ID])->row_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Pengguna'] = $this->AppMenu->GetPengguna();
            $data['HakAkses'] = $this->db->get('pengguna_hakakses')->result_array();
        }

        $this->form_validation->set_rules('hakakses_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('menu/v_editpengguna', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'HakAkses_ID' => $this->input->post('hakakses_id', true),
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('pengguna', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Sub Menu successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Menu/Pengguna');
        }
    }
    //END PENGGUNA
}
