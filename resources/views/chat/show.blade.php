@extends('layouts.master')

@section('content')

    <h1>Chat</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID.</th> <th>Id U1</th><th>Id U2</th><th>Message</th>
            </tr>
            <tr>
                <td>{{ $chat->id }}</td> <td> {{ $chat->id_u1 }} </td><td> {{ $chat->id_u2 }} </td><td> {{ $chat->message }} </td>
            </tr>
        </table>
    </div>

@endsection
