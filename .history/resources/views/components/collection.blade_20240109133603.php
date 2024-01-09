<!-- 本: 削除ボタン -->
<div class="flex justify-between p-4 items-center bg-yellow-500 text-white rounded-lg border-2 border-white font-bold">
  <div>{{ $slot }}</div>

  <div>{{ $date }}まで</div>
  

  
  <div>
    <form action="{{ url('message/'.$id) }}" method="POST">
         @csrf
         @method('DELETE')
        
        <button type="submit"  class="btn bg-yellow-500 rounded-lg">
            削除
        </button>
        
     </form>
  </div>

</div>