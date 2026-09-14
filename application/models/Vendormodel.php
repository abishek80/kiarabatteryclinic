<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendormodel extends CI_Model
{
    //Vendor List
    public function vendorList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND status = '$pageStatus'";
        } else {
            $where = "";
        }

        $sql = "SELECT * FROM vendor WHERE delete_status=0 $where ORDER BY id DESC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vendor Detail
    public function getVendorDetail($vendorId)
    {
        $sql = "SELECT * FROM vendor WHERE delete_status=0 AND id = $vendorId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Vendor
    public function checkVendor($token)
    {
        $sql = "SELECT * FROM vendor WHERE delete_status=0 AND token='" . $token . "'";
        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Vendor Form
    public function saveVendorData($vendorId, $token, $vendorName, $vendorEmail, $vendorMobileNumber, $vendorGSTNumber, $vendorAddress1, $vendorAddress2, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($vendorId > 0) {
            $data = array(
                'vendor_name' => $vendorName,
                'vendor_email' => $vendorEmail,
                'vendor_mobile_number' => $vendorMobileNumber,
                'vendor_gst_number' => $vendorGSTNumber,
                'vendor_address_1' => $vendorAddress1,
                'vendor_address_2' => $vendorAddress2,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $vendorId);
            $this->db->update('vendor', $data);
        } else {
            $data = array(
                'token' => $token,
                'vendor_name' => $vendorName,
                'vendor_email' => $vendorEmail,
                'vendor_mobile_number' => $vendorMobileNumber,
                'vendor_gst_number' => $vendorGSTNumber,
                'vendor_address_1' => $vendorAddress1,
                'vendor_address_2' => $vendorAddress2,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vendor', $data);
            $this->db->insert_id();
        }
    }



    //Transaction List
    public function getTransactionList($transactionType = '', $vendorId= '')
    {
        $sql = "SELECT VT.*, I.id AS invoice_id, I.overall_product_quantity, I.status FROM vendor_transaction VT LEFT JOIN invoice I ON I.invoice_number = VT.transaction_number WHERE VT.vendor_id = $vendorId AND VT.transaction_type = '$transactionType' AND VT.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Transaction Detail
    public function getTransactionDetail($vendorId= '')
    {
        $sql = "SELECT COALESCE(ROUND(SUM(CASE WHEN transaction_type = 'invoice' THEN transaction_amount ELSE 0 END), 2), 0.00) AS overall_invoice_amount, COALESCE(ROUND(SUM(CASE WHEN transaction_type = 'payment' THEN transaction_amount ELSE 0 END), 2), 0.00) AS overall_payment_amount, (COALESCE(ROUND(SUM(CASE WHEN transaction_type = 'invoice' THEN transaction_amount ELSE 0 END) - SUM(CASE WHEN transaction_type = 'payment' THEN transaction_amount ELSE 0 END), 2), 0.00)) AS overall_balance_amount FROM vendor_transaction WHERE vendor_id = $vendorId AND delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vendor Detail
    public function getVendorTransactionDetail($transactionId)
    {
        $sql = "SELECT VT.*, V.vendor_name FROM vendor_transaction VT LEFT JOIN vendor V ON V.id = VT.vendor_id WHERE VT.delete_status=0 AND VT.id = $transactionId";
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Vendor Form
    public function saveVendorTransactionData($transactionId, $vendorId, $transactionDate, $transactionNumber, $transactionAmount, $transactionMethod)
    {
        $userId = $this->session->userdata('userid');

        if ($transactionId > 0) {
            $data = array(
                'vendor_id' => $vendorId,
                'transaction_date' => $transactionDate,
                'transaction_number' => $transactionNumber,
                'transaction_amount' => $transactionAmount,
                'transaction_method' => $transactionMethod,
                'transaction_type' => 'payment',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $transactionId);
            $this->db->update('vendor_transaction', $data);
        } else {
            $data = array(
                'vendor_id' => $vendorId,
                'transaction_date' => $transactionDate,
                'transaction_number' => $transactionNumber,
                'transaction_amount' => $transactionAmount,
                'transaction_method' => $transactionMethod,
                'transaction_type' => 'payment',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vendor_transaction', $data);
            $this->db->insert_id();
        }
    }

    //Vendor Transaction List
    public function getVendorTransactionList($vendorId = '', $startDate = '', $endDate= '')
    {
        // --- Build Vendor Id ---
        $whereVendorId = "";
        if ($vendorId) {
            $whereVendorId = "AND VT.vendor_id = $vendorId";
        } else {
            $whereVendorId = "";
        }
        
        if ($startDate && $endDate) {
            $fromtoDate = " AND VT.transaction_date BETWEEN '$startDate' AND '$endDate'";
        } elseif ($startDate) {
            $fromtoDate = " AND VT.transaction_date = '$startDate'";
        } else {
            $fromtoDate = "";
        }

        $sql = "SELECT VT.*, I.invoice_number, I.overall_product_quantity FROM vendor_transaction VT LEFT JOIN invoice I ON I.invoice_number = VT.transaction_number WHERE VT.delete_status=0 $whereVendorId $fromtoDate ORDER BY VT.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getOverallTransactionDetail($vendorId = '', $startDate = '', $endDate = '')
    {
        // --- Build Vendor Id ---
        $whereVendorId = "";
        if ($vendorId) {
            $whereVendorId = "VT.vendor_id = $vendorId AND";
        } else {
            $whereVendorId = "";
        }

        // --- Build date filters ---
        $dateFilter = "";
        if ($startDate && $endDate) {
            $dateFilter = "AND VT.transaction_date BETWEEN '$startDate' AND '$endDate'";
        } elseif ($startDate) {
            $dateFilter = "AND VT.transaction_date = '$startDate'";
        }

        // --- Opening balance condition ---
        $openingFilter = "";
        if ($startDate) {
            $openingFilter = "AND VT.transaction_date < '$startDate'";
        }

        $sql = "SELECT COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS overall_invoice_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'payment' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS overall_payment_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' THEN VT.transaction_amount ELSE 0 END) - SUM(CASE WHEN VT.transaction_type = 'payment' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS overall_balance_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' AND VT.transaction_date < '$startDate' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS opening_overall_invoice_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'payment' AND VT.transaction_date < '$startDate' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS opening_overall_payment_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' AND VT.transaction_date < '$startDate' THEN VT.transaction_amount ELSE 0 END) - SUM(CASE WHEN VT.transaction_type = 'payment' AND VT.transaction_date < '$startDate' THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS opening_overall_balance_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' AND (VT.transaction_date BETWEEN '$startDate' AND '$endDate') THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS report_overall_invoice_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'payment' AND (VT.transaction_date BETWEEN '$startDate' AND '$endDate') THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS report_overall_payment_amount, COALESCE(ROUND(SUM(CASE WHEN VT.transaction_type = 'invoice' AND (VT.transaction_date BETWEEN '$startDate' AND '$endDate') THEN VT.transaction_amount ELSE 0 END) - SUM(CASE WHEN VT.transaction_type = 'payment' AND (VT.transaction_date BETWEEN '$startDate' AND '$endDate') THEN VT.transaction_amount ELSE 0 END), 2), 0.00) AS report_overall_balance_amount FROM vendor_transaction VT WHERE $whereVendorId VT.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }


}
?>