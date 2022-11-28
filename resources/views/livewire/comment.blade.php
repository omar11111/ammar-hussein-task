
<div>
@foreach ($item->comments as $comment )
{{ $comment->text }}
<br/>
@endforeach
    <form wire:submit.prevent='create'>
        @csrf
        <div class="form-group">
            <input type="text" wire:model.debounce.500ms="text" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">submit</button>
        </div>
    </form>
</div>
