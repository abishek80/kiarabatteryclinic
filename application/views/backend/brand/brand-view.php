<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/brand/brand-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark">Brand Details</h4>
                </div>
                <div>
                    <a href="<?php echo base_url() . 'admin/brand/brand_edit/' . $brandId; ?>" class="btn btn-primary px-4 py-2 rounded text-white"><i class="bx bx-edit-alt me-1"></i> Edit Brand</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <?php if(!empty($brandImg)) { ?>
                        <a href="<?php echo base_url() . $brandImg; ?>" data-lightbox="roadtrip">
                            <img src="<?php echo base_url() . $brandImg; ?>" class="img-fluid rounded border p-2" style="max-height: 200px; object-fit: contain;" alt="Brand Logo">
                        </a>
                    <?php } else { ?>
                        <div class="p-4 bg-light rounded text-muted">No Image Uploaded</div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Brand Title:</th>
                            <td><h5 class="fw-bold text-dark mb-0"><?php echo $brandName; ?></h5></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <?php if($status == 'active') { ?>
                                    <span class="badge bg-success">Active</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Inactive</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td><?php $dateFormat = new DateTime($createdAt); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
