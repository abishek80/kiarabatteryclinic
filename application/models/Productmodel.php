<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productmodel extends CI_Model
{
    //Category Dropdown
    public function getCategoryDropdown()
    {
        $sql = "SELECT * FROM category WHERE delete_status=0 AND status='active' ORDER BY category_name ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Product Dropdown
    public function getProductDropdown($categoryId = '')
    {
        if($categoryId) {
            $where = " AND category_id = $categoryId";
        }
        $sql = "SELECT * FROM product WHERE delete_status=0 $where AND status='active'";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Get Product Name
    public function getProductName($productName)
    {
        $this->db->select('id as product_id, product_name as value, hsn_number, per_value, product_price, cgst_percentage, sgst_percentage');
        $this->db->like('product_name', $productName);
        $this->db->order_by('product_name ASC');
        $query = $this->db->get('product');
        return $query->result_array();
    }

    //Product List
    public function productList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND P.status = '$pageStatus'";
        }

        $sql = "SELECT P.*, C.category_name FROM product P LEFT JOIN category C ON C.id = P.category_id WHERE P.delete_status=0 $where ORDER BY P.id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Product Detail
    public function getProductDetail($productId)
    {
        $sql = "SELECT P.*, C.category_name FROM product P LEFT JOIN category C ON C.id = P.category_id WHERE P.delete_status=0 AND P.id = $productId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Product Enquiry List
    public function getProductEnquiryList($productId)
    {
        $sql = "SELECT * FROM product_enquiry WHERE id = $productId AND delete_status=0";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Product
    public function checkProduct($token)
    {
        $sql = "SELECT * FROM product WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Product Form
    public function saveProductData($productId, $token, $categoryId, $productName, $mrpPrice, $productPrice, $hsnNumber, $perValue, $cgstPercentage, $sgstPercentage, $shortDescription, $description, $product_img, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($productId > 0) {
            $data = array(
                'category_id' => $categoryId,
                'product_name' => $productName,
                'mrp_price' => $mrpPrice,
                'product_price' => $productPrice,
                'hsn_number' => $hsnNumber,
                'per_value' => $perValue,
                'cgst_percentage' => $cgstPercentage,
                'sgst_percentage' => $sgstPercentage,
                'short_description' => $shortDescription,
                'description' => $description,
                'product_img' => $product_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $productId);
            $this->db->update('product', $data);
        } else {
            $data = array(
                'token' => $token,
                'category_id' => $categoryId,
                'product_name' => $productName,
                'mrp_price' => $mrpPrice,
                'product_price' => $productPrice,
                'hsn_number' => $hsnNumber,
                'per_value' => $perValue,
                'cgst_percentage' => $cgstPercentage,
                'sgst_percentage' => $sgstPercentage,
                'short_description' => $shortDescription,
                'description' => $description,
                'product_img' => $product_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('product', $data);
            $this->db->insert_id();
        }
    }
}
?>