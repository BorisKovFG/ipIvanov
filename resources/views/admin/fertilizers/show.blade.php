@extends('admin.layouts.main')

@section('content')
    <div class="dashboard-section">
        <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-shopping-basket"></i>{{ $fertilizer->name }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Information:</h3>
                    <ul class="list-unstyled list-justify">
                        <li class="clearfix"><b>Norm nitrogen</b> <span>{{ $fertilizer->norm_nitrogen }}</span></li>
                        <li class="clearfix"><b>Norm phosphorus</b>  <span>{{ $fertilizer->norm_phosphorus }}</span></li>
                        <li class="clearfix"><b>Norm potassium</b>  <span>{{ $fertilizer->norm_potassium }}</span></li>
                        <li class="clearfix"><b>Culture group</b>  <span>{{ $fertilizer->cultureGroup->name }}</span></li>
                        <li class="clearfix"><b>Region</b>  <span>{{ $fertilizer->region }}</span></li>
                        <li class="clearfix"><b>Price</b>  <span>{{ $fertilizer->price }}</span></li>
                        <li class="clearfix"><b>Description</b>  <span>{{ $fertilizer->description }}</span></li>
                        <li class="clearfix"><b>Purpose</b>  <span>{{ $fertilizer->purpose }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
