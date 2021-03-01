<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('Email')) {
      redirect('Auth/NotAllowed');
    }
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('templates/v_auth_header', $data);
      $this->load->view('auth/v_login');
      $this->load->view('templates/v_auth_footer');
    } else {
      //VALIDASI SUKSES
      $this->_Login();
    }
  }

  private function _Login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    //CARI PENGGUNA YANG EMAILNYA SAMA DENGAN DATABASE
    $pengguna = $this->db->get_where('pengguna', ['Email' => $email])->row_array();


    //JIKA USERNYA ADA
    if ($pengguna) {
      //JIKA USERNYA AKTIF
      if ($pengguna['Aktifasi'] == 1) {
        //CEK PASSWORD
        if (password_verify($password, $pengguna['Password'])) {
          $data = [
            'Email' => $pengguna['Email'],
            'HakAkses_ID' => $pengguna['HakAkses_ID']
          ];
          $this->session->set_userdata($data);
          if ($pengguna['HakAkses_ID'] == 1) {
            redirect('Admin');
          } elseif ($pengguna['HakAkses_ID'] == 2) {
            redirect('Teacher');
          } elseif ($pengguna['HakAkses_ID'] == 3) {
            redirect('Student');
          } else {
            redirect('ClassVice');
          }
        } else {
          $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-close-circle danger"></i>
              <span class="content-danger">Wrong password!</span>
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle"></i>
                </span>
              </button>
            </div>'
          );
          redirect('Auth');
        }
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-close-circle danger"></i>
            <span class="content-danger">This email has not been activated!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
        );
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
        <i class="zmdi zmdi-close-circle danger"></i>
          <span class="content-danger">Email is not registered!</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'
      );
      redirect('Auth');
    }
  }


  public function Registration()
  {
    if ($this->session->userdata('Email')) {
      redirect('Auth/NotAllowed');
    }
    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    //UNTUK MEMBUAT EMAIL VALID DAN TIDAK BOLEH DIPAKAI ULANG UNTUK MENDAFTAR
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    // UNTUK MEMBUAT PASSWORD TIDAK BOLEH < 3
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    // UNTUK MEMBUAT REPEAT PASSWORD SAMA DENGAN PASSWORD
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registration';
      $this->load->view('templates/v_auth_header', $data);
      $this->load->view('auth/v_registration');
      $this->load->view('templates/v_auth_footer');
    } else {
      $data = [
        'Nama' => htmlspecialchars($this->input->post('fullname', true)),
        'Email' => htmlspecialchars($this->input->post('email', true)),
        'Foto' => 'default.jpg',
        //SUPAYA PASSWORD YANG DIINPUTKAN TER-ENKRIPSI
        'Password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //UNTUK HAK AKSES PENGGUNA YANG LOGIN
        'HakAkses_ID' => 2,
        'Aktifasi' => 0,
        'Waktu_Dibuat' => time()
      ];
      // SIAPKAN TOKEN YANG BERFUNGSI SEBAGAI LINK DARI EMAIL YANG NANTINYA DAPAT MEMBUAT PENDAFTAR UNTUK MASUK KE APLIKASI DENGAN TOKEN TERSEBUT DAN REGISTRASI BISA BERHASIL
      $token = base64_encode(random_bytes(32));
      //SELANJUTNYA SIAPKAN USER-TOKEN DAN TABLE SEMENTARA UNTUK NYIMPEN TOKEN DIATAS DAN AMBIL EMAIL DARI POSTNYA
      $email = $this->input->post('email', true);
      $pengguna_token = [
        'Email' => $email,
        'Token' => $token,
        'Waktu_Dibuat' => time()
      ];
      //LALU MASUKKAN KEDALAM TABEL TOKEN TERLEBIH DAHULU
      $this->db->insert('pengguna_token', $pengguna_token);

      //MASUKKAN KEDALAM DATABASE
      $this->db->insert('pengguna', $data);

      //JIKA INGIN MENGGUNAKAN AKTIFASI DARI GMAIL MAKA BUATLAH DULU PRIVATE FUNCTION
      $this->_kirimEmail($token, 'Verify');


      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
        <i class="zmdi zmdi-check-circle"></i>
        <span class="content">Congratulation! your account has been created. Please check email to activated!</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'
      );
      redirect('Auth');
    }
  }

  //YANG BERFUNGSI UNTUK MENGIRIMKAN EMAIL KEPADA SANG PENDAFTAR
  private function _kirimEmail($token, $type)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'raflyinter99@gmail.com',
      'smtp_pass' => 'assasinzyrex',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'  => 'utf-8',
      'newline'  => "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('raflyinter99@gmail.com', 'E Raport TJS');
    $this->email->to($this->input->post('email'));

    //PENGECEKAN UNTUK VERIFIKASI AKUN
    if ($type == 'Verify') {
      //PESAN VERIFY ACCOUNT PADA EMAIL
      $this->email->subject('Account Verification');
      $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'Auth/Verify?Email=' . $this->input->post('email') . '&Token=' . urlencode($token) . '">Activate!</a>');
    } elseif ($type == 'Forgot') {
      // PESAN RESET PASSWORD PADA EMAIL
      $this->email->subject('Reset Verification');
      $this->email->message('Click this link to reset your account : <a href="' . base_url() . 'Auth/Reset?Email=' . $this->input->post('email') . '&Token=' . urlencode($token) . '">Activate!</a>');
    }
    //KIRIM EMAIL TERSEBUT KE PENDAFTAR
    if ($this->email->send()) {
      return true;
    } else {
      //JIKA TIDAK BERHASIL PERLIHATKAN PESAN KESALAHANNYA
      echo $this->email->print_debugger();
      die;
    }
  }

  public function Verify() //UNTUK PEMGECEKAN VERIFY
  {
    //KARENA BERADA DI URL MENGGEUNAKAN GET
    $email = $this->input->get('Email');
    $token = $this->input->get('Token');
    //PASTIKAN EMAIL VALID DAN TIDAK MENULIS MANUAL
    $pengguna = $this->db->get_where('pengguna', ['Email' => $email])->row_array();

    if ($pengguna) {
      $pengguna_token = $this->db->get_where('pengguna_token', ['Token' => $token])->row_array();

      if ($pengguna_token) {
        if (time() - $pengguna_token['Waktu_Dibuat'] < (60 * 60 * 24)) {
          //JIKA BENAR UPDATE TABLE PENGGUNA PADA AKTIFASI JIKA SUDAH DI AKTIFASI SEBELUM 1*24 JAM
          $this->db->set('Aktifasi', 1);
          $this->db->where('Email', $email);
          $this->db->update('pengguna');
          //lALU DELETE TOKEN PENGGUNA TOKENNYA
          $this->db->delete('pengguna_token', ['Email' => $email]);

          $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">' . $email . ' has been activated! Please login.</span>
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle"></i>
                </span>
              </button>
            </div>'
          );
          redirect('Auth');
        } else {
          //JIKA MENGGUNAKAN WAKTU PADA SAAT ACTIVASI DAN LEBIH DARI 1*24 JAM MAKA HAPUS DATA EMAIL PENDAFTAR PADA TABEL PENGGUNA DAN TABEL TOKEN

          $this->db->delete('pengguna', ['Email' => $email]);
          $this->db->delete('pengguna_token', ['Email' => $email]);
          $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-close-circle danger"></i>
              <span class="content-danger">Account activation failed! Activation time out.</span>
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle"></i>
                </span>
              </button>
            </div>'
          );
          redirect('Auth');
        }
      } else {
        //JIKA TOKENNYA SALAH/ DIMANIPULASI
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-close-circle danger"></i>
            <span class="content-danger">Account activation failed! Wrong code activation.</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
        );
        redirect('Auth');
      }
    } else {
      //JIKA EMAILNYA SALAH/ DIMANIPULASI
      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
        <i class="zmdi zmdi-close-circle danger"></i>
          <span class="content-danger">Account activation failed! Wrong email.</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'
      );
      redirect('Auth');
    }
  }

  public function Logout()
  {
    //HAPUS PENERIMAAN DATA DARI DATABASE SAAT LOGOUT
    $this->session->unset_userdata('Email');
    $this->session->unset_userdata('HakAkses_ID');

    $this->session->set_flashdata(
      'message',
      '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">You have been logged out!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close-circle"></i>
                </span>
            </button>
            </div>'
    );
    redirect('Auth');
  }

  public function Blocked()
  {
    $this->load->view('auth/v_blocked');
  }

  public function NotAllowed()
  {
    $this->load->view('auth/v_notallowed');
  }

  public function ForgotPassword() //UNTUK METHOD LAMAN FOTGOT PASSWORD
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {

      $data['title'] = 'Forgot Password';
      $this->load->view('templates/v_auth_header', $data);
      $this->load->view('auth/v_forgotpassword');
      $this->load->view('templates/v_auth_footer');
    } else {
      $email = $this->input->post('email');
      //CEK EMAIL ADA TIDAK DI DATABASE
      $pengguna = $this->db->get_where('pengguna', ['Email' => $email, 'Aktifasi' => 1])->row_array();

      if ($pengguna) {
        $token = base64_encode(random_bytes(32));
        $pengguna_token = [
          'Email' => $email,
          'Token' => $token,
          'Waktu_Dibuat' => time()
        ];

        $this->db->insert('pengguna_token', $pengguna_token);
        $this->_kirimEmail($token, 'Forgot');
        //JIKA SUKSES
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Please check your email to reset password!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
        );
        redirect('Auth/ForgotPassword');
      } else {
        //JIKA TIDAK SUKSES
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-close-circle danger"></i>
            <span class="content-danger">Email is not registered or activated!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
        );
        redirect('Auth/ForgotPassword');
      }
    }
  }

  public function Reset() //UNTUK PENGECEKKAN RESET
  {
    //KARENA BERADA DI URL MENGGEUNAKAN GET
    $email = $this->input->get('Email');
    $token = $this->input->get('Token');
    //SELANJUTNYA CEK EMAILNYA BENER ADA DI DATABASE APA TIDAK (VALID)
    $pengguna = $this->db->get_where('pengguna', ['Email' => $email])->row_array();
    if ($pengguna) {
      $pengguna_token = $this->db->get_where('pengguna_token', ['Token' => $token])->row_array();
      if ($pengguna_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->ChangeResetPassword();
      } else {
        //JIKA TIDAK ADA DATANYA DI TABEL PENGGUNA_TOKEN
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-close-circle danger"></i>
            <span class="content-danger">Reset password failed! Wrong reset code.</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
        );
        redirect('Auth/ForgotPassword');
      }
    } else {
      //JIKA TIDAK ADA DATANYA DI TABEL PENGGUNA
      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
        <i class="zmdi zmdi-close-circle danger"></i>
          <span class="content-danger">Reset password failed! Wrong email.</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'
      );
      redirect('Auth/ForgotPassword');
    }
  }

  public function ChangeResetPassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('Auth');
    }
    // KASIH KETENTUAN SEPERTI, HARUS DIISI,PASS 1 SAMA DENGAN PASS 2 , MIN PASSWORD
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('templates/v_auth_header', $data);
      $this->load->view('auth/v_changeresetpassword');
      $this->load->view('templates/v_auth_footer');
    } else {

      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('Password', $password);
      $this->db->where('Email', $email);
      $this->db->update('pengguna');

      //BERSIHKAN SESSION TERLEBIH DAHULU
      $this->session->unset_userdata('reset_email');

      //BERHASIL
      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content">Password has been changed! Please login.</span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
                </div>'
      );
      redirect('Auth');
    }
  }
}
