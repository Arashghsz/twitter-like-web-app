$(function () {

    $(document).on('keyup','.search',function () {

        let search = $(this).val();

        if (search.length > 0){
            $.ajax('/user/search', {
                type: 'POST',
                data: {
                    search: search
                },
                success: function (data) {
                    $('.search-result').html(data);
                }
            });
        }

    });

});