<template>
  <div>
    <div>
      <PushButton
        class="float-right"
        size="xs"
        v-on:click="toggleAdd()"
      >
       {{btnTitle}}
      </PushButton>
      <h4>{{experiences.length}} Experiences listed</h4>
    </div>
    <ExperienceCardEdit
      :experience="newExperience"
      :candidateId="candidateId"
      :canDelete="false"
      @done-editing="toggleAdd"
      v-if="addMode"
    />
    <section
      class="mt-4 mb-9"
      v-for="(experience, idx) in experiences"
      :key="idx"
      :experience="experience"
    >
      <hr>
      <ExperienceCard
        :experience="experience"
        :candidateId="candidateId"
        :canEdit="experiences.length > 1"
      />
    </section>
  </div>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { Experiences } from '@/client/types/api'
export default Vue.extend({
  props: {
    experiences: {
      type: Array as PropType<Experiences>,
      required: true,
    },
    candidateId: {
      type: Number,
      required: true,
    },
  },
  data () {
    const newExperience = {
      candidate_id: this.candidateId,
      company_name: '',
      job_title: '',
      description: '',
      city: '',
      province: '',
      country: '',
      skills: '',
    }

    return {
      newExperience,
      addMode: false,
      btnTitle: 'Add',
    }
  },
  methods: {
    toggleAdd () {
      this.addMode = !this.addMode
      this.btnTitle = this.addMode ? 'Cancel' : 'Add'
    },
  },
})
</script>
