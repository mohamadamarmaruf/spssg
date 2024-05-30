

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data
                Pengukuran <?php echo e(ucwords($data->nama_balita)); ?>

              </h4>
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="<?php echo e(url('data-balita/pengukuran')); ?>/<?php echo e($id); ?>"
                class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2" style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form action="<?php echo e(url('/data-balita/pengukuran/add-process')); ?>" method="post" enctype="multipart/form-data"
                autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                    <input type="hidden" name="balita_id" value="<?php echo e($id); ?>">
                    <div class="col-md-3 mb-3">
                      <label>Tanggal Pengukuran <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="tgl_ukur" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Umur (bulan)<span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="age" value="<?php echo e(old('age')); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Foto <span class="text-danger"></span></label>
                      <input type="file" class="form-control" name="foto_balita" <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        id="selectImage">
                      <span class="text-danger"><small>Tipe gambar .jpg/ .png/ .jpeg</small></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Tinggi Badan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="tinggi_badan" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Berat Badan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="berat_badan" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Kepala <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_kepala" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Lengan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_lengan" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <img id="preview" src="#" alt="your image" class="mt-3"width="40%"
                        style="display:none;" />
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
    selectImage.onchange = evt => {
      preview = document.getElementById('preview');
      preview.style.display = 'block';
      const [file] = selectImage.files
      if (file) {
        preview.src = URL.createObjectURL(file)
      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg\resources\views/data-balita/pengukuran/add.blade.php ENDPATH**/ ?>