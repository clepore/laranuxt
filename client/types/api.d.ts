
export interface MetApiResponse {
  benchmark: number
  status: 'success' | 'failure'
  query: {
    options: Record<string, any>
    params: Record<string, any>
  }
  paginate?: {
    current_page: number
    first_item: number
    last_item: number
    last_page: number
    pages: Array<number>
    per_page: number
    total: number
  }
  data: any
}

export interface Candidate {
  id: number
  first_name: string
  last_name: string
  phone: string
  email_address: string
  address_street: string
  address_city: string
  address_province: string
  address_country: string
  address_zip: string
}

export type Candidates = Array<Candidate>

export interface Experience {
  id?: number
  candidate_id: number
  company_name: string
  job_title: string
  description: string
  city: string
  province: string
  country: string,
  skills: string
}

export type Experiences = Array<Experience>
