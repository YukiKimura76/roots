<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Message') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-gray-900 text-3xl font-semibold title-font mb-5">誕生日メールの配信設定</h1>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto flex flex-wrap items-center">
                      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                        <h1 class="title-font font-medium text-xl text-gray-900">■配信メールのイメージ</h1>
                        <img src="{{asset('storage/roots_message.png')}}">
                      </div>
                      <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                        <form action="{{ url('message') }}" method="POST" class="relative mb-4">
                            @csrf
                          <label class="leading-7 text-sm text-gray-600">誰からもらいたい</label>
                          <select name="sender_name" class="w-full bg-white rounded border border-gray-300
                                focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option hidden>選択してください</option>
                                <option>木村 小左衛門</option>
                                <option>木村 拓也</option>
                                <option>木村 多江</option>
                                <option>木村 カエラ</option>
                          </select>
                            <div class="relative mb-4  py-5">
                            <label class="leading-7 text-sm text-gray-600">いつまで</label>
                            <input type="date" name="date" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <x-button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg font-bold">登録する</x-button>
                      </form>
                    </div>
                  </section>
                  <div class="flex flex-row-reverse">
                      <button class="text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg font-bold">登録済み設定一覧</button>
                  </div>
                    <!--右側エリア[START]-->
                    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
                        <!-- 現在の本 -->
                    @if (count($messages) > 0)
                        @foreach ($messages as $message)
                            <x-collection id="{{ $book->id }}">{{ $book->item_name }}</x-collection>
                        @endforeach
                    @endif
                    </div>
                    <!--右側エリア[[END]-->  
              </div>
          </div>
      </div>
  </div>
</x-admin-layout>
