@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-primary">Create user</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <h2 class="section-title"><span class="lnr lnr-users"></span> List of users:</h2>
            <div class="table-responsive">
                <table class="table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td><span class="btn btn-warning btn-xs btn-block">
                                    <a href="{{ route('admin.users.edit', $user) }}">Edit</a> </span></td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button>
                                </form>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
