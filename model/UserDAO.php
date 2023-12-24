<?php
include_once 'config/db.php';
include_once 'model/User.php';
include_once 'model/BasicUser.php';
include_once 'model/AdminUser.php';

class UserDAO {
    
    public static function getAllUsers() {

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users");

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $usersList = [];
        while ($userDB = $result->fetch_object("User")) {
            $usersList[] = $userDB;
        }

        return $usersList;
    }  

    public static function getUsersByRole($role_id){
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE role_id=?");
        $stmt->bind_param("i",$role_id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        $usersList = [];
        while ($userDB = $result->fetch_object("User")) {
            $usersList[] = $userDB;
        }

        return $usersList;
    }
    
    public static function insertUser(BasicUser|AdminUser $user) {
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $roleId = $user->getRoleId();
        $phoneNumber = $user->getPhoneNumber();

        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO users (name, surname, email, password, role_id, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $name, $surname, $email, $password, $roleId, $phoneNumber);

        $result = $stmt->execute();

        $stmt->close();
        $con->close();

        return $result;
    }

    public static function deleteUser($id) {
        $con = DB::connectDB();

        $stmt = $con->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
        
    }

    public static function updateUser($user) {

        $con = DB::connectDB();

        $query = "UPDATE users";
        $query .= "SET name = ?, ";
        $query .= "surname = ?, ";
        $query .= "eamil = ?, ";
        $query .= "phone_numer = ?, ";
        $query .= "password = ?, ";
        $query .= "role_id = ?, ";
        $query .= "incorporation_date = ?, ";
        $query .= "WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssisiii",
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPhoneNumer(),
            $user->getPassword(),
            $user->getRoleId(),
            $user->getIncorporationDate(),
            $user->getId()

        );

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    public static function getUserById($id) {
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i",$id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        return $result->fetch_object('User');
    }

    public static function getUserByEmail($email) {
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        return $result->fetch_object('User', ['id', 'name', 'surname', 'email', 'password', 'role_id']);
    }




}