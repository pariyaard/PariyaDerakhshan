@extends('layouts.app')

@section('content')
    <br>
<div>
    WELCOME
</div>
<br>

    <div>
        <button type="button" class="btn btn-outline-primary"><a href="{{ route('users.index') }}">  click here to view, add , edit and delete Users</a></button>
        <button type="button" class="btn btn-outline-primary"><a href="{{ route('messages.index') }}">  click here to view, add , edit and delete Messages</a></button>
        </div>
    </div>

@endsection
