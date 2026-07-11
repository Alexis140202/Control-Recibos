<template>
  <div class="p-6">
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-slate-800">
        Registro de Inquilinos
      </h1>

      <button @click="showModal = true"
        class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700">
        <Plus class="h-5 w-5" />
        Agregar Inquilino
      </button>
    </div>

    <!-- Modal -->
    <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
      <div class="w-full max-w-2xl rounded-xl bg-white p-6 shadow-2xl">
        <div class="mb-6 flex items-center gap-2">
          <User class="h-6 w-6 text-blue-600" />
          <h2 class="text-xl font-semibold">
            Nuevo Inquilino
          </h2>
        </div>

        <form @submit.prevent="guardarInquilino" class="grid grid-cols-2 gap-4">
          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Nombre
            </label>

            <div class="relative">
              <User class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.nombre" type="text" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Apellido
            </label>

            <div class="relative">
              <User class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.apellido" type="text" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Teléfono
            </label>

            <div class="relative">
              <Phone class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.telefono" type="text" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              DNI
            </label>

            <div class="relative">
              <IdCard class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.dni" type="text" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Correo
            </label>

            <div class="relative">
              <Mail class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.correo" type="email" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div>
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Cuota
            </label>

            <div class="relative">
              <DollarSign class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.cuota" type="number" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div class="col-span-2">
            <label class="mb-1 block text-sm font-medium text-slate-600">
              Día de ingreso
            </label>

            <div class="relative">
              <Calendar class="absolute top-3 left-3 h-4 w-4 text-slate-400" />
              <input v-model="form.diaIngreso" :min="today" type="date" required
                class="w-full rounded-lg border border-slate-300 py-2 pr-3 pl-10 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div class="col-span-2 mt-4 flex justify-end gap-3">
            <button type="button" @click="showModal = false"
              class="rounded-lg border border-slate-300 px-5 py-2 hover:bg-slate-100">
              Cancelar
            </button>

            <button type="submit" :disabled="loading"
              class="flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700 disabled:opacity-50">
              <Save class="h-4 w-4" />
              {{ loading ? "Guardando..." : "Guardar" }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div v-if="notification.show"
    class="fixed inset-0 z-[60] flex items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="w-full max-w-md rounded-xl bg-white p-6 shadow-2xl">

      <div class="flex items-center gap-3">

        <div class="flex h-12 w-12 items-center justify-center rounded-full" :class="notification.type === 'success'
          ? 'bg-green-100'
          : 'bg-red-100'
          ">
          <svg v-if="notification.type === 'success'" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>

          <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8v4m0 4h.01M5 3h14l1 17H4L5 3z" />
          </svg>
        </div>

        <div>
          <h3 class="text-lg font-bold">
            {{ notification.title }}
          </h3>

          <p class="mt-1 whitespace-pre-line text-sm text-slate-600">
            {{ notification.message }}
          </p>
        </div>
      </div>

      <div class="mt-6 flex justify-end">
        <button @click="cerrarNotificacion" class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">
          Aceptar
        </button>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, reactive, ref } from "vue";
import axios from "axios";

import {
  Calendar,
  DollarSign,
  IdCard,
  Mail,
  Phone,
  Plus,
  Save,
  User,
} from "@lucide/vue";
const notification = ref({
  show: false,
  type: "success", // success | error
  title: "",
  message: "",
});

const cerrarNotificacion = () => {
  notification.value.show = false;
};

const mostrarNotificacion = (
  type: "success" | "error",
  title: string,
  message: string
) => {
  notification.value = {
    show: true,
    type,
    title,
    message,
  };
};
const showModal = ref(false);
const loading = ref(false);

const today = computed(() => new Date().toISOString().split("T")[0]);

const limpiarFormulario = () => {
  form.nombre = "";
  form.apellido = "";
  form.telefono = "";
  form.dni = "";
  form.correo = "";
  form.cuota = "";
  form.diaIngreso = "";
};

const form = reactive({
  nombre: "",
  apellido: "",
  telefono: "",
  dni: "",
  correo: "",
  cuota: "",
  diaIngreso: "",
});

const guardarInquilino = async () => {
  loading.value = true;

  try {
    await axios.post("/inquilinosback", {
      name: form.nombre,
      apellido: form.apellido,
      telefono: form.telefono,
      dni: form.dni,
      correo: form.correo,
      cuota: form.cuota,
      fecha_ingreso: form.diaIngreso,
    });

    limpiarFormulario();
    showModal.value = false;

    mostrarNotificacion(
      "success",
      "Registro exitoso",
      "El inquilino fue registrado correctamente."
    );

  } catch (error: any) {
    if (error.response?.status === 422) {
      const errores = Object.values(error.response.data.errors)
        .flat()
        .join("\n");

      mostrarNotificacion(
        "error",
        "Error de validación",
        errores
      );
    } else {
      mostrarNotificacion(
        "error",
        "Error",
        "Ocurrió un error al guardar el inquilino."
      );
    }
  } finally {
    loading.value = false;
  }
};
</script>