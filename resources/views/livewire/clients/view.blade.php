@section('title', __('Clients'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><x-vaadin-user-star style="color: #374151; width:18px;height:18px;"/>
							Clients</h4>
						</div>
						<!--<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>-->
						@if (session()->has('message'))
							@include('flash-message')
						@endif
						<div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-search"></i></span>
								</div>
								<input wire:model='keyWord' type="search" class="form-control border-left-0 border" name="search" id="search" placeholder="Search..">
							</div>
						</div>
						<!--<a class="navbar-brand" href="{{ route('clients_.create') }}">
							<i class="fa fa-plus"></i>
						</a>-->
					</div>
				</div>				
				<div class="card-body">
					<div class="table-responsive" id="table-movil">
						<table class="table">
							<thead>
									<tr>
										<th>Email</th>
										<th>Fullname</th>
										<th>Phone</th>
										<th>Dob</th>
										<th></th>
									</tr>
							</thead>
						<tbody>
							@foreach($clients as $row)
							<tr :wire:key="{{$loop->index}}">
								<td data-title='Email'>{{ $row->email }}</td>
								<td data-title='Fullname'>{{ $row->fullname }}</td>
								<td data-title='Phone'>{{ (isset($row->phone))? $row->phone : 'NA' }}</td>
								<td data-title='Dob'>{{ $row->dob }}</td>
								<td width="90">
									<div class="btn-group">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-actions-button transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">
											{{ __('Actions') }}
										</button>
										<div class="dropdown-menu dropdown-menu-right">
										<!--<a class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>-->							 
										<a class="dropdown-item" onclick="confirm('Confirm Delete Client id {{$row->id}}? \nDeleted Clients cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>						
					{{ $clients->links() }}
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
