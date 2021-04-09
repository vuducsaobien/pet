<script type = "text/javascript">

    var controllerName         = "{{ $controllerName??'' }}";

    if ( controllerName == 'product' ) {
        if ( product_id !== '' ) {

            var token                  = "{{ csrf_token() }}";
            var product_id             = "{{ $product_id }}";
            var link_product_image     = "{{ route('product/image') }}";
            var link_product_get_image = "{{ route('product/get-image', $product_id) }}";
            var link_product           = '{{ asset("/images/product") }}';
            console.log('link_product = ' + link_product);

        }
    }

    
</script>
