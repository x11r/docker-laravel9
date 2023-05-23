@extends ('layouts.holiday')
@section ('title', '休日情報 一覧')

@section ('content')
    <div class="container">
        <div class="h1">休日情報 登録済み一覧</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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

        <div>
            {{ html()->form('post', route('holidays.store'))->open() }}
            <div>日付</div>
            <div class="col-md-4">
                {{ html()->date('date')->class(['form-control']) }}
            </div>
            <div>休日名</div>
            <div class=" col-md-4">
                {{ html()->text('name')->placeholder('休日名')->class(['form-control']) }}
            </div>
            <div>備考</div>
            <div class="col-md-4">
                {{ html()->textarea('comment')->placeholder('備考')->class(['form-control']) }}
            </div>
            <div>{{ html()->submit('登録')->class(['btn btn-primary']) }}</div>
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
