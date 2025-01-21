$(function () {

    $(document).on('click','.follow-btn-list',function () {

        let receiver = $(this).data("follow");

        if ($(this).hasClass("following-btn-list")){

            $(this).removeClass("following-btn-list");
            $(this).removeClass("unfollow-btn-list");
            $(this).html("<i class=\"fa fa-user-plus\"></i> Follow ");

            $.ajax('/follow/unfollow', {
                type: 'POST',
                data: {
                    receiver: receiver
                },
                success: function (data) {

                }
            });
            location.reload();
        } else {

            $(this).addClass("following-btn-list");
            $(this).text("Following");

            $.ajax('/follow/follow', {
                type: 'POST',
                data: {
                    receiver: receiver
                },
                success: function (data) {

                }
            });
            location.reload();
        }

    });

    $(".follow-btn-list").hover(function(){
            if ($(this).hasClass("following-btn-list")){
                $(this).addClass("unfollow-btn-list");
                $(this).text("unFollow");
            }

        },
        function(){
            if ($(this).hasClass("following-btn-list")){
                $(this).removeClass("unfollow-btn-list");
                $(this).text("Following");
            }
        });

});