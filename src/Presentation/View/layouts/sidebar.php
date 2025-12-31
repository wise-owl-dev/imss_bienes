<aside class="w-72 bg-white border-r border-gray-200 flex flex-col h-full shrink-0 hidden lg:flex shadow-sm z-20">
    <div class="p-6 flex flex-col gap-6 h-full">
        <!-- Brand -->
        <div class="flex items-center gap-3 px-2">
            <div class="bg-primary/10 flex items-center justify-center rounded-lg size-10 shrink-0">
                <span class="material-symbols-outlined text-primary" style="font-size: 28px;">health_and_safety</span>
            </div>
            <div class="flex flex-col">
                <h1 class="text-primary text-base font-bold leading-tight">IMSS Control de Bienes</h1>
                <p class="text-text-secondary text-xs font-normal">Panel Administrativo</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col gap-2 flex-1 overflow-y-auto">
            <!-- Dashboard -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg <?php echo ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/dashboard') ? 'bg-primary/10 border-l-4 border-primary' : 'hover:bg-gray-50 text-text-secondary hover:text-text-main'; ?> group transition-colors" href="/imss-bienes">
                <span class="material-symbols-outlined <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'text-primary icon-filled' : 'group-hover:text-primary'; ?>">dashboard</span>
                <span class="text-sm font-semibold <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'text-primary' : ''; ?>">Inicio</span>
            </a>

            <!-- Búsqueda -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/bienes/buscar">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">search</span>
                <span class="text-sm font-medium">Búsqueda de Bienes</span>
            </a>

            <!-- Documentos -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/imss-bienes/documentos">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">folder_open</span>
                <span class="text-sm font-medium">Gestión Documental</span>
            </a>

            <!-- Resguardos -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/documentos/resguardo">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">assignment</span>
                <span class="text-sm font-medium">Préstamos y Resguardos</span>
            </a>

            <!-- Carga Masiva -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/bienes/importar">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">cloud_upload</span>
                <span class="text-sm font-medium">Carga Masiva</span>
            </a>

            <!-- Reportes -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/reportes">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">bar_chart</span>
                <span class="text-sm font-medium">Reportes</span>
            </a>
        </nav>

        <!-- Bottom Actions -->
        <div class="mt-auto border-t border-gray-100 pt-4 flex flex-col gap-2">
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-text-secondary hover:text-text-main group transition-colors" href="/configuracion">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">settings</span>
                <span class="text-sm font-medium">Configuración</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-50 text-text-secondary hover:text-red-700 group transition-colors" href="/logout">
                <span class="material-symbols-outlined group-hover:text-red-600 transition-colors">logout</span>
                <span class="text-sm font-medium">Cerrar Sesión</span>
            </a>
        </div>
    </div>
</aside>