<?php

namespace App\Http\Livewire;

use App\Models\Todolist;
use Livewire\Component;

class ShowTodolist extends Component
{

    public $task; 
    public $status = 'todo';

    

    public function render()
    {
        
        $todolist = Todolist::where('user_id', auth()->user()->id)
        ->where('status', $this->status)->latest()->get();

        return view('livewire.show-todolist', ['todolist' => $todolist]);
    }

    public function rules(){
        return [
            'task' => 'required|min:2'
        ];
    }


    public function changeStatus($newStatus){
        $this->status = $newStatus;
    }

    
                                    
    public function create(){
        /* dd($this->texto); */

        $validate = $this->validate();


        Todolist::create([
            'content' => $this->task,
            'user_id' => auth()->user()->id
        ]);

        $this->task = '';
        
    }

    public function updateStatus($newStatus = 'todo', $id =''){
        Todolist::where('id', $id)->update(['status' => $newStatus]);


    }


}
