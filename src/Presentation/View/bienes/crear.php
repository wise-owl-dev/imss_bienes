<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Nuevo Registro de Bienes - IMSS</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0df29a",
                        "background-light": "#f5f8f7",
                        "background-dark": "#10221b",
                        "text-main": "#111815",
                        "text-secondary": "#608a7a",
                        "border-color": "#dbe6e2",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"],
                        "sans": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-text-main overflow-hidden">
<div class="flex h-screen w-full flex-col">
    <!-- Header -->
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-color bg-white dark:bg-[#1a2e26] dark:border-[#2a4036] px-6 py-3 shrink-0 z-20">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-4 text-text-main dark:text-white">
                <div class="size-8 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">local_hospital</span>
                </div>
                <h2 class="text-text-main dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Sistema de Control de Bienes IMSS</h2>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden md:flex items-center gap-6">
            <a class="text-text-main dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= BASE_URL ?>/">Inicio</a>
            <a class="text-text-main dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= BASE_URL ?>/bienes">Inventario</a>
            <a class="text-text-main dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= BASE_URL ?>/reportes">Reportes</a>
            <a class="text-text-main dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= BASE_URL ?>/configuracion">Configuración</a>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative hidden sm:block">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-text-secondary">
                        <span class="material-symbols-outlined text-[20px]">search</span>
                    </span>
                    <input class="block w-full rounded-lg border-0 bg-background-light dark:bg-[#233830] py-2 pl-10 pr-4 text-text-main dark:text-white placeholder:text-text-secondary focus:ring-2 focus:ring-primary sm:text-sm sm:leading-6" placeholder="Buscar activo..." type="text"/>
                </div>
                <div class="h-8 w-[1px] bg-border-color dark:bg-[#2a4036]"></div>
                <div class="flex items-center gap-2 cursor-pointer">
                    <div class="bg-primary/10 flex items-center justify-center rounded-full size-9 border-2 border-white shadow-sm">
                        <span class="text-sm font-bold text-primary">AG</span>
                    </div>
                    <div class="hidden lg:flex flex-col">
                        <span class="text-xs font-semibold text-text-main dark:text-white">Admin. General</span>
                        <span class="text-[10px] text-text-secondary">Unidad Médica #45</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <!-- Side Navigation -->
        <aside class="w-64 flex-col bg-white dark:bg-[#1a2e26] border-r border-border-color dark:border-[#2a4036] hidden md:flex shrink-0 overflow-y-auto">
            <div class="flex flex-col gap-4 p-4">
                <div class="flex flex-col gap-2">
                    <div class="px-3 py-2">
                        <p class="text-xs font-bold text-text-secondary uppercase tracking-wider">Principal</p>
                    </div>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/">
                        <span class="material-symbols-outlined group-hover:text-primary">dashboard</span>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-background-light dark:bg-[#233830] text-text-main dark:text-white transition-colors" href="<?= BASE_URL ?>/bienes">
                        <span class="material-symbols-outlined text-primary fill-current">inventory_2</span>
                        <span class="text-sm font-medium">Inventario</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/documentos>
                        <span class="material-symbols-outlined group-hover:text-primary">assignment</span>
                        <span class="text-sm font-medium">Resguardos</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/transferencias">
                        <span class="material-symbols-outlined group-hover:text-primary">move_down</span>
                        <span class="text-sm font-medium">Transferencias</span>
                    </a>
                </div>
                <div class="h-[1px] bg-border-color dark:bg-[#2a4036] mx-3 my-1"></div>
                <div class="flex flex-col gap-2">
                    <div class="px-3 py-2">
                        <p class="text-xs font-bold text-text-secondary uppercase tracking-wider">Administración</p>
                    </div>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/bajas>
                        <span class="material-symbols-outlined group-hover:text-primary">delete</span>
                        <span class="text-sm font-medium">Bajas</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/usuarios>
                        <span class="material-symbols-outlined group-hover:text-primary">group</span>
                        <span class="text-sm font-medium">Usuarios</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-secondary hover:bg-background-light dark:hover:bg-[#233830] hover:text-text-main dark:hover:text-white transition-colors group" href="<?= BASE_URL ?>/configuracion>
                        <span class="material-symbols-outlined group-hover:text-primary">settings</span>
                        <span class="text-sm font-medium">Configuración</span>
                    </a>
                </div>
                <div class="mt-auto pt-4">
                    <div class="bg-primary/10 rounded-xl p-4 border border-primary/20">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="material-symbols-outlined text-primary">support_agent</span>
                            <span class="text-sm font-bold text-text-main dark:text-white">¿Necesitas ayuda?</span>
                        </div>
                        <p class="text-xs text-text-secondary mb-3">Contacta a soporte técnico para problemas con el registro.</p>
                        <button class="w-full bg-white dark:bg-[#233830] text-text-main dark:text-white text-xs font-bold py-2 rounded-lg border border-border-color dark:border-[#2a4036] hover:bg-gray-50 dark:hover:bg-[#2f4b40] transition">Contactar Soporte</button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 md:p-10">
            <div class="mx-auto max-w-5xl flex flex-col gap-6">
                <!-- Breadcrumbs -->
                <div class="flex flex-wrap gap-2 items-center text-sm">
                    <a class="text-text-secondary hover:text-primary transition-colors" href="<?= BASE_URL ?>/">Inicio</a>
                    <span class="text-text-secondary">/</span>
                    <a class="text-text-secondary hover:text-primary transition-colors" href="<?= BASE_URL ?>/bienes">Inventario</a>
                    <span class="text-text-secondary">/</span>
                    <span class="text-text-main dark:text-white font-medium bg-white dark:bg-[#233830] px-2 py-0.5 rounded shadow-sm">Nuevo Registro</span>
                </div>

                <!-- Success/Error Messages -->
                <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 rounded-lg p-4 flex items-start gap-3">
                    <span class="material-symbols-outlined text-red-600 dark:text-red-400">error</span>
                    <div>
                        <p class="font-medium">Error al crear el bien</p>
                        <p class="text-sm"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Page Heading -->
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-text-main dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">Nuevo Registro de Bienes</h1>
                        <p class="text-text-secondary text-base font-normal leading-normal max-w-2xl">
                            Complete el formulario para dar de alta un nuevo activo en el sistema patrimonial. Todos los campos marcados con <span class="text-red-500">*</span> son obligatorios.
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <button class="flex items-center justify-center gap-2 px-4 py-2 bg-white dark:bg-[#233830] border border-border-color dark:border-[#2a4036] rounded-lg text-text-main dark:text-white font-medium hover:bg-gray-50 dark:hover:bg-[#2f4b40] transition shadow-sm">
                            <span class="material-symbols-outlined text-sm">upload_file</span>
                            Carga Masiva
                        </button>
                    </div>
                </div>

                <!-- Tabs & Form Container -->
                <div class="bg-white dark:bg-[#1a2e26] rounded-xl shadow-sm border border-border-color dark:border-[#2a4036] overflow-hidden">
                    <!-- Tabs -->
                    <div class="border-b border-border-color dark:border-[#2a4036] px-6 bg-gray-50/50 dark:bg-[#233830]/30">
                        <div class="flex gap-8 overflow-x-auto">
                            <button class="group flex flex-col items-center justify-center border-b-[3px] border-primary pb-3 pt-4 px-2 outline-none">
                                <div class="flex items-center gap-2 text-text-main dark:text-white mb-1">
                                    <span class="material-symbols-outlined text-[20px] text-primary">description</span>
                                    <p class="text-sm font-bold tracking-[0.015em]">Datos Generales</p>
                                </div>
                            </button>
                            <button class="group flex flex-col items-center justify-center border-b-[3px] border-transparent hover:border-gray-300 dark:hover:border-gray-600 pb-3 pt-4 px-2 outline-none transition-colors">
                                <div class="flex items-center gap-2 text-text-secondary group-hover:text-text-main dark:group-hover:text-white mb-1">
                                    <span class="material-symbols-outlined text-[20px]">settings_suggest</span>
                                    <p class="text-sm font-bold tracking-[0.015em]">Detalles Técnicos</p>
                                </div>
                            </button>
                            <button class="group flex flex-col items-center justify-center border-b-[3px] border-transparent hover:border-gray-300 dark:hover:border-gray-600 pb-3 pt-4 px-2 outline-none transition-colors">
                                <div class="flex items-center gap-2 text-text-secondary group-hover:text-text-main dark:group-hover:text-white mb-1">
                                    <span class="material-symbols-outlined text-[20px]">location_on</span>
                                    <p class="text-sm font-bold tracking-[0.015em]">Ubicación</p>
                                </div>
                            </button>
                            <button class="group flex flex-col items-center justify-center border-b-[3px] border-transparent hover:border-gray-300 dark:hover:border-gray-600 pb-3 pt-4 px-2 outline-none transition-colors">
                                <div class="flex items-center gap-2 text-text-secondary group-hover:text-text-main dark:group-hover:text-white mb-1">
                                    <span class="material-symbols-outlined text-[20px]">folder_open</span>
                                    <p class="text-sm font-bold tracking-[0.015em]">Documentación</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-6 md:p-8">
                        <form action="<?= BASE_URL ?>/bienes/guardar" method="POST" class="flex flex-col gap-8">
                            <!-- Section: Basic Info -->
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                                <!-- Col 1: Main Fields -->
                                <div class="md:col-span-8 flex flex-col gap-6">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-text-main dark:text-white">Descripción del Bien <span class="text-red-500">*</span></label>
                                        <input required name="descripcion" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" placeholder="Ej. Monitor HP 24 pulgadas LED" type="text"/>
                                        <span class="text-xs text-text-secondary">Nombre corto y descriptivo del activo.</span>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="flex flex-col gap-1.5">
                                            <label class="text-sm font-semibold text-text-main dark:text-white">No. de Inventario / SKU <span class="text-red-500">*</span></label>
                                            <div class="flex">
                                                <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-border-color dark:border-[#2a4036] bg-gray-100 dark:bg-[#2f4b40] text-text-secondary text-sm">IMSS-</span>
                                                <input required name="identificacion_numero" class="w-full rounded-r-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" placeholder="2024-001" type="text"/>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-1.5">
                                            <label class="text-sm font-semibold text-text-main dark:text-white">Naturaleza</label>
                                            <div class="relative">
                                                <select name="naturaleza" class="w-full appearance-none rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow cursor-pointer">
                                                    <option value="BMC">Bien Mueble de Consumo (BMC)</option>
                                                    <option value="BMNC">Bien Mueble No de Consumo (BMNC)</option>
                                                    <option value="BI">Bien Inmueble (BI)</option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-secondary">
                                                    <span class="material-symbols-outlined">expand_more</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class="flex flex-col gap-1.5">
                                            <label class="text-sm font-semibold text-text-main dark:text-white">Marca</label>
                                            <input name="marca" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" placeholder="Ej. HP" type="text"/>
                                        </div>
                                        <div class="flex flex-col gap-1.5">
                                            <label class="text-sm font-semibold text-text-main dark:text-white">Modelo</label>
                                            <input name="modelo" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" placeholder="Ej. EliteDisplay E243" type="text"/>
                                        </div>
                                        <div class="flex flex-col gap-1.5">
                                            <label class="text-sm font-semibold text-text-main dark:text-white">No. Serie</label>
                                            <input name="serie" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" placeholder="CNK..." type="text"/>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-sm font-semibold text-text-main dark:text-white">Observaciones Adicionales</label>
                                        <textarea name="observaciones" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-background-light dark:bg-[#233830] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow resize-none" placeholder="Detalles sobre el estado físico, accesorios incluidos, etc." rows="4"></textarea>
                                    </div>
                                </div>

                                <!-- Col 2: Status & Quick Info -->
                                <div class="md:col-span-4 flex flex-col gap-6">
                                    <div class="bg-background-light dark:bg-[#233830] rounded-lg p-5 border border-border-color dark:border-[#2a4036]">
                                        <h3 class="text-sm font-bold text-text-main dark:text-white mb-4 uppercase tracking-wide">Estado Inicial</h3>
                                        <div class="flex flex-col gap-4">
                                            <div class="flex flex-col gap-1.5">
                                                <label class="text-sm font-semibold text-text-main dark:text-white">Condición Física</label>
                                                <div class="relative">
                                                    <select name="condicion" class="w-full appearance-none rounded-lg border border-border-color dark:border-[#2a4036] bg-white dark:bg-[#1a2e26] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow cursor-pointer">
                                                        <option value="new">Nuevo (Sin usar)</option>
                                                        <option value="good">Bueno (Operativo)</option>
                                                        <option value="regular">Regular (Desgaste visible)</option>
                                                        <option value="bad">Malo (Requiere reparación)</option>
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-secondary">
                                                        <span class="material-symbols-outlined">expand_more</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1.5">
                                                <label class="text-sm font-semibold text-text-main dark:text-white">Cantidad</label>
                                                <input name="cantidad" value="1" min="1" class="w-full rounded-lg border border-border-color dark:border-[#2a4036] bg-white dark:bg-[#1a2e26] px-4 py-2.5 text-text-main dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow" type="number"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border border-blue-100 dark:border-blue-900/40">
                                        <div class="flex items-start gap-3">
                                            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400 mt-0.5">info</span>
                                            <div>
                                                <p class="text-sm font-bold text-blue-800 dark:text-blue-300 mb-1">Nota importante</p>
                                                <p class="text-xs text-blue-700 dark:text-blue-200 leading-relaxed">
                                                    Al registrar este bien, se generará automáticamente el registro en la base de datos. Asegúrese de que los datos sean correctos antes de guardar.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="h-[1px] bg-border-color dark:bg-[#2a4036] w-full"></div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end gap-4">
                                <a href= "<?= BASE_URL ?>/bienes"  class="px-6 py-2.5 rounded-lg border border-border-color dark:border-[#2a4036] text-text-main dark:text-white font-medium bg-transparent hover:bg-gray-50 dark:hover:bg-[#233830] transition shadow-sm">
                                    Cancelar
                                </a>
                                <button class="px-6 py-2.5 rounded-lg bg-primary hover:bg-[#0be08b] text-[#111815] font-bold shadow-sm shadow-primary/20 transition flex items-center gap-2" type="submit">
                                    <span class="material-symbols-outlined text-lg">save</span>
                                    Crear Registro
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <footer class="mt-4 text-center pb-6">
                    <p class="text-xs text-text-secondary">© 2024 Instituto Mexicano del Seguro Social. Todos los derechos reservados.</p>
                </footer>
            </div>
        </main>
    </div>
</div>
</body>
</html>