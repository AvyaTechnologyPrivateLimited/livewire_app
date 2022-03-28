<?php
  
namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Staffs extends Component
{
    public $users;
    public $name;
    public $email;
    public $password;
    public $user_id;
    public $isOpen = 0;
  
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required'
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->users = User::all();
        return view('livewire.user.staffs');
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
        $this->user_id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate();
   
        $user = User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $role = Role::where(['name' => 'Staff'])->first();

        $staff_permissions = ['task-list'];
        $permissions = Permission::whereIn('name', $staff_permissions)->pluck('id','id')->all();
        $role->syncPermissions($permissions);
        
        $user->assignRole([$role->id]);
  
        session()->flash(
            'message',
            $this->user_id ? 'Staff Updated Successfully.' : 'Staff Created Successfully.'
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
        $user = User::findOrFail($id);
        $this->usre_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Staff Deleted Successfully.');
    }
}