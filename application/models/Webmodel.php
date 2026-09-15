<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webmodel extends CI_Model
{
    //Contact Info
    public function contactInfo()
    {
        $sql = "SELECT * FROM general_info";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //seo Info
    public function seoInfo()
    {
        $sql = "SELECT * FROM seo";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Service List
    public function serviceList()
    {
        $sql = "SELECT * FROM service WHERE delete_status=0 AND status='active' ORDER BY id ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Service Detail
    public function serviceDetail($serviceParam = '')
    {
        $where = '';
        if (!empty($serviceParam)) {
            if (is_numeric($serviceParam)) {
                $where = "AND id = " . (int)$serviceParam;
            } else {
                $tokenEscaped = $this->db->escape_str($serviceParam);
                $where = "AND (token = '$tokenEscaped' OR service_name = '$tokenEscaped')";
            }
        }

        $sql = "SELECT * FROM service WHERE delete_status=0 AND status='active' $where ORDER BY id ASC LIMIT 1";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Category List
    public function categoryList()
    {
        $sql = "SELECT * FROM category WHERE delete_status=0 AND status='active' ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Gallery List
    public function galleryList()
    {
        $sql = "SELECT * FROM gallery WHERE delete_status=0 AND status='active' ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Testimonial List
    public function testimonialList()
    {
        $sql = "SELECT * FROM testimonial WHERE delete_status=0 AND status='active' ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Brand List
    public function brandList()
    {
        $sql = "SELECT * FROM brand WHERE delete_status=0 AND status='active' ORDER BY id ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Get Page Specific FAQs
    public function getFaqsByPage($pageName)
    {
        $pageNameEsc = $this->db->escape_str($pageName);
        $sql = "SELECT * FROM faq WHERE delete_status=0 AND status='active' AND page_name='$pageNameEsc' ORDER BY id ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Product List
    public function productList($categoryId = '')
    {
        if($categoryId){
            $where = "AND P.category_id = $categoryId";
        } else {
            $where = '';
        }

        $sql = "SELECT P.*, C.category_name FROM product P LEFT JOIN category C ON C.id = P.category_id WHERE P.delete_status=0 AND P.status='active' $where ORDER BY P.id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Related Product List
    public function relatedProductList($productId)
    {
        if($productId){
            $where = "AND category_id = $productId";
        } else {
            $where = '';
        }

        $sql = "SELECT * FROM product WHERE delete_status=0 AND status='active' $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Product Detail
    public function productDetail($productId)
    {
        if($productId){
            $where = "AND P.id = $productId";
        } else {
            $where = '';
        }

        $sql = "SELECT P.*, C.category_name FROM product P LEFT JOIN category C ON C.id = P.category_id WHERE P.delete_status=0 AND P.status='active' $where ORDER BY P.id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Mobile Number
    public function checkMobileNumber($mobileNumber)
    {
        $sql = "SELECT * FROM contact_enquiry WHERE mobile_number='" . $mobileNumber . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Contact Enquiry Form
    public function saveContactData($contactId, $name, $email, $mobileNumber, $subject, $message)
    {
        if ($contactId > 0) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'subject' => $subject,
                'message' => $message
            );
            $this->db->where('id', (int) $contactId);
            $this->db->update('contact_enquiry', $data);
        } else {
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'subject' => $subject,
                'message' => $message,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('contact_enquiry', $data);
            $this->db->insert_id();
        }
    }

    //Save Product Enquiry Form
    public function saveProductEnquiryData($productEnquiryId, $name, $email, $mobileNumber, $productName, $quantity, $subject, $message)
    {
        if ($productEnquiryId > 0) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'product_name' => $productName,
                'quantity' => $quantity,
                'subject' => $subject,
                'message' => $message
            );
            $this->db->where('id', (int) $productEnquiryId);
            $this->db->update('product_enquiry', $data);
        } else {
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'product_name' => $productName,
                'quantity' => $quantity,
                'subject' => $subject,
                'message' => $message,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('product_enquiry', $data);
            $this->db->insert_id();
        }
    }
}
?>