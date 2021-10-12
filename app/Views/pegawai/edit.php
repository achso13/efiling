<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<?php var_dump(password_verify("12345", $pegawai['password'])); ?>

<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Edit Pegawai</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pegawai</li>
        </ol>
    </nav>
</div>

<!-- Form edit -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
    </div>
    <div class="card-body">
        <form action="/pegawai/update/<?= $pegawai['nip']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row mb-4">
                <label for="nip" class="col-sm-2 col-lg-2">NIP <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= empty(old('nip')) ? $pegawai['nip'] : old('nip'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="nama_pegawai" class="col-sm-2 col-lg-2">Nama Pegawai <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>" id="nama_pegawai" name="nama_pegawai" value="<?= empty(old('nama_pegawai')) ? $pegawai['nama_pegawai'] : old('nama_pegawai'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_pegawai'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="password" class="col-sm-2 col-lg-2">Password</label>
                <div class="col-sm-10 col-lg-8">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="(Tidak perlu diisi jika tidak ingin diganti)">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="email" class="col-sm-2 col-lg-2">Email <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= empty(old('email')) ? $pegawai['email'] : old('email'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="biro" class="col-sm-2 col-lg-2">Nama Biro <span class="text-danger">*</span></label>
                <div class="col-sm-10 col-lg-8">
                    <select class="custom-select <?= ($validation->hasError('id_biro')) ? 'is-invalid' : ''; ?>" name="biro" id="biro">
                        <option value="">Pilih Biro</option>
                        <?php foreach ($listBiro as $biro) : ?>
                            <?php if (empty(old('biro'))) : ?>
                                <option value="<?= $biro['id_biro']; ?>" <?= $pegawai['id_biro'] === $biro['id_biro'] ? 'selected' : ''; ?>><?= $biro['nama_biro'] ?></option>
                            <?php else : ?>
                                <option value="<?= $biro['id_biro']; ?>" <?= old('biro') === $biro['id_biro'] ? 'selected' : ''; ?>><?= $biro['nama_biro'] ?></option>
                            <?php endif; ?>
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
                        <?php foreach ($listBagian as $bagian) : ?>
                            <?php if (old('biro') !== NULL) : ?>
                                <option value="<?= $bagian['id_bagian'] ?>" <?= old('bagian') === $bagian['id_bagian'] ? 'selected' : ''; ?>><?= $bagian['nama_bagian'] ?></option>
                            <?php else : ?>
                                <option value="<?= $bagian['id_bagian'] ?>" <?= $pegawai['id_bagian'] === $bagian['id_bagian'] ? 'selected' : ''; ?>><?= $bagian['nama_bagian'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
                        <input class="form-check-input" type="radio" name="role" id="jk1" value="Admin" <?= $pegawai['role'] == "Admin" ? 'checked' : ''; ?> checked>
                        <label class="form-check-label" for="jk1">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="jk2" value="Pegawai" <?= $pegawai['role'] == "Pegawai" ? 'checked' : ''; ?>>
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
                <label for="no_telp" class="col-sm-2 col-lg-2">Nomor Telepon/HP</label>
                <div class="col-sm-10 col-lg-8">
                    <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" value="<?= empty(old('no_telp')) ? $pegawai['no_telp'] : old('no_telp'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_telp'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="tgl_lahir" class="col-sm-2 col-lg-2">Tanggal Lahir </label>
                <div class="col-sm-10 col-lg-8">
                    <input class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= empty(old('tgl_lahir')) ? $pegawai['tgl_lahir'] : old('tgl_lahir'); ?>" type="date" name="tgl_lahir">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_lahir'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-sm-2 col-lg-2">Foto</label>
                <div class="col-sm-10 col-lg-8">
                    <div class="custom-file">
                        <input type="hidden" value="<?= $pegawai['foto']; ?>" name="fotoLama">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="inputGroupFile" name="foto">
                        <label class="custom-file-label" for="inputGroupFile">Pilih foto</label>
                        <div class="invalid-feedback"><?= $validation->getError('foto'); ?></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>