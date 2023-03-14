<div class="container-fluid">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#tab-booking">
				<span class="nav-icon">
					<i class="fa fa-box"></i>
				</span>
				<span class="nav-text">Detail Booking</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#tab-koli">
				<span class="nav-icon">
					<i class="fa fa-eye"></i>
				</span>
				<span class="nav-text">Detail Informasi Koli</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#tab-detail">
				<span class="nav-icon">
					<i class="fa fa-calendar"></i>
				</span>
				<span class="nav-text">Detail History Koli</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#tab-status">
				<span class="nav-icon">
					<i class="fa fa-truck"></i>
				</span>
				<span class="nav-text">Detail Status Booking</span>
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="tab-booking" class="container tab-pane active">
			<h5 class="pt-5">Kode Booking : <?php echo e(strtoupper($data->kode_booking)); ?> </h5>
			<hr>
			<form method="POST" action="<?php echo e(base_url()."bookings/update/".$data->id_bookingorder); ?>" enctype="multipart/form-data" id="form-select">
				<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="row">
					<div class="col-md-3">
						<label>Layanan
							<span class="text-danger">*</span>
						</label>
						<select class="form-control form-disable <?php if(form_error('id_layanan')!=null): ?> is-invalid <?php endif; ?>" id="id_layanan" name="id_layanan" required>
							<option value="">-- Pilih Layanan --</option>
							<?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->id_layanan); ?>"><?php echo e(strtoupper($value->nama_layanan)); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						<label class="text-danger"><?php echo form_error('id_layanan'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Marketing
							<span class="text-danger">*</span>
						</label>
						<select class="form-control form-disable <?php if(form_error('id_user')!=null): ?> is-invalid <?php endif; ?>" id="id_user" name="id_user" required>
							<option value="">-- Pilih Marketing --</option>
							<?php $__currentLoopData = $marketing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->id_user); ?>"><?php echo e(strtoupper($value->nm_karyawan)); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						<label class="text-danger"><?php echo form_error('id_user'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Tgl. Penjemputan
							<span class="text-danger">*</span>
						</label>
						<input type="date"  class="form-control form-disable <?php if(form_error('tgl_jemput')!=null): ?> is-invalid <?php endif; ?>" id="tgl_jemput" name="tgl_jemput" value="<?php if(set_value("tgl_jemput")!=null): ?><?php echo e(set_value("tgl_jemput")); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('tgl_jemput'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Penerima Notifikasi</label><br>
						<label class="form-control-label" for="chkpengirim">
							<input type="checkbox" name="chkpengirim" value="1" id="chkpengirim" class="form-disable" checked=""> Pengirim
						</label>
						<label class="form-control-label ml-5" for="chkpenerima">
							<input type="checkbox" name="chkpenerima" value="1" class="form-disable" id="chkpenerima"> Penerima
						</label>
						<label class="text-danger"><?php echo form_error('chkpengirim'); ?></label>
						<label class="text-danger"><?php echo form_error('chkpenerima'); ?></label>
					</div>
					<div class="col-md-12">
						<label><b> <span><i class="fa fa-user"></i></span> DATA PENGIRIM</b></label>
						<hr>
					</div>
					<div class="col-md-3">
						<label>Nama Pengirim <span class="text-danger">*</span>
						</label>
						<input type="text" minlength="4" maxlength="30" placeholder="masukan nama pengirim"  class="form-control form-disable <?php if(form_error('nm_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nm_pengirim" name="nm_pengirim" value="<?php if(set_value("nm_pengirim")!=null): ?><?php echo e(set_value("nm_pengirim")); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('nm_pengirim'); ?></label>
					</div>
					<div class="col-md-3">
						<label>No. Telp Pengirim <span class="text-danger">*</span>
						</label>
						<input type="number" step="any" minlength="11" maxlength="13" placeholder="masukan telp pengirim"  class="form-control form-disable <?php if(form_error('nohp_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nohp_pengirim" name="nohp_pengirim" value="<?php if(set_value("nohp_pengirim")!=null): ?><?php echo e(set_value("nohp_pengirim")); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('nohp_pengirim'); ?></label>
					</div>
					<div class="col-md-3">
						<label>
							Wilayah <span class="text-danger">*</span>
						</label>
						<select class="form-control form-disable <?php if(form_error('kec_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="kec_pengirim" name="kec_pengirim" required></select>
						<label class="text-danger"><?php echo form_error('kec_pengirim'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Alamat Penjemputan
							<span class="text-danger">*</span>
						</label>
						<textarea style="height: 150px" class="form-control form-disable <?php if(form_error('almt_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="almt_pengirim" name="almt_pengirim" minlength="10" maxlength="50" required><?php if(set_value("almt_pengirim")!=null): ?><?php echo e(set_value("almt_pengirim")); ?><?php elseif(isset($data->alamat_pengirim)): ?><?php echo e($data->alamat_pengirim); ?><?php endif; ?></textarea>
						<label class="text-danger"><?php echo form_error('almt_pengirim'); ?></label>
					</div>
					<div class="col-md-12">
						<label> <b><span><i class="fa fa-users"></i></span> DATA PENERIMA</b> </label>
						<hr>
					</div>
					<div class="col-md-3">
						<label>Nama Penerima
							<span class="text-danger">*</span>
						</label>
						<input type="text" minlength="4" maxlength="30" placeholder="masukan nama penerima"  class="form-control form-disable <?php if(form_error('nm_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nm_penerima" name="nm_penerima" value="<?php if(set_value("nm_penerima")!=null): ?><?php echo e(set_value("nm_penerima")); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('nm_penerima'); ?></label>
					</div>
					<div class="col-md-3">
						<label>No. Telp Penerima
							<span class="text-danger">*</span>
						</label>
						<input type="number" step="any" minlength="11" maxlength="13" placeholder="masukan telp penerima"  class="form-control form-disable <?php if(form_error('nohp_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nohp_penerima" name="nohp_penerima" value="<?php if(set_value("nohp_penerima")!=null): ?><?php echo e(set_value("nohp_penerima")); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('nohp_penerima'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Wilayah
							<span class="text-danger">*</span>
						</label>
						<select class="form-control form-disable <?php if(form_error('kec_penerima')!=null): ?> is-invalid <?php endif; ?>" id="kec_penerima" name="kec_penerima" required></select>
						<label class="text-danger"><?php echo form_error('kec_penerima'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Alamat Penerima
							<span class="text-danger">*</span>
						</label>
						<textarea style="height: 150px" class="form-control form-disable <?php if(form_error('almt_penerima')!=null): ?> is-invalid <?php endif; ?>" id="almt_penerima" name="almt_penerima" minlength="10" maxlength="50" required><?php if(set_value("almt_penerima")!=null): ?><?php echo e(set_value("almt_penerima")); ?><?php elseif(isset($data->alamat_penerima)): ?><?php echo e($data->alamat_penerima); ?><?php endif; ?></textarea>
						<label class="text-danger"><?php echo form_error('almt_penerima'); ?></label>
					</div>
					<div class="col-md-12">
						<label> <b><span><i class="fa fa-box"></i></span> DATA BARANG</b> </label>
						<hr>
					</div>
					<div class="col-md-3">
						<label>Estimasi Berat (Kg)
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" step="any" id="n_brt" name="n_brt" maxlength="30"  class="form-control form-disable <?php if(form_error('n_brt')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg" value="<?php if(set_value("n_brt")!=null): ?><?php echo e(set_value("n_brt")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">Kg</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_brt'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Estimasi Kilo Volume (Kgv)
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" step="any" id="n_vol" name="n_vol" maxlength="30"  class="form-control form-disable <?php if(form_error('n_vol')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Kgv" value="<?php if(set_value("n_vol")!=null): ?><?php echo e(set_value("n_vol")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">Kgv</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Estimasi Kubik (M3)
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" step="any" id="n_kubik" name="n_kubik" maxlength="30"  class="form-control form-disable <?php if(form_error('n_kubik')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 M3" value="<?php if(set_value("n_kubik")!=null): ?><?php echo e(set_value("n_kubik")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">M3</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Jumlah Koli
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" id="n_koli" name="n_koli" maxlength="30"  class="form-control form-disable <?php if(form_error('n_koli')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("n_koli")!=null): ?><?php echo e(set_value("n_koli")); ?><?php endif; ?>" placeholder="100 Koli">
							<div class="input-group-prepend">
								<span class="input-group-text">Koli</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_koli'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Harga
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" id="n_harga" name="n_harga" maxlength="30"  class="form-control form-disable <?php if(form_error('n_harga')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("n_harga")!=null): ?><?php echo e(set_value("n_harga")); ?><?php endif; ?>"  required placeholder="2.500" step="any">
							<div class="input-group-prepend" >
								<span class="input-group-text">Rp.</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_harga'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Harga Lain - Lain
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" id="harga_lain"  name="harga_lain" maxlength="30"  class="form-control form-disable <?php if(form_error('harga_lain')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("harga_lain")!=null): ?><?php echo e(set_value("harga_lain")); ?><?php endif; ?>"  required step="any">
							<div class="input-group-prepend" >
								<span class="input-group-text">Rp.</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('harga_lain'); ?></label>
					</div>
					<div class="col-md-6">
						<label>Cara Hitung
							<span class="text-danger">*</span>
						</label>
						<table class="table table-responsive">
							<tr>
								<td width="20%">
									<label><input type="radio" class="form-disable" value="1" id="c_hitung" name="c_hitung" required> Berat</label>
								</td>
								<td width="20%">
									<label><input type="radio" class="form-disable" value="2" id="c_hitung" name="c_hitung" required> KgV</label>
								</td>
								<td width="20%">
									<label><input type="radio" class="form-disable" value="3" id="c_hitung" name="c_hitung" required> Kubik (M3)</label>
								</td>
								<td width="20%">
									<label><input type="radio" value="4" id="c_hitung" name="c_hitung"> Borongan</label>
								</td>
							</tr>
						</table>
						<label class="text-danger"><?php echo form_error('c_hitung'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Minimal Kirim
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" readonly="readonly" id="n_minimal" name="n_minimal" maxlength="30"  class="form-control form-disable <?php if(form_error('n_minimal')!=null): ?> is-invalid <?php endif; ?>" step="any" required placeholder="50" value="<?php if(set_value("n_minimal")!=null): ?><?php echo e(set_value("n_minimal")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">Kg.</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_minimal'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Jenis Barang
							<span class="text-danger">*</span>
						</label>
						<input type="text" id="jns_barang" name="jns_barang" maxlength="30"  class="form-control form-disable <?php if(form_error('jns_barang')!=null): ?> is-invalid <?php endif; ?>" placeholder="Bahan Makanan" value="<?php if(set_value("jns_barang")!=null): ?><?php echo e(set_value("jns_barang")); ?><?php endif; ?>">
						<label class="text-danger"><?php echo form_error('jns_barang'); ?></label>
					</div>
					<div class="col-md-3">
						<label>Total
							<span class="text-danger">*</span>
						</label>
						<div class="input-group">
							<input type="number" readonly="readonly" id="n_total" name="n_total" maxlength="30"  class="form-control form-disable <?php if(form_error('n_total')!=null): ?> is-invalid <?php endif; ?>" step="any" required placeholder="2.500.000" value="<?php if(set_value("n_total")!=null): ?><?php echo e(set_value("n_total")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp.</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_total'); ?></label>
					</div>
					<div class="col-md-3">
						<label> Asuransi & Packing </label><br>
						<label class="form-control-label" for="asuransi">
							<input type="checkbox" name="asuransi" class="form-disable" value="1" id="asuransi" checked=""> Asuransi
						</label>
						<label class="form-control-label ml-5" for="packing">
							<input type="checkbox" name="packing" class="form-disable" value="1" id="packing"> Packing
						</label>
						<label class="text-danger"><?php echo form_error('asuransi'); ?></label>
						<label class="text-danger"><?php echo form_error('packing'); ?></label>
					</div>
					<div class="col-md-12">
						<label>Keterangan Barang
							<span class="text-danger">*</span>
						</label>
						<textarea class="form-control form-disable <?php if(form_error('keterangan')!=null): ?> is-invalid <?php endif; ?>" id="keterangan" name="keterangan" minlength="5" required maxlength="100" required><?php if(set_value("keterangan")!=null): ?><?php echo e(set_value("keterangan")); ?><?php elseif(isset($data->ket_tambahan)): ?><?php echo e($data->ket_tambahan); ?><?php endif; ?></textarea>
						<label class="text-danger"><?php echo form_error('keterangan'); ?> </label>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" id="btn-save" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Simpan Data">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button type="button" id="btn-batal" onclick="goBatal()" class="btn btn-sm btn-danger mr-2" data-toggle="tooltip" data-placement="top" title="Batal"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</form>
		</div>
		<div id="tab-koli" class="container tab-pane fade">
			<br>
			<table class="table table-hover"> 
				<thead class="thead-dark">
					<tr>
						<th>No. </th>
						<th>Jumlah Koli</th>
						<th>Dimensi [P x L x T] (Cm)</th>
						<th>Berat (Kg)</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($koli)<1): ?>
					<tr>
						<td colspan="6" class="text-center">
							<b>Data Koli Kosong</b>
						</td>
					</tr>
					<?php endif; ?>
					<?php $__currentLoopData = $koli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td><?php echo e($value->jml_koli); ?></td>
						<td><?php echo e($value->panjang."x".$value->lebar."x".$value->tinggi); ?></td>
						<td><?php echo e($value->berat); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<div id="tab-detail" class="container tab-pane fade">
			<br>
			<table class="table table-hover"> 
				<thead class="thead-dark">
					<tr>
						<th>No. </th>
						<th>Koli</th>
						<th>Berat</th>
						<th>Volume</th>
						<th>Kgv</th>
						<th>Status Booking</th>
						<th>Penginput</th>
						<th>Tgl. Input</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($history)<1): ?>
					<tr>
						<td colspan="8" class="text-center">
							<b>Data History Koli Kosong</b>
						</td>
					</tr>
					<?php endif; ?>
					<?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td><?php echo e($value->est_koli); ?></td>
						<td><?php echo e($value->est_berat); ?></td>
						<td><?php echo e($value->est_volume); ?></td>
						<td><?php echo e($value->est_kgv); ?></td>
						<td>
							<?php
							$text = "";
							?>
							<?php if($value->id_bookingstatus==1 or $value->id_bookingstatus==7): ?>
							<?php $text = "label-light-danger";  ?>
							<?php elseif($value->id_bookingstatus==2 or $value->id_bookingstatus==6 or $value->id_bookingstatus==9): ?>
							<?php $text = "label-light-success";  ?>
							<?php elseif($value->id_bookingstatus==3 or $value->id_bookingstatus==5 or $value->id_bookingstatus==8): ?>
							<?php $text = "label-light-info";  ?>
							<?php elseif($value->id_bookingstatus==4 or $value->id_bookingstatus==1 or $value->id_bookingstatus==10): ?>
							<?php $text = "label-light-warning";  ?>
							<?php endif; ?>
							<span class="label font-weight-bold label-lg <?php echo e($text); ?> label-inline"><?php echo e($value->nama_status); ?></span>
						</td>
						<td><?php echo e($value->nm_karyawan); ?></td>
						<th><?php echo e(date("Y-m-d H:i:s", strtotime($value->created_at))); ?></th>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<div id="tab-status" class="container tab-pane fade">
			<br>
			<table class="table table-hover mt-2">
				<thead class="thead-dark">
					<tr>
						<th>No. </th>
						<th>Status Booking</th>
						<th>Penginput Status</th>
						<th>Keterangan</th>
						<th>Tanggal Input</th>
						<th>Foto</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($detail)<1): ?>
					<tr>
						<td colspan="6" class="text-center"><b>Data Kosong</b></td>
					</tr>
					<?php endif; ?>
					<?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td>
							<?php
							$text = "";
							?>
							<?php if($value->id_bookingstatus==0 or $value->id_bookingstatus==1 or $value->id_bookingstatus==7): ?>
							<?php $text = "label-light-danger";  ?>
							<?php elseif($value->id_bookingstatus==2 or $value->id_bookingstatus==6 or $value->id_bookingstatus==9 or $value->id_bookingstatus==11): ?>
							<?php $text = "label-light-success";  ?>
							<?php elseif($value->id_bookingstatus==3 or $value->id_bookingstatus==5 or $value->id_bookingstatus==8): ?>
							<?php $text = "label-light-info";  ?>
							<?php elseif($value->id_bookingstatus==4 or $value->id_bookingstatus==1 or $value->id_bookingstatus==10): ?>
							<?php $text = "label-light-warning";  ?>
							<?php endif; ?>
							<span class="label font-weight-bold label-lg <?php echo e($text); ?> label-inline"><?php echo e($value->nama_status); ?></span>
						</td>
						<td><?php echo e($value->nm_karyawan); ?></td>
						<td><?php echo e($value->keterangan); ?></td>
						<td><?php echo e($value->created_at); ?></td>
						<td>
							<?php if($value->foto != null): ?>
							<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".bd-example-modal-sm" type="button" onclick="goFoto('<?php echo e($value->id_detailstatus); ?>')">
								<i class="fa fa-eye"></i> Lihat Foto
							</button>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tex-center">Detail Foto Bukti Penjemputan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="div-bukti">
					<img src="" style="width: 100px; height: 100px;">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php if(get_instance()->session->userdata('user') != null): ?>
	$("#id_user").val('<?php echo e(get_instance()->session->userdata('user')); ?>');
	<?php endif; ?>

	var today = new Date().toISOString().split('T')[0];
	$("#tgl_jemput").val(today);
	
	$('input[type=radio][name=c_hitung]').change(function() {
		setTarif();
	});
	
	$("#n_harga").on("change", function(e) {
		setTarif();
	});
	
	$("#n_brt").on("change", function(e) {
		setTarif();
	});
	
	$("#n_vol").on("change", function(e) {
		setTarif();
	});
	
	$("#n_kubik").on("change", function(e) {
		setTarif();
	});

	$("#harga_lain").on("change", function(e) {
		setTarif();
	});
	
	function setTarif() {
		var jml = 0;
		var tarif = $("#n_harga").val();
		var c_hitung = $("input[name='c_hitung']:checked").val();
		var lain = $("#harga_lain").val();

		if(c_hitung==1){
			jml = parseFloat($("#n_brt" ).val());
		}else if(c_hitung==2){
			jml = parseFloat($("#n_vol" ).val());
		}else if(c_hitung==3){
			jml = parseFloat($("#n_kubik" ).val());
		}else{
			jml = 1;
		}
		
		if(isNaN(jml)){
			jml = 1;
		}
		
		if(isNaN(tarif)){
			tarif = 0;
		}
		if(isNaN(lain)){
			lain = 0;
		}
		
		console.log(jml);
		console.log(tarif);
		
		var total = parseFloat(jml*tarif);
		var nilai = parseInt(total)+parseInt(lain);
		$("#n_total").val(nilai);
	}
	
	function Rupiah(nilai) {
		var bilangan = nilai;
		var	number_string = bilangan.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
		
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah;
	}

	<?php if(isset($data->id_layanan)): ?>
	$("#id_layanan").val('<?php echo e($data->id_layanan); ?>');
	<?php endif; ?>
	<?php if(isset($data->id_marketing)): ?>
	$("#id_user").val('<?php echo e($data->id_marketing); ?>');
	<?php endif; ?>
	<?php if(isset($data->tgl_jemput)): ?>
	$("#tgl_jemput").val('<?php echo e($data->tgl_jemput); ?>');
	<?php endif; ?>
	<?php if(isset($data->nama_pengirim)): ?>
	$("#nm_pengirim").val('<?php echo e($data->nama_pengirim); ?>');
	<?php endif; ?>
	<?php if(isset($data->hp_pengirim)): ?>
	$("#nohp_pengirim").val('<?php echo e($data->hp_pengirim); ?>');
	<?php endif; ?>
	<?php if(isset($data->nm_penerima)): ?>
	$("#nm_penerima").val('<?php echo e($data->nm_penerima); ?>');
	<?php endif; ?>
	<?php if(isset($data->hp_penerima)): ?>
	$("#nohp_penerima").val('<?php echo e($data->hp_penerima); ?>');
	<?php endif; ?>
	<?php if(isset($data->est_berat)): ?>
	$("#n_brt").val('<?php echo e($data->est_berat); ?>');
	<?php endif; ?>
	<?php if(isset($data->est_koli)): ?>
	$("#n_koli").val('<?php echo e($data->est_koli); ?>');
	<?php endif; ?>
	<?php if(isset($data->est_volume)): ?>
	$("#n_vol").val('<?php echo e($data->est_volume); ?>');
	<?php endif; ?>
	<?php if(isset($data->est_kgv)): ?>
	$("#n_kubik").val('<?php echo e($data->est_kgv); ?>');
	<?php endif; ?>
	<?php if(isset($data->harga)): ?>
	$("#n_harga").val('<?php echo e($data->harga); ?>');
	<?php endif; ?>
	<?php if(isset($data->total_harga)): ?>
	$("#n_total").val('<?php echo e($data->total_harga); ?>');
	<?php endif; ?>
	<?php if(isset($data->n_minimal)): ?>
	$("#n_minimal").val('<?php echo e($data->n_minimal); ?>');
	<?php endif; ?>
	<?php if(isset($data->harga_lain)): ?>
	$("#harga_lain").val('<?php echo e($data->harga_lain); ?>');
	<?php endif; ?>

	<?php if(isset($data->jenis_barang)): ?>
	$("#jns_barang").val('<?php echo e($data->jenis_barang); ?>');
	<?php endif; ?>
	<?php if(isset($data->notif_pengirim) and $data->notif_pengirim==1): ?>
	$("#chkpengirim").prop("checked", true);
	<?php endif; ?>

	<?php if(isset($data->notif_penerima) and $data->notif_penerima==1): ?>
	$("#chkpenerima").prop("checked", true);
	<?php endif; ?>

	<?php if(isset($data->is_add_packing) and $data->is_add_packing=="1"): ?>
	$("#packing").prop("checked", true);
	<?php endif; ?>
	<?php if(isset($data->is_add_asuransi) and $data->is_add_asuransi=="1"): ?>
	$("#asuransi").prop("checked", true);
	<?php endif; ?>
	<?php if(isset($data->jenis_harga)): ?>
	$("input[name=c_hitung][value='<?php echo e($data->jenis_harga); ?>']").attr('checked', 'checked');
	<?php endif; ?>

	<?php if(isset($wil_pengirim->id_wil)): ?>
	$("#kec_pengirim").empty();
	$("#kec_pengirim").append('<option value=' + <?php echo e($wil_pengirim->id_wil); ?> + '>'+"<?php echo e(strtoupper($wil_pengirim->nama_wil)); ?>"+'</option>');
	<?php endif; ?>
	<?php if(isset($wil_penerima->id_wil)): ?>
	$("#kec_penerima").empty();
	$("#kec_penerima").append('<option value=' + <?php echo e($wil_penerima->id_wil); ?> + '>'+"<?php echo e(strtoupper($wil_penerima->nama_wil)); ?>"+'</option>');
	<?php endif; ?>
	goBatal();
	
	function goBatal() {
		$("#btn-save").hide();
		$("#btn-batal").hide();
		$("#btn-edit").show();
		$(".form-disable").attr("disabled", true);
	}
	
	function goFoto(id) {
		$("#modal-foto").modal("show");
		$.ajax({
			url : "<?php echo e(base_url()); ?>bookings/getfoto/"+id,
			method : "GET",
			success :function(data){
				$("#div-bukti").empty();
				$("#div-bukti").append(data);
			},
			error: function(q, w, e) {
				console.log(q.responseText)
			}
		});
	}
</script><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/showpopup.blade.php ENDPATH**/ ?>