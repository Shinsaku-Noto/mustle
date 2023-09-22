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
        <x-slot name="header">
             （ヘッダー名）
        </x-slot>
          <body class="antialiased">
            <h1 class="content-center text-lg">筋トレ管理アプリ</h1>
        
            <div id="app">
              <div class="m-auto w-50 m-5 p-5">
                <div id="calendar"></div>
              </div>
            </div>
            
            
        <!--今日のメニュー-->
            <div class="add_training m-auto">
              <a  class="add" href="/posts/create">今日のメニュー</a>
            </div>
            
            <div class="flex justify-center">
            @php
              $part_value = "part_name";
              $menu_value = "menu_name";
            @endphp
            @foreach ($posts as $post)
              <div class="flex">
                <div class="">
                  @if($post->part->part_name != $part_value)
                    @php
                      $part_value = $post->part->part_name;
                    @endphp
                    <h2 class="">{{ $post->part->part_name }}</h2>
                  @endif
                </div>
                <div>
                  <div>
                    @if($post->menu->menu_name != $menu_value)
                      @php
                        $menu_value = $post->menu->menu_name;
                      @endphp
                      <h3 class="menus">{{ $post->menu->menu_name }}</h3>
                    @endif
                  </div>
                  <div class="">
                    <div class="flex">
                      <p class="weight">{{ $post->weight }}kg</p>
                      <p class="reps">{{ $post->reps }}回</p>
                    </div>
                    <div class="flex">
                      <p class="time">{{ $post->time }}</p>
                      <p class="distance">{{ $post->distance }}</p>
                    </div>
                    <div class="flex">
                      <p class="memo">{{ $post->memo }}</p>
                      <div>
                        <form action="/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="button" onclick="deletePost({{ $post->id }})" class="">delete</button> 
                        </form>
                      </div>
                    </div>
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
