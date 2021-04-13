@foreach($items as $key => $value)    
    <iframe width="450" height="315" 
        src="{{ 'https://www.youtube.com/embed/' . $value }}">
    </iframe>
@endforeach

{{-- <div class="col-md-55">
    <div class="thumbnail">
        <div class="image view view-first">
            <img style="width: 100%; display: block;" src="images/media.jpg" alt="image">
            <div class="mask">
                <p>Your Text</p>
                <div class="tools tools-bottom">
                <a href="#"><i class="fa fa-link"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="caption">
            <p>Snow and Ice Incoming for the South</p>
        </div>
    </div>
</div> --}}

