<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create Profile &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= site_url('profile') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Profile</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Buat Profile</h4>
        </div>
        <div class="card-body col-md-6">
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('profile/store') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Company *</label>
                <input type="text" name="company" value="<?= old('company') ?>" class="form-control <?= $validation->hasError('company') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('company') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Tagline *</label>
                <input type="text" name="tagline" value="<?= old('tagline') ?>" class="form-control <?= $validation->hasError('tagline') ? 'is-invalid' : null ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tagline') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea name="description" class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>"><?= old('description') ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('description') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control"><?= old('address') ?></textarea>
            </div>
            <div class="form-group">
                <label>Phone *</label>
                <input type="text" name="phone" value="<?= old('phone') ?>" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : null ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('phone') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" value="<?= old('email') ?>" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('email') ?>
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