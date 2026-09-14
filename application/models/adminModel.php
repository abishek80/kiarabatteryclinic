<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminmodel extends CI_Model
{
    public function deleteRecord($recordId, $tableName = '')
    {
        $sql = "UPDATE $tableName SET delete_status = 1 WHERE id =" . $recordId;
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

        $sql = "UPDATE $tableName SET status = '" . $statusValue . "', updated_by = '" . $userId . "', updated_at = NOW() WHERE id =" . $recordId;

        $this->db->query($sql);
    }
}
?>