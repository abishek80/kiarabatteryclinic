<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_service extends CI_Controller
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

    public function index($pageStatus='')
    {
        $data['menu_status'] = "ServiceList";

        $data['serviceList'] = $this->servicemodel->serviceList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/service/service-list', $data);
        $this->load->view('backend/footer');
    }

    public function service_list($pageStatus='')
    {
        $data['menu_status'] = "ServiceList";
        $data['activeLink'] = $pageStatus;

        $data['serviceList'] = $this->servicemodel->serviceList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/service/service-list', $data);
        $this->load->view('backend/footer');
    }

    public function service_add()
    {
        $data['menu_status'] = "ServiceList";
        $data['formTitle'] = "Add Service";
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/service/service-form', $data);
        $this->load->view('backend/footer');
    }

    public function service_edit($serviceId)
    {
        $data['menu_status'] = "ServiceList";
        $data['formTitle'] = "Edit Service";

	    $serviceDetail = $this->servicemodel->getServiceDetail($serviceId);
        foreach ($serviceDetail as $row) {
            $data['serviceId'] = $row->id;
            $data['serviceToken'] = $row->token;
            $data['serviceDate'] = $row->service_date;
            $data['serviceName'] = $row->service_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['serviceImg'] = $row->service_img;
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/service/service-form', $data);
        $this->load->view('backend/footer');
    }

    public function service_view($serviceId)
    {
        $data['menu_status'] = "ServiceList";

	    $serviceDetail = $this->servicemodel->getServiceDetail($serviceId);
        foreach ($serviceDetail as $row) {
            $data['serviceId'] = $row->id;
            $data['serviceToken'] = $row->token;
            $data['serviceDate'] = $row->service_date;
            $data['serviceName'] = $row->service_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['serviceImg'] = $row->service_img;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/service/service-view', $data);
        $this->load->view('backend/footer');
    }

    //Service Save Form //
    public function serviceFormSave()
    {
        $serviceId = $this->input->post('service_id');
        $token = $this->input->post('token');
        $serviceDate = $this->input->post('service_date');
        $serviceName = $this->input->post('service_name');
        $shortDescription = $this->input->post('short_description');
        $description = $this->input->post('description');
        $servicePhoto = $this->input->post('service_img');
        $status = $this->input->post('status');

        $alterServicePhoto = $this->input->post('alter_service_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $photoUploadDir = './uploads/service_img/';

        // Service Photo
        if (isset($_FILES['service_img'])) {
            $filesArray = $_FILES['service_img'];
            $uploadedFiles['service_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }
        
        $service_img = $uploadedFiles['service_img'][0];
        
        if ($_FILES["service_img"]["name"] == FALSE) {
            $service_img = $alterServicePhoto;
        }

        if ($serviceId < 0 || $serviceId == '') {
            $checkExists = $this->servicemodel->checkService($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Service Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->servicemodel->saveServiceData($serviceId, $token, $serviceName, $shortDescription, $description, $service_img, $status);
        
        $data["isError"] = FALSE;
        if ($serviceId > 0) {
            $data["message"] = "Service Updated";
        } else {
            $data["message"] = "Service Created";
        }

        echo json_encode($data);
        return;
    }
}