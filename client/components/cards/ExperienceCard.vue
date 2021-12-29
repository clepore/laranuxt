<template>
  <div>
    <div v-if="!editMode">
      <h5 class="my-3">
        <small class="float-right">{{ experience.city }}, {{ experience.province }} {{ experience.country }}</small>
        <strong>{{ experience.job_title }}</strong> @ <i>{{ experience.company_name }}</i>
      </h5>
      <p>{{ experience.description }}</p>
      <br>
      <p class="text-sm text-gray-500">
        {{ experience.skills }}
      </p>
    </div>
    <template v-if="canEdit">
      <ExperienceCardEdit
        :experience="experience"
        :candidateId="experience.candidate_id"
        :canDelete="true"
        @done-editing="toggleEdit"
        v-if="editMode"
      />
      <PushButton
          class="float-right"
          size="xs"
          v-on:click="toggleEdit()"
        >{{ btnTitle }}</PushButton>
    </template>
  </div>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { Experience } from '@/client/types/api'
export default Vue.extend({
  props: {
    experience: {
      type: Object as PropType<Experience>,
      required: true,
    },
    candidateId: {
      type: Number,
      required: true,
    },
    canEdit: {
      type: Boolean,
      required: true,
    },
  },
  data () {
    return {
      editMode: false,
      btnTitle: 'Edit',
    }
  },
  methods: {
    toggleEdit () {
      this.editMode = !this.editMode
      this.btnTitle = this.editMode ? 'Cancel' : 'Edit'
    },
  },
})
</script>
