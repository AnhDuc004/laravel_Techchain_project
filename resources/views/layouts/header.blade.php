  <!-- navigation -->

  <header class="navigation fixed-top">
      <div class="container ">
          <nav class="navbar navbar-expand-lg navbar-white">
              <a class="navbar-brand order-1" href="http://127.0.0.1:8000/">
                  <img class="img-fluid" width="100px" src="theme/client/images/logo.png"
                      alt="Reader | Hugo Personal Blog Template">
              </a>
              <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                  <ul class="navbar-nav mx-auto">
                      <li class="nav-item dropdown">
                          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              homepage <i class="ti-angle-down ml-1"></i>
                          </a>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="index-full.html">Homepage Full Width</a>

                              <a class="dropdown-item" href="index-full-left.html">Homepage Full With Left Sidebar</a>

                              <a class="dropdown-item" href="index-full-right.html">Homepage Full With Right Sidebar</a>

                              <a class="dropdown-item" href="index-list.html">Homepage List Style</a>

                              <a class="dropdown-item" href="index-list-left.html">Homepage List With Left Sidebar</a>

                              <a class="dropdown-item" href="index-list-right.html">Homepage List With Right Sidebar</a>

                              <a class="dropdown-item" href="index-grid.html">Homepage Grid Style</a>

                              <a class="dropdown-item" href="index-grid-left.html">Homepage Grid With Left Sidebar</a>

                              <a class="dropdown-item" href="index-grid-right.html">Homepage Grid With Right Sidebar</a>

                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              Danh mục sản phẩm <i class="ti-angle-down ml-1"></i>
                          </a>
                          <div class="dropdown-menu">

                              @foreach ($catalogues as $cate)
                                  <a class="dropdown-item" href="about-us.html">{{ $cate->name }}</a>
                              @endforeach


                          </div>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="contact.html">Cửa hàng</a>
                      </li>

                      {{-- <li class="nav-item dropdown">
                          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
                          </a>
                          <div class="dropdown-menu">

                              <a class="dropdown-item" href="author.html">Author</a>

                              <a class="dropdown-item" href="author-single.html">Author Single</a>

                              <a class="dropdown-item" href="advertise.html">Advertise</a>

                              <a class="dropdown-item" href="post-details.html">Post Details</a>

                              <a class="dropdown-item" href="post-elements.html">Post Elements</a>

                              <a class="dropdown-item" href="tags.html">Tags</a>

                              <a class="dropdown-item" href="search-result.html">Search Result</a>

                              <a class="dropdown-item" href="search-not-found.html">Search Not Found</a>

                              <a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a>

                              <a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a>

                              <a class="dropdown-item" href="404.html">404 Page</a>

                          </div>
                      </li> --}}

                      <li class="nav-item">
                          <a class="nav-link" href="shop.html">Liên Hệ</a>
                      </li>
                  </ul>
              </div>

              <div class="order-2 order-lg-3 d-flex align-items-center">

                  <form class="search-bar">
                      <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                  </form>


                  <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                      data-target="#navigation">
                      <i class="ti-menu"></i>
                  </button>


                  @if (Route::has('login'))
                      <div class="top-right links">
                          @auth
                              <img src="{{ asset('/storage/' . Auth::user()->avatar) }}" style="border-radius: 10px "
                                  width="50px">
                              <a class="btn btn-sm btn-info ml-2 ml-lg-0" href="{{ route('logout') }}">Đăng Xuất</a>

                              {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-link" style="display: inline; cursor: pointer;">
                                      Đăng xuất
                                  </button>
                              </form> --}}
                              @if (Auth::user()->role == 'admin')
                                  <a class="btn btn-sm btn-info ml-2 ml-lg-0" href="{{ route('admin.dashboard') }}">Quản
                                      Trị</a>
                              @endif
                          @else
                              <a class="btn btn-sm btn-primary ml-2 ml-lg-0" href="{{ route('login') }}">Đăng nhập</a>


                              @if (Route::has('register'))
                                  <a class="btn btn-sm btn-primary ml-2 ml-lg-0" href="{{ route('register') }}">Đăng
                                      ký</a>
                              @endif
                          @endauth
                      </div>
                  @endif

              </div>

          </nav>
      </div>
  </header>
