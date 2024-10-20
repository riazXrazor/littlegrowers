<div class="cart">
    <a href="#" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity" >({{collect($cart_data)->count()}})</span></span></a>
    

    <div class="shopping-cart">
        <div class="shopping-cart-header">
          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{collect($cart_data)->count()}}</span>
          <div class="shopping-cart-total">
            <span class="lighter-text">Total:</span>
            <span class="main-color-text">₹ {{ collect($cart_data)->sum('price') }}</span>
          </div>
        </div> <!--end shopping-cart-header -->
    
        <ul class="shopping-cart-items">
            @foreach ($cart_data as $id => $item)
            <li class="clearfix">
                <img src="{{ Storage::url($item['photo']) }}" alt="{{ $item['name'] }}" />
                <span class="item-name">{{ $item['name'] }}</span>
                <span class="item-price">₹ {{ $item['price'] }}</span>
                <span class="item-quantity">Quantity: {{ $item['quantity'] }}</span>
                <span class="item-delete"><a href="#" wire:click.prevent="removeFromCart({{ $id }})"><i class="fa fa-trash cart-delete-icon"></i></a></span>
              </li>
         @endforeach
          
    
          
        </ul>
    
        <button class="btn alazea-btn cart-checkout-btn" wire:click.prevent="checkoutpage">Checkout</button>
      </div> <!--end shopping-cart -->
</div>