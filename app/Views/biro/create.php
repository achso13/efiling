<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Tambah Biro</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/biro">Biro</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Biro</li>
        </ol>
    </nav>
</div>

<!-- Form tambah -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biro</h6>
    </div>
    <div class="card-body">
        <form action="/biro/store" method="post">
            <?= csrf_field(); ?>
            <div class="form-group row mb-4">
                <label class="col-sm-2 col-lg-2">Nama Biro<span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_biro')) ? 'is-invalid' : ''; ?>" id="nama_biro" name="nama_biro" value="<?= old('nama_biro'); ?>" placeholder="Tuliskan nama biro">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_biro'); ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>