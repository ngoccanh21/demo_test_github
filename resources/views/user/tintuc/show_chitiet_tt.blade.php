@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Tin tức</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Chi tiết tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area section-space-y-axis-100">
        <div class="container">
            <div class="row">

                @foreach($detail_tintuc as $key => $chitiet_tt)
                <div class="col-lg-12">
                    <div class="blog-detail-item">
                        <div class="blog-img">
                            <img class="img-full" src="/upload/tintuc/{{$chitiet_tt->tintuc_anh}}" alt="Blog Image">
                        </div>
                        <div class="blog-content text-start pb-0">
                            <div class="blog-meta text-dim-gray pb-3">
                                <ul>
                                    <li class="date"><i class="fa fa-calendar-o me-2"></i>{{$chitiet_tt->tintuc_ngaydang}}</li>
                                    <!-- <li>
                                        <span class="comments me-3">
                                            <a href="javascript:void(0)">2 Comments</a>
                                        </span>
                                        <span class="link-share">
                                            <a href="javascript:void(0)">Share</a>
                                        </span>
                                    </li> -->
                                </ul>
                            </div>
                            <h5 class="title mb-4">
                                <a href="">{{$chitiet_tt->tintuc_tieude}}</a>
                            </h5>
                            <p class="short-desc mb-4 mb-7">
                                <?php
                                echo strip_tags(html_entity_decode($chitiet_tt->tintuc_noidung));
                                // xoá thẻ html trong ckeditor
                                ?>
                            </p>
                            <!-- <blockquote class="pt-6 pb-5 mb-5">
                                <div class="inner-content">
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore
                                        <span class="user-name ms-5 mb-0">Jont utdo</span>
                                    </p>
                                </div>
                            </blockquote>
                            <p class="short-desc mb-4 mb-9">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comm consequat. Duis aute irure dolor in reprehenderit in</p>
                            <div class="blog-banner pb-10">
                                <div class="single-content pt-4 pt-md-0">
                                    <p class="short-desc mb-4 mb-5">Lorem ipsum dolor sit amet, consectetu adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culju</p>
                                    <p class="short-desc mb-4 mb-5">Expedita molestias optio earum autem repudiandae corrupti molestiae soluta voluptate magnam! Dolorem ratione perferendis necessitatibus, quaerat minus reiciendis debitis culpa, blanditiis in ipsum, sapiente voluptatibus? Neque illum doloremque laborum laboriosam quos et quas autem consequuntur. Praesentium nesciunt deleniti consequatur sequi.</p>
                                    <p class="short-desc mb-4 mb-0">Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantiumojd doloremque laudantium, totam rem aperiam, eaque ipsafe quae ab illo inventore veritatis et quasi architecto beataerf vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur </p>
                                </div>
                                <div class="single-img">
                                    <img class="img-full" src="assets/images/blog/banner/1-1-370x400.jpg" alt="Blog Banner">
                                </div>
                            </div>
                            <p class="short-desc mb-4 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p> -->
                            <!-- <div class="tag-wtih-social">
                                <div class="tag">
                                    <span class="title text-primary">Tags:</span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">Furniture,</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Electronic,</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Fashion</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="social-link">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-dribbble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- <div class="blog-comment pt-10">
                                <h4 class="heading mb-7">02 Comments</h4>
                                <div class="blog-comment-item mb-8">
                                    <div class="blog-comment-img">
                                        <img src="assets/images/avatar/1.jpg" alt="Avatar">
                                    </div>
                                    <div class="blog-comment-content">
                                        <div class="user-meta">
                                            <span><strong>Aidyn Cody -</strong> Jul 21,2021 at 15 hours ago</span>
                                            <a class="btn btn-link hover-white d-none d-md-flex" href="javascript:void(0)">
                                                <i class="fa fa-reply me-2"></i>
                                                Reply
                                            </a>
                                        </div>
                                        <span class="user-occupation text-primary">Web Developer</span>
                                        <p class="user-comment mb-0">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a dolor sit amrt paremi quam. Lorem In euismod urna ac massa adipiscing interdum.</p>
                                        <a class="btn btn-link hover-white d-inline-flex d-md-none mt-5" href="javascript:void(0)">
                                            <i class="fa fa-reply me-2"></i>
                                            Reply
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-comment-item">
                                    <div class="blog-comment-img">
                                        <img src="assets/images/avatar/2.jpg" alt="Avatar">
                                    </div>
                                    <div class="blog-comment-content">
                                        <div class="user-meta">
                                            <span><strong>Aidyn Cody -</strong> Jul 21,2021 at 15 hours ago</span>
                                            <a class="btn btn-link hover-white d-none d-md-flex" href="javascript:void(0)">
                                                <i class="fa fa-reply me-2"></i>
                                                Reply
                                            </a>
                                        </div>
                                        <span class="user-occupation text-primary">Web Developer</span>
                                        <p class="user-comment mb-0">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a dolor sit amrt paremi quam. Lorem In euismod urna ac massa adipiscing interdum.</p>
                                        <a class="btn btn-link hover-white d-inline-flex d-md-none mt-5" href="javascript:void(0)">
                                            <i class="fa fa-reply me-2"></i>
                                            Reply
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="feedback-area section-space-top-55">
                                <h4 class="heading mb-1">Để lại bình luận</h4>
                                <form class="feedback-form pt-8" action="#">
                                    <div class="group-input">
                                        <div class="form-field me-md-6 mb-6 mb-md-0">
                                            <input type="text" name="name" placeholder="Tên của bạn*" class="input-field">
                                        </div>
                                        <div class="form-field me-md-6 mb-6 mb-md-0">
                                            <input type="text" name="email" placeholder="Email của bạn*" class="input-field">
                                        </div>
                                        <div class="form-field">
                                            <input type="text" name="number" placeholder="Số điện thoại" class="input-field">
                                        </div>
                                    </div>
                                    <div class="form-field mt-6">
                                        <textarea name="message" placeholder="Ghi chú" class="textarea-field"></textarea>
                                    </div>
                                    <div class="button-wrap mt-8">
                                        <button type="submit" value="Gửi" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover btn-lg rounded-0" name="submit">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection