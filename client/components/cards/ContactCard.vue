<template>
  <li class="pl-5 py-3">
    <NuxtLink :to="`/${candidate.id}`">
      <h3 class="text-sm leading-5 font-medium truncate">
        {{ candidate.first_name }} {{ candidate.last_name }}
      </h3>
    </NuxtLink>
    <!--
    <a :href="`mailto:${candidate.email_address}`" :title="candidate.email_address">
      <icon-envelope class="w-5 h-5" /> Email
    </a>
    <a :href="`tel:${candidate.phone}`" :title="candidate.phone">
      <icon-phone class="w-5 h-5" />
      <span class="ml-3">Call</span>
    </a>
    -->
  </li>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { Candidate } from '@/client/types/api'
export default Vue.extend({
  props: {
    candidate: {
      type: Object as PropType<Candidate>,
      required: true,
    },
  },
  computed: {
    is_admin () {
      return Math.random() >= 0.5
    },
  },
})
</script>
