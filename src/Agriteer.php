<?php

namespace Ibonly\Agriteer;

use GuzzleHttp\Client;
use Ibonly\Agriteer\Main;

class Agriteer extends Main
{
    /**
     * Get all the states
     * 
     * @return object
     */
    public function getAllUsers()
    {
        return $this->api('GET', '/users');
    }

    public function getUser($id)
    {
        return $this->api('GET', '/user/'.$id);
    }

    public function getAt2pt($token)
    {
        return $this->api('GET', '/at2pt', $token);
        //if empty throw exception
    }

    public function findAt2pt($id, $token)
    {
        return $this->api('GET', '/at2pt'.$id, $token);
        //if empty throw exception
    }

    public function getAt2ptUser($token)
    {
        return $this->api('GET', '/at2pt/user', $token);
    }

    public function findAt2ptUser($id, $token)
    {
        return $this->api('GET', '/at2pt/user/'.$id, $token);
    }

    public function getTreeInfo($token)
    {
        return $this->api('GET', '/treeinfo/', $token);
    }

    public function getTreePicture($token)
    {
        return $this->api('GET', '/treepicture/', $token);
    }

    public function login()
    {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        return $this->postAPI('POST', '/login', $data);
    }

    public function register()
    {
        $data = [
            'name'  => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        return $this->postAPI('POST', '/signup', $data);
    }

    public function at2pt($token)
    {
        $data = [
            'local_name' => $_POST['local_name'],
            'common_name' => $_POST['common_name'],
            'scientific_name' => $_POST['scientific_name'],
            'tree_height' => $_POST['tree_height'],
            'tree_width' => $_POST['tree_width'],
            'tree_uses' => $_POST['tree_uses'],
            'other_info' => $_POST['other_info'],
            'address' => $_POST['address'],
            'lga' => $_POST['lga'],
            'state' => $_POST['state'],
            'country' => $_POST['country'],
            'tree_picture'     => $_POST['tree_picture'],
            'tree_part'   => $_POST['tree_part'],
        ];

        return $this->postAPI('POST', '/at2pt', $data, $token);
    }
}