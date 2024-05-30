

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Ubah Data
                Edukasi
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="<?php echo e(url('data-edukasi')); ?>" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form action="<?php echo e(url('/data-edukasi/edit-process')); ?>" method="post" autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" value="<?php echo e($edukasi->id); ?>">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Bulan Pengukuran<span class="text-danger">*</span></label>
                      <select class="form-control" name="bulan_ukur" required>
                          <option value="" selected disabled>Pilih</option>
                          <option value="Januari" <?php if($edukasi->bulan_ukur == "Januari"): ?> selected <?php endif; ?>>Januari</option>
                          <option value="Februari" <?php if($edukasi->bulan_ukur == "Februari"): ?> selected <?php endif; ?>>Februari</option>
                          <option value="Maret" <?php if($edukasi->bulan_ukur == "Maret"): ?> selected <?php endif; ?>>Maret</option>
                          <option value="April" <?php if($edukasi->bulan_ukur == "April"): ?> selected <?php endif; ?>>April</option>
                          <option value="Mei" <?php if($edukasi->bulan_ukur == "Mei"): ?> selected <?php endif; ?>>Mei</option>
                          <option value="Juni" <?php if($edukasi->bulan_ukur == "Juni"): ?> selected <?php endif; ?>>Juni</option>
                          <option value="Juli" <?php if($edukasi->bulan_ukur == "Juli"): ?> selected <?php endif; ?>>Juli</option>
                          <option value="Agustus" <?php if($edukasi->bulan_ukur == "Agustus"): ?> selected <?php endif; ?>>Agustus</option>
                          <option value="September" <?php if($edukasi->bulan_ukur == "September"): ?> selected <?php endif; ?>>September</option>
                          <option value="Oktober" <?php if($edukasi->bulan_ukur == "Oktober"): ?> selected <?php endif; ?>>Oktober</option>
                          <option value="November" <?php if($edukasi->bulan_ukur == "November"): ?> selected <?php endif; ?>>November</option>
                          <option value="Desember" <?php if($edukasi->bulan_ukur == "Desember"): ?> selected <?php endif; ?>>Desember</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Nama Balita <span class="text-danger">*</span></label>
                      <select class="form-control select-search" name="balita_id" required>
                        <option value="" selected disabled>Pilih</option>
                        <?php $__currentLoopData = $rs_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($data->id); ?>"<?php if($data->id === $edukasi->balita_id): ?> selected <?php endif; ?>>
                            <?php echo e($data->nama_balita); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Pesan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="pesan" value="<?php echo e($edukasi->pesan); ?>" required>
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

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\spssg\resources\views/data-edukasi/edit.blade.php ENDPATH**/ ?>