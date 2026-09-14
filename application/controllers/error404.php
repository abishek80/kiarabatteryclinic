<?php
defined('BASEPATH') or exit('No direct script access allowed');

class error404 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->output->set_status_header('404');

        $data['metaTitle'] = "404 Error | Kiara Battery Clinic";
        $data['metaDescription'] = "404 Error | Kiara Battery Clinic";
        $data['metaKeyword'] = "404 Error | Kiara Battery Clinic";

        $data['categoryList'] = $this->webmodel->categoryList();
        $contactInfo = $this->webmodel->contactInfo();
        foreach ($contactInfo as $row) {
            $data['email'] = $row->email;
            $data['mobileNumber'] = $row->mobile_number;
            $data['address'] = $row->address;
            $data['mapLink'] = $row->map_link;
            $data['whatsappLink'] = $row->whatsapp_link;
            $data['facebookLink'] = $row->facebook_link;
            $data['linkedinLink'] = $row->linkedin_link;
            $data['instagramLink'] = $row->instagram_link;
            $data['twitterLink'] = $row->twitter_link;
            $data['youtubeLink'] = $row->youtube_link;
	    }
        
        $this->load->view('header', $data);
        $this->load->view('error');
        $this->load->view('footer', $data);
    }
}
