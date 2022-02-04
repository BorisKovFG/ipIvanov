@extends('admin.layouts.main')

@section('content')
    <div class="section-heading clearfix">
        <h2 class="section-title"><i class="lnr lnr-apartment"></i>Edit User:</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel-content">
                <h2 class="heading"><i class="fa fa-square"></i> Insert data:</h2>
                <form id="basic-form" action="{{ route('admin.users.update', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    @include('admin.includes.formUser')
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
