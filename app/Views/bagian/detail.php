<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Detail Bagian</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/bagian">Bagian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Bagian</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Bagian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Id Bagian</td>
                        <td><?= $bagian['id_bagian']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Bagian</td>
                        <td><?= $bagian['nama_bagian']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Biro</td>
                        <td><?= $bagian['nama_biro']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>