$(function () {

    $(document).on('click','.retweet , .retweeted',function () {

       let tweet_id = $(this).data('tweetid');

            $.ajax('/tweet/show_retweet', {
                type: 'POST',
                data: {
                    tweet_id: tweet_id
                },
                success: function (data) {
                    $('.popupTweet').show();
                    $('.popupTweet').html(data);
                }
            });
    });

    $(document).on('click','.close-retweet-popup',function () {

        $('.retweet-popup').hide();

    });

    $(document).on('click','.retweet-it',function () {
        let tweet_id = $(this).data('tweetid');
        let tweet_by = $(this).data('tweetby');
        let retweetMsg=  $('.retweetMsg').val();

        $.ajax('/tweet/add_retweet', {
            type: 'POST',
            data: {
                tweet_id: tweet_id,
                retweetMsg: retweetMsg,
                tweet_by: tweet_by
            },
            success: function () {
                $('.retweet-popup').hide();
                location.reload();
            }
        });


    });






});