@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-danger text-white text-center h4">{{ __('Create Employee') }}</div>

                <div class="card-body">
                    <h2 class="text-center mb-4">Create Employee</h2>
                    <form action="{{ route('store.employee') }}" method="POST"> 
                        @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID:</label>
                            <input type="text" class="form-control" name="employee_id" placeholder="Enter employee ID" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter employee name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter employee phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter employee email" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter employee address" required>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary:</label>
                            <input type="number" step="0.01" class="form-control" name="salary" placeholder="Enter employee salary" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
@if(Session::has('success'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        toastr.success("{{ Session::get('success') }}");
    });
</script>
@endif
@if(Session::has('fail'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        toastr.error("{{ Session::get('fail') }}");
    });
</script>
@endif
@stop
