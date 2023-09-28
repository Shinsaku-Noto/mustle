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
        
        
    </head>
    <x-app-layout>
          <body class="antialiased">
            <div class="flex justify-center my-3">
              <h1 class="items-center text-lg">筋トレ管理アプリ</h1>
            </div>
            

            <div>
              <div class="flex justify-center">
                @php
                  $part_value = "part_name";
                  $menu_value = "menu_name";
                  $user_value = "user_name";
                @endphp
            
              <!--検索フォーム-->
                <div class="flex">
                  <div  class="bg-orange-300 w-72 h-96 mx-5 px-5">
                    <br>
                    <h2 class="flex justify-center font-bold">メニュー検索画面</h2>
                    <br>
                    <!--メニュー検索フォーム-->
                    <div>
                      <div>
                        <form method="GET" action="{{ route('searchmenu') }}">
                          <div class="mt-5">
                            <label>メニュー名:</label>
                            <!--入力-->
                            <div>
                              <input type="text" name="searchWord" value="{{ $searchWord }}" class="appearance-none border border-gray-100 bg-white shadow-sm transition focus:shadow-md rounded-md w-full p-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                          </div>
                          <!--プルダウンParts選択-->
                          <div class="mt-5">
                            <label>メニュー部位:</label>
                            <div>
                              <select name="partId" value="{{ $partId }}">
                                <option value="">未選択</option>
                                
                                @foreach($parts as $id => $part_name)
                                <option value="{{ $id }}">
                                  {{ $part_name }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="mt-5 flex justify-center">
                            <button type="submit" class="text-blue-500 hover:text-white py-2 px-4 uppercase rounded bg-white border border-blue-500 hover:bg-blue-600 shadow-none hover:shadow-lg font-medium transition duration-200">検索</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    @if (!empty($posts))
                    <div>
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="font-extrabold px-6 py-3">ユーザー名</td>
                            <td class="font-bold px-6 py-3">部位</td>
                            <td class="font-semibold px-6 py-3">メニュー名</td>
                            <td class="px-6 py-3">重量・時間</td>
                            <td class="px-6 py-3">回数・距離</td>
                          </tr>
                        </thead>
                        @foreach($posts as $post)
                        <tr>
                          <!--ユーザー名-->
                          @if($post->user_id != $user_value)
                            @php
                              $user_value = $post->user_id;
                            @endphp
                            <td class="font-extrabold px-6 py-4">{{ $post->user->name }}</td>
                          @else
                            <td class="font-extrabold px-6 py-4 opacity-0">{{ $post->user->name }}</td>
                          @endif
                          <!--部位-->
                          @if($post->part->part_name != $part_value)
                            @php
                              $part_value = $post->part->part_name;
                            @endphp
                            <td class="font-bold px-6 py-4">{{ $post->part->part_name }}</td>
                          @else
                            <td class="font-bold px-6 py-4 opacity-0">{{ $post->part->part_name }}</td>
                          @endif
                          <!--メニュー名-->
                          @if($post->menu->menu_name != $menu_value)
                            @php
                              $menu_value = $post->menu->menu_name;
                            @endphp
                            <td class="font-semibold px-6 py-4">{{ $post->menu->menu_name }}</td>
                          @else
                            <td class="font-semibold px-6 py-4 opacity-0">{{ $post->menu->menu_name }}</td>
                          @endif
                          <!--重量・回数・時間・距離-->
                          <td class="px-6 py-4">
                            {{ $post->weight }}kg<br>
                            {{ $post->time }}
                          </td>
                          <td class="px-6 py-4">
                            {{ $post->reps }}回<br>
                            {{ $post->distance }}
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      <div class='paginate'>
                          {{ $posts->links() }}
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            
            
            
          <script>
              
          </script>
          </body>
    </x-app-layout>
</html>
