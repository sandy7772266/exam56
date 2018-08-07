@extends('layouts.app') 
@section('content')

<h1>建立測驗</h1>

{{ bs()->openForm('post', '/exam' )}} 

{{ bs()->formGroup()
    ->label('標題', false, 'text-sm-right')
    ->control( bs()->text('title')->placeholder('請填入測驗標題') )
    ->showAsRow() }}

             
{{ bs()->formGroup()
    ->label('是否啟用', false, 'text-sm-right')
    ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])
        ->selectedOption(1)
        ->inline())
    ->showAsRow() }}

{{ bs()->hidden('user_id', Auth::id()) }}

{{--  {{ bs()->text('title')->placeholder('請填入測驗標題') }}
{{ bs()->select('enable', ['1' => '開啟', '0' => '關閉'], '1') }}  --}}
 {{ bs()->formGroup()
                ->label('', false, 'text-sm-right')
                ->control(bs()->submit('儲存'))
                ->showAsRow() }}
{{ bs()->closeForm() }}
@endsection