<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquirymodel extends CI_Model
{
    //Contact Enquiry List
    public function getContactEnquiryList()
    {
        $sql = "SELECT * FROM contact_enquiry WHERE delete_status=0 ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Product Enquiry List
    public function getProductEnquiryList()
    {
        $sql = "SELECT * FROM product_enquiry WHERE delete_status=0 ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }
}
?>