@php
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';  
    // echo '<pre style="color:red";>$items === '; print_r($items['list_attribute']);echo '</pre>';    
    // echo '<h3>Die is Called Blade</h3>';die;
    echo $link = route('comment/addCommentProduct', ['product_id' => $items['id']]); 

    // echo '<pre style="color:red";>$_SERVER === '; print_r($_SERVER['REMOTE_ADDR']);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp


<form action="{{ $link }}" method="POST">
    @csrf
    <div class="star-box">
        <h2>Rating:</h2>
        <div class="product-rating">
            <i id="1" class="ti-star theme-color"></i>
            <i id="2" class="ti-star theme-color"></i>
            <i id="3" class="ti-star theme-color"></i>
            <i id="4" class="ti-star"></i>
            <i id="5" class="ti-star"></i>
            <span>(3)</span>
        </div>
    </div>

    <div class="row">

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
