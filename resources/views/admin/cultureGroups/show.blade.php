@extends('admin.layouts.main')

@section('content')
    <div class="dashboard-section">
        <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-paperclip"></i>{{ $cultureGroup->name }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Information:</h3>
                    <ul class="list-unstyled list-justify">
                        <li class="clearfix"><b>Agreement date</b> <span>{{ $cultureGroup->id }}</span></li>
                        <li class="clearfix"><b>Delivery cost</b>  <span>{{ $cultureGroup->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
