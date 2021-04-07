@php
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';  
    // echo '<pre style="color:red";>$items === '; print_r($items['list_attribute']);echo '</pre>';    
    // echo '<h3>Die is Called Blade</h3>';die;
    $link = route('comment/addComment', ['product_id' => $items['id']]); 
    // $username = session('userInfo')['username'];
    // $data = session()->all();
    // echo '<pre style="color:red";>$data === '; print_r($data);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    // echo '<pre style="color:red";>$_SERVER === '; print_r($_SERVER['REMOTE_ADDR']);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp


<form action="{{ $link }}" method="POST">
    @csrf
    <div class="star-box">
        <h2>Rating:</h2>
        <div class="product-rating">
            <i class="ti-star theme-color"></i>
            <i class="ti-star theme-color"></i>
            <i class="ti-star theme-color"></i>
            <i class="ti-star"></i>
            <i class="ti-star"></i>
            <span>(3)</span>
        </div>
    </div>

    <div class="row">

        @if( (session('userInfo') == null) )
            <div class="col-md-6">
                <div class="rating-form-style mb-20">
                    <input placeholder="Name" name="name" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="rating-form-style mb-20">
                    <input placeholder="Email" name="email" type="email">
                </div>
            </div>
        @else
            <input type="hidden" name="username" value="{{ session('userInfo')['username'] }}">
            <input type="hidden" name="name" value="{{ session('userInfo')['fullname'] }}">
            <input type="hidden" name="email" value="{{ session('userInfo')['email'] }}">
        @endif


        <div class="col-md-12">
            <div class="rating-form-style form-submit">
                <textarea name="message" placeholder="Message"></textarea>
                <input type="submit" value="add review">
                <input type="hidden" name="ip" value="{{ $_SERVER['REMOTE_ADDR'] }}">
                <input type="hidden" name="product_id" value="{{ $items['id'] }}">

            </div>
        </div>

    </div>
</form>
