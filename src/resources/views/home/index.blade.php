@extends ('layouts.home')
@section ('title', 'Topページ')
@section ('content')
    <div class="container">
        <div class="h1">Topページ</div>
        <ul>
            <li><a href="{{ route('holidays.index') }}">休日情報登録・編集</a></li>
        </ul>
    </div>
@endsection
