  <!-- Add Contact details modal start-->
  <!-- Modal -->
  <div class="modal fade" id="contactDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('contacts.store')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Address line 1</label>
                    <input class="form-control form-control-lg" type="text" name="address1" placeholder="Address Line 1" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Address line 2</label>
                    <textarea class="form-control" rows="2" name="address2" placeholder="Textarea"></textarea>
                </div>
                <input type="hidden" id="user_id" name="user_id" value={{$user->id}}>

                <select class="form-select" id="floatingSelectGrid" name="country">
                    <option selected>Zimbabwe</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                    <option value="South Africa">South Africa</option>
                    <option value="China">China</option>
                  </select>
                  <label for="floatingSelectGrid">Select your country.</label>
                <div class="text-center mt-3">
                     {{-- <button type="submit" class="btn btn-lg btn-primary">Add</button> --}}
                </div>
            {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-lg btn-primary">Add</button>
        </form>
        </div>
      </div>
    </div>
  </div>
                            <!-- add contact details modal end-->
 <!-- Edit Contact details modal start-->
  <!-- Modal -->
  <div class="modal fade" id="editContactDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           @if ($user->contact !== null)
           <form method="post" action="{{ route('contacts.update', $user->contact->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Address line 1</label>
                <input class="form-control form-control-lg" type="text" name="address1" value={{$user->contact->address1}} />
            </div>
            <div class="mb-3">
                <label class="form-label">Address line 2</label>
                <textarea class="form-control" rows="2" name="address2" placeholder={{$user->contact->address2}}></textarea>
            </div>
            <input type="hidden" id="user_id" name="user_id" value={{$user->id}}>

            <select class="form-select" id="floatingSelectGrid" name="country">
                <option selected>{{$user->contact->country}}</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="Zimbabwe">Botswana</option>
                <option value="Zambia">Zambia</option>
                <option value="South Africa">South Africa</option>
                <option value="China">China</option>
              </select>
              <label for="floatingSelectGrid">Select your country.</label>
            <div class="text-center mt-3">
                 {{-- <button type="submit" class="btn btn-lg btn-primary">Add</button> --}}
            </div>
        {{-- </form> --}}
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-lg btn-primary">Add</button>
    </form>
           @endif
        </div>
      </div>
    </div>
  </div>
                            <!-- edit personal details modal end-->

<!-- Edit Contact details modal start-->
  <!-- Modal -->
  <div class="modal fade" id="editPersonalDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personal Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('users.update', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" value={{$user->name}} />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Surname</label>
                    <input class="form-control form-control-lg @error('surname') is-invalid @enderror" type="text" name="surname" value={{$user->surname}} />
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile number</label>
                    <input class="form-control form-control-lg @error('mobile') is-invalid @enderror" type="text" name="mobile" value={{$user->mobile}} />
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value={{$user->email}} />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                

                <select class="form-select" id="floatingSelectGrid" name="role">
                    @foreach ($roles as $role)
                    <option value={{$role->id}}>{{$role->name}}</option>
                    @endforeach
                    
                  </select>
                  <label for="floatingSelectGrid">Select  role.</label>
                <div class="text-center mt-3">
                     {{-- <button type="submit" class="btn btn-lg btn-primary">Add</button> --}}
                </div>
            {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-lg btn-primary">Add</button>
        </form>
        </div>
      </div>
    </div>
  </div>
                            <!-- edit contact details modal end-->

