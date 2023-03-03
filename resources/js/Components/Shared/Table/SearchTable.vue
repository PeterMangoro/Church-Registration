<template>
  <div class="flex space-x-2  ">
    <label for="search" class="hidden">Search</label>
    <jet-input
      id="search"     
      v-model="search"
      :class="{ 'transition-border': search }"
      autocomplete="off"
      name="search"
      :placeholder="placeholder"
      type="search"
      @keyup.esc="search = null"
    />

    <!-- 
                    I'm not importing per-page component coz search props will not sync  when a value changes as it requires a page reload to pass data through components
                    <per-page :routeName=routeName /> -->
    <!-- <select
      v-if="show_per_page"
      v-model="per_page"
      @change="per_page === $event.target.value"
      class="
        text-sm
        border-gray-300
        rounded-md
        shadow-sm
        shadow-violet-600
        focus:border-indigo-300
        focus:ring
        focus:ring-indigo-200
        focus:ring-opacity-50
        hidden sm:flex
      "
    >
      <option value="5">5 Per Page</option>
      <option value="10">10 Per Page</option>
      <option value="15">15 Per Page</option>
    </select> -->
  </div>
</template>

<script setup>

import JetInput from "@/Components/TextInput.vue";
// import PerPage from "@/Components/Shared/Table/PerPage.vue";
import {ref,watch} from 'vue'
import {router} from '@inertiajs/vue3'
import DebouncedRef from '@/Composables/DebouncedRef'

let search = DebouncedRef('', 400);

const props = defineProps({
    routeName:String,
    placeholder:String,
})

watch(search, (value) => {
  router.get(
    route(props.routeName),
    { search: value },
    {
      preserveState: true,
    }
  );
}); 
</script>
