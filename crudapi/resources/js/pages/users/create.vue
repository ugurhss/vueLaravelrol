<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Kullanıcı oluştur',
        href: '/users/create',
    },
];

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});


</script>

<template>
    <Head title="Kullanıcı oluştur" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="container mx-auto p-4 max-w-xl">
            <!-- Başlık + Kullanıcılar linki -->
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Kullanıcılar</h1>
                <Link
                    href="/users"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow"
                >
                    Kullanıcılar
                </Link>
            </div>

            <!-- Form -->
            <form @submit.prevent="form.post(route('users.store'))" class="space-y-4">
                <!-- Ad Soyad -->
                <div>
                    <label for="name" class="block font-medium">Ad Soyad</label>
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

                <!-- E-posta -->
                <div>
                    <label for="email" class="block font-medium">E-posta</label>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        class="w-full border rounded p-2"
                    />
                    <div v-if="form.errors.email" class="text-red-500 text-sm">
                        {{ form.errors.email }}
                    </div>
                </div>

                <!-- Şifre -->
            <!-- Şifre -->
<div>
  <label for="password" class="block font-medium">Şifre</label>
  <input
    v-model="form.password"
    type="password"
    id="password"
    class="w-full border rounded p-2"
  />
  <div v-if="form.errors.password" class="text-red-500 text-sm">
    {{ form.errors.password }}
  </div>
</div>

<!-- Şifre Doğrulama -->
<div>
  <label for="password_confirmation" class="block font-medium">Şifre (Tekrar)</label>
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


                <!-- Gönder Butonu -->
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
