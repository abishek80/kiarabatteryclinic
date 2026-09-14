<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoicemodel extends CI_Model
{
    //Invoice List
    public function invoiceList($pageStatus = '')
    {
        if($pageStatus) {
            $where = "AND I.status = '$pageStatus'";
        }

        $sql = "SELECT I.*, V.vendor_name, V.vendor_email, V.vendor_mobile_number FROM invoice I INNER JOIN vendor V ON V.id = I.vendor_id WHERE I.delete_status = 0 $where GROUP BY I.id ORDER BY I.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Invoice Items List
    public function invoiceItemsList($invoiceId)
    {
        $sql = "SELECT II.*, P.product_name, P.hsn_number, P.per_value FROM invoice I INNER JOIN invoice_items II ON II.invoice_id = I.id INNER JOIN product P ON II.product_id = P.id WHERE I.delete_status = 0 AND II.invoice_id = $invoiceId ORDER BY I.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Invoice Items GST List
    public function invoiceItemsGSTList($invoiceId)
    {
        $sql = "SELECT II.*, SUM(II.cgst_amount) AS cgst_amount, SUM(II.sgst_amount) AS sgst_amount, SUM(II.subtotal_amount) AS subtotal_amount, SUM(II.gst_amount) AS gst_amount, P.product_name, GROUP_CONCAT(DISTINCT P.hsn_number SEPARATOR ', ') AS hsn_number, P.per_value FROM invoice I INNER JOIN invoice_items II ON II.invoice_id = I.id INNER JOIN product P ON II.product_id = P.id WHERE I.delete_status = 0 AND II.invoice_id = $invoiceId GROUP BY II.cgst_percentage ORDER BY I.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Invoice Detail
    public function getInvoiceDetail($invoiceId)
    {
        $sql = "SELECT I.*, V.vendor_name, V.vendor_email, V.vendor_mobile_number, V.vendor_address_1, V.vendor_address_2, V.vendor_gst_number, P.product_name FROM invoice I LEFT JOIN invoice_items II ON II.invoice_id = I.id INNER JOIN vendor V ON V.id = I.vendor_id LEFT JOIN product P ON II.product_id = P.id WHERE I.delete_status = 0 AND I.id = $invoiceId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Invoice Enquiry List
    public function getInvoiceEnquiryList($invoiceId)
    {
        $sql = "SELECT * FROM invoice_enquiry WHERE id = $invoiceId AND delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Invoice
    public function checkInvoice($token)
    {
        $sql = "SELECT * FROM invoice WHERE delete_status = 0 AND token='" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Invoice Form
    public function saveInvoiceData($invoiceId, $token, $invoiceNumber, $invoiceDate, $vendorId, $supplierRef, $otherReference, $subTotalAmount, $overallProductQuantity, $overallCGSTAmount, $overallSGSTAmount, $overallGSTAmount, $totalAmount, $discountAmount, $roundoffAmount, $invoiceAmount, $gstAmountInWord, $invoiceAmountInWord, $invoiceArrayData)
    {
        $userId = $this->session->userdata('userid');
        $year        = date('y');
        $prevYear    = $year - 1;

        if($invoiceId > 0)
        {
            $transactionData = array
            (
                'vendor_id' => $vendorId,
                'transaction_date' => $invoiceDate,
                'transaction_number' => $invoiceNumber,
                'transaction_amount' => $invoiceAmount,
                'transaction_type' => 'invoice',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->db->where('id', (int) $invoiceId);
            $this->db->update('vendor_transaction', $transactionData);

            $invoiceData = array
            (
                'invoice_number' => $invoiceNumber,
                'invoice_date' => $invoiceDate,
                'vendor_id' => $vendorId,
                'supplier_ref' => $supplierRef,
                'other_reference' => $otherReference,
                'subtotal_amount' => $subTotalAmount,
                'overall_product_quantity' => $overallProductQuantity,
                'overall_cgst_amount' => $overallCGSTAmount,
                'overall_sgst_amount' => $overallSGSTAmount,
                'overall_gst_amount' => $overallGSTAmount,
                'total_amount' => $totalAmount,
                'discount_amount' => $discountAmount,
                'roundoff_amount' => $roundoffAmount,
                'invoice_amount' => $invoiceAmount,
                'gst_amount_in_word' => $gstAmountInWord,
                'invoice_amount_in_word' => $invoiceAmountInWord,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->db->where('id', (int) $invoiceId);
            $this->db->update('invoice', $invoiceData);

            if (!empty($invoiceArrayData)) {
                $this->db->where('invoice_id', $invoiceId);
                $this->db->delete('invoice_items');
        
                foreach ($invoiceArrayData as $row) {
                    $dbdata = array(
                        'invoice_id' => $invoiceId,
                        'product_id' => $row->productId,
                        'product_specification' => $row->productSpecification,
                        'product_quantity' => $row->productQuantity,
                        'product_price' => $row->productPrice,
                        'cgst_percentage' => $row->cgstPercentage,
                        'cgst_amount' => $row->cgstAmount,
                        'sgst_percentage' => $row->sgstPercentage,
                        'sgst_amount' => $row->sgstAmount,
                        'gst_amount' => $row->gstAmount,
                        'subtotal_amount' => $row->productSubtotalAmount,
                        'total_amount' => $row->productTotalAmount
                    );
                    $this->db->insert('invoice_items', $dbdata);
                }
            }
        }
        else
        {
            $transactionData = array
            (
                'vendor_id' => $vendorId,
                'transaction_date' => $invoiceDate,
                'transaction_number' => $invoiceNumber,
                'transaction_amount' => $invoiceAmount,
                'transaction_type' => 'invoice',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vendor_transaction', $transactionData);
            $invoiceId = $this->db->insert_id();

            $invoiceData = array
            (
                'token' => $token,
                'invoice_number' => $invoiceNumber,
                'invoice_date' => $invoiceDate,
                'vendor_id' => $vendorId,
                'supplier_ref' => $supplierRef,
                'other_reference' => $otherReference,
                'subtotal_amount' => $subTotalAmount,
                'overall_product_quantity' => $overallProductQuantity,
                'overall_cgst_amount' => $overallCGSTAmount,
                'overall_sgst_amount' => $overallSGSTAmount,
                'overall_gst_amount' => $overallGSTAmount,
                'total_amount' => $totalAmount,
                'discount_amount' => $discountAmount,
                'roundoff_amount' => $roundoffAmount,
                'invoice_amount' => $invoiceAmount,
                'gst_amount_in_word' => $gstAmountInWord,
                'invoice_amount_in_word' => $invoiceAmountInWord,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('invoice', $invoiceData);
            $invoiceId = $this->db->insert_id();

            if (!empty($invoiceArrayData)) {
              foreach ($invoiceArrayData as $row) {
                $dbdata = array(
                    'invoice_id' => $invoiceId,
                    'product_id' => $row->productId,
                    'product_specification' => $row->productSpecification,
                    'product_quantity' => $row->productQuantity,
                    'product_price' => $row->productPrice,
                    'cgst_percentage' => $row->cgstPercentage,
                    'cgst_amount' => $row->cgstAmount,
                    'sgst_percentage' => $row->sgstPercentage,
                    'sgst_amount' => $row->sgstAmount,
                    'gst_amount' => $row->gstAmount,
                    'subtotal_amount' => $row->productSubtotalAmount,
                    'total_amount' => $row->productTotalAmount
                );
                $this->db->insert('invoice_items', $dbdata);
                $this->db->insert_id();
              }
            }
            return $invoiceId;
        }
    }
}
?>