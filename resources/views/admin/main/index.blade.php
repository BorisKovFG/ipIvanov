@extends('admin.layouts.main')

@section('content')
    <div class="dashboard-section no-margin">
        <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-user-circle"></i> Statistic <span class="section-subtitle">(For all days)</span></h2>
        </div>
        <div class="panel-content">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline"><i class="fa fa-thumbs-o-up"></i> +636 <span>LIKES</span></p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline"><i class="fa fa-reply-all"></i> +528 <span>FOLLOWERS</span></p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline"><i class="fa fa-envelope-o"></i> +1065 <span>SUBSCRIBERS</span></p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline"><i class="fa fa-user-circle-o"></i> +201 <span>USERS</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
