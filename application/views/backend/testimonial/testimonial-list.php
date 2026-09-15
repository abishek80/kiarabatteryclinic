<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>admin/testimonial/testimonial-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>admin/testimonial/testimonial-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>admin/testimonial/testimonial-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Testimonial Master List</h4>
                <a href="<?php echo base_url(); ?>admin/testimonial/testimonial_add" class="btn btn-primary px-4 py-2 rounded text-white"><i class="bx bx-plus me-1"></i> Add New Testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Reviewer Name</th>
                            <th>Location</th>
                            <th>Review Date</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            if(!empty($testimonialList)) {
                                foreach($testimonialList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <?php if(!empty($row->reviewer_img)) { ?>
                                    <img src="<?php echo (strpos($row->reviewer_img, 'http') === 0) ? $row->reviewer_img : base_url() . $row->reviewer_img; ?>" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" alt="Reviewer">
                                <?php } else { ?>
                                    <span class="badge bg-label-secondary"><i class="bx bx-user"></i></span>
                                <?php } ?>
                            </td>
                            <td><strong class="text-dark"><?php echo htmlspecialchars($row->title); ?></strong></td>
                            <td><?php echo htmlspecialchars($row->reviewer_name); ?></td>
                            <td><span class="text-muted"><?php echo htmlspecialchars($row->location); ?></span></td>
                            <td><?php echo !empty($row->review_date) ? date('d-m-Y', strtotime($row->review_date)) : '-'; ?></td>
                            <td>
                                <span class="text-warning fw-bold">
                                    <?php 
                                        $stars = (int)($row->star ?? 5);
                                        for($s = 1; $s <= 5; $s++) {
                                            echo ($s <= $stars) ? '★' : '☆';
                                        }
                                    ?>
                                </span>
                            </td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="<?php echo base_url(); ?>admin/testimonial/testimonial_status/<?php echo $row->id; ?>/inactive" class="text-success fw-bold" onclick="return confirm('Change status to Inactive?');"> Active </a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url(); ?>admin/testimonial/testimonial_status/<?php echo $row->id; ?>/active" class="text-danger fw-bold" onclick="return confirm('Change status to Active?');"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td class="px-2 text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover text-info" data-bs-toggle="modal" data-bs-target="#testimonialModal<?php echo $row->id; ?>" data-toggle="tooltip" title="View Details"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/testimonial/testimonial_edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/testimonial/testimonial_delete/' . $row->id; ?>" class="box-hover text-danger" onclick="return confirm('Are you sure you want to delete this testimonial?');" data-toggle="tooltip" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>

                                <!-- Testimonial Detail Modal Popup -->
                                <div class="modal fade text-start" id="testimonialModal<?php echo $row->id; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $row->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content rounded-3 border-0 shadow">
                                            <div class="modal-header border-bottom-0 pb-0 position-relative justify-content-center pt-4 px-4">
                                                <h4 class="modal-title fw-bold text-dark text-center w-100" id="modalLabel<?php echo $row->id; ?>">Testimonial Detail</h4>
                                                <button type="button" class="btn-close rounded-circle bg-light p-2 position-absolute end-0 me-4 mt-2 shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4 pt-3">
                                                <div class="row g-3">
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Title</h6>
                                                        <div class="text-secondary"><?php echo htmlspecialchars($row->title); ?></div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Reviewer Name</h6>
                                                        <div class="text-secondary"><?php echo htmlspecialchars($row->reviewer_name); ?></div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Location</h6>
                                                        <div class="text-secondary"><?php echo htmlspecialchars($row->location ?? '-'); ?></div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Review Date</h6>
                                                        <div class="text-secondary"><?php echo !empty($row->review_date) ? date('d-m-Y', strtotime($row->review_date)) : '-'; ?></div>
                                                    </div>

                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Star Rating</h6>
                                                        <div class="text-warning fw-bold fs-5">
                                                            <?php 
                                                                $stars = (int)($row->star ?? 5);
                                                                for($s = 1; $s <= 5; $s++) {
                                                                    echo ($s <= $stars) ? '★' : '☆';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Status</h6>
                                                        <div class="text-secondary"><?php echo ucfirst($row->status); ?></div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Created At</h6>
                                                        <div class="text-secondary"><?php echo !empty($row->created_at) ? date('d/m/Y h:i A', strtotime($row->created_at)) : '-'; ?></div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <h6 class="fw-bold text-dark mb-1">Reviewer Image</h6>
                                                        <div>
                                                            <?php if(!empty($row->reviewer_img)) { ?>
                                                                <img src="<?php echo (strpos($row->reviewer_img, 'http') === 0) ? $row->reviewer_img : base_url() . $row->reviewer_img; ?>" class="rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;" alt="Reviewer">
                                                            <?php } else { ?>
                                                                <span class="text-secondary">No Image</span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <h6 class="fw-bold text-dark mb-1">Description / Client Feedback</h6>
                                                        <div class="text-secondary bg-light p-3 rounded border" style="line-height: 1.6;">
                                                            <?php echo nl2br(htmlspecialchars($row->description)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php 
                                } 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
