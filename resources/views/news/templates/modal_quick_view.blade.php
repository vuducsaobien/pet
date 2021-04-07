@php
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';    
    // echo '<h3>Die is Called Modal</h3>';die;
@endphp

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="ti-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                @include('news.templates.modal_quick_view_left')
                @include('news.templates.modal_quick_view_right')

            </div>
        </div>
    </div>
</div>