<?php
require_once 'app.php';

$messages = Message::getAll();
$tags = Tag::getTags();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Message overflow</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container" id="container">
</div>
<div class="container">
<button id="loadMore">meer laden</button>
</div>
<script>
let messages;
let counter = 1;
let loading = false;
const fetchMessages = (page) => {
	loading = true;
	const url = 'ajax/get_message.php?page=' + page;
	fetch(url, {
        method: 'get',
        // may be some code of fetching comes here
    }).then(function(response) {
            if (response.status >= 200 && response.status < 300) {
                return response.text()
            }
            throw new Error(response.statusText)
        })
        .then(function(response) {
			messages = response;
			document.getElementById('container').innerHTML += messages;
			loading = false;
        })
		counter++;
}
fetchMessages(counter);
document.getElementById('loadMore').addEventListener('click', () => {
	fetchMessages(counter);
})

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
		if(!loading) {
			fetchMessages(counter);
			console.log('loaded page ' + counter);
		}
    }
};

</script>
</body>
</html>