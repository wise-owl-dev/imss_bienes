<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>IMSS Control de Bienes - Dashboard Principal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#247528",
                        "primary-dark": "#1b5e1e",
                        "primary-light": "#e8f5e9",
                        "background-light": "#f8f9fa",
                        "background-dark": "#141e14",
                        "text-main": "#121712",
                        "text-secondary": "#5f6368",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"]
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .icon-filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light text-text-main h-screen overflow-hidden flex flex-col">
    <div class="flex h-full w-full">
        <!-- Sidebar -->
        <?php include __DIR__ . '/layouts/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full overflow-hidden relative bg-background-light">
            <!-- Header -->
            <?php include __DIR__ . '/layouts/header.php'; ?>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-8 scroll-smooth">
                <div class="max-w-7xl mx-auto flex flex-col gap-8 pb-10">
                    <!-- Welcome Section -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-black text-text-main tracking-tight mb-2">Bienvenido, Administrador</h1>
                            <p class="text-text-secondary flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">calendar_today</span>
                                <?php echo date('d \d\e F \d\e Y'); ?>
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <button class="bg-white border border-gray-200 text-text-main hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">help</span>
                                Ayuda
                            </button>
                            <a href="<?= BASE_URL ?>/bienes/crear" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md shadow-primary/20 transition-all flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">add</span>
                                Nuevo Registro
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Total de Bienes -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-primary-light p-2 rounded-lg">
                                    <span class="material-symbols-outlined text-primary">inventory_2</span>
                                </div>
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-full">Activo</span>
                            </div>
                            <p class="text-text-secondary text-sm font-medium mb-1">Total de Bienes</p>
                            <p class="text-3xl font-bold text-text-main"><?php echo number_format($stats['total_bienes']); ?></p>
                        </div>

                        <!-- Préstamos Activos -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-blue-600"></div>
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-blue-50 p-2 rounded-lg">
                                    <span class="material-symbols-outlined text-blue-600">assignment_return</span>
                                </div>
                                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-full">Activos</span>
                            </div>
                            <p class="text-text-secondary text-sm font-medium mb-1">Préstamos Activos</p>
                            <p class="text-3xl font-bold text-text-main"><?php echo number_format($stats['prestamos_activos']); ?></p>
                        </div>

                        <!-- Pendientes -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-orange-500"></div>
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-orange-50 p-2 rounded-lg">
                                    <span class="material-symbols-outlined text-orange-500">ink_pen</span>
                                </div>
                                <span class="bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded-full">Atención</span>
                            </div>
                            <p class="text-text-secondary text-sm font-medium mb-1">Pendientes de Firma</p>
                            <p class="text-3xl font-bold text-text-main"><?php echo number_format($stats['pendientes_firma']); ?></p>
                        </div>

                        <!-- Valor -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-purple-600"></div>
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-purple-50 p-2 rounded-lg">
                                    <span class="material-symbols-outlined text-purple-600">attach_money</span>
                                </div>
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-full">Estable</span>
                            </div>
                            <p class="text-text-secondary text-sm font-medium mb-1">Valor Inventario</p>
                            <p class="text-3xl font-bold text-text-main">$<?php echo $stats['valor_inventario']; ?> <span class="text-sm font-normal text-text-secondary">MXN</span></p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div>
                        <h3 class="text-lg font-bold text-text-main mb-4">Acciones Rápidas</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <a href="<?= BASE_URL ?>/documentos/crear" class="flex flex-col items-center justify-center gap-3 bg-white hover:bg-primary-light border border-gray-200 hover:border-primary/50 rounded-xl p-6 transition-all group text-center h-40">
                                <div class="bg-gray-100 group-hover:bg-white p-3 rounded-full transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-primary text-3xl">post_add</span>
                                </div>
                                <div>
                                    <span class="block text-text-main font-bold group-hover:text-primary transition-colors">Generar Constancia</span>
                                    <span class="text-xs text-text-secondary">Asignación de activos</span>
                                </div>
                            </a>

                            <a href="<?= BASE_URL ?>/documentos/crear" class="flex flex-col items-center justify-center gap-3 bg-white hover:bg-primary-light border border-gray-200 hover:border-primary/50 rounded-xl p-6 transition-all group text-center h-40">
                                <div class="bg-gray-100 group-hover:bg-white p-3 rounded-full transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                                </div>
                                <div>
                                    <span class="block text-text-main font-bold group-hover:text-primary transition-colors">Crear Resguardo</span>
                                    <span class="text-xs text-text-secondary">Vincular a empleado</span>
                                </div>
                            </a>

                            <a href="<?= BASE_URL ?>/documentos/crear" class="flex flex-col items-center justify-center gap-3 bg-white hover:bg-primary-light border border-gray-200 hover:border-primary/50 rounded-xl p-6 transition-all group text-center h-40">
                                <div class="bg-gray-100 group-hover:bg-white p-3 rounded-full transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-primary text-3xl">move_up</span>
                                </div>
                                <div>
                                    <span class="block text-text-main font-bold group-hover:text-primary transition-colors">Emitir Préstamo</span>
                                    <span class="text-xs text-text-secondary">Salida temporal</span>
                                </div>
                            </a>

                            <a href="<?= BASE_URL ?>/bienes/importar" class="flex flex-col items-center justify-center gap-3 bg-white hover:bg-primary-light border border-gray-200 hover:border-primary/50 rounded-xl p-6 transition-all group text-center h-40">
                                <div class="bg-gray-100 group-hover:bg-white p-3 rounded-full transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-primary text-3xl">cloud_upload</span>
                                </div>
                                <div>
                                    <span class="block text-text-main font-bold group-hover:text-primary transition-colors">Carga Masiva</span>
                                    <span class="text-xs text-text-secondary">Importar CSV/Excel</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Movements -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-base font-bold text-text-main">Movimientos Recientes</h3>
                            <a class="text-xs font-semibold text-primary hover:underline" href="<?= BASE_URL ?>/documentos/">Ver todo</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-xs text-text-secondary uppercase">
                                    <tr>
                                        <th class="px-6 py-3">ID</th>
                                        <th class="px-6 py-3">Tipo</th>
                                        <th class="px-6 py-3">Bien</th>
                                        <th class="px-6 py-3">Fecha</th>
                                        <th class="px-6 py-3">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    <?php if (empty($movimientos_recientes)): ?>
                                        <tr>
                                            <td colspan="5" class="px-6 py-8 text-center text-text-secondary">
                                                No hay movimientos recientes
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($movimientos_recientes as $mov): ?>
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 font-medium">#<?php echo $mov['documento']->getId(); ?></td>
                                                <td class="px-6 py-4"><?php echo str_replace('_', ' ', $mov['documento']->getTipoDocumento()); ?></td>
                                                <td class="px-6 py-4 truncate max-w-[200px]">
                                                    <?php echo $mov['bien_principal'] ? $mov['bien_principal']->getDescripcion() : 'N/A'; ?>
                                                </td>
                                                <td class="px-6 py-4 text-text-secondary">
                                                    <?php echo $mov['documento']->getFechaDocumento()->format('d M, H:i'); ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Completado</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>