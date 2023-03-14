@extends("trans.template")
@section("content")
<h2>Data Transaksi</h2>
<p>Data Transaksi ini adalah detail dari Data utama</p>
<div class="text-end">
	<a href="{{ base_url().'/transaction/create' }}" class="btn btn-sm btn-primary">Tambah</a>
</div>
@include("trans.errors")
<form method="GET" action="{{ base_url() }}" enctype="multipart/form-data" id="form-select">
	<table class="table table-responsive table-stripped">
		<thead>
			<tr>
				<th>No. </th>
				<th>Kode Transaksi</th>
				<th>Item</th>
				<th>Qty</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $value)
			<tr>
				<td>{{ ($key+1) }}</td>
				<td>{{ $value->no_transaction }}</td>
				<td>{{ $value->total }}</td>
				<td >{{ $value->qty }}</td>
				<td class="text-center">
					<a href="{{ base_url().'transaction/show/'.$value->id }}" class="btn btn-sm btn-info">View</a>
					<a href="{{ base_url().'transaction/edit/'.$value->id }}"  class="btn btn-sm btn-warning">Edit</a>
					<a href="#" onclick="CheckDelete('{{ base_url().'transaction/delete/'.$value->id }}')" class="btn btn-sm btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</form>
@endsection