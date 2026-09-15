<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brandmodel extends CI_Model
{
    //Brand List
    public function brandList($pageStatus = '')
    {
        $where = '';
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        }

        $sql = "SELECT * FROM brand WHERE delete_status=0 $where ORDER BY brand_name ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Brand Detail
    public function getBrandDetail($brandId)
    {
        $brandId = (int) $brandId;
        $sql = "SELECT * FROM brand WHERE delete_status=0 AND id = $brandId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Brand Exists
    public function checkBrand($token)
    {
        $token = $this->db->escape_str($token);
        $sql = "SELECT * FROM brand WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Brand Form Data
    public function saveBrandData($brandId, $token, $brandName, $brandImg, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($brandId > 0) {
            $data = array(
                'brand_name' => $brandName,
                'brand_img' => $brandImg,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $brandId);
            $this->db->update('brand', $data);
        } else {
            $data = array(
                'token' => $token,
                'brand_name' => $brandName,
                'brand_img' => $brandImg,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('brand', $data);
            $this->db->insert_id();
        }
    }
}
