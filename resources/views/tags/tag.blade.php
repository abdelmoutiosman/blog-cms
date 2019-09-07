@include('include.header')
<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('{{asset('./img/widget-3.jpg')}}');background-repeat: no-repeat;background-size: cover" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">{{$tag->tag}}</a>
                </div>
                <h1>Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</h1>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>{{$tag->created_at->toFormattedDateString()}}</li>
                    <li><i class="fa fa-comments"></i> 3</li>
                    <li><i class="fa fa-eye"></i> 807</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="post post-row">
                    <div class="post-body">
                        <div class="post-category">
                        </div>
                        <ul class="post-meta">
                            <li><a href="author.html">Tag :{{$tag->tag}}</a></li>
                        </ul>
{{--                        <p>{{$post->content}}</p>--}}
                    </div>
                </div>
                <!-- post -->
                @foreach($tag->posts as $post)
                <div class="post post-row">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{asset($post->featured)}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a>
                        </div>
                        <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->updated_at->toFormattedDateString()}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$post->created_at->toFormattedDateString()}}</li>
                        </ul>
                        <p>{{$post->content}}</p>
                    </div>
                </div>
                @endforeach
                <!-- /post -->
                <br>
                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
            </div>
            <div class="col-md-4">
                <!-- social widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Social Media</h2>
                    </div>
                    <div class="social-widget">
                        <ul>
                            <li>
                                <a href="#" class="social-facebook">
                                    <i class="fa fa-facebook"></i>
                                    <span>21.2K<br>Followers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-twitter">
                                    <i class="fa fa-twitter"></i>
                                    <span>10.2K<br>Followers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                    <span>5K<br>Followers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /social widget -->

                <!-- newsletter widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Newsletter</h2>
                    </div>
                    <div class="newsletter-widget">
                        <form>
                            <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                            <input class="input" name="newsletter" placeholder="Enter Your Email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                    </div>
                </div>
                <!-- /newsletter widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- FOOTER -->
@include('include.footer')
<!-- /FOOTER -->
<!-- jQuery Plugins -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
