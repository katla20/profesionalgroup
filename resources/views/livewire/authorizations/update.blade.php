<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Authorization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="client_id"></label>
                <input wire:model="client_id" type="text" class="form-control" id="client_id" placeholder="Client Id">@error('client_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="user_id"></label>
                <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="proceeded"></label>
                <input wire:model="proceeded" type="text" class="form-control" id="proceeded" placeholder="Proceeded">@error('proceeded') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="proceeded_date"></label>
                <input wire:model="proceeded_date" type="text" class="form-control" id="proceeded_date" placeholder="Proceeded Date">@error('proceeded_date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="signature_client"></label>
                <input wire:model="signature_client" type="text" class="form-control" id="signature_client" placeholder="Signature Client">@error('signature_client') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="signature_date"></label>
                <input wire:model="signature_date" type="text" class="form-control" id="signature_date" placeholder="Signature Date">@error('signature_date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="skin_type"></label>
                <input wire:model="skin_type" type="text" class="form-control" id="skin_type" placeholder="Skin Type">@error('skin_type') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="history"></label>
                <input wire:model="history" type="text" class="form-control" id="history" placeholder="History">@error('history') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="history_specify"></label>
                <input wire:model="history_specify" type="text" class="form-control" id="history_specify" placeholder="History Specify">@error('history_specify') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="colors"></label>
                <input wire:model="colors" type="text" class="form-control" id="colors" placeholder="Colors">@error('colors') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="reason"></label>
                <input wire:model="reason" type="text" class="form-control" id="reason" placeholder="Reason">@error('reason') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="color_observation"></label>
                <input wire:model="color_observation" type="text" class="form-control" id="color_observation" placeholder="Color Observation">@error('color_observation') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
