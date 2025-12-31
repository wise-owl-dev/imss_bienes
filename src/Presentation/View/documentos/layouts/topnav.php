<!-- TopNavBar -->
    <header class="sticky top-0 z-50 bg-white dark:bg-[#1e2a1e] border-b border-imss-border dark:border-[#2a382a] shadow-sm">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Title -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center size-10 rounded-md bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-3xl">health_and_safety</span>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-lg font-bold leading-tight tracking-tight text-imss-dark dark:text-white">IMSS Control de Bienes</h1>
                        <span class="text-xs font-medium text-imss-gray dark:text-gray-400">Sistema Administrativo</span>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-sm font-medium text-imss-dark hover:text-primary transition-colors dark:text-gray-200 dark:hover:text-primary" href="<?= BASE_URL ?>/documentos">Inicio</a>
                    <a class="text-sm font-medium text-primary border-b-2 border-primary pb-0.5 dark:text-primary" href="<?= BASE_URL ?>/documentos"> Gestión </a>
                    <a class="text-sm font-medium text-imss-dark hover:text-primary transition-colors dark:text-gray-200 dark:hover:text-primary" href="<?= BASE_URL ?>/reportes">Reportes</a>
                    <a class="text-sm font-medium text-imss-dark hover:text-primary transition-colors dark:text-gray-200 dark:hover:text-primary" href="<?= BASE_URL ?>/configuracion">Configuración</a>
                </nav>
                
                <!-- Actions & Profile -->
                <div class="flex items-center gap-4">
                    <button class="flex items-center justify-center size-10 rounded-full hover:bg-imss-border/30 text-imss-dark dark:text-gray-200 transition-colors relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full ring-2 ring-white dark:ring-[#1e2a1e]"></span>
                    </button>
                    <div class="h-8 w-px bg-imss-border dark:bg-gray-700 mx-1"></div>
                    <div class="flex items-center gap-3">
                        <div class="hidden lg:flex flex-col items-end">
                            <span class="text-sm font-bold text-imss-dark dark:text-white">Carlos Méndez</span>
                            <span class="text-xs text-imss-gray dark:text-gray-400">Administrador</span>
                        </div>
                        <div class="size-10 rounded-full bg-primary flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                            CM
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>