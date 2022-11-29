
<div>
    {{-- @dd($this->) --}}
@foreach ($item->comments as $comment )
<div class="row">
    <div class="col-md-6">
        {{ $comment->text }}
    </div>

    <div class="col-md-6">
        <button wire:click="showReplayAndSetParentId({{ $comment->id }}) " class=" btn text-primary ">replay</button>
    </div>
    @foreach ($comment->replies  as $reply )
    <div class="col-md-6">
        {{ $reply->text }}
    </div>

    <div class="col-md-6">
        <button wire:click="showReplayAndSetParentId({{ $comment->id }}) " class=" btn text-primary ">replay</button>
    </div>
     
 @endforeach
</div>




<br/>
@if ($this->parent_id == $comment->id)
<form wire:submit.prevent='createReply'>
    @csrf
    <div class="form-group">
        <input type="text" placeholder="reply" wire:model.debounce.500ms="reply" class="form-control" />
    </div>
    <div class="form-group">
        <button type="submit" wire:loading.attr="disabled" class=" btn btn-primary ">replay</button>
    </div>
</form>
@endif

<hr>
@endforeach
    <form wire:submit.prevent='create'>
        @csrf
        <div class="form-group">
            <input type="text" placeholder="Comment" wire:model.debounce.500ms="text" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">submit</button>
        </div>
    </form>
</div>
