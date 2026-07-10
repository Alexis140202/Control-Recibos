<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login } from '@/routes';
import { register } from '@/routes';
</script>

<template>
    <Head title="Welcome" />
    <div class="relative flex min-h-screen flex-col items-center bg-white p-6 font-sans overflow-hidden">
        
        <!-- Fondo Decorativo Sutil -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-to-b from-gray-100 to-transparent opacity-60 blur-3xl pointer-events-none"></div>

        <header class="w-full max-w-6xl flex justify-end mb-12 relative z-10">
            <nav class="flex items-center gap-4">
                <Link
                    v-if="$page.props.auth?.user"
                    :href="dashboard()"
                    class="rounded-full bg-[#162a4d] px-6 py-2.5 text-sm font-semibold text-white transition-all hover:bg-[#0f1d36] shadow-md hover:shadow-lg"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="login()"
                        class="rounded-full bg-blue-800 px-6 py-2.5 text-sm font-semibold text-white transition-all hover:bg-blue-900 shadow-sm hover:shadow-md"
                    >
                        Iniciar Sesión
                    </Link>
                </template>
            </nav>
        </header>

        <main class="w-full max-w-4xl flex flex-col items-center relative z-10 flex-grow pt-4 pb-20">
            
            <!-- Sección de Título y Textos -->
            <div class="text-center mb-16 max-w-3xl">
                <span class="inline-block py-1.5 px-4 rounded-full bg-[#E5EDFB] text-[#162a4d] text-xs font-bold tracking-wider mb-6 uppercase shadow-sm">
                    Plataforma de Gestión
                </span>
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
                    Bienvenido a <br class="hidden md:block" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#162a4d] to-[#3b82f6]">Alquiler Control</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto leading-relaxed">
                    Simplifique la administración de sus propiedades y el control de pagos de inquilinos de manera eficiente, centralizada y segura.
                </p>
            </div>

            <!-- Sección de Ilustración (Dashboard Mockup) -->
            <div class="relative w-full max-w-xl mx-auto flex justify-center items-center mt-4">
                
                <!-- Resplandor de fondo -->
                <div class="absolute bg-gradient-to-tr from-[#A3C4F3] to-[#FDECDA] w-[400px] h-[400px] rounded-full -z-10 blur-3xl opacity-60 transform translate-y-4"></div>
                
                <!-- Ventana Principal -->
                <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-100 p-5 w-full relative z-0 transition-transform duration-500 hover:scale-[1.02]">
                    <!-- Cabecera de la ventana -->
                    <div class="w-full bg-[#1e293b] h-8 rounded-t-xl flex items-center px-4 gap-2 mb-6">
                        <div class="w-3 h-3 rounded-full bg-red-400 shadow-sm"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400 shadow-sm"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400 shadow-sm"></div>
                    </div>
                    
                    <!-- Tarjetas de Estadísticas -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="bg-gray-50/80 border border-gray-100 p-4 rounded-xl transition-colors hover:bg-white hover:shadow-sm">
                            <div class="text-[11px] text-gray-500 font-medium mb-1">Total Recaudado Mes</div>
                            <div class="font-black text-lg text-gray-800">$12,450.00</div>
                        </div>
                        <div class="bg-gray-50/80 border border-gray-100 p-4 rounded-xl transition-colors hover:bg-white hover:shadow-sm">
                            <div class="text-[11px] text-gray-500 font-medium mb-1">Inquilinos al Día</div>
                            <div class="font-black text-lg text-gray-800">48 <span class="text-gray-400 text-sm font-medium">/ 52</span></div>
                        </div>
                        <div class="bg-gray-50/80 border border-gray-100 p-4 rounded-xl transition-colors hover:bg-white hover:shadow-sm">
                            <div class="text-[11px] text-gray-500 font-medium mb-1">Pagos Pendientes</div>
                            <div class="font-black text-lg text-red-500">4</div>
                        </div>
                    </div>

                    <!-- Gráfico -->
                    <div class="text-center text-sm font-bold text-gray-700 mb-4">Resumen Mensual de Pagos</div>
                    <div class="flex items-end justify-center gap-8 h-40 border-b-2 border-gray-100 pb-2 px-8 relative">
                        <!-- Líneas guía sutiles -->
                        <div class="absolute w-full border-t border-gray-100 bottom-1/3 -z-10"></div>
                        <div class="absolute w-full border-t border-gray-100 bottom-2/3 -z-10"></div>
                        
                        <!-- Barras -->
                        <div class="w-12 bg-gradient-to-t from-blue-600 to-blue-400 h-32 rounded-t-md shadow-md"></div>
                        <div class="w-12 bg-gradient-to-t from-orange-500 to-orange-400 h-16 rounded-t-md shadow-md"></div>
                        <div class="w-12 bg-gradient-to-t from-red-500 to-red-400 h-8 rounded-t-md shadow-md"></div>
                    </div>
                </div>

                <!-- Ilustración de Edificios (Flotantes) -->
                <div class="absolute -bottom-10 -right-8 flex gap-3 z-10 drop-shadow-2xl hover:-translate-y-2 transition-transform duration-500">
                    <div class="w-20 h-40 bg-[#A3C4F3] border-[3px] border-[#162a4d] rounded-t-lg relative flex flex-col items-center py-3 gap-3 overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full bg-white/20"></div>
                        <div class="grid grid-cols-2 gap-2.5 relative z-10">
                            <div class="w-4 h-5 bg-orange-300 border-[1.5px] border-[#162a4d] rounded-sm shadow-inner"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-orange-300 border-[1.5px] border-[#162a4d] rounded-sm shadow-inner"></div>
                        </div>
                        <div class="w-8 h-10 bg-orange-400 border-[3px] border-[#162a4d] absolute bottom-0 rounded-t-sm shadow-inner"></div>
                    </div>
                    
                    <div class="w-20 h-36 bg-[#A3C4F3] border-[3px] border-[#162a4d] rounded-t-lg relative flex flex-col items-center py-3 gap-3 mt-4 overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full bg-black/5"></div>
                        <div class="grid grid-cols-2 gap-2.5 relative z-10">
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-orange-300 border-[1.5px] border-[#162a4d] rounded-sm shadow-inner"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                            <div class="w-4 h-5 bg-orange-300 border-[1.5px] border-[#162a4d] rounded-sm shadow-inner"></div>
                            <div class="w-4 h-5 bg-white border-[1.5px] border-[#162a4d] rounded-sm"></div>
                        </div>
                        <div class="w-8 h-10 bg-orange-400 border-[3px] border-[#162a4d] absolute bottom-0 rounded-t-sm shadow-inner"></div>
                    </div>
                </div>
            </div>

            <!-- Footer Informativo (Estilo Pills) -->
            <div class="mt-24 flex flex-col sm:flex-row items-center justify-center gap-6 text-sm font-medium text-gray-600">
                <div class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-green-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Diseñado para todos los tamaños
                </div>
                <div class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    No requiere conocimientos técnicos
                </div>
            </div>

        </main>
    </div>
</template>