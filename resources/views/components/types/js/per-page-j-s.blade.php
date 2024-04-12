<script>
    $(document).ready(function() {
        $('#perPageSelect').change(function() {
            var perPage = $(this).val();
            var url = "{{ route('types.index') }}";
            window.location.href = url + "?perPage=" + perPage;
        });

        var urlParams = new URLSearchParams(window.location.search);
        var perPageParam = urlParams.get('perPage');
        if (perPageParam) {
            $('#perPageSelect').val(perPageParam);
        }
    });
</script>