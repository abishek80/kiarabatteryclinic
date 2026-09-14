<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/enquiry/product-enquiry">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Product Enquiry Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($productEnquiryList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-primary d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-message-detail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/enquiry/contact-enquiry">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Contact Enquiry Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($contactEnquiryList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-danger d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-message-detail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/invoice/invoice-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Invoice Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($invoiceList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-primary d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-note"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/product/product-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Product Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($productList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-info d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/vendor/vendor-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Vendor Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($vendorList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-dark d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/category/category-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Category Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($categoryList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-success d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-category"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/service/service-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Service Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($serviceList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-success d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-spreadsheet"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="<?php echo base_url(); ?>admin/gallery/gallery-list">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-2 text-black fs-5 fw-semibold">Gallery Count</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0"><?php echo count($galleryList); ?></h4>
                                        <div class="card-title mb-0">
                                            <div class="avatar flex-shrink-0 bg-label-warning d-flex justify-content-center align-items-center rounded-2">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 pt-2">
            <h4 class="fw-bold mb-3 text-gray">Product Enquiry List</h4>
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="data-table table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach($productEnquiryList as $row) { 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->product_name; ?></td>
                                <td><?php echo $row->quantity; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><a href="mailto:<?php echo $row->email; ?>" class="text-lowercase"><?php echo $row->email; ?></a></td>
                                <td><a href="tel:<?php echo $row->mobile_number; ?>"><?php echo $row->mobile_number; ?></a></td>
                                <td><?php echo $row->message; ?></td>
                                <td><?php $dateFormat = new DateTime($row->created_at); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                                <td>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="product_enquiry" data-link="<?php echo base_url(); ?>admin" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4 pt-2">
            <h4 class="fw-bold mb-3 text-gray">Contact Enquiry List</h4>
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="data-table table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach($contactEnquiryList as $row) { 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><a href="mailto:<?php echo $row->email; ?>" class="text-lowercase"><?php echo $row->email; ?></a></td>
                                <td><a href="tel:<?php echo $row->mobile_number; ?>"><?php echo $row->mobile_number; ?></a></td>
                                <td><?php echo $row->subject; ?></td>
                                <td><?php echo $row->message; ?></td>
                                <td><?php $dateFormat = new DateTime($row->created_at); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                                <td>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="contact_enquiry" data-link="<?php echo base_url(); ?>admin" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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