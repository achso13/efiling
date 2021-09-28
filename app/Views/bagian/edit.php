<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Update Bagian</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/bagian">Bagian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Bagian</li>
        </ol>
    </nav>
</div>

<!-- Form update -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bagian</h6>
    </div>
    <div class="card-body">
        <form action="/bagian/update/<?= $bagian['id_bagian']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group row mb-4">
                <label for="biro" class="col-sm-2 col-lg-2">Nama Biro <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <select class="custom-select <?= ($validation->hasError('id_biro')) ? 'is-invalid' : ''; ?>" name="biro">
                        <option value="">Pilih Biro</option>
                        <?php foreach ($listBiro as $biro) : ?>
                            <option value="<?= $biro['id_biro']; ?>" <?= $bagian['id_biro'] === $biro['id_biro'] ? 'selected' : ''; ?>><?= $biro['nama_biro'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_biro'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="nama_bagian" class="col-sm-2 col-lg-2">Nama Bagian<span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_bagian')) ? 'is-invalid' : ''; ?>" id="nama_bagian" name="nama_bagian" value="<?= $bagian['nama_bagian']; ?>" placeholder="Tuliskan nama bagian">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_bagian'); ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>