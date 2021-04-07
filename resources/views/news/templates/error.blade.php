@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
            <p><strong>{{ $message}}</strong></p>
        @endforeach
    </div>
@endif