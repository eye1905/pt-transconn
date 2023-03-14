@extends("trans.template")

@section("content")
<h2>Data Transaksi</h2>
<p>Data Transaksi ini adalah detail dari Data utama</p> 
<form method="POST" id="form-transaction" action="{{ base_url()."transaction/store" }}" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			@include("trans.errors")
			<table class="table" id="table-transaction">
				<tr>
					<td>
						No Transaction : 
						<input type="text"  class="form-control @if(form_error('no_transaction')!=null) is-invalid @endif" id="no_transaction" name="no_transaction" value="@if(set_value("no_transaction")!=null){{ set_value("no_transaction") }}@endif" required>
						<label class="text-danger"><?php echo form_error('no_transaction'); ?></label>
					</td>
					<td>
						Transaction Date :
						<input type="date"  class="form-control @if(form_error('transaction_date')!=null) is-invalid @endif" id="transaction_date" name="transaction_date" value="@if(set_value("transaction_date")!=null){{ set_value("transaction_date") }}@endif" required>
						<label class="text-danger"><?php echo form_error('transaction_date'); ?></label> 
					</td>
				</tr>
			</table>
			<h3>Detail Item</h3>
			<div class="text-end">
				<button class="btn btn-sm btn-primary" type="button" onclick="goAdd()">Tambah Detail</button>
			</div>
			<table class="table" id="table-detail">
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
						<button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-12 text-end mt-4">
			<button type="submit" class="btn btn-sm btn-success">Simpan</button>
			<a href="{{ base_url() }}" class="btn btn-sm btn-warning">Batal</a>
		</div> 
	</div>
</form>

@endsection

@section("script")
<script type="text/javascript">
	function goAdd(){
		$("#table-detail").append('<tr><td>Item Name : <input type="text"  class="form-control" id="item" name="item[]" value=""></td><td>Quantity : <input type="number"   class="form-control" id="qty" name="qty[]" value=""></td><td><button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button></td></tr>');
	}

	function goDelete(row)
	{
		row.closest('tr').remove();
	}
</script>
@endsection