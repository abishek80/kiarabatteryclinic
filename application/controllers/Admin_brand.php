<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_brand extends CI_Controller
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
        $data['menu_status'] = "BrandList";
        $data['activeLink'] = $pageStatus;

        $data['brandList'] = $this->brandmodel->brandList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/brand/brand-list', $data);
        $this->load->view('backend/footer');
    }

    public function brand_list($pageStatus='')
    {
        $data['menu_status'] = "BrandList";
        $data['activeLink'] = $pageStatus;

        $data['brandList'] = $this->brandmodel->brandList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/brand/brand-list', $data);
        $this->load->view('backend/footer');
    }

    public function brand_add()
    {
        $data['menu_status'] = "BrandList";
        $data['formTitle'] = "Add Brand";
        $data['brandId'] = "";
        $data['brandToken'] = "";
        $data['brandName'] = "";
        $data['brandImg'] = "";
        $data['status'] = "active";
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/brand/brand-form', $data);
        $this->load->view('backend/footer');
    }

    public function brand_edit($brandId)
    {
        $data['menu_status'] = "BrandList";
        $data['formTitle'] = "Edit Brand";

        $brandDetail = $this->brandmodel->getBrandDetail($brandId);
        foreach ($brandDetail as $row) {
            $data['brandId'] = $row->id;
            $data['brandToken'] = $row->token;
            $data['brandName'] = $row->brand_name;
            $data['brandImg'] = $row->brand_img;
            $data['status'] = $row->status;
        }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/brand/brand-form', $data);
        $this->load->view('backend/footer');
    }

    public function brand_view($brandId)
    {
        $data['menu_status'] = "BrandList";

        $brandDetail = $this->brandmodel->getBrandDetail($brandId);
        foreach ($brandDetail as $row) {
            $data['brandId'] = $row->id;
            $data['brandToken'] = $row->token;
            $data['brandName'] = $row->brand_name;
            $data['brandImg'] = $row->brand_img;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
        }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/brand/brand-view', $data);
        $this->load->view('backend/footer');
    }

    // Brand Save Form AJAX Handler
    public function brandFormSave()
    {
        $brandId = $this->input->post('brand_id');
        $token = $this->input->post('token');
        $brandName = trim($this->input->post('brand_name'));
        $status = $this->input->post('status');

        $alterBrandImg = $this->input->post('alter_brand_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'webp', 'svg', 'gif');
        $photoUploadDir = './uploads/brand_img/';

        $uploadedFiles = array();
        // Brand Image Upload
        if (isset($_FILES['brand_img']) && $_FILES['brand_img']['name'] != '') {
            $filesArray = $_FILES['brand_img'];
            $uploadedFiles['brand_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
            $brand_img = $uploadedFiles['brand_img'][0];
        } else {
            $brand_img = $alterBrandImg;
        }

        if (empty($token)) {
            $token = strtolower(url_title($brandName));
        }

        if ($brandId < 0 || $brandId == '') {
            $checkExists = $this->brandmodel->checkBrand($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Brand Name Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->brandmodel->saveBrandData($brandId, $token, $brandName, $brand_img, $status);
        
        $data["isError"] = FALSE;
        if ($brandId > 0) {
            $data["message"] = "Brand Updated Successfully";
        } else {
            $data["message"] = "Brand Created Successfully";
        }

        echo json_encode($data);
        return;
    }
}
