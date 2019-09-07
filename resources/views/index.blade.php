@include('include.header')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $first_post->slug]))}}"><img src="{{$first_post->featured}}" alt="" style="height: 600px"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('category.show',['id' => $first_post->category->id]))}}">{{$first_post->category->name}}</a>
                        </div>
                        <h3 class="post-title title-lg"><a href="{{url(route('post.show',['slug' => $first_post->slug]))}}">{{$first_post->title}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$first_post->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <div class="col-md-4 hot-post-right">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $second_post->slug]))}}"><img src="{{$second_post->featured}}" alt="" style="height: 200px"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('category.show',['id' => $second_post->category->id]))}}">{{$second_post->category->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $second_post->slug]))}}">{{$second_post->title}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$second_post->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $third_post->slug]))}}"><img src="{{$third_post->featured}}" alt="" style="height: 200px"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('category.show',['id' => $third_post->category->id]))}}">{{$third_post->category->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $third_post->slug]))}}">{{$third_post->title}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$third_post->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $fourth_post->slug]))}}"><img src="{{$fourth_post->featured}}" alt="" style="height: 200px"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('category.show',['id' => $fourth_post->category->id]))}}">{{$fourth_post->category->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $fourth_post->slug]))}}">{{$fourth_post->title}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$fourth_post->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{$laravel->name}}</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($laravel->posts()->orderBy('created_at','desc')->take(3)->get() as $post)
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                                </div>
                                <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>{{$post->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /post -->
                </div>
                <!-- /row -->
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{$ruby->name}}</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($ruby->posts()->orderBy('created_at','desc')->take(3)->get() as $post)
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>{{$post->created_at->diffForHumans()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- /post -->
                </div>
                <!-- /row -->
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{$flutter->name}}</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($flutter->posts()->orderBy('created_at','desc')->take(3)->get() as $post)
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>{{$post->created_at->diffForHumans()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- /post -->
                </div>
                <!-- /row -->
            </div>
            <div class="col-md-4">
                <!-- ad widget-->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-3.jpg" alt="">
                    </a>
                </div>
                <!-- /ad widget -->
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
                <!-- category widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{url(route('category.show',['id' => $category->id]))}}">{{$category->name}} <span>{{$category->posts->count()}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /category widget -->
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
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Popular Posts</h2>
                    </div>
                    <!-- post -->
                    @foreach($laravel->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                    <div class="post post-widget">
                        <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 100px;width: 100px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                            </div>
                            <h3 class="post-title">{{$post->created_at->diffForHumans()}}</h3>
                        </div>
                    </div>
                    @endforeach
                    <!-- /post -->
                    <!-- post -->
                    @foreach($ruby->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                        <div class="post post-widget">
                            <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 100px;width: 100px"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                                </div>
                                <h3 class="post-title">{{$post->created_at->diffForHumans()}}</h3>
                            </div>
                        </div>
                    @endforeach
                    <!-- /post -->
                </div>
                <!-- /post widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ad -->
            <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                    <img class="img-responsive" src="./img/ad-2.jpg" alt="">
                </a>
            </div>
            <!-- /ad -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4">
                <div class="section-title">
                    <h2 class="title">{{$laravel->name}}</h2>
                </div>
                <!-- post -->
                @foreach($laravel->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                <div class="post">
                    <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{$post->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <!-- /post -->
            </div>
            <div class="col-md-4">
                <div class="section-title">
                    <h2 class="title">{{$ruby->name}}</h2>
                </div>
                <!-- post -->
                @foreach($ruby->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                    <div class="post">
                        <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                            </div>
                            <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{$post->created_at->diffForHumans()}}</li>
                            </ul>
                        </div>
                    </div>
            @endforeach
            <!-- /post -->
            </div>
            <div class="col-md-4">
                <div class="section-title">
                    <h2 class="title">{{$flutter->name}}</h2>
                </div>
                <!-- post -->
                @foreach($flutter->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                    <div class="post">
                        <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                            </div>
                            <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{$post->created_at->diffForHumans()}}</li>
                            </ul>
                        </div>
                    </div>
            @endforeach
            <!-- /post -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- post -->
                @foreach($ruby->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                    <div class="post post-row">
                        <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                            </div>
                            <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{$post->created_at->toFormattedDateString()}}</li>
                            </ul>
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                @endforeach
                <!-- /post -->
                <!-- post -->
                @foreach($flutter->posts()->orderBy('created_at','desc')->take(1)->get() as $post)
                    <div class="post post-row">
                        <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                            </div>
                            <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{$post->created_at->toFormattedDateString()}}</li>
                            </ul>
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                @endforeach
                <!-- /post -->
                <div class="section-row loadmore text-center">
                    <a id="Dropdown" class="primary-button dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Load More
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Dropdown">
                        <!-- post -->
                        @foreach($laravel->posts()->orderBy('created_at','desc')->take(2)->get() as $post)
                            <div class="post post-row">
                                <a class="post-img" href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" alt="" style="height: 300px"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{url(route('category.show',['id' => $post->category->id]))}}">{{$post->category->name}}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{url(route('post.show',['slug' => $post->slug]))}}">{{$post->title}}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>{{$post->created_at->toFormattedDateString()}}</li>
                                    </ul>
                                    <p>{{$post->content}}</p>
                                </div>
                            </div>
                    @endforeach
                    <!-- /post -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- galery widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Instagram</h2>
                    </div>
                    <div class="galery-widget">
                        <ul>
                            @foreach($posts as $post)
                                <li><a href="{{url(route('post.show',['slug' => $post->slug]))}}"><img src="{{$post->featured}}" style="height: 100px;width: 100px"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /galery widget -->
                <!-- Ad widget -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /Ad widget -->
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
