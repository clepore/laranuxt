<template>
  <form>
    <dl>
      <dt><label for="inpt-jobtitle">Job Information</label></dt>
      <dd><input id="inpt-jobtitle" v-model="editExperience.job_title" type="text" placeholder="Title/Role"> @ <input v-model="editExperience.company_name" type="text" placeholder="Company Name"></dd>
      <dt><label for="inpt-city">Organization Address</label></dt>
      <dd>
        <input id="inpt-city" v-model="editExperience.city" type="text" placeholder="City">
        <input v-model="editExperience.province" type="text" placeholder="State">
        <input v-model="editExperience.country" type="text" placeholder="Country">
      </dd>
      <dt><label for="inpt-description">Description</label></dt>
      <dd><textarea id="inpt-description" v-model="editExperience.description" placeholder="Description" class="w-full" /></dd>
      <dt><label for="inpt-skills">Skills</label></dt>
      <dd><input id="input-skills" v-model="editExperience.skills" type="text" placeholder="Skills (i.e. javascript, php, vuejs)" class="w-full"></dd>
    </dl>
    <PushButton class="mt-5" size="xs" theme="blue" @click="actionSave()">Save</PushButton>
    <PushButton class="mt-5" size="xs" theme="red" @click="showWarning()" v-if="canDelete">Delete</PushButton>
  </form>
</template>

<style scoped>
  dt {
    @apply text-xs;
    margin-top: 5px;
  }

  label {
    @apply text-gray-300;
  }

  input,
  textarea {
    @apply text-sm;
    @apply my-2;
    @apply p-1;
    @apply border;
    @apply border-solid;
    @apply border-gray-300;
  }
</style>

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
    canDelete: {
      type: Boolean,
      required: true,
    },
  },
  data () {
    const editExperience: Experience = this.experience
    return {
      editExperience,
    }
  },
  methods: {
    actionSave () {
      return this.editExperience?.id ? this.doUpdate() : this.doCreate()
    },
    async doCreate () {
      const data = await this.$axios.post('experiences', this.editExperience)
      this.$toast.success(`"${this.editExperience.company_name}" experience updated.`)
      this.$emit('done-editing')
      return data
    },
    async doUpdate () {
      const data = await this.$axios.patch(`experiences/${this.editExperience.id}`, this.editExperience)
      this.$toast.success(`"${this.editExperience.company_name}" experience updated.`)
      this.$emit('done-editing')
      return data
    },
    async actionDelete () {
      const data = await this.$axios.delete(`experiences/${this.editExperience.id}`)
      this.$toast.success(`"${this.editExperience.company_name}" experience deleted.`)
      this.$emit('done-editing')
      return data
    },
    showWarning () {
      this.$modal.show({
        type: 'danger',
        title: 'Are you sure?',
        body: 'Deleting data cannot be undone.',
        primary: {
          label: 'Delete',
          theme: 'red',
          action: () => this.actionDelete(),
        },
        secondary: {
          label: 'Cancel',
          theme: 'white',
          action: () => {},
        },
      })
    },
  },
})
</script>
