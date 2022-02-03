@extends('admin.layouts.main')

@section('content')
    <div class="section-heading clearfix">
        <h2 class="section-title"><i class="lnr lnr-leaf"></i>Create Fertilizer:</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel-content">
                <h2 class="heading"><i class="fa fa-square"></i> Insert data:</h2>
                <form id="basic-form" action="{{ route('admin.fertilizers.store') }}" method="post">
                    @csrf
                    @include('admin.includes.formFertilizer')
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
