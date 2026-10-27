<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_gallery extends CI_Controller
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
        $data['menu_status'] = "GalleryList";

        $data['galleryList'] = $this->gallerymodel->galleryList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/gallery/gallery-list', $data);
        $this->load->view('backend/footer');
    }

    public function gallery_list($pageStatus='')
    {
        $data['menu_status'] = "GalleryList";
        $data['activeLink'] = $pageStatus;

        $data['galleryList'] = $this->gallerymodel->galleryList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/gallery/gallery-list', $data);
        $this->load->view('backend/footer');
    }

    public function gallery_add()
    {
        $data['menu_status'] = "GalleryList";
        $data['formTitle'] = "Add Gallery";
        $data['galleryId'] = '';
        $data['galleryToken'] = '';
        $data['galleryDate'] = '';
        $data['galleryName'] = '';
        $data['description'] = '';
        $data['galleryImg'] = '';
        $data['galleryImgs'] = array();
        $data['status'] = 'active';
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/gallery/gallery-form', $data);
        $this->load->view('backend/footer');
    }

    public function gallery_edit($galleryId)
    {
        $data['menu_status'] = "GalleryList";
        $data['formTitle'] = "Edit Gallery";

	    $galleryDetail = $this->gallerymodel->getGalleryDetail($galleryId);
        foreach ($galleryDetail as $row) {
            $data['galleryId'] = $row->id;
            $data['galleryToken'] = $row->token;
            $data['galleryDate'] = $row->gallery_date;
            $data['galleryName'] = $row->gallery_name;
            $data['description'] = $row->description;
            $data['galleryImg'] = $row->gallery_img;
            $data['galleryImgs'] = Gallerymodel::parseImages($row->gallery_img);
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/gallery/gallery-form', $data);
        $this->load->view('backend/footer');
    }

    public function gallery_view($galleryId = '')
    {
        redirect(base_url() . 'admin/gallery/gallery-list');
    }

    //Gallery Save Form //
    public function galleryFormSave()
    {
        $galleryId = $this->input->post('gallery_id');
        $token = $this->input->post('token');
        $galleryDate = $this->input->post('gallery_date');
        $galleryName = $this->input->post('gallery_name');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $retainedImages = $this->input->post('retained_images');
        if (!is_array($retainedImages)) {
            $retainedImages = (!empty($retainedImages)) ? array($retainedImages) : array();
        }

        // Support fallback if alter_gallery_img is sent
        $alterGalleryPhoto = $this->input->post('alter_gallery_img');
        if (empty($retainedImages) && !empty($alterGalleryPhoto)) {
            $retainedImages = Gallerymodel::parseImages($alterGalleryPhoto);
        }
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
        $photoUploadDir = './uploads/gallery_img/';

        $uploadedImages = array();
        // Gallery Photos (Multi-Upload)
        if (isset($_FILES['gallery_img']) && !empty($_FILES['gallery_img']['name'])) {
            $uploadedImages = $this->common->multiFileUpload($_FILES['gallery_img'], $photoUploadDir, $allowTypes);
        }

        $allImages = array_values(array_filter(array_merge($retainedImages, $uploadedImages)));

        if (empty($allImages)) {
            $data["isError"] = TRUE;
            $data["message"] = "Please select at least one gallery image.";
            echo json_encode($data);
            return;
        }

        if ($galleryId < 0 || $galleryId == '') {
            $checkExists = $this->gallerymodel->checkGallery($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Gallery Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        // Store as JSON array string
        $gallery_img_val = json_encode($allImages);
        
        $this->gallerymodel->saveGalleryData($galleryId, $token, $galleryName, $description, $gallery_img_val, $status);
        
        $data["isError"] = FALSE;
        if ($galleryId > 0) {
            $data["message"] = "Gallery Updated";
        } else {
            $data["message"] = "Gallery Created";
        }

        echo json_encode($data);
        return;
    }
}