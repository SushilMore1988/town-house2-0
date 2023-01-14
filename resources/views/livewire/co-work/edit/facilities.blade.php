<div>
    <form action="javascript:void(0)" method="POST" class="register-form">
        @foreach($coWorkSpaceFacilityCategories as $coWorkSpaceFacilityCategoy)
            <h6 class="pb-3 r-boldItalic f-9 check-label mb-0">{{$coWorkSpaceFacilityCategoy->name}}</h6>
            <div class="row py-2 pr-4 ">
                @foreach($coWorkSpaceFacilityCategoy->cwsFacilityCategoryValues as $value)
                    <div class="col-lg-4 col-sm-6 mb-3 mb-lg-0"> 
                    @if(in_array($value->id, $facilities))
                        {{-- Show checked facilities --}}
                        @if($value->value == 'Others')
                            <label class="container-2 r-italicLight">
                                {{ $value->value }} 
                                {!! Form::checkbox( 'facilities[]', $value->id, true,  ['class' => 'facilities-percent other-facility', 'wire:model' => 'facilities'])!!}
                                    <span class="checkmark"></span>
                            </label>
                            {!! Form::text('otherFacility_'.$value->id, null, ['class' => 'other-text-box', 'wire:model' => 'other_facilities.'.$value->id])!!} 
                        @else
                            <label class="container-2 r-lightItalic f-9 check-label r-lightItalic  f-9 check-label">{{$value->value}} 
                                {!! Form::checkbox('facilities[]', $value->id, true, ['class' => 'facilities-percent', 'wire:model' => 'facilities'])!!}
                                <span class="checkmark"></span>
                            </label>
                        @endif
                    @else
                        @if($value->value == 'Others')
                            <label class="container-2 r-italicLight">
                                {{ $value->value }} 
                                {!! Form::checkbox( 'facilities[]', $value->id, false,  ['class' => 'facilities-percent other-facility', 'wire:model' => 'facilities'])!!}
                                    <span class="checkmark"></span>									
                            </label>
                            {!! Form::text('otherFacility_'.$value->id, null, ['class'=>'other-text-box d-none ml-4', 'wire:model' => 'other_facilities.'.$value->id])!!}
                        @else
                            <label class="container-2 r-lightItalic f-9">
                                {{ $value->value }} 
                                {!! Form::checkbox( 'facilities[]', $value->id, false,  ['class' => 'facilities-percent', 'wire:model' => 'facilities'])!!}
                                <span class="checkmark"></span>
                            </label>
                        @endif													
                    @endif
                    </div>
                @endforeach
            </div>
            <hr class="mt-0"/>
        @endforeach
            
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
            <button type="button" wire:click="save('save')" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
            <button type="button" wire:click="save('saveAndSubmit')" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
        </div>
    </form>
</div>
