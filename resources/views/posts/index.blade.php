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
              <a  class="add" href="/posts/create">今日のメニューを追加</a>
            </div>
            
            <div class="flex justify-center">
              <div class="">{{ $today }}のメニュー</div>
            </div>
            <div class="flex justify-center pb-10">
              @php
                $part_value = "part_name";
                $menu_value = "menu_name";
              @endphp
                <div class="w-3/5 flex justify-center">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse border border-green-800">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="font-bold px-6 py-3 border border-green-600">部位</td>
                        <td class="font-semibold px-6 py-3 border border-green-600">メニュー名</td>
                        <td class="px-6 py-3 border border-green-600">重量・時間</td>
                        <td class="px-6 py-3 border border-green-600">回数・距離</td>
                        <td class="px-6 py-3 border border-green-600">消去️</td>
                      </tr>
                    </thead>
                    @php
                      $part_value = "part_name";
                      $menu_value = "menu_name";
                    @endphp
                    @foreach($posts as $post)
                    <tr>
                      <!--部位-->
                      @if($post->part->part_name != $part_value)
                        @php
                          $part_value = $post->part->part_name;
                        @endphp
                        <td class="font-bold px-6 py-4 border border-green-600">{{ $post->part->part_name }}</td>
                      @else
                        <td class="font-bold px-6 py-4 opacity-0">{{ $post->part->part_name }}</td>
                      @endif
                      <!--メニュー名-->
                      @if($post->menu->menu_name != $menu_value)
                        @php
                          $menu_value = $post->menu->menu_name;
                        @endphp
                        <td class="font-semibold px-6 py-4 border border-green-600">{{ $post->menu->menu_name }}</td>
                      @else
                        <td class="font-semibold px-6 py-4 opacity-0">{{ $post->menu->menu_name }}</td>
                      @endif
                      <!--重量・回数・時間・距離-->
                      <td class="px-6 py-4 border border-green-600">
                        {{ $post->weight }}kg<br>
                        {{ $post->time }}
                      </td>
                      <td class="px-6 py-4 border border-green-600">
                        {{ $post->reps }}回<br>
                        {{ $post->distance }}km
                      </td>
                      <td class="px-6 py-4 border border-green-600">
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="button" onclick="deletePost({{ $post->id }})" class="">x</button> 
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>   
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
