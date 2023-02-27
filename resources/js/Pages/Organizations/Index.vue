<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Organizations</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter  class="w-full max-w-md mr-4" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select  class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <inertia-link class="btn-indigo" :href="route('organizations.create')">
        <span>Create</span>
        <span class="hidden md:inline">Organization</span>
      </inertia-link>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Name</th>
          <th class="px-6 pt-6 pb-4">City</th>
          <th class="px-6 pt-6 pb-4" colspan="2">Phone</th>
        </tr>
        <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr>




 <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr> <tr  class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
           jjjjj
          </td>
          <td class="border-t">
            jajajjajja
          </td>
          <td class="border-t">
            iioooooo
          </td>
          <td class="border-t w-px">
           ysysysyyss
          </td>
        </tr>
        <tr v-if="name === 0">
          <td class="border-t px-6 py-4" colspan="4">No organizations found.</td>
        </tr>


      </table>
    </div>
    <pagination />
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import pickBy from 'lodash/pickBy'
import SearchFilter from '@/Shared/SearchFilter'
import throttle from 'lodash/throttle'

export default {
  metaInfo: { title: 'Organizations' },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },





}
</script>
