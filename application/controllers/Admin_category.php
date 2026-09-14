<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_category extends CI_Controller
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
        $data['menu_status'] = "CategoryList";

        $data['categoryList'] = $this->categorymodel->categoryList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/category/category-list', $data);
        $this->load->view('backend/footer');
    }

    public function category_list($pageStatus='')
    {
        $data['menu_status'] = "CategoryList";
        $data['activeLink'] = $pageStatus;

        $data['categoryList'] = $this->categorymodel->categoryList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/category/category-list', $data);
        $this->load->view('backend/footer');
    }

    public function category_add()
    {
        $data['menu_status'] = "CategoryList";
        $data['formTitle'] = "Add Category";
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/category/category-form', $data);
        $this->load->view('backend/footer');
    }

    public function category_edit($categoryId)
    {
        $data['menu_status'] = "CategoryList";
        $data['formTitle'] = "Edit Category";

	    $categoryDetail = $this->categorymodel->getCategoryDetail($categoryId);
        foreach ($categoryDetail as $row) {
            $data['categoryId'] = $row->id;
            $data['categoryToken'] = $row->token;
            $data['categoryDate'] = $row->category_date;
            $data['categoryName'] = $row->category_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['categoryImg'] = $row->category_img;
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/category/category-form', $data);
        $this->load->view('backend/footer');
    }

    public function category_view($categoryId)
    {
        $data['menu_status'] = "CategoryList";

	    $data['relatedProductList'] = $this->categorymodel->getRelatedProductList($categoryId);
	    $categoryDetail = $this->categorymodel->getCategoryDetail($categoryId);
        foreach ($categoryDetail as $row) {
            $data['categoryId'] = $row->id;
            $data['categoryToken'] = $row->token;
            $data['categoryDate'] = $row->category_date;
            $data['categoryName'] = $row->category_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['categoryImg'] = $row->category_img;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/category/category-view', $data);
        $this->load->view('backend/footer');
    }

    //Category Save Form //
    public function categoryFormSave()
    {
        $categoryId = $this->input->post('category_id');
        $token = $this->input->post('token');
        $categoryDate = $this->input->post('category_date');
        $categoryName = $this->input->post('category_name');
        $shortDescription = $this->input->post('short_description');
        $description = $this->input->post('description');
        $categoryPhoto = $this->input->post('category_img');
        $status = $this->input->post('status');

        $alterCategoryPhoto = $this->input->post('alter_category_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $photoUploadDir = './uploads/category_img/';

        // Category Photo
        if (isset($_FILES['category_img'])) {
            $filesArray = $_FILES['category_img'];
            $uploadedFiles['category_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }
        
        $category_img = $uploadedFiles['category_img'][0];
        
        if ($_FILES["category_img"]["name"] == FALSE) {
            $category_img = $alterCategoryPhoto;
        }

        if ($categoryId < 0 || $categoryId == '') {
            $checkExists = $this->categorymodel->checkCategory($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Category Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->categorymodel->saveCategoryData($categoryId, $token, $categoryName, $shortDescription, $description, $category_img, $status);
        
        $data["isError"] = FALSE;
        if ($categoryId > 0) {
            $data["message"] = "Category Updated";
        } else {
            $data["message"] = "Category Created";
        }

        echo json_encode($data);
        return;
    }
}