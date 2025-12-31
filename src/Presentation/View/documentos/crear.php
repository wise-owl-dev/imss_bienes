<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>IMSS Control de Bienes - Generación de Documentos</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans:wght@400;500;700&display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#247528",
                        "primary-dark": "#1b5e1e",
                        "background-light": "#f6f8f6",
                        "background-dark": "#141e14",
                        "imss-gray": "#68826a",
                        "imss-dark": "#121712",
                        "imss-border": "#dde4dd",
                    },
                    fontFamily: {
                        "display": ["Inter", "Noto Sans", "sans-serif"],
                        "body": ["Inter", "Noto Sans", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for table */
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-imss-dark dark:text-white font-display antialiased overflow-x-hidden flex flex-col min-h-screen">
    <!-- Topnav -->
    <?php include __DIR__ . '/layouts/topnav.php'; ?>

    <!-- Main Content Wrapper -->
    <main class="flex-grow w-full max-w-[1200px] mx-auto px-4 sm:px-6 py-6 pb-24">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" class="flex mb-6">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a class="inline-flex items-center text-sm font-medium text-imss-gray hover:text-primary dark:text-gray-400" href= "<?= BASE_URL ?>/">
                        <span class="material-symbols-outlined text-[18px] mr-1">home</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-imss-gray text-lg mx-1">chevron_right</span>
                        <a class="text-sm font-medium text-imss-gray hover:text-primary dark:text-gray-400" href="/documentos">Gestión de Bienes</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-imss-gray text-lg mx-1">chevron_right</span>
                        <span class="text-sm font-medium text-primary">Nuevo Documento</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold text-imss-dark dark:text-white tracking-tight">Generación de Documentos</h2>
                <p class="mt-2 text-imss-gray dark:text-gray-400 max-w-2xl">Complete el formulario para emitir constancias de salida, resguardos o préstamos de bienes institucionales.</p>
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-primary bg-white border border-imss-border rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-gray-800 dark:border-gray-700 dark:text-green-400 dark:hover:bg-gray-700">
                    <span class="material-symbols-outlined text-lg mr-2">help</span>
                    Guía de Usuario
                </button>
            </div>
        </div>

        <!-- Error/Success Messages -->
        <?php if (isset($_SESSION['error'])): ?>
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 flex items-start gap-3">
            <span class="material-symbols-outlined text-red-600">error</span>
            <div>
                <p class="font-medium">Error</p>
                <p class="text-sm"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <!-- Sticky Form Navigation (Tabs as Anchors) -->
        <div class="sticky top-[65px] z-40 bg-background-light dark:bg-background-dark pt-2 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0">
            <div class="flex overflow-x-auto gap-8 border-b border-imss-border dark:border-gray-700 no-scrollbar">
                <a class="whitespace-nowrap pb-3 border-b-2 border-primary text-primary font-bold text-sm flex items-center gap-2" href="#general">
                    <span class="flex items-center justify-center size-6 rounded-full bg-primary text-white text-xs">1</span>
                    Datos Generales
                </a>
                <a class="whitespace-nowrap pb-3 border-b-2 border-transparent text-imss-gray hover:text-imss-dark hover:border-gray-300 font-medium text-sm flex items-center gap-2 dark:text-gray-400 dark:hover:text-white transition-colors" href="#bienes">
                    <span class="flex items-center justify-center size-6 rounded-full bg-imss-border text-imss-gray text-xs dark:bg-gray-700 dark:text-gray-400">2</span>
                    Bienes Involucrados
                </a>
                <a class="whitespace-nowrap pb-3 border-b-2 border-transparent text-imss-gray hover:text-imss-dark hover:border-gray-300 font-medium text-sm flex items-center gap-2 dark:text-gray-400 dark:hover:text-white transition-colors" href="#responsables">
                    <span class="flex items-center justify-center size-6 rounded-full bg-imss-border text-imss-gray text-xs dark:bg-gray-700 dark:text-gray-400">3</span>
                    Responsables
                </a>
                <a class="whitespace-nowrap pb-3 border-b-2 border-transparent text-imss-gray hover:text-imss-dark hover:border-gray-300 font-medium text-sm flex items-center gap-2 dark:text-gray-400 dark:hover:text-white transition-colors" href="#autorizaciones">
                    <span class="flex items-center justify-center size-6 rounded-full bg-imss-border text-imss-gray text-xs dark:bg-gray-700 dark:text-gray-400">4</span>
                    Autorizaciones
                </a>
            </div>
        </div>

        <!-- Form Content -->
        <form id="documentoForm" action="/documentos/guardar" method="POST" class="space-y-8 mt-2">
            <!-- SECTION 1: DATOS GENERALES -->
            <section class="scroll-mt-32" id="general">
                <div class="bg-white dark:bg-[#1e2a1e] rounded-xl shadow-sm border border-imss-border dark:border-gray-800 overflow-hidden">
                    <div class="px-6 py-4 border-b border-imss-border dark:border-gray-700 bg-gray-50/50 dark:bg-white/5 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-imss-dark dark:text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">description</span>
                            Información del Documento
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            Borrador
                        </span>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <!-- Tipo de Documento -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1" for="doc-type">Tipo de Documento <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select required class="block w-full pl-3 pr-10 py-2.5 text-base border-imss-border focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" id="doc-type" name="doc-type">
                                    <?php foreach ($tiposDocumento as $value => $label): ?>
                                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <p class="mt-1 text-xs text-imss-gray dark:text-gray-500">Seleccione el formato oficial que desea generar.</p>
                        </div>

                        <!-- Folio -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1" for="folio">Folio del Documento</label>
                            <div class="flex shadow-sm rounded-lg">
                                <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-imss-border bg-gray-50 text-imss-gray text-sm font-medium dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    AUTO
                                </span>
                                <input class="flex-1 min-w-0 block w-full px-3 py-2.5 rounded-none rounded-r-lg border-imss-border focus:ring-primary focus:border-primary sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-500" disabled id="folio" name="folio" placeholder="Generado automáticamente al guardar" type="text"/>
                            </div>
                        </div>

                        <!-- Fecha de Emisión -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1" for="date">Fecha de Emisión <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-imss-gray text-lg">calendar_today</span>
                                </div>
                                <input required class="block w-full pl-10 pr-3 py-2.5 border-imss-border focus:ring-primary focus:border-primary sm:text-sm rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white shadow-sm" id="date" name="date" type="date" value="<?php echo date('Y-m-d'); ?>"/>
                            </div>
                        </div>

                        <!-- Unidad / Ubicación -->
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1" for="unit">Unidad Administrativa</label>
                            <input class="block w-full px-3 py-2.5 border-imss-border focus:ring-primary focus:border-primary sm:text-sm rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white shadow-sm bg-gray-50 dark:bg-gray-900" id="unit" name="unit" readonly type="text" value="H.G.R. No. 1 - Coordinación de Informática"/>
                        </div>

                        <!-- Motivo / Justificación -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1" for="reason">Motivo o Justificación <span class="text-red-500">*</span></label>
                            <textarea required class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-imss-border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" id="reason" name="reason" placeholder="Describa brevemente la razón de este movimiento o resguardo..." rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 2: BIENES -->
            <section class="scroll-mt-32" id="bienes">
                <div class="bg-white dark:bg-[#1e2a1e] rounded-xl shadow-sm border border-imss-border dark:border-gray-800 overflow-hidden">
                    <div class="px-6 py-4 border-b border-imss-border dark:border-gray-700 bg-gray-50/50 dark:bg-white/5 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex flex-col">
                            <h3 class="text-lg font-bold text-imss-dark dark:text-white flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">inventory_2</span>
                                Bienes Involucrados
                            </h3>
                            <p class="text-xs text-imss-gray dark:text-gray-400 mt-0.5">Agregue los bienes que formarán parte de este documento.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a class="text-sm font-medium text-primary hover:text-primary-dark dark:text-green-400 flex items-center gap-1 hover:underline" href="#">
                                <span class="material-symbols-outlined text-lg">upload_file</span>
                                Carga Masiva (Excel)
                            </a>
                            <button type="button" onclick="modalAgregarBien.show()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <span class="material-symbols-outlined text-lg mr-2">add</span>
                                Agregar Bien
                            </button>
                        </div>
                    </div>

                    <!-- Toolbar / Search -->
                    <div class="p-4 bg-white dark:bg-[#1e2a1e] border-b border-imss-border dark:border-gray-700">
                        <div class="flex gap-4">
                            <div class="relative flex-grow max-w-lg">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-gray-400">search</span>
                                </div>
                                <input id="searchBienes" class="block w-full pl-10 pr-3 py-2 border border-imss-border rounded-lg leading-5 bg-white dark:bg-gray-800 dark:border-gray-700 placeholder-gray-500 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm dark:text-white" placeholder="Buscar por No. Inventario, Serie o Descripción..." type="text"/>
                            </div>
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-imss-border text-sm font-medium rounded-lg text-imss-dark bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                                <span class="material-symbols-outlined text-lg mr-2">filter_list</span>
                                Filtros
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="min-w-full divide-y divide-imss-border dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400 w-10" scope="col">
                                        <input id="selectAllBienes" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600"/>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400" scope="col">
                                        No. Inventario
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400" scope="col">
                                        Descripción
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400" scope="col">
                                        Marca / Modelo
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400" scope="col">
                                        Serie
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-imss-gray uppercase tracking-wider dark:text-gray-400" scope="col">
                                        Estado
                                    </th>
                                    <th class="relative px-6 py-3" scope="col">
                                        <span class="sr-only">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="bienesTableBody" class="bg-white divide-y divide-imss-border dark:divide-gray-700 dark:bg-[#1e2a1e]">
                                <tr>
                                    <td class="px-6 py-8 text-center text-sm text-gray-400 italic dark:text-gray-600" colspan="7">
                                        No se han agregado bienes. Haga clic en "Agregar Bien" para comenzar.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-3 border-t border-imss-border dark:border-gray-700 bg-gray-50 dark:bg-gray-900/30 flex justify-between items-center">
                        <span class="text-sm text-imss-gray dark:text-gray-400">Total de bienes: <span id="totalBienes" class="font-bold text-imss-dark dark:text-white">0</span></span>
                    </div>
                </div>
            </section>

            <!-- SECTION 3: RESPONSABLES -->
            <section class="scroll-mt-32" id="responsables">
                <div class="bg-white dark:bg-[#1e2a1e] rounded-xl shadow-sm border border-imss-border dark:border-gray-800 overflow-hidden">
                    <div class="px-6 py-4 border-b border-imss-border dark:border-gray-700 bg-gray-50/50 dark:bg-white/5 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-imss-dark dark:text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">group</span>
                            Responsables y Firmas
                        </h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Columna Solicitante -->
                        <div class="rounded-lg border border-imss-border p-5 bg-background-light/30 dark:border-gray-700 dark:bg-gray-800/30">
                            <h4 class="text-sm uppercase tracking-wide text-imss-gray font-bold mb-4 flex items-center gap-2">
                                <span class="size-2 rounded-full bg-blue-500"></span> Solicitante / Responsable
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1">Matrícula <span class="text-red-500">*</span></label>
                                    <div class="flex gap-2">
                                        <input required class="block w-full rounded-lg border-imss-border shadow-sm focus:border-primary focus:ring-primary sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" id="matricula-solicitante" name="matricula-solicitante" placeholder="Ej: 9812319" type="text"/>
                                        <button type="button" onclick="buscarTrabajador('solicitante')" class="inline-flex items-center px-3 py-2 border border-imss-border shadow-sm text-sm leading-4 font-medium rounded-lg text-imss-dark bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                            <span class="material-symbols-outlined text-lg">search</span>
                                        </button>
                                    </div>
                                </div>
                                <div id="info-solicitante" class="hidden p-3 bg-white border border-dashed border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm dark:bg-blue-900 dark:text-blue-200" id="avatar-solicitante">-</div>
                                        <div>
                                            <p class="text-sm font-bold text-imss-dark dark:text-white" id="nombre-solicitante">-</p>
                                            <p class="text-xs text-imss-gray dark:text-gray-400" id="cargo-solicitante">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna Autoriza -->
                        <div class="rounded-lg border border-imss-border p-5 bg-background-light/30 dark:border-gray-700 dark:bg-gray-800/30">
                            <h4 class="text-sm uppercase tracking-wide text-imss-gray font-bold mb-4 flex items-center gap-2">
                                <span class="size-2 rounded-full bg-green-500"></span> Autoriza
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-imss-dark dark:text-gray-200 mb-1">Matrícula</label>
                                    <div class="flex gap-2">
                                        <input class="block w-full rounded-lg border-imss-border shadow-sm focus:border-primary focus:ring-primary sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" id="matricula-autoriza" name="matricula-autoriza" placeholder="Ej: 8812001" type="text"/>
                                        <button type="button" onclick="buscarTrabajador('autoriza')" class="inline-flex items-center px-3 py-2 border border-imss-border shadow-sm text-sm leading-4 font-medium rounded-lg text-imss-dark bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                            <span class="material-symbols-outlined text-lg">search</span>
                                        </button>
                                    </div>
                                </div>
                                <div id="info-autoriza" class="hidden p-3 bg-white border border-dashed border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold text-sm dark:bg-green-900 dark:text-green-200" id="avatar-autoriza">-</div>
                                        <div>
                                            <p class="text-sm font-bold text-imss-dark dark:text-white" id="nombre-autoriza">-</p>
                                            <p class="text-xs text-imss-gray dark:text-gray-400" id="cargo-autoriza">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>

    <!-- Sticky Footer Actions -->
    <div class="fixed bottom-0 left-0 w-full bg-white dark:bg-[#1e2a1e] border-t border-imss-border dark:border-gray-700 shadow-lg z-50">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 h-20 flex items-center justify-between">
            <a href="/documentos" class="inline-flex items-center px-4 py-2 text-sm font-medium text-imss-dark bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                Cancelar
            </a>
            <div class="flex items-center gap-3">
                <span class="text-xs text-imss-gray dark:text-gray-400 mr-2 hidden sm:inline-block">Completar todos los campos requeridos</span>
                <button type="button" onclick="vistaPrevia()" class="inline-flex items-center px-4 py-2 text-sm font-medium text-primary bg-white border border-primary rounded-lg hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-transparent dark:text-green-400 dark:border-green-400 dark:hover:bg-green-900/30">
                    <span class="material-symbols-outlined text-[18px] mr-2">visibility</span>
                    Vista Previa
                </button>
                <button type="submit" form="documentoForm" class="inline-flex items-center px-6 py-2 text-sm font-bold text-white bg-primary rounded-lg shadow-sm hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transform transition hover:scale-[1.02]">
                    <span class="material-symbols-outlined text-[20px] mr-2">save_as</span>
                    Generar Documento
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Estado de bienes seleccionados
        let bienesSeleccionados = [];

        // Buscar trabajador por matrícula
        async function buscarTrabajador(tipo) {
            const matriculaInput = document.getElementById(`matricula-${tipo}`);
            const matricula = matriculaInput.value.trim();
            
            if (!matricula) {
                alert('Por favor ingrese una matrícula');
                return;
            }

            try {
                const response = await fetch(`/documentos/buscar-trabajador?matricula=${encodeURIComponent(matricula)}`);
                const data = await response.json();

                if (data.success) {
                    const trabajador = data.trabajador;
                    
                    // Mostrar información del trabajador
                    document.getElementById(`info-${tipo}`).classList.remove('hidden');
                    
                    // Avatar con iniciales
                    const nombres = trabajador.nombre.split(' ');
                    const iniciales = nombres.length >= 2 
                        ? nombres[0][0] + nombres[1][0]
                        : nombres[0][0];
                    document.getElementById(`avatar-${tipo}`).textContent = iniciales.toUpperCase();
                    
                    document.getElementById(`nombre-${tipo}`).textContent = trabajador.nombre;
                    document.getElementById(`cargo-${tipo}`).textContent = trabajador.cargo || 'Sin cargo asignado';
                } else {
                    alert(data.message || 'Trabajador no encontrado');
                    document.getElementById(`info-${tipo}`).classList.add('hidden');
                }
            } catch (error) {
                console.error('Error al buscar trabajador:', error);
                alert('Error al buscar trabajador. Por favor intente nuevamente.');
            }
        }

        // Modal simple para agregar bienes
        const modalAgregarBien = {
            show: function() {
                // Por ahora, alert simple - puedes mejorar con un modal real
                const bienId = prompt('Ingrese el ID del bien a agregar:');
                if (bienId) {
                    agregarBien(bienId);
                }
            }
        };

        // Agregar bien a la tabla
        function agregarBien(bienId) {
            // Aquí deberías hacer una llamada AJAX para obtener los datos del bien
            // Por ahora, simulamos datos
            const bien = {
                id: bienId,
                identificacion: `INV-2024-${bienId}`,
                descripcion: 'Equipo de cómputo',
                marca: 'HP',
                modelo: 'EliteBook',
                serie: `SN${bienId}`,
                estado: 'Bueno'
            };

            bienesSeleccionados.push(bien);
            actualizarTablaBienes();
        }

        // Actualizar tabla de bienes
        function actualizarTablaBienes() {
            const tbody = document.getElementById('bienesTableBody');
            
            if (bienesSeleccionados.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td class="px-6 py-8 text-center text-sm text-gray-400 italic dark:text-gray-600" colspan="7">
                            No se han agregado bienes. Haga clic en "Agregar Bien" para comenzar.
                        </td>
                    </tr>
                `;
            } else {
                tbody.innerHTML = bienesSeleccionados.map((bien, index) => `
                    <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" name="bienes[]" value="${bien.id}" checked class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600"/>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-imss-dark dark:text-white">
                            ${bien.identificacion}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-imss-gray dark:text-gray-300">
                            ${bien.descripcion}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-imss-gray dark:text-gray-300">
                            ${bien.marca} / ${bien.modelo}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-imss-gray dark:text-gray-300">
                            ${bien.serie}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                ${bien.estado}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button type="button" onclick="eliminarBien(${index})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </td>
                    </tr>
                `).join('');
            }

            document.getElementById('totalBienes').textContent = bienesSeleccionados.length;
        }

        // Eliminar bien
        function eliminarBien(index) {
            bienesSeleccionados.splice(index, 1);
            actualizarTablaBienes();
        }

        // Vista previa (placeholder)
        function vistaPrevia() {
            alert('La vista previa estará disponible próximamente');
        }

        // Smooth scroll para las tabs
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>