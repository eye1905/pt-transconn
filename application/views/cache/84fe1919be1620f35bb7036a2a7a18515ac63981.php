

<?php $__env->startSection("content"); ?>

<div class="card card-custom gutter-b">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Tambah Data Booking</h3>
		</div>
		<div class="text-right mt-4">
			<a href="<?php echo e(base_url()); ?>bookings" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Kembali">
				<i class="fas fa-backward"></i> Kembali
			</a>
		</div>
	</div>
	<form method="POST" action="<?php echo e(base_url()); ?>bookings/store" enctype="multipart/form-data" id="form-select">
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="card-body row">
			<div class="col-md-3">
				<label>Layanan
					<span class="text-danger">*</span>
				</label>

				<select class="form-control <?php if(form_error('id_layanan')!=null): ?> is-invalid <?php endif; ?>" id="id_layanan" name="id_layanan" required>
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

				<select class="form-control <?php if(form_error('id_user')!=null): ?> is-invalid <?php endif; ?>" id="id_user" name="id_user" required>
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

				<input type="date"  class="form-control <?php if(form_error('tgl_jemput')!=null): ?> is-invalid <?php endif; ?>" id="tgl_jemput" name="tgl_jemput" value="<?php if(set_value("tgl_jemput")!=null): ?><?php echo e(set_value("tgl_jemput")); ?><?php endif; ?>" required>

				<label class="text-danger"><?php echo form_error('tgl_jemput'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Penerima Notifikasi</label><br>
				<label class="form-control-label" for="chkpengirim"> 
					<input type="checkbox" name="chkpengirim" value="1" id="chkpengirim" checked=""> Pengirim
				</label>

				<label class="form-control-label ml-5" for="chkpenerima">
					<input type="checkbox" name="chkpenerima" value="1" id="chkpenerima"> Penerima
				</label>

				<label class="text-danger"><?php echo form_error('chkpengirim'); ?></label>
				<label class="text-danger"><?php echo form_error('chkpenerima'); ?></label>
			</div>

			<div class="col-md-12">
				<label><b> <span><i class="fa fa-user"></i></span> DATA PENGIRIM</b></label>
				<hr>
			</div>

			<div class="col-md-3">
				<label>Nama Pengirim
					<span class="text-danger">*</span>
				</label>

				<input type="text" minlength="4" maxlength="30" placeholder="masukan nama pengirim"  class="form-control <?php if(form_error('nm_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nm_pengirim" name="nm_pengirim" value="<?php if(set_value("nm_pengirim")!=null): ?><?php echo e(set_value("nm_pengirim")); ?><?php endif; ?>" required>

				<label class="text-danger"><?php echo form_error('nm_pengirim'); ?></label>
			</div>

			<div class="col-md-3">
				<label>No. Telp Pengirim
					<span class="text-danger">*</span>
				</label>

				<input type="number" step="any" minlength="10" maxlength="13" placeholder="masukan telp pengirim"  class="form-control <?php if(form_error('nohp_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nohp_pengirim" name="nohp_pengirim" onKeyPress="if(this.value.length==13) return false;" value="<?php if(set_value("nohp_pengirim")!=null): ?><?php echo e(set_value("nohp_pengirim")); ?><?php endif; ?>" required>

				<label class="text-danger"><?php echo form_error('nohp_pengirim'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Wilayah
					<span class="text-danger">*</span>
				</label>

				<select class="form-control <?php if(form_error('kec_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="wil_asal" name="wil_asal" required></select>

				<label class="text-danger"><?php echo form_error('kec_pengirim'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Alamat Penjemputan
					<span class="text-danger">*</span>
				</label>

				<textarea class="form-control <?php if(form_error('almt_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="almt_pengirim" name="almt_pengirim" minlength="10" required><?php if(set_value("almt_pengirim")!=null): ?><?php echo e(set_value("almt_pengirim")); ?><?php endif; ?></textarea>

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

				<input type="text" minlength="4" maxlength="30" placeholder="masukan nama penerima"  class="form-control <?php if(form_error('nm_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nm_penerima" name="nm_penerima" value="<?php if(set_value("nm_penerima")!=null): ?><?php echo e(set_value("nm_penerima")); ?><?php endif; ?>" required>

				<label class="text-danger"><?php echo form_error('nm_penerima'); ?></label>
			</div>

			<div class="col-md-3">
				<label>No. Telp Penerima
					<span class="text-danger">*</span>
				</label>

				<input type="number" step="any" minlength="10" maxlength="13" placeholder="masukan telp penerima"  class="form-control <?php if(form_error('nohp_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nohp_penerima" name="nohp_penerima" onKeyPress="if(this.value.length==13) return false;" value="<?php if(set_value("nohp_penerima")!=null): ?><?php echo e(set_value("nohp_penerima")); ?><?php endif; ?>" required>

				<label class="text-danger"><?php echo form_error('nohp_penerima'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Wilayah
					<span class="text-danger">*</span>
				</label>

				<select class="form-control <?php if(form_error('kec_penerima')!=null): ?> is-invalid <?php endif; ?>" id="wil_tujuan" name="wil_tujuan" required></select>
				<label class="text-danger"><?php echo form_error('kec_penerima'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Alamat Penerima
					<span class="text-danger">*</span>
				</label>

				<textarea class="form-control <?php if(form_error('almt_penerima')!=null): ?> is-invalid <?php endif; ?>" id="almt_penerima" name="almt_penerima" minlength="10" required><?php if(set_value("almt_penerima")!=null): ?><?php echo e(set_value("almt_penerima")); ?><?php endif; ?></textarea>

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
					<input type="number" step="any" id="n_brt" name="n_brt" maxlength="30"  class="form-control <?php if(form_error('n_brt')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg" value="<?php if(set_value("n_brt")!=null): ?><?php echo e(set_value("n_brt")); ?><?php endif; ?>">
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
					<input type="number" step="any" id="n_vol" name="n_vol" maxlength="30"  class="form-control <?php if(form_error('n_vol')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Kgv" value="<?php if(set_value("n_vol")!=null): ?><?php echo e(set_value("n_vol")); ?><?php endif; ?>">

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
					<input type="number" step="any" id="n_kubik" name="n_kubik" maxlength="30"  class="form-control <?php if(form_error('n_kubik')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 M3" value="<?php if(set_value("n_kubik")!=null): ?><?php echo e(set_value("n_kubik")); ?><?php endif; ?>">

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
					<input type="number" id="n_koli" name="n_koli" maxlength="30"  class="form-control <?php if(form_error('n_koli')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("n_koli")!=null): ?><?php echo e(set_value("n_koli")); ?><?php endif; ?>" placeholder="100 Koli">
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
					<input type="number" id="n_harga" name="n_harga" maxlength="30"  class="form-control <?php if(form_error('n_harga')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("n_harga")!=null): ?><?php echo e(set_value("n_harga")); ?><?php endif; ?>"  required placeholder="2.500" step="any">
					
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
					<input type="number" id="harga_lain" name="harga_lain" maxlength="30"  class="form-control <?php if(form_error('harga_lain')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("harga_lain")!=null): ?><?php echo e(set_value("harga_lain")); ?><?php endif; ?>"  required placeholder="2.500" step="any">
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
							<label><input type="radio" value="1" id="c_hitung" name="c_hitung"> Berat</label>
						</td>
						<td width="20%">
							<label><input type="radio" value="2" id="c_hitung" name="c_hitung"> KgV</label>
						</td>
						<td width="20%">
							<label><input type="radio" value="3" id="c_hitung" name="c_hitung"> Kubik (M3)</label>
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
					<input required placeholder="50" type="number" id="n_minimal" name="n_minimal" maxlength="30"  class="form-control <?php if(form_error('n_minimal')!=null): ?> is-invalid <?php endif; ?>" step="any" value="<?php if(set_value("n_minimal")!=null): ?><?php echo e(set_value("n_minimal")); ?><?php endif; ?>">
					<div class="input-group-prepend">
						<span class="input-group-text">Kg</span>
					</div>
				</div>
				
				<label class="text-danger"><?php echo form_error('n_minimal'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Jenis Barang
					<span class="text-danger">*</span>
				</label>

				<input type="text" id="jns_barang" name="jns_barang" maxlength="30"  class="form-control <?php if(form_error('jns_barang')!=null): ?> is-invalid <?php endif; ?>" placeholder="Bahan Makanan" value="<?php if(set_value("jns_barang")!=null): ?><?php echo e(set_value("jns_barang")); ?><?php endif; ?>">

				<label class="text-danger"><?php echo form_error('jns_barang'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Total
					<span class="text-danger">*</span>
				</label>

				<div class="input-group">
					<input type="number" readonly="readonly" id="n_total" name="n_total" maxlength="30"  class="form-control <?php if(form_error('n_total')!=null): ?> is-invalid <?php endif; ?>" step="any" required placeholder="2.500.000" value="<?php if(set_value("n_total")!=null): ?><?php echo e(set_value("n_total")); ?><?php endif; ?>">

					<div class="input-group-prepend">
						<span class="input-group-text">Rp.</span>
					</div>
				</div>
				
				<label class="text-danger"><?php echo form_error('n_total'); ?></label>
			</div>

			<div class="col-md-3">
				<label> Asuransi & Packing </label><br>
				<label class="form-control-label" for="asuransi">
					<input type="checkbox" name="asuransi" value="1" id="asuransi" checked=""> Asuransi
				</label>

				<label class="form-control-label ml-5" for="packing">
					<input type="checkbox" name="packing" value="1" id="packing"> Packing 
				</label>

				<label class="text-danger"><?php echo form_error('asuransi'); ?></label>
				<label class="text-danger"><?php echo form_error('packing'); ?></label>
			</div>

			<div class="col-md-12">
				<label>Keterangan Barang
					<span class="text-danger">*</span>
				</label>

				<textarea class="form-control <?php if(form_error('keterangan')!=null): ?> is-invalid <?php endif; ?>" id="keterangan" name="keterangan" minlength="5" maxlength="100"><?php if(set_value("keterangan")!=null): ?><?php echo e(set_value("keterangan")); ?><?php endif; ?></textarea>

				<label class="text-danger"><?php echo form_error('keterangan'); ?> </label>
			</div>
		</div>

		<div id="div-hide">
			<input type="hidden" name="kec_pengirim" id="kec_pengirim">
			<input type="hidden" name="text_kec_pengirim" id="text_kec_pengirim">
			<input type="hidden" name="kec_penerima" id="kec_penerima">
			<input type="hidden" name="text_kec_penerima" id="text_kec_penerima">
		</div>

		<div class="card-footer text-right">
			<button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Simpan Data">
				<i class="fa fa-save"></i> Simpan
			</button>
			<a href="<?= base_url() ?>bookings" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Batal"><i class="fa fa-times"></i> Batal</a>
		</div>
	</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("metronic.js-create-booking", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/create-booking.blade.php ENDPATH**/ ?>