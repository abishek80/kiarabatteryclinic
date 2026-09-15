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
        $galleryPhoto = $this->input->post('gallery_img');
        $status = $this->input->post('status');

        $alterGalleryPhoto = $this->input->post('alter_gallery_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $photoUploadDir = './uploads/gallery_img/';

        // Gallery Photo
        if (isset($_FILES['gallery_img'])) {
            $filesArray = $_FILES['gallery_img'];
            $uploadedFiles['gallery_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }
        
        $gallery_img = $uploadedFiles['gallery_img'][0];
        
        if ($_FILES["gallery_img"]["name"] == FALSE) {
            $gallery_img = $alterGalleryPhoto;
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
        
        $this->gallerymodel->saveGalleryData($galleryId, $token, $galleryName, $description, $gallery_img, $status);
        
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