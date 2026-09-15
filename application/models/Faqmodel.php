<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faqmodel extends CI_Model
{
    // FAQ List (with optional status & page filter)
    public function faqList($pageStatus = '', $pageFilter = '')
    {
        $where = '';
        if ($pageStatus) {
            $pageStatusEsc = $this->db->escape_str($pageStatus);
            $where .= " AND status = '$pageStatusEsc'";
        }
        if ($pageFilter) {
            $pageFilterEsc = $this->db->escape_str($pageFilter);
            $where .= " AND page_name = '$pageFilterEsc'";
        }

        $sql = "SELECT * FROM faq WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // FAQ Detail
    public function getFaqDetail($faqId)
    {
        $faqId = (int) $faqId;
        $sql = "SELECT * FROM faq WHERE delete_status=0 AND id = $faqId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Check FAQ Exists
    public function checkFaq($token)
    {
        $tokenEscaped = $this->db->escape_str($token);
        $sql = "SELECT * FROM faq WHERE delete_status=0 AND token='" . $tokenEscaped . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    // Save FAQ Data
    public function saveFaqData($saveData, $faqId = 0)
    {
        if ($faqId > 0) {
            $saveData['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('id', (int) $faqId);
            $this->db->update('faq', $saveData);
            return $faqId;
        } else {
            $saveData['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('faq', $saveData);
            return $this->db->insert_id();
        }
    }

    // Delete FAQ
    public function deleteFaq($faqId)
    {
        $faqId = (int) $faqId;
        $data = array('delete_status' => 1);
        $this->db->where('id', $faqId);
        return $this->db->update('faq', $data);
    }

    // Update Status
    public function updateStatus($faqId, $status)
    {
        $faqId = (int) $faqId;
        $statusEsc = $this->db->escape_str($status);
        $data = array('status' => $statusEsc);
        $this->db->where('id', $faqId);
        return $this->db->update('faq', $data);
    }
}
