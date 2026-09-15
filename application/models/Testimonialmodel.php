<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonialmodel extends CI_Model
{
    // Testimonial List
    public function testimonialList($pageStatus = '')
    {
        $where = '';
        if ($pageStatus) {
            $pageStatusEsc = $this->db->escape_str($pageStatus);
            $where = "AND status = '$pageStatusEsc'";
        }

        $sql = "SELECT * FROM testimonial WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Testimonial Detail
    public function getTestimonialDetail($testimonialId)
    {
        $testimonialId = (int) $testimonialId;
        $sql = "SELECT * FROM testimonial WHERE delete_status=0 AND id = $testimonialId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Check Testimonial Exists
    public function checkTestimonial($token)
    {
        $tokenEscaped = $this->db->escape_str($token);
        $sql = "SELECT * FROM testimonial WHERE delete_status=0 AND token='" . $tokenEscaped . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    // Save Testimonial Data
    public function saveTestimonialData($saveData, $testimonialId = 0)
    {
        if ($testimonialId > 0) {
            $saveData['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('id', (int) $testimonialId);
            $this->db->update('testimonial', $saveData);
            return $testimonialId;
        } else {
            $saveData['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('testimonial', $saveData);
            return $this->db->insert_id();
        }
    }

    // Delete Testimonial
    public function deleteTestimonial($testimonialId)
    {
        $testimonialId = (int) $testimonialId;
        $data = array('delete_status' => 1);
        $this->db->where('id', $testimonialId);
        return $this->db->update('testimonial', $data);
    }

    // Update Status
    public function updateStatus($testimonialId, $status)
    {
        $testimonialId = (int) $testimonialId;
        $statusEsc = $this->db->escape_str($status);
        $data = array('status' => $statusEsc);
        $this->db->where('id', $testimonialId);
        return $this->db->update('testimonial', $data);
    }
}
