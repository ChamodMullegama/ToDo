<?php
namespace domain\Services;

use App\Models\ToDo;

class TodoService
{
    protected $task;

    public function __construct(){
        $this->task = new ToDo();
    }

    public function get($task_id){
      return $this->task->find($task_id);
    }

    public function all(){
      return $this->task->all();

    }

    public function store($data){

        $this->task->create($data);

    }

    public function delete($task_id)
    {
        $task= $this->task->find($task_id);
        $task->delete();

    }

    public function status($task_id){
        $task= $this->task->find($task_id);
        $task->status=1;
        $task->update();

    }

     public function update(array $data , $task_id){

        $task = $this->task->find($task_id);
        $task->update($this->edit($task,$data));
     }

     protected function edit(ToDo $task,$data){

        return array_merge($task->toArray(),$data);
     }

}
?>
