<div>
   

    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6 offset-lg-4">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>CART</h2>
                    </div>
                   
                </div>
                <div class="shopping-cart-page">
                   
                
                    <ul class="shopping-cart-items">
                        <li class="clearfix">
                        {{-- <span class="item-name">Image</span> --}}
                        <span class="item-name" style="color: #707070;">Image</span>
                            <span class="item-price" style="color: #707070;">Prduct Name</span>
                           
                            <span class="item-price" style="color: #707070;">Price</span>
                            <span class="item-quantity" style="color: #707070;">Quantity</span>
                            <span class="item-price" style="color: #707070;">Sub Total</span>
                        </li>
                        @foreach ($cart_data as $item)
                        <li class="clearfix">
                            <img src="{{ Storage::url($item['photo']) }}" alt="{{ $item['name'] }}" />
                            <span class="item-name">{{ $item['name'] }}</span>
                            <span class="item-price">₹ {{ $item['price'] }}</span>
                            <span class="item-quantity">{{ $item['quantity'] }}</span>
                            <span class="item-price">₹ {{ $item['quantity'] * $item['price'] }}</span>
                          </li>
                     @endforeach
                      
                
                      
                    </ul>
                    <div class="shopping-cart-header">
                        <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{collect($cart_data)->count()}}</span>
                        <div class="shopping-cart-total">
                          <span class="lighter-text">Total:</span>
                          <span class="main-color-text">₹ {{ collect($cart_data)->sum('price') }}</span>
                        </div>
                      </div> <!--end shopping-cart-header -->
                    <button class="btn alazea-btn cart-checkout-btn">Checkout</button>
                  </div> 
            </div>
        </div>
    </section>
</div>

        @script
            <script>
            
            </script>
        @endscript
