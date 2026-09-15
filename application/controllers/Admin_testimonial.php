<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_testimonial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('common');
        $this->load->model('testimonialmodel');
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
        $this->testimonial_list($pageStatus);
    }

    public function testimonial_list($pageStatus = '')
    {
        $data['menu_status'] = "TestimonialList";
        $data['activeLink'] = $pageStatus;
        $data['testimonialList'] = $this->testimonialmodel->testimonialList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/testimonial/testimonial-list', $data);
        $this->load->view('backend/footer');
    }

    public function testimonial_add()
    {
        $data['menu_status'] = "TestimonialList";
        $data['formTitle'] = "Add Testimonial";
        $data['testimonialId'] = "";
        $data['testimonialToken'] = "";
        $data['title'] = "";
        $data['description'] = "";
        $data['reviewerName'] = "";
        $data['location'] = "";
        $data['reviewDate'] = date('Y-m-d');
        $data['star'] = 5;
        $data['reviewerImg'] = "";
        $data['status'] = "active";

        $this->load->view('backend/header', $data);
        $this->load->view('backend/testimonial/testimonial-form', $data);
        $this->load->view('backend/footer');
    }

    public function testimonial_edit($testimonialId)
    {
        $data['menu_status'] = "TestimonialList";
        $data['formTitle'] = "Edit Testimonial";

        $detail = $this->testimonialmodel->getTestimonialDetail($testimonialId);
        if (empty($detail)) {
            redirect(base_url() . 'admin/testimonial/testimonial-list');
        }

        foreach ($detail as $row) {
            $data['testimonialId'] = $row->id;
            $data['testimonialToken'] = $row->token;
            $data['title'] = $row->title;
            $data['description'] = $row->description;
            $data['reviewerName'] = $row->reviewer_name;
            $data['location'] = $row->location;
            $data['reviewDate'] = !empty($row->review_date) ? $row->review_date : date('Y-m-d');
            $data['star'] = isset($row->star) ? $row->star : 5;
            $data['reviewerImg'] = $row->reviewer_img;
            $data['status'] = $row->status;
        }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/testimonial/testimonial-form', $data);
        $this->load->view('backend/footer');
    }

    public function testimonial_view($testimonialId = '')
    {
        redirect(base_url() . 'admin/testimonial/testimonial-list');
    }

    // Save Testimonial AJAX Form Handler
    public function testimonialFormSave()
    {
        $testimonialId = $this->input->post('testimonial_id');
        $token = $this->input->post('token');
        $title = trim($this->input->post('title'));
        $description = trim($this->input->post('description'));
        $reviewerName = trim($this->input->post('reviewer_name'));
        $location = trim($this->input->post('location'));
        $reviewDate = $this->input->post('review_date');
        $star = (int) $this->input->post('star');
        $status = $this->input->post('status');
        $alterImg = $this->input->post('alter_reviewer_img');

        if (empty($title) || empty($reviewerName)) {
            $data["isError"] = TRUE;
            $data["message"] = "Title and Reviewer Name are required.";
            echo json_encode($data);
            return;
        }

        if (empty($token)) {
            $token = strtolower(url_title($title . '-' . $reviewerName));
        }

        // Handle Image Upload if provided
        $allowTypes = array('jpg', 'png', 'jpeg', 'webp', 'gif', 'svg');
        $uploadDir = './uploads/testimonials/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['reviewer_img']) && $_FILES['reviewer_img']['name'] != '') {
            $filesArray = $_FILES['reviewer_img'];
            $uploadedFiles = $this->common->fileUpload($filesArray, $uploadDir, $allowTypes);
            $reviewerImg = isset($uploadedFiles[0]) ? $uploadedFiles[0] : '';
        } else {
            $reviewerImg = $alterImg;
        }

        $saveData = array(
            'token' => $token,
            'title' => $title,
            'description' => $description,
            'reviewer_name' => $reviewerName,
            'location' => $location,
            'review_date' => !empty($reviewDate) ? $reviewDate : date('Y-m-d'),
            'star' => ($star >= 1 && $star <= 5) ? $star : 5,
            'reviewer_img' => $reviewerImg,
            'status' => !empty($status) ? $status : 'active'
        );

        $savedId = $this->testimonialmodel->saveTestimonialData($saveData, $testimonialId);

        if ($savedId) {
            $data["isError"] = FALSE;
            $data["message"] = ($testimonialId > 0) ? "Testimonial updated successfully!" : "Testimonial created successfully!";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Failed to save testimonial.";
        }

        echo json_encode($data);
    }

    public function testimonial_delete($testimonialId)
    {
        $this->testimonialmodel->deleteTestimonial($testimonialId);
        $this->session->set_flashdata('success', 'Testimonial deleted successfully!');
        redirect(base_url() . 'admin/testimonial/testimonial-list');
    }

    public function testimonial_status($testimonialId, $status)
    {
        $this->testimonialmodel->updateStatus($testimonialId, $status);
        $this->session->set_flashdata('success', 'Status updated successfully!');
        redirect(base_url() . 'admin/testimonial/testimonial-list');
    }
}
