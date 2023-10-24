<?php
class PasswordHashing {
    public static function genPassHash($salt, $password) {
        $password_hash = sha1($password);
        $salted_password_hash = $salt . $password_hash;
        $passhash = sha1($salted_password_hash);
        return $passhash;
    }
}