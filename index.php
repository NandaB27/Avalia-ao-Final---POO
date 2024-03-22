<?php
include 'user.php';
include 'tweet.php';
include './data/user_data.php';
include './data/tweet_data.php';

$maria = new User('Maria', 'maria@example.com', 'senha1', 'MariaMaria');
$joao = new User('João', 'joao@example.com', 'senha2', 'JoaoJoao');
$carlos = new User("Carlos", "carlos@example.com", "senha3", "CarlosCarlos");

$userData[$maria->getId()] = $maria;
$userData[$joao->getId()] = $joao;
$userData[$carlos->getId()] = $carlos;

$tweet1 = new Tweet("Primeiro tweet", $userData[$maria->getId()]);
$tweet2 = new Tweet("Segundo tweet", $userData[$joao->getId()]);
$tweet3 = new Tweet("Terceiro tweet", $userData[$carlos->getId()]);

$tweetData[$tweet1->getId()] = $tweet1;
$tweetData[$tweet2->getId()] = $tweet2;
$tweetData[$tweet3->getId()] = $tweet3;

$maria->likeTweet($tweet2);
$carlos->likeTweet($tweet2);
$joao->likeTweet($tweet3);
$joao->likeTweet($tweet1);

$maria->followUser($joao);
$maria->followUser($carlos);

$maria->displayFeed();