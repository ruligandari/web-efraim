<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Website Kelola Nilai BIMBA AIUEO - <?= $title ?? '' ?></title>
    
    <!-- Google Fonts (Plus Jakarta Sans) -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4e73df',
                    }
                }
            }
        }
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables with Tailwind -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    
    <!-- DataTables Buttons for Export -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background-color: #475569;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-slate-900 text-gray-800 dark:text-gray-200 min-h-screen transition-colors duration-300 font-sans">
    
    <!-- Page Wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-primary dark:bg-slate-950 flex-shrink-0 flex flex-col transition-all duration-300 z-20 shadow-xl">
            <!-- Brand -->
            <div class="h-16 flex items-center justify-center border-b border-white/20 dark:border-slate-800 px-4">
                <div class="text-lg font-bold text-white uppercase tracking-wider text-center">
                    BIMBA AIUEO
                </div>
            </div>

            <!-- Nav Items -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-2">
                <div class="text-xs font-semibold text-blue-200 dark:text-slate-400 uppercase tracking-wider mb-2 px-3">
                    Menu
                </div>

                <a href="<?= base_url('admin/soal') ?>" class="flex items-center px-3 py-2.5 rounded-lg transition-all <?= ($title == 'Data Soal') ? 'bg-white text-primary shadow-md font-bold dark:bg-slate-800 dark:text-blue-400' : 'text-blue-100 hover:bg-white/10 dark:hover:bg-slate-800/50 hover:text-white' ?>">
                    <i class="fas fa-fw fa-tachometer-alt w-6"></i>
                    <span class="font-medium ml-2">Data Soal</span>
                </a>

                <a href="<?= base_url('admin/siswa') ?>" class="flex items-center px-3 py-2.5 rounded-lg transition-all <?= ($title == 'Data Siswa') ? 'bg-white text-primary shadow-md font-bold dark:bg-slate-800 dark:text-blue-400' : 'text-blue-100 hover:bg-white/10 dark:hover:bg-slate-800/50 hover:text-white' ?>">
                    <i class="fas fa-fw fa-users w-6"></i>
                    <span class="font-medium ml-2">Data Siswa</span>
                </a>
            </nav>

            <!-- Bottom Action -->
            <div class="p-4 border-t border-white/20 dark:border-slate-800">
                <button onclick="document.getElementById('logoutModal').classList.remove('hidden')" class="w-full flex items-center px-3 py-2.5 rounded-lg text-red-300 hover:bg-red-500/20 hover:text-red-200 transition-colors">
                    <i class="fas fa-fw fa-sign-out-alt w-6"></i>
                    <span class="font-medium ml-2">Logout</span>
                </button>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden relative z-10">
            <!-- Topbar -->
            <header class="h-16 bg-white dark:bg-slate-800 flex items-center justify-between px-6 z-20 shadow-sm border-b border-gray-200 dark:border-slate-700">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold hidden sm:block text-gray-800 dark:text-white">Website Kelola Nilai</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors focus:outline-none text-gray-500 dark:text-gray-300">
                        <i class="fas fa-moon hidden dark:inline"></i>
                        <i class="fas fa-sun dark:hidden"></i>
                    </button>

                    <!-- User Info -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-200"><?= session()->get('nama') ?></span>
                        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold shadow-sm">
                            <?= strtoupper(substr(session()->get('nama') ?? 'U', 0, 1)) ?>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 relative z-0">
                <?= $this->renderSection('content'); ?>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-slate-800 py-4 text-center text-sm z-20 mt-auto text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-slate-700">
                <span>Copyright &copy; Efraim <?= date('Y') ?></span>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4 transition-opacity">
        <div class="bg-white dark:bg-slate-800 w-full max-w-md rounded-2xl shadow-2xl p-6 transform scale-100 transition-transform relative z-10 border border-gray-100 dark:border-slate-700">
            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Akhiri Sesi?</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Apakah Anda yakin ingin logout dari sistem?</p>
            <div class="flex justify-end space-x-3">
                <button onclick="document.getElementById('logoutModal').classList.add('hidden')" class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors font-medium">Batal</button>
                <a href="<?= base_url('logout') ?>" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-colors shadow-lg shadow-red-500/30 font-medium">Logout</a>
            </div>
        </div>
    </div>

    <!-- Script for Dark Mode -->
    <script>
        const isDark = localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        const html = document.documentElement;
        
        if (isDark) {
            html.classList.add('dark');
        }

        document.getElementById('darkModeToggle').addEventListener('click', () => {
            html.classList.toggle('dark');
            const isDarkMode = html.classList.contains('dark');
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        });

        const logoutModal = document.getElementById('logoutModal');
        logoutModal.addEventListener('click', (e) => {
            if(e.target === logoutModal) {
                logoutModal.classList.add('hidden');
            }
        });
    </script>
    
    <?= $this->renderSection('script'); ?>
</body>
</html>
