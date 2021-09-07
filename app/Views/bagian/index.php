<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Bagian</h1>
    <nav aria-label="breadcrumb bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bagian</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Master Bagian</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-<?= session()->getFlashdata('color'); ?>" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/bagian/create" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Bagian</th>
                        <th>Nama Biro</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listBagian)) :
                        $no = 1;
                        foreach ($listBagian as $bagian) :
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $bagian['nama_bagian']; ?></td>
                                <td><?= $bagian['nama_biro']; ?></td>
                                <td class="text-center text-nowrap">
                                    <a href="/bagian/<?= $bagian['id_bagian']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                    <a href="/bagian/edit/<?= $bagian['id_bagian']; ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/bagian/<?= $bagian['id_bagian']; ?>" method="post" class="d-inline">
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
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>