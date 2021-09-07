<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Detail Biro</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/biro">Biro</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Biro</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Biro</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Id Biro</td>
                        <td><?= $biro['id_biro']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Biro</td>
                        <td><?= $biro['nama_biro']; ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?= empty($biro['created_at']) ? '(not set)' : $biro['created_at']; ?></td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td><?= empty($biro['updated_at']) ? '(not set)' : $biro['updated_at']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>