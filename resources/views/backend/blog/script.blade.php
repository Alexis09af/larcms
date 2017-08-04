@section('script')
    <script type="text/javascript">
        //Añadimos clases al pagination del backend del blog
        $('ul.pagination').addClass('no-margin pagination-sm');

        $('#titulo').on('blur',function(){
            var tituloConvertido = this.value.toLowerCase().trim();
            slugInput = $('#slug');

            tituloConvertido = tituloConvertido.replace(/&/g, '-y-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(tituloConvertido);
        });

        //Añade el editor SimpleMde a el excerpt y a la descripción
        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

        $('#datetimepicker1').datetimepicker(
            {
                format: 'YYYY-MM-DD HH:mm:ss',
                showClear: true
            }
        );

        $('#draft-btn').click(function(e){
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });


    </script>
@endsection