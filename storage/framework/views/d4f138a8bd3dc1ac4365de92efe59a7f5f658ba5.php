

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Pengukuran
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data Pengukuran</span>
              </div>
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
              <div class="text-right">
                <a href="<?php echo e(url('data-balita/pengukuran/add')); ?>/<?php echo e($id); ?>"
                  class=" mt-3 mb-1 p-0 pl-1 pr-1 btn-sm btn btn-outline-info">
                  Tambah Data <i class="fa-solid fa-plus"></i>
                </a>
              </div>
              <div class="pt-2 pr-1 pl-1 table-responsive ">
                <table id="table_id" class="table  table-border table-hover datatable-scroll-y">
                  <thead>
                    <tr class="text-center">
                      <th class="text-center" width="5%">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">NIK</th>
                      <th class="text-center">Tanggal Pengukuran</th>
                      <th class="text-center">Resiko Stunting</th>
                      <th class="text-center" width="20%">Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $rs_ukur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td></td>
                        <td><?php echo e(ucwords($data->nama_balita)); ?> </td>
                        <td><?php echo e($data->nik); ?> </td>
                        <td><?php echo e(\Carbon\Carbon::parse($data->tgl_ukur)->locale('id_ID')->translatedFormat('d F Y')); ?> </td>
                        <td><?php echo e($data->stunting); ?> </td>
                        <td class="text-center">
                          <a href="<?php echo e(url('data-balita/pengukuran/detail')); ?>/<?php echo e($data->id); ?>"
                            class="btn btn-outline-success btn-sm p-0 pl-1 pr-1">Detail</a>
                          <?php if($role != 'user'): ?>
                            <a href="<?php echo e(url('data-balita/pengukuran/edit')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-warning btn-sm p-0 pl-1 pr-1">Edit</a>
                            <a href="<?php echo e(url('data-balita/pengukuran/delete')); ?>/<?php echo e($data->id); ?>"
                              class="btn btn-outline-danger btn-sm p-0 pl-1 pr-1"
                              onclick="return confirm('Apakah anda ingin menghapus data <?php echo e($data->nama_balita); ?> ?')">
                              Hapus</a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <br />
              </div>
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

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg (2)\spssg\resources\views/data-balita/pengukuran/index.blade.php ENDPATH**/ ?>