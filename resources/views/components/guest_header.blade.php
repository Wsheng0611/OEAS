<header>
    <div class = "subheader">
        <li><a href ="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href ="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href ="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href ="#">Contact Us</a></li>
    </div>
    <div class="mainheader col-md-12">
        <div class="application_logo col-md-2">
            <a href = "{{route('home')}}"><img src="#"></a>
        </div>

        <div class="nav_bar col-md-4">
            <ul>
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#">Product</a>
                    <ul>
                        <div class="mainproduct">
                            <li><a href="$">Main_Product_1</a>
                                <div class="subproduct">
                                    <ul> 
                                        <li><a href="$">Product_4</a></li>
                                        <li><a href="$">Product_2</a></li>
                                        <li><a href="$">Product_3</a></li>
                                        <li><a href="$">Product_4</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="$">Main_Product_2</a></li>
                            <li><a href="$">Main_Product_3</a></li>
                            <li><a href="$">Main_Product_4</a></li>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


        <div class="search">
            <form>
                <input type="text" placeholder="Search product...">
            </form>
        </div>

        <div class="shopping_cart">
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
        </div>

        <div class="wishlist">
            <a href="#"><i class="fa fa-heart"></i></a>
        </div>
    
        <div class = "account">
            <a href="#">Login</a>
        </div>
    </div>
</header>
        
    {{-- </div>
        
        <nav class="navbar">
        <ul>
            <li><a href = "{{ route('home') }}"><img src="{{asset('layout_img/logo.png') }}" width="150px"></a></li>           
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('product.list', ['product_role' => 5]) }}">PRODUCT</a>
                <div class="sub-navbar">
                    <ul>
                        <li>
                            <a href="{{ route('product.list', ['product_role' => 0]) }}">RACQUET</a>
                        </li>
                        <li>
                            <a href="{{ route('product.list', ['product_role' => 1]) }}">BAG</a>
                        </li>
                        <li>
                            <a href="{{ route('product.list', ['product_role' => 2]) }}">APPAREL</a>
                        </li>
                        <li>
                            <a href="{{ route('product.list', ['product_role' => 3]) }}">FOOTWEAR</a>
                        </li>
                        <li>
                            <a href="{{ route('product.list', ['product_role' => 4]) }}">ACCESSORIES</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('about') }}">ABOUT US</a></li>
            <li><a href="{{ route('contact') }}">CONTACT US</a></li>
            <li>
                <a href="{{ isset(Auth::user()->id) ? route('cart') : route('sign-in') }}"><i class="fa fa-shopping-bag"></i> CART</a>
            </li>
            <!-- To swap icon on top right header 
                Used PHP if condition 
                check user id{
                    if session pass, fa-circle = yes
                    if failed, fa-sign-out = no (used : to seperate both condition) ## same method as swaping the word ## 
                } 
            -->
            <li>
                <a href="{{ isset(Auth::user()->id) ? route('logout') : route('sign-in') }}">
                    <i  class="{{ isset(Auth::user()->id) ? 'fa fa-user-circle' : 'fa fa-sign-out' }}"></i>
                    {{ isset(Auth::user()->id) ? 'LOGOUT' : 'LOGIN/REGISTER' }}
                </a>
            </li>
        </ul>
    </nav>
</header>
     --}}