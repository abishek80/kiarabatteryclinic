<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="blogForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/blog/blog-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark">Blog View</h4>
                </div>
                <div>
                    <?php if($status == 'active') { ?>
                        <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $blogId; ?>" data-tablename="blog" data-link="<?php echo base_url() . 'admin/blog/blog-view/' . $blogId; ?>" class="px-4 py-2 rounded bg-success text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                    <?php } elseif($status == 'inactive') { ?>
                        <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $blogId; ?>" data-tablename="blog" data-link="<?php echo base_url() . 'admin/blog/blog-view/' . $blogId; ?>" class="px-4 py-2 rounded bg-danger text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                    <?php } ?>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Blog Date</label>
                    <p class="mb-0 text-black"><?php echo $blogDate; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Blog Name</label>
                    <p class="mb-0 text-black"><?php echo $blogName; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Blog Img</label>
                    <a href="<?php echo base_url() . $blogImg; ?>" class="fw-semibold" data-lightbox="roadtrip">View Blog Image</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Created At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($createdAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Short Description</label>
                    <p class="mb-0 text-black"><?php echo $shortDescription; ?></p>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Description</label>
                    <p class="mb-0 text-black"><?php echo $description; ?></p>
                </div>
            </div>
        </form>
    </div>
</section>