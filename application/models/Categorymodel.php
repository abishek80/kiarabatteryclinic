<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorymodel extends CI_Model
{
    //Category List
    public function categoryList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        }

        $sql = "SELECT * FROM category WHERE delete_status=0 $where ORDER BY category_name ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Category Detail
    public function getCategoryDetail($categoryId)
    {
        $sql = "SELECT * FROM category WHERE delete_status=0 AND id = $categoryId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Related Product List Detail
    public function getRelatedProductList($categoryId)
    {
        $sql = "SELECT * FROM product WHERE category_id = $categoryId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Category
    public function checkCategory($token)
    {
        $sql = "SELECT * FROM category WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Category Form
    public function saveCategoryData($categoryId, $token, $categoryName, $shortDescription, $description, $category_img, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($categoryId > 0) {
            $data = array(
                'category_name' => $categoryName,
                'description' => $description,
                'short_description' => $shortDescription,
                'category_img' => $category_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $categoryId);
            $this->db->update('category', $data);
        } else {
            $data = array(
                'token' => $token,
                'category_name' => $categoryName,
                'description' => $description,
                'short_description' => $shortDescription,
                'category_img' => $category_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('category', $data);
            $this->db->insert_id();
        }
    }
}
?>