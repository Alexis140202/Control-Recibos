<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { store } from '@/routes/login';
import { request } from '@/routes/password';

defineOptions({
    layout: {
        title: 'Inicia sesión en tu cuenta',
        description: 'Introduce tu correo electrónico y contraseña a continuación para iniciar sesión',
    },
});

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();
</script>

<template>

    <Head title="Log in" />

    <div class="login-page-container flex flex-col items-center justify-center p-4">

        <div class="login-card w-full max-w-sm bg-[#FDFBF7] p-8 rounded-3xl border border-stone-200 shadow-xl">

            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-700">
                {{ status }}
            </div>

    

            <Form v-bind="store.form()" :reset-on-success="['password']" v-slot="{ errors, processing }"
                class="flex flex-col gap-5">
                <div class="grid gap-5">
                    <div class="grid gap-2">
                        <Label for="email" class="text-xs font-bold text-slate-900 uppercase tracking-wide">
                            EMAIL
                        </Label>

                        <Input id="email" name="email" type="email" required autofocus autocomplete="email"
                            class="bg-white border-stone-300 text-slate-900 placeholder:text-stone-400 rounded-xl"
                            placeholder="nombre@empresa.com" />

                        <InputError :message="errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <div class="flex justify-between items-center">
                            <Label for="password" class="text-xs font-bold text-slate-900 uppercase tracking-wide">
                                PASSWORD
                            </Label>

                            <TextLink v-if="canResetPassword" :href="request()"
                                class="text-xs text-slate-900 font-bold hover:underline">
                                ¿Olvidaste tu clave?
                            </TextLink>
                        </div>

                        <PasswordInput id="password" name="password" required autocomplete="current-password"
                            class="bg-white border-stone-300 text-slate-900 placeholder:text-stone-400 rounded-xl"
                            placeholder="••••••••" />

                        <InputError :message="errors.password" />
                    </div>

                    <Button type="submit"
                        class="w-full bg-[#162a4d] text-white rounded-xl py-6 font-bold hover:bg-[#1e3a6a]"
                        :disabled="processing">
                        <Spinner v-if="processing" class="mr-2" />
                        Iniciar sesión
                    </Button>
                </div>
            </Form>
        </div>
    </div>
</template>

<style>
/* 1. Títulos de fuera a negro */
body:has(.login-page-container) h1,
body:has(.login-page-container) p {
    color: #000000 !important;
    font-weight: 600;
}

/* 2. Cambiar el color del recuadro negro "OR CONTINUE" a un tono piedra elegante */
.login-card .bg-black {
    background-color: #d6d3d1 !important;
    /* Tono piedra suave */
    color: #1c1917 !important;
    border-radius: 6px;
}
</style>