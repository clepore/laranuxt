<template>
  <ExperiencesContent :experiences="experiences" :candidateId="candidateId" />
</template>

<script>
export default {
  async asyncData ({ params, $axios }) {
    const experiences = await $axios.get(`experiences?candidate_id=${params.id}`)
    return {
      experiences: experiences.data.data,
      candidateId: parseInt(params.id),
    }
  },
  watchQuery: ['id'],
}
</script>
