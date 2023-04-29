@extends('frontEnd.master')
@section('title')
    Blog Details
@endsection
{{--@include('frontEnd.include.right-sidebar')--}}

@section('content')


    <div class="sticky-sidebar">
        <div class="sticky-sidebar-content">
            <div class="close-sidebar ml-auto">
                <i class="fas fa-times"></i>
            </div>
            <h3>About the Author</h3>

            <div class="author-img">
                @foreach($authorDetails as $authorDetails)
                    @if($blogDetails->author_name == $authorDetails->author_name)
                    <img src="{{asset($authorDetails->image)}}" alt="">
                    @endif
                @endforeach

            </div>
            <div class="author-desc">
                <h5 class="mb-2">{{$blogDetails->author_name}}</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequuntur vel quo, quae aliquam esse
                    facere eveniet magnam rerum! Quo itaque ipsa a ipsum quaerat optio illo ducimus dolores in!</p>
            </div>
            <div class="circular-icons social-links">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="author-posts">
                <h3>Most viewed</h3>
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                            <a href="single-layout-one.html">
                                <img src="{{asset('frontEnd')}}/assets/images/time.jpg" class="card-img" alt="">
                            </a>
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <ul class="category-tag-list">

                                    <li class="category-tag-name">
                                        <a href="#">Lifestyle</a>
                                    </li>
                                </ul>
                                <h5 class="card-title title-font"><a href="single-layout-one.html">Making time for travel</a>
                                </h5>
                                <div class="author-date">

                                    <a class="date" href="#">
                                        <span>21 Dec, 2019</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                            <a href="single-layout-one.html">
                                <img src="{{asset('frontEnd')}}/assets/images/alone.jpg" class="card-img" alt="">
                            </a>
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <ul class="category-tag-list">
                                    <li class="category-tag-name">
                                        <a href="#">Lifestyle</a>
                                    </li>
                                </ul>
                                <h5 class="card-title title-font"><a href="single-layout-one.html">It's okay to be alone
                                        sometimes</a>
                                </h5>
                                <div class="author-date">
                                    <a class="date" href="#">
                                        <span>21 Dec, 2019</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                            <a href="single-layout-one.html">
                                <img src="{{asset('frontEnd')}}/assets/images/forest.jpg" class="card-img" alt="">
                            </a>
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <ul class="category-tag-list">
                                    <li class="category-tag-name">
                                        <a href="#">travel</a>
                                    </li>
                                </ul>
                                <h5 class="card-title title-font"><a href="single-layout-one.html">Conserve Forest</a>
                                </h5>
                                <div class="author-date">
                                    <a class="date" href="#">
                                        <span>21 Dec, 2019</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                            <a href="single-layout-one.html">
                                <img src="{{asset('frontEnd')}}/assets/images/beach-sea.jpg" class="card-img" alt="">
                            </a>
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <ul class="category-tag-list">
                                    <li class="category-tag-name">
                                        <a href="#">Lifestyle</a>
                                    </li>
                                </ul>
                                <h5 class="card-title title-font"><a href="single-layout-one.html">Beach is my favourite place</a>
                                </h5>
                                <div class="author-date">
                                    <a class="date" href="#">
                                        <span>21 Dec, 2019</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <section class="single-layout">
        <div class="container">
            <div class="blog-img-main">
                <img src="{{asset($blogDetails->image)}}" alt="">
            </div>
            <div class="row align-items-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="blog-content-wrap">
                        <div class="blog-title-wrap">
                            <div class="author-date">
                                <a class="author" href="#">
                                    <img src="assets/images/writer.jpg" alt="" class="rounded-circle" />
                                    <span class=""> {{$blogDetails->author_name}} </span>
                                </a>
                                <a class="date" href="#">
                                    <span> Posted on {{date('d F Y',strtotime($blogDetails->date))}} </span>
                                </a>
                            </div>
                            <ul class="category-tag-list mb-0">
                                <li class="category-tag-name">
                                    <a href="#"> {{$blogDetails->blog_type}} </a>
                                </li>
                                <li class="category-tag-name">
                                    <a href="#">
                                        @foreach($categoryDetails as $categoryDetails)
                                        @if($blogDetails->category_id == $categoryDetails->id)
                                            {{$categoryDetails->category_name}}
                                        @endif
                                        @endforeach

                                    </a>
                                </li>
                            </ul>
                            <h1 class="title-font">{{$blogDetails->title}}</h1>
                        </div>

                        <div class="blog-desc">
                            <p> {{$blogDetails->description}} </p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse molestiae distinctio
                                aliquam sunt dolorem architecto incidunt natus sit et excepturi! Quidem expedita
                                accusantium reiciendis iure magnam possimus excepturi accusamus aut perspiciatis ad
                                ex rem, explicabo, consequuntur ipsum eveniet tenetur aliquid molestias veniam
                                dolores harum adipisci? Enim eaque libero voluptate perspiciatis rem. Unde
                                recusandae, deserunt quo ipsam aliquid sunt cupiditate vero distinctio labore id
                                blanditiis corporis inventore assumenda non, nisi voluptatem aperiam libero officia
                                beatae dignissimos earum ratione explicabo? Adipisci, dolor!</p>
                            <blockquote>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et ex quas aliquam est
                                excepturi molestiae non dolor voluptatem voluptatum saepe?
                            </blockquote>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse molestiae distinctio
                                aliquam sunt dolorem architecto incidunt natus sit et excepturi! Quidem expedita
                                accusantium reiciendis iure magnam possimus excepturi accusamus aut perspiciatis ad
                                ex rem, explicabo, consequuntur ipsum eveniet tenetur aliquid molestias veniam
                                dolores harum adipisci? Enim eaque libero voluptate perspiciatis rem. Unde
                                recusandae, deserunt quo ipsam aliquid sunt cupiditate vero distinctio labore id
                                blanditiis corporis inventore assumenda non, nisi voluptatem aperiam libero officia
                                beatae dignissimos earum ratione explicabo? Adipisci, dolor!</p>
                            <img src="assets/images/winter.jpg" alt="">

                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis dicta repellendus
                                similique deleniti aperiam totam expedita quo eaque itaque saepe aliquid adipisci,
                                voluptates tenetur ab dolorem enim iusto doloremque, possimus quae aliquam? Saepe
                                debitis at officia sunt voluptas beatae molestias quis amet tempora? Autem rerum
                                inventore, excepturi nisi magni, eligendi, saepe nulla corrupti fuga eius deserunt
                                rem labore consectetur repellendus.</p>
                        </div>
                        <div class="tags-wrap">
                            <div class="blog-tags">
                                <p>Tags:</p>
                                <ul class="sidebar-list tags-list">
                                    <li><a href="#">Travel</a></li>
                                    <li><a href="#">December</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Fun</a></li>
                                </ul>
                            </div>
                            <div class="share-buttons">
                                <p>Share Now:</p>
                                <ul class="share-list">
                                    <li><a href="#"><img src="assets/images/facebook.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/twitter.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/pinterest.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/messenger.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-author-info">
                            <div class="author-img">
                                <img src="assets/images/writer.jpg" alt="">
                            </div>
                            <div class="author-desc">
                                <small>written by</small>
                                <h5>{{$blogDetails->author_name}}</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum magni ipsa
                                    fugiat pariatur! </p>
                            </div>
                        </div>
                        <span class="comment-section">
                            <div class="all-response">
                                <a class="btn view-all-btn" data-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    View all comments ( {{$comment->count()}} )
                                </a>
                            </div>
                            <div class="collapse" id="collapseExample">
                                  @foreach($comment as $comments)
                                    <div class="card comment-card">
                                    <div class="card-body">
                                        <div class="author-date">
                                            <div class="author">
                                                <img src="assets/images/person2.jpg" alt="" class="rounded-circle" />
                                            </div>
                                            <div class="inner-author-date">
                                                <div class="author">
                                                    <span class="">{{Session::get('customerName')}}</span>
                                                </div>
                                                <div class="date"><span> {{$comments->created_at}} </span></div>
                                            </div>
                                        </div>
                                        <div class="comment-text mt-2">
                                            <div> {{$comments->comment}} </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <br>





                            @if(Session::get('customerId'))
                                @include('notify.notify')
                            <form action="{{route('new.comment')}}" method="post" class="comment-form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                <h5>Leave a comment</h5>
                                <div class="row">

                                    <div class="col-12 mb-4">
                                        <textarea rows="7" class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-solid" type="submit">Submit</button>
                            </form>

                            @else
                                <br>

                                    <div class="text-center gap-2">


                                     <span>Please</span>
                                    <button class="btn btn-primary"><a class="btn" href="{{route('customer.login')}}">Login</a></button>
                                    <span>or</span>

                                    <button class="btn btn-success"> <a class="btn" href="{{route('blogUser.register')}}">Register</a></button>

                                </div>


                        @endif

                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Layout Blog content end -->

    <!-- Related posts -->
    <section class="related-posts">

@endsection
