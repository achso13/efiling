<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Pegawai</h1>
    <nav aria-label="breadcrumb bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Master Pegawai</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-<?= session()->getFlashdata('color'); ?>" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/pegawai/create" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Biro</th>
                        <th>Bagian</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($listPegawai as $pegawai) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td><?= $pegawai['nip']; ?></td>
                            <td><?= $pegawai['nama_pegawai']; ?></td>
                            <td><?= $pegawai['nama_biro']; ?></td>
                            <td><?= $pegawai['nama_bagian']; ?></td>
                            <td class="text-center text-nowrap">
                                <a href="/pegawai/<?= $pegawai['nip']; ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                                <a href="/pegawai/edit/<?= $pegawai['nip']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/pegawai/<?= $pegawai['nip']; ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>