<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Rol Oluştur',
        href: '/rol/create',
    },
];

// Props: Controller'dan gelen izinler
const props = defineProps<{
    permi: Record<number, string>;
}>();

// Form verisi
const form = useForm({
    name: '',
    permissions: [] as number[]  // Seçilen izinler
});
</script>

<template>
    <Head title="Rol Oluştur" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="container mx-auto p-4 max-w-xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Yeni Rol</h1>
                <Link
                    href="/rol"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow"
                >
                    Roller
                </Link>
            </div>

            <form @submit.prevent="form.post(route('rol.store'))" class="space-y-4">
                <!-- Rol Adı -->
                <div>
                    <label for="name" class="block font-medium">Rol Adı</label>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        class="w-full border rounded p-2"
                    />
                    <div v-if="form.errors.name" class="text-red-500 text-sm">
                        {{ form.errors.name }}
                    </div>
                </div>

                <!-- Permissions -->
                <div>
                    <label class="block font-medium mb-2">İzinler</label>
                    <div v-for="(name, id) in props.permi" :key="id" class="mb-1">
                        <label class="inline-flex items-center space-x-2">
                            <input
                                type="checkbox"
                                :value="Number(id)"
                                v-model="form.permissions"
                                class="rounded border-gray-300"
                            />
                            <span>{{ name }}</span>
                        </label>
                    </div>
                    <div v-if="form.errors.permissions" class="text-red-500 text-sm">
                        {{ form.errors.permissions }}
                    </div>
                </div>

                <!-- Kaydet -->
                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
                >
                    Kaydet
                </button>
            </form>
        </div>
    </AppLayout>
</template>
