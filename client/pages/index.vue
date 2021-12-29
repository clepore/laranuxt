<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <h2 class="my-2"> Viewing {{ candidates.length }} candidates for <strong><a href="https://rimsys-inc.breezy.hr/p/7ced46d18c60-senior-full-stack-engineer">Senior Full Stack Software Engineer</a></strong></h2>

    <div class="grid grid-cols-9 gap-4">
      <div class="col-span-3 bg-white">
        <ul v-if="candidates.length &gt; 0" class="mt-2 divide-y">
          <contact-card v-for="(candidate, index) in candidates" :key="index" :candidate="candidate" />
        </ul>
      </div>
      <div class="col-span-6 bg-white p-4">
        <NuxtChild />
      </div>
    </div>

    <div class="text-center mx-auto mt-4">
      <span class="mr-4">nuxt-tailvue kitchen sink:</span>
      <div class="mt-2 flex mx-auto">
        <n-link to="/modal">
          <push-button theme="whiteLeft" class="-mr-px"> Modal </push-button>
        </n-link>
        <n-link to="/toast">
          <push-button theme="whiteMid">
            toasts
          </push-button>
        </n-link>
        <n-link to="/button">
          <push-button theme="whiteMid">
            buttons
          </push-button>
        </n-link>
        <n-link to="/icon">
          <push-button theme="whiteRight">
            icons
          </push-button>
        </n-link>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { Candidates } from '@/types/api'
export default Vue.extend({
  data () {
    const candidates:Candidates = []
    const count:number = 0

    return {
      candidates,
      count,
    }
  },
  mounted () {
    this.get(this.count)
    console.log('test')
  },
  methods: {
    async get (count: number): Promise<void> {
      this.candidates = (
        await this.$axios.get('candidates', { params: { count } })
      ).data.data as Candidates
    },
    total (count: number): void {
      this.candidates = []
      this.count = count
      this.get(this.count)
    },
  },
})
</script>
