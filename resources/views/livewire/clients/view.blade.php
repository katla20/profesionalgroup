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
						<!--<a class="navbar-brand" href="{{ route('clients_.create') }}">
							<i class="fa fa-plus"></i>
						</a>-->
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td></td> 
								<th>Email</th>
								<th>Fullname</th>
								<th>Phone</th>
								<th>Dob</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($clients as $row)
							<tr>
								<td width="90">
									<div class="btn-group">
										<button type="button" class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="fa fa-ellipsis-h text-info"></span>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
										<!--<a class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>-->							 
										<a class="dropdown-item" onclick="confirm('Confirm Delete Client id {{$row->id}}? \nDeleted Clients cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
										</div>
									</div>
								</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->fullname }}</td>
								<td>{{ (isset($row->phone))? $row->phone : 'NA' }}</td>
								<td>{{ $row->dob }}</td>
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
