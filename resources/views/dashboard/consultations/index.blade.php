@extends('dashboard.master')
@section('consultationsActive')
    active
@endsection
@section('content')

@section('title')
    Consultations
@endsection


<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Create date</th>
        <th scope="col">Answer</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cons as $con)
        <tr>
            <th scope="row">{{ $con->id }}</th>
            <td>{{ $con->title }}</td>
            <td>{{ $con->body }}</td>

            <td>{{$con->created_at}}</td>
            <td>
                <a  href="/consultations/{{$con->id}}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <a onclick="getCurrentConsultation({{$con->id}})" href="" style="color:red;" data-toggle="modal" data-target="#exampleModal">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{--Confirmation modals--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="deleteCategory()">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="errorBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>
<script>
    var current_con = 0;
    function getCurrentConsultation(conId) {
        current_con = conId;
    }

    function deleteCategory() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/category/' + current_category,
            type: "DELETE",
            success: function (d) {

                if (d['msg']) {
                    $('#exampleModal').modal('hide');
                    $('#errorBody').append( d['msg'] );
                    $('#errorModal').modal('show');
                    return;
                }
                location.reload();

            }
        })
    }
</script>
@endsection