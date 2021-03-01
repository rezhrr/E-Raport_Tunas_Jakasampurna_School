<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class pdf extends Dompdf
{
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "Raport_TJS.pdf";
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        //RENDER PDF
        $this->render();
        //OUTPUT THE GENERATED PDF TO BROWSER
        $this->stream($this->filename, array("Attachment" => FALSE));
    }
}
