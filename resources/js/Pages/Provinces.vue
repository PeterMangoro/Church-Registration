<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  data:Object
})
</script>

<template>
  <AppLayout title="Provinces">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Provinces
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="overflow-hidden sm:rounded-lg flex flex-wrap justify-evenly gap-5"
        >
          <dashboard-card
            title="Bulawayo"
            :total="data.Bulawayo"
            more_path="bulawayo"    
          />

          <dashboard-card
            title="Harare"
            :total="data.Harare"          
            more_path="harare"
            more_tip="Click to view All "
          />

          <dashboard-card
            title="Manicaland"
            :total="data.Manicaland"           
            more_path="manicaland"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland Central"
            :total="data.MashonalandCentral"
            more_path="mashonalandCentral"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland East"
            :total="data.MashonalandEast"
           
            more_path="mashonalandEast"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland West"
            :total="data.MashonalandWest"           
            more_path="mashonalandWest"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Masvingo"
            :total="data.Masvingo"
           
            more_path="masvingo"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Matebeleland North"
            :total="data.MatebelelandNorth"
           
            more_path="matebelelandNorth"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Matebeleland South"
            :total="data.MatebelelandSouth"
           
            more_path="matebelelandSouth"
            more_tip="Click to view All"
          />

         

          
        </div>
      </div>
    </div>
  </AppLayout>
</template>
