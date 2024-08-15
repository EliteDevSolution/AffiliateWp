
<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/css/app.horizontal.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('postflow_assests/css/post.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('postflow_assests/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">

<div class="postflow-container">
    <div class="create-post-container col-lg-7 col-md-12">
        <div class="post-image-gallery">
            <div class="text-center filter-menu">
                <a href="javascript: void(0);" class="filter-menu-item active" data-rel="all">All</a>
                <a href="javascript: void(0);" class="filter-menu-item" data-rel="web">Web Design</a>
                <a href="javascript: void(0);" class="filter-menu-item" data-rel="graphic">Graphic Design</a>
                <a href="javascript: void(0);" class="filter-menu-item" data-rel="illustrator">Illustrator</a>
                <a href="javascript: void(0);" class="filter-menu-item" data-rel="photography">Photography</a>
            </div>

            <div class="row filterable-content">

                <div class="col-sm-6 col-xl-3 filter-item all web illustrator">
                    <div class="gal-box">
                        <a href="assets/images/small/img-1.jpg" class="image-popup" title="Screenshot-1">
                            <img src="assets/images/small/img-1.jpg" class="img-fluid" alt="work-thumbnail">
                        </a>
                        <div class="gall-info">
                            <h4 class="font-16 mt-0">Man wearing black jacket</h4>
                            <a href="javascript: void(0);">
                                <img src="assets/images/users/user-3.jpg" alt="user-img" class="rounded-circle" height="24" />
                                <span class="text-muted ml-1">Justin Coke</span>
                            </a>
                            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-danger"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 filter-item all graphic photography">
                    <div class="gal-box">
                        <a href="assets/images/small/img-2.jpg" class="image-popup" title="Screenshot-2">
                            <img src="assets/images/small/img-2.jpg" class="img-fluid" alt="work-thumbnail">
                        </a>
                        <div class="gall-info">
                            <h4 class="font-16 mt-0">Snow covered mountain</h4>
                            <a href="javascript: void(0);">
                                <img src="assets/images/users/user-2.jpg" alt="user-img" class="rounded-circle" height="24" />
                                <span class="text-muted ml-1">Toni Sanchez</span>
                            </a>
                            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-danger"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 filter-item all web illustrator">
                    <div class="gal-box">
                        <a href="assets/images/small/img-3.jpg" class="image-popup" title="Screenshot-3">
                            <img src="assets/images/small/img-3.jpg" class="img-fluid" alt="work-thumbnail">
                        </a>
                        <div class="gall-info">
                            <h4 class="font-16 mt-0">Woman sitting on rock</h4>
                            <a href="javascript: void(0);">
                                <img src="assets/images/users/user-4.jpg" alt="user-img" class="rounded-circle" height="24" />
                                <span class="text-muted ml-1">Maria Crowder</span>
                            </a>
                            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-danger"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 filter-item all graphic illustrator">
                    <div class="gal-box">
                        <a href="assets/images/small/img-4.jpg" class="image-popup" title="Screenshot-4">
                            <img src="assets/images/small/img-4.jpg" class="img-fluid" alt="work-thumbnail">
                        </a>
                        <div class="gall-info">
                            <h4 class="font-16 mt-0">Smiling woman's face</h4>
                            <a href="javascript: void(0);">
                                <img src="assets/images/users/user-5.jpg" alt="user-img" class="rounded-circle" height="24" />
                                <span class="text-muted ml-1">Charles East</span>
                            </a>
                            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-danger"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 filter-item all web illustrator">
                    <div class="gal-box">
                        <a href="assets/images/small/img-5.jpg" class="image-popup" title="Screenshot-5">
                            <img src="assets/images/small/img-5.jpg" class="img-fluid" alt="work-thumbnail">
                        </a>
                        <div class="gall-info">
                            <h4 class="font-16 mt-0">Brown tabby cat sitting on concrete</h4>
                            <a href="javascript: void(0);">
                                <img src="assets/images/users/user-6.jpg" alt="user-img" class="rounded-circle" height="24" />
                                <span class="text-muted ml-1">David Buchanan</span>
                            </a>
                            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="control-post-container">
            The above component is my parent
        </div>
    </div>

    <div class="preview-post-container col-lg-5 col-md-12">
        sdsd
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('postflow_assests/js/gallery.init.js') }}"></script>
<script src="{{ asset('postflow_assests/js/jquery.magnific-popup.min.js') }}"></script>