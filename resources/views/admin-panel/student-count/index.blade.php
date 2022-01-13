@extends('admin-panel.master')
@section('title','List Of Student Count')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
    <h3>Count of Student</h3>
    </div>
    <div class="card-body">
    @if($student_counts->count() < 1)
       <form
        action="{{url('admin/student_counts/store')}}"
        method="POST"
        class="float-right mb-4">
        @csrf
            <div class="input-group">
                <input 
                class="form-control"
                type="text" 
                name="count"
                id="count"
                required
                placeholder="Enter student count"
                style="width:250px;"
                >
               
                <button 
                class="form-control btn btn-primary"
                style="width:100px;"
                >
                Create
                </button>
               
            </div>
        </form> 
        @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Count</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($student)
            <tr>     
                <td>{{$student->count}}</td>     
                <td> 
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                    <a href="#"> 
                        <button
                            class="btn btn-success btn-sm rounded-1"
                            id="addBtn"
                            type="button"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Add">
                            <i class="fa fa-plus-circle"></i>&nbsp;Add More Student
                        </button>
                        <form 
                        action="{{url('admin/student_counts/'.$student->id.'/update')}}" 
                        method="POST" 
                        id="addForm"
                        style="display:none;">
                        @csrf
                            <div class="input-group">
                                <input 
                                type="number"
                                name="count"
                                class="form-control"
                                placeholder="Enter count number"
                                style="width:250px;"
                                required
                                 >
                                 <button 
                                 type="submit"
                                 class="form-control btn btn-primary"
                                 style="width:100px;">
                                <i class="fa fa-plus-circle"></i>&nbsp;Add
                                 </button>
                            </div>
                        </form>
                    </a>
                    </li>
                    
                </ul>                                      
                </td>
            </tr>
          @endif
        </tbody>
    </table>
    </div>
    <div class="card-footer">
    </div>
</div>      
</div>
@endsection
@section('javascript')
<script>
$(document).ready(function(){
    $('#addBtn').click(function(){
        $('#addForm').css('display','inline-block');
        $(this).css('display','none');
    });
});
</script>
@endsection