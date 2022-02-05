@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.clients.create') }}" class="btn btn-block btn-primary">Create client</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <div class="section-heading clearfix">
                <h2 class="section-title"><span class="lnr lnr-book"></span> List of
                    {{ (Request::query() === ['status' => 'deleted']) ? 'deleted' : '' }}
                    clients: </h2>
                <a href="{{ route('admin.clients.index', ['status' => 'deleted']) }}" class="right">View deleted
                    clients</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Agreement date</th>
                        <th>Delivery cost</th>
                        <th>Region</th>
                        <th
                            colspan="{{ (Request::query() === ['status' => 'deleted']) ? '1' : '2' }}">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td><a href="{{ route('admin.clients.show', $client) }}">{{ $client->name }}</a></td>
                            <td>{{ $client->agreement_date }}</td>
                            <td>{{ $client->delivery_cost }}</td>
                            <td>{{ $client->region }}</td>
                            @if(Request::query() !== ['status' => 'deleted'])
                                <td><a href="{{ route('admin.clients.edit', $client) }}"
                                       class="btn btn-warning btn-xs btn-block">Edit</a></td>
                                <td>
                                    <form action="{{ route('admin.clients.destroy', $client) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('admin.clients.restore', $client->id) }}" method="post">
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
