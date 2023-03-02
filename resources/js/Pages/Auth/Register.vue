<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import {ref} from 'vue'

const member = ref(null)

const form = useForm({
  name: "",
  username: "",
  dob:"",
  province:"",
  assembly:"",
  pastor:"",
  invite:"",
  need_accommodation:"",
  password: "",
  password_confirmation: "",
  terms: false,
});

const provinces = [
{
name:'Bulawayo'
},
{
name:'Harare'
},
{
name:'Bulawayo'
},
{
name:'Manicaland'
},
{
name:'Mashonaland Central'
},
{
name:'Mashonaland East'
},
{
name:'Mashonaland West'
},
{
name:'Masvingo'
},
{
name:'Matebeleland North'
},
{
name:'Matebeleland South'
},
]

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />

  <AuthenticationCard>
    <template #logo>
      <AuthenticationCardLogo />
    </template>

    <form @submit.prevent="submit" >
      <div>
        <InputLabel for="name" value="Name" />
        <TextInput
          id="name"
          v-model="form.name"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="name"
        />
        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <div class="mt-4">
          <InputLabel for="username" value="Username" />
          <TextInput
            id="username"
            v-model="form.username"
            type="text"
            class="block w-full mt-1"
            required
            @keydown.space.prevent
          />
          <p class="text-sm italic">
            This will be your login name, can be email/phone number/anything
          </p>

          <InputError class="mt-2" :message="form.errors.username" />
        </div>

      <div class="flex flex-wrap">
        <div class="mt-4">
          <InputLabel for="dob" value="Date of Birth" />
          <TextInput
            id="dob"
            v-model="form.dob"
            type="date"
            class="mt-1 block w-full"
            required
            autocomplete="dob"
          />
          <InputError class="mt-2" :message="form.errors.dob" />
        </div>

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="gender" value="Gender" />
          <select name="gender" id="gender" v-model="gender" class="h-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <InputError class="mt-2" :message="form.errors.dob" />
        </div>
      </div>

      <div class="mt-4">
        <fieldset>
                <InputLabel >Are you a member of our Church?</InputLabel>
                <!-- <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p> -->
                <div class="mt-4 space-y-4">
                 
                  <div class="flex items-center">
                    <input id="member_yes" name="member_yes" v-model="member" value="yes" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="member_yes" class="ml-3 block text-sm font-medium text-gray-700">Yes. I am a member</label>
                  </div>
                  <div class="flex items-center">
                    <input id="member_no" name="member_no" v-model="member" value="no" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="member_no" class="ml-3 block text-sm font-medium text-gray-700">No. I am a Guest</label>
                  </div>
                </div>
              </fieldset>
      </div>

      <div v-if="member==='yes'" >
        <div class="mt-4">
          <InputLabel for="province" value="Province" class="pb-1.5" />
          <select
            name="province"
            id="gender"
            v-model="province"
            class="h-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
          >
            <option v-for="province in provinces" :key="province.name" value="province.name">{{province.name}}</option>
            
            
          </select>
          <InputError class="mt-2" :message="form.errors.province" />
        </div>

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="assembly" value="Assembly" />
          <TextInput
            id="assembly"
            v-model="form.assembly"
            type="text"
            class="mt-1 block w-full"
            required
            autocomplete="assembly"
          />
          <InputError class="mt-2" :message="form.errors.assembly" />
        </div>

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="dob" value="Presiding Pastor" />
          <TextInput
            id="pastor"
            v-model="form.pastor"
            type="text"
            class="mt-1 block w-full"
            required
            autocomplete="pastor"
          />
          <InputError class="mt-2" :message="form.errors.pastor" />
        </div>
      </div>

     

      <div v-if="member==='no'" class="mt-4 col-span-2 mx-auto">
        <InputLabel for="assembly" value="Invite's name" />
        <TextInput
          id="name"
          v-model="form.invite"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="invite"
        />
        <InputError class="mt-2" :message="form.errors.invite" />
      </div>

      <div class="mt-4">
        <fieldset>
                <InputLabel >In need of Accommodation during the Conference?</InputLabel>
                <!-- <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p> -->
                <div class="mt-4 space-y-4">
                 
                  <div class="flex items-center">
                    <input id="accommodation_yes" name="form.need_accommodation" value="yes" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="accommodation_yes" class="ml-3 block text-sm font-medium text-gray-700">Yes. I need accommodation</label>
                  </div>
                  <div class="flex items-center">
                    <input id="accommodation_no" name="form.need_accommodation" value="no" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="accommodation_no" class="ml-3 block text-sm font-medium text-gray-700">No. I have a place to stay</label>
                  </div>
                </div>
              </fieldset>
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password" />
        <TextInput
          id="password"
          v-model="form.password"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />
        <TextInput
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
        class="mt-4"
      >
        <InputLabel for="terms">
          <div class="flex items-center">
            <Checkbox
              id="terms"
              v-model:checked="form.terms"
              name="terms"
              required
            />

            <div class="ml-2">
              I agree to the
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >Terms of Service</a
              >
              and
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >Privacy Policy</a
              >
            </div>
          </div>
          <InputError class="mt-2" :message="form.errors.terms" />
        </InputLabel>
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          :href="route('login')"
          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Already registered?
        </Link>

        <PrimaryButton
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </PrimaryButton>
      </div>
    </form>
  </AuthenticationCard>
</template>
