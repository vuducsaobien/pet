<div class="qwick-view-left">
    <div class="quick-view-learg-img">
        <div class="quick-view-tab-content tab-content">

            {{-- Big Image --}}
            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                <img src="{{ asset('news/images/quick-view/l1.jpg') }}" alt="">
            </div>

            <div class="tab-pane fade" id="modal2" role="tabpanel">
                <img src="{{ asset('news/images/quick-view/l2.jpg') }}" alt="">
            </div>

            <div class="tab-pane fade" id="modal3" role="tabpanel">
                <img src="{{ asset('news/images/quick-view/l3.jpg') }}" alt="">
            </div>

        </div>
    </div>

    <div class="quick-view-list nav" role="tablist">

        {{-- Small Image --}}
        <a class="active" href="#modal1" data-toggle="tab">
            <img src="{{ asset('news/images/quick-view/s1.jpg') }}" alt="" style="width: 100%; height: 100%"/>
        </a>

        <a href="#modal2" data-toggle="tab" role="tab">
            <img src="{{ asset('news/images/quick-view/s2.jpg') }}" alt="" style="width: 100%; height: 100%"/>
        </a>

        <a href="#modal3" data-toggle="tab" role="tab">
            <img src="{{ asset('news/images/quick-view/s3.jpg') }}" alt="" style="width: 100%; height: 100%"/>
        </a>

    </div>

</div>
