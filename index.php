<?php
require __DIR__ . './includes.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/chat.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>An Chat App</h1>
    </header>

    <section class="chat">
        <div class="messages">
            <div class="message">
                <span class="date">00:00</span>
                <span class="author">Charles</span>
                <span class="content">Lorem ipsum dolor sit amet</span>
            </div>
            <div class="message">
                <span class="date">00:00</span>
                <span class="author">Charles</span>
                <span class="content">Lorem ipsum dolor sit amet</span>
            </div>
            <div class="message">
                <span class="date">00:00</span>
                <span class="author">Charles</span>
                <span class="content">Lorem ipsum dolor sit amet</span>
            </div>

        </div>
        <div class="user-inputs">
            <form action="functions/handler.php?task=write" method="post">
                <input type="text" name="author" id="author" placeholder="Nickname">
                <input type="text" id="content" placeholder="Type your message here my friend !">
                <button type="submit" id="submit">Send !</button>
            </form>

        </div>
    </section>
</body>
</html>



