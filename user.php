<?php

require_once('./data/user_data.php');
require_once('./data/tweet_data.php');

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $username;

    private $tweets = [];
    private $following = [];

    public function __construct($name, $email, $password, $username) {
        $this->id = mt_rand(100, 1000);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->username = $this->verifyUsername($username);
    }
    
    function verifyUsername($username){
        if (strlen($username) < 8){
            echo "<h1 style='color:red;''>Error: The username needs to be at least 8 characters long.</h1>";
        }
        return $username;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function likeTweet($tweet) {
        $tweet->likeTweet($this);
    }

    public function addTweet($tweet) {
        $this->tweets[$tweet->getId()] = $tweet;
    }

    public function getTweets() {
        return $this->tweets;
    }
    public function followUser($user) {
        $this->following[$user->getId()] = $user;
    }

    public function displayFeed() {
        echo "<br>Feed de tweets<br><br>";
        $feed = [];
        foreach ($this->tweets as $tweet) {
            $feed[$tweet->getId()] = $tweet;
        }
        foreach ($this->following as $followingUser) {
            foreach ($followingUser->getTweets() as $tweet) {
                $feed[$tweet->getId()] = $tweet;
            }
        }

        foreach ($feed as $tweet) {
            echo $tweet->showTweet() . "<br><br><hr>";
        }
    }
}