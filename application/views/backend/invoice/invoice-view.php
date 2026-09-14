<style>
    .table> :not(caption)>*>* {
        font-size: 11px !important;
        padding: 3px 5px !important;
        vertical-align: middle !important;
    }
    .downloadInvoicePage p, 
    .downloadInvoicePage h5, 
    .downloadInvoicePage h6 {
        margin-bottom: 2px !important;
    }
    .downloadInvoicePage .py-2 {
        padding-top: 4px !important;
        padding-bottom: 4px !important;
    }
    .downloadInvoicePage .py-3 {
        padding-top: 6px !important;
        padding-bottom: 6px !important;
    }
    .downloadInvoicePage .mb-2 {
        margin-bottom: 4px !important;
    }
    .downloadInvoicePage .mt-5 {
        margin-top: 1.5rem !important;
    }
    td.p-2.border-start-0 {
        padding: 5px !important;
    }
</style>

<?php 
    $invoiceDateFormat = new DateTime($invoiceDate);
    $year = $invoiceDateFormat->format('Y');
    $month = $invoiceDateFormat->format('m');

    // Determine financial year
    if ($month >= 4) {
        // Financial year starts in April
        $fyStart = $year;
        $fyEnd = $year + 1;
    } else {
        $fyStart = $year - 1;
        $fyEnd = $year;
    }

    function indian_number_format($number) {
        $number = number_format($number, 2, '.', ''); // ensure 2 decimals
        $parts = explode('.', $number);
        $integer = $parts[0];
        $decimal = isset($parts[1]) ? '.' . $parts[1] : '';

        // Format integer part in Indian style
        $last3 = substr($integer, -3);
        $rest = substr($integer, 0, -3);
        if ($rest != '') {
            $rest = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $rest);
            $formatted = $rest . ',' . $last3;
        } else {
            $formatted = $last3;
        }

        return $formatted . $decimal;
    }
?>

