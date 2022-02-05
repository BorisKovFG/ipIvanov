@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.culturegroups.create') }}" class="btn btn-block btn-primary">Create culture group</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-content">
            <div class="section-heading clearfix">
                <h2 class="section-title"><span class="lnr lnr-paperclip"></span> List of
                    {{ (Request::query() === ['status' => 'deleted']) ? 'deleted' : '' }}
                    culture groups: </h2>
                <a href="{{ route('admin.culturegroups.index', ['status' => 'deleted']) }}" class="right">View deleted
                    culture groups</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th
                            colspan="{{ (Request::query() === ['status' => 'deleted']) ? '1' : '2' }}">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cultureGroups as $cultureGroup)
                        <tr>
                            <td>{{ $cultureGroup->id }}</td>
                            <td><a href="{{ route('admin.culturegroups.show', $cultureGroup) }}">{{ $cultureGroup->name }}</a></td>
                            @if(Request::query() !== ['status' => 'deleted'])
                                <td><a href="{{ route('admin.culturegroups.edit', $cultureGroup) }}"
                                       class="btn btn-warning btn-xs btn-block">Edit</a></td>
                                <td>
                                    @if($cultureGroup->fertilizers()->count() === 0)
                                    <form action="{{ route('admin.culturegroups.destroy', $cultureGroup) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button>
                                    </form>
                                    @else
                                    Change culture group in {{ $cultureGroup->fertilizers()->count() }} fertilizers
                                    @endif
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('admin.culturegroups.restore', $cultureGroup->id) }}" method="post">
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
