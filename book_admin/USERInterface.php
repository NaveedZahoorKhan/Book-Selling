<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Rebbel
 */
interface USERInterface
{
    //put your code here
    public function createUser($userdata, $file);
    public function deleteUser($email);
    public function getUser($userName);
    public function setUser();
    public function login($logindata);
    public function sessionManager($sessionData);
    public function getBooks($userid);
}
