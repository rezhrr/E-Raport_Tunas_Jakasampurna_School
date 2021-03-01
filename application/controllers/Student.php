<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
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
        $data['title'] = 'Dashboard Student';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/index', $data);
        $this->load->view('templates/v_footer');
    }

    //DATA DIRI SISWA
    public function DataDiriSiswa()
    {
        $data['title'] = 'Student Personal Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['JenisKelamin'] = ['Pria', 'Wanita'];
        $data['Agama'] = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kong Hu Cu', 'Kristen'];

        if ($this->load->model('Model', 'AppMenu')) {
            $data['Siswa'] = $this->AppMenu->GetInputDataSiswa();
            $data['OrangTua'] = $this->db->get('orangtua')->result_array();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_studentpersonaldata', $data);
        $this->load->view('templates/v_footer');
    }

    public function EditDataDiriSiswa($ID)
    {
        $data['title'] = 'Student Personal Data';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_editstudentpersonaldata', $data);
        $this->load->view('templates/v_footer');
    }
    //END DATA DIRI SISWA

    //INFO PEMBAYARAN
    public function InfoPembayaran()
    {
        $data['title'] = 'Payment Information';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_paymentinformation', $data);
        $this->load->view('templates/v_footer');
    }
    //END INFO PEMBAYARAN


    //INFO PEMBAYARAN KALENDER
    public function InfoPembayaranKalender()
    {
        $data['title'] = 'Payment Calendar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_paymentinformationcalender', $data);
        $this->load->view('templates/v_footer');
    }
    //END INFO PEMBAYARAN KALENDER

    //INFO PEMBAYARAN HISTORY
    public function InfoPembayaranHistory()
    {
        $data['title'] = 'Payment History';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalBayar'] = $this->db->get_where('pembayaran', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Pembayarann'] = $this->db->get('pembayaran')->result_array();
        $data['Jenis_Pembayaran'] = ['Kartu Kredit & Debit', 'Transfer Bank', 'Mata Uang Digital'];

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_paymentinformationhistory', $data);
        $this->load->view('templates/v_footer');
    }
    //END INFO PEMBAYARAN

    //INFO RAPORT
    public function InfoRaport()
    {
        $data['title'] = 'Raport Information';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_inforaport', $data);
        $this->load->view('templates/v_footer');
    }

    public function DetailInfoRaport()
    {
        $data['title'] = 'My Raport';
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('student/v_detailinforaport', $data);
        $this->load->view('templates/v_footer');
    }

    public function ExportToPdf()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['PersonalSiswa'] = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();

        $data['Tahun_Akademik'] = ['2018/2019'];
        $data['Semester'] = ['Ganjil'];
        $data['Kelas'] = ['KLSXIIA2'];

        $this->load->library('pdf');
        $paper_size = 'A4'; //UKURAN KERTAS
        $orientation = 'potrait'; //TIPE FORMAT KERTAS POTRAIT DAN LANDSCAPE
        $this->pdf->set_paper($paper_size, $orientation); //CONVERT TO PDF
        $this->pdf->filename = "Raport_PDF.pdf"; //NAMA FILE PDF YANG DI HASILKAN
        $this->pdf->load_view('pdf/v_raportpdf', $data);

        redirect('Student/DetailInfoRaport');
    }
    //END INFO RAPORT
}
