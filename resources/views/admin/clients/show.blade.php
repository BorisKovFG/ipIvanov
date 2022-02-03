@extends('admin.layouts.main')

@section('content')
    <div class="dashboard-section">
        <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-building"></i>{{ $client->name }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Information:</h3>
                    <ul class="list-unstyled list-justify">
                        <li class="clearfix"><b>Agreement date</b> <span>{{ $client->agreement_date }}</span></li>
                        <li class="clearfix"><b>Delivery cost</b>  <span>{{ $client->delivery_cost }}</span></li>
                        <li class="clearfix"><b>Region</b>  <span>{{ $client->region }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
