$(function () {

    $(document).on('click','.like-btn',function () {


        $(this).addClass('unlike-btn').removeClass('like-btn');
        $(this).find(".fa-heart-o").addClass('fa-heart').removeClass('fa-heart-o');
        let likecount= $(this).find(".likeCount").text();
        likecount = parseInt(likecount) + 1;
        $(this).find(".likeCount").text(likecount);

        let likecount_comment= $(".tweet-like-count-body").text();
        likecount_comment = parseInt(likecount_comment) + 1;
        $(".tweet-like-count-body").text(likecount_comment);


        let tweet_id = $(this).data('tweetid');
        let tweet_by = $(this).data('tweetby');

        $.ajax('/like/add_like', {
            type: 'POST',
            data: {
                tweet_id: tweet_id,
                tweet_by: tweet_by
            },
            success: function () {

            }
        });



    });


    $(document).on('click','.unlike-btn',function () {


        $(this).addClass('like-btn').removeClass('unlike-btn');
        $(this).find(".fa-heart").addClass('fa-heart-o').removeClass('fa-heart');
        let likecount= $(this).find(".likeCount").text();
        likecount = parseInt(likecount) - 1;
        $(this).find(".likeCount").text(likecount);

        let likecount_comment= $(".tweet-like-count-body").text();
        likecount_comment = parseInt(likecount_comment) - 1;
        $(".tweet-like-count-body").text(likecount_comment);

        let tweet_id = $(this).data('tweetid');
        $.ajax('/like/reomve_like', {
            type: 'POST',
            data: {
                tweet_id: tweet_id
            },
            success: function () {

            }
        });



    });

});