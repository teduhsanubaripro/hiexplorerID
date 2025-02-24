<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create Rent Car</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= site_url('rooms') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Rent Car</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body col-md-6">
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('rooms/store') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Hotel</label>
                <select name="hotel_id" class="form-control <?= $validation->hasError('hotel_id') ? 'is-invalid' : '' ?>">
                    <option value="">Select Hotel</option>
                    <?php foreach ($hotels as $hotel): ?>
                        <option value="<?= $hotel['hotel_id'] ?>" <?= old('hotel_id', $hotel['hotel_id']) == $hotel['hotel_id'] ? 'selected' : '' ?>>
                            <?= $hotel['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($validation->hasError('hotel_id')): ?>
                    <div class="invalid-feedback"><?= $validation->getError('hotel_id') ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Roomt Type *</label>
                <input type="text" name="room_type" value="<?= old('room_type') ?>" class="form-control <?= $validation->hasError('room_type') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('room_type') ?>
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
                        <input type="checkbox" name="amenities[]" value="fa fa-restaurant" class="mr-1">
                        <i class="fa fa-restaurant" style="font-size: 24px;"></i> Restoran
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
                        <input type="checkbox" name="amenities[]" value="fa fa-cutlery" class="mr-1">
                        <i class="fa fa-cutlery" style="font-size: 24px;"></i> Layanan Makan
                    </label>
                    <label for="icon10" class="mr-2">
                        <input type="checkbox" name="amenities[]" value="fa fa-paw" class="mr-1">
                        <i class="fa fa-paw" style="font-size: 24px;"></i> Fasilitas Hewan Peliharaan
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
                <label>Price / Night *</label>
                <input type="text" name="price_per_night" value="<?= old('price_per_night') ?>" class="form-control <?= $validation->hasError('price_per_night') ? 'is-invalid' : null ?>" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('price_per_night') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea style="height: 200px; width: 100%;" name="description" class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>"><?= old('description') ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('description') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Status?</label>
                <select name="status" class="form-control">
                    <option value="1" <?= old('status') == '1' ? 'selected' : '' ?>>Available</option>
                    <option value="2" <?= old('status') == '2' ? 'selected' : '' ?>>Booked</option>
                    <option value="3" <?= old('status') == '3' ? 'selected' : '' ?>>Out Of Services</option>
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