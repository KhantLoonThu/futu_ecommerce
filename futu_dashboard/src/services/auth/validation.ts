export default class Validation {
  validateEmail(email) {
    if (!email) {
      return { status: false, emailError: 'Email is required' }
    }

    // Regular expression to match a valid email format
    const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i
    if (!regex.test(email)) {
      return { status: false, emailError: 'Invalid email format' }
    }

    return { status: true, emailError: '' }
  }

  // Method to validate if a password is empty
  validatePassword(password) {
    if (!password) {
      return { status: false, passwordError: 'Password is required' }
    }

    if (password.length < 6) {
      return { status: false, passwordError: 'Password must be at least 6 characters long' }
    }

    return { status: false, passwordError: '' }
  }
}
