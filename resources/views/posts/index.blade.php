<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!--Script-->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <x-app-layout>
          <body class="antialiased">
            <h1 class="content-center text-lg">筋トレ管理アプリ</h1>
        
            <div id="app">
              <div class="m-auto w-3/5 m-5 p-5">
                <div id="calendar"></div>
              </div>
            </div>
            
            
        <!--今日のメニュー-->
            <div class="flex justify-center my-5">
              <a  class="add" href="/posts/create">今日のメニュー</a>
            </div>
            
            <div class="flex flex-col block justify-center">
              @php
                $part_value = "part_name";
                $menu_value = "menu_name";
              @endphp
              
                @foreach ($posts as $post)
                <div class="flex justify-center">
                  <div class="bg-gray-200 flex justify-center border-4">
                    @if($post->part->part_name != $part_value)
                      @php
                        $part_value = $post->part->part_name;
                      @endphp
                      <h2 class="text-xl w-24 items-center">{{ $post->part->part_name }}</h2>
                    @else
                      <h2 class="text-xl w-24 items-center  opacity-0">{{ $post->part->part_name }}</h2>
                    @endif
                  </div>
                  
                  <div class="bg-blue-200">
                    @if($post->menu->menu_name != $menu_value)
                      @php
                        $menu_value = $post->menu->menu_name;
                      @endphp
                      <h3 class="text-lg w-48">{{ $post->menu->menu_name }}</h3>
                    @else
                      <h3 class="text-lg w-48  opacity-0">{{ $post->menu->menu_name }}</h3>
                    @endif
                  </div>
                  
                  <div class="flex">
                    <div class="bg-red-200 flex flex-col block w-80">
                      <div class="flex">
                        <p class="w-40">重量：{{ $post->weight }}kg</p>
                        <p class="w-40">回数：{{ $post->reps }}回</p>
                      </div>
                      <div class="flex">
                        <p class="w-40">時間：{{ $post->time }}</p>
                        <p class="w-40">距離：{{ $post->distance }}</p>
                      </div>
                      <div class="flex">
                        <p class="">メモ：{{ $post->memo }}</p>
                      </div>
                    </div>
                    <div class="bg-green-200">
                      <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})" class="">x</button> 
                      </form>
                    </div>
                  </div>
                </div>   
                @endforeach
                  
                
            </div>
            
            
          <script>
              function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
          </script>
          </body>
    </x-app-layout>
</html>
