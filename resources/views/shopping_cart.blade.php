<x-guest-layout /> 

<div class="container">
    <h1>Shopping Cart</h1>
    @if(count($carts) > 0)
    <div class="row">
      <form action="{{ route('checkout') }}" method="POST">
        @csrf <!-- Add CSRF token field for security -->
        <div class="col-md-12 col-lg-12 col-sm-12">
          <h2>Item In Cart</h2>
          <table>
            <thead>
              <tr>
                <th class="select-all-items">
                  <input type="checkbox" id="select-all">
                </th>
                <th class="label-image">Image</th>
                <th class="label-name">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th></th> <!-- for delete button column -->
              </tr>
            </thead>
            <tbody>
              <!-- CheckBox | Image | Name | Price | Quantity | Total Price -->
              @foreach ($carts as $cart)
                <tr>

                  <!-- CheckBox -->
                  {{-- <td class="select-one-item">
                    <input type="checkbox" id="select-one">
                  </td> --}}

                  <td class="select-one-item">
                    <input type="checkbox" id="select-one" name="is_ok[]" value="{{ $cart->id }}">
                  </td>

                  <!-- Image -->
                  <td>
                    <img src="{{asset($cart->product->image)}}" class="product_image" alt="{{$cart->product->name}}">
                  </td>
                      
                  <!-- Name -->
                  <td>
                    {{$cart->product->name}}
                  </td>

                  <!-- Price -->
                  <td class="product_price"> 
                    <!-- Set it to RM XX.XX format -->
                    RM: {{ number_format($cart->product->price, 2) }} 
                  </td>

                  <!-- Quantity -->
                  <td>
                    <div class="product_quantity" id="quantity_label">
                      <button class="minus-btn"> &minus; </button>
                        <!-- Max Quantity = Set to product available stock -->
                        <input type="number" min="1" max="{{$cart->product->stock_quantity}}" value="{{$cart->quantity}}">
                      <button class="plus-btn"> &plus; </button>
                    </div>
                  </td>
                        
                  <!-- Total Price -->
                  <td class="total-for-one-item" id="total-for-one-item" data-cart-id="{{ $cart->id }}"> <!-- data-cart-id save cart-id for each row -->
                    RM: {{number_format($cart->total_price, 2)}}
                  </td>

                   <!-- Delete Button -->
                  <td>
                    <button class="delete-btn" data-cart-id="{{ $cart->id }}">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12">
          <h2>Order Summary</h2>

          <div class="subtotal">
            <div class="subtotal-left">
              <span class="subtotal_label">Total</span>
              <span class="subtotal_item_count">(0 item)</span>
            </div>
            <div class="subtotal-right">
              <span class="total-price">RM&nbsp;00.00</span>
              <button type="submit">CheckOut</button> 
            </div>
          </div>

        </div>
      </form>
    </div>
    @else
    <div class="empty-cart">
      <img src="path/to/empty-cart-image.jpg" alt="Your Shopping Cart is Empty">
      <p>Your Shopping Cart is Empty. Go Shopping Now</p>
      <a href="{{url('/')}}" class="btn btn-primary">Go Shopping</a>
    </div>
  @endif
</div>

