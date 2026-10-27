<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallerymodel extends CI_Model
{
    //Gallery List
    public function galleryList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        }

        $sql = "SELECT * FROM gallery WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Gallery Detail
    public function getGalleryDetail($galleryId)
    {
        $sql = "SELECT * FROM gallery WHERE delete_status=0 AND id = $galleryId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Gallery
    public function checkGallery($token)
    {
        $sql = "SELECT * FROM gallery WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Gallery Form
    public function saveGalleryData($galleryId, $token, $galleryName, $description, $gallery_img, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($galleryId > 0) {
            $data = array(
                'gallery_name' => $galleryName,
                'description' => $description,
                'gallery_img' => $gallery_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $galleryId);
            $this->db->update('gallery', $data);
        } else {
            $data = array(
                'token' => $token,
                'gallery_name' => $galleryName,
                'description' => $description,
                'gallery_img' => $gallery_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('gallery', $data);
            $this->db->insert_id();
        }
    }

    // Parse gallery images (handles JSON array, comma-separated, and single legacy path)
    public static function parseImages($galleryImg)
    {
        if (empty($galleryImg)) {
            return array();
        }
        if (is_array($galleryImg)) {
            return array_values(array_filter($galleryImg));
        }
        $str = trim((string)$galleryImg);
        if ($str === '') {
            return array();
        }
        // Check for JSON array or object
        if ((substr($str, 0, 1) === '[' && substr($str, -1) === ']') || (substr($str, 0, 1) === '{' && substr($str, -1) === '}')) {
            $decoded = json_decode($str, true);
            if (is_array($decoded)) {
                return array_values(array_filter($decoded));
            }
        }
        // Check for comma separated
        if (strpos($str, ',') !== false) {
            $parts = explode(',', $str);
            return array_values(array_filter(array_map('trim', $parts)));
        }
        return array($str);
    }
}
?>