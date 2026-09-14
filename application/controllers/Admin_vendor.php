<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('common');
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        if (($this->session->userdata('userid') == null) || ($this->session->userdata('userid') == "")) {
          redirect(base_url() . 'login');
        }
    
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    }

    public function index($pageStatus='')
    {
        $data['menu_status'] = "VendorList";

        $data['vendorList'] = $this->vendormodel->vendorList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-list', $data);
        $this->load->view('backend/footer');
    }

    public function vendor_list($pageStatus='')
    {
        $data['menu_status'] = "VendorList";
        $data['activeLink'] = $pageStatus;

        $data['vendorList'] = $this->vendormodel->vendorList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-list', $data);
        $this->load->view('backend/footer');
    }

    public function vendor_add()
    {
        $data['menu_status'] = "VendorList";
        $data['formTitle'] = "Add Vendor";
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-form', $data);
        $this->load->view('backend/footer');
    }
    
    public function getVendorData()
    {
        $vendorId 	= $this->input->post('vendorName');
        $data 	= $this->vendormodel->getVendorDetail($vendorId);
        echo json_encode($data); 
    }

    public function vendor_edit($vendorId)
    {
        $data['menu_status'] = "VendorList";
        $data['formTitle'] = "Edit Vendor";

	    $vendorDetail = $this->vendormodel->getVendorDetail($vendorId);
        foreach ($vendorDetail as $row) {
            $data['vendorId'] = $row->id;
            $data['vendorToken'] = $row->token;
            $data['vendorName'] = $row->vendor_name;
            $data['vendorEmail'] = $row->vendor_email;
            $data['vendorMobileNumber'] = $row->vendor_mobile_number;
            $data['vendorGSTNumber'] = $row->vendor_gst_number;
            $data['vendorAddress1'] = $row->vendor_address_1;
            $data['vendorAddress2'] = $row->vendor_address_2;
            $data['status'] = $row->status;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-form', $data);
        $this->load->view('backend/footer');
    }

    public function vendor_view($vendorId = '')
    {
        $data['menu_status'] = "VendorList";

        $data['vendorInvoiceList'] = $this->vendormodel->getTransactionList('invoice', $vendorId);
	    $data['vendorPaymentList'] = $this->vendormodel->getTransactionList('payment', $vendorId);

	    $transactionDetail = $this->vendormodel->getTransactionDetail($vendorId);
        foreach ($transactionDetail as $row) {
            $data['overallInvoiceAmount'] = $row->overall_invoice_amount;
            $data['overallPaymentAmount'] = $row->overall_payment_amount;
            $data['overallBalanceAmount'] = $row->overall_balance_amount;
	    }
	    $vendorDetail = $this->vendormodel->getVendorDetail($vendorId);
        foreach ($vendorDetail as $row) {
            $data['vendorId'] = $row->id;
            $data['vendorName'] = $row->vendor_name;
            $data['vendorEmail'] = $row->vendor_email;
            $data['vendorMobileNumber'] = $row->vendor_mobile_number;
            $data['vendorGSTNumber'] = $row->vendor_gst_number;
            $data['vendorAddress1'] = $row->vendor_address_1;
            $data['vendorAddress2'] = $row->vendor_address_2;
            $data['status'] = $row->status;
            $data['createdAt'] = $row->created_at;
            $data['updatedAt'] = $row->updated_at;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-view', $data);
        $this->load->view('backend/footer');
    }

    //Vendor Save Form //
    public function vendorFormSave()
    {
        $vendorId = $this->input->post('vendor_id');
        $token = $this->input->post('token');
        $vendorName = $this->input->post('vendor_name');
        $vendorEmail = $this->input->post('vendor_email');
        $vendorMobileNumber = $this->input->post('vendor_mobile_number');
        $vendorGSTNumber = $this->input->post('vendor_gst_number');
        $vendorAddress1 = $this->input->post('vendor_address_1');
        $vendorAddress2 = $this->input->post('vendor_address_2');
        $status = $this->input->post('status');

        if ($vendorId < 0 || $vendorId == '') {
            $checkExists = $this->vendormodel->checkVendor($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Vendor Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->vendormodel->saveVendorData($vendorId, $token, $vendorName, $vendorEmail, $vendorMobileNumber, $vendorGSTNumber, $vendorAddress1, $vendorAddress2, $status);
        
        $data["isError"] = FALSE;
        if ($vendorId > 0) {
            $data["message"] = "Vendor Updated";
        } else {
            $data["message"] = "Vendor Created";
        }

        echo json_encode($data);
        return;
    }



    public function vendor_transaction_export($vendor_id = '', $start_date = '', $end_date = '')
    {
        $data['menu_status'] = "VendorList";
        $data['formTitle'] = "Export Vendor Transaction";
        
        $vendorId = $data['vendorId'] = $this->input->get('vendor_id');
        $startDate = $data['startDate'] = $this->input->get('start_date');
        $endDate = $data['endDate'] = $this->input->get('end_date');
        
        $data['vendorTransactionList'] = $this->vendormodel->getVendorTransactionList($vendorId, $startDate, $endDate);

	    $transactionDetail = $this->vendormodel->getOverallTransactionDetail($vendorId, $startDate, $endDate);
        foreach ($transactionDetail as $row) {
            $data['overallInvoiceAmount'] = $row->overall_invoice_amount;
            $data['overallPaymentAmount'] = $row->overall_payment_amount;
            $data['overallBalanceAmount'] = $row->overall_balance_amount;
            $data['openingOverallInvoiceAmount'] = $row->opening_overall_invoice_amount;
            $data['openingOverallPaymentAmount'] = $row->opening_overall_payment_amount;
            $data['openingOverallBalanceAmount'] = $row->opening_overall_balance_amount;
            $data['reportOverallInvoiceAmount'] = $row->report_overall_invoice_amount;
            $data['reportOverallPaymentAmount'] = $row->report_overall_payment_amount;
            $data['reportOverallBalanceAmount'] = $row->report_overall_balance_amount;
	    }

	    $vendorDetail = $this->vendormodel->getVendorDetail($vendorId);
        foreach ($vendorDetail as $row) {
            $data['vendorId'] = $row->id;
            $data['vendorName'] = $row->vendor_name;
            $data['vendorEmail'] = $row->vendor_email;
            $data['vendorMobileNumber'] = $row->vendor_mobile_number;
            $data['vendorGSTNumber'] = $row->vendor_gst_number;
            $data['vendorAddress1'] = $row->vendor_address_1;
            $data['vendorAddress2'] = $row->vendor_address_2;
	    }
	    $generalInfoDetail = $this->settingsmodel->getGeneralInfoDetail($generalInfoId);
        foreach ($generalInfoDetail as $row) {
            $data['companyName'] = $row->company_name;
            $data['address'] = $row->address;
            $data['mobileNumber'] = $row->mobile_number;
            $data['phoneNumber'] = $row->phone_number;
            $data['emailId'] = $row->email;
            $data['gstNumber'] = $row->gst_number;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-transaction-export', $data);
        $this->load->view('backend/footer');
    }

    public function vendor_transaction_add($vendorId = '')
    {
        $data['menu_status'] = "VendorList";
        $data['formTitle'] = "Add Vendor Transaction";
        
	    $vendorDetail = $this->vendormodel->getVendorDetail($vendorId);
        foreach ($vendorDetail as $row) {
            $data['vendorId'] = $row->id;
            $data['vendorName'] = $row->vendor_name;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-transaction-form', $data);
        $this->load->view('backend/footer');
    }

    public function vendor_transaction_edit($transactionId)
    {
        $data['menu_status'] = "VendorList";
        $data['formTitle'] = "Edit Vendor Transaction";

	    $vendorTransactionDetail = $this->vendormodel->getVendorTransactionDetail($transactionId);
        foreach ($vendorTransactionDetail as $row) {
            $data['transactionId'] = $row->id;
            $data['vendorId'] = $row->vendor_id;
            $data['vendorName'] = $row->vendor_name;
            $data['transactionDate'] = $row->transaction_date;
            $data['transactionNumber'] = $row->transaction_number;
            $data['transactionAmount'] = $row->transaction_amount;
            $data['transactionMethod'] = $row->transaction_method;
	    }
        
        $this->load->view('backend/header', $data);
        $this->load->view('backend/vendor/vendor-transaction-form', $data);
        $this->load->view('backend/footer');
    }

    //Vendor Transaction Save Form //
    public function vendorTransactionFormSave()
    {
        $transactionId = $this->input->post('transaction_id');
        $vendorId = $this->input->post('vendor_id');
        $transactionDate = $this->input->post('transaction_date');
        $transactionNumber = $this->input->post('transaction_number');
        $transactionAmount = $this->input->post('transaction_amount');
        $transactionMethod = $this->input->post('transaction_method');
        
        $this->vendormodel->saveVendorTransactionData($transactionId, $vendorId, $transactionDate, $transactionNumber, $transactionAmount, $transactionMethod);
        
        $data["isError"] = FALSE;
        if ($transactionId > 0) {
            $data["message"] = "Transaction Updated";
        } else {
            $data["message"] = "Transaction Created";
        }

        echo json_encode($data);
        return;
    }
}