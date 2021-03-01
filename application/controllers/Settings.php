<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function __construct()
  {
    // APABILA USER BELUM LOGIN DAN INGIN MASUK KE URL DENGAN ISENG MAKA DIATUR UNTUK TIDAK DAPAT MASUK DAN HARUS LOGIN DAN HAK AKSES TERTENTU
    // MEMBUAT FUNCTION HELPER YANG DIBUAT SENDIRI DAN BUKAN MERUPAKAN BAGIAN DARI CODEIGNATER TAPI AKAN DIPANGGIL DIMANAPUN DIBUTUHKAN DAN CODEIGNATER MEMUNGKINKAN UNTUK MEMBUAT ITU DAN DIREKOMENDASIKAN DITARUH DI CONTROLLER CI
    parent::__construct();
    is_logged_in();
  }

  public function MyProfile()
  {
    $data['title'] = 'My Profile';
    $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

    $this->load->view('templates/v_header', $data);
    $this->load->view('templates/v_sidebar', $data);
    $this->load->view('templates/v_navbar', $data);
    $this->load->view('settings/v_myprofile', $data);
    $this->load->view('templates/v_footer');
  }

  public function EditProfile()
  {
    $data['title'] = 'Edit Profile';
    $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

    //KASIH ATURAN/RULESNYA
    $this->form_validation->set_rules('fullname', 'Full name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/v_header', $data);
      $this->load->view('templates/v_sidebar', $data);
      $this->load->view('templates/v_navbar', $data);
      $this->load->view('settings/v_editprofile', $data);
      $this->load->view('templates/v_footer');
    } else {
      $fullname = $this->input->post('fullname');
      $email = $this->input->post('email');

      //CEK JIKA ADA GAMBAR YANG DI UPLOAD
      $upload_foto = $_FILES['foto']['name'];

      if ($upload_foto) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/foto_tjs/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          //UNTUK MEMBUAT FOTO YANG DI UPDATE BARU DAPAT MASUK DAN FOTO YANG LAMA HILANG
          $Old_foto = $data['pengguna']['Foto'];
          if ($Old_foto != 'default.jpg') {
            unlink(FCPATH . 'assets/foto_tjs/profile/' . $Old_foto);
          }
          //UNTUK MENGUPLOAD FOTO BARU
          $New_foto = $this->upload->data('file_name');
          $this->db->set('Foto', $New_foto);
        } else {
          echo $this->upload->display_errors();
          //         $this->session->set_flashdata(
          //             'message',
          //             '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
          //         );
          //         redirect('Settings');
        }
      }
      //JIKA TIDAK ADA YANG UPLOAD GAMBAR
      $this->db->set('Nama', $fullname);
      $this->db->where('Email', $email);
      $this->db->update('pengguna');

      // JIKA BERHASIL DI UPDATE PANGGIL TAMPILAN BERHASIL
      $this->session->set_flashdata(
        'message',
        '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-check-circle"></i>
          <span class="content">Your profile has been update!</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'
      );
      redirect('Settings/MyProfile');
    }
  }

  public function UbahPassword()
  {
    $data['title'] = 'Change Password';
    $data['pengguna'] = $this->db->get_where('pengguna', ['Email' => $this->session->userdata('Email')])->row_array();

    $this->form_validation->set_rules('passwordlama', 'Current Passord', 'required|trim');
    $this->form_validation->set_rules('passwordbaru1', 'New Password', 'required|trim|min_length[3]|matches[passwordbaru2]');
    $this->form_validation->set_rules('passwordbaru2', 'Confirm New Password', 'required|trim|min_length[3]|matches[passwordbaru1]');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/v_header', $data);
      $this->load->view('templates/v_sidebar', $data);
      $this->load->view('templates/v_navbar', $data);
      $this->load->view('settings/v_ubahpassword', $data);
      $this->load->view('templates/v_footer');
    } else {
      $passwordlama = $this->input->post('passwordlama');
      $passwordbaru = $this->input->post('passwordbaru1');

      //INI UNTUK PASSWORD SALAH
      if (!password_verify($passwordlama, $data['pengguna']['Password'])) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
          <i class="zmdi zmdi-close-circle danger"></i>
          <span class="content-danger">Wrong current password!</span>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
          </button>
        </div>'

        );
        redirect('Settings/UbahPassword');
      } else {

        // INI KALO PASSWORDNYA SAMA
        if ($passwordlama == $passwordbaru) {
          $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-close-circle danger"></i>
            <span class="content-danger">New password cannot be the same as current password!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
          );
          redirect('Settings/UbahPassword');
        } else {

          //PASSWORD SUDAH BENAR
          $password_hash = password_hash($passwordbaru, PASSWORD_DEFAULT);

          $this->db->set('Password', $password_hash);
          $this->db->where('Email', $this->session->userdata('Email'));
          $this->db->update('pengguna');

          $this->session->set_flashdata(
            'message',
            '<div class="alert au-alert-success alert-dismissible fade show au-alert au-alert mb-3" role="alert">
            <i class="zmdi zmdi-check-circle"></i>
            <span class="content">Password changed!</span>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="zmdi zmdi-close-circle"></i>
              </span>
            </button>
          </div>'
          );
          redirect('Settings/UbahPassword');
        }
      }
    }
  }
}
