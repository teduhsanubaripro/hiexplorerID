<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create Hotels</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= site_url('hotels') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Hotels</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body col-md-6">
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('hotels/store') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" value="<?= old('name') ?>" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('name') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Address *</label>
                <input type="text" name="address" value="<?= old('address') ?>" class="form-control <?= $validation->hasError('address') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('address') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Phone *</label>
                <input type="number" name="phone" value="<?= old('phone') ?>" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('phone') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="text" name="email" value="<?= old('email') ?>" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('email') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Ratings *</label>
                <input type="text" name="rating" value="<?= old('rating') ?>" class="form-control <?= $validation->hasError('rating') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('rating') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Amenities *</label>
                <div class="d-flex flex-wrap">
                    <!-- Menampilkan pilihan ikon untuk amenities hotel -->
                    <label for="icon1" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-bed" class="mr-1">
                        <i class="fa fa-bed" style="font-size: 24px;"></i> Tempat Tidur
                    </label>
                    <label for="icon2" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-wifi" class="mr-1">
                        <i class="fa fa-wifi" style="font-size: 24px;"></i> Wi-Fi
                    </label>
                    <label for="icon3" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-swimmer" class="mr-1">
                        <i class="fa fa-swimmer" style="font-size: 24px;"></i> Kolam Renang
                    </label>
                    <label for="icon4" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-utensils" class="mr-1">
                        <i class="fa fa-utensils" style="font-size: 24px;"></i> Restoran
                    </label>
                    <label for="icon5" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-car" class="mr-1">
                        <i class="fa fa-car" style="font-size: 24px;"></i> Parkir
                    </label>
                    <label for="icon6" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-tv" class="mr-1">
                        <i class="fa fa-tv" style="font-size: 24px;"></i> TV
                    </label>
                    <label for="icon7" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-coffee" class="mr-1">
                        <i class="fa fa-coffee" style="font-size: 24px;"></i> Kafe
                    </label>
                    <label for="icon8" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-spa" class="mr-1">
                        <i class="fa fa-spa" style="font-size: 24px;"></i> Spa
                    </label>
                    <label for="icon9" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-concierge-bell" class="mr-1">
                        <i class="fa fa-concierge-bell" style="font-size: 24px;"></i> Layanan Makan
                    </label>
                    <label for="icon10" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-shower" class="mr-1">
                        <i class="fa fa-shower" style="font-size: 24px;"></i> Shower
                    </label>
                    <label for="icon10" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-hot-tub" class="mr-1">
                        <i class="fa fa-hot-tub" style="font-size: 24px;"></i> Air Hangat
                    </label>
                    <label for="icon11" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-snowflake" class="mr-1">
                        <i class="fa fa-snowflake" style="font-size: 24px;"></i> AC
                    </label>
                </div>
                <?php if ($validation->hasError('amenities')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('amenities') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea style="height: 200px; width: 100%;" name="description" class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>"><?= old('description') ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('description') ?>
                </div>
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