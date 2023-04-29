<header>
    <!-- Top header -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class=" social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="search-wrapper">
                        <div class="search-icon">
                            <button class="open-search-btn"><i class="fa fa-search"></i></button>
                        </div>

                        @if(request()->route()->getName() == 'blog.details')

                        <div class="sidebar-icon">
                            <button class="sidebar-btn"> <i class="fas fa-ellipsis-v"></i></button>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top header end -->

    <!-- Bottom header -->
    <div class="bottom-header">
        <div class="container">
            <div class="brand-name">
                <a href="index.html">
                    <h1>Create Your Blog</h1>
                    <span>Enter your tagline here</span>
                </a>
            </div>
        </div>

        <!-- Navbar -->
        <div class="kavya-navbar" id="sticky-top">
            <div class="container">
                <nav class="nav-menu-wrapper">
              <span class="navbar-toggle" id="navbar-toggle">
                <i class="fas fa-bars"></i>
              </span>
                    <div class="sticky-logo">
                        <a href="index.html">
                            <p>Blog</p>
                        </a>
                    </div>
                    <ul class="nav-menu ml-auto mr-auto" id="nav-menu-toggle">
                        <li class="nav-item"><a href="{{route('/')}}" class="nav-link">Home</a></li>

                        <li class="nav-item"><a href="#" class="nav-link">Categories <span class="arrow-icon"> <span
                                        class="left-bar"></span>
                      <span class="right-bar"></span></span>
                            </a>
                            <ul class="drop-menu">
                            @foreach($categories as $category)

                                <li class="drop-menu-item"><a href="{{route('show.category',['id'=>$category->id])}}">{{$category['category_name']}}</a></li>

                            @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                        @if(Session::get('customerId'))
                            <li class="nav-item">
                                <a href="{{route('customer.logout')}}" class="btn btn-solid btn-read text-light">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="btn btn-solid btn-read text-light">
                                   {{Session::get('customerName')}}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('blogUser.register')}}" class="btn btn-solid btn-read text-light">Register</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('customer.login')}}" class="btn btn-solid btn-read text-light">Login</a>
                            </li>
                        @endif
                    </ul>
                    <div class="sticky-search">
                        <div class="search-wrapper">
                            <div class="search-icon">
                                <button class="open-search-btn"><i class="fa fa-search"></i></button>
                            </div>
                            @if(request()->route()->getName() == 'blog.details')

                            <div class="sidebar-icon">
                                <button class="sidebar-btn"> <i class="fas fa-ellipsis-v"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar end -->
    </div>
    <!-- Bottom header end -->

    <!-- Search overlay -->
    <div id="search-overlay" class="search-section">
        <span class="closebtn"><i class="fas fa-times"></i></span>
        <div class="overlay-content">
            <form>
                <input type="text" placeholder="Search here" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- Search overlay end -->

    <!-- Sticky sidebar -->

    <!-- sticky sidebar end -->

{{--    <div class="body-overlay"></div>--}}
</header>
