@extends('layouts.app') 
@section('content')

    <h1>
        {{ $exam->title }}
        <button type="button" class="btn btn-danger btn-del-exam" data-id="{{ $exam->id }}">刪除</button>
        <a href="{{ route('exam.edit', $exam->id) }}" class="btn btn-warning">編輯</a>

    </h1>
    {{-- //題目表單 --}}
    @include('exam.form');
      
     {{-- //題目列表 --}}
  {{-- 題目列表 --}}
  @if(Auth::check())
  {{--  @can('進行測驗')  --}}

      {{ bs()->openForm('post', '/test') }}

      @include('exam.topic');
      
      {{ bs()->hidden('exam_id', $exam->id) }}
      {{ bs()->hidden('user_id', Auth::id()) }}
      <div class="text-center my-5">
          {{ bs()->submit('交卷')->sizeLarge() }}
      </div>
      {{ bs()->closeForm() }}
  {{--  @else          --}}
     
  {{--  @endcan  --}}
@else
  <div class="alert alert-info">
      <h3>本測驗共有 {{ $exam->topics->count() }} 題，登入後始能進行測驗或編輯題目</h3>
  </div>
@endif    

<div class="text-center">
  {{ $exam->user->name }} ({{ $exam->user->email }}) 發佈於 {{ $exam->created_at->format("Y年m月d日 H:i:s") }} / 最後更新： {{ $exam->updated_at->format("Y年m月d日 H:i:s") }}
</div>

@endsection
@section('my_menu')
    <li><a class="nav-link" href="{{ route('exam.create') }}">新增題庫</a></li>
    @parent
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.btn-del-topic').click(function(){
                var topic_id=$(this).data('id');                
                swal({
                    title: "確定要刪除題目嗎？",
                    text: "刪除後該題目就消失救不回來囉！",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "是！含淚刪除！",
                    cancelButtonText: "不...別刪",
                }).then((result) => {
                    if (result.value) {
                        swal("OK！刪掉題目惹！", "該題目已經隨風而逝了...", "success");
                        axios.delete('/topic/' + topic_id).then(function () {
                            location.reload();
                        });
                    }
                })
            });
        });

        $(document).ready(function(){
            $('.btn-del-exam').click(function(){
                var exam_id=$(this).data('id');                
                swal({
                    title: "確定要刪除題目嗎？",
                    text: "刪除後該題目就消失救不回來囉！",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "是！含淚刪除！",
                    cancelButtonText: "不...別刪",
                }).then((result) => {
                    if (result.value) {
                        swal("OK！刪掉題目惹！", "該題目已經隨風而逝了...", "success");
                        axios.delete('/exam/' + exam_id).then(function () {
                            location.href='/exam';
                        });
                    }
                })
            });
        });
    </script>
@endsection
