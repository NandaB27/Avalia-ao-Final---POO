<?php

require_once('./data/tweet_data.php');
class Tweet {
    private $id;
    private $content;
    private $user;
    private $likes;

    public function __construct($content, $user)
    {
        $this->id = mt_rand(100, 1000);
        $this->content = $content;
        $this->user = $user;
        $this->likes = [];
        $user->addTweet($this);
    }

    public function getId(){
        return $this->id;
    }

    public function getContent(){
        return $this->content;
    }

    public function likeTweet($user) {
        $this->likes[] = $user;
    }

    public function getLikesCount() {
        return count($this->likes);
    }

    public function showTweet() {
        $username = $this->user->getUsername();
        $content = $this->content;
        $likesCount = count($this->likes);

        echo "@$username: $content<br>";

        if ($likesCount > 0) {
            echo "Likes: ";
            if ($likesCount === 1) {
                echo "@" . $this->likes[0]->getUsername() . " curtiu";
            } else {
                echo "@" . $this->likes[0]->getUsername() . " e mais " . ($likesCount - 1) . " usuários curtiram";
            }
        }
    }
    
}