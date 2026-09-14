<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_settings extends CI_Controller
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
        $data['menu_open'] = "Settings";
        $data['menu_status'] = "GeneralInformation";

	    $generalInfoDetail = $this->settingsmodel->getGeneralInfoDetail($generalInfoId);
        foreach ($generalInfoDetail as $row) {
            $data['generalInfoId'] = $row->id;
            $data['companyName'] = $row->company_name;
            $data['gstNumber'] = $row->gst_number;
            $data['email'] = $row->email;
            $data['mobileNumber'] = $row->mobile_number;
            $data['phoneNumber'] = $row->phone_number;
            $data['address'] = $row->address;
            $data['mapLink'] = $row->map_link;
            $data['bankName'] = $row->bank_name;
            $data['accountNumber'] = $row->account_number;
            $data['branchName'] = $row->branch_name;
            $data['ifscCode'] = $row->ifsc_code;
            $data['declarationNote'] = $row->declaration_note;
            $data['iframeLink'] = $row->iframe_link;
            $data['whatsappNumber'] = $row->whatsapp_number;
            $data['whatsappLink'] = $row->whatsapp_link;
            $data['facebookLink'] = $row->facebook_link;
            $data['instagramLink'] = $row->instagram_link;
            $data['youtubeLink'] = $row->youtube_link;
            $data['twitterLink'] = $row->twitter_link;
            $data['linkedinLink'] = $row->linkedin_link;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/settings/general-information', $data);
        $this->load->view('backend/footer');
    }

    public function general_information($generalInfoId='')
    {
        $data['menu_open'] = "Settings";
        $data['menu_status'] = "GeneralInformation";

	    $generalInfoDetail = $this->settingsmodel->getGeneralInfoDetail($generalInfoId);
        foreach ($generalInfoDetail as $row) {
            $data['generalInfoId'] = $row->id;
            $data['companyName'] = $row->company_name;
            $data['gstNumber'] = $row->gst_number;
            $data['email'] = $row->email;
            $data['mobileNumber'] = $row->mobile_number;
            $data['phoneNumber'] = $row->phone_number;
            $data['address'] = $row->address;
            $data['mapLink'] = $row->map_link;
            $data['bankName'] = $row->bank_name;
            $data['accountNumber'] = $row->account_number;
            $data['branchName'] = $row->branch_name;
            $data['ifscCode'] = $row->ifsc_code;
            $data['declarationNote'] = $row->declaration_note;
            $data['iframeLink'] = $row->iframe_link;
            $data['whatsappNumber'] = $row->whatsapp_number;
            $data['whatsappLink'] = $row->whatsapp_link;
            $data['facebookLink'] = $row->facebook_link;
            $data['instagramLink'] = $row->instagram_link;
            $data['youtubeLink'] = $row->youtube_link;
            $data['twitterLink'] = $row->twitter_link;
            $data['linkedinLink'] = $row->linkedin_link;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/settings/general-information', $data);
        $this->load->view('backend/footer');
    }

    public function seo_settings($seoId='')
    {
        $data['menu_open'] = "Settings";
        $data['menu_status'] = "SEOSettings";

	    $seoDetail = $this->settingsmodel->getSEODetail($seoId);
        foreach ($seoDetail as $row) {
            $data['seoId'] = $row->id;
            $data['headerLink'] = $row->header_link;
            $data['bodyLink'] = $row->body_link;
            $data['footerLink'] = $row->footer_link;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/settings/seo-settings', $data);
        $this->load->view('backend/footer');
    }

    //SEO Save Form //
    public function seoFormSave()
    {
        $seoId = $this->input->post('seo_id');
        $headerLink = $this->input->post('header_link');
        $bodyLink = $this->input->post('body_link');
        $footerLink = $this->input->post('footer_link');

        $this->settingsmodel->saveSEOData($seoId, $headerLink, $bodyLink, $footerLink);
        
        $data["isError"] = FALSE;
        if ($seoId > 0) {
            $data["message"] = "SEO Settings Updated";
        } else {
            $data["message"] = "SEO Settings Saved";
        }

        echo json_encode($data);
        return;
    }
    
    //General Information Save Form //
    public function generalInfoFormSave()
    {
        $generalInfoId = $this->input->post('generalInfo_id');
        $companyName = $this->input->post('company_name');
        $gstNumber = $this->input->post('gst_number');
        $email = $this->input->post('email');
        $mobileNumber = $this->input->post('mobile_number');
        $phoneNumber = $this->input->post('phone_number');
        $address = $this->input->post('address');
        $mapLink = $this->input->post('map_link');
        $iframeLink = $this->input->post('iframe_link');
        $bankName = $this->input->post('bank_name');
        $accountNumber = $this->input->post('account_number');
        $branchName = $this->input->post('branch_name');
        $ifscCode = $this->input->post('ifsc_code');
        $declarationNote = $this->input->post('declaration_note');
        $whatsappNumber = $this->input->post('whatsapp_number');
        $whatsappLink = $this->input->post('whatsapp_link');
        $facebookLink = $this->input->post('facebook_link');
        $instagramLink = $this->input->post('instagram_link');
        $youtubeLink = $this->input->post('youtube_link');
        $twitterLink = $this->input->post('twitter_link');
        $linkedinLink = $this->input->post('linkedin_link');
        
        $this->settingsmodel->saveGeneralInfoData($generalInfoId, $companyName, $gstNumber, $email, $mobileNumber, $phoneNumber, $address, $mapLink, $iframeLink, $bankName, $accountNumber, $branchName, $ifscCode, $declarationNote, $whatsappNumber, $whatsappLink, $facebookLink, $instagramLink, $youtubeLink, $twitterLink, $linkedinLink);
        
        $data["isError"] = FALSE;
        if ($generalInfoId > 0) {
            $data["message"] = "General Information Updated";
        } else {
            $data["message"] = "General Information Saved";
        }

        echo json_encode($data);
        return;
    }
}