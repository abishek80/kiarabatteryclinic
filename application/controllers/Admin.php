<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['menu_status'] = "dashboard";
        
        $data['vendorList'] = $this->vendormodel->vendorList('active');
        $data['invoiceList'] = $this->invoicemodel->invoiceList('active');
        $data['productEnquiryList'] = $this->enquirymodel->getProductEnquiryList();
        $data['contactEnquiryList'] = $this->enquirymodel->getContactEnquiryList();
        $data['categoryList'] = $this->categorymodel->categoryList('active');
        $data['productList'] = $this->productmodel->productList('active');
        $data['serviceList'] = $this->servicemodel->serviceList('active');
        $data['blogList'] = $this->blogmodel->blogList('active');
        $data['galleryList'] = $this->gallerymodel->galleryList('active');

        $this->load->view('backend/header', $data);
        $this->load->view('backend/dashboard', $data);
        $this->load->view('backend/footer');
    }

    public function change_password()
    {
        $data['menu_status'] = "ChangePassword";
        $this->load->view('backend/header', $data);
        $this->load->view('backend/settings/change_password');
        $this->load->view('backend/footer');
    }
    
    public function changePassword()
    {
        $oldPassword   = $this->input->post('old_password');
        $newPassword   = $this->input->post('new_password');

        if($oldPassword != $newPassword){
            $this->adminmodel->passwordUpdate($newPassword);
            $data["isError"] = FALSE;
            $data["message"] = "Password Updated";
        }else{
            $data["isError"] = TRUE;
            $data["message"] = "Old and New Password Same";
        }
        echo json_encode($data);
        return;
    }
    
    public function logout()
    {
        $userData = array();
        $this->session->set_userdata($userData);
        $this->session->sess_destroy();
        $this->load->helper('cookie');
        delete_cookie('ci_spacemanagement');
        redirect(base_url() . 'login');
    }

    // Record Delete
    public function deleteRecord()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");

        $this->adminmodel->deleteRecord($recordId, $tableName);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }
    
    // Change Status
    public function changeStatus()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");
        $statusValue = $this->input->post("statusValue");

        $this->adminmodel->tableChangeStatus($recordId, $tableName, $statusValue);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Status Changed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Status Not Changed";
        }

        echo json_encode($data);
    }
}