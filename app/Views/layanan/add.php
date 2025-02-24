<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create Layanan &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= site_url('layanan') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Layanan</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Buat Layanan</h4>
        </div>
        <div class="card-body col-md-6">
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('layanan/store') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" value="<?= old('title') ?>" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('title') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea 
                    name="description" 
                    class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>" 
                    style="height: 200px; width: 100%;"><?= old('description') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('description') ?>
                </div>
            </div>
            <!-- Dropdown Kategori -->
            <div class="form-group">
                <label>Kategori *</label>
                <select name="id_kategori" class="form-control <?= $validation->hasError('id_kategori') ? 'is-invalid' : null ?>">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id_kategori'] ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : '' ?>>
                            <?= $k['title'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('id_kategori') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Speed *</label>
                <input type="text" name="speed" value="<?= old('speed') ?>" class="form-control <?= $validation->hasError('speed') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('speed') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Price *</label>
                <input type="text" name="price" value="<?= old('price') ?>" class="form-control <?= $validation->hasError('price') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('price') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Features *</label>
                <textarea style="height: 200px; width: 100%;" name="features" class="form-control <?= $validation->hasError('features') ? 'is-invalid' : null ?>"><?= old('features') ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('features') ?>
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