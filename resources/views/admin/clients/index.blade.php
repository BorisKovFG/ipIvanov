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
            <div class="row">
                <div class="col-md-6">
                    <!-- BASIC TABS -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a href="#profile2" role="tab" data-toggle="tab">Sorting</a></li>

                        <li class="dropdown">
                            <a href="#" id="myTabDrop12" class="dropdown-toggle" data-toggle="dropdown">Filters
                                <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop12">
                                <li><a href="#dropdown01" tabindex="-1" data-toggle="tab">Name</a></li>
                                <li><a href="#dropdown11" tabindex="-1" data-toggle="tab">Agreement date</a></li>
                                <li><a href="#dropdown21" tabindex="-1" data-toggle="tab">Delivery cost</a></li>
                                <li><a href="#dropdown31" tabindex="-1" data-toggle="tab">Region</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">Name <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.clients.index', ['sort' => 'nameAsc']) }}">ASC</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.clients.index', ['sort' => 'nameDesc']) }}">DESC</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">Price <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.clients.index', ['sort' => 'deliveryCostAsc']) }}">ASC</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.clients.index', ['sort' => 'deliveryCostDesc']) }}">DESC</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown01">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="input-sm form-control" name="name">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="dropdown11">
                            <div class="input-group col-md-6">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Agreement date:</label>
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="input-sm form-control" name="agreement_date[begin]">
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="agreement_date[end]">
                                        </div>
{{--                                        <input type="text" class="input-sm form-control" name="agreement_date[begin]">--}}
{{--                                        <span class="input-group-addon">to</span>--}}
{{--                                        <input type="text" class="input-sm form-control" name="agreement_date[end]">--}}
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="dropdown21">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Delivery cost:</label>
                                        <input type="text" class="input-sm form-control" name="delivery_cost[begin]">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="delivery_cost[end]">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown31">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Region:</label>
                                        <input type="text" class="input-sm form-control" name="region">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END BASIC TABS -->
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
