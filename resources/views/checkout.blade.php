<x-guest-layout />

<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

<script>
  paypal.Buttons({
    // Order is created on the server and the order id is returned
    createOrder() {
      return fetch("/my-server/create-paypal-order", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        // use the "body" param to optionally pass additional order information
        // like product skus and quantities
        body: JSON.stringify({
          cart: [
            {
              sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
              quantity: "YOUR_PRODUCT_QUANTITY",
            },
          ],
        }),
      })
      .then((response) => response.json())
      .then((order) => order.id);
    },
    // Finalize the transaction on the server after payer approval
    onApprove(data) {
      return fetch("/my-server/capture-paypal-order", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderID: data.orderID
        })
      })
      .then((response) => response.json())
      .then((orderData) => {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  window.location.href = 'thank_you.html';
      });
    }
  }).render('#paypal-button-container');
</script>

<div class="container">
  <div class="row">
    <div class="site-content col-12 col-lg-12 col-md-12">
      <form action="login" method="POST">
        <div class="col-12 col-md-7 col-lg-6">
          <div class="checkout-review">
            <h3 id="order_header">Order Summary</h3>
            <div class="review">
              <?php $subtotal =0; ?>
              @foreach ($checkout_data as $data)
              <table class="review_table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantiy</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img src="{{asset($data['product']['image'])}}" class="product_image" alt="aa">
                    </td>
                    <td>{{ $data['product']['name']}}</td>
                    <td>{{ $data['product']['price']}}</td>
                    <td>{{ $data['quantity']}}</td>
                    <td>{{ $data['total_price']}}</td>
                    <?php $subtotal += $data['total_price']; ?>
                  </tr>
                </tbody>
                @endforeach
                <tfoot>
                  <tr>
                    <td>
                      <label for="subtotal">Total</label>
                      <input type="text" id="subtotal" class="form-control" value="{{ $subtotal }}" readonly>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="payment">
              <ul class="payment_method">
                <li class="bank_payment">
                  <input type="radio">
                  <label>Direct Bank Transfer</label>
                  <div style="display: none;">
                    <p>
                      Make yout payment directyle into your bank account.
                      Please use your Order ID as payment reference.
                      Your order won't be shipped until the funds have cleared
                    </p>
                  </div>
                </li>
                <li class="COD">
                  <input type="radio">
                  <label>Cash On Delivery</label>
                  <div style="display: none;">
                    <p>
                      Pay with cash upon delivery
                    </p>
                  </div>
                </li>
              </ul>
              
              <div class="form-row place_order">
                <div>
                  <p>
                    Your personal data will be used to process your order,
                    support your experience throughout this website,
                    and for other purposes described in our
                    
                    <a href ="#">privary policy</a>.
                  </p>
                </div>
                
                <div>
                  <input type="checkbox">
                  <p>I have read and agree to the website</p>
                </div>
              </div>
            </div>

            {{-- <button type="submit">Place Order</button> --}}
            <div id="paypal-button-container"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .container{
    max-width: 1222px;
  }

  .row{
    align-items: flex-start !important;
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .site-content{
    margin-bottom: 40px;
  }

  .col-lg-6 {
      width: 100% !important;
  }

  .checkout-review{
    position: relative;
    margin-bottom: 40px;
    padding: 30px;
    background-color: #f7f7f7;
  }

  .checkout-review:before{
    top: -10px !important;
    background-position: -3px -5px, 0 0 !important;
  }

  .checkout-review:before{
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 10px;
    background-color: transparent;
    background-image: radial-gradient(farthest-side, transparent 6px, #f7f7f7 0);
    background-size: 15px 15px;
  }

  .checkout-review:after{
    bottom: -10px;
    background-position: -3px 2px, 0 0;
  }

  .checkout-review:after{
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 10px;
    background-color: transparent;
    background-image: radial-gradient(farthest-side, transparent 6px, #f7f7f7 0);
    background-size: 15px 15px;
  }
  #order_header{
    text-align: center;
    text-transform: uppercase;
    margin: 0px 0px 20px;
    font-size: 22px; 
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
  }

  .review{
    verflow-x: auto;
    margin-bottom: 20px;
    padding: 5px 15px;
    border-radius: 0px;
    background-color: #ffffff;
    box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
  }

  .table{ 
    margin-bottom: 35px;
    width: 100%;
    border-spacing: 0;
    border-collapse: collapse;
    line-height: 1.4;
  }

  .review_table thead th{
    flex-basis: 50%;
  }

  th{
    text-align: left;
  }

  table th {
    padding: 15px 10px;
    border-bottom: 2px solid var(--brdcolor-gray-200);
    color: #242424
    text-transform: uppercase;
    font-weight: var(600);
    font-size: 14px;
  }

  .payment_method{
    list-style: none;
    --li-pl: 0;
    --li-mb: 15px;
  }

  input[type="radio"], input[type="checkbox"] {
    box-sizing: border-box;
    margin-top: 0;
    padding: 0;
    vertical-align: middle;
    margin-inline-end: 5px;
  }

  input{
    margin: 0;
    color: inherit;
    font: inherit;
  }

  .total-label {
    float: left; /* Align label on the left */
    width: 50%; /* Set label width */
    margin-right: 10px; /* Add some margin to the right of the label for spacing */
  }

  .total-input {
    float: right; /* Align input on the right */
    width: 50%; /* Set input width */
  }
  
  .payment_method li>label{
    display: inline;
    margin-bottom: 0; 
  }
</style>