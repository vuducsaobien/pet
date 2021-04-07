@section('css')
    <style>
        .color-red{
            color: red;
        }
    </style>
@stop
<form id="contact-form" action="{{route('contact/post_contact')}}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <div class="contact-form-style mb-20">
                <input name="name" placeholder="Full Name" type="text">
                <span class="color-red">{{$errors->first('name')}}</span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="contact-form-style mb-20">
                <input name="email" placeholder="Email Address" type="email">
                <span class="color-red">{{$errors->first('email')}}</span>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="contact-form-style mb-20">
                <input name="subject" placeholder="Subject" type="text">
                <span class="color-red">{{$errors->first('subject')}}</span>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="contact-form-style">


                <textarea name="message" placeholder="Message"></textarea>
                <span class="color-red">{{$errors->first('message')}}</span>
                <br>
                <button class="submits btn-style" type="submit">SEND MESSAGE</button>


            </div>
        </div>
    </div>
</form>
