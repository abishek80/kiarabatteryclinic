<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('backend/settings/login');
    }

    public function checkLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username != "" && $password != "") {
            $result = $this->loginmodel->checkLoginInfo($username, $password);
            
            $rowCount = $result["rowCount"];
            $status = $result["status"];
            $emp_id = $result["emp_id"];

            if ($rowCount == 1 && $status == 'active') { // Check if emp_id is not null
                $data["isError"] = FALSE;
                $data["message"] = "You Are Logged In Successfully.";
            } else {
                if ($status == 'inactive') {
                    $data["isError"] = TRUE;
                    $data["message"] = "Your Account Has Been Suspended By Admin. Please Contact Admin.";
                } else {
                    $data["isError"] = TRUE;
                    $data["message"] = "Employee Code, Mobile No Or Password Is Not Matched.";
                }
            }
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Please Fill All Details.";
        }

        echo json_encode($data);
    }
}
?>