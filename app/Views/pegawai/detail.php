<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Detail Pegawai</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pegawai</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pegawai</h6>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center ">
            <img class="img-detail mx-auto my-3" src="<?= base_url() ?>/uploads/profile_img/<?= $pegawai['foto']; ?>">
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>NIP</td>
                        <td><?= $pegawai['nip']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td><?= $pegawai['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>Biro</td>
                        <td><?= $pegawai['nama_biro']; ?></td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td><?= $pegawai['nama_bagian']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $pegawai['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td><?= $pegawai['role']; ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?= empty($pegawai['created_at']) ? '(not set)' : $pegawai['created_at']; ?></td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td><?= empty($pegawai['updated_at']) ? '(not set)' : $pegawai['updated_at']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>