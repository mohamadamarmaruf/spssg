

<?php $__env->startSection('content'); ?>
  <style>
    .form-control:disabled,
    .form-control[readonly] {
      background-color: transparent;
      opacity: 1;
      border: none;
      padding-left: 0;
    }

    label {
      color: black;
      font-weight: bold;
    }


    .form-control:disabled:focus,
    .form-control[readonly]:focus {
      border: none;
      box-shadow: none;
    }
  </style>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Detail Data
                Pengukuran <?php echo e(ucwords($data->nama_balita)); ?>

              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            
          </div>

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="<?php echo e(url('data-balita/pengukuran')); ?>/<?php echo e($data->balita_id); ?>"
                class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2" style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form>
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>NIK </label>
                      <input class="form-control" name="tgl_ukur" value="<?php echo e($data->nik); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Nama </label>
                      <input class="form-control" name="tgl_ukur" value="<?php echo e(ucwords($data->nama_balita)); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Umur (Bulan) </label>
                      <input class="form-control" name="tgl_ukur" value="<?php echo e(ucwords($data->age)); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Tanggal Pengukuran </label>
                      <input class="form-control" name="tgl_ukur"
                        value="<?php echo e(\Carbon\Carbon::parse($data->tgl_ukur)->locale('id_ID')->translatedFormat('d F Y')); ?> "
                        readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Tinggi Badan (cm)</label>
                      <input type="number" step="any" class="form-control" name="tinggi_badan"
                        value="<?php echo e($data->tinggi_badan); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Berat Badan (kg)</label>
                      <input type="number" step="any" class="form-control" name="berat_badan"
                        value="<?php echo e($data->berat_badan); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Kepala (cm)</label>
                      <input type="number" step="any" class="form-control" name="lingkar_kepala"
                        value="<?php echo e($data->lingkar_kepala); ?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Lengan (cm)</label>
                      <input type="number" step="any" class="form-control" name="lingkar_lengan"
                        value="<?php echo e($data->lingkar_lengan); ?>" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Foto </label>
                      <a href="#" class="btn-img-preview btn-outline-secondary btn-sm mt-2"
                        data-img="<?php echo e(url('/img/foto/' . $data->foto_balita)); ?>" data-toggle="modal"
                        data-target="#modal-preview">Lihat foto</a>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Stunting</label>
                      <input class="form-control" value="<?php echo e($data->stunting); ?> " readonly>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg (2)\spssg\resources\views/data-balita/pengukuran/detail.blade.php ENDPATH**/ ?>