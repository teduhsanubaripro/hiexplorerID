<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Rent Car</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?=site_url('rentcar')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Rent Car</h1>
    </div>

    <div class="section-body">

      <div class="card">
        <div class="card-body col-md-6">
          <?php $validation =  \Config\Services::validation(); ?>
          <form action="<?=site_url('rentcar/update/'.$rentcar->rent_car_id)?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Car Name</label>
                <input type="text" name="car_name" value="<?=old('car_name', $rentcar->car_name)?>" class="form-control <?=$validation->hasError('car_name') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Car Brand</label>
                <input type="text" name="car_brand" value="<?=old('car_brand', $rentcar->car_brand)?>" class="form-control <?=$validation->hasError('car_brand') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Car Models</label>
                <input type="text" name="car_model" value="<?=old('car_model', $rentcar->car_model)?>" class="form-control <?=$validation->hasError('car_model') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>License Plate</label>
                <input type="text" name="license_plate" value="<?=old('license_plate', $rentcar->license_plate)?>" class="form-control <?=$validation->hasError('license_plate') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Price / Days</label>
                <input type="number" name="price_per_day" value="<?=old('price_per_day', $rentcar->price_per_day)?>" class="form-control <?=$validation->hasError('price_per_day') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea style="height: 200px; width: 100%;" name="description" class="form-control"><?=$rentcar->description?></textarea>
            </div>
            <div class="form-group">
                <label>Is Available?</label>
                <select name="is_available" class="form-control">
                    <option value="1" <?= old('is_available') == '1' ? 'selected' : '' ?>>Ya</option>
                    <option value="0" <?= old('is_available') == '0' ? 'selected' : '' ?>>Tidak</option>
                </select>
            </div>

            <!-- Menampilkan gambar yang sudah ada -->
            <div class="form-group">
                <label>Existing Images</label>
                <?php if (!empty($rentcar->image_url)): ?>
                    <?php $images = explode(',', $rentcar->image_url); ?>
                    <div>
                        <?php foreach ($images as $image): ?>
                            <img src="<?= base_url('uploads/car/' . trim($image)) ?>" alt="Car Image" width="100" class="mb-2">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Input untuk upload gambar baru -->
            <div class="form-group">
                <label>Upload New Images</label>
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
