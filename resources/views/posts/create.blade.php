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
      <x-slot name="header">
        筋トレ管理
      </x-slot>
      <body class="antialiased">
        <div class="header">
          <h1>筋トレ管理アプリ</h1>
        </div>
        <form action="/posts/create" method="POST">
          @csrf
          <a href="/">戻る</a>
          
          <div class="btn" id="addButton">追加</div>
          
          <div class="content">
            <div>
              <input type="text" name="post[menu_name][0]" class="menu_name block" id="menu_name"/>
              <input type="number" name="post[weight][0]"/>
              <input type="number" name="post[reps][0]"/>
              <input type="time" name="post[time][0]"/>
              <input type="number" name="post[distance][0]"/>
              <input type="text" name="post[memo][0]"/>
            </div>
          </div>
          
          
    <!--入力フォーム-->
          {{--<!--@for ($i=0; $i<4; $i++)-->--}}
          <!--<div class="input">-->
          <!--  <input type="text" name="post[menu_name][]" class="menu_name"/>-->
          <!--  <div>-->
          <!--    <input type="number" name="post[weight][]"/>-->
          <!--    <input type="number" name="post[reps][]"/>-->
          <!--    <input type="time" name="post[time][]"/>-->
          <!--    <input type="number" name="post[distance][]"/>-->
          <!--    <input type="text" name="post[memo][]"/>-->
          <!--  </div>-->
          <!--  <input type="hidden" name="num[]">-->
          <!--</div>-->
         {{-- <!--@endfor-->--}}
          <p id="count">1</p>
          <button type="button" onclick="copy()">+</button>
          <input type="submit" value="保存"/>
    <!--メニュー一覧-->
          <div>
            <input type="button" value="胸" onclick="clickChest()">
              <div id="chest_menus">
              @foreach($chests as $chest)
                <input type="button" value="{{ $chest->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>
          <div>
            <input type="button" value="背中" onclick="clickBack()">
              <div id="back_menus">
              @foreach($backs as $back)
                <input type="button" value="{{ $back->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>  
          <div>
            <input type="button" value="足" onclick="clickLeg()">
              <div id="leg_menus">
              @foreach($legs as $leg)
                <input type="button" value="{{ $leg->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>
          <div>
            <input type="button" value="腕" onclick="clickArm()">
              <div id="arm_menus">
              @foreach($arms as $arm)
                <input type="button" value="{{ $arm->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>
          <div>
            <input type="button" value="肩" onclick="clickShoulder()">
              <div id="shoulder_menus">
              @foreach($shoulders as $shoulder)
                <input type="button" value="{{ $shoulder->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>
          <div>
            <input type="button" value="その他" onclick="clickOther()">
              <div id="other_menus">
              @foreach($others as $other)
                <input type="button" value="{{ $other->menu_name }}" onclick="clickMenu(event)">
              @endforeach
              </div>
          </div>
        </form>
        
        
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
        }
        
        
      });
      //メニュー選択
        
        
      //Form増やす
        let thisCount = document.getElementById('count');
        let Counter = 0;
        
        function copy(){
          let input = document.getElementsByClassName('input')[Counter];
          let clone_element = input.cloneNode(true);
          console.log(clone_element);
          input.after(clone_element);
          
          Counter = Counter + 1;
          thisCount.innerHTML = Counter;
          
          
        }
        
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
        
        
        
        
        
        
      </script>
      </body>
  </x-app-layout>
  
</html>
