<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>admin/gallery/gallery-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>admin/gallery/gallery-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Gallery List</h4>
                <a href="<?php echo base_url(); ?>admin/gallery/gallery-add" class="btn btn-primary px-4 py-2 rounded text-white">Create Gallery</a>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($galleryList as $row) { 
                                $dateObj = new DateTime($row->created_at);
                                $formattedDate = $dateObj->format('d-m-Y h:i A');
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><img src="<?php echo base_url() . $row->gallery_img; ?>" class="table-card" style="width: 60px; height: 50px; object-fit: cover;" alt="Gallery Image"></td>
                            <td><?php echo htmlspecialchars($row->gallery_name); ?></td>
                            <td><p class="one-line-clamp mb-0"><?php echo htmlspecialchars($row->description); ?></p></td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="gallery" data-link="<?php echo base_url(); ?>admin/gallery/gallery-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="gallery" data-link="<?php echo base_url(); ?>admin/gallery/gallery-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td><?php echo $formattedDate; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover viewGalleryBtn" 
                                       data-name="<?php echo htmlspecialchars($row->gallery_name); ?>" 
                                       data-img="<?php echo base_url() . $row->gallery_img; ?>" 
                                       data-desc="<?php echo htmlspecialchars($row->description); ?>" 
                                       data-status="<?php echo ucfirst($row->status); ?>" 
                                       data-date="<?php echo $formattedDate; ?>" 
                                       data-toggle="tooltip" data-placement="top" title="View Detail"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/gallery/gallery-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="gallery" data-link="<?php echo base_url(); ?>admin/gallery/gallery-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Detail Modal Preview -->
<div class="modal fade" id="viewGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 overflow-hidden border-0 shadow">
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold text-white mb-0"><i class="bx bx-image-alt me-2"></i> Gallery Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-5 text-center border-end">
                        <label class="w-100 fw-bold text-dark mb-2 text-start fs-14px">Gallery Image</label>
                        <a id="modalGalleryImgLink" href="#" data-lightbox="roadtrip">
                            <img id="modalGalleryImg" src="" class="img-fluid rounded-3 border shadow-sm" style="max-height: 260px; width: 100%; object-fit: cover;" alt="Gallery Image">
                        </a>
                        <small class="text-muted d-block mt-2"><i class="bx bx-search-alt me-1"></i> Click image to view full size</small>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3 pb-2 border-bottom">
                            <label class="w-100 fw-bold text-muted mb-1 text-uppercase" style="font-size: 12px; letter-spacing: 0.5px;">Gallery Name</label>
                            <h4 id="modalGalleryName" class="fw-bold text-dark mb-0 fs-5"></h4>
                        </div>
                        <div class="row mb-3 pb-2 border-bottom">
                            <div class="col-6">
                                <label class="w-100 fw-bold text-muted mb-1 text-uppercase" style="font-size: 12px; letter-spacing: 0.5px;">Status</label>
                                <span id="modalGalleryStatus" class="badge"></span>
                            </div>
                            <div class="col-6">
                                <label class="w-100 fw-bold text-muted mb-1 text-uppercase" style="font-size: 12px; letter-spacing: 0.5px;">Created At</label>
                                <p id="modalGalleryDate" class="text-dark mb-0 fw-semibold fs-14px"></p>
                            </div>
                        </div>
                        <div>
                            <label class="w-100 fw-bold text-muted mb-1 text-uppercase" style="font-size: 12px; letter-spacing: 0.5px;">Description</label>
                            <div id="modalGalleryDesc" class="p-3 bg-light rounded-3 text-dark fs-14px" style="min-height: 100px; max-height: 180px; overflow-y: auto; white-space: pre-wrap;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light py-2">
                <button type="button" class="btn btn-secondary px-4 py-2 rounded-2" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.viewGalleryBtn', function() {
        var name = $(this).data('name');
        var img = $(this).data('img');
        var desc = $(this).data('desc');
        var status = $(this).data('status');
        var date = $(this).data('date');

        $('#modalGalleryName').text(name);
        $('#modalGalleryImg').attr('src', img);
        $('#modalGalleryImgLink').attr('href', img);
        $('#modalGalleryDesc').text(desc);
        $('#modalGalleryDate').text(date);

        if (status.toLowerCase() === 'active') {
            $('#modalGalleryStatus').attr('class', 'badge bg-label-success fs-14px').text('Active');
        } else {
            $('#modalGalleryStatus').attr('class', 'badge bg-label-danger fs-14px').text('Inactive');
        }

        var myModal = new bootstrap.Modal(document.getElementById('viewGalleryModal'));
        myModal.show();
    });
</script>