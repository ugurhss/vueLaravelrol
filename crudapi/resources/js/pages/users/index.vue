<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head,Link} from '@inertiajs/vue3';

/*
bu işlemde biz oluşturduk tasarım bizim
ve cagırıken şunu dedik
  return Inertia::render("users/index", [
            "users" => User::all()
        ]);

<template>

    <Head title="users" />

    <AppLayout :breadcrumbs="breadcrumbs">
       bu kısma içerik gelecek
    </AppLayout>
</template>
*/

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Kullanıcılar',
        href: '/users',
    },
];

defineProps({
    users:Array
         });
</script>

<template>
    <Head title="Kullanıcılar" />

    <AppLayout :breadcrumbs="breadcrumbs">

        <div class="container mx-auto p-4">


            <h1 class="text-2xl font-bold mb-4">Kullanıcılar</h1>
           <!-- Buton kısmını h1 başlığının yanına ekliyoruz -->
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-bold">Kullanıcılar</h1>
  <!-- href="/users/create" şu da yapabilirsin Route{{ name }}  -->
  <Link
    href="/users/create"
    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow"
  >
    + Yeni Kullanıcı
  </Link>
</div>

            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ad Soyad</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">E-posta</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id" class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ user.id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ user.name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ user.email }}</td>
  <!-- DÜZENLE -->
                                <Link
                                :href="route('users.edit', user.id)"
                                 class="text-blue-600 hover:underline">Düzenle</Link>
                                <!-- SİL -->
                                <button @click="kullaniciyiSil(user.id)" class="text-red-600 hover:underline">Sil</button>                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
