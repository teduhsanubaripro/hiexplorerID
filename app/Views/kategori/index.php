<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Kategori &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Kategori</h1>
        <div class="section-header-button">
            <a href="<?= site_url('kategori/add') ?>" class="btn btn-primary">Add New</a>
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
          <h4>Data Profile</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= is_array($value) ? $value['title'] : $value->title ?></td>
                            <td><?= is_array($value) ? $value['description'] : $value->description ?></td>
                            <td>
                              <i class="<?= is_array($value) ? $value['icon'] : $value->icon ?>"></i>
                            </td>
                            <td class="text-center" style="width:15%">
                                <a href="<?= site_url('kategori/edit/' . (is_array($value) ? $value['id_kategori'] : $value->id_kategori)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?=site_url('kategori/delete/'.$value['id_kategori'])?>" method="post" class="d-inline" id="del-<?=$value['id_kategori']?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value['id_kategori']?>)">
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