<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/index');
        $this->load->view('backend/footer');
    }
    public function add_invoice()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/add_invoice');
        $this->load->view('backend/footer');
    }
}