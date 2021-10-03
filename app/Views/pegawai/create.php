<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Tambah Pegawai</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
        </ol>
    </nav>
</div>

<!-- Form tambah -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
    </div>
    <div class="card-body">
        <form action="/pegawai/store" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row mb-4">
                <label for="nip" class="col-sm-2 col-lg-2">NIP <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= old('nip'); ?>" placeholder="Tuliskan nip pegawai">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="nama_pegawai" class="col-sm-2 col-lg-2">Nama Pegawai <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>" id="nama_pegawai" name="nama_pegawai" value="<?= old('nama_pegawai'); ?>" placeholder="Tuliskan nama pegawai">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_pegawai'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="password" class="col-sm-2 col-lg-2">Password <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="Tuliskan password pegawai">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="email" class="col-sm-2 col-lg-2">Email <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="Tuliskan email pegawai">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="alamat" class="col-sm-2 col-lg-2">Alamat <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Tuliskan alamat pegawai">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="biro" class="col-sm-2 col-lg-2">Nama Biro <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <select class="custom-select <?= ($validation->hasError('id_biro')) ? 'is-invalid' : ''; ?>" name="biro" id="biro">
                        <option value="">Pilih Biro</option>
                        <?php foreach ($listBiro as $biro) : ?>
                            <option value="<?= $biro['id_biro']; ?>" <?= old('id_biro') == $biro['id_biro'] ? 'selected' : ''; ?>><?= $biro['nama_biro'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_biro'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="nama_bagian" class="col-sm-2 col-lg-2">Nama Bagian <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <select class="custom-select <?= ($validation->hasError('id_bagian')) ? 'is-invalid' : ''; ?>" name="bagian" id="bagian">
                        <option value="">Pilih Bagian</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_bagian'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="role" class="col-sm-2 col-lg-2">Role Pegawai <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="jk1" value="Admin" <?= old('role') == "Admin" ? 'checked' : ''; ?> checked>
                        <label class="form-check-label" for="jk1">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="jk2" value="Pegawai" <?= old('role') == "Pegawai" ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="jk2">
                            Pegawai
                        </label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-sm-2 col-lg-2">Foto</label>
                <div class="col-sm-10 col-lg-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" value="<?= old('foto'); ?>" name="foto">
                        <label class="custom-file-label" for="foto">Pilih foto</label>
                        <div class="invalid-feedback"><?= $validation->getError('foto'); ?></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>