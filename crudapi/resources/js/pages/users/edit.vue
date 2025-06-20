<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

// Props tanımı (tekil user)
const props = defineProps({
    user: Object
});

// Breadcrumbs
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Kullanıcıyı Düzenle',
        href: `/users/${props.user.id}/edit`,
    },
];

// Form verileri (şifreler boş bırakılmalı!)
const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '',
    password_confirmation: ''
});
</script>

<template>
    <Head title="Kullanıcı Düzenle" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="container mx-auto p-4 max-w-xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Kullanıcıyı Düzenle</h1>
                <Link
                    href="/users"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow"
                >
                    Kullanıcılar
                </Link>
            </div>

            <form @submit.prevent="form.put(route('users.update', props.user.id))" class="space-y-4">
                <!-- Ad Soyad -->
                <div>
                    <label for="name" class="block font-medium">Ad Soyad</label>
                    <input v-model="form.name" type="text" id="name" class="w-full border rounded p-2" />
                    <div v-if="form.errors.name" class="text-red-500 text-sm">
                        {{ form.errors.name }}
                    </div>
                </div>

                <!-- E-posta -->
                <div>
                    <label for="email" class="block font-medium">E-posta</label>
                    <input v-model="form.email" type="email" id="email" class="w-full border rounded p-2" />
                    <div v-if="form.errors.email" class="text-red-500 text-sm">
                        {{ form.errors.email }}
                    </div>
                </div>

                <!-- Şifre (opsiyonel) -->
                <div>
                    <label for="password" class="block font-medium">Yeni Şifre</label>
                    <input v-model="form.password" type="password" id="password" class="w-full border rounded p-2" />
                    <div v-if="form.errors.password" class="text-red-500 text-sm">
                        {{ form.errors.password }}
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block font-medium">Yeni Şifre (Tekrar)</label>
                    <input
                        v-model="form.password_confirmation"
                        type="password"
                        id="password_confirmation"
                        class="w-full border rounded p-2"
                    />
                    <div v-if="form.errors.password_confirmation" class="text-red-500 text-sm">
                        {{ form.errors.password_confirmation }}
                    </div>
                </div>

                <!-- Kaydet Butonu -->
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
