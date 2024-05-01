<form action="{{ route('todo.update',$task->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
           <div class="form-group">
            <input class="form-control" type="text" name="title" value="{{ $task->title }}" placeholder="Enter Task" aria-label="default input example" required>
           </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
