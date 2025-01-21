<?php
class MessageController{


    public function message_popup()
    {
        $data['pvs']=MessageModel::have_pv($_SESSION['id']);
        View::render('message/messagePopup',$data);

    }

    public function message_search()
    {
        $data['pvs']=MessageModel::user_search($_REQUEST['search']);
        View::render('message/search',$data);
    }

    public function chat_page_popup()
    {
        $data['user_info']= UserModel::user_info_id($_REQUEST['user_id']);
        View::render('message/chat_page',$data);
    }

    public function message_list()
    {
        MessageModel::update_seen($_REQUEST['user_id']);
        $data['messages']= MessageModel::chat_user_message($_REQUEST['user_id']);
        View::render('message/messge_list',$data);

    }


    public function send_msg()
    {
        if (isset($_POST['msg']) and isset($_FILES['msg-upload'])){

           if (!empty($_POST['msg'] and empty($_FILES['msg-upload']['name']))){

               MessageModel::send_text_message($_POST['msg'],$_POST['msgTo']);

            }elseif (empty($_POST['msg'] and !empty($_FILES['msg-upload']['name']))){


               $file_name = $_FILES['msg-upload']['name'];
               $file_tmp =$_FILES['msg-upload']['tmp_name'];

               $file_ext=strtolower(end(explode('.',$file_name)));

               $extensions= array("jpeg","jpg","png","mp4");

               if(in_array($file_ext,$extensions)=== false){

               }else{

                   if ($file_ext == "mp4"){
                       move_uploaded_file($file_tmp,"assets/messageMedia/video/".$file_name);
                       MessageModel::send_media_message("/assets/messageMedia/video/".$file_name,$_POST['msgTo']);
                   }else{
                       move_uploaded_file($file_tmp,"assets/messageMedia/image/".$file_name);
                       MessageModel::send_media_message("/assets/messageMedia/image/".$file_name,$_POST['msgTo']);

                   }
               }

           }

        }
    }


    public function delete_message()
    {

        MessageModel::delete_message($_POST['id']);

    }


    public function msg_count()
    {
        $count = MessageModel::count_message();

        echo json_encode(
            array("count_message" => $count['count_message'])
        );

    }



}