<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <h1>筋トレ管理アプリ</h1>
        
          <div class="add_training">
            <!--<a  class="add" href="/posts/post">今日のメニュー</a>-->
          </div>
        
            <div class="todays_training">
                @php
                  $part_value = "part_name";
                  $menu_value = "menu_name";
                @endphp
                @foreach ($posts as $post)
                  <div class="training">
                    @if($post->part->part_name != $part_value)
                    @php
                      $part_value = $post->part->part_name;
                    @endphp
                    <h2 class="parts">{{ $post->part->part_name }}</h2>
                    @endif
                    @if($post->menu->menu_name != $menu_value)
                    @php
                      $menu_value = $post->menu->menu_name;
                    @endphp
                    <h3 class="menus">{{ $post->menu->menu_name }}</h3>
                    @endif
                      <p class="weight">{{ $post->weight }}kg</p>
                      <p class="reps">{{ $post->reps }}回</p>
                      <p class="time">{{ $post->time }}</p>
                      <p class="distance">{{ $post->distance }}</p>
                      <p class="memo">{{ $post->memo }}</p>
                  </div>
                  
                @endforeach
            </div>
        
    </body>
</html>
