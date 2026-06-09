<?= $this->extend('template_tailwind'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Kelola Nilai dan Siswa</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Rekapitulasi skor akhir dari sesi mobile game.</p>
</div>

<!-- Main Card -->
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden mb-8">
    <div class="p-6 border-b border-gray-200 dark:border-slate-700 bg-gray-50/50 dark:bg-slate-800/50">
        <h2 class="text-base font-bold text-gray-800 dark:text-gray-200">Daftar Nilai Siswa</h2>
    </div>
    
    <div class="p-6 overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTableSiswa">
            <thead>
                <tr class="bg-gray-50 dark:bg-slate-700/50">
                    <th class="py-3 px-6 font-semibold text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-slate-600 text-center w-16 text-sm">No</th>
                    <th class="py-3 px-6 font-semibold text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-slate-600 text-sm">Nama Siswa</th>
                    <th class="py-3 px-6 font-semibold text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-slate-600 text-center text-sm">Level</th>
                    <th class="py-3 px-6 font-semibold text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-slate-600 text-center text-sm">Score</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-slate-700">
                <?php $no = 1; foreach ($siswa as $data) : ?>
                <tr class="hover:bg-gray-50/80 dark:hover:bg-slate-700/30 transition-colors">
                    <td class="py-3 px-6 text-center text-gray-500 dark:text-gray-400 text-sm"><?= $no++ ?></td>
                    <td class="py-3 px-6 text-gray-800 dark:text-gray-200 font-semibold text-sm"><?= htmlspecialchars($data['nama'] ?? $data['nama_siswa'] ?? '') ?></td>
                    <td class="py-3 px-6 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            Level <?= htmlspecialchars($data['level'] ?? '-') ?>
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-bold text-sm <?= ($data['score'] ?? 0) >= 70 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-500 dark:text-red-400' ?>">
                            <?= htmlspecialchars($data['score'] ?? $data['nilai'] ?? 0) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataTableSiswa').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            },
            "dom": '<"flex flex-col md:flex-row justify-between items-center mb-4"Bf>rt<"flex flex-col md:flex-row justify-between items-center mt-4"ip>',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel mr-2"></i> Export Excel',
                    className: 'px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors mr-2 text-sm shadow-sm'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf mr-2"></i> Export PDF',
                    className: 'px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors mr-2 text-sm shadow-sm'
                }
            ]
        });
    });
</script>
<?= $this->endSection(); ?>
