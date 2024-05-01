@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
             <h1 class="page-title">Sub Task List</h1>
             <h4 class="page-title">{{ $task->title }}</h4>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Create New Task
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.sub.store') }}" method="POST">
                        @csrf
                        <div class="row pt-3">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="sub_title" placeholder="Enter sub Task" aria-label="default input example" required>
                                           </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="phone" placeholder="Enter Phone number" aria-label="default input example" maxlength="10" oninput="javascript:if(this.value.length>this.maxLength) this.value = this.value.slice(0,this.maxLength);" required>

                                           </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                           <select name="priority" id="priority" class="form-control">
                                              <option value="1">Priority 1</option>
                                              <option value="2">Priority 2</option>
                                              <option value="3">Priority 3</option>
                                              <option value="4">Priority 4</option>
                                           </select>
                                           </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="date"  aria-label="default input example" required>
                                           </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <textarea name="note" id="note" cols="30" rows="3" placeholder="Enter Note" required="required" class="form-control" ></textarea>
                                           </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex justify-content-end"> <!-- Align items to the right -->
                                    <input type="hidden" class="hidden" name="task_id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-primary btnAdd" >Add Sub Task</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-5">
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Sub Tasks</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Note</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sub_tasks as $key => $sub_task)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $task->title  }}</td>
                        <td>{{ $sub_task->sub_title }}</td>
                        <td>{{ $sub_task->phone }}</td>
                        <td>{{ $sub_task->priority }}</td>
                        <td>{{ $sub_task->note }}</td>
                        <td>{{ $sub_task->date }}</td>
                       @endforeach
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
    .page-titel{
        padding-top:50px;
        color: blue
    }
    .btnAdd{
        width: 20%
    }
</style>
@endpush
@push('js')

@endpush


