<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Hotels &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?=site_url('hotels')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Hotels</h1>
    </div>

    <div class="section-body">

      <div class="card">
        <div class="card-header">
          <h4>Edit Hotels</h4>
        </div>
        <div class="card-body col-md-6">
          <?php $validation =  \Config\Services::validation(); ?>
          <form action="<?=site_url('hotels/update/'.$hotels->hotel_id)?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Hotels Name</label>
                <input type="text" name="name" value="<?=old('name', $hotels->name)?>" class="form-control <?=$validation->hasError('name') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea style="height: 200px; width: 100%;" name="address" class="form-control"><?=$hotels->address?></textarea>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" value="<?=old('phone', $hotels->phone)?>" class="form-control <?=$validation->hasError('phone') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?=old('email', $hotels->email)?>" class="form-control <?=$validation->hasError('email') ? 'is-invalid' : null?>">
            </div>
            <div class="form-group">
                <label>Ratings</label>
                <input type="text" name="rating" value="<?=old('rating', $hotels->rating)?>" class="form-control <?=$validation->hasError('rating') ? 'is-invalid' : null?>">
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
