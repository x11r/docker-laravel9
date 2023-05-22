@extends ('layouts.holiday')
@section ('title', '休日 一覧')

@section ('content')
    <div class="container">
        <div class="h1">登録済み一覧</div>
        <div>
            @if ($holidays->count())
                @foreach ($holidays as $holiday)
                    <div class="row">
                        <div class="col-md-2">{{ $holiday->date }}</div>
                        <div class="col-md-2">{{ $holiday->name }}</div>
                        <div class="col-md-2">{{ $holiday->comment }}</div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" href="{{ route('holidays.edit', $holiday) }}">
                                編集
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
{{--        {{ Form::open(['route' => 'holidays.store']) }}--}}
{{--        {{ Form::date('date', session($sessionKey.'.date')) }}--}}
{{--        {{ Form::text('name') }}--}}
{{--        {{ Form::submit('登録') }}--}}
{{--        {{ Form::close() }}--}}

        <div>
            {{ html()->form('post', route('holidays.store'))->open() }}
            <div>日付</div>
            {{ html()->date('date') }}
            <div>呼称</div>
            {{ html()->text('name')->placeholder('呼称') }}
            <div>備考</div>
            {{ html()->textarea()->placeholder('備考') }}
            <div>{{ html()->submit('登録') }}</div>
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
