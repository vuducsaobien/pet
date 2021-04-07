<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0">
                <span class="label label-info label-pagination">{{ $items->perPage() }} items per page</span>  
                <span class="label label-success label-pagination">{{ $items->total() }} items</span> 
                <span class="label label-danger label-pagination">{{ $items->lastPage() }} pages</span>
            </p>
        </div>
        <div class="col-md-6">
            {!! $items->appends(request()->input())->links('pagination.pagination_backend') !!}
        </div>
    </div>
</div>