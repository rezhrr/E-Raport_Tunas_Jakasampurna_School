<?php

/**
 *
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }

    /* ================ SIDE BAR ============== */
    public function Index()
    {
        $this->load->view('template/v_header');
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('template/v_content');
        $this->load->view('template/v_footer');
    }

    public function Charts()
    {
        $this->load->view('admin/v_charts');
    }

    public function Tables()
    {
        $this->load->view('admin/v_tables');
    }
    /* ======================================== */

    /* ================ DIDALAM PAGES ============== */
    public function Login()
    {
        $this->load->view('admin/v_login');
    }

    public function Registration()
    {
        $this->load->view('admin/v_registration');
    }

    public function ForgotPassword()
    {
        $this->load->view('admin/v_forgotpassword');
    }

    public function Error404()
    {
        $this->load->view('admin/v_error404');
    }

    public function Blank()
    {
        $this->load->view('admin/v_blank');
    }
}
