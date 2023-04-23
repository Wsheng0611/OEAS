<style>
    .footer-container {
        position: fixed;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgb(237, 237, 237);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    /* .container_footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: rgb(255, 246, 246);
        padding-top: 20px;
    }

    .aa {
        display: flex;
        align-items: center;
        flex-direction: column;
    } */
</style>

<footer class="footer-container">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <img src="{{asset('images/app_logo.png')}}" alt="MyImage" style="width: 100%; height:auto;">
                </div>

                <div class="footer-info">
                    <p>Welcome to Neptune Electrical Appliances Store. Buy for yourself</p>
                    <p>Customer Care</p>
                    <p>Operations Hour: 10am-6pm</p>
                    <p>Hotline: 0123456789</p>
                    <p>WhatsApp Chat: 0124567893</p>
                    {{-- Wisma Huazong, Lot 4, Jalan 51/217, Section 51, 46050 Petaling Jaya, Selangor, Malaysia.</p> --}}
                </div>
            </div>


                {{-- <li><a href="{{ url('/product_list?product_role=0') }}"> RACQUET </a></li> --}}
            
                <div class="col-md-3">
            <h3>USEFUL LINK</h3>
            <ul>
                <li><a href="{{ url('/about_us') }}">ABOUT US</a></li>
                <li><a href="{{ !Auth::check() ? url('/sign_in') : url('/order_history') }}">ORDER HISTORY</a></li>
                <li><a href="{{ url('/privacy_policy') }}">PRIVACY POLICY</a></li>
                <li><a href="{{ url('/terms') }}">TERMS &amp; CONDITIONS</a></li>
                <li><a href="{{ !Auth::check() ? url('/sign_in') : url('/profile') }}">MY ACCOUNT</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h3>FOLLOW US</h3>
            <div class="social-links">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="col-md-2">
            <h3>FOLLOW US</h3>
            <div class="social-links">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <hr><p style="text-align:center; margin-top: 20px;"> Copyright © 2023 Neptune Electrical Appliances. All right reserved.</p>
    </div>
</footer>

