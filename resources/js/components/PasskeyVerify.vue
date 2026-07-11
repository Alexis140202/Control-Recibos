<script setup lang="ts">
import type { UrlMethodPair } from '@inertiajs/core';
import { router } from '@inertiajs/vue3';
import { usePasskeyVerify } from '@laravel/passkeys/vue';
import { KeyRound } from '@lucide/vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { Spinner } from '@/components/ui/spinner';

type Props = {
    routes?: {
        options: UrlMethodPair;
        submit: UrlMethodPair;
    };
    label?: string;
    loadingLabel?: string;
    separator?: string;
};

const props = defineProps<Props>();

const { verify, isLoading, error, isSupported } = usePasskeyVerify({
    ...(props.routes
        ? {
              routes: {
                  options: props.routes.options.url,
                  submit: props.routes.submit.url,
              },
          }
        : {}),
    onSuccess: (response) => {
        router.visit(response.redirect ?? '/dashboard');
    },
});
</script>

<template>
    <div v-if="isSupported">
        <Button
            type="button"
            class="w-full"
            @click="verify"
            :disabled="isLoading"
        >
            <Spinner v-if="isLoading" class="mr-2" />
            <KeyRound v-else class="mr-2 h-4 w-4" />
            {{ isLoading ? (loadingLabel ?? 'Verificando...') : (label ?? 'Continuar con Passkey') }}
        </Button>

        <InputError :message="error ?? undefined" class="mt-2" />

        <Separator class="my-4" />

        <div class="text-center text-xs text-muted-foreground">
            {{ separator ?? 'O continúa con tu contraseña' }}
        </div>
    </div>
</template>