<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
class JsonPlaceholderApi
{
    private $client;
    private $baseUri;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUri = 'https://jsonplaceholder.typicode.com/';
    }

    public function getUsers() //Получение списка клиентов
    {
        $response = $this->client->request('GET', $this->baseUri . 'users');
        return json_decode($response->getBody(), true);
    }

    public function getUserPosts($userId)//Получение списка постов клиента с указанным ID
    {
        $response = $this->client->request('GET', $this->baseUri . "users/{$userId}/posts");
        return json_decode($response->getBody(), true);
    }

    public function getUserTodos($userId)//Получение списка заданий клиента с указанным ID
    {
        $response = $this->client->request('GET', $this->baseUri . "users/{$userId}/todos");
        return json_decode($response->getBody(), true);
    }

    public function getPost($postId)//Получение списка постов клиента с указанным ID
    {
        $response = $this->client->request('GET', $this->baseUri . "posts/{$postId}");
        return json_decode($response->getBody(), true);
    }

    public function addPost($postData) //Создание нового поста с указанными данными
    {
        $response = $this->client->request('POST', $this->baseUri . "posts", [
            'json' => $postData
        ]);
        return json_decode($response->getBody(), true);
    }

    public function updatePost($postId, $postData) //Редактирование поста с указанным ID данными из $postData
    {
        $response = $this->client->request('PUT', $this->baseUri . "posts/{$postId}", [
            'json' => $postData
        ]);
        return json_decode($response->getBody(), true);
    }

    public function deletePost($postId) //Удаление поста с укзанным ID
    {
        $response = $this->client->request('DELETE', $this->baseUri . "posts/{$postId}");
        return $response->getStatusCode() === 200;
    }
}
?>