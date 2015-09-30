@extends('layouts.master')

@section('content')

    <h1>Chats <a href="{{ url('/chat/create') }}" class="btn btn-primary pull-right btn-sm">Add New Chat</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Id U1</th><th>Id U2</th><th>Message</th><th>Actions</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($chats as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/chat', $item->id) }}">{{ $item->id_u1 }}</a></td><td>{{ $item->id_u2 }}</td><td>{{ $item->message }}</td>
                    <td><a href="{{ url('/chat/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['ChatController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
