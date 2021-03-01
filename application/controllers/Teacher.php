<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
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
        $data['title'] = 'Dashboard Teacher';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/index', $data);
        $this->load->view('templates/v_footer');
    }

    // DATA DIRI GURU
    public function DataDiriGuru()
    {
        $data['title'] = 'Teacher Personal Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/v_teacherpersonaldata', $data);
        $this->load->view('templates/v_footer');
    }
    // END DATA DIRI GURU

    // UNTUK INPUT DATA SISWA
    public function InputDataSiswa()
    {
        $data['title'] = 'Input Student Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Siswaa'] = $this->db->get('siswa')->result_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Siswa'] = $this->AppMenu->GetInputDataSiswa();
            $data['OrangTua'] = $this->db->get('orangtua')->result_array();
        }

        //CARI DATA
        if ($this->input->post('cariinputdatasiswa')) {
            $data['Siswa'] = $this->CariInputDataSiswa();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('nis', 'Student ID Number', 'required');
            $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
            $this->form_validation->set_rules('tanggallahir', 'Date of Birth', 'required');
            $this->form_validation->set_rules('tempatlahir', 'Place of Birth', 'required');
            $this->form_validation->set_rules('jeniskelamin', 'Gender', 'required');
            $this->form_validation->set_rules('agama', 'Religion', 'required');
            $this->form_validation->set_rules('alamat', 'Address', 'required');
            $this->form_validation->set_rules('telepon', 'Phone Number', 'required');
            $this->form_validation->set_rules('orangtua_id', 'Parent Name', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_inputstudentdata', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'NIS'           => $this->input->post('nis', true),
                'Nama_Siswa'    => $this->input->post('namasiswa', true),
                'Tanggal_Lahir' => $this->input->post('tanggallahir', true),
                'Tempat_Lahir'  => $this->input->post('tempatlahir', true),
                'Jenis_Kelamin' => $this->input->post('jeniskelamin', true),
                'Agama'         => $this->input->post('agama', true),
                'Alamat'        => $this->input->post('alamat', true),
                'Email'         => $this->input->post('email', true),
                'Telepon'       => $this->input->post('telepon', true),
                'Orangtua_ID'   => $this->input->post('orangtua_id', true),
                'Foto'          => 'student.png'
            ];
            $this->db->insert('siswa', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Student has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputDataSiswa');
        }
    }

    public function HapusInputDataSiswa($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('siswa');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Student successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Teacher/InputDataSiswa');
    }

    public function EditInputDataSiswa($ID)
    {
        $data['title'] = 'Edit Input Student Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Siswaa'] = $this->db->get_where('siswa', ['ID' => $ID])->row_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Siswa'] = $this->AppMenu->GetInputDataSiswa();
            $data['OrangTua'] = $this->db->get('orangtua')->result_array();
        }

        $this->form_validation->set_rules('nis', 'Student ID Number', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Date of Birth', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Place of Birth', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Gender', 'required');
        $this->form_validation->set_rules('agama', 'Religion', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('telepon', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('orangtua_id', 'Parent Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_editinputstudentdata', $data);
            $this->load->view('templates/v_footer');
        } else {
            $NIS           = $this->input->post('nis', true);
            $Nama_Siswa    = $this->input->post('namasiswa', true);
            $Tanggal_Lahir = $this->input->post('tanggallahir', true);
            $Tempat_Lahir  = $this->input->post('tempatlahir', true);
            $Jenis_Kelamin = $this->input->post('jeniskelamin', true);
            $Agama         = $this->input->post('agama', true);
            $Alamat        = $this->input->post('alamat', true);
            $Email         = $this->input->post('email', true);
            $Telepon       = $this->input->post('telepon', true);
            $Orangtua_ID      = $this->input->post('orangtua_id', true);

            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/foto_tjs/student/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto', true)) {
                    //UNTUK MEMBUAT FOTO YANG DI UPDATE BARU DAPAT MASUK DAN FOTO YANG LAMA HILANG
                    $Old_foto = $data['siswa']['Foto'];
                    if ($Old_foto != 'student.png') {
                        unlink(FCPATH . 'assets/foto_tjs/student/' . $Old_foto);
                    }
                    //UNTUK MENGUPLOAD FOTO BARU
                    $New_foto = $this->upload->data('file_name');
                    $this->db->set('Foto', $New_foto);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    redirect('Teacher/InputDataSiswa');
                }
            }
            //JIKA TIDAK ADA YANG UPLOAD FOTO
            $this->db->set('NIS', $NIS);
            $this->db->set('Nama_Siswa', $Nama_Siswa);
            $this->db->set('Tanggal_Lahir', $Tanggal_Lahir);
            $this->db->set('Tempat_Lahir', $Tempat_Lahir);
            $this->db->set('Jenis_Kelamin', $Jenis_Kelamin);
            $this->db->set('Agama', $Agama);
            $this->db->set('Alamat', $Alamat);
            $this->db->set('Email', $Email);
            $this->db->set('Telepon', $Telepon);
            $this->db->set('Orangtua_ID', $Orangtua_ID);
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('siswa');

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Student successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputDataSiswa');
        }
    }

    public function CariInputDataSiswa()
    {
        $cariinputdatasiswa = $this->input->post('cariinputdatasiswa', true);
        $this->db->like('NIS', $cariinputdatasiswa);
        $this->db->or_like('Nama_Siswa', $cariinputdatasiswa);
        $this->db->or_like('Tanggal_Lahir', $cariinputdatasiswa);
        $this->db->or_like('Tempat_Lahir', $cariinputdatasiswa);
        $this->db->or_like('Agama', $cariinputdatasiswa);
        $this->db->or_like('Alamat', $cariinputdatasiswa);
        $this->db->or_like('Telepon', $cariinputdatasiswa);
        $this->db->or_like('Orangtua_ID', $cariinputdatasiswa);
        return $this->db->get('siswa')->result_array();
    }

    public function DetailInputDataSiswa($ID)
    {
        $data['title'] = 'Detail Input Student Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Siswaa'] = $this->db->get_where('siswa', ['ID' => $ID])->row_array();
        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Siswa'] = $this->AppMenu->GetInputDataSiswa();
            $data['OrangTua'] = $this->db->get('orangtua')->result_array();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/v_detailinputstudentdata', $data);
        $this->load->view('templates/v_footer');
    }
    // END INPUT DATA SISWA

    // UNTUK INPUT DATA ORANG TUA
    public function InputDataOrangTua()
    {
        $data['title'] = 'Input Parent Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['OrangTua']   = $this->db->get('orangtua')->result_array();
        $data['Agama']      = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];
        $data['Pendidikan'] = ['SD Sederajat', 'SMP Sederajat', 'SMA/SMK Sederajat', 'S1', 'S2', 'S3'];
        $data['Pekerjaan']  = ['Petani', 'Buruh Pabrik', 'Pegawai Negeri Sipil', 'Guru', 'Wiraswasta', 'Wirausaha', 'Ibu Rumah Tangga'];

        //CARI DATA
        if ($this->input->post('cariinputdataorangtua')) {
            $data['OrangTua'] = $this->CariInputDataOrangTua();
            //END CARI DATA
        } else {
            $this->form_validation->set_rules('nama_b', 'Fathers Name', 'required');
            $this->form_validation->set_rules('tanggallahir_b', 'Fathers Birthday', 'required');
            $this->form_validation->set_rules('tempatlahir_b', 'Fathers Birthplace', 'required');
            $this->form_validation->set_rules('agama_b', 'Fathers Religion', 'required');
            $this->form_validation->set_rules('pendidikan_b', 'Fathers Last Education', 'required');
            $this->form_validation->set_rules('pekerjaan_b', 'Fathers Profession', 'required');
            $this->form_validation->set_rules('nama_i', 'Mothers Name', 'required');
            $this->form_validation->set_rules('tanggallahir_i', 'Mothers Birthday', 'required');
            $this->form_validation->set_rules('tempatlahir_i', 'Mothers Birthplace', 'required');
            $this->form_validation->set_rules('agama_i', 'Mothers Religion', 'required');
            $this->form_validation->set_rules('pendidikan_i', 'Mothers Last Education', 'required');
            $this->form_validation->set_rules('pekerjaan_i', 'Mothers Religion', 'required');
            $this->form_validation->set_rules('alamat_ortu', 'Parents Address', 'required');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_inputparentdata', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Nama_Bapak'          => $this->input->post('nama_b', true),
                'Tanggal_Lahir_Bapak' => $this->input->post('tanggallahir_b', true),
                'Tempat_Lahir_Bapak'  => $this->input->post('tempatlahir_b', true),
                'Agama_Bapak'         => $this->input->post('agama_b', true),
                'Pendidikan_Bapak'    => $this->input->post('pendidikan_b', true),
                'Pekerjaan_Bapak'     => $this->input->post('pekerjaan_b', true),
                'Nama_Ibu'            => $this->input->post('nama_i', true),
                'Tanggal_Lahir_Ibu'   => $this->input->post('tanggallahir_i', true),
                'Tempat_Lahir_Ibu'    => $this->input->post('tempatlahir_i', true),
                'Agama_Ibu'           => $this->input->post('agama_i', true),
                'Pendidikan_Ibu'      => $this->input->post('pendidikan_i', true),
                'Pekerjaan_Ibu'       => $this->input->post('pekerjaan_i', true),
                'Alamat_Orangtua'     => $this->input->post('alamat_ortu', true)
            ];
            $this->db->insert('orangtua', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Parent has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputDataOrangTua');
        }
    }

    public function HapusInputDataOrangTua($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('orangtua');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Parent successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Teacher/InputDataOrangTua');
    }

    public function EditInputDataOrangTua($ID)
    {
        $data['title']    = 'Edit Input Parents Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['OrangTua']   = $this->db->get_where('orangtua', ['ID' => $ID])->row_array();
        $data['Agama']      = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];
        $data['Pendidikan'] = ['SD Sederajat', 'SMP Sederajat', 'SMA/SMK Sederajat', 'S1', 'S2', 'S3'];
        $data['Pekerjaan']  = ['Petani', 'Buruh Pabrik', 'Pegawai Negeri Sipil', 'Guru', 'Wiraswasta', 'Wirausaha', 'Ibu Rumah Tangga'];

        $this->form_validation->set_rules('nama_b', 'Fathers Name', 'required');
        $this->form_validation->set_rules('tanggallahir_b', 'Fathers Birthday', 'required');
        $this->form_validation->set_rules('tempatlahir_b', 'Fathers Birthplace', 'required');
        $this->form_validation->set_rules('agama_b', 'Fathers Religion', 'required');
        $this->form_validation->set_rules('pendidikan_b', 'Fathers Last Education', 'required');
        $this->form_validation->set_rules('pekerjaan_b', 'Fathers Profession', 'required');
        $this->form_validation->set_rules('nama_i', 'Mothers Name', 'required');
        $this->form_validation->set_rules('tanggallahir_i', 'Mothers Birthday', 'required');
        $this->form_validation->set_rules('tempatlahir_i', 'Mothers Birthplace', 'required');
        $this->form_validation->set_rules('agama_i', 'Mothers Religion', 'required');
        $this->form_validation->set_rules('pendidikan_i', 'Mothers Last Education', 'required');
        $this->form_validation->set_rules('pekerjaan_i', 'Mothers Religion', 'required');
        $this->form_validation->set_rules('alamat_ortu', 'Parents Address', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_editinputparentdata', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'Nama_Bapak'          => $this->input->post('nama_b', true),
                'Tanggal_Lahir_Bapak' => $this->input->post('tanggallahir_b', true),
                'Tempat_Lahir_Bapak'  => $this->input->post('tempatlahir_b', true),
                'Agama_Bapak'         => $this->input->post('agama_b', true),
                'Pendidikan_Bapak'    => $this->input->post('pendidikan_b', true),
                'Pekerjaan_Bapak'     => $this->input->post('pekerjaan_b', true),
                'Nama_Ibu'            => $this->input->post('nama_i', true),
                'Tanggal_Lahir_Ibu'   => $this->input->post('tanggallahir_i', true),
                'Tempat_Lahir_Ibu'    => $this->input->post('tempatlahir_i', true),
                'Agama_Ibu'           => $this->input->post('agama_i', true),
                'Pendidikan_Ibu'      => $this->input->post('pendidikan_i', true),
                'Pekerjaan_Ibu'       => $this->input->post('pekerjaan_i', true),
                'Alamat_Orangtua'     => $this->input->post('alamat_ortu', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('orangtua', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Parent successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputDataOrangTua');
        }
    }

    public function CariInputDataOrangTua()
    {
        $cariinputdataorangtua = $this->input->post('cariinputdataorangtua', true);
        $this->db->like('Nama_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Tanggal_Lahir_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Tempat_Lahir_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Agama_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Pendidikan_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Pekerjaan_Bapak', $cariinputdataorangtua);
        $this->db->or_like('Nama_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Tanggal_Lahir_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Tempat_Lahir_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Agama_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Pendidikan_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Pekerjaan_Ibu', $cariinputdataorangtua);
        $this->db->or_like('Alamat_Orangtua', $cariinputdataorangtua);
        return $this->db->get('orangtua')->result_array();
    }

    public function DetailInputDataOrangTua($ID)
    {
        $data['title'] = 'Detail Input Parent Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['OrangTua']   = $this->db->get_where('orangtua', ['ID' => $ID])->row_array();
        $data['Agama']      = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];
        $data['Pendidikan'] = ['SD Sederajat', 'SMP Sederajat', 'SMA/SMK Sederajat', 'S1', 'S2', 'S3'];
        $data['Pekerjaan']  = ['Petani', 'Buruh Pabrik', 'Pegawai Negeri Sipil', 'Guru', 'Wiraswasta', 'Wirausaha', 'Ibu Rumah Tangga'];

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/v_detailinputparentdata', $data);
        $this->load->view('templates/v_footer');
    }
    // END INPUT DATA ORANG TUA

    // INPUT NILAI SISWA
    public function InputNilaiSiswa()
    {
        $data['title'] = 'Input Score Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['NilaiSiswa'] = $this->db->get('nilai_siswa')->result_array();
        $data['TahunAkademik'] = ['2018/2019'];
        $data['Semester'] = ['Ganjil', 'Genap'];

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('kelas_id', 'Class Code', 'required');
        $this->form_validation->set_rules('matapelajaran_id', 'Academic Student Name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_akademik', 'Academic Year', 'required');

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Nilai_Siswa'] = $this->AppMenu->GetInputNilaiSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_inputscorestudent', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'NIS' => $this->input->post('nis', true),
                'Nama_Siswa' => $this->input->post('namasiswa', true),
                'Kelas_ID' => $this->input->post('kelas_id', true),
                'Matapelajaran_ID' => $this->input->post('matapelajaran_id', true),
                'Semester' => $this->input->post('semester', true),
                'Tahun_Akademik' => $this->input->post('tahun_akademik', true),
                'Nilai_Tugas_1' => $this->input->post('nilaitugas1', true),
                'Nilai_Tugas_2' => $this->input->post('nilaitugas2', true),
                'Nilai_Tugas_3' => $this->input->post('nilaitugas3', true),
                'Nilai_UTS' => $this->input->post('nilaiuts', true),
                'Nilai_UAS' => $this->input->post('nilaiuas', true)
            ];
            $this->db->insert('nilai_siswa', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Student Score has been added!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputNilaiSiswa');
        }
    }

    public function HapusInputNilaiSiswa($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('nilai_siswa');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Score Student successfully deleted!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
        );
        redirect('Teacher/InputNilaiSiswa');
    }

    public function EditInputNilaiSiswa($ID)
    {
        $data['title'] = 'Edit Score Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['NilaiSiswa'] = $this->db->get_where('nilai_siswa', ['ID' => $ID])->row_array();
        $data['TahunAkademik'] = ['2018/2019'];
        $data['Semester'] = ['Ganjil', 'Genap'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Nilai_Siswa'] = $this->AppMenu->GetInputNilaiSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        }

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('kelas_id', 'Class Code', 'required');
        $this->form_validation->set_rules('matapelajaran_id', 'Academic Student Name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_akademik', 'Academic Year', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_editinputscorestudent', $data);
            $this->load->view('templates/v_footer');
        } else {
            $data = [
                'NIS' => $this->input->post('nis', true),
                'Nama_Siswa' => $this->input->post('namasiswa', true),
                'Kelas_ID' => $this->input->post('kelas_id', true),
                'Matapelajaran_ID' => $this->input->post('matapelajaran_id', true),
                'Semester' => $this->input->post('semester', true),
                'Tahun_Akademik' => $this->input->post('tahun_akademik', true),
                'Nilai_Tugas_1' => $this->input->post('nilaitugas1', true),
                'Nilai_Tugas_2' => $this->input->post('nilaitugas2', true),
                'Nilai_Tugas_3' => $this->input->post('nilaitugas3', true),
                'Nilai_UTS' => $this->input->post('nilaiuts', true),
                'Nilai_UAS' => $this->input->post('nilaiuas', true)
            ];
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('nilai_siswa', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Score Student successfully updated!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
            );
            redirect('Teacher/InputNilaiSiswa');
        }
    }

    public function DetailInputNilaiSiswa($ID)
    {
        $data['title'] = 'Detail Score Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['NilaiSiswa'] = $this->db->get('nilai_siswa', ['ID' => $ID])->row_array();

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Nilai_Siswa'] = $this->AppMenu->GetInputNilaiSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
            $data['Tahun_Akademik'] = $this->db->get('tahun_akademik')->result_array();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/v_detailinputscorestudent', $data);
        $this->load->view('templates/v_footer');
    }
    // END INPUT DATA SISWA

    // INPUT RAPORT
    public function InputRaportSiswa()
    {
        $data['title'] = 'Input Raport Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Raportt'] = $this->db->get('raport')->result_array();
        $data['Semester'] = ['Ganjil', 'Genap'];
        $data['TahunAkademik'] = ['2018/2019'];

        $this->form_validation->set_rules('idraport', 'ID Raport', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('kelas_id', 'Class Name', 'required');
        $this->form_validation->set_rules('matapelajaran_id', 'Academic Student Name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_akademik', 'Academic Year', 'required');

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Raport'] = $this->AppMenu->GetInputRaportSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_inputraportstudent', $data);
            $this->load->view('templates/v_footer');
        } else {
            $ID_Raport = $this->input->post('idraport', true);
            $NIS = $this->input->post('nis', true);
            $Nama_Siswa = $this->input->post('namasiswa', true);
            $Kelas_ID = $this->input->post('kelas_id', true);
            $Matapelajaran_ID = $this->input->post('matapelajaran_id', true);
            $KKM = 75;
            $Nilai_Tugas_1 = $this->input->post('nilaitugas1', true);
            $Nilai_Tugas_2 = $this->input->post('nilaitugas2', true);
            $Nilai_Tugas_3 = $this->input->post('nilaitugas3', true);
            $Nilai_UTS = $this->input->post('nilaiuts', true);
            $Nilai_UAS = $this->input->post('nilaiuas', true);
            $Semester = $this->input->post('semester', true);
            $Tahun_Akademik = $this->input->post('tahun_akademik', true);

            $Total = 0;
            $Total = ($Nilai_Tugas_1 + $Nilai_Tugas_2 + $Nilai_Tugas_3 + $Nilai_UTS + $Nilai_UAS) / 5;

            if ($Total >= 85) {
                $Predikat = "A";
            } elseif ($Total >= 75) {
                $Predikat = "B+";
            } elseif ($Total >= 70) {
                $Predikat = "B";
            } elseif ($Total >= 65) {
                $Predikat = "C+";
            } elseif ($Total >= 60) {
                $Predikat = "C";
            } elseif ($Total < 55) {
                $Predikat = "D";
            } else {
                $Predikat = "E";
            }

            $data = [
                'ID_Raport' => $ID_Raport,
                'NIS' => $NIS,
                'Nama_Siswa' => $Nama_Siswa,
                'Kelas_ID' => $Kelas_ID,
                'Matapelajaran_ID' => $Matapelajaran_ID,
                'KKM' => $KKM,
                'Nilai_Tugas_1' => $Nilai_Tugas_1,
                'Nilai_Tugas_2' => $Nilai_Tugas_2,
                'Nilai_Tugas_3' => $Nilai_Tugas_3,
                'Nilai_UTS' => $Nilai_UTS,
                'Nilai_UAS' => $Nilai_UAS,
                'Nilai_Akhir' => $Total,
                'Predikat' => $Predikat,
                'Semester' => $Semester,
                'Tahun_Akademik' => $Tahun_Akademik
            ];

            $this->db->insert('raport', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                    <i class="zmdi zmdi-check-circle"></i>
                    <span class="content">Raport has been added!</span>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close-circle"></i>
                        </span>
                    </button>
                    </div>'
            );
            redirect('Teacher/InputRaportSiswa');
        }
    }

    public function HapusInputRaportSiswa($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('raport');

        $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Raport successfully deleted!</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
        );
        redirect('Teacher/InputRaportSiswa');
    }

    public function EditInputRaportSiswa($ID)
    {
        $data['title'] = 'Edit Raport Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Raportt'] = $this->db->get_where('raport', ['ID' => $ID])->row_array();
        $data['Semester'] = ['Ganjil', 'Genap'];
        $data['TahunAkademik'] = ['2018/2019'];

        $this->form_validation->set_rules('idraport', 'ID Raport', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('kelas_id', 'Class Name', 'required');
        $this->form_validation->set_rules('matapelajaran_id', 'Academic Student Name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_akademik', 'Academic Year', 'required');

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Raport'] = $this->AppMenu->GetInputRaportSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar', $data);
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('teacher/v_editinputraportstudent', $data);
            $this->load->view('templates/v_footer');
        } else {
            $ID_Raport = $this->input->post('idraport', true);
            $NIS = $this->input->post('nis', true);
            $Nama_Siswa = $this->input->post('namasiswa', true);
            $Kelas_ID = $this->input->post('kelas_id', true);
            $Matapelajaran_ID = $this->input->post('matapelajaran_id', true);
            $KKM = 75;
            $Nilai_Tugas_1 = $this->input->post('nilaitugas1', true);
            $Nilai_Tugas_2 = $this->input->post('nilaitugas2', true);
            $Nilai_Tugas_3 = $this->input->post('nilaitugas3', true);
            $Nilai_UTS = $this->input->post('nilaiuts', true);
            $Nilai_UAS = $this->input->post('nilaiuas', true);
            $Semester = $this->input->post('semester', true);
            $Tahun_Akademik = $this->input->post('tahun_akademik', true);
            $Total = 0;
            $Total = ($Nilai_Tugas_1 + $Nilai_Tugas_2 + $Nilai_Tugas_3 + $Nilai_UTS + $Nilai_UAS) / 5;

            if ($Total >= 85) {
                $Predikat = "A";
            } elseif ($Total >= 75) {
                $Predikat = "B+";
            } elseif ($Total >= 70) {
                $Predikat = "B";
            } elseif ($Total >= 65) {
                $Predikat = "C+";
            } elseif ($Total >= 60) {
                $Predikat = "C";
            } elseif ($Total < 55) {
                $Predikat = "D";
            } else {
                $Predikat = "E";
            }

            $this->db->set('ID_Raport', $ID_Raport);
            $this->db->set('NIS', $NIS);
            $this->db->set('Nama_Siswa', $Nama_Siswa);
            $this->db->set('Kelas_ID', $Kelas_ID);
            $this->db->set('Matapelajaran_ID', $Matapelajaran_ID);
            $this->db->set('KKM', $KKM);
            $this->db->set('Nilai_Tugas_1', $Nilai_Tugas_1);
            $this->db->set('Nilai_Tugas_2', $Nilai_Tugas_2);
            $this->db->set('Nilai_Tugas_3', $Nilai_Tugas_3);
            $this->db->set('Nilai_UTS', $Nilai_UTS);
            $this->db->set('Nilai_UAS', $Nilai_UAS);
            $this->db->set('Nilai_Akhir', $Total);
            $this->db->set('Predikat', $Predikat);
            $this->db->set('Semester', $Semester);
            $this->db->set('Tahun_Akademik', $Tahun_Akademik);
            $this->db->where('ID', $this->input->post('ID'));
            $this->db->update('raport');
            $this->session->set_flashdata(
                'message',
                '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                    <i class="zmdi zmdi-check-circle"></i>
                    <span class="content">Raport has been updated!</span>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close-circle"></i>
                        </span>
                    </button>
                    </div>'
            );
            redirect('Teacher/InputRaportSiswa');
        }
    }

    public function DetailInputRaportSiswa($ID)
    {
        $data['title'] = 'Detail Score Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalGuru'] = $this->db->get_where('guru', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Raportt'] = $this->db->get_where('raport', ['ID' => $ID])->result_array();
        $data['Semester'] = ['Ganjil', 'Genap'];
        $data['TahunAkademik'] = ['2018/2019'];

        $this->form_validation->set_rules('idraport', 'ID Raport', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('namasiswa', 'Student Name', 'required');
        $this->form_validation->set_rules('kelas_id', 'Class Name', 'required');
        $this->form_validation->set_rules('matapelajaran_id', 'Academic Student Name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_akademik', 'Academic Year', 'required');

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Raport'] = $this->AppMenu->GetInputRaportSiswa();
            $data['Siswa'] = $this->db->get('siswa')->result_array();
            $data['Kelas'] = $this->db->get('kelas')->result_array();
            $data['MataPelajaran'] = $this->db->get('matapelajaran')->result_array();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('teacher/v_detailinputraportstudent', $data);
        $this->load->view('templates/v_footer');
    }
    // END INPUT RAPORT


}
