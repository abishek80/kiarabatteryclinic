<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blogmodel extends CI_Model
{
    //Blog List
    public function blogList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        }

        $sql = "SELECT * FROM blog WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Blog Detail
    public function getBlogDetail($blogId)
    {
        $sql = "SELECT * FROM blog WHERE delete_status=0 AND id = $blogId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Blog
    public function checkBlog($token)
    {
        $sql = "SELECT * FROM blog WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Blog Form
    public function saveBlogData($blogId, $token, $blogDate, $blogName, $shortDescription, $description, $blog_img, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($blogId > 0) {
            $data = array(
                'blog_date' => $blogDate,
                'blog_name' => $blogName,
                'short_description' => $shortDescription,
                'description' => $description,
                'blog_img' => $blog_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $blogId);
            $this->db->update('blog', $data);
        } else {
            $data = array(
                'token' => $token,
                'blog_date' => $blogDate,
                'blog_name' => $blogName,
                'short_description' => $shortDescription,
                'description' => $description,
                'blog_img' => $blog_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('blog', $data);
            $this->db->insert_id();
        }
    }
}
?>