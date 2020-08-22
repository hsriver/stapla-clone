@extends('layouts.app')

@section('content')

<h2 class="pb-3">教材作成</h2>
<div class="material-create__form mx-auto">
  <form action="/material/create" method="post" enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
      <label for="materialName">カテゴリー</label>
      <select class="form-control" name="category_id" id="categoryName">
        @foreach ($category as $cat)
        <option class="category" value="{{ $cat->id }}">{{ $cat->category_name }}</option>
        @endforeach
      </select>
      <a href="" class="d-block d-md-inline-block"><i class="fas fa-caret-right mr-1"></i>教材を作成、編集する</a>
    </div>
    <div class="form-group">
      <label for="materialName">教材名</label>
      <input type="text" name="material_name" class="form-control" id="materialName">
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning" role="alert">
      {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="form-group">
      <label for="image">画像があればアップロードしてください。</label>
      <input type="file" name="image" class="form-control" id="image">
    </div>

    <button type="submit" class="btn btn-primary" id="register">登録する</button>

  </form>
</div>



@endsection

@section('script')
{{-- <script>
  $(function() {

// 送信確認
$('#register').on('click', function() {
      
  // フォームから入力値を取得
  const materialName = $('#materialName').val();

  // 入力内容の確認
  if(name != ""){
  
    // PHPに送信
    $.ajax({
      type: 'POST',
      url: "./send_data_ajax.php", 
      data: {
        name:name,
        subject:subject,
        body:body
      },
      success: function( data ) {
        if(data.match(/success/)){
          alert("送信が完了しました。");
          location.href = "./"; // 送信後戻り先URL
        }
      },
      error: function() {
        alert("予期せぬエラーが発生しました。");
      }
    });
  } else {
    alert("キャンセルされました。");
  }

}			
  
} else {

alert("未入力の項目があります。");

}

});
</script> --}}
{{-- <script>
  const categoryName = document.getElementById("categoryName"); //教材名のinputを取得
  const categoryId = document.getElementById("categoryId"); //教材id
  const category = document.getElementsByClassName("category"); //各教材
  const data = @json($category);
  console.log(data);
  window.onload = function(){
    let id = data[0].id;
    console.log(id);
    categoryId.setAttribute("value", id);
};

for (let i = 0; i < category.length; i++) {
  category[i].onclick = function() {
    //id取得

    //セット
  };
} --}}

{{-- </script> --}}
{{-- <script src="{{ asset('/js/category.js') }}"></script> --}}
@endsection