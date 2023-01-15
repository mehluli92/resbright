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
            <form method="post" action="{{ route('contacts.update', $user->contact->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Address line 1</label>
                    <input class="form-control form-control-lg @error('address1') is-invalid @enderror" type="text" name="address1" value={{$user->contact->address1}} />
                    @error('address1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Address Line 2</label>
                    <input class="form-control form-control-lg @error('address2') is-invalid @enderror" type="text" name="address2" value={{$user->contact->address2}} />
                    @error('address2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input class="form-control form-control-lg @error('country') is-invalid @enderror" type="text" name="country" value={{$user->contact->country}} />
                    @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <input type="hidden" id="user_id" name="user_id" value={{$user->id}}>


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