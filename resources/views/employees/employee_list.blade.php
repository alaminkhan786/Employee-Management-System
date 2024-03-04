@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12 ">
            <div class="card  border-danger">
                <div class="card-header bg-danger text-white">{{ __('Employee List') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Employee List</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Salary</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->employee_id}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->address}}</td>
                                        <td>{{$employee->salary}}</td>
                                        <td>{{$employee->created_at}}</td>
                                        <td>{{$employee->updated_at}}</td>
                                        <td>
                                            <a href="{{route('employee.edit',$employee->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('employee.delete',$employee->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
