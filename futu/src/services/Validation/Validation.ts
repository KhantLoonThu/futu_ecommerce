export default class Validation {
  static validateEmail(email: string): boolean {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  static passwordMinLength(name: string, minLength: number) {
    if (name.length < minLength) {
      return false;
    }
    return true;
  }
}
