

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data
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
              

              <form action="<?php echo e(url('/data-edukasi/add-process')); ?>" method="post" autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Bulan Pengukuran<span class="text-danger">*</span></label>
                      <select class="form-control" name="bulan_ukur" required>
                          <option value="" selected disabled>Pilih</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Nama Balita <span class="text-danger">*</span></label>
                      <select class="form-control select-search" name="balita_id" required>
                        <option value="" selected disabled>Pilih</option>
                        <?php $__currentLoopData = $rs_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_balita); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Pesan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="pesan" required>
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

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg\resources\views/data-edukasi/add.blade.php ENDPATH**/ ?>