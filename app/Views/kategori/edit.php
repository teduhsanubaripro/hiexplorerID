<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Kategori &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?=site_url('kategori')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Kategori</h1>
    </div>

    <div class="section-body">

      <div class="card">
        <div class="card-header">
          <h4>Edit Kategori</h4>
        </div>
        <div class="card-body col-md-6">
          <?php $validation =  \Config\Services::validation(); ?>
          <form action="<?=site_url('kategori/update/'.$kategori->id_kategori)?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" value="<?=old('title', $kategori->title)?>" class="form-control <?=$validation->hasError('title') ? 'is-invalid' : null?>">
                <div class="invalid-feedback">
                  <?=$validation->getError('title')?>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea style="height: 200px; width: 100%;" name="description" class="form-control"><?=$kategori->description?></textarea>
            </div>
            <div class="form-group">
                <label>Icon *</label>
                <input type="text" name="icon" value="<?=old('icon', $kategori->icon)?>" class="form-control <?=$validation->hasError('icon') ? 'is-invalid' : null?>">
                <div class="invalid-feedback">
                  <?=$validation->getError('icon')?>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
<?= $this->endSection() ?>
