<div>

    <div class="text-center text-lg">
        <button wire:click.prevent="changeStatus('todo')" class="border border-gray-700 rounded-lg px-2">To do</button> 
        <button wire:click.prevent="changeStatus('doing')" class="border border-gray-700 rounded-lg px-2">Doing</button> 
        <button wire:click.prevent="changeStatus('done')" class="border border-gray-700 rounded-lg px-2">Done</button>  

    </div>

    
    <div class="p-2 mt-2" >
        <form action="" method="get" wire:submit.prevent="create">
            <input type="text" class="rounded-lg w-full " wire:model="task">
            <button class="mt-2 border px-2 border-gray-700 rounded-lg">Create</button>
        </form>
        
        <div class="text-red-600 text-sm">
            @error('task')
            {{$message}}
            @enderror
        </div>
        
    </div>




    @foreach ($todolist as $todo)

    @switch($todo->status)
        @case('todo')
            @php $color = 'red'; @endphp
            @break
        @case('doing')
            @php $color = 'blue'; @endphp
            @break
        @case('done')
            @php $color = 'green'; @endphp
            @break       
    @endswitch

    <div class="mt-4 p-2 bg-{{$color}}-100 sm:rounded-lg">
     {{$todo->content}} 
    
     <div class="flex justify-between text-xs text-{{$color}}-600">
        <div>
            <button wire:click.prevent="updateStatus('todo', {{$todo->id}})"><></button>
            <button wire:click.prevent="updateStatus('doing', {{$todo->id}})">>></button>
            <button wire:click.prevent="updateStatus('done', {{$todo->id}})">X</button>
        </div>

        <div>
            <span>
                {{\Carbon\Carbon::parse($todo->updated_at)->format('d-M-Y - H:i')}} |</span>
            <span>{{ucfirst($todo->status)}}</span>
        </div>
     </div>
     
    
    
    {{--  <button wire:click.prevent="updateStatus('todo', {{$todo->id}})"><></button>
     <button wire:click.prevent="updateStatus('doing', {{$todo->id}})">>></button>
     <button wire:click.prevent="updateStatus('done', {{$todo->id}})">X</button> --}}
    </div>
    @endforeach


  

    {{--     @foreach ($todolist as $todo)
        <div class="mt-6 px-1">
            <p><strong>vitor de lucca</strong></p>
        </div>

        <div class="p-2 bg-gray-100 border-b sm:rounded-lg">
         {{$todo->content}} <br>
        </div>
     
        @endforeach
 --}}


    
 

{{--     <div class="mt-6 p-2 bg-gray-100 border-b sm:rounded-lg">
        <h1>so pra ver</h1>
    </div>

    <div class="mt-6 p-2 bg-gray-100 border-b sm:rounded-lg">
        <h1>so pra ver dois</h1>
    </div> --}}
</div>


