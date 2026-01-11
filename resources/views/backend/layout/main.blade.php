<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>@yield('title')</title>
    <!-- favicon end -->
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.webp') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/slicknav.min.css') }}">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('backend/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <!-- modernizr css -->

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

    <script src="{{ asset('backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery-2.2.4.min.js') }}"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include('backend.layout.include.sidebar')
        <!-- main content area start -->
        <div class="main-content">
            @include('backend.layout.include.header-area')
            <div class="main-content-inner">

                @yield('main.content')

            </div>
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>Powered By: <a href="">ak Watches</a></p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('backend/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('backend/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('backend/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <!-- datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- datatable js -->
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('backend/js/summernote.min.js') }}"></script>
    <script>
        $(function () {
            $('.add-variant').on('click', function () {
                let newVariant = $(this).closest('.variant-item').clone();
                newVariant.find('input, select').val('');
                newVariant.find('.add-variant')
                    .removeClass('btn-success add-variant')
                    .addClass('btn-danger remove-variant')
                    .text('-');
                $('#variant-container').append(newVariant);
            });

            $(document).on('click', '.remove-variant', function () {
                $(this).closest('.variant-item').remove();
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function () {

            let imageFiles = [];
            let videoFiles = [];

            // ===== IMAGE UPLOAD =====
            $('#imageUploadBox').click(function () {
                $('#imageInput').click();
            });

            $('#imageInput').on('change', function (e) {
                const files = Array.from(e.target.files);

                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        imageFiles.push(file);

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const box = $(`
                        <div class="preview-box">
                            <img src="${e.target.result}">
                            <i class="fa fa-trash delete-icon text-dark"></i>
                        </div>
                    `);

                            // delete preview
                            box.find('.delete-icon').click(function () {
                                const index = $('.preview-box').index(box);
                                imageFiles.splice(index, 1);
                                box.remove();
                                updateImageInput();
                            });

                            $('#imageUploadBox').before(box);
                        };
                        reader.readAsDataURL(file);
                    }
                });
                updateImageInput();
            });

            function updateImageInput() {
                const dt = new DataTransfer();
                imageFiles.forEach(file => dt.items.add(file));
                document.getElementById('imageInput').files = dt.files;
            }

            // ===== VIDEO UPLOAD =====
            $('#videoUploadBox').click(function () {
                $('#videoInput').click();
            });

            $('#videoInput').on('change', function (e) {
                const files = Array.from(e.target.files);

                files.forEach(file => {
                    if (file.type.startsWith('video/')) {
                        videoFiles.push(file);

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const box = $(`
                        <div class="preview-box">
                            <video src="${e.target.result}" controls muted></video>
                            <i class="fa fa-trash delete-icon text-dark"></i>
                        </div>
                    `);

                            // delete preview
                            box.find('.delete-icon').click(function () {
                                const index = $('.preview-box').index(box);
                                videoFiles.splice(index, 1);
                                box.remove();
                                updateVideoInput();
                            });

                            $('#videoUploadBox').before(box);
                        };
                        reader.readAsDataURL(file);
                    }
                });
                updateVideoInput();
            });

            function updateVideoInput() {
                const dt = new DataTransfer();
                videoFiles.forEach(file => dt.items.add(file));
                document.getElementById('videoInput').files = dt.files;
            }
        });
    </script> -->
    <script>
$(document).ready(function () {

    let imageFiles = [];
    let videoFiles = [];

    // ===== IMAGE UPLOAD =====
    $('#imageUploadBox').click(function () {
        $('#imageInput').click();
    });

    $('#imageInput').on('change', function (e) {
        const files = Array.from(e.target.files);

        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                imageFiles.push(file);

                const reader = new FileReader();
                reader.onload = function (e) {
                    const box = $(`
                        <div class="preview-box">
                            <img src="${e.target.result}">
                            <i class="fa fa-trash delete-icon text-dark"></i>
                        </div>
                    `);

                    // delete preview
                    box.find('.delete-icon').click(function () {
                        const index = $('#imagePreviewContainer .preview-box').index(box);
                        imageFiles.splice(index, 1);
                        box.remove();
                        updateImageInput();
                    });

                    $('#imageUploadBox').before(box);
                };
                reader.readAsDataURL(file);
            }
        });
        updateImageInput();
    });

    function updateImageInput() {
        const dt = new DataTransfer();
        imageFiles.forEach(file => dt.items.add(file));
        document.getElementById('imageInput').files = dt.files;
    }

    // Delete existing images (edit form)
    $(document).on('click', '.existing-media img + .delete-icon', function () {
        const box = $(this).closest('.existing-media');
        const inputVal = box.find('input[name="old_images[]"]').val();
        box.remove();

        $('<input>').attr({
            type: 'hidden',
            name: 'delete_images[]',
            value: inputVal
        }).appendTo('form');
    });

    // ===== VIDEO UPLOAD =====
    $('#videoUploadBox').click(function () {
        $('#videoInput').click();
    });

    $('#videoInput').on('change', function (e) {
        const files = Array.from(e.target.files);

        files.forEach(file => {
            if (file.type.startsWith('video/')) {
                videoFiles.push(file);

                const reader = new FileReader();
                reader.onload = function (e) {
                    const box = $(`
                        <div class="preview-box">
                            <video src="${e.target.result}" controls muted></video>
                            <i class="fa fa-trash delete-icon text-dark"></i>
                        </div>
                    `);

                    box.find('.delete-icon').click(function () {
                        const index = $('#videoPreviewContainer .preview-box').index(box);
                        videoFiles.splice(index, 1);
                        box.remove();
                        updateVideoInput();
                    });

                    $('#videoUploadBox').before(box);
                };
                reader.readAsDataURL(file);
            }
        });
        updateVideoInput();
    });

    function updateVideoInput() {
        const dt = new DataTransfer();
        videoFiles.forEach(file => dt.items.add(file));
        document.getElementById('videoInput').files = dt.files;
    }

    // Delete existing videos (edit form)
    $(document).on('click', '.existing-media video + .delete-icon', function () {
        const box = $(this).closest('.existing-media');
        const inputVal = box.find('input[name="old_videos[]"]').val();
        box.remove();

        $('<input>').attr({
            type: 'hidden',
            name: 'delete_videos[]',
            value: inputVal
        }).appendTo('form');
    });

});
</script>
    <script>
        $(document).ready(function () {
            const uploadArea = $('#upload-area');
            const fileInput = $('#category_image');
            const previewImg = $('#preview-image');
            const placeholderIcon = $('#placeholder-icon');
            const deleteIcon = $('#delete-icon');
            // Check if existing image already loaded (Edit form)
            const hasExistingImage = previewImg.attr('src') && previewImg.attr('src') !== '#' && previewImg.attr('src').trim() !== '';
            if (hasExistingImage) {
                previewImg.show();
                placeholderIcon.hide();
                deleteIcon.css('display', 'flex');
            }
            // Click area to trigger file select
            uploadArea.on('click', function () {
                fileInput.click();
            });
            // Show selected image preview
            fileInput.on('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.attr('src', e.target.result).show();
                        placeholderIcon.hide();
                        deleteIcon.css('display', 'flex');
                    };
                    reader.readAsDataURL(file);
                }
            });

            deleteIcon.on('click', function (e) {
                e.stopPropagation();
                fileInput.val('');
                previewImg.attr('src', '#').hide();
                placeholderIcon.show();
                $(this).hide();
            });
        });
    </script>

</body>

</html>