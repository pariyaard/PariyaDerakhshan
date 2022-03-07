@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('messages.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
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
            <th>titel</th>
            <th>content</th>

            <th width="280px">steps</th>
        </tr>
        @foreach ($messages as $message)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $message->titel }}</td>
                <td>{{ $message->content }}</td>

                <td>
                   <form action="{{ route('messages.destroy', $message->id) }}" method="POST">

                        <a href="{{ route('messages.show', $message->id) }}" title="show">
                           <i class="fas fa-eye text-success  fa-lg"></i>
                       </a>

                     <a href="{{ route('messages.edit', $message->id) }}">
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

@endsection
