@forelse($items as $item)
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="team-wrapper mb-30">
        <div class="team-img">
            <a href="#">
                <img height="300" src="{{asset($item->thumb)}}" alt="">
            </a>
            <div class="team-social">
                <a href="#">
                    <i class="ti-facebook"></i>
                </a>
                <a href="#">
                    <i class="ti-pinterest"></i>
                </a>
                <a href="#">
                    <i class="ti-twitter-alt"></i>
                </a>
                <a href="#">
                    <i class="ti-instagram"></i>
                </a>
            </div>
        </div>
        <div class="team-content text-center">
            <h4>{{$item->name}}</h4>
            <span>{{$item->job}} </span>
        </div>
    </div>
</div>
@empty
<p>chua co du lieu</p>
@endforelse