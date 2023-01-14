<div>
    <label class="n-bold f-14 text-black">TH2.0 ID</label>
  <div class="input-group mb-3 position-relative w-50">
      <input class="form-control rounded-9 commonClass mb-0" aria-label="Input group example" id="email" name="email" type="email" value="" wire:model="unique_name" disabled>
      <div id="email_verify_div">
          <div class="input-group-append btn-warning email_verify" style="cursor: pointer;" id="email_verify">                                            
              <svg xmlns="http://www.w3.org/2000/svg" width="87.283" height="22.41" viewBox="0 0 87.283 22.41">
                <g id="Group_487" data-name="Group 487" transform="translate(-574.48 -216.291)">
                  <rect id="Rectangle_109" data-name="Rectangle 109" width="87.273" height="22.4" transform="translate(574.485 216.296)" fill="#f7981d" stroke="#020303" stroke-miterlimit="10" stroke-width="0.01"/>
                  <text id="CHECK" transform="translate(598.936 231.701)" fill="#fff" font-size="10" font-family="SegoeUI, Segoe UI" style="isolation: isolate"><tspan x="0" y="0">CHECK</tspan></text>
                </g>
              </svg>
          </div>
      </div>
  </div>
  <div class="mb-2 mt-4">
        <h4 class="mb-3 r-boldItalic f-9 text-body">General Information</h4>
    </div>
  <form class="register-form">
        <div class="form-group">
            <input type="text" name="fname" class="w-100 form-control" placeholder="Name" wire:model="fname">
            @error('fname') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" name="lname" class="w-100 form-control" placeholder="Surname" wire:model="lname">
            @error('lname') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" name="gmail" class="w-100 form-control" placeholder="Gmail" wire:model="email">
            @error('gmail') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" name="dob" class="w-100 form-control" placeholder="Date of Birth" id="dob" wire:model="dob">
            @error('dob') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <select name="gender" class="custom-select w-100 form-control mb-0" wire:model="gender">
              <option>Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
          @error('gemder') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
      </div>
      <div class="form-group">
            <select name="profession" class="custom-select  w-100 form-control mb-0" wire:model="profession">
              <option>Profession</option>
              <option value="Student">Student</option>
              <option value="Employee">Employee</option>
              <option value="Freelancer">Freelancer</option>
              <option value="Business Owner">Business Owner</option>
              <option value="Self Employed">Self Employed</option>
            </select>
          @error('profession') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
      </div>
      <div class="form-group">
            <select name="marital_status" class="custom-select  w-100 form-control mb-0" wire:model="marital_status">
              <option>Marital status</option>
              <option value="Unmarried">Unmarried</option>
              <option value="Married">Married</option>
          </select>
          @error('marital_status') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
      </div>
      <div class="form-group">
            <input type="text" name="phone" class=" w-100 form-control" placeholder="Phone" wire:model="phone">
            @error('phone') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" name="current_location" class=" w-100 form-control" placeholder="Country, City" wire:model="current_location">
            @error('current_location') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" name="hometown" class=" w-100 form-control" placeholder="Hometown (Country, City)" wire:model="hometown">
            @error('hometown') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <input type="button" class="d-none" id="save-gi-input" wire:click="update">
  </form>
</div>
