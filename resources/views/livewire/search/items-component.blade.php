<div>
   <input class="form-control form-control-lg font-size-base border-2x"
          type="text" id="js-task-input"
          wire:model="search"
          wire:keydown="searching"
          placeholder="{{ __('global.searching') }}">
</div>
