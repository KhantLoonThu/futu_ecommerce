import Validation from "./Validation";

interface Errors {
  email_error?: string;
  password_error?: string;
}
export default class SignupValidation {
  email: string;
  password: string;

  constructor(email: string, password: string) {
    this.email = email;
    this.password = password;
  }

  checkValidations() {
    let errors: Errors = {};

    if (!Validation.validateEmail(this.email)) {
      errors.email_error = "Invalid Email";
    }

    if (!Validation.passwordMinLength(this.password, 6)) {
      errors.password_error = "Your password should have at least 6 characters";
    }

    return errors;
  }
}
