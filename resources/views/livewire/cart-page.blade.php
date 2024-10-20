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

                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th></th>
                    </tr> 
                    @foreach ($cart_data as $id => $product)
                    <tr>
                        <td><img width="70" src="{{ Storage::url($product['photo']) }}" alt="{{ $product['name'] }}" /></td>
                        <td><a style="color: #70c745" href="{{ $product['url'] }}">{{ $product['name'] }}</a></td>
                        <td>₹ {{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>₹ {{ $product['price'] * $product['quantity'] }}</td>
                        <td><a href="#" class="cart-item-delete" wire:click.prevent="removeFromCart({{ $id }})"><i class="fa fa-trash cart-delete-icon"></i></a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="text-align: center" colspan="4">
                            <span style="font-size: 32px"> Total</span>
                        </td>
                        <td>
                           <span style="font-size: 32px"> ₹ {{ collect($cart_data)->sum('price') }}</span> 
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <button wire:click.prevent="paceOrder" class="btn alazea-btn cart-checkout-btn">Checkout / Place Order</button>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </section>
</div>

        @script
            <script>
            
            </script>
        @endscript
