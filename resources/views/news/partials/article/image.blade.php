@php
    $name         = $item['name'];
    $thumb        = asset('images/article/' . $item['thumb']);

    $class = "";
    if(!empty($type) && $type == "single") {
        $class = "img-fluid w-100";
    }
@endphp
<div class="post_image">
    <img src="{{  $thumb  }}" alt="{{ $name }}" class="{{ $class }}">
</div>
