$(function () {

    $(document).on('click','.follow-btn',function () {

        let receiver = $(this).data("follow");

        if ($(this).hasClass("following-btn")){

            $(this).removeClass("following-btn");
            $(this).removeClass("unfollow-btn");
            $(this).html("<i class=\"fa fa-user-plus\"></i> Follow ");
            let follower_count = $('.count-followers').text();
            follower_count = parseInt(follower_count);
            follower_count --;
            $('.count-followers').text(follower_count);

            $.ajax('/follow/unfollow', {
                type: 'POST',
                data: {
                    receiver: receiver
                }
            });

        } else {

            $(this).addClass("following-btn");
            $(this).text("Following");
            let follower_count = $('.count-followers').text();
            follower_count = parseInt(follower_count);
            follower_count ++;
            $('.count-followers').text(follower_count);

            $.ajax('/follow/follow', {
                type: 'POST',
                data: {
                    receiver: receiver
                }
            });

        }

    });

    $(".follow-btn").hover(function(){
        if ($(this).hasClass("following-btn")){
            $(this).addClass("unfollow-btn");
            $(this).text("unFollow");
        }

        },
        function(){
            if ($(this).hasClass("following-btn")){
                $(this).removeClass("unfollow-btn");
                $(this).text("Following");
            }
        });

});