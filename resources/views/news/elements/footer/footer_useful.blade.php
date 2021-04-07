<div class="footer-content">
    <ul>
        @foreach($itemsMenu as $item)
            <li><a href="{{$item->link}}">{{$item->name}}</a></li>
        @endforeach
    </ul>
</div>
