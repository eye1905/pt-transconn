@extends("trans.template")

@section("content")
<h2>Data Transaksi</h2>
<p>Data Transaksi ini adalah detail dari Data utama</p> 
<form method="POST" id="form-transaction" action="{{ base_url()."transaction/update/".$data->id }}" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			@if(get_instance()->uri->segment(2)=="show")
			<div class="text-end">
				<a href="{{ base_url() }}" class="btn btn-sm btn-warning">Kembali</a>
			</div>
			@endif
			@include("trans.errors")
			<table class="table" id="table-transaction">
				<tr>
					<td>
						No Transaction : 
						<input type="text" readonly  class="form-control @if(form_error('no_transaction')!=null) is-invalid @endif" id="no_transaction" name="no_transaction" value="@if(set_value("no_transaction")!=null){{ set_value("no_transaction") }}@elseif(isset($data->no_transaction)){{ $data->no_transaction }}@endif" required>
						<label class="text-danger"><?php echo form_error('no_transaction'); ?></label>
					</td>
					<td>
						Transaction Date :
						<input type="date"  class="form-control @if(form_error('transaction_date')!=null) is-invalid @endif" id="transaction_date" name="transaction_date" value="@if(set_value("transaction_date")!=null){{ set_value("transaction_date") }}@elseif(isset($data->transaction_date)){{ $data->transaction_date }}@endif" required>
						<label class="text-danger"><?php echo form_error('transaction_date'); ?></label> 
					</td>
				</tr>
			</table>
			<h3>Detail Item</h3>
			@if(get_instance()->uri->segment(2)=="edit")
			<div class="text-end">
				<button class="btn btn-sm btn-primary" type="button" onclick="goAdd()">Tambah Detail</button>
			</div>
			@endif
			<table class="table" id="table-detail">
				@if(isset($detail) and $detail>=1)
				@foreach($detail as $key => $value)
				<tr>
					<td>
						Item Name : 
						<input type="text"  class="form-control" id="item" name="item[]" value="{{ $value->item }}">
					</td>
					<td>
						Quantity : 
						<input type="number"   class="form-control" id="qty" name="qty[]" value="{{ $value->quantity }}">
					</td>
					<td>
						@if(get_instance()->uri->segment(2)=="edit")
						<button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button>
						@endif
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td>
						Item Name : 
						<input type="text"  class="form-control" id="item" name="item[]" value="">
					</td>
					<td>
						Quantity : 
						<input type="number"   class="form-control" id="qty" name="qty[]" value="">
					</td>
					<td>
						@if(get_instance()->uri->segment(2)=="edit")
						<button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button>
						@endif
					</td>
				</tr>
				@endif
			</table>
		</div>
		@if(get_instance()->uri->segment(2)=="edit")
		<div class="col-md-12 text-end mt-4">
			<button type="submit" class="btn btn-sm btn-success">Simpan</button>
			<a href="{{ base_url() }}" class="btn btn-sm btn-warning">Batal</a>
		</div> 
		@endif
	</div>
</form>

@endsection

@section("script")
<script type="text/javascript">
@if(get_instance()->uri->segment(2)=="edit")
	function goAdd(){
		$("#table-detail").append('<tr><td>Item Name : <input type="text"  class="form-control" id="item" name="item[]" value=""></td><td>Quantity : <input type="number"   class="form-control" id="qty" name="qty[]" value=""></td><td><button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button></td></tr>');
	}
	function goDelete(row)
	{
		row.closest('tr').remove();
	}
@else
$(".form-control").prop("disabled", true );
@endif
</script>
@endsection