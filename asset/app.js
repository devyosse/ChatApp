function getMessage(){
    //create a ajax request for connect to the server and handler.php
    const requestAjax = new XMLHttpRequest();
    requestAjax.open("GET", "handler.php");
    //when the data is receive, they are threat and display in HTML format
    requestAjax.onload = function (){
        const result = JSON.parse(requestAjax.responseText);
        console.log(result);
        const html = result.map(function(message){
            return `   <div class="message">
                <span class="date">${message.created_at.substring(11, 16)}</span>
                <span class="author">${message.author}</span>
                <span class="content">${message.content}</span>
            </div>`
        }).join('');

        const messages = document.querySelector(`.messages`);

        messages.innerHTML = html;
    }

    //send the request
   requestAjax.send();
}


function postMessage(event){
    //stop submit of form
    event.preventDefault();

    // recover the data of the form
    const author = document.querySelector('#author');
    const content = document.querySelector('#content');
    // condition the data
    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);
    // request ajax in POST and send the data
    const ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('POST', 'handler.php?task=write');

    ajaxRequest.onload = function (){
        content.value = '';
        content.focus();
        getMessage();
    }
    ajaxRequest.send(data);
}

document.querySelector('form').addEventListener('submit', postMessage);

getMessage();