<script>

  /**
   * 
   * Edit Shopping Cart
   * ------------------
   * - Get cart id, quantity, price, subtotal set in <td>
   * - Set Up function to update subtotal (JavaScript) and update cart DB (JQuery Ajax)
   * - Set Up event listener to trigger update subtotal and cart DB function
   * 
   **/

  const quantityInputs = document.querySelectorAll('.product_quantity input');
  const total_price = document.querySelectorAll('.total-for-one-item');
  const product_price = document.querySelectorAll('.product_price');
  const cart_id = [];

  for (let i = 0; i < total_price.length; i++) {
    cart_id.push(total_price[i].dataset.cartId); // assess data-cart-id in each row and push to array
  }

  // Normal JavaScript
  function updateTotalPrice() {
    // ForEach loop through each row in Shopping Cart
    // Get current quantity, price and subtotal for updated product
    quantityInputs.forEach((quantityInput, i) => {

      const quantity = parseInt(quantityInput.value);
      const priceString = product_price[i].innerText.replace('RM: ', ''); //remove RM: to nothing
      const price = parseFloat(priceString.replace(',', '')); //remove , to nothing
      const total = quantity * price;

      total_price[i].innerText = 'RM: ' + total.toLocaleString('en-MY', { //format total_price to english language and Malaysia region with 'RM :'
        minimumFractionDigits: 2, maximumFractionDigits: 2 //ensure in 2 decimal place
      });
      
      const cartId = cart_id[i];
      
      updateCart(cartId, quantity, total); // call to update DB
    });
  }

  // JQuery Ajax function
  function updateCart(cartId, quantity, total) {
    const updateCartUrl = '{{route('update_cart')}}'; // url to send update request
    const token = $('meta[name="csrf-token"]').attr('content'); // get csrf token from page # since no form #

    // send AJAX request to update cart
    $.ajax({ 
      url: updateCartUrl,
      method: 'POST',
      dataType: 'json', // type of data expected back from server
      data: {
        id: cartId,
        quantity: quantity,
        total_price: total,
        _token: token // CSRF token for the request
      }, 
      // Callback function to handle success / fail response from server
      success: function(data) {
        console.log(data);
      },
      error: function(error) {
        console.error(error);
      }
    });
  }

  quantityInputs.forEach((quantityInput, index)  => {
    const minusButton = quantityInput.parentElement.querySelector('.minus-btn');
    const plusButton = quantityInput.parentElement.querySelector('.plus-btn');
    const maxQuantity = parseInt(quantityInput.getAttribute('max'));

    // When Minus Button clicked, will run the event inside
    minusButton.addEventListener('click', () => {
      let currentQuantity = parseInt(quantityInput.value); // retrieve current quantity in cart

      //decrease by 1 if more than 1
      if (currentQuantity > 1) {
        currentQuantity--;
        quantityInput.value = currentQuantity;
        updateTotalPrice(); // recalculate total price
      }
    });

    // When Plus Button clicked, will run the event inside
    plusButton.addEventListener('click', () => {
      let currentQuantity = parseInt(quantityInput.value);

      if (currentQuantity < maxQuantity) {
        currentQuantity++;
        quantityInput.value = currentQuantity;
        updateTotalPrice();
      }
    });

    // When Enter in Quantity Field, will run the event inside
    quantityInput.addEventListener('change', () => {
      try {
        let currentQuantity = parseInt(quantityInput.value);

        // if found quantity entered is not number or less than 1, auto set to 1
        if (isNaN(currentQuantity) || currentQuantity < 1) {
          currentQuantity = 1;
        } 

        // if found quantity entered is more than max, auto set to max
        else if (currentQuantity > maxQuantity) {
          currentQuantity = maxQuantity;
        }

        quantityInput.value = currentQuantity; // recalculate total price
        updateTotalPrice();

      } catch (error) {
        console.log(error);
      }
    });
  });

  /**
   * 
   * Select Item to Make Payment in Shopping Cart
   * --------------------------------------------
   * - Get checkbox in table | number of item and subtotal in order summary
   * - Set Up function to update subtotal and items (JavaScript)
   * - Set Up event listener to trigger select all or select one checkbox
   * 
   **/

  const selectAll = document.querySelector("#select-all");
  const selectOne = document.querySelectorAll('#select-one' );
  const itemCount = document.querySelector(".subtotal_item_count");
  const totalPrice = document.querySelector(".total-price");

  // Add event to select all when it clicked
  selectAll.addEventListener("click", function () {

    // store checkbox ticked state in one variable
    const isChecked = selectAll.checked;

    // Loop through each checkbox
    selectOne.forEach(function (checkbox) {
      checkbox.checked = isChecked;
    });

    updateSubtotal(); // call function to update subtotal to pay
  });

  // Loop through each checkbox and add event when it clicked
  selectOne.forEach(function (checkbox) {

    let isChecked = selectOne.checked;

    checkbox.addEventListener("click", function () {
      if (!isChecked) {
        checkbox.checked = true;
        isChecked = true;
      } else {
        checkbox.checked = false;
        isChecked = false;
      }

      // Call updateSubtotal() function only when the checkbox is checked
      updateSubtotal();

      // Check if all checkboxes are clicked
      const allChecked = Array.from(selectOne).every(function (checkbox) {
        return checkbox.checked;
      });

      // If all checkboxes are clicked, make select all checkbox clicked
      if (allChecked) {
        selectAll.checked = true;
      } else {
        selectAll.checked = false;
      }
    });
  });

  // Normal JavaScript
  function updateSubtotal() {
    let item_count = 0; // item_count for (0 item)
    let subtotal = 0; // subtotal for RM 00.00

    // Check if the select-all checkbox in clicked
    if (selectAll.checked) {
      selectOne.forEach(function (checkbox) {

        // Check if the current checkbox is checked
        if (checkbox.checked) {

          // Get the total price for the current checkbox
          const total_price = checkbox.parentNode.parentNode.querySelector('.total-for-one-item');    
          const priceString = total_price.innerText.replace('RM: ', ''); //remove RM: to nothing
          const price = parseFloat(priceString.replace(',', '')); //remove , to nothing

          // Add the total price to the subtotal
          item_count++;
          subtotal += price;
        }
      });
    }

    else {
      
      selectOne.forEach(function (checkbox) {

        if (checkbox.checked) {
          // Get the total price for the current checkbox
          const total_price = checkbox.parentNode.parentNode.querySelector('.total-for-one-item');    
          const priceString = total_price.innerText.replace('RM: ', ''); //remove RM: to nothing
          const price = parseFloat(priceString.replace(',', '')); //remove , to nothing

          // Add the total price to the subtotal
          item_count++;
          subtotal += price;
        }
      });
    }

    itemCount.textContent = `(${item_count} item${item_count !== 1 ? 's' : ''})`;
    totalPrice.textContent = `RM ${subtotal.toFixed(2)}`;
  }

  $(document).ready(function() {
    $('.delete-btn').click(function() {
      var cartId = $(this).data('cart-id');

      // Uncheck the checkbox associated with the deleted item
      $('[data-cart-id="' + cartId + '"]').prop('checked', false);
      
      $.ajax({
        url: "{{ route('delete_cart', ':cartId') }}".replace(':cartId', cartId),
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          _method: 'DELETE'
        },
        success: function(response) {
          // Remove the deleted item row from the cart display
          $('[data-cart-id="' + cartId + '"]').parent().remove();

          // Update the cart total or other information here
          updateSubtotal();
        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>