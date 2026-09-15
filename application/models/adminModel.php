<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminmodel extends CI_Model
{
    public function deleteRecord($recordId, $tableName = '')
    {
        $sql = "UPDATE $tableName SET delete_status = 1 WHERE id =" . (int)$recordId;
        $this->db->query($sql);
    }

    public function passwordUpdate($newPassword)
    {
        $userId = $this->session->userdata('userid');
        $userPass = md5($newPassword);
        $data = array(
            'password' => $userPass,
        );
        $this->db->where('id', $userId);
        $this->db->update('users', $data);
    }
    
    public function tableChangeStatus($recordId, $tableName, $statusValue)
    {
        $userId = $this->session->userdata('userid');

        $sql = "UPDATE $tableName SET status = '" . $this->db->escape_str($statusValue) . "', updated_by = '" . $userId . "', updated_at = NOW() WHERE id =" . (int)$recordId;

        $this->db->query($sql);
    }

    // Brand Management Methods
    public function brandList($status = '')
    {
        $where = '';
        if ($status) {
            $where = "AND status = '" . $this->db->escape_str($status) . "'";
        }
        $sql = "SELECT * FROM brand WHERE delete_status = 0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getBrandDetail($brandId)
    {
        $sql = "SELECT * FROM brand WHERE delete_status = 0 AND id = " . (int)$brandId;
        $res = $this->db->query($sql);
        return $res->result();
    }

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
            $this->db->where('id', (int)$brandId);
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
        }
    }
}