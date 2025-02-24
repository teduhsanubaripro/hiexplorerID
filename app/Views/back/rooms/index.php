<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Rooms</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Rooms</h1>
        <div class="section-header-button">
            <a href="<?= site_url('rooms/add') ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">x</button>
          <b>Success !</b>
          <?=session()->getFlashdata('success')?>
        </div>
      </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">x</button>
          <b>Error !</b>
          <?=session()->getFlashdata('error')?>
        </div>
      </div>
    <?php endif; ?>

    <div class="section-body">

      <div class="card">
        <div class="card-header">
          <!-- <h4>Data Rent Car</h4> -->
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hotels</th>
                        <th>Room Type</th>
                        <th>Status</th>
                        <th>Amenities</th>
                        <th>Price / Night</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rooms as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>

                            <!-- Menampilkan Hotel -->
                            <td><?= is_array($value) ? $value['hotels'] : $value->hotels ?></td>

                            <!-- Menampilkan Tipe Kamar -->
                            <td><?= is_array($value) ? $value['room_type'] : $value->room_type ?></td>

                            <!-- Menampilkan Status -->
                            <td><?= is_array($value) ? $value['status'] : $value->status ?></td>

                            <!-- Menampilkan Amenities -->
                            <td>
                                <?php 
                                // Menampilkan amenities, jika ada
                                if (is_array($value)) {
                                    $amenities = explode(',', $value['amenities']);
                                } else {
                                    $amenities = explode(',', $value->amenities);
                                }

                                // Menampilkan ikon berdasarkan amenities yang dipilih
                                foreach ($amenities as $amenity) :
                                    ?>
                                    <i class="<?= trim($amenity) ?>" style="font-size: 24px; margin-right: 5px;"></i>
                                <?php endforeach; ?>
                            </td>

                            <!-- Menampilkan Harga per Malam -->
                            <td>
                                <?= 
                                    'Rp. ' . number_format(
                                        is_array($value) ? $value['price_per_night'] : $value->price_per_night, 
                                        2, ',', '.'
                                    ) 
                                ?>
                            </td>

                            <!-- Tombol Edit dan Hapus -->
                            <td class="text-center" style="width:15%">
                                <a href="<?= site_url('rooms/edit/' . (is_array($value) ? $value['room_id'] : $value->room_id)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                <!-- Form Hapus -->
                                <form action="<?= site_url('rooms/delete/' . (is_array($value) ? $value['room_id'] : $value->room_id)) ?>" method="post" class="d-inline" id="del-<?= (is_array($value) ? $value['room_id'] : $value->room_id) ?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?= (is_array($value) ? $value['room_id'] : $value->room_id) ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>

    </div>
  </section>
<?= $this->endSection() ?>