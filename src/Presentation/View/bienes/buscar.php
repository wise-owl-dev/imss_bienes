<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>IMSS Control de Bienes - Búsqueda</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#247528",
                        "primary-dark": "#1b5e1e",
                        "background-light": "#f6f8f6",
                        "background-dark": "#141e14",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1e2b1e",
                        "text-main": "#121712",
                        "text-secondary": "#68826a",
                        "border-color": "#dde4dd",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .material-symbols-outlined.filled { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark min-h-screen text-text-main dark:text-white flex flex-col">
    <!-- Top Navigation -->
    <header class="sticky top-0 z-50 w-full bg-surface-light dark:bg-surface-dark border-b border-border-color dark:border-[#2a382a] shadow-sm">
        <div class="px-6 md:px-10 h-16 flex items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center gap-4">
                <div class="size-8 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl">local_hospital</span>
                </div>
                <div>
                    <h1 class="text-primary font-black text-xl tracking-tight leading-none">IMSS</h1>
                    <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Control de Bienes</span>
                </div>
            </div>
            
            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-text-main dark:text-gray-200 text-sm font-medium hover:text-primary transition-colors" href="/">Inicio</a>
                <a class="text-primary text-sm font-bold border-b-2 border-primary py-5" href="/bienes">Bienes</a>
                <a class="text-text-main dark:text-gray-200 text-sm font-medium hover:text-primary transition-colors" href="/reportes">Reportes</a>
                <a class="text-text-main dark:text-gray-200 text-sm font-medium hover:text-primary transition-colors" href="/trabajadores">Usuarios</a>
            </nav>
            
            <!-- User Actions -->
            <div class="flex items-center gap-4">
                <button class="p-2 text-text-secondary hover:text-primary transition-colors relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border border-white"></span>
                </button>
                <div class="h-8 w-[1px] bg-border-color"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-text-main dark:text-white">Admin. Sistema</p>
                        <p class="text-xs text-text-secondary">Admin. General</p>
                    </div>
                    <div class="size-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                        AS
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Layout -->
    <main class="flex-1 w-full max-w-[1440px] mx-auto p-6 md:p-10 flex flex-col gap-6">
        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 text-sm text-text-secondary">
            <a class="hover:text-primary flex items-center gap-1" href="/">
                <span class="material-symbols-outlined text-[18px]">home</span>
                Inicio
            </a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-medium text-primary">Búsqueda de Bienes</span>
        </div>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-start gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            <div>
                <p class="font-medium">Operación exitosa</p>
                <p class="text-sm">El bien ha sido guardado correctamente.</p>
            </div>
        </div>
        <?php endif; ?>

        <!-- Header & Actions -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 pb-2 border-b border-border-color dark:border-[#2a382a]">
            <div class="space-y-1">
                <h2 class="text-3xl font-bold text-text-main dark:text-white tracking-tight">Listado de Bienes</h2>
                <p class="text-text-secondary text-base">Gestione, busque y edite el inventario de activos fijos.</p>
            </div>
            <div class="flex items-center gap-3 w-full lg:w-auto">
                <a href="/bienes/exportar<?php echo !empty($data['searchQuery']) ? '?q=' . urlencode($data['searchQuery']) : ''; ?>" class="flex-1 lg:flex-none h-10 px-4 bg-white dark:bg-surface-dark border border-border-color dark:border-[#2a382a] text-text-main dark:text-white text-sm font-semibold rounded-lg hover:bg-gray-50 dark:hover:bg-[#2a382a] flex items-center justify-center gap-2 transition-all">
                    <span class="material-symbols-outlined">download</span>
                    Exportar
                </a>
                <a href="/bienes/crear" class="flex-1 lg:flex-none h-10 px-5 bg-primary text-white text-sm font-semibold rounded-lg hover:bg-primary-dark flex items-center justify-center gap-2 shadow-sm transition-all hover:shadow-md">
                    <span class="material-symbols-outlined">add</span>
                    Nuevo Registro
                </a>
            </div>
        </div>

        <!-- Search and Filters Container -->
        <form method="GET" action="/bienes" class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-color dark:border-[#2a382a] p-5 space-y-5">
            <!-- Main Search Bar -->
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-text-secondary">search</span>
                </div>
                <input name="q" value="<?php echo htmlspecialchars($data['searchQuery']); ?>" class="block w-full pl-11 pr-4 py-3.5 bg-background-light dark:bg-background-dark border border-border-color dark:border-[#2a382a] rounded-lg text-text-main dark:text-white placeholder-text-secondary focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow sm:text-sm" placeholder="Buscar por ID de activo, nombre, serie o modelo..." type="text"/>
            </div>

            <!-- Advanced Filters Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Filter: Tipo -->
                <div class="relative group">
                    <label class="block text-xs font-semibold text-text-secondary mb-1.5 uppercase tracking-wide">Tipo de Bien</label>
                    <div class="relative">
                        <select name="tipo" class="appearance-none w-full bg-white dark:bg-surface-dark border border-border-color dark:border-[#2a382a] text-text-main dark:text-white text-sm rounded-lg p-2.5 pr-8 focus:ring-1 focus:ring-primary outline-none cursor-pointer">
                            <option value="">Todos los tipos</option>
                            <option value="EQUIPO_MEDICO" <?php echo $data['tipoBien'] === 'EQUIPO_MEDICO' ? 'selected' : ''; ?>>Equipo Médico</option>
                            <option value="MOBILIARIO" <?php echo $data['tipoBien'] === 'MOBILIARIO' ? 'selected' : ''; ?>>Mobiliario</option>
                            <option value="VEHICULOS" <?php echo $data['tipoBien'] === 'VEHICULOS' ? 'selected' : ''; ?>>Vehículos</option>
                            <option value="COMPUTO" <?php echo $data['tipoBien'] === 'COMPUTO' ? 'selected' : ''; ?>>Cómputo</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-text-secondary">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>
                </div>

                <!-- Filter: Estatus -->
                <div class="relative group">
                    <label class="block text-xs font-semibold text-text-secondary mb-1.5 uppercase tracking-wide">Estatus</label>
                    <div class="relative">
                        <select name="estatus" class="appearance-none w-full bg-white dark:bg-surface-dark border border-border-color dark:border-[#2a382a] text-text-main dark:text-white text-sm rounded-lg p-2.5 pr-8 focus:ring-1 focus:ring-primary outline-none cursor-pointer">
                            <option value="">Cualquier estatus</option>
                            <option value="ACTIVO" <?php echo $data['estatus'] === 'ACTIVO' ? 'selected' : ''; ?>>Activo</option>
                            <option value="MANTENIMIENTO" <?php echo $data['estatus'] === 'MANTENIMIENTO' ? 'selected' : ''; ?>>En Mantenimiento</option>
                            <option value="BAJA" <?php echo $data['estatus'] === 'BAJA' ? 'selected' : ''; ?>>Baja</option>
                            <option value="EXTRAVIADO" <?php echo $data['estatus'] === 'EXTRAVIADO' ? 'selected' : ''; ?>>Extraviado</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-text-secondary">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>
                </div>

                <!-- Filter: Ubicación -->
                <div class="relative group">
                    <label class="block text-xs font-semibold text-text-secondary mb-1.5 uppercase tracking-wide">Ubicación</label>
                    <div class="relative">
                        <select name="ubicacion" class="appearance-none w-full bg-white dark:bg-surface-dark border border-border-color dark:border-[#2a382a] text-text-main dark:text-white text-sm rounded-lg p-2.5 pr-8 focus:ring-1 focus:ring-primary outline-none cursor-pointer">
                            <option value="">Todas las áreas</option>
                            <option value="URGENCIAS" <?php echo $data['ubicacion'] === 'URGENCIAS' ? 'selected' : ''; ?>>Urgencias</option>
                            <option value="HOSPITALIZACION" <?php echo $data['ubicacion'] === 'HOSPITALIZACION' ? 'selected' : ''; ?>>Hospitalización Piso 1</option>
                            <option value="QUIROFANOS" <?php echo $data['ubicacion'] === 'QUIROFANOS' ? 'selected' : ''; ?>>Quirófanos</option>
                            <option value="ADMINISTRACION" <?php echo $data['ubicacion'] === 'ADMINISTRACION' ? 'selected' : ''; ?>>Administración</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-text-secondary">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                    </div>
                </div>

                <!-- Filter: Fecha -->
                <div class="relative group">
                    <label class="block text-xs font-semibold text-text-secondary mb-1.5 uppercase tracking-wide">Fecha de Registro</label>
                    <input name="fecha" value="<?php echo htmlspecialchars($data['fechaRegistro']); ?>" class="w-full bg-white dark:bg-surface-dark border border-border-color dark:border-[#2a382a] text-text-main dark:text-white text-sm rounded-lg p-2.5 focus:ring-1 focus:ring-primary outline-none cursor-pointer" type="date"/>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="flex items-center justify-between pt-2">
                <!-- Active Filters Tags -->
                <div class="flex flex-wrap gap-2">
                    <?php if (!empty($data['tipoBien'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary border border-primary/20">
                        Tipo: <?php echo htmlspecialchars($data['tipoBien']); ?>
                        <a href="<?php echo http_build_query(array_diff_key($_GET, array('tipo' => ''))); ?>" class="hover:text-primary-dark">
                            <span class="material-symbols-outlined text-[14px]">close</span>
                        </a>
                    </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($data['ubicacion'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary border border-primary/20">
                        Ubicación: <?php echo htmlspecialchars($data['ubicacion']); ?>
                        <a href="<?php echo http_build_query(array_diff_key($_GET, array('ubicacion' => ''))); ?>" class="hover:text-primary-dark">
                            <span class="material-symbols-outlined text-[14px]">close</span>
                        </a>
                    </span>
                    <?php endif; ?>
                    
                    <?php if ($data['hasFilters']): ?>
                    <a href="/bienes" class="text-xs text-text-secondary hover:text-primary underline px-2">Limpiar filtros</a>
                    <?php endif; ?>
                </div>

                <button type="submit" class="px-4 py-2 bg-primary text-white text-sm font-semibold rounded-lg hover:bg-primary-dark transition-colors">
                    Aplicar Filtros
                </button>
            </div>
        </form>

        <!-- Data Table Container -->
        <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-color dark:border-[#2a382a] overflow-hidden flex flex-col flex-1">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-background-light dark:bg-surface-dark border-b border-border-color dark:border-[#2a382a]">
                        <tr>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider w-[60px]">
                                <input class="rounded border-gray-300 text-primary focus:ring-primary" type="checkbox" id="selectAll"/>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider cursor-pointer hover:text-primary group">
                                <div class="flex items-center gap-1">
                                    ID Activo
                                    <span class="material-symbols-outlined text-[16px] opacity-0 group-hover:opacity-100 transition-opacity">unfold_more</span>
                                </div>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider cursor-pointer hover:text-primary group">
                                <div class="flex items-center gap-1">
                                    Descripción / Nombre
                                    <span class="material-symbols-outlined text-[16px] opacity-0 group-hover:opacity-100 transition-opacity">unfold_more</span>
                                </div>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider cursor-pointer hover:text-primary group hidden md:table-cell">
                                <div class="flex items-center gap-1">
                                    Marca / Modelo
                                    <span class="material-symbols-outlined text-[16px] opacity-0 group-hover:opacity-100 transition-opacity">unfold_more</span>
                                </div>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider cursor-pointer hover:text-primary group hidden lg:table-cell">
                                <div class="flex items-center gap-1">
                                    Serie
                                    <span class="material-symbols-outlined text-[16px] opacity-0 group-hover:opacity-100 transition-opacity">unfold_more</span>
                                </div>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider cursor-pointer hover:text-primary group">
                                <div class="flex items-center gap-1">
                                    Naturaleza
                                    <span class="material-symbols-outlined text-[16px] opacity-0 group-hover:opacity-100 transition-opacity">unfold_more</span>
                                </div>
                            </th>
                            <th class="p-4 text-xs font-bold text-text-secondary uppercase tracking-wider text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-color dark:divide-[#2a382a]">
                        <?php if (empty($data['bienes'])): ?>
                        <tr>
                            <td colspan="7" class="p-12 text-center">
                                <div class="flex flex-col items-center gap-3 text-text-secondary">
                                    <span class="material-symbols-outlined text-5xl">inventory_2</span>
                                    <p class="text-lg font-medium">No se encontraron bienes</p>
                                    <p class="text-sm">Intenta ajustar los filtros o realiza una nueva búsqueda</p>
                                </div>
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($data['bienes'] as $bien): ?>
                        <tr class="hover:bg-gray-50 dark:hover:bg-[#223022] transition-colors group">
                            <td class="p-4">
                                <input class="rounded border-gray-300 text-primary focus:ring-primary row-checkbox" type="checkbox"/>
                            </td>
                            <td class="p-4 text-sm font-medium text-text-main dark:text-white">
                                <?php echo htmlspecialchars($bien->getIdentificacionNumero() ?: $bien->getId()); ?>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="size-10 rounded bg-gray-100 dark:bg-gray-800 flex-shrink-0 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-text-secondary">inventory_2</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-text-main dark:text-white">
                                            <?php echo htmlspecialchars($bien->getDescripcion()); ?>
                                        </p>
                                        <?php if ($bien->getSerie()): ?>
                                        <p class="text-xs text-text-secondary">
                                            Serie: <?php echo htmlspecialchars($bien->getSerie()); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-sm text-text-secondary hidden md:table-cell">
                                <?php echo htmlspecialchars($bien->getMarca() . ' ' . $bien->getModelo()); ?>
                            </td>
                            <td class="p-4 text-sm text-text-secondary hidden lg:table-cell">
                                <?php echo htmlspecialchars($bien->getSerie() ?: '-'); ?>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $bien->getNaturaleza() === 'BMC' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'; ?>">
                                    <?php echo htmlspecialchars($bien->getNaturaleza()); ?>
                                </span>
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="/bienes/<?php echo $bien->getId(); ?>" class="p-1.5 text-text-secondary hover:text-primary hover:bg-primary/10 rounded transition-colors" title="Ver detalles">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </a>
                                    <a href="/bienes/<?php echo $bien->getId(); ?>/editar" class="p-1.5 text-text-secondary hover:text-blue-600 hover:bg-blue-50 rounded transition-colors" title="Editar">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="p-4 bg-surface-light dark:bg-surface-dark border-t border-border-color dark:border-[#2a382a] flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-text-secondary">
                    Mostrando <span class="font-medium text-text-main dark:text-white"><?php echo $data['showingFrom']; ?></span> 
                    a <span class="font-medium text-text-main dark:text-white"><?php echo $data['showingTo']; ?></span> 
                    de <span class="font-medium text-text-main dark:text-white"><?php echo $data['totalBienes']; ?></span> registros
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-text-secondary mr-2">Filas por pág:</span>
                    <select onchange="location.href='?<?php echo http_build_query(array_merge($_GET, array('per_page' => ''))); ?>&per_page=' + this.value" class="form-select bg-background-light dark:bg-background-dark border border-border-color dark:border-[#2a382a] text-sm rounded py-1 pl-2 pr-8 focus:ring-primary focus:border-primary">
                        <option value="10" <?php echo $data['perPage'] == 10 ? 'selected' : ''; ?>>10</option>
                        <option value="25" <?php echo $data['perPage'] == 25 ? 'selected' : ''; ?>>25</option>
                        <option value="50" <?php echo $data['perPage'] == 50 ? 'selected' : ''; ?>>50</option>
                        <option value="100" <?php echo $data['perPage'] == 100 ? 'selected' : ''; ?>>100</option>
                    </select>
                    <div class="flex items-center ml-4 border rounded border-border-color dark:border-[#2a382a] bg-white dark:bg-background-dark">
                        <a href="?<?php echo http_build_query(array_merge($_GET, array('page' => max(1, $data['page'] - 1)))); ?>" 
                           class="p-1.5 hover:bg-gray-100 dark:hover:bg-[#223022] text-text-secondary <?php echo $data['page'] <= 1 ? 'opacity-50 pointer-events-none' : ''; ?>">
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </a>
                        <a href="?<?php echo http_build_query(array_merge($_GET, array('page' => min($data['totalPages'], $data['page'] + 1)))); ?>" 
                           class="p-1.5 hover:bg-gray-100 dark:hover:bg-[#223022] text-text-secondary border-l border-border-color dark:border-[#2a382a] <?php echo $data['page'] >= $data['totalPages'] ? 'opacity-50 pointer-events-none' : ''; ?>">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-auto py-6 border-t border-border-color dark:border-[#2a382a] bg-white dark:bg-surface-dark">
        <div class="max-w-[1440px] mx-auto px-6 text-center text-xs text-text-secondary">
            <p>© 2024 Instituto Mexicano del Seguro Social. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        // Select all checkboxes
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>
</html>