<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Vision &mdash; AFNALINK</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?=site_url('vision')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Vision</h1>
    </div>

    <div class="section-body">

      <div class="card">
        <div class="card-header">
          <h4>Edit Vision</h4>
        </div>
        <div class="card-body col-md-6">
          <?php $validation =  \Config\Services::validation(); ?>
          <form action="<?=site_url('vision/update/'.$vision->id_vision)?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Description</label>
                <textarea style="height: 200px; width: 100%;" name="description" class="form-control"><?=$vision->description?></textarea>
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
