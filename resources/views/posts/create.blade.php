<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>筋トレ管理アプリ</title>

     <!--Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     <!--Styles -->
        
  </head>
  <x-app-layout>
      <body class="antialiased">
        <div class="header flex justify-center">
          <h1>筋トレ管理アプリ</h1>
        </div>
        
          
          <a href="/">戻る</a>

 <!--入力フォーム--> 
      <div class="flex justify-center">
        <div class="">
          
          <form action="/posts/create" method="POST">
            @csrf
            <div class="flex">
              <div>
                <input type="submit" value="保存" class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"/>
              </div>
              <div class="btn text-white py-2 px-4 uppercase rounded bg-green-400 hover:bg-green-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5" id="addButton">セット数追加</div>
            </div>
            <div class="flex mt-5">
              <div>
                <p>メニューを選択</p>
                <input type="text" name="post[menu_name][0]" class="menu_name block" id="menu_name" value=""/>
              </div>
              <div class="content">
                <div class="flex">
                  <div>
                    <p>重さ(kg)</p>
                    <input type="number" name="post[weight][0]"/>
                  </div>
                  <div>
                    <p>回数</p>
                    <input type="number" name="post[reps][0]"/>
                  </div>
                  <div>
                    <p>時間</p>
                    <input type="time" name="post[time][0]" value="00:00"/>
                  </div>
                  <div>
                    <p>距離(km)</p>
                    <input type="number" name="post[distance][0]"/>
                  </div>
                  <div>
                    <p>メモ</p>
                    <input type="text" name="post[memo][0]"/>
                  </div>
                </div>
              </div>
            </div>
          </form>
      <!--メニュー一覧-->
          <div class="flex justify-between mt-5">
            <div class="w-1/6 bg-green-200">
              <div class="flex justify-center">
                <input type="button" value="胸" onclick="clickChest()">
              </div>
                <div id="chest_menus">
                @foreach($chests as $chest)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $chest->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $chest->id }}" id="form_{{ $chest->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $chest->id }})">×️</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>        
            <div class="w-1/6 bg-red-200">
              <div class="flex justify-center">
                <input type="button" value="背中" onclick="clickBack()">
              </div>
                <div id="back_menus">
                @foreach($backs as $back)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $back->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $back->id }}" id="form_{{ $back->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $back->id }})">×</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>
            <div class="w-1/6 bg-green-200">
              <div class="flex justify-center">
                <input type="button" value="足" onclick="clickLeg()">
              </div>
                <div id="leg_menus">
                @foreach($legs as $leg)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $leg->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $leg->id }}" id="form_{{ $leg->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $leg->id }})">×</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>
            <div  class="w-1/6 bg-red-200">
              <div class="flex justify-center">
                <input type="button" value="腕" onclick="clickArm()">
              </div>
                <div id="arm_menus">
                @foreach($arms as $arm)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $arm->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $arm->id }}" id="form_{{ $arm->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $arm->id }})">×</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>
            <div  class="w-1/6 bg-green-200">
              <div class="flex justify-center">
                <input type="button" value="肩" onclick="clickShoulder()">
              </div>
                <div id="shoulder_menus">
                @foreach($shoulders as $shoulder)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $shoulder->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $shoulder->id }}" id="form_{{ $shoulder->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $shoulder->id }})">×</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>
            <div  class="w-1/6 bg-red-200">
              <div class="flex justify-center">
                <input type="button" value="その他" onclick="clickOther()">
              </div>
                <div id="other_menus">
                @foreach($others as $other)
                  <div class="flex justify-between">
                    <input type="button" value="{{ $other->menu_name }}" onclick="clickMenu(event)">
                    <form action="/posts/{{ $other->id }}" id="form_{{ $other->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="deleteMenu({{ $other->id }})">×</button> 
                    </form>
                  </div>
                @endforeach
                </div>
            </div>
          </div>
            <div>
              <input type="button" value="メニューを追加する" onclick="addMenu()" class="mt-5 text-yellow-500 hover:text-white py-2 px-4 uppercase rounded bg-white border border-yellow-500 hover:bg-yellow-600 shadow-none hover:shadow-lg font-medium transition duration-200">
              <form action="/posts/create/menu" method="POST">
                @csrf
                <div id="add_menu">
                  <select name="menu[part_id]">
                    <option value="1">胸</option>
                    <option value="2">背中</option>
                    <option value="3">足</option>
                    <option value="4">腕</option>
                    <option value="5">肩</option>
                    <option value="6">その他</option>
                  </select>
                  <input type="text" name="menu[menu_name]"/> 
                  <input type="submit" value="メニュー追加" class="py-1.5 px-4 bg-gray-50 hover:bg-gray-100 active:bg-gray-200 first:rounded-l-lg last:rounded-r-lg">
                </div>
              </form>
            </div>
        </div>
      </div>
        
        
        
        
      <script>
      
      let menuName = document.getElementsByClassName('menu_name')[0];
        
      function clickMenu(e){
        menuName.value = e.target.value;
      }
        
        
      const addButton = document.getElementById('addButton');
      
      addButton.addEventListener('click', () => {
        // 新しい input 要素と div 要素を生成
        const newIndex = document.querySelectorAll('.menu_name').length;
        
        let sameMenu = menuName.value;
        
        if( sameMenu != "" ){
          const newDiv = document.createElement('div');
        
          const menuNameInput = document.createElement('input');
          menuNameInput.type = 'text';
          menuNameInput.name = `post[menu_name][${newIndex}]`;
          menuNameInput.className = 'menu_name block hidden';
          menuNameInput.value = sameMenu;
          newDiv.appendChild(menuNameInput);
          
         
          const weightInput = document.createElement('input');
          weightInput.type = 'number';
          weightInput.name = `post[weight][${newIndex}]`;
          newDiv.appendChild(weightInput);
          
          const repsInput = document.createElement('input');
          repsInput.type = 'number';
          repsInput.name = `post[reps][${newIndex}]`;
          newDiv.appendChild(repsInput);
          
          const timeInput = document.createElement('input');
          timeInput.type = 'time';
          timeInput.value = "00:00";
          timeInput.name = `post[time][${newIndex}]`;
          newDiv.appendChild(timeInput);
          
          const distanceInput = document.createElement('input');
          distanceInput.type = 'number';
          distanceInput.name = `post[distance][${newIndex}]`;
          newDiv.appendChild(distanceInput);
          
          const memoInput = document.createElement('input');
          memoInput.type = 'text';
          memoInput.name = `post[memo][${newIndex}]`;
          newDiv.appendChild(memoInput);
          
          // content 要素に div 要素を追加
          document.querySelector('.content').appendChild(newDiv);
          
        }else{
          alert('メニューを選択してください');
        }
      });
        
      //メニュー表示
        document.getElementById("chest_menus").style.display = "none";
        document.getElementById("back_menus").style.display = "none";
        document.getElementById("leg_menus").style.display = "none";
        document.getElementById("arm_menus").style.display = "none";
        document.getElementById("shoulder_menus").style.display = "none";
        document.getElementById("other_menus").style.display = "none";
        
        
        function clickChest(){
          const chest_menus = document.getElementById("chest_menus");
            
          if(chest_menus.style.display == "block"){
            chest_menus.style.display = "none";
          }else{
            chest_menus.style.display = "block";
          }
        }
        
        function clickBack(){
          const back_menus = document.getElementById("back_menus");
            
          if(back_menus.style.display == "block"){
            back_menus.style.display = "none";
          }else{
            back_menus.style.display = "block";
          }
        }
        
        function clickLeg(){
          const leg_menus = document.getElementById("leg_menus");
            
          if(leg_menus.style.display == "block"){
            leg_menus.style.display = "none";
          }else{
            leg_menus.style.display = "block";
          }
        }
        
        function clickArm(){
          const arm_menus = document.getElementById("arm_menus");
            
          if(arm_menus.style.display == "block"){
            arm_menus.style.display = "none";
          }else{
            arm_menus.style.display = "block";
          }
        }
        
        function clickShoulder(){
          const shoulder_menus = document.getElementById("shoulder_menus");
            
          if(shoulder_menus.style.display == "block"){
            shoulder_menus.style.display = "none";
          }else{
            shoulder_menus.style.display = "block";
          }
        }
        
        function clickOther(){
          const other_menus = document.getElementById("other_menus");
            
          if(other_menus.style.display == "block"){
            other_menus.style.display = "none";
          }else{
            other_menus.style.display = "block";
          }
        }
        
      //メニュー追加
      document.getElementById("add_menu").style.display = "none";
      
      function addMenu(){
        const add_menu = document.getElementById("add_menu");
        
        if(add_menu.style.display == "block"){
          add_menu.style.display = "none";
        }else{
          add_menu.style.display = "block";
        }
      }
      
      //メニュー削除
      function deleteMenu(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        
      </script>
      </body>
  </x-app-layout>
  
</html>
