<div>
  <button wire:click="openModal()" type="button" class="">{{ $post->menu->menu_name }}</button>
  @if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>               

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                「{{ $post->user->name}}」{{ $date }}メニュー
            </h3>
            <div class="mt-2">
              @php
                $part_value = "part_name";
                $menu_value = "menu_name";
              @endphp
              <div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                      <td class="font-bold px-6 py-3">部位</td>
                      <td class="font-semibold px-6 py-3">メニュー名</td>
                      <td class="px-6 py-3">重量・時間</td>
                      <td class="px-6 py-3">回数・距離</td>
                    </tr>
                  </thead>
                  @foreach($setMenus as $setMenu)
                  <tr>
                    <!--部位-->
                    @if($setMenu->part->part_name != $part_value)
                      @php
                        $part_value = $setMenu->part->part_name;
                      @endphp
                      <td class="font-bold px-6 py-4">{{ $setMenu->part->part_name }}</td>
                    @else
                      <td class="font-bold px-6 py-4 opacity-0">{{ $setMenu->part->part_name }}</td>
                    @endif
                    <!--メニュー名-->
                    @if($setMenu->menu->menu_name != $menu_value)
                      @php
                        $menu_value = $setMenu->menu->menu_name;
                      @endphp
                      <td class="font-semibold px-6 py-4">{{ $setMenu->menu->menu_name }}</td>
                    @else
                      <td class="font-semibold px-6 py-4 opacity-0">{{ $setMenu->menu->menu_name }}</td>
                    @endif
                    <!--重量・回数・時間・距離-->
                    <td class="px-6 py-4">
                      {{ $setMenu->weight }}kg<br>
                      {{ $setMenu->time }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $setMenu->reps }}回<br>
                      {{ $setMenu->distance }}
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button wire:click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700">
                閉じる
            </button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>