import axios from 'axios'

const URL = 'http://localhost/futu_ecommerce/api/auth/admin.php/auth_admin'

interface Admin {
  email: string
  password: string
}

interface AuthResponse {
  status: number
  token: string
}

export default class AuthService {
  async login(admin: Admin): Promise<AuthResponse> {
    try {
      const response = await axios.post<AuthResponse>(URL, {
        email: admin.email,
        password: admin.password
      })
      // console.log(response.data)

      if (response.data.token) {
        localStorage.setItem('token', response.data.token)
      } else {
        throw response.data
      }

      return response.data
    } catch (error) {
      console.error('Login error:', error)
      throw error // Propagate error for handling in caller
    }
  }

  logout() {
    localStorage.removeItem('admin')
    localStorage.removeItem('token')
  }
}
