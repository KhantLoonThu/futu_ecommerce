<template>
  <div class="form-step form-two">
    <div class="bg-svg">
      <img class="w-[50px] mb-[10px]" src="/images/contacts.png" alt="" />
    </div>
    <h2 class="text-[24px] font-[600]">Contact</h2>
    <div class="mt-3">
      <label for="phone-number">Phone Number</label>
      <input
        class="py-2 px-5 border-2 rounded-lg w-full"
        type="tel"
        v-model.trim="$store.state.customer.phoneNumber"
        name="phone_number"
        id="phone-number"
        placeholder="09xxxxxxxxx"
      />
      <template v-if="errors.phoneNumber">
        <p class="text-red-600">{{ errors.phoneNumber }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="address">Address</label>
      <input
        class="py-2 px-5 border-2 rounded-lg w-full"
        type="text"
        v-model.trim="$store.state.customer.address"
        name="address"
        id="address"
        placeholder="Street, Quarter, Building"
      />
      <template v-if="errors.address">
        <p class="text-red-600">{{ errors.address }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="city">City</label>
      <input
        class="py-2 px-5 border-2 rounded-lg w-full"
        type="text"
        v-model.trim="$store.state.customer.city"
        name="city"
        id="city"
        placeholder="City"
      />
      <template v-if="errors.city">
        <p class="text-red-600">{{ errors.city }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="state">State</label>
      <input
        class="py-2 px-5 border-2 rounded-lg w-full"
        type="text"
        v-model.trim="$store.state.customer.state"
        name="state"
        id="state"
        placeholder="State"
      />
      <template v-if="errors.state">
        <p class="text-red-600">{{ errors.state }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="Country">Country</label>
      <select
        class="py-2 px-5 border-2 rounded-lg w-full"
        name="country"
        v-model.trim="$store.state.customer.country"
        id="Country"
        placeholder="Country"
      >
        <option
          :value="country"
          v-for="(country, index) in countries"
          :key="index + 1"
          option
        >
          {{ country }}
        </option>
      </select>
      <template v-if="errors.country">
        <p class="text-red-600">{{ errors.country }}</p>
      </template>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "StepTwo",
  data() {
    return {
      countries: [
        "Afghanistan",
        "Albania",
        "Algeria",
        "Andorra",
        "Angola",
        "Antigua and Barbuda",
        "Argentina",
        "Armenia",
        "Australia",
        "Austria",
        "Azerbaijan",
        "Bahamas",
        "Bahrain",
        "Bangladesh",
        "Barbados",
        "Belarus",
        "Belgium",
        "Belize",
        "Benin",
        "Bhutan",
        "Bolivia",
        "Bosnia and Herzegovina",
        "Botswana",
        "Brazil",
        "Brunei",
        "Bulgaria",
        "Burkina Faso",
        "Burundi",
        "Cabo Verde",
        "Cambodia",
        "Cameroon",
        "Canada",
        "Central African Republic",
        "Chad",
        "Chile",
        "China",
        "Colombia",
        "Comoros",
        "Congo, Democratic Republic of the",
        "Congo, Republic of the",
        "Costa Rica",
        "Croatia",
        "Cuba",
        "Cyprus",
        "Czech Republic",
        "Denmark",
        "Djibouti",
        "Dominica",
        "Dominican Republic",
        "East Timor",
        "Ecuador",
        "Egypt",
        "El Salvador",
        "Equatorial Guinea",
        "Eritrea",
        "Estonia",
        "Eswatini",
        "Ethiopia",
        "Fiji",
        "Finland",
        "France",
        "Gabon",
        "Gambia",
        "Georgia",
        "Germany",
        "Ghana",
        "Greece",
        "Grenada",
        "Guatemala",
        "Guinea",
        "Guinea-Bissau",
        "Guyana",
        "Haiti",
        "Honduras",
        "Hungary",
        "Iceland",
        "India",
        "Indonesia",
        "Iran",
        "Iraq",
        "Ireland",
        "Israel",
        "Italy",
        "Jamaica",
        "Japan",
        "Jordan",
        "Kazakhstan",
        "Kenya",
        "Kiribati",
        "Korea, North",
        "Korea, South",
        "Kosovo",
        "Kuwait",
        "Kyrgyzstan",
        "Laos",
        "Latvia",
        "Lebanon",
        "Lesotho",
        "Liberia",
        "Libya",
        "Liechtenstein",
        "Lithuania",
        "Luxembourg",
        "Madagascar",
        "Malawi",
        "Malaysia",
        "Maldives",
        "Mali",
        "Malta",
        "Marshall Islands",
        "Mauritania",
        "Mauritius",
        "Mexico",
        "Micronesia",
        "Moldova",
        "Monaco",
        "Mongolia",
        "Montenegro",
        "Morocco",
        "Mozambique",
        "Myanmar",
        "Namibia",
        "Nauru",
        "Nepal",
        "Netherlands",
        "New Zealand",
        "Nicaragua",
        "Niger",
        "Nigeria",
        "North Macedonia",
        "Norway",
        "Oman",
        "Pakistan",
        "Palau",
        "Palestine",
        "Panama",
        "Papua New Guinea",
        "Paraguay",
        "Peru",
        "Philippines",
        "Poland",
        "Portugal",
        "Qatar",
        "Romania",
        "Russia",
        "Rwanda",
        "Saint Kitts and Nevis",
        "Saint Lucia",
        "Saint Vincent and the Grenadines",
        "Samoa",
        "San Marino",
        "Sao Tome and Principe",
        "Saudi Arabia",
        "Senegal",
        "Serbia",
        "Seychelles",
        "Sierra Leone",
        "Singapore",
        "Slovakia",
        "Slovenia",
        "Solomon Islands",
        "Somalia",
        "South Africa",
        "South Sudan",
        "Spain",
        "Sri Lanka",
        "Sudan",
        "Suriname",
        "Sweden",
        "Switzerland",
        "Syria",
        "Taiwan",
        "Tajikistan",
        "Tanzania",
        "Thailand",
        "Togo",
        "Tonga",
        "Trinidad and Tobago",
        "Tunisia",
        "Turkey",
        "Turkmenistan",
        "Tuvalu",
        "Uganda",
        "Ukraine",
        "United Arab Emirates",
        "United Kingdom",
        "United States",
        "Uruguay",
        "Uzbekistan",
        "Vanuatu",
        "Vatican City",
        "Venezuela",
        "Vietnam",
        "Yemen",
        "Zambia",
        "Zimbabwe",
      ],
    };
  },
  props: ["errors"],
});
</script>

<style scoped></style>
