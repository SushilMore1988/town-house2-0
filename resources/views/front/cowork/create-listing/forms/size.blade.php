<div class="tab-pane pt-3 border-tabs @if($current_tab == 'size') active @endif" id="size" role="tabpanel">	
	@livewire('co-work.size', ['cws' => $coWorkSpace], key($coWorkSpace->id))
</div>