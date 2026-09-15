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
        $data['serviceId'] = "";
        $data['serviceToken'] = "";
        $data['serviceName'] = "";
        $data['shortDescription'] = "";
        $data['description'] = "";
        $data['card1Title'] = "";
        $data['card1Description'] = "";
        $data['card2Title'] = "";
        $data['card2Description'] = "";
        $data['processSteps'] = "";
        $data['faqsList'] = array();
        $data['serviceImg'] = "";
        $data['status'] = "active";
        
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
            $data['serviceDate'] = isset($row->service_date) ? $row->service_date : '';
            $data['serviceName'] = $row->service_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['card1Title'] = isset($row->card1_title) ? $row->card1_title : '';
            $data['card1Description'] = isset($row->card1_description) ? $row->card1_description : '';
            $data['card2Title'] = isset($row->card2_title) ? $row->card2_title : '';
            $data['card2Description'] = isset($row->card2_description) ? $row->card2_description : '';
            $data['processSteps'] = isset($row->process_steps) ? $row->process_steps : '';
            $data['faqsList'] = !empty($row->faqs) ? json_decode($row->faqs, true) : array();
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
            $data['serviceDate'] = isset($row->service_date) ? $row->service_date : '';
            $data['serviceName'] = $row->service_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['card1Title'] = isset($row->card1_title) ? $row->card1_title : '';
            $data['card1Description'] = isset($row->card1_description) ? $row->card1_description : '';
            $data['card2Title'] = isset($row->card2_title) ? $row->card2_title : '';
            $data['card2Description'] = isset($row->card2_description) ? $row->card2_description : '';
            $data['processSteps'] = isset($row->process_steps) ? $row->process_steps : '';
            $data['faqsList'] = !empty($row->faqs) ? json_decode($row->faqs, true) : array();
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
        $serviceName = trim($this->input->post('service_name'));
        $shortDescription = $this->input->post('short_description');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $extraData['card1_title'] = $this->input->post('card1_title');
        $extraData['card1_description'] = $this->input->post('card1_description');
        $extraData['card2_title'] = $this->input->post('card2_title');
        $extraData['card2_description'] = $this->input->post('card2_description');
        $extraData['process_steps'] = $this->input->post('process_steps');

        // FAQs Dynamic Multi Add Processing
        $faqQuestions = $this->input->post('faq_question');
        $faqAnswers = $this->input->post('faq_answer');

        $faqsArray = array();
        if (!empty($faqQuestions) && is_array($faqQuestions)) {
            foreach ($faqQuestions as $key => $question) {
                $questionTrim = trim($question);
                $answerTrim = isset($faqAnswers[$key]) ? trim($faqAnswers[$key]) : '';
                if (!empty($questionTrim)) {
                    $faqsArray[] = array(
                        'question' => $questionTrim,
                        'answer' => $answerTrim
                    );
                }
            }
        }
        $extraData['faqs'] = !empty($faqsArray) ? json_encode($faqsArray, JSON_UNESCAPED_UNICODE) : '';

        $alterServicePhoto = $this->input->post('alter_service_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'webp', 'svg', 'gif', 'pdf');
        $photoUploadDir = './uploads/service_img/';

        $uploadedFiles = array();
        // Service Photo
        if (isset($_FILES['service_img']) && $_FILES['service_img']['name'] != '') {
            $filesArray = $_FILES['service_img'];
            $uploadedFiles['service_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
            $service_img = $uploadedFiles['service_img'][0];
        } else {
            $service_img = $alterServicePhoto;
        }

        if (empty($token)) {
            $token = strtolower(url_title($serviceName));
        }

        if ($serviceId < 0 || $serviceId == '') {
            $checkExists = $this->servicemodel->checkService($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Service Name Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->servicemodel->saveServiceData($serviceId, $token, $serviceName, $shortDescription, $description, $service_img, $status, $extraData);
        
        $data["isError"] = FALSE;
        if ($serviceId > 0) {
            $data["message"] = "Service Updated Successfully";
        } else {
            $data["message"] = "Service Created Successfully";
        }

        echo json_encode($data);
        return;
    }
}