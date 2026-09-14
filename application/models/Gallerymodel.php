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
}
?>