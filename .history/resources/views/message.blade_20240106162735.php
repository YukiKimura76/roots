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
                <h1 class="text-gray-900 text-3xl font-semibold title-font mb-5">誕生日メール</h1>
                <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. Craies vegan tousled etsy austin.</p>
                
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                        <h1 class="title-font font-medium text-3xl text-gray-900">Slow-carb next level shoindcgoitch ethical authentic, poko scenester</h1>
                        <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. Craies vegan tousled etsy austin.</p>
                      </div>
                      <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                        <div class="relative mb-4">
                          <label for="full-name" class="leading-7 text-sm text-gray-600">誰からもらう</label>
                          <select name="choice" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option hidden>選択してください</option>
                            <option value="first">木村 小左衛門</option>
                            <option value="second">木村 拓也</option>
                            <option value="third">木村 多江</option>
                          </select>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">何歳まで</label>
                          <input type="date" id="date" name="date" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">有効にする</button>
                      </div>
                    </div>
                  </section>

              </div>
          </div>
      </div>
  </div>
</x-admin-layout>
