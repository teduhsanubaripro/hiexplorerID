<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create Rent Car</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= site_url('rentcar') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Rent Car</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body col-md-6">
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('rentcar/store') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Car Name *</label>
                <input type="text" name="car_name" value="<?= old('car_name') ?>" class="form-control <?= $validation->hasError('car_name') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('car_name') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Car Brand *</label>
                <input type="text" name="car_brand" value="<?= old('car_brand') ?>" class="form-control <?= $validation->hasError('car_brand') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('car_brand') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Car Model *</label>
                <input type="text" name="car_model" value="<?= old('car_model') ?>" class="form-control <?= $validation->hasError('car_model') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('car_model') ?>
                </div>
            </div>
            <div class="form-group">
                <label>License Plate *</label>
                <input type="text" name="license_plate" value="<?= old('license_plate') ?>" class="form-control <?= $validation->hasError('license_plate') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('license_plate') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Price / Days *</label>
                <input type="text" name="price_per_day" value="<?= old('price_per_day') ?>" class="form-control <?= $validation->hasError('price_per_day') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('price_per_day') ?>
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
            <div class="form-group">
                <label>Is Available?</label>
                <select name="is_available" class="form-control">
                    <option value="1" <?= old('is_available') == '1' ? 'selected' : '' ?>>Ya</option>
                    <option value="0" <?= old('is_available') == '0' ? 'selected' : '' ?>>Tidak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Upload Images</label>
                <input type="file" name="image_url[]" class="form-control" multiple>
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