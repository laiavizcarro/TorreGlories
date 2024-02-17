<?php

include_once 'config/db.php';
include_once 'User.php';
include_once 'BasicUser.php';
include_once 'AdminUser.php';
include_once 'Order.php';

/**
 * Objecte d'accés a dades User
 */
class UserDAO {
    
    /**
     * Obtindre tots els usuaris
     * 
     * @return AdminUser[]|BasicUser[]
     */
    public static function getAllUsers() {

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users");

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $usersList = [];
        while ($userDB = $result->fetch_array()) {
            if ($userDB['role_id'] == 1) {
                $user = new AdminUser();
                $user->setId($userDB['id']);
                $user->setName($userDB['name']);
                $user->setSurname($userDB['surname']);
                $user->setEmail($userDB['email']);
                $user->setPassword($userDB['password']);
                $user->setRoleId($userDB['role_id']);
                $user->setIncorporationDate($userDB['incorporation_date']);
                $user->setPoints($userDB['points']);
                $user->setUsedPoints($userDB['used_points']);
                $usersList[] = $user;
            } else {
                $user = new BasicUser();
                $user->setId($userDB['id']);
                $user->setName($userDB['name']);
                $user->setSurname($userDB['surname']);
                $user->setEmail($userDB['email']);
                $user->setPassword($userDB['password']);
                $user->setRoleId($userDB['role_id']);
                $user->setPhoneNumber($userDB['phone_number']);
                $user->setPoints($userDB['points']);
                $user->setUsedPoints($userDB['used_points']);
                $usersList[] = $user;
            }
            
        }

        return $usersList;
    }  

    /**
     * Obtindre usuaris a partir d'un rol
     * 
     * @param integer $role_id ID del rol
     * 
     * @return AdminUser[]|BasicUser[]
     */
    public static function getUsersByRole($role_id){
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE role_id = ?");
        $stmt->bind_param("i",$role_id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        $usersList = [];
        while ($userDB = $result->fetch_array()) {
            if ($userDB['role_id'] == 1) {
                $user = new AdminUser();
                $user->setId($userDB['id']);
                $user->setName($userDB['name']);
                $user->setSurname($userDB['surname']);
                $user->setEmail($userDB['email']);
                $user->setPassword($userDB['password']);
                $user->setRoleId($userDB['role_id']);
                $user->setIncorporationDate($userDB['incorporation_date']);
                $user->setPoints($userDB['points']);
                $user->setUsedPoints($userDB['used_points']);
                $usersList[] = $user;
            } else {
                $user = new BasicUser();
                $user->setId($userDB['id']);
                $user->setName($userDB['name']);
                $user->setSurname($userDB['surname']);
                $user->setEmail($userDB['email']);
                $user->setPassword($userDB['password']);
                $user->setRoleId($userDB['role_id']);
                $user->setPhoneNumber($userDB['phone_number']);
                $user->setPoints($userDB['points']);
                $user->setUsedPoints($userDB['used_points']);
                $usersList[] = $user;
            }
        }

        return $usersList;
    }
    
    /**
     * Crear usuari
     * 
     * @param User $user Usuari a crear
     */
    public static function insertUser($user) {
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $roleId = $user->getRoleId();

        $incorporationDate = null;
        $phoneNumber = null;
        if ($roleId == 1) {
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

    /**
     * Eliminar un usuari
     * 
     * @param integer $id ID de l'usuari
     * 
     * @return boolean
     */
    public static function deleteUser($id) {
        $con = DB::connectDB();

        $stmt = $con->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }

    /**
     * Modificar un usuari
     * 
     * @param AdminUser|BasicUser $user Usuari a modificar
     * 
     * @return boolean
     */
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
        $points = $user->getPoints();
        $used_points = $user->getUsedPoints();

        $con = DB::connectDB();

        $query = "UPDATE users ";
        $query .= "SET name = ?, ";
        $query .= "surname = ?, ";
        $query .= "email = ?, ";
        $query .= "phone_number = ?, ";
        $query .= "password = ?, ";
        $query .= "role_id = ?, ";
        $query .= "incorporation_date = ?, ";
        $query .= "points = ?, " ;
        $query .= "used_points = ? ";
        $query .= "WHERE id = ? ";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssisisiii", $name, $surname, $email, $phoneNumber, $password, $roleId, $incorporationDate, $points, $used_points, $id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    /**
     * Obtindre un usuari a partir del seu id
     * 
     * @param integer $id ID de l'usuari
     * 
     * @return AdminUser|BasicUser
     */
    public static function getUserById($id) {
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i",$id);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        $userDB = $result->fetch_array();
        if ($userDB['role_id'] == 1) {
            $user = new AdminUser();
            $user->setId($userDB['id']);
            $user->setName($userDB['name']);
            $user->setSurname($userDB['surname']);
            $user->setEmail($userDB['email']);
            $user->setPassword($userDB['password']);
            $user->setRoleId($userDB['role_id']);
            $user->setIncorporationDate($userDB['incorporation_date']);
            $user->setPoints($userDB['points']);
            $user->setUsedPoints($userDB['used_points']);
            return $user;
        } else {
            $user = new BasicUser();
            $user->setId($userDB['id']);
            $user->setName($userDB['name']);
            $user->setSurname($userDB['surname']);
            $user->setEmail($userDB['email']);
            $user->setPassword($userDB['password']);
            $user->setRoleId($userDB['role_id']);
            $user->setPhoneNumber($userDB['phone_number']);
            $user->setPoints($userDB['points']);
            $user->setUsedPoints($userDB['used_points']);
            return $user;
        }
    }

    /**
     * Obtindre un usuari a partir del seu email
     * 
     * @param string $email Email de l'usuari
     * 
     * @return AdminUser|BasicUser
     */
    public static function getUserByEmail($email) {
        
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        $userDB = $result->fetch_array();
        if ($userDB == null) {
            return null;
        }

        if ($userDB['role_id'] == 1) {
            $user = new AdminUser();
            $user->setId($userDB['id']);
            $user->setName($userDB['name']);
            $user->setSurname($userDB['surname']);
            $user->setEmail($userDB['email']);
            $user->setPassword($userDB['password']);
            $user->setRoleId($userDB['role_id']);
            $user->setIncorporationDate($userDB['incorporation_date']);
            $user->setPoints($userDB['points']);
            $user->setUsedPoints($userDB['used_points']);
            return $user;
        } else {
            $user = new BasicUser();
            $user->setId($userDB['id']);
            $user->setName($userDB['name']);
            $user->setSurname($userDB['surname']);
            $user->setEmail($userDB['email']);
            $user->setPassword($userDB['password']);
            $user->setRoleId($userDB['role_id']);
            $user->setPhoneNumber($userDB['phone_number']);
            $user->setPoints($userDB['points']);
            $user->setUsedPoints($userDB['used_points']);
            return $user;
        }
    }




}