<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="email"></label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullname"></label>
                        <input wire:model="fullname" type="text" class="form-control" id="fullname" placeholder="Fullname">@error('fullname') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ci"></label>
                        <input wire:model="ci" type="text" class="form-control" id="ci" placeholder="Ci">@error('ci') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ocupation"></label>
                        <input wire:model="ocupation" type="text" class="form-control" id="ocupation" placeholder="Ocupation">@error('ocupation') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address"></label>
                        <input wire:model="address" type="text" class="form-control" id="address" placeholder="Address">@error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="city"></label>
                        <input wire:model="city" type="text" class="form-control" id="city" placeholder="City">@error('city') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="zipcode"></label>
                        <input wire:model="zipcode" type="text" class="form-control" id="zipcode" placeholder="Zipcode">@error('zipcode') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone"></label>
                        <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Phone">@error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="bob"></label>
                        <input wire:model="bob" type="text" class="form-control" id="bob" placeholder="Bob">@error('bob') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
