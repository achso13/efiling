<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Biro</h1>
    <nav aria-label="breadcrumb bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Biro</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Master Biro</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-<?= session()->getFlashdata('color'); ?>" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/biro/create" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Biro</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($listBiro as $biro) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td><?= $biro['nama_biro']; ?></td>
                            <td class="text-center text-nowrap">
                                <a href="/biro/<?= $biro['id_biro']; ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                                <a href="/biro/edit/<?= $biro['id_biro']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/biro/<?= $biro['id_biro']; ?>" method="post" class="d-inline">
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