<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_product extends CI_Controller
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
        $data['menu_status'] = "ProductList";

        $data['productList'] = $this->productmodel->productList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/product/product-list', $data);
        $this->load->view('backend/footer');
    }

    public function product_list($pageStatus='')
    {
        $data['menu_status'] = "ProductList";
        $data['activeLink'] = $pageStatus;

        $data['productList'] = $this->productmodel->productList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/product/product-list', $data);
        $this->load->view('backend/footer');
    }

    public function product_add()
    {
        $data['menu_status'] = "ProductList";
        $data['formTitle'] = "Add Product";
        
	    $data['categoryDropdown'] = $this->productmodel->getCategoryDropdown();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/product/product-form', $data);
        $this->load->view('backend/footer');
    }

    public function product_edit($productId)
    {
        $data['menu_status'] = "ProductList";
        $data['formTitle'] = "Edit Product";

	    $data['categoryDropdown'] = $this->productmodel->getCategoryDropdown();
	    $productDetail = $this->productmodel->getProductDetail($productId);
        foreach ($productDetail as $row) {
            $data['productId'] = $row->id;
            $data['productToken'] = $row->token;
            $data['categoryId'] = $row->category_id;
            $data['productName'] = $row->product_name;
            $data['mrpPrice'] = $row->mrp_price;
            $data['productPrice'] = $row->product_price;
            $data['hsnNumber'] = $row->hsn_number;
            $data['perValue'] = $row->per_value;
            $data['cgstPercentage'] = $row->cgst_percentage;
            $data['sgstPercentage'] = $row->sgst_percentage;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['productImg'] = $row->product_img;
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/product/product-form', $data);
        $this->load->view('backend/footer');
    }
    
    public function selectProductDropdown()
    {
        $categoryId 	= $this->input->post('categoryId');
        $data 	= $this->productmodel->getProductDropdown($categoryId);
        echo json_encode($data); 
    }
    
    public function getProductNameList()
    {
      $productName = $this->input->post('product_name');
      $data = $this->productmodel->getProductName($productName);
      echo json_encode($data);
    }

    public function product_view($productId)
    {
        $data['menu_status'] = "ProductList";

	    $data['productEnquiryList'] = $this->productmodel->getProductEnquiryList($productId);
        
	    $productDetail = $this->productmodel->getProductDetail($productId);
        foreach ($productDetail as $row) {
            $data['productId'] = $row->id;
            $data['productToken'] = $row->token;
            $data['categoryName'] = $row->category_name;
            $data['productName'] = $row->product_name;
            $data['mrpPrice'] = $row->mrp_price;
            $data['productPrice'] = $row->product_price;
            $data['hsnNumber'] = $row->hsn_number;
            $data['perValue'] = $row->per_value;
            $data['cgstPercentage'] = $row->cgst_percentage;
            $data['sgstPercentage'] = $row->sgst_percentage;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['productImg'] = $row->product_img;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
            $data['updatedAt'] = $row->updated_at;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/product/product-view', $data);
        $this->load->view('backend/footer');
    }

    //Product Save Form //
    public function productFormSave()
    {
        $productId = $this->input->post('product_id');
        $token = $this->input->post('token');
        $categoryId = $this->input->post('category_id');
        $productName = $this->input->post('product_name');
        $mrpPrice = $this->input->post('mrp_price');
        $productPrice = $this->input->post('product_price');
        $hsnNumber = $this->input->post('hsn_number');
        $perValue = $this->input->post('per_value');
        $cgstPercentage = $this->input->post('cgst_percentage');
        $sgstPercentage = $this->input->post('sgst_percentage');
        $shortDescription = $this->input->post('short_description');
        $description = $this->input->post('description');
        $productPhoto = $this->input->post('product_img');
        $status = $this->input->post('status');

        $alterProductPhoto = $this->input->post('alter_product_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $photoUploadDir = './uploads/product_img/';

        // Product Photo
        if (isset($_FILES['product_img'])) {
            $filesArray = $_FILES['product_img'];
            $uploadedFiles['product_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }
        
        $product_img = $uploadedFiles['product_img'][0];
        
        if ($_FILES["product_img"]["name"] == FALSE) {
            $product_img = $alterProductPhoto;
        }

        if ($productId < 0 || $productId == '') {
            $checkExists = $this->productmodel->checkProduct($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Product Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->productmodel->saveProductData($productId, $token, $categoryId, $productName, $mrpPrice, $productPrice, $hsnNumber, $perValue, $cgstPercentage, $sgstPercentage, $shortDescription, $description, $product_img, $status);
        
        $data["isError"] = FALSE;
        if ($productId > 0) {
            $data["message"] = "Product Updated";
        } else {
            $data["message"] = "Product Created";
        }

        echo json_encode($data);
        return;
    }
}