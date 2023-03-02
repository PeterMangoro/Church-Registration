<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden  sm:rounded-lg flex flex-wrap justify-evenly gap-5">
                    <dashboard-card
            title="Attended new Believers"
            total="23"
            add_path="dashboard"
            more_path="dashboard"
           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Attended Church Members"
            total="347"
            add_path="dashboard"
            more_path="dashboard"
           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Attended Sunday School"
            total="123"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Attended Youth"
            total="228"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Attended OverComers"
            total="187"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Male Attendants"
            total="198"
            add_path="dashboard"
            more_path="dashboard"
           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Female Attendants"
            total="190"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Accommodation Seekers"
            total="23"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />

          <dashboard-card
            title="TurnUp %"
            total="86%"
            add_path="dashboard"
            more_path="dashboard"           
            more_tip="Click to view All"
          />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
