
@forelse($exam->topics as $key => $topic)
<dl>
    <dt class="h3 text-left">
        <span class="badge badge-success">
            <button type="button" class="btn btn-danger btn-del-topic" data-id="{{ $topic->id }}">刪除</button>
            <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-warning">編輯</a>
            {{ $key + 1 }}
        </span>
        @if ((Auth::check())and((Auth::user()->name) === 'teacher'))
            ({{$topic->ans}})
        @endif
            {{ $topic->topic }}
        
    </dt>
    <dd class="opt">
        {{ bs()->hidden("ans[$topic->id]", 0) }}
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