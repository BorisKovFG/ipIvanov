@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.fertilizers.create') }}" class="btn btn-block btn-primary">Create fertilizer</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <h2 class="section-title"><span class="lnr lnr-book"></span> List of fertilizers:</h2>
            <div class="table-responsive">
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
                        <th colspan="2">Actions</th>
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
                            <td><span class="btn btn-warning btn-xs btn-block">
                                    <a href="{{ route('admin.fertilizers.edit', $fertilizer) }}">Edit</a> </span></td>
                            <td>
                                <form action="{{ route('admin.fertilizers.destroy', $fertilizer) }}" method="post">
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
