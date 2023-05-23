@extends ('layouts.home')
@section ('title', '休日情報編集')

@section ('content')
    <div class="container">
        <div class="h1">休日情報 編集</div>
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
            {{ html()->form('put', route('holidays.update', $holiday))->open() }}

            <div>日付</div>
            <div class="col-md-4">
                {{ html()->model($holiday)->date('date')->class(['form-control']) }}
            </div>
            <div>休日名</div>
            <div class="col-md-4">
                {{ html()->text('name')->class(['form-control']) }}
            </div>
            <div>備考</div>
            <div class="col-md-4">
                {{ html()->textarea('comment')->class(['form-control']) }}
            </div>
            <div> {{ html()->submit('変更')->class(['btn btn-primary']) }}</div>
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
