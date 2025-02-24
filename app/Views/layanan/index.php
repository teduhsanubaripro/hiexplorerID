<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Layanan &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Layanan</h1>
        <div class="section-header-button">
            <a href="<?= site_url('layanan/add') ?>" class="btn btn-primary">Add New</a>
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
          <h4>Data Layanan</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categories</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Speed</th>
                        <th>Price</th>
                        <th>Features</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($layanan as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= is_array($value) ? $value['desc'] : $value->desc ?></td>
                            <td><?= is_array($value) ? $value['title'] : $value->title ?></td>
                            <td><?= is_array($value) ? $value['description'] : $value->description ?></td>
                            <td><?= is_array($value) ? $value['speed'] : $value->speed ?> Mbps</td>
                            <td>
                                <?= 'Rp. ' . number_format(is_array($value) ? $value['price'] : $value->price, 0, ',', '.') ?>
                            </td>
                            <td><?= is_array($value) ? $value['features'] : $value->features ?></td>
                            <td class="text-center" style="width:15%">
                                <a href="<?= site_url('layanan/edit/' . (is_array($value) ? $value['id_layanan_isp'] : $value->id_layanan_isp)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?=site_url('layanan/delete/'.$value['id_layanan_isp'])?>" method="post" class="d-inline" id="del-<?=$value['id_layanan_isp']?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value['id_layanan_isp']?>)">
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