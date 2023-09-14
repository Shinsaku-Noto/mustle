<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>筋トレ管理アプリ</title>

         Fonts 
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

         Styles 
        
    </head>
    <body class="antialiased">
        <div class="header">
            <h1>筋トレ管理アプリ</h1>
        </div>
        <div class="post">
            @foreach ($posts as $post)
            <div class=""></div>
            
            
            
            @endforeach
        </div>
        
    </body>
</html>
