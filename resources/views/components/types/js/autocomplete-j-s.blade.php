<script type="text/javascript">
    $(document).ready(function() {
        $('#searchInput').keyup(function() {
            var query = $(this).val();

            if (query != '') {
                $.ajax({
                    url: "{{ route('types.autocomplete') }}",
                    method: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#searchResult').html(data);
                        $('#searchResult').slideDown();
                    }
                });
            } else {
                $('#searchResult').slideUp();
            }
        });

        $(document).on('click', 'li', function() {
            $('#searchInput').val($(this).text());
            $('#searchResult').slideUp();
        });
    });
</script>