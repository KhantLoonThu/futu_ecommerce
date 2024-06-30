<template>
  <section>
    <div class="py-6 px-4 md:px-6 xl:px-7.5 flex justify-between items-center">
      <h4
        class="text-xs sm:text-sm md:text-[18px] xl:text-lg lg:text-lg font-bold text-black dark:text-white"
      >
        {{ pageHeader }}
      </h4>
      <div>
        <router-link :to="{ name: 'category-create' }">
          <Button
            class="text-xs sm:text-sm md:text-[14px] xl:text-[16px] lg:text-[16px]"
            :style="adminType !== 'super admin' ? { cursor: 'not-allowed' } : ''"
            :disabled="adminType === 'futu admin'"
            severity="help"
            :label="addBtn"
          />
        </router-link>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle px-[28px]">
          <div class="overflow-hidden">
            <table
              class="min-w-full mb-[20px] border border-slate-300 dark:border-neutral-700 divide-y divide-slate-300 dark:divide-neutral-700"
            >
              <thead>
                <tr
                  class="border-t border-slate-300 dark:border-neutral-700 divide-x divide-slate-300 dark:divide-neutral-700"
                >
                  <th
                    v-for="(header, index) in tableHeaders"
                    :key="index"
                    scope="col"
                    class="px-6 py-3 text-start text-[1rem] font-[600] text-[#334155] capitalize dark:text-neutral-200"
                  >
                    {{ header }}
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                  >
                    John Brown
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                  >
                    45
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                  >
                    New York No. 1 Lake Park
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <button
                      type="button"
                      class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { useStore } from 'vuex'

export default defineComponent({
  name: 'TableOne',
  data() {
    return {
      //
      adminType: useStore().getters.getAdmin.admin_role,
      tableHeaders: ['id', 'name', 'description', 'archived', 'actions']
    }
  },
  props: {
    pageHeader: String,
    addBtn: String
  }
})
</script>

<style scoped></style>
