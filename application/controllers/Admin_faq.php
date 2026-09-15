<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('common');
        $this->load->model('faqmodel');
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        if (($this->session->userdata('userid') == null) || ($this->session->userdata('userid') == "")) {
            redirect(base_url() . 'login');
        }

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    }

    public function index($pageStatus = '')
    {
        $this->faq_list($pageStatus);
    }

    public function faq_list($pageStatus = '')
    {
        $data['menu_status'] = "FAQList";
        $data['activeLink'] = $pageStatus;
        $pageFilter = $this->input->get('page');
        $data['pageFilter'] = $pageFilter;

        $data['faqList'] = $this->faqmodel->faqList($pageStatus, $pageFilter);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/faq/faq-list', $data);
        $this->load->view('backend/footer');
    }

    public function faq_add()
    {
        $data['menu_status'] = "FAQList";
        $data['formTitle'] = "Add FAQ";
        $data['faqId'] = "";
        $data['faqToken'] = "";
        $data['pageName'] = "home";
        $data['title'] = "";
        $data['description'] = "";
        $data['status'] = "active";

        $this->load->view('backend/header', $data);
        $this->load->view('backend/faq/faq-form', $data);
        $this->load->view('backend/footer');
    }

    public function faq_edit($faqId)
    {
        $data['menu_status'] = "FAQList";
        $data['formTitle'] = "Edit FAQ";

        $detail = $this->faqmodel->getFaqDetail($faqId);
        if (empty($detail)) {
            redirect(base_url() . 'admin/faq/faq-list');
        }

        foreach ($detail as $row) {
            $data['faqId'] = $row->id;
            $data['faqToken'] = $row->token;
            $data['pageName'] = $row->page_name;
            $data['title'] = $row->title;
            $data['description'] = $row->description;
            $data['status'] = $row->status;
        }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/faq/faq-form', $data);
        $this->load->view('backend/footer');
    }

    public function faq_view($faqId = '')
    {
        redirect(base_url() . 'admin/faq/faq-list');
    }

    // Save FAQ AJAX Form Handler
    public function faqFormSave()
    {
        $faqId = $this->input->post('faq_id');
        $token = $this->input->post('token');
        $pageName = trim($this->input->post('page_name'));
        $title = trim($this->input->post('title'));
        $description = trim($this->input->post('description'));
        $status = $this->input->post('status');

        if (empty($pageName) || empty($title) || empty($description)) {
            $data["isError"] = TRUE;
            $data["message"] = "Page Name, Title, and Description are required.";
            echo json_encode($data);
            return;
        }

        if (empty($token)) {
            $token = strtolower(url_title($pageName . '-' . $title));
        }

        $saveData = array(
            'token' => $token,
            'page_name' => $pageName,
            'title' => $title,
            'description' => $description,
            'status' => !empty($status) ? $status : 'active'
        );

        $savedId = $this->faqmodel->saveFaqData($saveData, $faqId);

        if ($savedId) {
            $data["isError"] = FALSE;
            $data["message"] = ($faqId > 0) ? "FAQ updated successfully!" : "FAQ created successfully!";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Failed to save FAQ.";
        }

        echo json_encode($data);
    }

    public function faq_delete($faqId)
    {
        $this->faqmodel->deleteFaq($faqId);
        $this->session->set_flashdata('success', 'FAQ deleted successfully!');
        redirect(base_url() . 'admin/faq/faq-list');
    }

    public function faq_status($faqId, $status)
    {
        $this->faqmodel->updateStatus($faqId, $status);
        $this->session->set_flashdata('success', 'Status updated successfully!');
        redirect(base_url() . 'admin/faq/faq-list');
    }
}
