<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>

<form method="post" action="/posts">
@csrf <!-- {{ csrf_field() }} -->
<input type='text' name="title" ></textarea>
    <br>
    <br>
    <input type="submit" name="submit">
</form>
    
    
</body>
</html>