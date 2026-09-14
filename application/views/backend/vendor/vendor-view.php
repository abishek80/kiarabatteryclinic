<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="vendorForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/vendor/vendor-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark">Vendor View</h4>
                </div>
                <div>
                    <?php if($status == 'active') { ?>
                        <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $vendorId; ?>" data-tablename="vendor" data-link="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="px-4 py-2 rounded bg-success text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                    <?php } elseif($status == 'inactive') { ?>
                        <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $vendorId; ?>" data-tablename="vendor" data-link="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="px-4 py-2 rounded bg-danger text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                    <?php } ?>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Vendor Name</label>
                    <p class="mb-2 text-black"><?php echo $vendorName; ?></p>
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Vendor GST Number</label>
                    <p class="mb-0 text-black"><?php echo $vendorGSTNumber; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <?php if($vendorMobileNumber) { ?>
                        <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Vendor Mobile Number</label>
                        <a href="tel:<?php echo $vendorMobileNumber; ?>" class="a-hover d-block mb-2"><?php echo $vendorMobileNumber; ?></a>
                    <?php } ?>
                    <?php if($vendorEmail) { ?>
                        <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Vendor Email</label>
                        <a href="mailto:<?php echo $vendorEmail; ?>" class="a-hover d-block mb-0"><?php echo $vendorEmail; ?></a>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Vendor Address</label>
                    <p class="mb-1 text-black"><?php echo $vendorAddress1; ?></p>
                    <p class="mb-0 text-black"><?php echo $vendorAddress2; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Created At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($createdAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Updated At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($updatedAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
            </div>
        </form>
        <div class="nav-align-top mt-4">
            <div class="row g-3 mb-3">
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-3">Invoice Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallInvoiceAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-3">Paid Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallPaymentAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-3">Balance Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallBalanceAmount; ?></h5>
                    </div>
                </div>
            </div>
            
            <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center mb-3">
                <ul class="nav nav-pills gap-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#notreceived_list" aria-controls="notreceived_list" aria-selected="true"> Invoice List </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#received_list" aria-controls="received_list" aria-selected="true"> Paid Bill List </button>
                    </li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-transaction-add/' . $vendorId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Create Transaction Bill</a>
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-transaction-export/?vendor_id=' . $vendorId; ?>" class="btn btn-danger px-4 py-2 rounded text-white">Export</a>
                </div>
            </div>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="notreceived_list" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <h4 class="fw-bold mb-0 text-black">Invoice List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Product Count</th>
                                    <th>Invoice Amount</th>
                                    <th>Status</th>
                                    <th class="w-min-40">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($vendorInvoiceList as $row) {
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
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->transaction_number . '/' . $fyStart . '/' . $fyEnd; ?></td>
                                        <td><?php echo $transactionDate->format('d-m-Y'); ?></td>
                                        <td><?php echo $row->overall_product_quantity; ?></td>
                                        <td class="amount-format"><?php echo $row->transaction_amount; ?></td>
                                        <td>
                                            <?php if($row->status == 'paid') { ?>
                                                <a href="javascript:void(0);" data-value="not_paid" data-rowid="<?php echo $row->invoice_id; ?>" data-tablename="invoice" data-link="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Paid </a>
                                            <?php } elseif($row->status == 'not_paid') { ?>
                                                <a href="javascript:void(0);" data-value="paid" data-rowid="<?php echo $row->invoice_id; ?>" data-tablename="invoice" data-link="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Not Paid </a>
                                            <?php } ?>
                                        </td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'admin/invoice/invoice-view/' . $row->invoice_id; ?>" target="_blank" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-show"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="received_list" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <h4 class="fw-bold mb-0 text-black">Paid Bill List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Transaction No</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th class="w-min-40">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($vendorPaymentList as $row) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->transaction_number; ?></td>
                                        <td><?php $dateFormat = new DateTime($row->transaction_date); echo $dateFormat->format('d - m - Y'); ?></td>
                                        <td class="amount-format"><?php echo $row->transaction_amount; ?></td>
                                        <td><?php echo $row->transaction_method; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'admin/vendor/vendor-transaction-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vendor_transaction" data-link="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>