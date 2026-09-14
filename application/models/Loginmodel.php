<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loginmodel extends CI_Model
{
    // Login Checking
    public function checkLoginInfo($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("(mobile_number = '$username' OR email = '$username')");
        $this->db->where('delete_status', 0);
        $this->db->where('status', 'active');
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        $res = $query->result();
        $rows = $query->num_rows();
        $emp_id = '';

        $status = '';
        if (!empty($res)) {
            foreach ($res as $row) {
                $status = $row->status;

                if ($status == 'active') {
                    $userData = array(
                        'userid' => $row->id,
                        'username' => $row->name,
                        'email' => $row->email,
                        'mobile' => $row->mobile_number,
                        'status' => $row->status,
                        'loggedin' => TRUE,
                        'is_admin' => $row->is_admin
                    );
                    $this->session->set_userdata($userData);
                }

                $emp_id = $row->id;
            }
        }
        $resArr["rowCount"] = $rows;
        $resArr["status"] = $status;
        $resArr["emp_id"] = $emp_id;
        return $resArr;
    }
}
?>