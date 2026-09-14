<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingsmodel extends CI_Model
{
    //SEO Detail
    public function getSEODetail($seoId='')
    {
        if($seoId) {
            $where = 'WHERE id = $seoId';
        }else {
            $where = '';
        }
        $sql = "SELECT * FROM seo $where";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save SEO Form
    public function saveSEOData($seoId, $headerLink, $bodyLink, $footerLink)
    {
        $userId = $this->session->userdata('userid');

        if ($seoId > 0) {
            $data = array(
                'header_link' => $headerLink,
                'body_link' => $bodyLink,
                'footer_link' => $footerLink,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $seoId);
            $this->db->update('seo', $data);
        } else {
            $data = array(
                'header_link' => $headerLink,
                'body_link' => $bodyLink,
                'footer_link' => $footerLink,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('seo', $data);
            $this->db->insert_id();
        }
    }

    //General Information Detail
    public function getGeneralInfoDetail($generalInfoId='')
    {
        if($generalInfoId) {
            $where = 'WHERE id = $generalInfoId';
        }else {
            $where = '';
        }
        $sql = "SELECT * FROM general_info $where";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save General Information Form
    public function saveGeneralInfoData($generalInfoId, $companyName, $gstNumber, $email, $mobileNumber, $phoneNumber, $address, $mapLink, $iframeLink, $bankName, $accountNumber, $branchName, $ifscCode, $declarationNote, $whatsappNumber, $whatsappLink, $facebookLink, $instagramLink, $youtubeLink, $twitterLink, $linkedinLink)
    {
        $userId = $this->session->userdata('userid');

        if ($generalInfoId > 0) {
            $data = array(
                'company_name' => $companyName,
                'gst_number' => $gstNumber,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'phone_number' => $phoneNumber,
                'address' => $address,
                'map_link' => $mapLink,
                'iframe_link' => $iframeLink,
                'bank_name' => $bankName,
                'account_number' => $accountNumber,
                'branch_name' => $branchName,
                'ifsc_code' => $ifscCode,
                'declaration_note' => $declarationNote,
                'whatsapp_number' => $whatsappNumber,
                'whatsapp_link' => $whatsappLink,
                'facebook_link' => $facebookLink,
                'instagram_link' => $instagramLink,
                'youtube_link' => $youtubeLink,
                'twitter_link' => $twitterLink,
                'linkedin_link' => $linkedinLink,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $generalInfoId);
            $this->db->update('general_info', $data);
        } else {
            $data = array(
                'company_name' => $companyName,
                'gst_number' => $gstNumber,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'phone_number' => $phoneNumber,
                'address' => $address,
                'map_link' => $mapLink,
                'iframe_link' => $iframeLink,
                'bank_name' => $bankName,
                'account_number' => $accountNumber,
                'branch_name' => $branchName,
                'ifsc_code' => $ifscCode,
                'declaration_note' => $declarationNote,
                'whatsapp_number' => $whatsappNumber,
                'whatsapp_link' => $whatsappLink,
                'facebook_link' => $facebookLink,
                'instagram_link' => $instagramLink,
                'youtube_link' => $youtubeLink,
                'twitter_link' => $twitterLink,
                'linkedin_link' => $linkedinLink,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('general_info', $data);
            $this->db->insert_id();
        }
    }
}
?>