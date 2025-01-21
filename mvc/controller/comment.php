<?php
class CommentController{

    public function show_comment()
    {
        $data['tweet']=TweetModel::show_retweet_form($_POST['tweet_id']);
        $data['comments']=CommentModel::show_comments($_POST['tweet_id']);
        View::render('comment/commentPopup',$data);
    }

    public function add_comment(){
        CommentModel::add_comment($_POST['tweet_id'],$_POST['comment']);
        $data['comments']=CommentModel::show_comments($_POST['tweet_id']);
        View::render('comment/comments',$data);
    }

    public function delete_comment(){
        CommentModel::remove_comment($_POST['comment_id']);
//        $data['comments']=CommentModel::show_comments($_POST['comment_id']);
//        View::render('comment/comments',$data);
    }
}