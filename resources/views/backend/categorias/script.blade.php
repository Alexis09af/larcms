@section('script')
    <script type="text/javascript">

        $('#titulo').on('blur',function(){
            var tituloConvertido = this.value.toLowerCase().trim();
            slugInput = $('#slug');

            tituloConvertido = tituloConvertido.replace(/&/g, '-y-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(tituloConvertido);
        });



    </script>
@endsection