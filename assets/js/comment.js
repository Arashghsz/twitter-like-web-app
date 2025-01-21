$(function () {

    $(document).on('click','.comment-btn',function () {

        let tweet_id = $(this).data('tweetid');

        $.ajax('/comment/show_comment', {
            type: 'POST',
            data: {
                tweet_id: tweet_id
            },
            success: function (data) {
                $('.popupTweet').html(data);
            }
        });


    });

    $(document).on('click','.tweet-show-popup-box-cut',function () {
        location.reload();
    });

    $(document).on('click','#postComment',function () {

        let comment=$('#commentField').val();
        let tweet_id = $(this).data('tweetid');

        if (comment.length > 0 ){
            $.ajax('/comment/add_comment', {
                type: 'POST',
                data: {
                    tweet_id: tweet_id,
                    comment: comment
                },
                success: function (data) {
                    $('#commentField').val("");
                    $('#comments').html(data);
                }
            });
        }

    });



    $(document).on('click','.trash',function () {

        let comment_id = $(this).data('commentid');

        let parent =$(this).parentsUntil(".tweet-show-popup-comment-box").parent();
        parent.remove();

            $.ajax('/comment/delete_comment', {
                type: 'POST',
                data: {
                    comment_id: comment_id
                },
                success: function (data) {
                    // $('#commentField').val("");
                    // $('#comments').html(data);
                }
            });


    });

});