$(function () {

    $(document).on('keyup','.status',function () {

        let text = $(this).val();
        let count = 140 - text.length;

        let reg = text.match('#[a-zA-z0-9]+$');
        let mention = text.match('@[a-zA-z0-9]+$');


        if (reg != null){

            $.ajax('/trend/show_suggest_trend', {
                type: 'POST',
                data: {
                    reg: reg
                },
                success: function (data) {
                    $('.hash-box ul').show();
                    $('.hash-box ul').html(data);
                }
            });

        }

        if (mention != null){

            $.ajax('/user/show_suggest_mention', {
                type: 'POST',
                data: {
                    mention: mention
                },
                success: function (data) {
                    $('.hash-box ul').show();
                    $('.hash-box ul').html(data);
                }
            });

        }

        if ( count >= 0 ){
            $('#count').text(count);
            $('.tweet-error1').text("");

        } else {
            $('#count').text(0);
            $('.tweet-error1').text("the length of text must be lower than 140 . ");
        }
    });

    $(document).on('click','.wrapper',function () {
        $('.hash-box ul').hide();
    });

        $(document).on('click','.getHashtag',function () {

        let value=$(this).text();
        let selector = $('.status');
        let text = selector.val();

        let reg = text.match('#[a-zA-z0-9]+$');

        let old = text.replace(reg,"");

        selector.val(old+value+" ");

        selector.focus();
        $('.hash-box ul').hide();

    });

    $(document).on('click','.getValue',function () {

        let value=$(this).text();
        let selector = $('.status');
        let text = selector.val();

        let reg = text.match('@[a-zA-z0-9]+$');

        let old = text.replace(reg,"");

        selector.val(old+value+" ");

        selector.focus();
        $('.hash-box ul').hide();

    });


    $(document).on('click','.deleteTweet',function () {

        let tweet_id = $(this).data('tweetid');

        $.ajax('/tweet/delete_tweet_popup', {
            type: 'POST',
            data: {
                tweet_id: tweet_id
            },
            success: function (data) {
                $('.popupTweet').html(data);
            }
        });
    });



    $(document).on('click','.cancel-it',function () {

        $('.retweet-popup').hide();

    });


    $(document).on('click','.delete-it',function () {

        let tweet_id = $(this).data('tweetid');

        $.ajax('/tweet/delete_tweet', {
            type: 'POST',
            data: {
                tweet_id: tweet_id
            },
            success: function () {
              location.reload();
            }
        });

    });


});