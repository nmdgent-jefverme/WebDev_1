<?php

class Message {


    public function __construct() {
        
    }

    public static function byId($message_id){
        global $db;

        $sql = "SELECT * FROM message WHERE message_id = :message_id";

        $sth = $db->prepare($sql);
        $sth->execute([
            ':message_id' => $message_id
        ]);

        return $sth->fetchObject();
    }

    public static function all($tag_id){
        global $db;

        if($tag_id) {
            $sql = "SELECT message.*, user.* FROM message 
                    INNER JOIN message_tag ON message_tag.message_id = message.message_id 
                    INNER JOIN user ON message.user_id = user.user_id
                    WHERE message_tag.tag_id = :tag_id 
                    ORDER BY message_id DESC";

            $sth = $db->prepare($sql);
            $sth->execute([
                "tag_id" => $tag_id
            ]);
        } else {
            $sql = "SELECT * FROM message 
                    INNER JOIN user ON message.user_id = user.user_id 
                    ORDER BY message_id DESC";

            $sth = $db->prepare($sql);
            $sth->execute([
            ]);
        }

        return $sth->fetchAll();
    }

}