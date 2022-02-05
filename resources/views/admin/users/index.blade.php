@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-primary">Create user</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <div class="section-heading clearfix">
                <h2 class="section-title"><span class="lnr lnr-book"></span> List of
                    {{ (Request::query() === ['status' => 'deleted']) ? 'deleted' : '' }}
                    users:</h2>
                <a href="{{ route('admin.users.index', ['status' => 'deleted']) }}" class="right">View deleted
                    users</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th
                            colspan="{{ (Request::query() === ['status' => 'deleted']) ? '1' : '2' }}">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            @if(Request::query() !== ['status' => 'deleted'])
                                <td><a href="{{ route('admin.users.edit', $user) }}"
                                       class="btn btn-warning btn-xs btn-block">Edit</a></td>
                                <td>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('admin.users.restore', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-xs btn-block">Restore</button>
                                    </form>
                                </td>
                            @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
