<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function index()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $data['productList'] = $this->webmodel->productList();
        // $data['serviceList'] = $this->webmodel->serviceList();
        
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }

    public function about_us()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('aboutus');
        $this->load->view('footer', $data);
    }

    public function contact_us()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('contactus');
        $this->load->view('footer', $data);
    }

    public function testimonials()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('testimonials');
        $this->load->view('footer', $data);
    }

    public function privacy_policy()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('privacypolicy');
        $this->load->view('footer', $data);
    }

    public function terms_and_conditions()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('termsandconditions');
        $this->load->view('footer', $data);
    }

    public function return_policy()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('returnpolicy');
        $this->load->view('footer', $data);
    }

    public function refund_policy()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('refundpolicy');
        $this->load->view('footer', $data);
    }

    public function error()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        $this->load->view('header', $data);
        $this->load->view('error');
        $this->load->view('footer', $data);
    }
    
    public function services()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $data['serviceList'] = $this->webmodel->serviceList();

        $this->load->view('header', $data);
        $this->load->view('services', $data);
        $this->load->view('footer', $data);
    }
    
    public function service()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $serviceDetail = $this->webmodel->serviceDetail($serviceId);
        // foreach ($serviceDetail as $row) {
        //     $data['serviceName'] = $row->service_name;
        //     $data['shortDescription'] = $row->short_description;
        //     $data['description'] = $row->description;
        //     $data['serviceImg'] = $row->service_img;
	    // }

        $this->load->view('header', $data);
        $this->load->view('service_detail', $data);
        $this->load->view('footer', $data);
    }
    
    public function category()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $data['categoryList'] = $this->webmodel->categoryList();

        $this->load->view('header', $data);
        $this->load->view('category', $data);
        $this->load->view('footer', $data);
    }

    public function products($categoryId)
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $data['productList'] = $this->webmodel->productList($categoryId);

        // $productList = $this->webmodel->productList($categoryId);
        // foreach($productList as $row) {
        //     $data['categoryName'] = $row->category_name;
        // }

        $this->load->view('header', $data);
        $this->load->view('product', $data);
        $this->load->view('footer', $data);
    }

    public function product()
    {
        $data['metaTitle'] = "Kiara Battery Clinic";
        $data['metaDescription'] = "Kiara Battery Clinic";
        $data['metaKeyword'] = "Kiara Battery Clinic";

        // $productDetail = $this->webmodel->productDetail($productId);
        // foreach ($productDetail as $row) {
        //     $data['productName'] = $row->product_name;
        //     $data['categoryId'] = $row->category_id;
        //     $data['categoryName'] = $row->category_name;
        //     $data['mrpPrice'] = $row->mrp_price;
        //     $data['productPrice'] = $row->product_price;
        //     $data['shortDescription'] = $row->short_description;
        //     $data['description'] = $row->description;
        //     $data['productImg'] = $row->product_img;
	    // }

        $this->load->view('header', $data);
        $this->load->view('product_detail', $data);
        $this->load->view('footer', $data);
    }

    //Contact Enquiry Save Form //
    public function contactFormSave()
    {
        $contactId = $this->input->post('contact_id');
        $name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $mobileNumber = $this->input->post('mobile');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        

        if ($contactId < 0 || $contactId == '') {
            $checkExists = $this->webmodel->checkMobileNumber($mobileNumber);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Mobile Number Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->webmodel->saveContactData($contactId, $name, $email, $mobileNumber, $subject, $message);
        
        $data["isError"] = FALSE;
        if ($contactId > 0) {
            $data["message"] = "Form Updated";
        } else {
            $data["message"] = "Form Submitted Successfull";
        }

        echo json_encode($data);
        return;
    }

    //Product Enquiry Save Form //
    public function productEnquiryFormSave()
    {
        $productEnquiryId = $this->input->post('productEnquiry_id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobileNumber = $this->input->post('mobile_number');
        $productName = $this->input->post('product_name');
        $quantity = $this->input->post('quantity');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        $this->webmodel->saveProductEnquiryData($productEnquiryId, $name, $email, $mobileNumber, $productName, $quantity, $subject, $message);
        
        $data["isError"] = FALSE;
        if ($productEnquiryId > 0) {
            $data["message"] = "Form Updated";
        } else {
            $data["message"] = "Form Submitted Successfull";
        }

        echo json_encode($data);
        return;
    }
}