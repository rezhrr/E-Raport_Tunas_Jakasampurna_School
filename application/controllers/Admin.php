<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/v_footer');
    }

    // UNTUK HAK AKSES
    public function HakAkses()
    {
        $data['title'] = 'Role';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['HakAkses'] = $this->db->get('pengguna_hakakses')->result_array();

        //CARI DATA
        if ($this->input->post('carihakakses')) {
            $data['HakAkses'] = $this->CariHakAkses();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('hakakses', 'Role', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_role', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'HakAkses' => $this->input->post('hakakses', true)
            ];
            $this->db->insert('pengguna_hakakses', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">New Role has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/HakAkses');
        }
    }

    public function HapusHakAkses($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('pengguna_hakakses');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Role successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/HakAkses');
    }

    public function EditHakAkses($ID)
    {
        $data['title'] = 'Edit Role';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['HakAkses'] = $this->db->get_where('pengguna_hakakses', ['ID' => $ID])->row_array();

        $this->form_validation->set_rules('hakakses', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editrole', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'HakAkses' => $this->input->post('hakakses', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('pengguna_hakakses', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Role successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/HakAkses');
        }
    }

    public function CariHakAkses()
    {
        $data['HakAkses'] = $this->db->get('pengguna_hakakses')->result_array();

        $carihakakses = $this->input->post('carihakakses', true);

        $this->db->like('HakAkses', $carihakakses);
        return $this->db->get('pengguna_hakakses')->result_array();
    }
    // END HAK AKSES

    // UNTUK HAKAKSESAKSES
    public function HakAksesAkses($HakAkses_ID)
    {
        $data['title'] = 'Role Access';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        //UNTUK FUNCTION INI YANG DIBUTUHKAN ADALAH HAKAKSES_ID BRP DAN TAMPILKAN SEMUA MENU
        //INI HAKAKSES_ID BRP
        $data['HakAkses'] = $this->db->get_where('pengguna_hakakses', ['ID' => $HakAkses_ID])->row_array();
        //TAMPILKAN HANYA HAK AKSES LAIN SELAIN ADMIN KAREMA DAPAT MENYEBABKAN HAK AKSES ADMIN HILANG
        $this->db->where('ID !=', 1);
        //INI TAMPILKAN SEMUA MENUNYA
        $data['Menu'] = $this->db->get('pengguna_menu')->result_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_roleaccess', $data);
        $this->load->view('templates/v_footer');
    }

    public function UbahAkses()
    {
        $Menu_ID = $this->input->post('MenuID');
        $HakAkses_ID = $this->input->post('HakAksesID');

        $data = [
            'HakAkses_ID' => $HakAkses_ID,
            'Menu_ID' => $Menu_ID
        ];

        $result = $this->db->get_where('pengguna_akses_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('pengguna_akses_menu', $data);
        } else {
            $this->db->delete('pengguna_akses_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Access successfully Changed!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
    }
    //END HAK AKSES AKSES

    // UNTUK JURUSAN
    public function Jurusan()
    {
        $data['title'] = 'Majors';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Jurusan'] = $this->db->get('jurusan')->result_array();

        //CARI DATA
        if ($this->input->post('carijurusan')) {
            $data['Jurusan'] = $this->CariJurusan();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('kodejurusan', 'Majors Code', 'required');
            $this->form_validation->set_rules('namajurusan', 'Majors Name', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_majors', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Jurusan' => $this->input->post('kodejurusan', true),
                'Nama_Jurusan' => $this->input->post('namajurusan', true),
            ];
            $this->db->insert('jurusan', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Majors has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Jurusan');
        }
    }

    public function HapusJurusan($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('jurusan');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Majors successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/Jurusan');
    }

    public function EditJurusan($ID)
    {
        $data['title'] = 'Edit Majors';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Jurusan'] = $this->db->get_where('jurusan', ['ID' => $ID])->row_array();

        $this->form_validation->set_rules('kodejurusan', 'Majors Code', 'required');
        $this->form_validation->set_rules('namajurusan', 'Majors Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editmajors', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Jurusan' => $this->input->post('kodejurusan', true),
                'Nama_Jurusan' => $this->input->post('namajurusan', true),
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('jurusan', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Majors successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Jurusan');
        }
    }

    public function CariJurusan()
    {
        $carijurusan = $this->input->post('carijurusan', true);
        $this->db->like('Kode_Jurusan', $carijurusan);
        $this->db->or_like('Nama_Jurusan', $carijurusan);
        return $this->db->get('jurusan')->result_array();
    }
    // END JURUSAN


    // UNTUK KELAS
    public function Kelas()
    {
        $data['title'] = 'Class';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Kelas'] = $this->db->get('kelas')->result_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Kelas'] = $this->AppMenu->GetKelas();
            $data['Jurusan'] = $this->db->get('jurusan')->result_array();
        }

        $this->form_validation->set_rules('kodekelas', 'Class Code', 'required');
        $this->form_validation->set_rules('namakelas', 'Class Name', 'required');
        $this->form_validation->set_rules('namawalas', 'Class Vice Name', 'required');
        $this->form_validation->set_rules('jurusan_id', 'Majors', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_class', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Kelas' => $this->input->post('kodekelas', true),
                'Nama_Kelas' => $this->input->post('namakelas', true),
                'Nama_Walas' => $this->input->post('namawalas', true),
                'Jurusan_ID' => $this->input->post('jurusan_id', true)
            ];
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Class has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Kelas');
        }
    }

    public function HapusKelas($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('kelas');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Class successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/Kelas');
    }

    public function EditKelas($ID)
    {
        $data['title'] = 'Edit Class';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Kelass'] = $this->db->get_where('kelas', ['ID' => $ID])->row_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Kelas'] = $this->AppMenu->GetKelas();
            $data['Jurusan'] = $this->db->get('jurusan')->result_array();
        }


        $this->form_validation->set_rules('kodekelas', 'Class Code', 'required');
        $this->form_validation->set_rules('namakelas', 'Class Name', 'required');
        $this->form_validation->set_rules('namawalas', 'Class Vice Name', 'required');
        $this->form_validation->set_rules('jurusan_id', 'Majors', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editclass', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Kelas' => $this->input->post('kodekelas', true),
                'Nama_Kelas' => $this->input->post('namakelas', true),
                'Nama_Walas' => $this->input->post('namawalas', true),
                'Jurusan_ID' => $this->input->post('jurusan_id', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('kelas', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Class successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Kelas');
        }
    }
    // END KELAS

    // UNTUK MATAPELAJARAN
    public function MataPelajaran()
    {
        $data['title'] = 'Academic Subjects';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['SKS'] = ['2', '3', '4', '5'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['MataPelajaran'] = $this->AppMenu->GetMataPelajaran();
            $data['Guru'] = $this->db->get('guru')->result_array();
        }

        //CARI DATA
        if ($this->input->post('carimatapelajaran')) {
            $data['MataPelajaran'] = $this->CariMataPelajaran();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('kodematapelajaran', 'Academic Subject Code', 'required');
            $this->form_validation->set_rules('namamatapelajaran', 'Academic Subject Name', 'required');
            $this->form_validation->set_rules('sks', 'JP', 'required');
            $this->form_validation->set_rules('guru_id', 'Teacher Name', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_academicsubjects', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Mapel' => $this->input->post('kodematapelajaran', true),
                'Nama_Mapel' => $this->input->post('namamatapelajaran', true),
                'JP' => $this->input->post('sks', true),
                'Guru_ID' => $this->input->post('guru_id', true),
            ];
            $this->db->insert('matapelajaran', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Academic Subject has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/MataPelajaran');
        }
    }

    public function HapusMataPelajaran($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('matapelajaran');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Academic Subject successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/MataPelajaran');
    }

    public function EditMataPelajaran($ID)
    {
        $data['title'] = 'Edit Academic Subjects';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['MataPelajarann'] = $this->db->get_where('matapelajaran', ['ID' => $ID])->row_array();
        $data['SKS'] = ['2', '3', '4', '5'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['MataPelajaran'] = $this->AppMenu->GetMataPelajaran();
            $data['Guru'] = $this->db->get('guru')->result_array();
        }

        $this->form_validation->set_rules('kodematapelajaran', 'Academic Subject Code', 'required');
        $this->form_validation->set_rules('namamatapelajaran', 'Academic Subject Name', 'required');
        $this->form_validation->set_rules('sks', 'JP', 'required');
        $this->form_validation->set_rules('guru_id', 'Teacher Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editacademicsubjects', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Mapel' => $this->input->post('kodematapelajaran', true),
                'Nama_Mapel' => $this->input->post('namamatapelajaran', true),
                'JP' => $this->input->post('sks', true),
                'Guru_ID' => $this->input->post('guru_id', true),
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('matapelajaran', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Academic Subject successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/MataPelajaran');
        }
    }

    public function CariMataPelajaran()
    {
        $carimatapelajaran = $this->input->post('carimatapelajaran', true);
        $this->db->like('Kode_Mapel', $carimatapelajaran);
        $this->db->or_like('Nama_Mapel', $carimatapelajaran);
        $this->db->or_like('JP', $carimatapelajaran);
        $this->db->or_like('Guru_ID', $carimatapelajaran);
        return $this->db->get('matapelajaran')->result_array();
    }

    public function DetailMataPelajaran($ID)
    {
        $data['title'] = 'Detail Academic Subjects';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['MataPelajarann'] = $this->db->get_where('matapelajaran', ['ID' => $ID])->row_array();
        $data['SKS'] = ['2', '3', '4', '5'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['MataPelajaran'] = $this->AppMenu->GetMataPelajaran();
            $data['Guru'] = $this->db->get('guru')->result_array();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_detailacademicsubjects', $data);
        $this->load->view('templates/v_footer');
    }
    // END MATAPELAJARAN

    // UNTUK TAHUN AKADEMIK
    public function TahunAkademik()
    {
        $data['title'] = 'Academic Years';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['TahunAkademik'] = $this->db->get('tahun_akademik')->result_array();
        $data['Semester'] = ['Ganjil', 'Genap'];
        $data['Status'] = ['Aktif', 'Tidak Aktif'];

        //CARI DATA
        if ($this->input->post('caritahunakademik')) {
            $data['TahunAkademik'] = $this->CariTahunAkademik();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('tahunakademik', 'Academic Years', 'required');
            $this->form_validation->set_rules('semester', 'Semester', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_academicyears', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Tahun_Akademik' => $this->input->post('tahunakademik', true),
                'Semester' => $this->input->post('semester', true),
                'Status' => $this->input->post('status', true)
            ];
            $this->db->insert('tahun_akademik', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Academic Years has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/TahunAkademik');
        }
    }

    public function HapusTahunAkademik($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('tahun_akademik');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Academic Years successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/TahunAkademik');
    }

    public function EditTahunAkademik($ID)
    {
        $data['title'] = 'Edit Academic Years';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['TahunAkademik'] = $this->db->get_where('tahun_akademik', ['ID' => $ID])->row_array();
        $data['Semester'] = ['Ganjil', 'Genap'];
        $data['Status'] = ['Aktif', 'Tidak Aktif'];

        $this->form_validation->set_rules('tahunakademik', 'Academic Years', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editacademicyears', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Tahun_Akademik' => $this->input->post('tahunakademik', true),
                'Semester' => $this->input->post('semester', true),
                'Status' => $this->input->post('status', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('tahun_akademik', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Academic Years successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/TahunAkademik');
        }
    }

    public function CariTahunAkademik()
    {
        $caritahunakademik = $this->input->post('caritahunakademik', true);
        $this->db->like('Tahun_Akademik', $caritahunakademik);
        $this->db->or_like('Semester', $caritahunakademik);
        return $this->db->get('tahun_akademik')->result_array();
    }

    public function DetailTahunAkademik($ID)
    {
        $data['title'] = 'Detail Academic Years';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['TahunAkademik'] = $this->db->get_where('tahun_akademik', ['ID' => $ID])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_detailtahunakademik', $data);
        $this->load->view('templates/v_footer');
    }
    // END TAHUN AKADEMIK

    // UNTUK GURU
    public function Guru()
    {
        $data['title'] = 'Teachers';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Guru'] = $this->db->get('guru')->result_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        //CARI DATA
        if ($this->input->post('cariguru')) {
            $data['Guru'] = $this->CariGuru();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('nig', 'Teacher ID Number', 'required');
            $this->form_validation->set_rules('namaguru', 'Teacher Name', 'required');
            $this->form_validation->set_rules('tanggallahir', 'Date of Birth', 'required');
            $this->form_validation->set_rules('tempatlahir', 'Place of Birth', 'required');
            $this->form_validation->set_rules('jeniskelamin', 'Gender', 'required');
            $this->form_validation->set_rules('agama', 'Religion', 'required');
            $this->form_validation->set_rules('alamat', 'Address', 'required');
            $this->form_validation->set_rules('telepon', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_teachers', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'NIG' => $this->input->post('nig', true),
                'Nama_Guru' => $this->input->post('namaguru', true),
                'Tanggal_Lahir' => $this->input->post('tanggallahir', true),
                'Tempat_Lahir' => $this->input->post('tempatlahir', true),
                'Jenis_Kelamin' => $this->input->post('jeniskelamin', true),
                'Agama' => $this->input->post('agama', true),
                'Alamat' => $this->input->post('alamat', true),
                'Email' => $this->input->post('email', true),
                'Telepon' => $this->input->post('telepon', true),
                'Foto' => 'teacher.png'
            ];
            $this->db->insert('guru', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Teacher has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Guru');
        }
    }

    public function HapusGuru($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('guru');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Teacher successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/Guru');
    }

    public function EditGuru($ID)
    {
        $data['title'] = 'Edit Academic Subjects';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Guru'] = $this->db->get_where('guru', ['ID' => $ID])->row_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        $this->form_validation->set_rules('nig', 'Teacher ID Number', 'required');
        $this->form_validation->set_rules('namaguru', 'Teacher Name', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Date of Birth', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Place of Birth', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Gender', 'required');
        $this->form_validation->set_rules('agama', 'Religion', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('telepon', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editteachers', $data);
            $this->load->view('templates/v_footer');
        } else {
            $NIG = $this->input->post('nig', true);
            $Nama_Guru = $this->input->post('namaguru', true);
            $Tanggal_Lahir = $this->input->post('tanggallahir', true);
            $Tempat_Lahir = $this->input->post('tempatlahir', true);
            $Jenis_Kelamin = $this->input->post('jeniskelamin', true);
            $Agama = $this->input->post('agama', true);
            $Alamat = $this->input->post('alamat', true);
            $Telepon = $this->input->post('telepon', true);
            $Email = $this->input->post('email', true);

            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/foto_tjs/teacher/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto', true)) {
                    //UNTUK MEMBUAT FOTO YANG DI UPDATE BARU DAPAT MASUK DAN FOTO YANG LAMA HILANG
                    $Old_foto = $data['guru']['Foto'];
                    if ($Old_foto != 'teacher.png') {
                        unlink(FCPATH . 'assets/foto_tjs/teacher/' . $Old_foto);
                    }
                    //UNTUK MENGUPLOAD FOTO BARU
                    $New_foto = $this->upload->data('file_name');
                    $this->db->set('Foto', $New_foto);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    redirect('Admin/Guru');
                }
            }
            //JIKA TIDAK ADA YANG UPLOAD FOTO
            $this->db->set('NIG', $NIG);
            $this->db->set('Nama_Guru', $Nama_Guru);
            $this->db->set('Tanggal_Lahir', $Tanggal_Lahir);
            $this->db->set('Tempat_Lahir', $Tempat_Lahir);
            $this->db->set('Jenis_Kelamin', $Jenis_Kelamin);
            $this->db->set('Agama', $Agama);
            $this->db->set('Alamat', $Alamat);
            $this->db->set('Email', $Email);
            $this->db->set('Telepon', $Telepon);
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('guru');

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Teacher successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Guru');
        }
    }

    public function CariGuru()
    {
        $cariguru = $this->input->post('cariguru', true);
        $this->db->like('NIG', $cariguru);
        $this->db->or_like('Nama_Guru', $cariguru);
        $this->db->or_like('Tanggal_Lahir', $cariguru);
        $this->db->or_like('Tempat_Lahir', $cariguru);
        $this->db->or_like('Jenis_Kelamin', $cariguru);
        $this->db->or_like('Agama', $cariguru);
        $this->db->or_like('Alamat', $cariguru);
        $this->db->or_like('Email', $cariguru);
        $this->db->or_like('Telepon', $cariguru);
        return $this->db->get('guru')->result_array();
    }

    public function DetailGuru($ID)
    {
        $data['title'] = 'Detail Teacher';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Guru'] = $this->db->get_where('guru', ['ID' => $ID])->row_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_detailteachers', $data);
        $this->load->view('templates/v_footer');
    }
    // END GURU

    // UNTUK PEMBAYARAN
    public function Pembayaran()
    {
        $data['title'] = 'Payment';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Pembayaran'] = $this->db->get('pembayaran')->result_array();
        $data['Jenis_Pembayaran'] = ['Kartu Kredit & Debit', 'Transfer Bank', 'Mata Uang Digital'];
        //CARI DATA
        if ($this->input->post('caripembayaran')) {
            $data['Pembayaran'] = $this->CariPembayaran();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
            $this->form_validation->set_rules('namapembayaran', 'Payment Name', 'required');
            $this->form_validation->set_rules('jenispembayaran', 'Type of Payment', 'required');
            $this->form_validation->set_rules('jumlahpembayaran', 'Payment Amount', 'required');
            $this->form_validation->set_rules('tanggalpembayaran', 'Payment Date', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_payment', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Pembayaran' => $this->input->post('kodepembayaran', true),
                'Nama_Siswa' => $this->input->post('namasiswa', true),
                'Nama_Pembayaran' => $this->input->post('namapembayaran', true),
                'Jenis_Pembayaran' => $this->input->post('jenispembayaran', true),
                'Jumlah_Pembayaran' => $this->input->post('jumlahpembayaran', true),
                'Tanggal_Pembayaran' => $this->input->post('tanggalpembayaran', true)
            ];
            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Payment has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Pembayaran');
        }
    }

    public function HapusPembayaran($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('pembayaran');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Payment successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Admin/Pembayaran');
    }

    public function EditPembayaran($ID)
    {
        $data['title'] = 'Edit Payment';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Pembayarann'] = $this->db->get_where('pembayaran', ['ID' => $ID])->row_array();
        $data['Jenis_Pembayaran'] = ['Kartu Kredit & Debit', 'Transfer Bank', 'Mata Uang Digital'];

        $this->form_validation->set_rules('kodepembayaran', 'Payment Code', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('namapembayaran', 'Payment Name', 'required');
        $this->form_validation->set_rules('jenispembayaran', 'Type of Payment', 'required');
        $this->form_validation->set_rules('jumlahpembayaran', 'Payment Amount', 'required');
        $this->form_validation->set_rules('tanggalpembayaran', 'Payment Date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_editpayment', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Kode_Pembayaran' => $this->input->post('kodepembayaran', true),
                'Nama_Siswa' => $this->input->post('namasiswa', true),
                'Nama_Pembayaran' => $this->input->post('namapembayaran', true),
                'Jenis_Pembayaran' => $this->input->post('jenispembayaran', true),
                'Jumlah_Pembayaran' => $this->input->post('jumlahpembayaran', true),
                'Tanggal_Pembayaran' => $this->input->post('tanggalpembayaran', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('pembayaran', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Payment successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Admin/Pembayaran');
        }
    }

    public function CariPembayaran()
    {
        $caripembayaran = $this->input->post('caripembayaran', true);
        $this->db->like('Kode_Pembayaran', $caripembayaran);
        $this->db->or_like('Nama_Siswa', $caripembayaran);
        $this->db->or_like('Nama_Pembayaran', $caripembayaran);
        $this->db->or_like('Jenis_Pembayaran', $caripembayaran);
        $this->db->or_like('Jumlah_Pembayaran', $caripembayaran);
        $this->db->or_like('Tanggal_Pembayaran', $caripembayaran);
        return $this->db->get('pembayaran')->result_array();
    }

    public function DetailPembayaran($ID)
    {
        $data['title'] = 'Detail Payment';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Pembayarann'] = $this->db->get_where('pembayaran', ['ID' => $ID])->row_array();
        $data['Jenis_Pembayaran'] = ['Kartu Kredit & Debit', 'Transfer Bank', 'Mata Uang Digital'];

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_detailpayment', $data);
        $this->load->view('templates/v_footer');
    }
    // END PEMBAYARAN

}
