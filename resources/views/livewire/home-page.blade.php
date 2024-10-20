<section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            @if ($products->hasPages())
                            @php
                                $from = $products->perPage() * ($products->currentPage() - 1);
                                $to = $from  + $products->count() ;
                            @endphp
                            <p>Showing {{ $from + 1 }}–{{ $to }} of {{ $products->total() }} results</p>
                            @endif
                        </div>
                        <form id="filter-product-form" action="{{ url()->full() }}" method="get" class="form-inline">
                            <input type="hidden" name="min_price" value="{{ request()->get('min_price') }}">
                            <input type="hidden" name="max_price" value="{{ request()->get('max_price') }}">
                            <input type="hidden" name="perpage" value="{{ request()->get('perpage') }}">
                            <input type="hidden" name="filter_category" value="{{ request()->get('filter_category') }}">
                            <input type="hidden" name="orderby" value="{{ request()->get('orderby') }}">
                            <input type="hidden" name="order_type" value="{{ request()->get('order_type') }}">
                        </form>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <button onclick="window.location.href='{{ url()->current() }}'" class="btn alazea-btn">clear filter</button>
                                @php
                                    $orderbyarr = [
                                    'created_at__desc' => 'Short by Newest',
                                    'product_price__desc' => 'Short by Price High to Low',
                                    'product_price__asc' => 'Short by Price Low to High',
                                    'product_name__asc' => 'Short by Alphabetically, A-Z',
                                    'product_name__desc' => 'Short by Alphabetically, Z-A',
                                ];
                                $selected = request()->get('orderby') && request()->get('order_type') ? request()->get('orderby').'__'.request()->get('order_type') : 'created_at__desc';
                                @endphp
                                <select id="orderby-filter" class="custom-select widget-title">
                            

                                  @foreach ($orderbyarr as $value => $text)

                                  <option value="{{ $value }}"
                                  @if ($selected == $value)
                                  selected
                                  @endif
                                  >{{ $text }}</option>
                                      
                                  @endforeach
                     
                                </select>
                                @php
                                    $perpagearr = [20,60,80,100];
                                @endphp
                                <select id="perpage-filter" class="custom-select widget-title">
                                  {{-- <option selected>Show: 9</option>
                                  <option value="1">12</option>
                                  <option value="2">18</option>
                                  <option value="3">24</option> --}}
                                  @foreach ($perpagearr as $value)
                                    <option 
                                    value="{{ $value }}"
                                    @if (request()->get('perpage') == $value)
                                    selected
                                    @endif
                                  
                                    >Show: {{ $value }}</option>
                                  @endforeach
                                </select>
                       
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">

                        <!-- Shop Widget -->
                        <div class="shop-widget price mb-50">
                            <h4 class="widget-title">Prices</h4>
                            <div class="widget-desc">
                                <div class="slider-range">
                                
                                    <div data-min="{{ $price_braket['min'] }}" data-max="{{ $price_braket['max'] }}" data-unit="₹" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{ request()->get('min_price') ? request()->get('min_price') : $price_braket['min'] }}" data-value-max="{{ request()->get('max_price') ? request()->get('max_price') :  $price_braket['max'] }}" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all first-handle" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: ₹{{ request()->get('min_price') ? request()->get('min_price') : $price_braket['min'] }} - ₹{{ request()->get('max_price') ? request()->get('max_price') :  $price_braket['max'] }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc" id="filter-category-select">
                                @php
                                
                                    $selected_cat = request()->get('filter_category') ? explode(',', request()->get('filter_category')) : []; 
                                @endphp
                                @foreach ($categories as $category => $value)
                                <!-- Single Checkbox -->
                               
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="filter-category-{{$category}}" value="{{ $category }}"
                                    @if (in_array($category, $selected_cat))
                                        checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="filter-category-{{$category}}">{{ $category }} <span class="text-muted">({{ $value }})</span></label>
                                </div>


                                @endforeach
                                
                                {{-- <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Outdoor plants <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Indoor plants <span class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Office Plants <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Potted <span class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">Others <span class="text-muted">(2)</span></label>
                                </div> --}}
                            </div>
                        </div>
                        @php
                        $orderbyarr = [
                        'created_at__desc' => 'New arrivals',
                        'product_name__asc' => 'Alphabetically, A-Z',
                        'product_name__desc' => 'Alphabetically, Z-A',
                        'product_price__asc' => 'Price: low to high',
                        'product_price__desc' => 'Price: high to low',
                    ];
                    $selected = request()->get('orderby') && request()->get('order_type') ? request()->get('orderby').'__'.request()->get('order_type') : 'created_at__desc';
                    @endphp
                        <!-- Shop Widget -->
                        <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div id="sort-by-checkbox" class="widget-desc">
                                @foreach ($orderbyarr as $key => $value)
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" value="{{ $key }}" id="customCheck_{{ $key }}"
                                    @if ($selected == $key)
                                        checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="customCheck_{{ $key }}" >{{ $value }}</label>
                                </div>
                                @endforeach
                                <!-- Single Checkbox -->
                               
                                {{-- <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                </div> --}}
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        {{-- <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Seller</h4>
                            <div class="widget-desc">

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details"><img src="img/bg-img/4.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details">Cactus Flower</a>
                                        <p>$10.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details"><img src="img/bg-img/5.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details">Tulip Flower</a>
                                        <p>$11.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details"><img src="img/bg-img/34.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details">Recuerdos Plant</a>
                                        <p>$9.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
                           
                            @foreach ($products as $product)
                             <!-- Single Product Area -->
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img-home">
                                           
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                @php
                                                    $mainimages = $product->images->filter(function ($image) {
                                                        return $image->is_main == 1 || $image->is_main == true;
                                                    })->first();
                                                    if(!$mainimages){
                                                        $mainimages = $product->images->first();
                                                    }
                                                @endphp
                                                <img src="{{ Storage::url($mainimages['product_images']) }}" alt="{{ $product->product_name }}"></a>
                                            <!-- Product Tag -->
                                            @if ($product->is_hot)
                                            <div class="product-tag">
                                                <a href="#">Hot</a>
                                            </div>
                                            @endif

                                            @if ($product->on_sale)
                                            <div class="product-tag sale-tag">
                                                <a href="#">Sale</a>
                                            </div>
                                            @endif

                                            <div class="product-meta d-flex">
                                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="#" wire:click.prevent="addItemToCart({{ $product->id }})" class="add-to-cart-btn">Add to cart</a>
                                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                            </div>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                <p>{{ $product->product_name }}</p>
                                            </a>
                                            <h6>₹ {{ $product->product_price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           
                            

                            {{-- <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/41.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/42.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/43.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/44.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/45.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/46.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/47.png" alt=""></a>
                                        <!-- Product Tag -->
                                        <div class="product-tag sale-tag">
                                            <a href="#">Sale</a>
                                        </div>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="shop-details"><img src="img/bg-img/48.png" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details">
                                            <p>Cactus Flower</p>
                                        </a>
                                        <h6>$10.99</h6>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        
                        <!-- Pagination -->
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                        {{-- <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


