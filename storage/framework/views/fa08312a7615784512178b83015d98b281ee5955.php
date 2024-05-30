

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Data
                Pengukuran
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="<?php echo e(url('data-balita/pengukuran')); ?>/<?php echo e($data->balita_id); ?>"
                class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2" style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form action="<?php echo e(url('/data-balita/pengukuran/edit-process')); ?>" method="post"
                enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                  <input type="hidden" name="balita_id" value="<?php echo e($data->balita_id); ?>">
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Tanggal Pengukuran <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="tgl_ukur" value="<?php echo e($data->tgl_ukur); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Umur (bulan)<span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="age" value="<?php echo e($data->age); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Foto <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="foto_balita" id="selectImage">
                      <a href="#" class="btn-img-preview btn-outline-secondary btn-sm mt-2"
                        data-img="<?php echo e(url('/img/foto/' . $data->foto_balita)); ?>" data-toggle="modal"
                        data-target="#modal-preview">Lihat foto</a>
                      <span class="text-danger"><small>Tipe gambar .jpg/ .png/ .jpeg</small></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Tinggi Badan (cm)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="tinggi_badan"
                        value="<?php echo e($data->tinggi_badan); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Berat Badan (kg)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="berat_badan"
                        value="<?php echo e($data->berat_badan); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Kepala (cm)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_kepala"
                        value="<?php echo e($data->lingkar_kepala); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Lengan (cm)<span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_lengan"
                        value="<?php echo e($data->lingkar_lengan); ?>" required>
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

  
  <!-- modal preview img -->
  <div class="modal fade text-left modal-borderless" id="modal-preview" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-12 text-center">
              <img src="" alt="img_preview" id="img-preview" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // img preview
    $(document).on('click', '.btn-img-preview', function() {
      var imgSrc = $(this).data('img');
      $('#img-preview').attr('src', imgSrc);
    });

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

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\spssg\resources\views/data-balita/pengukuran/edit.blade.php ENDPATH**/ ?>