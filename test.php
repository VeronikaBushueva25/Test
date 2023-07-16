<?php
require_once 'JsonPlaceholderApi.php';
$api = new JsonPlaceholderApi();

// Получить список пользователей
$users = $api->getUsers();
echo("USERS:");
echo '<pre>';
print_r($users);
echo '</pre>';

// Получить посты пользователя с ID = 1
$userPosts = $api->getUserPosts(1);
echo("POSTS:");
echo '<pre>';
print_r($userPosts);
echo '</pre>';

// Получить задания пользователя с ID = 1
$userTodos = $api->getUserTodos(1);
echo("TODOS:");
echo '<pre>';
print_r($userTodos);
echo '</pre>';

// Получить пост с ID = 1
$post = $api->getPost(1);
echo("POST(ID=1):");
echo '<pre>';
print_r($post);
echo '</pre>';

// Добавить новый пост
$newPostData = [
    'userId' => 1,
    'title' => 'New post',
    'body' => 'This is a new post'
];
$newPost = $api->addPost($newPostData);
echo("NEW POST:");
echo '<pre>';
print_r($newPost);
echo '</pre>';

// Обновить пост с ID = 1
$updatedPostData = [
    'id' => 1,
    'title' => 'Updated post',
    'body' => 'This post has been updated'
];
$updatedPost = $api->updatePost(1, $updatedPostData);
echo("UPDATE_ POST WITH ID=1:");
echo '<pre>';
print_r($updatedPost);
echo '</pre>';

// Удалить пост с ID = 1
$isDeleted = $api->deletePost(1);
echo("REMOVE POST WITH ID=1:");
var_dump($isDeleted);
?>