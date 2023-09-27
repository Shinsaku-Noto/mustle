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
              <div class="flex flex-col block justify-center">
                @php
                  $part_value = "part_name";
                  $menu_value = "menu_name";
                  $user_value = "user_name";
                @endphp
                
                {{--@foreach ($posts as $post)
                <div class="flex justify-center">
                  <div class="h-10 inline">
                    @if($post->user_id != $user_value)
                      @php
                        $user_value = $post->user_id;
                      @endphp
                      <h2 class="text-3xl w-24">{{ $post->user->name }}</h2>
                    @else
                      <h2 class="text-3xl w-24 opacity-0">{{ $post->user->name }}</h2>
                    @endif
                  </div>
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
                  </div>
                </div>   
                @endforeach--}}
              </div>
              
              <!--検索フォーム-->
              <div class="flex">
                <div>
                  <br>
                  <h2>メニュー検索画面</h2>
                  <br>
                  <!--メニュー検索フォーム-->
                  <div>
                    <div>
                      <form method="GET" action="{{ route('searchmenu') }}">
                        <div>
                          <label>メニュー名</label>
                          <!--入力-->
                          <div>
                            <input type="text" name="searchWord" value="{{ $searchWord }}">
                          </div>
                          <div>
                            <button type="submit">検索</button>
                          </div>
                        </div>
                        <!--プルダウンParts選択-->
                        <div>
                          <label>メニュー部位</label>
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
                      </form>
                    </div>
                  </div>
                </div>
                
                <div>
                  @if (!empty($posts))
                  <div>
                    <table>
                      <thead>
                        <tr>
                          <td>ユーザー名</td>
                          <td>部位</td>
                          <td>メニュー名</td>
                          <td>重量・時間</td>
                          <td>回数・距離</td>
                        </tr>
                      </thead>
                      @foreach($posts as $post)
                      <tr>
                        <!--ユーザー名-->
                        @if($post->user_id != $user_value)
                          @php
                            $user_value = $post->user_id;
                          @endphp
                          <td>{{ $post->user->name }}</td>
                        @else
                          <td class="opacity-0">{{ $post->user->name }}</td>
                        @endif
                        <!--部位-->
                        @if($post->part->part_name != $part_value)
                          @php
                            $part_value = $post->part->part_name;
                          @endphp
                          <td>{{ $post->part->part_name }}</td>
                        @else
                          <td class="opacity-0">{{ $post->part->part_name }}</td>
                        @endif
                        <!--メニュー名-->
                        @if($post->menu->menu_name != $menu_value)
                          @php
                            $menu_value = $post->menu->menu_name;
                          @endphp
                          <td>{{ $post->menu->menu_name }}</td>
                        @else
                          <td class="opacity-0">{{ $post->menu->menu_name }}</td>
                        @endif
                        <!--重量・回数・時間・距離-->
                        <td>
                          {{ $post->weight }}kg<br>
                          {{ $post->time }}
                        </td>
                        <td>
                          {{ $post->reps }}回<br>
                          {{ $post->distance }}
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                  @endif
                </div>
                
              </div>
            </div>
            
            
            
          <script>
              
          </script>
          </body>
    </x-app-layout>
</html>
