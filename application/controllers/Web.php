<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('webmodel');
        $this->load->vars(array(
            'serviceList' => $this->webmodel->serviceList(),
            'testimonialList' => $this->webmodel->testimonialList(),
            'brandList' => $this->webmodel->brandList()
        ));
    }

    public function index()
    {
        $data['meta'] = get_seo_meta('home');
        // Legacy keys kept for backwards compatibility
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('home');

        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }

    public function about_us()
    {
        $data['meta'] = get_seo_meta('about_us');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('about');

        $this->load->view('header', $data);
        $this->load->view('aboutus', $data);
        $this->load->view('footer', $data);
    }

    public function contact_us()
    {
        $data['meta'] = get_seo_meta('contact_us');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('contact');

        $this->load->view('header', $data);
        $this->load->view('contactus', $data);
        $this->load->view('footer', $data);
    }

    public function testimonials()
    {
        $data['meta'] = get_seo_meta('testimonials');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['testimonialList'] = $this->webmodel->testimonialList();
        $data['faqList'] = $this->webmodel->getFaqsByPage('testimonial');

        $this->load->view('header', $data);
        $this->load->view('testimonials', $data);
        $this->load->view('footer', $data);
    }

    public function gallery()
    {
        $data['meta'] = get_seo_meta('gallery');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['galleryList'] = $this->webmodel->galleryList();

        $this->load->view('header', $data);
        $this->load->view('gallery', $data);
        $this->load->view('footer', $data);
    }

    public function privacy_policy()
    {
        $data['meta'] = get_seo_meta('privacy_policy');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('privacy_policy');

        $this->load->view('header', $data);
        $this->load->view('privacypolicy', $data);
        $this->load->view('footer', $data);
    }

    public function terms_and_conditions()
    {
        $data['meta'] = get_seo_meta('terms_and_conditions');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('terms_and_conditions');

        $this->load->view('header', $data);
        $this->load->view('termsandconditions', $data);
        $this->load->view('footer', $data);
    }

    public function return_policy()
    {
        $data['meta'] = get_seo_meta('return_policy');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('return_policy');

        $this->load->view('header', $data);
        $this->load->view('returnpolicy', $data);
        $this->load->view('footer', $data);
    }

    public function refund_policy()
    {
        $data['meta'] = get_seo_meta('refund_policy');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['faqList'] = $this->webmodel->getFaqsByPage('refund_policy');

        $this->load->view('header', $data);
        $this->load->view('refundpolicy', $data);
        $this->load->view('footer', $data);
    }

    public function error()
    {
        $this->output->set_status_header('404');

        $data['meta'] = get_seo_meta('home', array(
            'title' => '404 Page Not Found | Kiara Battery Clinic Coimbatore',
            'description' => 'The page you requested was not found. Contact Kiara Battery Clinic for emergency doorstep battery service in Coimbatore.',
            'robots' => 'noindex, nofollow'
        ));
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $this->load->view('header', $data);
        $this->load->view('error', $data);
        $this->load->view('footer', $data);
    }
    
    public function services()
    {
        $data['meta'] = get_seo_meta('services');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['serviceList'] = $this->webmodel->serviceList();
        $data['faqList'] = $this->webmodel->getFaqsByPage('services');

        $this->load->view('header', $data);
        $this->load->view('services', $data);
        $this->load->view('footer', $data);
    }
    
    public function service($serviceParam = '')
    {
        $data['meta'] = get_seo_meta('service_detail');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $data['serviceList'] = $this->webmodel->serviceList();

        $serviceDetail = $this->webmodel->serviceDetail($serviceParam);
        if (!empty($serviceDetail)) {
            foreach ($serviceDetail as $row) {
                $data['serviceId'] = $row->id;
                $data['serviceToken'] = $row->token;
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

                if (!empty($row->service_name)) {
                    $data['meta']['title'] = $row->service_name . " | Kiara Battery Clinic Coimbatore";
                    $data['metaTitle'] = $data['meta']['title'];
                }
            }
        }

        $this->load->view('header', $data);
        $this->load->view('service_detail', $data);
        $this->load->view('footer', $data);
    }
    
    public function category()
    {
        $data['meta'] = get_seo_meta('category');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $this->load->view('header', $data);
        $this->load->view('category', $data);
        $this->load->view('footer', $data);
    }

    public function products($categoryId = '')
    {
        $data['meta'] = get_seo_meta('products');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

        $this->load->view('header', $data);
        $this->load->view('product', $data);
        $this->load->view('footer', $data);
    }

    public function product()
    {
        $data['meta'] = get_seo_meta('product_detail');
        $data['metaTitle'] = $data['meta']['title'];
        $data['metaDescription'] = $data['meta']['description'];
        $data['metaKeyword'] = $data['meta']['keywords'];

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
            $data["message"] = "Form Submitted Successfully";
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
            $data["message"] = "Form Submitted Successfully";
        }

        echo json_encode($data);
        return;
    }
}