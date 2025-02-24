<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Hotels</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Hotels</h1>
        <div class="section-header-button">
            <a href="<?= site_url('hotels/add') ?>" class="btn btn-primary">Add New</a>
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
        <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hotels</th>
                        <th>Address</th>
                        <th>Ratings</th>
                        <th>Amenities</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= is_array($value) ? $value['name'] : $value->name ?></td>
                            <td><?= is_array($value) ? $value['address'] : $value->address ?></td>
                            <td><?= is_array($value) ? $value['rating'] : $value->rating ?></td>
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
                            <td class="text-center" style="width:15%">
                                <a href="<?= site_url('hotels/edit/' . (is_array($value) ? $value['hotel_id'] : $value->hotel_id)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?=site_url('hotels/delete/'.$value['hotel_id'])?>" method="post" class="d-inline" id="del-<?=$value['hotel_id']?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value['hotel_id']?>)">
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