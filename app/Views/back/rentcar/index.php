<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Rent Car</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Rent Car</h1>
        <div class="section-header-button">
            <a href="<?= site_url('rentcar/add') ?>" class="btn btn-primary">Add New</a>
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
                        <th>Car</th>
                        <th>Brand</th>
                        <th>Models</th>
                        <th>Plate</th>
                        <th>Price / Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rentcar as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= is_array($value) ? $value['car_name'] : $value->car_name ?></td>
                            <td><?= is_array($value) ? $value['car_brand'] : $value->car_brand ?></td>
                            <td><?= is_array($value) ? $value['car_model'] : $value->car_model ?></td>
                            <td><?= is_array($value) ? $value['license_plate'] : $value->license_plate ?></td>
                            <td>
                                <?= 
                                    'Rp. ' . number_format(
                                        is_array($value) ? $value['price_per_day'] : $value->price_per_day, 
                                        2, ',', '.'
                                    ) 
                                ?>
                            </td>
                            <td class="text-center" style="width:15%">
                                <a href="<?= site_url('rentcar/edit/' . (is_array($value) ? $value['rent_car_id'] : $value->rent_car_id)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?=site_url('rentcar/delete/'.$value['rent_car_id'])?>" method="post" class="d-inline" id="del-<?=$value['rent_car_id']?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value['rent_car_id']?>)">
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