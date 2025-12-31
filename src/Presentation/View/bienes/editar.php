<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edición de Registro de Bien - IMSS</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0df280",
                        "background-light": "#f5f8f7",
                        "background-dark": "#102219",
                        "surface-light": "#ffffff",
                        "surface-dark": "#152a22",
                        "imss-green": "#13322b",
                        "imss-gold": "#D4C19C",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .icon-filled { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-[#111814] dark:text-gray-100 antialiased overflow-hidden">
<div class="flex h-screen w-full">
    <!-- SideNavBar -->
    <aside class="hidden lg:flex w-[280px] flex-col border-r border-[#e0e6e3] dark:border-[#2a4035] bg-surface-light dark:bg-surface-dark h-full shrink-0">
        <div class="flex h-full flex-col justify-between p-4">
            <div class="flex flex-col gap-4">
                <!-- User Profile -->
                <div class="flex gap-3 p-2 rounded-xl bg-background-light dark:bg-background-dark/30">
                    <div class="bg-primary/10 flex items-center justify-center rounded-full size-12 shadow-sm">
                        <span class="text-2xl font-bold text-primary">A</span>
                    </div>
                    <div class="flex flex-col justify-center">
                        <h1 class="text-[#111814] dark:text-white text-base font-bold leading-normal">Administrador</h1>
                        <p class="text-[#608a75] dark:text-[#8baea0] text-xs font-normal leading-normal">IMSS Control de Bienes</p>
                    </div>
                </div>
                <div class="h-px bg-[#e0e6e3] dark:bg-[#2a4035] my-1"></div>
                
                <!-- Navigation Links -->
                <div class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#608a75] dark:text-[#9CA3AF] hover:bg-[#f0f5f2] dark:hover:bg-[#1f362b] transition-colors group" href="<?= BASE_URL ?>/" >
                        <span class="material-symbols-outlined text-[24px] group-hover:text-imss-green dark:group-hover:text-primary">home</span>
                        <p class="text-sm font-medium leading-normal group-hover:text-[#111814] dark:group-hover:text-white">Inicio</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-imss-green/5 dark:bg-primary/10 text-imss-green dark:text-primary transition-colors" href="<?= BASE_URL ?>/bienes">
                        <span class="material-symbols-outlined icon-filled text-[24px]">inventory_2</span>
                        <p class="text-sm font-bold leading-normal">Inventario</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#608a75] dark:text-[#9CA3AF] hover:bg-[#f0f5f2] dark:hover:bg-[#1f362b] transition-colors group" href="<?= BASE_URL ?>/documentos">
                        <span class="material-symbols-outlined text-[24px] group-hover:text-imss-green dark:group-hover:text-primary">description</span>
                        <p class="text-sm font-medium leading-normal group-hover:text-[#111814] dark:group-hover:text-white">Resguardos</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#608a75] dark:text-[#9CA3AF] hover:bg-[#f0f5f2] dark:hover:bg-[#1f362b] transition-colors group" href="<?= BASE_URL ?>/bajas">
                        <span class="material-symbols-outlined text-[24px] group-hover:text-imss-green dark:group-hover:text-primary">delete</span>
                        <p class="text-sm font-medium leading-normal group-hover:text-[#111814] dark:group-hover:text-white">Bajas</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#608a75] dark:text-[#9CA3AF] hover:bg-[#f0f5f2] dark:hover:bg-[#1f362b] transition-colors group" href="<?= BASE_URL ?>/reportes">
                        <span class="material-symbols-outlined text-[24px] group-hover:text-imss-green dark:group-hover:text-primary">bar_chart</span>
                        <p class="text-sm font-medium leading-normal group-hover:text-[#111814] dark:group-hover:text-white">Reportes</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#608a75] dark:text-[#9CA3AF] hover:bg-[#f0f5f2] dark:hover:bg-[#1f362b] transition-colors group" href="<?= BASE_URL ?>/configuracion">
                        <span class="material-symbols-outlined text-[24px] group-hover:text-imss-green dark:group-hover:text-primary">settings</span>
                        <p class="text-sm font-medium leading-normal group-hover:text-[#111814] dark:group-hover:text-white">Configuración</p>
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-2 mt-auto">
                <div class="p-4 bg-imss-green rounded-xl relative overflow-hidden group cursor-pointer">
                    <div class="absolute top-0 right-0 -mt-2 -mr-2 w-16 h-16 bg-primary/20 rounded-full blur-xl"></div>
                    <h3 class="text-white font-bold text-sm relative z-10">Soporte Técnico</h3>
                    <p class="text-white/70 text-xs mt-1 relative z-10">¿Necesitas ayuda?</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="flex flex-col flex-1 h-full w-full overflow-hidden relative">
        <!-- TopNavBar -->
        <header class="flex items-center justify-between whitespace-nowrap border-b border-[#e0e6e3] dark:border-[#2a4035] bg-surface-light dark:bg-surface-dark px-6 py-3 shrink-0 z-20">
            <div class="flex items-center gap-4">
                <button class="lg:hidden text-[#608a75] dark:text-white">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="flex items-center gap-3">
                    <div class="size-8 text-imss-green dark:text-primary">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4C12.95 4 4 12.95 4 24C4 35.05 12.95 44 24 44C35.05 44 44 35.05 44 24C44 12.95 35.05 4 24 4ZM24 40C15.16 40 8 32.84 8 24C8 15.16 15.16 8 24 8C32.84 8 40 15.16 40 24C40 32.84 32.84 40 24 40Z" fill="currentColor"></path>
                            <path d="M22 14H26V22H34V26H26V34H22V26H14V22H22V14Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="hidden sm:block text-[#111814] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Sistema de Control de Bienes</h2>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="hidden md:flex relative group w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-[#608a75]">search</span>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-2 border-none rounded-lg leading-5 bg-[#f0f5f2] dark:bg-[#102219] text-[#111814] dark:text-white placeholder-[#608a75] focus:outline-none focus:ring-2 focus:ring-primary/50 sm:text-sm transition-all" placeholder="Buscar activo..." type="text"/>
                </div>
                <button class="relative text-[#608a75] dark:text-white hover:text-imss-green dark:hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-surface-dark"></span>
                </button>
            </div>
        </header>

        <!-- Scrollable Content Area -->
        <main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 md:p-10 scroll-smooth">
            <div class="max-w-[1200px] mx-auto flex flex-col gap-6 pb-20">
                <!-- Breadcrumbs -->
                <div class="flex flex-wrap gap-2 text-sm">
                    <a class="text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-primary font-medium transition-colors" href="<?= BASE_URL ?>/">Inicio</a>
                    <span class="text-[#608a75] dark:text-[#8baea0] font-medium">/</span>
                    <a class="text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-primary font-medium transition-colors" href="<?= BASE_URL ?>/bienes">Inventario</a>
                    <span class="text-[#608a75] dark:text-[#8baea0] font-medium">/</span>
                    <span class="text-[#111814] dark:text-white font-semibold">Edición #<?php echo htmlspecialchars($bien->getIdentificacionNumero() ?: $bien->getId()); ?></span>
                </div>

                <!-- Success/Error Messages -->
                <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-lg p-4 flex items-start gap-3">
                    <span class="material-symbols-outlined text-green-600 dark:text-green-400">check_circle</span>
                    <div>
                        <p class="font-medium">Cambios guardados exitosamente</p>
                        <p class="text-sm"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 rounded-lg p-4 flex items-start gap-3">
                    <span class="material-symbols-outlined text-red-600 dark:text-red-400">error</span>
                    <div>
                        <p class="font-medium">Error al guardar</p>
                        <p class="text-sm"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Page Heading -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <h1 class="text-[#111814] dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">Edición de Registro de Bien</h1>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-bold uppercase tracking-wide rounded-full border border-green-200 dark:border-green-800">Activo</span>
                        </div>
                        <p class="text-[#608a75] dark:text-[#8baea0] text-base font-normal max-w-2xl">
                            Modifique la información del bien patrimonial. Los campos marcados con <span class="text-red-500">*</span> son obligatorios.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex items-center justify-center gap-2 px-4 py-2 bg-white dark:bg-surface-dark border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors shadow-sm">
                            <span class="material-symbols-outlined text-[20px]">print</span>
                            <span>Imprimir Etiqueta</span>
                        </button>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="bg-surface-light dark:bg-surface-dark rounded-xl border border-[#e0e6e3] dark:border-[#2a4035] shadow-sm overflow-hidden flex flex-col">
                    <!-- Tabs -->
                    <div class="border-b border-[#e0e6e3] dark:border-[#2a4035] px-6 overflow-x-auto">
                        <div class="flex gap-8 min-w-max">
                            <button class="flex items-center justify-center border-b-[3px] border-primary text-[#111814] dark:text-white pb-3 pt-4 px-2 focus:outline-none">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Información General</p>
                            </button>
                            <button class="flex items-center justify-center border-b-[3px] border-transparent text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-white pb-3 pt-4 px-2 transition-colors focus:outline-none">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Ubicación</p>
                            </button>
                            <button class="flex items-center justify-center border-b-[3px] border-transparent text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-white pb-3 pt-4 px-2 transition-colors focus:outline-none">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Documentación</p>
                            </button>
                            <button class="flex items-center justify-center border-b-[3px] border-transparent text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-white pb-3 pt-4 px-2 transition-colors focus:outline-none">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Historial</p>
                            </button>
                            <button class="flex items-center justify-center border-b-[3px] border-transparent text-[#608a75] hover:text-imss-green dark:text-[#8baea0] dark:hover:text-white pb-3 pt-4 px-2 transition-colors focus:outline-none">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Mantenimiento</p>
                            </button>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-6 lg:p-8">
                        <form action="<?= BASE_URL ?>/bienes/<?php echo $bien->getId(); ?>/actualizar" method="POST" enctype="multipart/form-data" class="flex flex-col gap-8">
                            <!-- Section 1: Identification -->
                            <div>
                                <h3 class="text-lg font-bold text-[#111814] dark:text-white mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">fingerprint</span>
                                    Identificación del Bien
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Field: ID (Read only) -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200">No. Inventario</label>
                                        <div class="relative">
                                            <input class="w-full rounded-lg bg-gray-100 dark:bg-gray-800 border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 px-4 py-2.5 text-sm font-medium cursor-not-allowed select-none" disabled type="text" value="<?php echo htmlspecialchars($bien->getIdentificacionNumero() ?: 'N/A'); ?>"/>
                                            <span class="material-symbols-outlined absolute right-3 top-2.5 text-gray-400 text-[20px]">lock</span>
                                        </div>
                                    </div>

                                    <!-- Field: Asset Name -->
                                    <div class="flex flex-col gap-1.5 md:col-span-2">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="descripcion">Descripción del Bien <span class="text-red-500">*</span></label>
                                        <input required class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-shadow placeholder:text-gray-400" id="descripcion" name="descripcion" placeholder="Ej. Escritorio Ejecutivo" type="text" value="<?php echo htmlspecialchars($bien->getDescripcion()); ?>"/>
                                    </div>

                                    <!-- Field: Category -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="naturaleza">Naturaleza <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <select required class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white pl-4 pr-10 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary appearance-none transition-shadow" id="naturaleza" name="naturaleza">
                                                <option value="BMC" <?php echo $bien->getNaturaleza() === 'BMC' ? 'selected' : ''; ?>>Bien Mueble de Consumo (BMC)</option>
                                                <option value="BMNC" <?php echo $bien->getNaturaleza() === 'BMNC' ? 'selected' : ''; ?>>Bien Mueble No de Consumo (BMNC)</option>
                                                <option value="BI" <?php echo $bien->getNaturaleza() === 'BI' ? 'selected' : ''; ?>>Bien Inmueble (BI)</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-2.5 text-gray-500 dark:text-gray-400 pointer-events-none">expand_more</span>
                                        </div>
                                    </div>

                                    <!-- Field: Quantity -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="cantidad">Cantidad</label>
                                        <input class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-shadow" id="cantidad" name="cantidad" type="number" min="1" value="<?php echo htmlspecialchars($bien->getCantidad() ?: 1); ?>"/>
                                    </div>

                                    <!-- Field: Serial Number -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="serie">No. Serie</label>
                                        <input class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-shadow" id="serie" name="serie" type="text" value="<?php echo htmlspecialchars($bien->getSerie() ?: ''); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px w-full bg-[#e0e6e3] dark:bg-[#2a4035]"></div>

                            <!-- Section 2: Details -->
                            <div>
                                <h3 class="text-lg font-bold text-[#111814] dark:text-white mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">tune</span>
                                    Especificaciones
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Field: Brand -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="marca">Marca</label>
                                        <input class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-shadow" id="marca" name="marca" type="text" value="<?php echo htmlspecialchars($bien->getMarca() ?: ''); ?>"/>
                                    </div>

                                    <!-- Field: Model -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200" for="modelo">Modelo</label>
                                        <input class="w-full rounded-lg bg-white dark:bg-[#1A2C24] border-gray-300 dark:border-[#2a4035] text-[#111814] dark:text-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-shadow" id="modelo" name="modelo" type="text" value="<?php echo htmlspecialchars($bien->getModelo() ?: ''); ?>"/>
                                    </div>

                                    <!-- Field: Document ID (if associated) -->
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-[#111814] dark:text-gray-200">Documento Asociado</label>
                                        <input class="w-full rounded-lg bg-gray-100 dark:bg-gray-800 border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 px-4 py-2.5 text-sm font-medium cursor-not-allowed" disabled type="text" value="<?php echo $bien->getDocumentoId() ? '#' . $bien->getDocumentoId() : 'Ninguno'; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden field for ID -->
                            <input type="hidden" name="id" value="<?php echo $bien->getId(); ?>"/>
                        </form>
                    </div>

                    <!-- Action Footer -->
                    <div class="bg-gray-50 dark:bg-[#12241b] px-6 py-4 border-t border-[#e0e6e3] dark:border-[#2a4035] flex justify-between items-center">
                        <button onclick="if(confirm('¿Está seguro de eliminar este bien?')) { window.location.href='<?= BASE_URL ?>/bienes/<?php echo $bien->getId(); ?>/eliminar'; }" class="text-red-600 dark:text-red-400 text-sm font-medium hover:underline flex items-center gap-1" type="button">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                            Eliminar Bien
                        </button>
                        <div class="flex gap-3">
                            <a href="<?= BASE_URL ?>/bienes" class="px-6 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 text-sm font-medium bg-white dark:bg-transparent hover:bg-gray-50 dark:hover:bg-white/5 transition-colors shadow-sm">
                                Cancelar
                            </a>
                            <button onclick="document.querySelector('form').submit()" class="px-6 py-2.5 rounded-lg bg-primary hover:bg-[#0be075] text-[#111814] text-sm font-bold shadow-md shadow-primary/20 transition-all transform active:scale-95 flex items-center gap-2" type="button">
                                <span class="material-symbols-outlined text-[20px]">save</span>
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>