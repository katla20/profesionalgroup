@section('title', __('Authorizations'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-search"></i></span>
								</div>
								<input wire:model='keyWord' type="search" class="form-control border-left-0 border" name="search" id="search" placeholder="Search..">
							</div>
						</div>
						<a class="navbar-brand" href="{{ route('authorizations_.create') }}">
							<i class="fa fa-plus" id="icon-add"></i>
						</a>
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive" id="table-movil">
					<table class="table">
						<thead>
							<tr> 
								<th>Client</th>
								<th>Phone</th>
								<th>Reason</th>
								<th>Skin Type</th>
								<th>Date</th>
								<th></th>
								<!--<th>dob</th>
								<th>address</th>
								<th>email</th>
								<th>history</th>
								<th>Date</th>-->
							</tr>
						</thead>
						<tbody>
							@foreach($authorizations as $row)
							<tr>
								
								<td data-title='Client'>{{ $row->client->fullname }}</td>
								<td data-title='Phone'>{{ (isset($row->client->phone))? $row->client->phone : 'NA' }}</td>
								<td data-title='Reason'>{{ implode(",",array_keys(json_decode($row->reason, true))) }}</td>
								<td data-title='Skin Type'>{{ $row->skin_type }}</td>
								<td data-title='Date'>{{ $row->proceeded_date }}</td>
								<td width="80">
									<div class="btn-group">
										<!--<button type="button" class="btn btn-sm drop-actions-ellipsis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="fa fa-ellipsis-h text-info"></span>
										</button>-->
										<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-actions-button transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">
											{{ __('Actions') }}
										</button>
						
										<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{ route('clients_.edit',$row->client_id) }}"><i class="fa fa-edit text-muted"></i>edit user</a>
										<a class="dropdown-item" href="{{ route('authorizations_.pdf',$row->id) }}"><i class="fa fa-download text-muted"></i> pdf</a>
										<hr class="dropdown-divider">					 
										<a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center keychainify-checked"  onclick="confirm('Confirm Delete Authorization id {{$row->id}}? \nDeleted Authorizations cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i></a>   
										</div>
									</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $authorizations->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	@media only screen and (max-width:800px){
		#table-movil tbody,#table-movil tr, #table-movil td{
		 	display:block;	
		}
		#table-movil thead tr{
		 	position:absolute;
			top:-9999px;
			left:-9999px;
		}
		#table-movil td{
		 	position:relative;
			padding-left:50%;
			border:none;
			border-bottom:1px solid #eee;
		}
		#table-movil td::before{
			content:attr(data-title);
			position: absolute;
			left:6px;
		}
		#table-movil tr {
                border-bottom: 1px solid #ccc;
        }

		.drop-actions{
			position:absolute;
			top:-2px;
			left:-4px;
		}

	}
</style>
