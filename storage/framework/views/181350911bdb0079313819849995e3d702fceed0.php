

<?php $__env->startSection('content'); ?>
  <div class="container-xl">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Balita</h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data Balita</span>
              </div>
            </div>
          </div>
          <!-- notification -->
          <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="col-md-12">
            <div class="card" style="border: none">
              
              <div class="text-right">
                <a href="<?php echo e(url('data-balita/add')); ?>" class=" mt-3 mb-1 p-0 pl-1 pr-1 btn-sm btn btn-outline-info">
                  Tambah Data <i class="fa-solid fa-plus"></i>
                </a>
              </div>
              <div class="pt-2 pr-1 pl-1 table-responsive ">
                <table id="table_id" class="table  table-border table-hover datatable-scroll-y">
                  <thead class="text-center">
                    <tr class="text-center">
                      <th width="5%">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">NIK</th>
                      <th class="text-center">Tanggal Lahir</th>
                      <th class="text-center">RW</th>
                      <th class="text-center" width="30%">Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $rs_balita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td class="text-center"></td>
                        <td><?php echo e(ucwords($data->nama_balita)); ?> </td>
                        <td><?php echo e($data->nik); ?> </td>
                        <td> <?php echo e(\Carbon\Carbon::parse($data->tgl_lahir)->locale('id_ID')->translatedFormat('d F Y')); ?> </td>
                        <td><?php echo e($data->rw); ?> </td>
                        <td class="text-center">
                          <a href="<?php echo e(url('data-balita/pengukuran')); ?>/<?php echo e($data->id); ?>"
                            class="btn btn-outline-secondary btn-sm p-0 pl-1 pr-1">Pengukuran</a>
                          <a href="<?php echo e(url('data-balita/detail')); ?>/<?php echo e($data->id); ?>"
                            class="btn btn-outline-success btn-sm p-0 pl-1 pr-1">Detail</a>
                          <a href="<?php echo e(url('data-balita/edit')); ?>/<?php echo e($data->id); ?>"
                            class="btn btn-outline-warning btn-sm p-0 pl-1 pr-1">Edit</a>
                          <a href="<?php echo e(url('data-balita/delete')); ?>/<?php echo e($data->id); ?>"
                            class="btn btn-outline-danger btn-sm p-0 pl-1 pr-1"
                            onclick="return confirm('Apakah anda ingin menghapus data <?php echo e($data->nama_balita); ?> ?')">
                            Hapus</a>
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

<?php echo $__env->make('layouts_admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\spssg\resources\views/data-balita/index.blade.php ENDPATH**/ ?>