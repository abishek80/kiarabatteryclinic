<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_invoice extends CI_Controller
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
        $data['menu_status'] = "InvoiceList";

        $data['invoiceList'] = $this->invoicemodel->invoiceList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/invoice/invoice-list', $data);
        $this->load->view('backend/footer');
    }

    public function invoice_list($pageStatus='')
    {
        $data['menu_status'] = "InvoiceList";
        $data['activeLink'] = $pageStatus;

        $data['invoiceList'] = $this->invoicemodel->invoiceList($pageStatus);

        $this->load->view('backend/header', $data);
        $this->load->view('backend/invoice/invoice-list', $data);
        $this->load->view('backend/footer');
    }

    public function invoice_add()
    {
        $data['menu_status'] = "InvoiceList";
        $data['formTitle'] = "Add Invoice";
        
	    $data['productDropdown'] = $this->productmodel->getProductDropdown();
        $data['vendorList'] = $this->vendormodel->vendorList('active');

        $this->load->view('backend/header_link', $data);
        $this->load->view('backend/invoice/invoice-form', $data);
        $this->load->view('backend/footer');
    }

    public function invoice_edit($invoiceId)
    {
        $data['menu_status'] = "InvoiceList";
        $data['formTitle'] = "Edit Invoice";

        $data['invoiceItemsList'] = $this->invoicemodel->invoiceItemsList($invoiceId);
        $data['vendorList'] = $this->vendormodel->vendorList($pageStatus);
	    $invoiceDetail = $this->invoicemodel->getInvoiceDetail($invoiceId);
        foreach ($invoiceDetail as $row) {
            $data['invoiceId'] = $row->id;
            $data['invoiceToken'] = $row->token;
            $data['invoiceNumber'] = $row->invoice_number;
            $data['invoiceDate'] = $row->invoice_date;
            $data['vendorId'] = $row->vendor_id;
            $data['vendorName'] = $row->vendor_name;
            $data['vendorAddress1'] = $row->vendor_address_1;
            $data['vendorAddress2'] = $row->vendor_address_2;
            $data['vendorMobileNumber'] = $row->vendor_mobile_number;
            $data['vendorEmail'] = $row->vendor_email;
            $data['vendorGSTNumber'] = $row->vendor_gst_number;
            $data['supplierRef'] = $row->supplier_ref;
            $data['otherReference'] = $row->other_reference;
            $data['subtotalAmount'] = $row->subtotal_amount;
            $data['overallProductQuantity'] = $row->overall_product_quantity;
            $data['overallCGSTAmount'] = $row->overall_cgst_amount;
            $data['overallSGSTAmount'] = $row->overall_sgst_amount;
            $data['overallGSTAmount'] = $row->overall_gst_amount;
            $data['totalAmount'] = $row->total_amount;
            $data['discountAmount'] = $row->discount_amount;
            $data['roundoffAmount'] = $row->roundoff_amount;
            $data['invoiceAmount'] = $row->invoice_amount;
            $data['gstAmountInWord'] = $row->gst_amount_in_word;
            $data['invoiceAmountInWord'] = $row->invoice_amount_in_word;
	    }

        $this->load->view('backend/header', $data);
        $this->load->view('backend/invoice/invoice-form', $data);
        $this->load->view('backend/footer');
    }

    public function invoice_view($invoiceId)
    {
        $data['menu_status'] = "InvoiceList";

        $data['invoiceItemsList'] = $this->invoicemodel->invoiceItemsList($invoiceId);
        $data['invoiceItemsGSTList'] = $this->invoicemodel->invoiceItemsGSTList($invoiceId);
	    $invoiceDetail = $this->invoicemodel->getInvoiceDetail($invoiceId);
        foreach ($invoiceDetail as $row) {
            $data['invoiceId'] = $row->id;
            $data['invoiceNumber'] = $row->invoice_number;
            $data['invoiceDate'] = $row->invoice_date;
            $data['vendorId'] = $row->vendor_id;
            $data['vendorName'] = $row->vendor_name;
            $data['vendorAddress1'] = $row->vendor_address_1;
            $data['vendorAddress2'] = $row->vendor_address_2;
            $data['vendorMobileNumber'] = $row->vendor_mobile_number;
            $data['vendorEmail'] = $row->vendor_email;
            $data['vendorGSTNumber'] = $row->vendor_gst_number;
            $data['supplierRef'] = $row->supplier_ref;
            $data['otherReference'] = $row->other_reference;
            $data['subtotalAmount'] = $row->subtotal_amount;
            $data['overallProductQuantity'] = $row->overall_product_quantity;
            $data['overallCGSTAmount'] = $row->overall_cgst_amount;
            $data['overallSGSTAmount'] = $row->overall_sgst_amount;
            $data['overallGSTAmount'] = $row->overall_gst_amount;
            $data['totalAmount'] = $row->total_amount;
            $data['discountAmount'] = $row->discount_amount;
            $data['roundoffAmount'] = $row->roundoff_amount;
            $data['invoiceAmount'] = $row->invoice_amount;
            $data['gstAmountInWord'] = $row->gst_amount_in_word;
            $data['invoiceAmountInWord'] = $row->invoice_amount_in_word;
	    }
	    $generalInfoDetail = $this->settingsmodel->getGeneralInfoDetail($generalInfoId);
        foreach ($generalInfoDetail as $row) {
            $data['companyName'] = $row->company_name;
            $data['gstNumber'] = $row->gst_number;
            $data['emailId'] = $row->email;
            $data['mobileNumber'] = $row->mobile_number;
            $data['phoneNumber'] = $row->phone_number;
            $data['address'] = $row->address;
            $data['bankName'] = $row->bank_name;
            $data['accountNumber'] = $row->account_number;
            $data['branchName'] = $row->branch_name;
            $data['ifscCode'] = $row->ifsc_code;
            $data['declarationNote'] = $row->declaration_note;
	    }

        $this->load->view('backend/header_link', $data);
        $this->load->view('backend/invoice/invoice-view', $data);
        $this->load->view('backend/footer');
    }

    //Invoice Save Form //
    public function invoiceFormSave()
    {
        $invoiceId = $this->input->post('invoice_id');
        $token = $this->input->post('token');
        $invoiceNumber = $this->input->post('invoice_number');
        $invoiceDate = $this->input->post('invoice_date');
        $vendorId = $this->input->post('vendor_id');
        $supplierRef = $this->input->post('supplier_ref');
        $otherReference = $this->input->post('other_reference');
        $subTotalAmount = $this->input->post('subtotal_amount');
        $overallProductQuantity = $this->input->post('overall_product_quantity');
        $overallCGSTAmount = $this->input->post('overall_cgst_amount');
        $overallSGSTAmount = $this->input->post('overall_sgst_amount');
        $overallGSTAmount = $this->input->post('overall_gst_amount');
        $totalAmount = $this->input->post('total_amount');
        $discountAmount = $this->input->post('discount_amount');
        $roundoffAmount = $this->input->post('roundoff_amount');
        $invoiceAmount = $this->input->post('invoice_total_amount');
        $gstAmountInWord = $this->input->post('gst_amount_in_words');
        $invoiceAmountInWord = $this->input->post('invoice_amount_in_words');

        $invoiceArrayData = json_decode($this->input->post('invoiceDataArray'));

        if ($invoiceId < 0 || $invoiceId == '') {
            $checkExists = $this->invoicemodel->checkInvoice($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Invoice Name Is Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->invoicemodel->saveInvoiceData($invoiceId, $token, $invoiceNumber, $invoiceDate, $vendorId, $supplierRef, $otherReference, $subTotalAmount, $overallProductQuantity, $overallCGSTAmount, $overallSGSTAmount, $overallGSTAmount, $totalAmount, $discountAmount, $roundoffAmount, $invoiceAmount, $gstAmountInWord, $invoiceAmountInWord, $invoiceArrayData);
        
        $data["isError"] = FALSE;
        if ($invoiceId > 0) {
            $data["message"] = "Invoice Updated";
        } else {
            $data["message"] = "Invoice Created";
        }

        echo json_encode($data);
        return;
    }
}