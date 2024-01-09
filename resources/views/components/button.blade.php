<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg font-bold transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>