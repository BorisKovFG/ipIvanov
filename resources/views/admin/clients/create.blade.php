@extends('admin.layouts.main')

@section('content')
    <div class="section-heading clearfix">
        <h2 class="section-title"><i class="lnr lnr-apartment"></i>Add Client:</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel-content">
                <h2 class="heading"><i class="fa fa-square"></i> Insert data:</h2>
                <form id="basic-form" action="{{ route('admin.clients.store') }}" method="post">
                    @csrf
                    @include('admin.includes.formClient')
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
