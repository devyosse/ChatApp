<?php

namespace App;

use App\Model\Database;

require __DIR__ . './includes.php';

$task = "list";

if (array_key_exists("task", $_GET)){
    $task = $_GET['task'];
}

if ($task == "write"){
    postMessage();
}else{
    getMessage();
}

function getMessage()
{

    //request of database for last message
    $result =  Database::getPDO()->query("SELECT * FROM chat_message ORDER BY created_at");
    //threat the result
    $messages = $result->fetchAll();
    //display the data in the JSON format
    echo json_encode($messages);
}

function postMessage()
{

    //analyse param in POST
    if (!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)){
        echo json_encode(["status" => "error"]);
        return;
    }
    $author = $_POST['author'];
    $content = $_POST['content'];
    //create a request how insert data
    $query =  Database::getPDO()->prepare("INSERT INTO chat_message SET author = :author, content = :content, created_at = NOW()");
    $query->execute([
        "author" => $author,
        "content" => $content
    ]);
    //give a statue of success or error in the JSON format
    echo json_encode(["status" => "success"]);
}