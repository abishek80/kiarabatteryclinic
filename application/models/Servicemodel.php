<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicemodel extends CI_Model
{
    //Service List
    public function serviceList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        }

        $sql = "SELECT * FROM service WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Service Detail
    public function getServiceDetail($serviceId)
    {
        $sql = "SELECT * FROM service WHERE delete_status=0 AND id = $serviceId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Service
    public function checkService($token)
    {
        $sql = "SELECT * FROM service WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Service Form
    public function saveServiceData($serviceId, $token, $serviceName, $shortDescription, $description, $service_img, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($serviceId > 0) {
            $data = array(
                'service_name' => $serviceName,
                'short_description' => $shortDescription,
                'description' => $description,
                'service_img' => $service_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $serviceId);
            $this->db->update('service', $data);
        } else {
            $data = array(
                'token' => $token,
                'service_name' => $serviceName,
                'short_description' => $shortDescription,
                'description' => $description,
                'service_img' => $service_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('service', $data);
            $this->db->insert_id();
        }
    }
}
?>