<?php

namespace mineichen\Service\Register;

interface RegisterServiceInterface 
{
    public function register($username, $email, $password);
}