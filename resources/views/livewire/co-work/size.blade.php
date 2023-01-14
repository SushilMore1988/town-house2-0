<div>
	<h6 class="pb-3 r-boldItalic f-9 check-label">Let us know the size of your co-working</h6>
    {!! Form::open(['wire:submit.prevent' => 'store']) !!}
		<section>
			<i class="label r-lightItalic f-9 check-label">Enter total Seating capacity</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('seating_capacity', $size['seating_capacity'], ['class'=>'form-control w-50 form-control size-percent number', 'wire:model' => 'size.seating_capacity'])!!}
					<div class="text-danger mt-1" id="total-area-error">	
						@if ($errors->has('seating_capacity')) 
							{{ $errors->first('seating_capacity') }}
						@endif
					</div>
				</div>
			</div>
			<i class="label r-lightItalic f-9 check-label">Enter size of the space in Sq. ft.</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('size_in_sqft', $size['size_in_sqft'], ['class'=>'w-50 form-control size-percent number', 'wire:model' => 'size.size_in_sqft'])!!}
					<div class="text-danger mt-1">
						@if ($errors->has('size_in_sqft')) 
							{{ $errors->first('size_in_sqft') }}
						@endif
					</div>
				</div>
			</div>
			<hr class="mt-0">
			<div class="mb-3">
				<i class="label r-boldItalic f-9 check-label">SHARED DESK </i>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Total Shared Desk Available</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('shared_desk_available', $size['shared_desk']['available'], ['class'=>'w-50 form-control size-percent number', 'wire:model' => 'size.shared_desk.available'])!!}
					<div class="text-danger mt-1" id="shared-desk-available-error">	
						@if ($errors->has('shared_desk_available')) 
							{{ $errors->first('shared_desk_available') }}
						@endif
					</div>
				</div>
			</div>

			<i class="label r-lightItalic f-9 check-label mt-2">Shared Desk for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updateSharedDeskCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="shared_desk_for_listing_view">{{$size['shared_desk']['for_listing']}}</small></h4>
				<span wire:click="updateSharedDeskCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<hr class="mt-0">
			<div class="mb-3">
				<i class="label r-boldItalic f-9 check-label">DEDICATED DESK</i>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Total Dedicated Desk Available</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('dedicated_desk_available', $size['dedicated_desk']['available'], ['class'=>'w-50 form-control size-percent number', 'wire:model' => 'size.dedicated_desk.available'])!!}
					<div class="text-danger mt-1" id="dedicated-desk-available-error">	
						@if ($errors->has('dedicated_desk_available	')) 
							{{ $errors->first('dedicated_desk_available	') }}
						@endif
					</div>
				</div>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Dedicated Desk for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updateDedicatedDeskCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="dedicated_desk_for_listing_view">{{$size['dedicated_desk']['for_listing']}}</small></h4>
				<span wire:click="updateDedicatedDeskCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<hr class="mt-0">
		</section>
		<section>
			<h6 class="pb-3 r-boldItalic f-9 check-label">PRIVATE OFFICE</h6>
			<i class="label r-lightItalic f-9 check-label mt-2">Total Private Office's Available</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('private_offices_available', $size['private_offices']['available'], ['class'=>'w-50 form-control size-percent number', 'wire:model' => 'size.private_offices.available'])!!}
					<div class="text-danger mt-1" id="total-area-error">	
						@if ($errors->has('private_offices_available')) 
							{{ $errors->first('private_offices_available') }}
						@endif
					</div>
				</div>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Private Office's for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updatePrivateOfficesCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="total-private-offices-view">{{$size['private_offices']['for_listing']}}</small></h4>
				<span wire:click="updatePrivateOfficesCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Private Office's Types for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updatePrivateOfficesTypeCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="total-private-offices-view">{{$size['private_offices']['types_for_listing']}}</small></h4>
				<span wire:click="updatePrivateOfficesTypeCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<div id="private-office-div" class="{{$size['private_offices']['types_for_listing'] > 0 ? '':'d-none'}}">
				<i class="label r-lightItalic f-9 check-label office-capacity-view">Private Office's Types Name and Capacities</i>
				<div class="row register-form ml-0 py-4 office-capacity-view" id="office-capacity-view">
					@if(!empty($size['private_offices']['types_for_listing']) && $size['private_offices']['types_for_listing'] > 0)
						<div class="col-12">
							<div class="d-flex align-items-center">
								<div class="w-50">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Office Name</small></label>
								</div>
								<div class="w-50 ml-2">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Number of Offices</small></label>
								</div>
								<div class="w-50 ml-2">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Office Capacity</small></label>
								</div>
							</div>
						</div>
						{{-- @for($i=0;$i<$size['private_offices']['private_offices'];$i++) --}}
						@if(!empty($size['private_offices']['private_offices']))
						@foreach($size['private_offices']['private_offices'] as $i => $privateOffice)
							<div class="col-12 mb-3">
								<div class="d-flex align-items-center">
									<div class="w-50">
										<input type="text" name="privateOfficeName_{{$i+1}}" class="size-percent common-field-input w-100 privateOfficeName" placeholder="Private Office Type {{ $i }} Name" value="{{$privateOffice['name']}}" wire:model="size.private_offices.types.{{ $i+1 }}.name"/>
									</div>
									<div class="w-50 ml-2">
										<input type="text" name="privateOfficeNumber_{{$i+1}}" class="size-percent common-field-input ml-2 w-100 number privateOfficeCapacity" placeholder="Number of Private Offices for Type {{ $i }}" value="{{$privateOffice['quantity']}}" wire:model="size.private_offices.types.{{ $i+1 }}.quantity"/>
									</div>
									<div class="w-50 ml-2">
										<input type="text" name="privateOfficeCapacity_{{$i+1}}" class="size-percent common-field-input ml-2 w-100 number privateOfficeCapacity" placeholder="Private Office Type {{ $i }} Capacity" value="{{$privateOffice['capacity']}}" wire:model="size.private_offices.types.{{ $i+1 }}.capacity"/>
									</div>
								</div>
							</div>
						{{-- @endfor --}}
						@endforeach
						@endif
					@endif
				</div>
			</div>
			<hr class="mt-0">
			<h6 class="pb-3 r-boldItalic f-9 check-label">MEETING ROOM</h6>
			<i class="label r-lightItalic f-9 check-label mt-2">Total Meeting Rooms Available</i>
			<div class="register-form">
				<div class="d-flex-inline pt-2 pb-4">
					{!! Form::text('meeting_rooms_available', $size['meeting_rooms']['available'],['class'=>'w-50 form-control size-percent number', 'wire:model' => 'size.meeting_rooms.available'])!!}
					<div class="text-danger mt-1" id="meeting-room-error">	
						@if ($errors->has('meeting_rooms_available	')) 
							{{ $errors->first('meeting_rooms_available	') }}
						@endif
					</div>
				</div>
			</div>

			<i class="label r-lightItalic f-9 check-label mt-2">Meeting Rooms for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updateMeetingRoomCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="total-meeting-rooms-view">{{$size['meeting_rooms']['for_listing']}}</small></h4>
				<span wire:click="updateMeetingRoomCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<i class="label r-lightItalic f-9 check-label mt-2">Meeting Room Types for Listing</i>
			<div class="d-flex align-items-center pt-2 pb-4">
				<span wire:click="updateMeetingRoomTypeCount(-1)" class="circle minus" style="cursor: pointer;"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
				<h4 class="px-5 num n-bold f-24 pt-2"><small id="total-meeting-rooms-view">{{$size['meeting_rooms']['types_for_listing']}}</small></h4>
				<span wire:click="updateMeetingRoomTypeCount(1)" style="cursor: pointer" class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt=""/></span>
			</div>
			<div id="meeting-room-div" class="{{$size['meeting_rooms']['types_for_listing'] > 0 ? '':'d-none'}}">
				<i class="label r-lightItalic f-9 check-label meeting-room-view">Meeting Room's Type Name and Capacities</i>
				<div class="row register-form ml-1 py-4 meeting-room-view" id="meeting-room-capacity-view">
					@if(!empty($size['meeting_rooms']['types_for_listing']) && $size['meeting_rooms']['types_for_listing'] > 0)
						<div class="col-12">
							<div class="d-flex align-items-center">
								<div class="w-50">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Meeting Room Name</small></label>
								</div>
								<div class="w-50 ml-2">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Number of Meeting Rooms</small></label>
								</div>
								<div class="w-50 ml-2">
									<label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Meeting Room Capacity</small></label>
								</div>
							</div>
						</div>
						@for($i=0;$i<$size['meeting_rooms']['types_for_listing'];$i++)
							<div class="col-12 mt-2">
								<div class="d-flex align-items-center">
									<div class="w-50">
										<input type="text" name="meetingRoomName_{{$i+1}}" class="size-percent common-field-input ml-2 w-100 meetingRoomName" placeholder="Meeting Room Type {{ $i }} Name" value="{{$size['meeting_rooms']['types'][$i+1]['name']}}" wire:model="size.meeting_rooms.types.{{ $i+1 }}.name"/>
									</div>
									<div class="w-50 ml-2">
										<input type="text" name="meetingRoomCapacity_{{$i+1}}" class="size-percent common-field-input ml-2 w-100 number meetingRoomCapacity" placeholder="Meeting Room Capacity {{ $i }}" value="{{$size['meeting_rooms']['types'][$i+1]['quantity']}}" wire:model="size.meeting_rooms.types.{{ $i+1 }}.quantity"/>
									</div>
									<div class="w-50 ml-2">
										<input type="text" name="meetingRoomCapacity_{{$i+1}}" class="size-percent common-field-input ml-2 w-100 number meetingRoomCapacity" placeholder="Meeting Room Capacity {{ $i }}" value="{{$size['meeting_rooms']['types'][$i+1]['capacity']}}" wire:model="size.meeting_rooms.types.{{ $i+1 }}.capacity"/>
									</div>
								</div>
							</div>
						@endfor
					@endif
				</div>
			</div>
		</section>
		<div class="alert alert-danger size-error mb-0 time-out-alert d-none" role="alert">
			Please enter size details
		</div>
		<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">			
			<button type="submit" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" name="save" value="1">SAVE</button>
			<button type="submit" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100" name="saveAndSubmit" value="1">SAVE & SUBMIT</button>	
		</div>
	{!!Form::close()!!}
</div>
