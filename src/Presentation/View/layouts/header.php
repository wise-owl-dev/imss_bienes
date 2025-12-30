<header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shrink-0 shadow-sm z-10">
    <!-- Mobile Menu -->
    <div class="flex items-center gap-4 lg:hidden">
        <button class="p-2 -ml-2 text-text-secondary hover:text-primary">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <span class="text-lg font-bold text-primary">IMSS Bienes</span>
    </div>

    <!-- Breadcrumb / Title -->
    <div class="hidden lg:flex flex-col">
        <h2 class="text-xl font-bold text-text-main">Dashboard Principal</h2>
        <div class="text-xs text-text-secondary breadcrumbs flex gap-1 items-center">
            <span>Sistema</span>
            <span class="material-symbols-outlined text-[10px]">chevron_right</span>
            <span class="text-primary font-medium">Inicio</span>
        </div>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-6">
        <!-- Search Bar -->
        <div class="relative hidden md:block w-96">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 material-symbols-outlined text-xl">search</span>
            <input 
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400 text-text-main" 
                placeholder="Buscar por No. de Inventario, Serie o Empleado..." 
                type="text"
            />
        </div>

        <!-- Notification -->
        <button class="relative p-2 text-text-secondary hover:bg-gray-100 rounded-full transition-colors">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>

        <!-- User Profile -->
        <div class="flex items-center gap-3 border-l pl-6 border-gray-200">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-text-main leading-none">Admin. General</p>
                <p class="text-xs text-text-secondary mt-1">Sistema IMSS</p>
            </div>
            <div class="size-10 rounded-full bg-primary flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                A
            </div>
            <span class="material-symbols-outlined text-gray-400 text-sm cursor-pointer">expand_more</span>
        </div>
    </div>
</header>