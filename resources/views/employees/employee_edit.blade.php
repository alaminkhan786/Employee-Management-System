@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  border-danger">
                <div class="card-header bg-danger text-white">{{ __('Update Employee') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Update Employee</h2>
                        <form action="{{ route('employee.update', $id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID:</label>
                                <input type="text" class="form-control" name="employee_id" value="{{ $employee->employee_id }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $employee->name }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $employee->phone }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $employee->email }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ $employee->address }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary:</label>
                                <input type="number" step="0.01" class="form-control" name="salary" value="{{ $employee->salary }}"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
@if(Session::has('success'))
<script type="text/javascript">
    $(function() {
        toastr.success("{{ Session::get('success') }}");
    })
</script>
@endif
@if(Session::has('fail'))
<script type="text/javascript">
    $(function() {
        toastr.error("{{ Session::get('fail') }}");
    })
</script>
@endif
@stop
