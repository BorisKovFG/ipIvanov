@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.clients.create') }}" class="btn btn-block btn-primary">Create client</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <h2 class="section-title"><span class="lnr lnr-book"></span> List of clients:</h2>
            <div class="table-responsive">
                <table class="table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Agreement date</th>
                        <th>Delivery_cost</th>
                        <th>Region</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td><a href="{{ route('admin.clients.show', $client) }}">{{ $client->name }}</a></td>
                            <td>{{ $client->agreement_date }}</td>
                            <td>{{ $client->delivery_cost }}</td>
                            <td>{{ $client->region }}</td>
                            <td><span class="btn btn-warning btn-xs btn-block">
                                    <a href="{{ route('admin.clients.edit', $client) }}">Edit</a> </span></td>
                            <td>
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="post">
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
