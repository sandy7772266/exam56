@extends('layouts.app') 
@section('content')

    <h1>隨機題庫系統</h1>
        {{ $exam->title }}

        {{ bs()->openForm('post', '/topic') }}
        {{ bs()->formGroup()
                ->label('題目內容', false, 'text-sm-right')
                ->control(bs()->textarea('topic')->placeholder('請輸入題目內容'))
                ->showAsRow() }}
        {{ bs()->formGroup()
                ->label('選項1', false, 'text-sm-right')
                ->control(bs()->text('opt1')->placeholder('輸入選項1'))
                ->showAsRow() }}
        {{ bs()->formGroup()
                ->label('選項2', false, 'text-sm-right')
                ->control(bs()->text('opt2')->placeholder('輸入選項2'))
                ->showAsRow() }}
        {{ bs()->formGroup()
                ->label('選項3', false, 'text-sm-right')
                ->control(bs()->text('opt3')->placeholder('輸入選項3'))
                ->showAsRow() }}
        {{ bs()->formGroup()
                ->label('選項4', false, 'text-sm-right')
                ->control(bs()->text('opt4')->placeholder('輸入選項4'))
                ->showAsRow() }}
        {{ bs()->formGroup()
                ->label('正確解答', false, 'text-sm-right')
                ->control(bs()->radioGroup('ans', [1 => '1', 2 => '2', 3 => '3', 4 => '4'])
                ->inline()
                ->addRadioClass(['mx-3', 'my-1']))
                ->showAsRow() }}

    @forelse($exam->topics as $key => $topic)
        <dl>
            <dt class="h3 text-left">
                <span class="badge badge-success">
                   
                    {{ $key + 1 }}
                </span>
                    ({{$topic->ans}}) {{ $topic->topic }}
            </dt>
            <dd class="opt">
                {{bs()->radioGroup("ans[$topic->id]", [
                    1 => "&#10102; $topic->opt1", 
                    2 => "&#10103; $topic->opt2",  
                    3 => "&#10104; $topic->opt3",  
                    4 => "&#10105; $topic->opt4", 
                    ])
                    ->inline()
                    ->addRadioClass(['mx-3', 'my-1'])}}
            </dd>
        </dl>
             
        
    @empty
        <div class="alert alert-danger">
            尚無任何題目
        </div>
        
    @endforelse


         {{--  {{ bs()->radioGroup('enable', [1 => '1', 2 => '2', 3 => '3', 4 => '4'])
                 ->inline()
                 ->addRadioClass(['bg-light', 'my-3']) }}  --}}
                
        {{ bs()->hidden('exam_id', $exam->id) }}
        {{ bs()->formGroup()
                ->label('')
                ->control(bs()->submit('儲存'))
                ->showAsRow() }}
        {{ bs()->closeForm() }}
@endsection
@section('my_menu')
    <li><a class="nav-link" href="{{ route('exam.create') }}">新增題庫</a></li>
    @parent
@stop


