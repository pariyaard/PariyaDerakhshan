@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>verdieping software</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}" title="make an user"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>

            <th width="280px">steps</th>
        </tr>
        @foreach ($users as $user)
            <tr>

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>

                <td>
                   <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                        <a href="{{ route('users.show', $user->id) }}" title="show">
                           <i class="fas fa-eye text-success  fa-lg"></i>
                       </a>

                     <a href="{{ route('users.edit', $user->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{--    {!! $messages->links() !!}--}}
    <button type="button" class="btn btn-outline-primary"><a href="{{ url('/') }}"> go back to homepage</a></button>
@endsection
