<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_blog extends CI_Controller
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
        $data['menu_status'] = "BlogList";

        $data['blogList'] = $this->blogmodel->blogList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/blog/blog-list', $data);
        $this->load->view('backend/footer');
    }

    public function blog_list($pageStatus='')
    {
        $data['menu_status'] = "BlogList";
        $data['activeLink'] = $pageStatus;

        $data['blogList'] = $this->blogmodel->blogList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/blog/blog-list', $data);
        $this->load->view('backend/footer');
    }

    public function blog_add()
    {
        $data['menu_status'] = "BlogList";
        $data['formTitle'] = "Add Blog";
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/blog/blog-form', $data);
        $this->load->view('backend/footer');
    }

    public function blog_edit($blogId)
    {
        $data['menu_status'] = "BlogList";
        $data['formTitle'] = "Edit Blog";

	    $blogDetail = $this->blogmodel->getBlogDetail($blogId);
        foreach ($blogDetail as $row) {
            $data['blogId'] = $row->id;
            $data['blogToken'] = $row->token;
            $data['blogDate'] = $row->blog_date;
            $data['blogName'] = $row->blog_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['blogImg'] = $row->blog_img;
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/blog/blog-form', $data);
        $this->load->view('backend/footer');
    }

    public function blog_view($blogId)
    {
        $data['menu_status'] = "BlogList";

	    $blogDetail = $this->blogmodel->getBlogDetail($blogId);
        foreach ($blogDetail as $row) {
            $data['blogId'] = $row->id;
            $data['blogToken'] = $row->token;
            $data['blogDate'] = $row->blog_date;
            $data['blogName'] = $row->blog_name;
            $data['shortDescription'] = $row->short_description;
            $data['description'] = $row->description;
            $data['blogImg'] = $row->blog_img;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/blog/blog-view', $data);
        $this->load->view('backend/footer');
    }

    //Blog Save Form //
    public function blogFormSave()
    {
        $blogId = $this->input->post('blog_id');
        $token = $this->input->post('token');
        $blogDate = $this->input->post('blog_date');
        $blogName = $this->input->post('blog_name');
        $shortDescription = $this->input->post('short_description');
        $description = $this->input->post('description');
        $blogPhoto = $this->input->post('blog_img');
        $status = $this->input->post('status');

        $alterBlogPhoto = $this->input->post('alter_blog_img');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $photoUploadDir = './uploads/blog_img/';

        // Blog Photo
        if (isset($_FILES['blog_img'])) {
            $filesArray = $_FILES['blog_img'];
            $uploadedFiles['blog_img'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }
        
        $blog_img = $uploadedFiles['blog_img'][0];
        
        if ($_FILES["blog_img"]["name"] == FALSE) {
            $blog_img = $alterBlogPhoto;
        }

        if ($blogId < 0 || $blogId == '') {
            $checkExists = $this->blogmodel->checkBlog($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Blog Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->blogmodel->saveBlogData($blogId, $token, $blogDate, $blogName, $shortDescription, $description, $blog_img, $status);
        
        $data["isError"] = FALSE;
        if ($blogId > 0) {
            $data["message"] = "Blog Updated";
        } else {
            $data["message"] = "Blog Created";
        }

        echo json_encode($data);
        return;
    }
}