

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Data User
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="text-right">
              <a href="<?php echo e(url('data-user')); ?>" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              

              <form action="<?php echo e(url('/data-user/edit-process')); ?>" method="post" autocomplete="off">
                <div class="card-body">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" value="<?php echo e($data->name); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Jenis Akun<span class="text-danger">*</span></label>
                        <select class="form-select select" id="role" name="role" required>
                          <option value="" selected disabled>Pilih</option>
                          <option value="admin" <?php if($data->role == 'admin'): ?> selected <?php endif; ?>>Admin</option>
                          <option value="user" <?php if($data->role == 'user'): ?> selected <?php endif; ?>>User</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo e($data->username); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>No Kartu Keluarga</label>
                        <input type="text" class="form-control" name="no_kk" value="<?php echo e($data->no_kk); ?>">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Nama Posyandu </label>
                        <input type="text" class="form-control" name="nama_posyandu"
                          value="<?php echo e($data->nama_posyandu); ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Kode Pos </label>
                        <input type="text" class="form-control" name="kode_pos" value="<?php echo e($data->kode_pos); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="ml-auto btn btn-primary float-end btn-sm">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\spssg\resources\views/data-user/edit.blade.php ENDPATH**/ ?>