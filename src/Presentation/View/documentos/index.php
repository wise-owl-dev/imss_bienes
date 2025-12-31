<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>IMSS Control de Bienes - Documentos</title>
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
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light text-text-main h-screen overflow-hidden flex flex-col">
    <div class="flex h-full w-full">
        <!-- Sidebar -->
        <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full overflow-hidden relative bg-background-light">
            <!-- Header -->
            <?php include __DIR__ . '/../layouts/header.php'; ?>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-8 scroll-smooth">
                <div class="max-w-7xl mx-auto flex flex-col gap-8 pb-10">
                    <!-- Page Header -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-black text-text-main tracking-tight mb-2">Gestión de Documentos</h1>
                            <p class="text-text-secondary">
                                Administre constancias, resguardos y préstamos de bienes institucionales
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <a href="<?= BASE_URL ?>/documentos/crear" class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg text-sm font-bold shadow-md shadow-primary/20 transition-all flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">add</span>
                                Nuevo Documento
                            </a>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <?php if (isset($_GET['success'])): ?>
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-start gap-3">
                        <span class="material-symbols-outlined text-green-600">check_circle</span>
                        <div>
                            <p class="font-medium">Documento generado exitosamente</p>
                            <p class="text-sm">El documento ha sido creado y guardado correctamente.</p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Filters -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 material-symbols-outlined text-xl">search</span>
                                <input 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" 
                                    placeholder="Buscar documentos..." 
                                    type="text"
                                />
                            </div>
                            <select class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">Todos los tipos</option>
                                <option>Constancia de Salida</option>
                                <option>Resguardo Individual</option>
                                <option>Préstamo Temporal</option>
                                <option>Transferencia Interna</option>
                            </select>
                            <select class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">Todos los estados</option>
                                <option>Borrador</option>
                                <option>Completado</option>
                                <option>Cancelado</option>
                            </select>
                            <button class="bg-gray-100 hover:bg-gray-200 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors">
                                Aplicar Filtros
                            </button>
                        </div>
                    </div>

                    <!-- Documents Table -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-xs text-text-secondary uppercase border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4">Folio</th>
                                        <th class="px-6 py-4">Tipo</th>
                                        <th class="px-6 py-4">Trabajador</th>
                                        <th class="px-6 py-4">Fecha</th>
                                        <th class="px-6 py-4">Bienes</th>
                                        <th class="px-6 py-4">Estado</th>
                                        <th class="px-6 py-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    <?php if (empty($documentos)): ?>
                                        <tr>
                                            <td colspan="7" class="px-6 py-12 text-center text-text-secondary">
                                                <div class="flex flex-col items-center gap-3">
                                                    <span class="material-symbols-outlined text-5xl text-gray-300">description</span>
                                                    <p class="text-lg font-medium">No hay documentos registrados</p>
                                                    <p class="text-sm">Comience creando su primer documento</p>
                                                    <a href= "<?= BASE_URL ?>/documentos/crear" class="mt-4 bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg text-sm font-medium transition-all">
                                                        Crear Documento
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($documentos as $documento): ?>
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 font-medium text-primary">
                                                    #<?php echo str_pad($documento->getId(), 6, '0', STR_PAD_LEFT); ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo str_replace('_', ' ', $documento->getTipoDocumento()); ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php 
                                                    // Aquí necesitarías obtener el trabajador
                                                    echo "Trabajador #" . $documento->getTrabajadorId();
                                                    ?>
                                                </td>
                                                <td class="px-6 py-4 text-text-secondary">
                                                    <?php echo $documento->getFechaDocumento()->format('d/m/Y'); ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                                        Ver bienes
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">
                                                        Completado
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex gap-2">
                                                        <a href="/documentos/<?php echo $documento->getId(); ?>" class="text-primary hover:text-primary-dark">
                                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                                        </a>
                                                        <button class="text-blue-600 hover:text-blue-800">
                                                            <span class="material-symbols-outlined text-[20px]">download</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php if (!empty($documentos)): ?>
                        <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center bg-gray-50">
                            <span class="text-sm text-text-secondary">
                                Mostrando <?php echo count($documentos); ?> documentos
                            </span>
                            <div class="flex gap-2">
                                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-white transition-colors text-sm">
                                    Anterior
                                </button>
                                <button class="px-3 py-1 bg-primary text-white rounded hover:bg-primary-dark transition-colors text-sm">
                                    1
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-white transition-colors text-sm">
                                    2
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-white transition-colors text-sm">
                                    Siguiente
                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>