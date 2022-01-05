@extends('customer.layouts.master')
@section('title','Blog Detail - SavoyFoods')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Blog Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contents</li>
                    <li class="breadcrumb-item "><a href="{{route('blogs.index')}}">Blogs</a></li>
                    <li class="breadcrumb-item active">Blog Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9">
            	<div class="single_post">
                	<h2 class="blog_title">But I must explain to you how all this mistaken idea</h2>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                        <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                    </ul>
                    <div class="blog_img">
                        <img src="/customer_assets/images/blog_img1.jpg" alt="blog_img1">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada malesuada metus ut placerat. Cras a porttitor quam, eget ornare sapien. In sit amet vulputate metus. Nullam eget rutrum nisl. Sed tincidunt lorem sed maximus interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean scelerisque efficitur mauris nec tincidunt. Ut cursus leo mi, eu ultricies magna faucibus id.</p>
                            <blockquote class="blockquote_style3">
                            	<p>Integer is metus site turpis facilisis customers. elementum an mauris in venenatis consectetur east. Praesent condimentum bibendum Morbi sit amet commodo pellentesque at fringilla tincidunt risus.</p>
                            </blockquote>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="single_img">
                                		<img class="w-100 mb-4" src="/customer_assets/images/blog_single_img1.jpg" alt="blog_single_img1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<div class="single_img">
                                		<img class="w-100 mb-4" src="/customer_assets/images/blog_single_img2.jpg" alt="blog_single_img2">
                                    </div>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                            <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>
                        	
                        </div>
                    </div>
                </div>
                <div class="post_navigation bg_gray mt-3">
                    <div class="row align-items-center justify-content-between p-4">
                        <div class="col-5">
                            <a href="#">
                                <div class="post_nav post_nav_prev">
                                    <i class="ti-arrow-left"></i>
                                    <span>blanditiis praesentium</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="#" class="post_nav_home">
                                <i class="ti-layout-grid2"></i>
                            </a>
                        </div>
                        <div class="col-5">
                            <a href="#">
                                <div class="post_nav post_nav_next">
                                    <i class="ti-arrow-right"></i>
                                    <span>voluptatum deleniti</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="related_post mt-5">
                	<div class="content_title">
                    	<h5>Related posts</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog_post blog_style2 box_shadow1">
                                <div class="blog_img">
                                    <a href="blog-single.html">
                                        <img src="/customer_assets/images/blog_small_img2.jpg" alt="blog_small_img2">
                                    </a>
                                </div>
                                <div class="blog_content bg-white">
                                    <div class="blog_text">
                                        <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce</a></h5>
                                        <ul class="list_none blog_meta">
                                            <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                        </ul>
                                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    	<div class="col-md-6">
                            <div class="blog_post blog_style2 box_shadow1">
                                <div class="blog_img">
                                    <a href="blog-single.html">
                                        <img src="/customer_assets/images/blog_small_img3.jpg" alt="blog_small_img3">
                                    </a>
                                </div>
                                <div class="blog_content bg-white">
                                    <div class="blog_text">
                                        <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so expensive?</a></h5>
                                        <ul class="list_none blog_meta">
                                            <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                        </ul>
                                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
            </div>
        	<div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
            	<div class="sidebar">
                	<div class="widget">
                    	<h5 class="widget_title">Recent Posts</h5>
                        <ul class="widget_recent_post">
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="#"><img src="/customer_assets/images/letest_post1.jpg" alt="letest_post1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                        <p class="small m-0">April 14, 2018</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="#"><img src="/customer_assets/images/letest_post2.jpg" alt="letest_post2"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                        <p class="small m-0">April 14, 2018</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="#"><img src="/customer_assets/images/letest_post3.jpg" alt="letest_post3"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                        <p class="small m-0">April 14, 2018</p>
                                    </div>
                                </div>
                            </li>
                    	</ul>
                    </div>
                    
                	<div class="widget">
                    	<h5 class="widget_title">tags</h5>
                        <div class="tags">
                        	<a href="#">General</a>
                            <a href="#">Design</a>
                            <a href="#">jQuery</a>
                            <a href="#">Branding</a>
                            <a href="#">Modern</a>
                            <a href="#">Blog</a>
                            <a href="#">Quotes</a>
                            <a href="#">Advertisement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
