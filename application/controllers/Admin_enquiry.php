<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_enquiry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('common');
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        if (($this->session->userdata('userid') == null) || ($this->session->userdata('userid') == "")) {
          redirect(base_url() . 'login');
        }
    
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    }

    public function index()
    {
        $data['menu_open'] = "Enquiry";
        $data['menu_status'] = "ContactEnquiry";

        $data['contactEnquiryList'] = $this->enquirymodel->getContactEnquiryList();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/enquiry/contact-enquiry-list', $data);
        $this->load->view('backend/footer');
    }

    public function contact_enquiry()
    {
        $data['menu_open'] = "Enquiry";
        $data['menu_status'] = "ContactEnquiry";

        $data['contactEnquiryList'] = $this->enquirymodel->getContactEnquiryList();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/enquiry/contact-enquiry-list', $data);
        $this->load->view('backend/footer');
    }

    public function product_enquiry()
    {
        $data['menu_open'] = "Enquiry";
        $data['menu_status'] = "ProductEnquiry";

        $data['productEnquiryList'] = $this->enquirymodel->getProductEnquiryList();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/enquiry/product-enquiry-list', $data);
        $this->load->view('backend/footer');
    }
}