<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function index()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/index');
        $this->load->view('frontend/footer');
    }
    public function aboutus()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/aboutus');
        $this->load->view('frontend/footer');
    }
    public function gallery()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/gallery');
        $this->load->view('frontend/footer');
    }
    public function contactus()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/contactus');
        $this->load->view('frontend/footer');
    }
    public function privacypolicy()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/privacypolicy');
        $this->load->view('frontend/footer');
    }
    public function termsandconditions()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/termsandconditions');
        $this->load->view('frontend/footer');
    }
}