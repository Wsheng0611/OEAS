<!-- Header Page -->
<header>
    <div class = "container_subheader">
        <!-- call sub-icon class for CSS purpose -->
        <a href="#"><i class="sub_icon fab fa-facebook-f"></i></a>
        <a href="#"><i class="sub_icon fab fa-instagram"></i></a>
        <a href="#"><i class="sub_icon fab fa-twitter"></i></a>
        <a href="#" class="sub_text">CONTACT US</a>
    </div>

    <!-- Container 2 - for navigation bar -->
    <div class="navbar">
        <div class="container_mainheader">
            
            <a href = "{{url('/')}}" class="app_logo col-md-2"><img src="{{asset('images/app_logo.png')}}" alt="MyImage"></a> 
            
            <div class="d-flex">
                <a class="nav-link nav-text" href="{{url('/')}}">Home</a>
            </div>
        
            <div class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle nav-text" href="{{route('product_list')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Products
                </a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" role="menu">
                    
                    <!-- retrieve categories table, take null as top category
                         retrieve subcategories, match with top category, then display
                    -->
                    <?php $categories = App\Models\Category::where('parent_id')->get(); ?>
                    @foreach($categories as $category)  
                        @if($category->parent_id == null)

                                <a href="{{url('/product_list/'.$category->id) }}">{{ $category->name }}</a>

                            <?php $subcategories = App\Models\Category::where('parent_id', $category->id)->get(); ?>
                            @foreach($subcategories as $subcategory)
                                <li><a href="{{ url('/product_list/'.$subcategory->id) }}">{{ $subcategory->name }}</a></li>
                            @endforeach

                        @endif
                    
                    @endforeach
                </div>
            </div>

            <form class="d-flex col-md-3">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
                
            <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart col-md-1 main_icon"></i></a>

            <a href="#"><i class="fa fa-heart col-md-1 main_icon"></i></a>

            {{-- hidden form, when click logout only will trigger --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="{{ isset(Auth::user()->id) ? route('logout') : (route('login')) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="login">
                <i class="{{ isset(Auth::user()->id) ? 'fa fa-user-circle' : 'fa fa-sign-out' }}"></i>
                {{ isset(Auth::user()->id) ? 'LOGOUT' : (request()->is('register') ? 'LOGIN' : 'LOGIN / REGISTER') }}
            </a>

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