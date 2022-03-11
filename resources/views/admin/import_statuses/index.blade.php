@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <form action="{{ route('admin.fertilizers.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="import_fertilizers" class="margin-bottom-15">
                <button type="submit" class="btn btn-primary">Import list of fertilizers</button>
                @error('import_fertilizers')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </form>
            @if (session('status'))
                <p class="help-block"><em>{{ session('status') }}</em></p>
            @endif
        </div>
    </div>
    <div class="table-responsive row">
        <table class="table table-striped no-margin">
            <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>The user who imported</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->getStatus($status->status) }}</td>
                    <td>{{ $status->user->name }}</td>
                    <td>{{ $status->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-10 col-md-6">
                Показано с {{ $statuses->firstItem() }} по {{ $statuses->lastItem() }} из {{ $statuses->total() }}
                строк {{-- TODO  добавить склонение --}}
        </div>
        <div class="col-sm-10 col-md-4">
            <div class="pagination-sm">
                {{ $statuses->links() }}
            </div>
        </div>
    </div>
@endsection
