{{-- @php
    // $productLasted = DB::table('products')->orderBy('created_at', 'desc')->first();
    // dd($productLasted);
@endphp --}}
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Đề Xuất</h2>
                <article class="card">
                    <div class="post-slider slider-sm">
                        <img src="{{ asset('/storage/' . $productLasted->img_thumbnail) }}" class="card-img-top"
                            alt="post-thumb">
                    </div>

                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="post-details.html">{{ $productLasted->name }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $productLasted->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($productLasted->tags as $tag)
                                        <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                        <p>{{ $productLasted->description }}</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Mua Ngay</a>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Sản Phẩm Hot</h2>

                @foreach ($latestProducts3 as $pro)
                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="{{ asset('/storage/' . $pro->img_thumbnail) }}">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">{{ $pro->name }}</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Sản Phẩm được ưu chuộng</h2>

                <article class="card">
                    <div class="post-slider slider-sm">
                        <img src="{{ asset('/storage/' . $topViewedProduct->img_thumbnail) }}" class="card-img-top"
                            alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="post-details.html">{{ $topViewedProduct->name }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="theme/client/images/kate-stone.jpg" alt="Kate Stone">
                                    <span>Kate Stone</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $topViewedProduct->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($topViewedProduct->tags as $tag)
                                        <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>

                            </li>
                        </ul>
                        <p>{{ $topViewedProduct->description }}</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Mua ngay</a>
                    </div>
                </article>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</section>
