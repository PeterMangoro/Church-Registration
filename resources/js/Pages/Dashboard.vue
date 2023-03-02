<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  data:Object
})
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
        <div
          class="overflow-hidden sm:rounded-lg flex flex-wrap justify-evenly gap-5"
        >
          <dashboard-card
            title="TurnUp %"
            total="86%"
            add_path="dashboard"
          
          />
          <dashboard-card
            title="New Believers"
            :total="data.new_believers"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Church Members"
            :total="data.believers"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Sunday School"
            :total="data.sunday_school"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Youth"
            :total="data.youth"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" OverComers"
            :total="data.over_comers"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Male Attendants"
            :total="data.male"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Female Attendants"
            :total="data.female"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Accommodation Seekers"
            :total="data.need_accommodation"
            add_path="dashboard"
            more_path="dashboard"
            more_tip="Click to view All"
          />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
