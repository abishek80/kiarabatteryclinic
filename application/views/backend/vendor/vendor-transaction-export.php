<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="" class="mb-3 removePrint card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" id="getTransactionReport" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Generate Report</button>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                    <input name="vendor_id" id="vendor_id" type="hidden" class="form-control vendorId" value="<?php echo $vendorId; ?>">
                    <input type="text" readonly class="form-control" placeholder="Enter vendor Name" value="<?php echo $vendorName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Start Date <span class="text-danger">*</span></label>
                    <input name="start_date" id="start_date" type="text" class="form-control startDate date-picker" placeholder="Enter Start Date" value="<?php echo $startDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">End Date <span class="text-danger">*</span></label>
                    <input name="end_date" id="end_date" type="text" class="form-control endDate date-picker" placeholder="Enter End Date" value="<?php echo $endDate; ?>">
                </div>
            </div>
            <?php if($reportOverallInvoiceAmount != 0.00 || $reportOverallPaymentAmount != 0.00 || $reportOverallBalanceAmount != 0.00) { ?>
                <div class="mt-3 d-flex justify-content-end">
                    <a href="javascript:void(0);" id="exportTransactionPDF" class="btn btn-primary px-4 py-2 rounded text-white">Export PDF</a>
                </div>
            <?php } ?>
        </form>
        <?php if($reportOverallInvoiceAmount != 0.00 || $reportOverallPaymentAmount != 0.00 || $reportOverallBalanceAmount != 0.00) { ?>
            <div class="transactionReportSection">
                <div class="card shadow-none p-3">
                    <div class="border rounded-3 border-dark">
                        <div class="border-bottom border-dark py-2">
                            <div class="d-flex gap-3 justify-content-center align-items-center mb-2">
                                <div>
                                    <img src="<?php echo base_url(); ?>themes/backend/images/fav-icon.png" class="w-px-50" alt="logo">
                                </div>
                                <div>
                                    <h5 class="mb-2 text-theme fw-bold"><?php echo $companyName; ?></h3>
                                    <h6 class="mb-0 fw-semibold fs-14px"><?php echo $address; ?></h6>
                                </div>
                            </div>
                            <div class="d-flex gap-4">
                                <div class="w-100 d-flex gap-2 justify-content-center align-items-center">
                                    <a href="tel:<?php echo $mobileNumber; ?>" class="mb-0 fw-semibold fs-14px text-black d-block"><?php echo $mobileNumber; ?></a>
                                    <span class="text-black"> | </span>
                                    <a href="tel:<?php echo $phoneNumber; ?>" class="mb-0 fw-semibold fs-14px text-black d-block"><?php echo $phoneNumber; ?></a>
                                    <span class="text-black"> | </span>
                                    <a href="mailto:<?php echo $emailId; ?>" class="mb-0 fw-semibold fs-14px text-black d-block text-lowercase"><?php echo $emailId; ?></a>
                                    <span class="text-black"> | </span>
                                    <p class="mb-0 fw-semibold fs-14px text-black d-block"><?php echo $gstNumber; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-1 border-bottom border-dark">
                            <div class="p-2 col-6 border-end-dark">
                                <div class="h-100">
                                    <p class="mb-1 fs-13px text-black">Buyer Details : </p>
                                    <div class="ps-2">
                                        <p class="mb-1 fs-14px text-black fw-semibold"><?php echo $vendorName; ?></p>
                                        <p class="mb-0 fs-13px text-black"><?php echo $vendorAddress1; ?></p>
                                        <p class="mb-0 fs-13px text-black"><?php echo $vendorAddress2; ?></p>
                                        <p class="mb-0 fs-13px text-black"><?php echo $vendorMobileNumber; ?></p>
                                        <p class="mb-0 fs-13px text-black"><?php echo $vendorEmail; ?></p>
                                        <p class="mt-1 mb-0 fs-13px text-black fw-semibold">GST No : <?php echo $vendorGSTNumber; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 col-6">
                                <p class="mb-1 fw-semibold text-black fs-14px">Overall Transaction Balance</p>
                                <div class="row g-3 mb-3">
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Bill Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $overallInvoiceAmount; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Paid Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $overallPaymentAmount; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Bal. Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $overallBalanceAmount; ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 fw-semibold text-black fs-14px">Opening Transaction Balance</p>
                                <div class="row g-3">
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Bill Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $openingOverallInvoiceAmount; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Paid Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $openingOverallPaymentAmount; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="">
                                            <p class="mb-1 text-black">Bal. Amt</p>
                                            <h6 class="mb-0 amount-format fw-semibold"><?php echo $openingOverallBalanceAmount; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <div class="row gx-3 gy-2 mb-3 text-center">
                                <div class="col-12">
                                    <p class="mb-0 fw-semibold text-black fs-14px">Report Transaction Balance</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="">
                                        <p class="mb-1 text-black">Bill Amount</p>
                                        <h6 class="mb-0 amount-format fw-semibold"><?php echo $reportOverallInvoiceAmount; ?></h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="">
                                        <p class="mb-1 text-black">Paid Amount</p>
                                        <h6 class="mb-0 amount-format fw-semibold"><?php echo $reportOverallPaymentAmount; ?></h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="">
                                        <p class="mb-1 text-black">Balance Amount</p>
                                        <h6 class="mb-0 amount-format fw-semibold"><?php echo $reportOverallBalanceAmount; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Transaction Date</th>
                                            <th>Invoice Number</th>
                                            <th>Transaction Number</th>
                                            <th>Product Count</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0 text-dark">
                                        <?php
                                            $i=1;
                                            foreach($vendorTransactionList as $row) { 
                                                // Get the transaction date
                                                $transactionDate = new DateTime($row->transaction_date);
                                                $year = (int)$transactionDate->format('Y');
                                                $month = (int)$transactionDate->format('m');
        
                                                // India’s financial year runs from April 1 to March 31
                                                if ($month >= 4) {
                                                    // e.g., if date is June 2025 → FY 2025-2026
                                                    $fyStart = $year;
                                                    $fyEnd = $year + 1;
                                                } else {
                                                    // e.g., if date is February 2025 → FY 2024-2025
                                                    $fyStart = $year - 1;
                                                    $fyEnd = $year;
                                                }
                                            ?>
        
                                            <tr>
                                                <td class="border-top-0"><?php echo $i++; ?></td>
                                                <td class="border-top-0"><?php echo $transactionDate->format('d-m-Y'); ?></td>
                                                <?php if($row->transaction_type == 'invoice') { ?>
                                                    <td class="border-top-0"><?php echo $row->invoice_number . '/' . $fyStart . '/' . $fyEnd; ?></td>
                                                <?php } else { ?>
                                                    <td class="border-top-0">-</td>
                                                <?php } ?>
                                                <?php if($row->transaction_type == 'payment') { ?>
                                                    <td class="border-top-0"><?php echo $row->transaction_number; ?></td>
                                                <?php } else { ?>
                                                    <td class="border-top-0">-</td>
                                                <?php } ?>
                                                <?php if($row->overall_product_quantity != '') { ?>
                                                    <td class="border-top-0"><?php echo $row->overall_product_quantity; ?></td>
                                                <?php } else { ?>
                                                    <td class="border-top-0">-</td>
                                                <?php } ?>
                                                <td class="border-top-0"><?php echo $row->transaction_amount; ?></td>
                                                <?php if($row->transaction_method != '') { ?>
                                                    <td class="border-top-0"><?php echo $row->transaction_method; ?></td>
                                                <?php } else { ?>
                                                    <td class="border-top-0">-</td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#getTransactionReport').on('click', function (e) {
            if ($('#vendor_id').val() == '' || $('#start_date').val() == '' || $('#end_date').val() == '') {
                alert('Please select all fields');
                return false;
            }
        });
    });
    
    document.getElementById("exportTransactionPDF").addEventListener("click", function () {
        // Select the div you want to download as PDF
        var element = document.querySelector('.transactionReportSection');
        
        // Use html2pdf to download it
        var vendorName = "<?= $vendorName; ?> - Transaction Report - <?= date('d-m-Y', strtotime($startDate)) ?> to <?= date('d-m-Y', strtotime($endDate)) ?>"; // Get PHP variable in JavaScript
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