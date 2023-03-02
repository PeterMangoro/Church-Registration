<script setup>
import { ref } from "vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
  user: Object,
});

const form = useForm({
  _method: "PUT",
  need_accommodation: props.user.need_accommodation,
  province: props.user.province,
  assembly: props.user.assembly,
  pastor: props.user.pastor,
  name: props.user.name,
  username: props.user.username,
  dob: props.user.dob,
  gender: props.user.gender,
});

const updateResidenceInformation = () => {
  

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateResidenceInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};
const provinces = [
  {
    name: "Bulawayo",
  },
  {
    name: "Harare",
  },
  {
    name: "Bulawayo",
  },
  {
    name: "Manicaland",
  },
  {
    name: "Mashonaland Central",
  },
  {
    name: "Mashonaland East",
  },
  {
    name: "Mashonaland West",
  },
  {
    name: "Masvingo",
  },
  {
    name: "Matebeleland North",
  },
  {
    name: "Matebeleland South",
  },
];
</script>

<template>
  <FormSection @submitted="updateResidenceInformation">
    <template #title>
      <p class="text-slate-50">
         Residential Information
      </p> </template>

    <template #description>
      <p class="text-slate-50">
      Update your Residential Status.
      </p> </template>

    <template #form>
      <!-- Profile Photo -->

      <!-- Province -->
      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="province" value="Province" class="pb-1.5" />
        <select
          name="province"
          id="state"
          v-model="form.province"
          class="h-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        >
          <option
            v-for="province in provinces"
            :key="province.name"
            :value="province.name"
          >
            {{ province.name }}
          </option>
        </select>
        <InputError class="mt-2" :message="form.errors.province" />
      </div>

      <!-- Assembly -->
      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="assembly" value="Assembly" />
        <TextInput
          id="town"
          v-model="form.assembly"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="assembly"
        />
        <InputError class="mt-2" :message="form.errors.assembly" />
      </div>

      <!-- Pastor -->
      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="dob" value="Presiding Pastor" />
        <TextInput
          id="name"
          v-model="form.pastor"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="pastor"
        />
        <InputError class="mt-2" :message="form.errors.pastor" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <fieldset>
          <InputLabel
            >In need of Accommodation during the Conference?</InputLabel
          >
          <!-- <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p> -->
          <div class="mt-4 space-y-4">
            <div class="flex items-center">
              <input
                id="accommodation_yes"
                v-model="form.need_accommodation"
                value="yes"
                type="radio"
                class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500"
              />
              <label
                for="accommodation_yes"
                class="ml-3 block text-sm font-medium text-gray-700"
                >Yes. I need accommodation</label
              >
            </div>
            <div class="flex items-center">
              <input
                id="accommodation_no"
                v-model="form.need_accommodation"
                value="no"
                type="radio"
                class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500"
              />
              <label
                for="accommodation_no"
                class="ml-3 block text-sm font-medium text-gray-700"
                >No. I have a place to stay</label
              >
            </div>
          </div>
        </fieldset>
        <InputError class="mt-2" :message="form.errors.need_accommodation" />
      </div>
    </template>

    <template #actions>
      <ActionMessage :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </ActionMessage>

      <PrimaryButton
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </PrimaryButton>
    </template>
  </FormSection>
</template>
