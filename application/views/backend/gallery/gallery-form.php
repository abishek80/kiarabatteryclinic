<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="galleryForm" method="post" enctype="multipart/form-data" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" id="saveGalleryBtn" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="gallery_id" id="gallery_id" type="hidden" class="form-control" value="<?php echo $galleryId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $galleryToken; ?>">
            <div class="row g-3">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Gallery Name <span class="text-danger">*</span></label>
                    <input name="gallery_name" id="gallery_name" type="text" class="form-control generate_token" placeholder="Enter Gallery Name" value="<?php echo $galleryName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>

                <!-- Gallery Multi Image Upload Section -->
                <div class="col-12">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                        <div>
                            <label class="fw-bold text-dark fs-14px mb-1">
                                Gallery Images (Multi-Upload) <span class="text-danger">*</span>
                            </label>
                            <p class="text-muted mb-0 fs-12px">Upload single or multiple images. You can preview, add more, and remove unwanted photos before saving.</p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="badge bg-primary px-3 py-2" id="imageCountBadge">0 Images</span>
                        </div>
                    </div>

                    <!-- Dropzone / Picker -->
                    <div id="gallery_drop_area" class="border border-2 border-dashed rounded-3 p-4 text-center bg-white transition-all" style="cursor: pointer; border-color: #c4cdd5 !important;">
                        <input name="gallery_img[]" id="gallery_img" type="file" class="d-none" multiple accept="image/png, image/jpeg, image/jpg, image/webp">
                        <div class="py-2">
                            <i class="bx bx-cloud-upload display-5 text-primary mb-2"></i>
                            <h6 class="fw-bold mb-1 text-dark">Click to browse or drag &amp; drop images here</h6>
                            <p class="text-muted fs-12px mb-2">Supports JPG, JPEG, PNG, WEBP &bull; Select multiple files at once</p>
                            <button type="button" class="btn btn-sm btn-outline-primary px-3" onclick="$('#gallery_img').trigger('click');">
                                <i class="bx bx-plus me-1"></i> Choose Images
                            </button>
                        </div>
                    </div>

                    <!-- Preview Gallery Container -->
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold text-dark fs-14px mb-0">Selected Images Preview</h6>
                            <button type="button" class="btn btn-link text-danger p-0 fs-12px text-decoration-none d-none" id="clearAllNewBtn">
                                <i class="bx bx-trash me-1"></i> Clear all new
                            </button>
                        </div>
                        <div id="gallery_preview_container" class="d-flex flex-wrap gap-3 align-items-start p-3 bg-white rounded-3 border" style="min-height: 120px;">
                            <!-- Existing images (in Edit mode) -->
                            <?php if (!empty($galleryImgs)): ?>
                                <?php foreach ($galleryImgs as $idx => $imgItem): 
                                    $cleanPath = ltrim($imgItem, './');
                                    $fullUrl = (strpos($imgItem, 'http') === 0) ? $imgItem : base_url($cleanPath);
                                ?>
                                    <div class="preview-card position-relative border rounded-3 p-1 shadow-sm bg-white existing-img-item" id="existing_card_<?php echo $idx; ?>" style="width: 120px;">
                                        <a href="<?php echo $fullUrl; ?>" data-lightbox="gallery-preview" title="Saved Image">
                                            <img src="<?php echo $fullUrl; ?>" class="rounded-2 w-100" style="height: 100px; object-fit: cover;" alt="Gallery Image">
                                        </a>
                                        <span class="badge bg-secondary position-absolute bottom-0 start-0 m-2 px-1 py-0 fs-10px">Saved</span>
                                        <button type="button" class="btn btn-danger btn-sm rounded-circle position-absolute top-0 end-0 m-1 p-0 d-flex align-items-center justify-content-center shadow remove-existing-btn" 
                                                data-card="#existing_card_<?php echo $idx; ?>" 
                                                style="width: 22px; height: 22px; line-height: 1;" 
                                                title="Remove Image">
                                            <i class="bx bx-x fs-6"></i>
                                        </button>
                                        <input type="hidden" name="retained_images[]" value="<?php echo htmlspecialchars($imgItem); ?>">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <!-- Container for new file previews -->
                            <div id="new_previews_wrapper" class="d-flex flex-wrap gap-3"></div>

                            <!-- Empty placeholder state -->
                            <div id="empty_preview_placeholder" class="text-center w-100 py-4 text-muted <?php echo (!empty($galleryImgs)) ? 'd-none' : ''; ?>">
                                <i class="bx bx-image fs-1 text-secondary opacity-50 mb-1 d-block"></i>
                                <span class="fs-13px">No images selected yet. Please upload one or more images.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 140px;" placeholder="Enter Description"><?php echo $description; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Master DataTransfer object to hold all currently selected new files
    var dt = new DataTransfer();

    function updateImageCount() {
        var existingCount = $('.existing-img-item').length;
        var newCount = dt.files.length;
        var total = existingCount + newCount;
        $('#imageCountBadge').text(total + (total === 1 ? ' Image' : ' Images'));
        
        if (total === 0) {
            $('#empty_preview_placeholder').removeClass('d-none');
        } else {
            $('#empty_preview_placeholder').addClass('d-none');
        }

        if (newCount > 0) {
            $('#clearAllNewBtn').removeClass('d-none');
        } else {
            $('#clearAllNewBtn').addClass('d-none');
        }
    }

    // Initial count on page load
    updateImageCount();

    // Drag and drop handlers on dropzone
    var dropArea = document.getElementById('gallery_drop_area');
    if (dropArea) {
        dropArea.addEventListener('click', function(e) {
            if (!$(e.target).is('button') && !$(e.target).closest('button').length) {
                $('#gallery_img').trigger('click');
            }
        });

        ['dragenter', 'dragover'].forEach(function(eventName) {
            dropArea.addEventListener(eventName, function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropArea.style.borderColor = '#696cff';
                dropArea.style.backgroundColor = '#f8f9ff';
            }, false);
        });

        ['dragleave', 'drop'].forEach(function(eventName) {
            dropArea.addEventListener(eventName, function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropArea.style.borderColor = '#c4cdd5';
                dropArea.style.backgroundColor = '#ffffff';
            }, false);
        });

        dropArea.addEventListener('drop', function(e) {
            var files = e.dataTransfer.files;
            if (files && files.length > 0) {
                handleSelectedFiles(files);
            }
        }, false);
    }

    // File input change handler
    $('#gallery_img').on('change', function() {
        if (this.files && this.files.length > 0) {
            handleSelectedFiles(this.files);
        }
    });

    // Process files and append to DataTransfer
    function handleSelectedFiles(files) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (file.type.match('image.*')) {
                dt.items.add(file);
            } else {
                if (typeof toastr !== 'undefined') {
                    toastr.warning(file.name + ' is not an image file (allowed: JPG, PNG, WEBP)');
                }
            }
        }
        // Synchronize file input with DataTransfer
        document.getElementById('gallery_img').files = dt.files;
        renderNewPreviews();
        updateImageCount();
    }

    // Render previews for all files in dt
    function renderNewPreviews() {
        var $wrapper = $('#new_previews_wrapper');
        $wrapper.empty();

        var files = dt.files;
        if (files.length === 0) return;

        Array.from(files).forEach(function(file, index) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var cardHtml = `
                    <div class="preview-card position-relative border rounded-3 p-1 shadow-sm bg-white new-preview-item" id="new_card_${index}" style="width: 120px;">
                        <a href="${e.target.result}" data-lightbox="gallery-preview" title="${file.name}">
                            <img src="${e.target.result}" class="rounded-2 w-100" style="height: 100px; object-fit: cover;" alt="Preview">
                        </a>
                        <span class="badge bg-success position-absolute bottom-0 start-0 m-2 px-1 py-0 fs-10px">New</span>
                        <button type="button" class="btn btn-danger btn-sm rounded-circle position-absolute top-0 end-0 m-1 p-0 d-flex align-items-center justify-content-center shadow remove-new-btn" 
                                data-index="${index}" 
                                style="width: 22px; height: 22px; line-height: 1;" 
                                title="Remove this image">
                            <i class="bx bx-x fs-6"></i>
                        </button>
                        <div class="text-truncate fs-11px text-muted mt-1 px-1" title="${file.name}">${file.name}</div>
                    </div>
                `;
                $wrapper.append(cardHtml);
            };
            reader.readAsDataURL(file);
        });
    }

    // Remove newly added file
    $(document).on('click', '.remove-new-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var removeIdx = parseInt($(this).data('index'));
        var newDt = new DataTransfer();
        for (var i = 0; i < dt.files.length; i++) {
            if (i !== removeIdx) {
                newDt.items.add(dt.files[i]);
            }
        }
        dt = newDt;
        document.getElementById('gallery_img').files = dt.files;
        renderNewPreviews();
        updateImageCount();
    });

    // Remove existing saved file
    $(document).on('click', '.remove-existing-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var cardSelector = $(this).data('card');
        $(cardSelector).fadeOut(200, function() {
            $(this).remove();
            updateImageCount();
        });
    });

    // Clear all new files
    $('#clearAllNewBtn').on('click', function(e) {
        e.preventDefault();
        dt = new DataTransfer();
        document.getElementById('gallery_img').files = dt.files;
        renderNewPreviews();
        updateImageCount();
    });

    // Gallery Save Function
    $("#galleryForm").validate({
        rules: {
            gallery_name: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            gallery_name: {
                required: "Please Enter Gallery Name",
            },
            description: {
                required: "Please Enter Description",
            }
        },
        submitHandler: function (form) {
            var existingCount = $('.existing-img-item').length;
            var newCount = dt.files.length;
            if (existingCount + newCount === 0) {
                toastr.error('Please upload or retain at least one gallery image');
                return false;
            }

            var data = new FormData($('#galleryForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/gallery/galleryFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                    $('#saveGalleryBtn').prop('disabled', true).text('Saving...');
                },
                success: function (data) {
                    $(".loader").hide();
                    $('#saveGalleryBtn').prop('disabled', false).text('Save');
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    };
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>admin/gallery/gallery-list";
                        }, 1500);
                    }
                },
                error: function() {
                    $(".loader").hide();
                    $('#saveGalleryBtn').prop('disabled', false).text('Save');
                    toastr.error('An unexpected error occurred while saving the gallery.');
                }
            });
            return false;
        }
    });
</script>