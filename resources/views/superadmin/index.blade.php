{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (auth()->user()->is_superadmin == 1)
                        <a href="{{ route('superadmin/routes') }}">Super Admin</a>
                    @else
                        <div class="panel-heading">Normal User</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
