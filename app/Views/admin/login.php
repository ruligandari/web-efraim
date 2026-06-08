<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Kelola Nilai BIMBA AIUEO - <?= $title ?? 'Login' ?></title>
    
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
    
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        .dark .glass {
            background: rgba(31, 41, 55, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-200 min-h-screen flex items-center justify-center font-sans transition-colors duration-300 relative overflow-hidden">

    <!-- Dark Mode Toggle Absolute Position -->
    <button id="darkModeToggle" class="absolute top-6 right-6 p-3 rounded-full glass hover:bg-white/40 dark:hover:bg-white/10 transition-all z-20">
        <i class="fas fa-moon text-gray-800 dark:text-gray-300 hidden dark:inline"></i>
        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
    </button>

    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                title: "Oops!",
                text: "<?= session()->getFlashdata('error') ?>",
                icon: "error",
                background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
                color: document.documentElement.classList.contains('dark') ? '#fff' : '#374151'
            });
        </script>
    <?php endif ?>

    <div class="container mx-auto px-4 z-10 relative">
        <div class="max-w-md mx-auto">
            <div class="glass rounded-3xl overflow-hidden p-8 sm:p-10">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary/20 dark:bg-primary/40 text-primary dark:text-blue-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                        <i class="fas fa-user-lock text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">BIMBA AIUEO</h1>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">Selamat Datang, Silahkan Login Untuk Melanjutkan!</p>
                </div>

                <form method="POST" action="<?= base_url('auth') ?>" class="space-y-6">
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="username" class="w-full pl-10 pr-4 py-3 bg-gray-50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/10 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all" placeholder="Masukkan Username" required>
                        </div>
                    </div>
                    
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-gray-50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/10 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all" placeholder="Password" required>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-primary hover:bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transform transition hover:-translate-y-0.5">
                        Login
                    </button>
                </form>
                
                <div class="mt-8 text-center text-xs text-gray-500 dark:text-gray-400">
                    Copyright &copy; Efraim <?= date('Y') ?>
                </div>
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
    </script>
</body>
</html>
