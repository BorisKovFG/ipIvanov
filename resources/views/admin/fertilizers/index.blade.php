@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.fertilizers.create') }}" class="btn btn-block btn-primary">Create fertilizer</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <div class="section-heading clearfix">
                <h2 class="section-title"><span class="lnr lnr-book"></span> List of
                    {{ (Request::query() === ['status' => 'deleted']) ? 'deleted' : '' }}
                    fertilizers:</h2>
                <a href="{{ route('admin.fertilizers.index', ['status' => 'deleted']) }}" class="right">View deleted
                    fertilizers</a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- BASIC TABS -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a href="#profile2" role="tab" data-toggle="tab">Sorting</a></li>

                        <li class="dropdown">
                            <a href="#" id="myTabDrop12" class="dropdown-toggle" data-toggle="dropdown">Filters by norms
                                <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop12">
                                <li><a href="#dropdown11" tabindex="-1" data-toggle="tab">Nitrogen</a></li>
                                <li><a href="#dropdown21" tabindex="-1" data-toggle="tab">Phosphorus</a></li>
                                <li><a href="#dropdown31" tabindex="-1" data-toggle="tab">Potassium</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="myTabDrop13" class="dropdown-toggle" data-toggle="dropdown">Other Filters
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop12">
                                <li><a href="#dropdown031" tabindex="-1" data-toggle="tab">Name</a></li>
                                <li><a href="#dropdown131" tabindex="-1" data-toggle="tab">Culture group</a></li>
                                <li><a href="#dropdown231" tabindex="-1" data-toggle="tab">Region</a></li>
                                <li><a href="#dropdown331" tabindex="-1" data-toggle="tab">Price</a></li>
                                <li><a href="#dropdown431" tabindex="-1" data-toggle="tab">Description</a></li>
                                <li><a href="#dropdown531" tabindex="-1" data-toggle="tab">Purpose</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">Name <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.fertilizers.index', ['sort' => 'nameAsc']) }}">ASC</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.fertilizers.index', ['sort' => 'nameDesc']) }}">DESC</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">Price <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.fertilizers.index', ['sort' => 'priceAsc']) }}">ASC</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.fertilizers.index', ['sort' => 'priceDesc']) }}">DESC</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown11">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nitrogen:</label>
                                        <input type="text" class="input-sm form-control" name="norm_nitrogen[begin]">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="norm_nitrogen[end]">
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
                                        <label>Phosphorus:</label>
                                        <input type="text" class="input-sm form-control" name="norm_phosphorus[begin]">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="norm_phosphorus[end]">
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
                                        <label>Potassium:</label>
                                        <input type="text" class="input-sm form-control" name="norm_potassium[begin]">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="norm_potassium[end]">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown031">
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
                        <div class="tab-pane fade" id="dropdown131">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                        <div class="form-group">
                                            <label class="control-label">Culture group:</label>
                                            <select multiple="" name="culture_group_id[]" class="form-control">
                                                @foreach($cultureGroups as $cultureGroup)
                                                    <option value="{{ $cultureGroup->id }}">{{ $cultureGroup->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown231">
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
                        <div class="tab-pane fade" id="dropdown331">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Price:</label>
                                        <input type="text" class="input-sm form-control" name="price[begin]">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="price[end]">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown431">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <input type="text" class="input-sm form-control" name="description">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dropdown531">
                            <div class="input-group col-md-3">
                                <form id="basic-form" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label>Purpose:</label>
                                        <input type="text" class="input-sm form-control" name="purpose">
                                    </div>
                                    <button type="submit" class="btn btn-default input-sm form-control">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END BASIC TABS -->
            </div>
        </div>
        <!-- END TABS PILL STYLE -->
    </div>
    <div class="table-responsive row">
        <table class="table table-striped no-margin">
            <thead>
            <tr>
                <th>Name</th>
                <th>Norm nitrogen</th>
                <th>Norm phosphorus</th>
                <th>Norm potassium</th>
                <th>Culture group</th>
                <th>Region</th>
                <th>Price</th>
                <th>Description</th>
                <th>Purpose</th>
                <th
                    colspan="{{ (Request::query() === ['status' => 'deleted']) ? '1' : '2' }}">Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($fertilizers as $fertilizer)
                <tr>
                    <td><a href="{{ route('admin.fertilizers.show', $fertilizer) }}">{{ $fertilizer->name }}</a>
                    </td>
                    <td>{{ $fertilizer->norm_nitrogen }}</td>
                    <td>{{ $fertilizer->norm_phosphorus }}</td>
                    <td>{{ $fertilizer->norm_potassium }}</td>
                    <td>{{ $fertilizer->cultureGroup->name }}</td>
                    <td>{{ $fertilizer->region }}</td>
                    <td>{{ $fertilizer->price }}</td>
                    <td>{{ $fertilizer->description }}</td>
                    <td>{{ $fertilizer->purpose }}</td>
                    @if(Request::query() !== ['status' => 'deleted'])
                        <td><a href="{{ route('admin.fertilizers.edit', $fertilizer) }}"
                               class="btn btn-warning btn-xs btn-block">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.fertilizers.destroy', $fertilizer) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button>
                            </form>
                        </td>
                    @else
                        <td>
                            <form action="{{ route('admin.fertilizers.restore', $fertilizer->id) }}" method="post">
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
