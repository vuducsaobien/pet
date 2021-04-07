{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3257202625227!2d106.69037385111042!3d10.786345992277074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2f20ed1c49%3A0x5781806fe59379f4!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gTOG6rXAgVHLDrG5oIFplbmQgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1578582210228!5m2!1svi!2s" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Contact Us'])

    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                @include('news.pages.contact.child-index.info')
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-message-wrapper">
                        <h4 class="contact-title">GET IN TOUCH</h4>
                        <div class="contact-message">
                            @include('news.pages.contact.child-index.form')
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map">
                <div id="maps">
                    {!! $setting_general['maps'] !!}
                </div>
            </div>
        </div>
    </div>

@endsection

