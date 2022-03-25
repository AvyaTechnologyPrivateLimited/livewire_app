<?php
  
namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
  
class Tasks extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $task_id;
    public $no_of_images;
    public $isOpen = 0;
  
    protected function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'no_of_images' => 'required|numeric',
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->tasks = Task::all();
        return view('livewire.task.tasks');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->task_id = '';
        $this->title = '';
        $this->description = '';
        $this->no_of_images = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate();
   
        Task::updateOrCreate(['id' => $this->task_id], [
            'title' => $this->title,
            'description' => $this->description,
            'no_of_images' => $this->no_of_images
        ]);
  
        session()->flash(
            'message',
            $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.'
        );
  
        $this->closeModal();
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->no_of_images = $task->no_of_images;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }
}
