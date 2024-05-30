

<?php $__env->startSection('content'); ?>
  <div class="container-xl">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Data Balita
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="<?php echo e(url('data-balita')); ?>" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form action="<?php echo e(url('/data-balita/edit-process')); ?>" method="post" autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <div class="divider divider-dashed">
                    <div class="divider-text">
                      <strong> Data Utama (<span class="text-danger">* wajib diisi</span> )</strong>
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo e($data->id); ?>" required>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nama_balita" value="<?php echo e($data->nama_balita); ?>"
                        required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Jenis Kelamin <span class="text-danger">*</span></label>
                      <select class="form-control select" name="jenis_kelamin" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="0" <?php if($data->jenis_kelamin == '0'): ?> selected <?php endif; ?>>Perempuan</option>
                        <option value="1" <?php if($data->jenis_kelamin == '1'): ?> selected <?php endif; ?>>Laki-laki</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>NIK <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="nik" value="<?php echo e($data->nik); ?>" required>
                    </div>
                    <?php if($user->role != 'user'): ?>
                      <div class="col-md-3 mb-3">
                        <label>No Kartu Keluarga <span class="text-danger">*</span></label>
                        <select class="form-control select-search" name="user_id" required>
                          <option value="" selected disabled>Pilih</option>
                          <?php $__currentLoopData = $rs_no_kk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" <?php if($data->user_id == $user->id): ?> selected <?php endif; ?>>
                              <?php echo e($user->no_kk); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-3 mb-3">
                      <label>Tanggal Lahir <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo e($data->tgl_lahir); ?>"
                        required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Panjang Bayi saat Lahir (cm)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="birth_length"
                        value="<?php echo e($data->birth_length); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Berat Bayi saat Lahir (kg)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="birth_weight"
                        value="<?php echo e($data->birth_weight); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Menyusui <span class="text-danger">*</span></label>
                      <select class="form-control select" name="breastfeeding" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="1" <?php if($data->breastfeeding == '1'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="0" <?php if($data->breastfeeding == '0'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama Orang Tua <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nama_ortu" value="<?php echo e($data->nama_ortu); ?>"
                        required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Kecamatan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="kecamatan" value="<?php echo e($data->kecamatan); ?>"
                        required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Desa <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="desa" value="<?php echo e($data->desa); ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Rt <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="rt" value="<?php echo e($data->rt); ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Rw <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="rw" value="<?php echo e($data->rw); ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Kode Pos <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="kode_pos" value="<?php echo e($data->kode_pos); ?>"
                        required>
                    </div>
                  </div>
                  <div class="divider divider-dashed">
                    <div class="divider-text">
                      <strong>Data Pendukung</strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>JKN BPJS</label>
                      <select class="form-control select" name="jkn_bpjs">
                        <option value="" <?php if($data->jkn_bpjs == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->jkn_bpjs === 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->jkn_bpjs === 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Air Bersih</label>
                      <select class="form-control select" name="air_bersih">
                        <option value="" <?php if($data->air_bersih == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->air_bersih == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->air_bersih == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Jamban Sehat</label>
                      <select class="form-control select" name="jamban_sehat">
                        <option value="" <?php if($data->jamban_sehat == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->jamban_sehat == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->jamban_sehat == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>Imunisasi</label>
                      <select class="form-control select" name="imunisasi">
                        <option value="" <?php if($data->imunisasi == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->imunisasi == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->imunisasi == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Keluarga Merokok</label>
                      <select class="form-control select" name="keluarga_merokok">
                        <option value="" <?php if($data->keluarga_merokok == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->keluarga_merokok == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->keluarga_merokok == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Kecacingan</label>
                      <select class="form-control select" name="kecacingan">
                        <option value="" <?php if($data->kecacingan == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->kecacingan == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->kecacingan == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>Riwayat Kehamilan </label>
                      <select class="form-control select" name="riwayat_kehamilan_ibu">
                        <option value="" <?php if($data->riwayat_kehamilan_ibu == ''): ?> selected <?php endif; ?>>Pilih</option>
                        <option value="Ya" <?php if($data->riwayat_kehamilan_ibu == 'Ya'): ?> selected <?php endif; ?>>Ya</option>
                        <option value="Tidak" <?php if($data->riwayat_kehamilan_ibu == 'Tidak'): ?> selected <?php endif; ?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary btn-sm float-right"> Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg (2)\spssg\resources\views/data-balita/edit.blade.php ENDPATH**/ ?>