<?php

class MessageModel{

    public static function have_pv($user_id)
    {
       $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT DISTINCT users.* FROM `messages` LEFT OUTER JOIN users
 ON users.user_id = messages.messageTo  OR users.user_id = messages.messageFrom
  WHERE (messages.messageFrom = :user_id OR messages.messageTo = :user_id )
  AND users.user_id != :user_id");
        $res->bindParam(":user_id" , $user_id);
        $res->bindParam(":user_id" , $user_id);
        $res->bindParam(":user_id" , $user_id);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function last_message_info($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `messages` WHERE
 (`messageTo` = :msgto AND `messageFrom` = :user_id)
      OR (`messageTo` = :user_id AND `messageFrom` = :msgto) ORDER BY messageTime DESC LIMIT 1
");
        $res->bindParam(":msgto" , $user_id);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->bindParam(":msgto" , $user_id);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function user_search($search)
    {
        $search = '%'.$search.'%';
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE username like :search and user_id != :user_id");
        $res->bindParam(":search" , $search);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function chat_user_message($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `messages` LEFT OUTER JOIN users
 ON users.user_id = messages.messageFrom WHERE  (`messageTo` = :msgto AND `messageFrom` = :user_id)
      OR (`messageTo` = :user_id AND `messageFrom` = :msgto)");
        $res->bindParam(":msgto" , $user_id);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->bindParam(":msgto" , $user_id);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function send_text_message($msg,$msgto)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare(" INSERT INTO `messages`(`messageFrom`, `messageTo`, `message`) 
                                VALUES (:messageFrom , :messageTo , :message)");
        $res->bindParam(":messageFrom" , $_SESSION['id']);
        $res->bindParam(":messageTo" , $msgto);
        $res->bindParam(":message" , $msg);
        $res->execute();
    }

    public static function send_media_message($msg,$msgto)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare(" INSERT INTO `messages`(`messageFrom`, `messageTo`, `message`) 
                                VALUES (:messageFrom , :messageTo , :message)");
        $res->bindParam(":messageFrom" , $_SESSION['id']);
        $res->bindParam(":messageTo" , $msgto);
        $res->bindParam(":message" , $msg);
        $res->execute();
    }


    public static function update_seen($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `messages` SET `seen`= 1 WHERE `messageTo` = :msgto
                                              AND `messageFrom` = :user_id");
        $res->bindParam(":msgto" , $_SESSION['id']);
        $res->bindParam(":user_id" , $user_id);
        $res->execute();


    }

    public static function delete_message($id)
    {
          $db =Db::getInstance();
        $res = $db->pdo->prepare(" DELETE FROM `messages` WHERE `message_id` = :msgto");
        $res->bindParam(":msgto" , $id);
        $res->execute();
    }


    public static function count_message()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT COUNT(*) AS 'count_message' FROM `messages` WHERE 
                                      `messageTo` = :msgto AND seen = 0");
        $res->bindParam(":msgto" , $_SESSION['id']);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function count_message_detail($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT COUNT(*) AS 'count_message' FROM `messages` WHERE 
                                      `messageFrom` = :msgto and messageTo = :me AND seen = 0");
        $res->bindParam(":msgto" , $user_id);
        $res->bindParam(":me" , $_SESSION['id']);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }


}