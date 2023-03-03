<template>
    <app-layout>
        <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        All Present People
      </h2>
    </template> -->

    <list :users = "data.users" searchRoute="all" />
    </app-layout>
  
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import List from "@/Pages/Partials/List.vue"

const props = defineProps({
    data: Object,
  });
  

</script>

<style>

</style>