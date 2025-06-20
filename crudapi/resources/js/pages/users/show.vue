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
        title: 'Kullanıcıyı Görüntüle',
        href: `/users/${props.user.id}/edit`,
    },
];


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
<div>
    <p>isim: <strong>{{ user.name }}</strong></p>
    <p>email: <strong>{{ user.email }}</strong></p>
    <p>id: <strong>{{ user.id }}</strong></p>
    <p>created_at: <strong>{{ user.created_at }}</strong></p>
    <p>updated_at: <strong>{{ user.updated_at }}</strong></p>
</div>

        </div>
    </AppLayout>
</template>