<div class="p-0 bg-white a4-size downloadInvoicePage">
    <div class="border rounded-3 border-dark">
        <div class="border-bottom border-dark py-2">
            <div class="d-flex gap-3 justify-content-center align-items-center mb-2">
                <div>
                    <img src="<?php echo base_url(); ?>themes/backend/images/fav-icon.png" class="w-px-50" alt="logo">
                </div>
                <div>
                    <h5 class="mb-2 text-theme fw-bold"><?php echo $companyName; ?></h5>
                    <h6 class="mb-0 fw-semibold fs-13px"><?php echo $address; ?></h6>
                </div>
            </div>
            <div class="d-flex gap-4">
                <div class="w-100 d-flex gap-2 justify-content-center align-items-center">
                    <a href="tel:<?php echo $mobileNumber; ?>" class="mb-0 fw-semibold fs-13px text-black d-block"><?php echo $mobileNumber; ?></a>
                    <span class="text-black"> | </span>
                    <a href="tel:<?php echo $phoneNumber; ?>" class="mb-0 fw-semibold fs-13px text-black d-block"><?php echo $phoneNumber; ?></a>
                    <span class="text-black"> | </span>
                    <a href="mailto:<?php echo $emailId; ?>" class="mb-0 fw-semibold fs-13px text-black d-block text-lowercase"><?php echo $emailId; ?></a>
                    <span class="text-black"> | </span>
                    <p class="mb-0 fw-semibold fs-13px text-black d-block"><?php echo $gstNumber; ?></p>
                </div>
            </div>
        </div>
        <div class="row g-1 border-bottom border-dark">
            <div class="ps-2 col-6 border-end-dark py-2">
                <div class="h-100">
                    <p class="mb-1 fs-12px text-black">Buyer Details : </p>
                    <div class="ps-2">
                        <p class="mb-1 fs-13px text-black fw-semibold"><?php echo $vendorName; ?></p>
                        <p class="mb-0 fs-12px text-black"><?php echo $vendorAddress1; ?>, <?php echo $vendorAddress2; ?></p>
                        <p class="mb-0 fs-12px text-black"><?php echo $vendorMobileNumber; ?></p>
                        <p class="mb-0 fs-12px text-black"><?php echo $vendorEmail; ?></p>
                        <p class="mt-1 mb-0 fs-12px text-black fw-semibold">GST No : <?php echo $vendorGSTNumber; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row g-1 h-50">
                    <div class="p-2 col-6 border-end-dark">
                        <p class="mb-1 fs-12px text-black">Invoice No : </p>
                        <p class="mb-0 fs-13px ps-2 text-black fw-bold"><?php echo $invoiceNumber . '/' . $fyStart . '/' . $fyEnd; ?></p>
                    </div>
                    <div class="col-6 p-2">
                            <p class="mb-1 fs-12px text-black">Date : </p>
                            <p class="mb-0 fs-13px ps-2 text-black fw-bold"><?php echo $invoiceDateFormat->format('d-m-Y'); ?></p>
                    </div>
                </div>
                <div class="row g-1 h-50">
                    <div class="p-2 col-6 border-end-dark border-top border-dark">
                        <p class="mb-1 fs-12px text-black">Supplier's Ref : </p>
                        <p class="mb-0 fs-13px ps-2 text-black fw-bold"><?php echo $supplierRef; ?></p>
                    </div>
                    <div class="col-6 p-2 border-top border-dark">
                        <p class="mb-1 fs-12px text-black">Other Reference : </p>
                        <p class="mb-0 fs-13px ps-2 text-black fw-bold"><?php echo $otherReference; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <table class="text-black text-center p-1 mb-0 table table-bordered border-dark">
                <thead>
                    <tr class="border-0">
                        <th class="border-start-0 w-min-50">Sl. No</th>
                        <th class="border-start-0">List of Goods</th>
                        <th class="border-start-0">HSN/SAC</th>
                        <th class="border-start-0">Rate</th>
                        <th class="border-start-0">Qty</th>
                        <th class="border-start-0">Per</th>
                        <th class="border-start-0">CGST</th>
                        <th class="border-start-0">SGST</th>
                        <th class="border-end-0">Amount</th>
                    </tr>
                </thead>
                <tbody class="border-dark">
                    <?php $i =1; foreach($invoiceItemsList as $row) { ?>
                    <tr class="border-0">
                        <td class="border-start-0"><?php echo $i++; ?></td>
                        <td class="border-start-0 text-start fw-semibold"><?php echo $row->product_name; ?></td>
                        <td class="border-start-0"><?php echo $row->hsn_number; ?></td>
                        <td class="border-start-0 fw-bold text-end"><?php echo indian_number_format($row->product_price, 2); ?></td>
                        <td class="border-start-0"><?php echo $row->product_quantity; ?></td>
                        <td class="border-start-0"><?php echo $row->per_value; ?></td>
                        <td class="border-start-0 fw-bold text-end">
                            <div class="d-flex gap-1 justify-content-between">
                                <p class="mb-0"><?php echo $row->cgst_percentage; ?>%</p>
                                <p class="mb-0"><?php echo indian_number_format($row->cgst_amount, 2); ?></p>
                            </div>
                        </td>
                        <td class="border-start-0 fw-bold text-end">
                            <div class="d-flex gap-1 justify-content-between">
                                <p class="mb-0"><?php echo $row->sgst_percentage; ?>%</p>
                                <p class="mb-0"><?php echo indian_number_format($row->sgst_amount, 2); ?></p>
                            </div>
                        </td>
                        <td class="border-end-0 fw-bold text-end"><?php echo indian_number_format($row->subtotal_amount, 2); ?></td>
                    </tr>
                    <?php } ?>
                    <?php 
                    $itemCount = count($invoiceItemsList);
                    $emptyRowsNeeded = max(0, 5 - $itemCount);
                    for ($j = 0; $j < $emptyRowsNeeded; $j++) { 
                    ?>
                    <tr class="border-0">
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-start-0"></td>
                        <td class="p-2 border-end-0"></td>
                    </tr>
                    <?php } ?>
                    <tr class="border-0">
                        <td class="border-start-0"></td>
                        <td class="border-start-0 text-end fw-bold">Total</td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0 border-top border-dark fw-bold text-end"><?php echo indian_number_format($overallCGSTAmount, 2); ?></td>
                        <td class="border-start-0 border-top border-dark fw-bold text-end"><?php echo indian_number_format($overallSGSTAmount, 2); ?></td>
                        <td class="border-end-0 border-top border-dark fw-bold text-end"><?php echo indian_number_format($subtotalAmount, 2); ?></td>
                    </tr>
                    <tr class="border-0">
                        <td class="border-start-0"></td>
                        <td class="border-start-0 text-end">Discount Allowed</td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-end-0 fw-bold text-end"> - <?php echo indian_number_format($discountAmount, 2); ?></td>
                    </tr>
                    <tr class="border-0">
                        <td class="border-start-0"></td>
                        <td class="border-start-0 text-end">Round Off</td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-start-0"></td>
                        <td class="border-end-0 fw-bold text-end"> - <?php echo indian_number_format($roundoffAmount, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="border-start-0 text-end" colspan="4">Count</td>
                        <td class="border-start-0 fw-bold text-end"><?php echo $overallProductQuantity; ?> Nos</td>
                        <td class="border-start-0 text-end" colspan="2">Amount</td>
                        <td class="border-end-0 fw-bold text-end" colspan="2">Rs <?php echo indian_number_format($invoiceAmount, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="border-0 text-start" colspan="9">Amount Chargeable (in words) : <span class="fw-bold"> <?php echo $invoiceAmountInWord; ?> Only </span></td>
                    </tr>

                    
                    <tr>
                        <th class="border-start-0 text-end" colspan="2">HSN/SAC</th>
                        <th class="border-start-0 text-end" colspan="2">Taxable</th>
                        <th class="border-start-0 text-end">CGST %</th>
                        <th class="border-start-0 text-end">CGST ₹</th>
                        <th class="border-start-0 text-end">SGST %</th>
                        <th class="border-start-0 text-end">SGST ₹</th>
                        <th class="border-end-0 text-end">Tax Amount</th>
                    </tr>
                    <?php foreach($invoiceItemsGSTList as $row) { ?>
                        <tr>
                            <th class="border-start-0 text-end" colspan="2"><?php echo $row->hsn_number; ?></th>
                            <td class="border-start-0 text-end" colspan="2"><?php echo indian_number_format($row->subtotal_amount, 2); ?></td>
                            <td class="border-start-0 text-end"><?php echo $row->cgst_percentage; ?>%</td>
                            <td class="border-start-0 text-end"><?php echo indian_number_format($row->cgst_amount, 2); ?></td>
                            <td class="border-start-0 text-end"><?php echo $row->sgst_percentage; ?>%</td>
                            <td class="border-start-0 text-end"><?php echo indian_number_format($row->sgst_amount, 2); ?></td>
                            <td class="border-end-0 text-end"><?php echo indian_number_format($row->gst_amount, 2); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="border-start-0 fw-bold text-end" colspan="2">Total</td>
                        <td class="border-start-0 fw-bold text-end" colspan="2"><?php echo indian_number_format($subtotalAmount, 2); ?></td>
                        <td class="border-start-0 fw-bold text-end" colspan="2"><?php echo indian_number_format($overallCGSTAmount, 2); ?></td>
                        <td class="border-start-0 fw-bold text-end" colspan="2"><?php echo indian_number_format($overallSGSTAmount, 2); ?></td>
                        <td class="border-end-0 fw-bold text-end"><?php echo indian_number_format($overallGSTAmount, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="border-0 text-start" colspan="9">Tax Amount (in Words) : <span class="fw-bold"> <?php echo $gstAmountInWord; ?> Only </span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row g-1 border-bottom border-dark">
            <div class="ps-2 col-6 border-end-dark py-2">
                <div class="h-100">
                    <p class="mb-1 fs-12px text-black">Declaration : </p>
                    <div class="px-2">
                        <p class="mb-0 fs-12px text-black"><?php echo $declarationNote; ?></p>
                    </div>
                </div>
            </div>
            <div class="ps-2 col-6 py-2">
                <div class="h-100">
                    <p class="mb-1 fs-12px text-black">Bank Details : </p>
                    <div class="ps-2">
                        <div class="d-flex gap-2 align-items-center">
                            <p class="mb-0 fs-12px w-50 text-black">Bank Name</p>
                            <p class="mb-0 fs-12px w-100 text-black"><span class="me-3"> : </span><?php echo $bankName; ?></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <p class="mb-0 fs-12px w-50 text-black">A/c No</p>
                            <p class="mb-0 fs-12px w-100 text-black"><span class="me-3"> : </span><?php echo $accountNumber; ?></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <p class="mb-0 fs-12px w-50 text-black">Branch</p>
                            <p class="mb-0 fs-12px w-100 text-black"><span class="me-3"> : </span><?php echo $branchName; ?></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <p class="mb-0 fs-12px w-50 text-black">IFSC Code</p>
                            <p class="mb-0 fs-12px w-100 text-black"><span class="me-3"> : </span><?php echo $ifscCode; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-1">
            <div class="ps-3 col-6 border-end-dark py-2">
                <div class="h-100">
                    <p class="mb-0 fs-13px text-black">Customer's Seal and Signature </p>
                </div>
            </div>
            <div class="ps-2 col-6 py-2">
                <div class="h-100">
                    <p class="mb-0 fs-13px text-black text-end pe-4">For <?php echo $companyName; ?></p>
                    <p class="mb-0 mt-5 fs-13px text-black text-end pe-4">Authorized Signature</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-3 justify-content-center removePrint my-2">
    <a href="javascript:void(0);" id="downloadInvoicePDF" class="btn btn-success">Download</a>
    <a href="javascript:window.print();" class="btn btn-primary">Print</a>
    <a href="javascript:void(0);" data-rowid="<?php echo $invoiceId; ?>" data-tablename="invoice" data-link="<?php echo base_url() . 'admin/invoice/invoice-list/'; ?>" class="btn btn-danger trashItem">Delete</a>
</div>

<script>
    document.getElementById("downloadInvoicePDF").addEventListener("click", function () {
        // Select the div you want to download as PDF
        var element = document.querySelector('.downloadInvoicePage');
        
        // Use html2pdf to download it
        var vendorName = "<?php echo $vendorName . ' - Invoice Bill - ' . $invoiceNumber . ' - ' . $invoiceDateFormat->format('d-m-Y'); ?>"; // Get PHP variable in JavaScript
        var fileName = vendorName + '.pdf'; // Concatenate the filename
        
        html2pdf(element, {
            margin:       0,        // Margins in cm
            filename:     fileName,  // Use the concatenated filename
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },      // Increase canvas resolution
            jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
        });
    });
</script>