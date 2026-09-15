<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicemodel extends CI_Model
{
    //Service List
    public function serviceList($pageStatus = '')
    {
        $where = '';
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
        $serviceId = (int) $serviceId;
        $sql = "SELECT * FROM service WHERE delete_status=0 AND id = $serviceId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Service
    public function checkService($token)
    {
        $token = $this->db->escape_str($token);
        $sql = "SELECT * FROM service WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Service Form
    public function saveServiceData($serviceId, $token, $serviceName, $shortDescription, $description, $service_img, $status, $extraData = array())
    {
        $userId = $this->session->userdata('userid');

        $card1_title = isset($extraData['card1_title']) ? $extraData['card1_title'] : '';
        $card1_description = isset($extraData['card1_description']) ? $extraData['card1_description'] : '';
        $card2_title = isset($extraData['card2_title']) ? $extraData['card2_title'] : '';
        $card2_description = isset($extraData['card2_description']) ? $extraData['card2_description'] : '';
        $process_steps = isset($extraData['process_steps']) ? $extraData['process_steps'] : '';
        $faqs = isset($extraData['faqs']) ? $extraData['faqs'] : '';

        if ($serviceId > 0) {
            $data = array(
                'service_name' => $serviceName,
                'short_description' => $shortDescription,
                'description' => $description,
                'card1_title' => $card1_title,
                'card1_description' => $card1_description,
                'card2_title' => $card2_title,
                'card2_description' => $card2_description,
                'process_steps' => $process_steps,
                'faqs' => $faqs,
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
                'card1_title' => $card1_title,
                'card1_description' => $card1_description,
                'card2_title' => $card2_title,
                'card2_description' => $card2_description,
                'process_steps' => $process_steps,
                'faqs' => $faqs,
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