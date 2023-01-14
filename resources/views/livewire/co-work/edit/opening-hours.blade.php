<div>
    <form action="javascript:void(0)" method="POST" wire:submit.prevent="store">
        <h6 class="pb-3 r-boldItalic f-9 check-label">Let us Know your Opening Hours</h6>
        @foreach(config('constant.DAYS') as $day => $key)
            <div class="row register-form office-time align-items-center mb-4 mb-lg-3">
                <div class="col-sm-12">
                    <label class="container-2 r-lightItalic f-9 check-label mb-3">  {{ucfirst($day)}}
                        {{-- {!! Form::checkbox( $day.'_radio', $day, $coWorkSpace->opening_hours['timing'][$day]['checked'] == 1 ? '[\'checked\' => \'checked\']' : '', ['class' => 'from-mark']) !!} --}}
                        <input type="checkbox" class="from-mark" name="{{ $day }}_radio" value="{{ $day }}" wire:model="timing.{{ $day }}.checked">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-lg-center align-items-center ml-3 ml-lg-0">
                    <label class="mr-3 mb-3 mb-lg-0 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">Office Hours :</label>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 pt-md-0 pt-3">
                    <div class="form-group mb-0">
                        <div class="ml-md-3 d-flex align-items-center">
                            <label class="mr-3 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">From</label>	
                            <div class='input-group date d-flex @if($day == "monday") monday-from-time-picker @else from-time-picker @endif from-time' data-id="{{$day.'_from'}}" >			                	
                                <input type="text" class="common-field-input from-time-picker number" wire:model="timing.{{ $day }}.from" data-id="{{$day}}">
                                @if ($errors->has('timing.{{ $day }}.from')) 
                                    <div class="text-danger mt-1">	
                                        {{ $errors->first("timing.$day.from") }}
                                    </div>
                                @endif	
                                <span class="input-group-addon">
                                    <span class="far fa-clock"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pl-md-0 pt-md-0 pt-3">
                    <div class="form-group mb-0">
                        <div class="ml-md-3 d-flex align-items-center">
                            <label class="mr-md-2 mr-4 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">To</label>
                            <div class='input-group date d-flex @if($day == "monday") monday-to-time-picker @else to-time-picker @endif ' >
                                <input type="text" class="common-field-input to-time-picker number" wire:model="timing.{{ $day }}.to" data-id="{{$day}}">
                                @if ($errors->has('timing.{{ $day }}.to')) 
                                <div class="text-danger mt-1">	
                                    {{ $errors->first("timing.$day.to") }}
                                </div>
                                @endif	
                                <span class="input-group-addon">
                                    <span class="far fa-clock"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <h6 class="pb-3 pt-4 r-boldItalic f-9 check-label">Any Specific Timing Information</h6>
        <div class="row">
            <div class="col-sm-12">	
                {!! Form::textarea( 'time_information', $coWorkSpace->opening_hours['specific_time_info'], [ 'placeholder' => 'Eg: We accept late daily checkouts on request ', 'rows' => '2' , 'class' => 'w-100', 'wire:model' => 'specific_time_info' ]) !!}
                @if ($errors->has('specific_time_info')) 
                    <div class="text-danger mt-1">	
                        {{ $errors->first('specific_time_info') }}
                    </div>
                @endif	
            </div>
        </div>
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
            <button type="button" wire:click="store('save')" name="save" value='save' class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
            <button type="button" wire:click="store('saveAndsubmit')" name="saveAndSubmit" value='submit' class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
        </div>
    </form>
</div>
