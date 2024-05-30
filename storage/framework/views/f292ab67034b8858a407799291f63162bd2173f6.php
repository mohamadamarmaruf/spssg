

<?php $__env->startSection('content'); ?>
  <style>
    .form-control:disabled,
    .form-control[readonly] {
      background-color: transparent;
      opacity: 1;
      /* color: black;
                                                                                                              font-weight: bold; */
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
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data User
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data User</span>
              </div>
            </div>
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class=" card" style="border: none">
              <?php if($role == 'super admin'): ?>
                <div class="text-right">
                  <a href="<?php echo e(url('data-user/add')); ?>" class="  mt-3 mb-1 p-0 pl-1 pr-1  btn-sm btn btn-outline-info">
                    Tambah Data <i class="fa-solid fa-plus"></i>
                  </a>
                </div>
                <div class="pt-2 pr-1 pl-1 table-responsive ">
                  <table id="table_id" class="table  table-border table-hover datatable-scroll-y">
                    <thead>
                      <tr class="text-center">
                        <th width="5%">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Role</th>
                        <th class="text-center" width="30%">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $rs_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td></td>
                          <td><?php echo e($data->name); ?> </td>
                          <td><?php echo e($data->username); ?> </td>
                          <td><?php echo e($data->role); ?> </td>
                          <td>
                            <a href="<?php echo e(url('data-user/detail')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-success btn-sm p-0 pl-1 pr-1">Detail</a>
                            <a href="<?php echo e(url('data-user/edit')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-warning btn-sm p-0 pl-1 pr-1">Edit</a>
                            <a href="<?php echo e(url('data-user/password')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-secondary btn-sm p-0 pl-1 pr-1">Ubah Password</a>
                            <a href="<?php echo e(url('data-user/delete')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-danger btn-sm p-0 pl-1 pr-1"
                              onclick="return confirm('Apakah anda ingin menghapus data <?php echo e($data->name); ?> ?')">
                              Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <br />
                </div>
              <?php elseif($role == 'admin'): ?>
                <div class="divider divider-dashed mt-4">
                  <div class="divider-text">
                    <strong> Detail Data <?php echo e($rs_user->nama_posyandu); ?></strong>
                  </div>
                </div>
                <div class="row m-2">
                  <div class="col-md-4 mb-3">
                    <label>Nama</label>
                    <input class="form-control" value="<?php echo e($rs_user->name); ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Nama Posyandu</label>
                    <input class="form-control" value="<?php echo e($rs_user->nama_posyandu); ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Kode Pos</label>
                    <input class="form-control" value="<?php echo e($rs_user->kode_pos); ?>" readonly>
                  </div>
                </div>
                <div class="row m-2">
                  <div class="col-md-4 mb-3">
                    <label>Username </label>
                    <input class="form-control" value="<?php echo e($rs_user->username); ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Role </label>
                    <input class="form-control" value="<?php echo e($rs_user->role); ?>" readonly>
                  </div>
                </div>
              <?php elseif($role == 'user'): ?>
                <div class="divider divider-dashed mt-4">
                  <div class="divider-text">
                    <strong> Detail Data <?php echo e($rs_user->name); ?></strong>
                  </div>
                </div>
                <div class="row m-2">
                  <div class="col-md-3 mb-3">
                    <label>Nama</label>
                    <input class="form-control" value="<?php echo e($rs_user->name); ?>" readonly>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>Username </label>
                    <input class="form-control" value="<?php echo e($rs_user->username); ?>" readonly>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>No Kartu Keluarga </label>
                    <input class="form-control" value="<?php echo e($rs_user->no_kk); ?>" readonly>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>Role </label>
                    <input class="form-control" value="<?php echo e($rs_user->role); ?>" readonly>
                  </div>
                </div>

                <div class="divider divider-dashed mt-4">
                  <div class="divider-text">
                    <strong> List Balita</strong>
                  </div>
                </div>
                <div class="pt-2 pr-1 pl-1 table-responsive ">
                  <table id="table_id" class="table  table-border table-hover datatable-scroll-y">
                    <thead>
                      <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $rs_balita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td></td>
                          <td><?php echo e($data->nama_balita); ?> </td>
                          <td><?php echo e($data->nik); ?> </td>
                          <td><?php echo e($data->tgl_lahir); ?> </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <br />
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      var t = $('#table_id').DataTable({
        columnDefs: [{
          searchable: false,
          orderable: false,
          targets: 0,
        }, ],
        order: [
          [1, 'asc']
        ],
      });

      t.on('order.dt search.dt', function() {
        let i = 1;

        t.cells(null, 0, {
          search: 'applied',
          order: 'applied'
        }).every(function(cell) {
          this.data(i + '.');
          i++;
        });
      }).draw();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg\resources\views/data-user/index.blade.php ENDPATH**/ ?>