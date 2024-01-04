<?php
include_once 'config/db.php';
include_once 'User.php';
include_once 'BasicUser.php';
include_once 'AdminUser.php';

class UserDAO {
    
    public static function getAllUsers() {

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users");

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $usersList = [];
        while ($userDB = $result->fetch_object("User")) {
            $user = $userDB['role_id'] == 1 ?
                new AdminUser(
                    $userDB['id'],
                    $userDB['name'],
                    $userDB['surname'],
                    $userDB['email'],
                    $userDB['password'],
                    $userDB['role_id'],
                    $userDB['incorporation_date']
                ) : new BasicUser(
                    $userDB['id'],
                    $userDB['name'],
                    $userDB['surname'],
                    $userDB['email'],
                    $userDB['password'],
                    $userDB['role_id'],
                    $userDB['phone_number'],
                );
            $usersList[] = $user;
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
            $user = $userDB['role_id'] == 1 ?
                new AdminUser(
                    $userDB['id'],
                    $userDB['name'],
                    $userDB['surname'],
                    $userDB['email'],
                    $userDB['password'],
                    $userDB['role_id'],
                    $userDB['incorporation_date']
                ) : new BasicUser(
                    $userDB['id'],
                    $userDB['name'],
                    $userDB['surname'],
                    $userDB['email'],
                    $userDB['password'],
                    $userDB['role_id'],
                    $userDB['phone_number'],
                );
            $usersList[] = $user;
        }

        return $usersList;
    }
    
    public static function insertUser(BasicUser|AdminUser $user) {
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $roleId = $user->getRoleId();

        $incorporationDate = null;
        $phoneNumber = null;
        if ($roleId = 1) {
            $incorporationDate = $user->getIncorporationDate();
        } else {
            $phoneNumber = $user->getPhoneNumber();
        }

        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO users (name, surname, email, password, role_id, phone_number, incorporation_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $surname, $email, $password, $roleId, $phoneNumber, $incorporationDate);

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

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $roleId = $user->getRoleId();
        $phoneNumber = null;
        $incorporationDate = null;
        if ($user->isAdmin()) {
            $incorporationDate = $user->getIncorporationDate();
        } else {
            $phoneNumber = $user->getPhoneNumber();
        }

        $con = DB::connectDB();

        $query = "UPDATE users ";
        $query .= "SET name = ?, ";
        $query .= "surname = ?, ";
        $query .= "email = ?, ";
        $query .= "phone_number = ?, ";
        $query .= "password = ?, ";
        $query .= "role_id = ?, ";
        $query .= "incorporation_date = ? ";
        $query .= "WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssisisi", $name, $surname, $email, $phoneNumber, $password, $roleId, $incorporationDate, $id);

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

        $resultArray = $result->fetch_array();

        return $resultArray['role_id'] == 1 ?
            new AdminUser(
                $resultArray['id'],
                $resultArray['name'],
                $resultArray['surname'],
                $resultArray['email'],
                $resultArray['password'],
                $resultArray['role_id'],
                $resultArray['incorporation_date']
            ) : new BasicUser(
                $resultArray['id'],
                $resultArray['name'],
                $resultArray['surname'],
                $resultArray['email'],
                $resultArray['password'],
                $resultArray['role_id'],
                $resultArray['phone_number'],
            );
    }

    public static function getUserByEmail($email) {
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        $resultArray = $result->fetch_array();

        if ($resultArray == null) {
            return null;
        }

        return $resultArray['role_id'] == 1 ?
            new AdminUser(
                $resultArray['id'],
                $resultArray['name'],
                $resultArray['surname'],
                $resultArray['email'],
                $resultArray['password'],
                $resultArray['role_id'],
                $resultArray['incorporation_date']
            ) : new BasicUser(
                $resultArray['id'],
                $resultArray['name'],
                $resultArray['surname'],
                $resultArray['email'],
                $resultArray['password'],
                $resultArray['role_id'],
                $resultArray['phone_number'],
            );
    }




}