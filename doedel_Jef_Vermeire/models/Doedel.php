<?php

class Doedel {


    public function __construct() {
        
    }

    public static function datesById($code){
        global $db;
		$sql = "select * from doedel_date inner join doedel on doedel_date.doedel_code = doedel.doedel_code where doedel_date.doedel_code = :code order by doedel_date";
		$stmt = $db->prepare($sql);
		$stmt->execute([':code' => $code]);
		return $stmt->fetchAll();
    }

    public static function doedelById($code){
        global $db;
		$sql = "select * from doedel where doedel_code = :code";
		$stmt = $db->prepare($sql);
		$stmt->execute([':code' => $code]);
		return $stmt->fetch();
    }


    public static function get_results($doedel_date_id){
        global $db;
		$sql = "select count(*) from vote where doedel_date_id = :code";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':code', $doedel_date_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }

    public static function add_votes($name, $email, $dates) {
        global $db;
        
        $sql = "INSERT INTO user 
        (name, email) VALUES 
        (:name, :email)";
        $sth = $db->prepare($sql);
        $sth->execute([
            ':name' => $name,
            ':email' => $email,
        ]);
        $user_id = self::get_last_user_id()[0];
        foreach($dates as $date) {
            $sql = "INSERT INTO vote 
            (user_id, doedel_date_id) VALUES 
            (:user_id, :doedel_date_id)";

            $sth = $db->prepare($sql);
            $sth->execute([
                ':user_id' => $user_id,
                ':doedel_date_id' => $date
            ]);
        }
        
    }

    public static function add($name, $description, $dates){
        global $db;

        $sql = "INSERT INTO doedel 
        (doedel_code, name, description, creation_date) VALUES 
        (:doedel_code, :name, :description, :creation_date)";
    
        $doedel_code  = uniqid();

        $sth = $db->prepare($sql);
        $sth->execute([
            ':name' => $name,
            ':description' => $description,
            ':doedel_code' => $doedel_code,
            ':creation_date' => date("Y-m-d H:i:s")
        ]);
        
        foreach($dates as $date) {
            $sql = "INSERT INTO doedel_date 
            (doedel_code, doedel_date) VALUES 
            (:doedel_code, :doedel_date)";

            $sth = $db->prepare($sql);
            $sth->execute([
                ':doedel_code' => $doedel_code,
                ':doedel_date' => date('Y-m-d H:i:s', strtotime($date))
            ]);
        }

        return $doedel_code;
    }

    public static function get_last_user_id() {
        global $db;
		$sql = "select user_id from user order by user_id desc limit 1";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
    }
}